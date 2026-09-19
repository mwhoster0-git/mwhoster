<?php
namespace TwentyI\WHMCS;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * This class is for common WHMCS activities
 */
abstract class Base {
    const LIBVERSION = '$Revision:v1.0.6$';

    /**
     * Returns the client details part of the request.
     *
     * @param array $params
     * @return array {
     *     @var string $id
     *     @var array[] $customfields {
     *         @var string $id
     *         @var string $value
     *     }
     *     @var string $fullname
     *     @var string|null $companyname
     *     @var string $email
     *     @var string $address1
     *     @var string $address2
     *     @var string $city
     *     @var string $state
     *     @var string $postcode
     *     @var string $country ISO3166 alpha2
     *     @var string $phonenumber
     *     @var string $phonenumberformatted
     * }
     */
    abstract protected function clientsDetails(array $params);

    /**
     * Returns the master stack user for the current user, if one already
     * exists.
     *
     * In the special case of a master stack user ref of "*", this will
     * autodetect and store the real master stack user ref.
     *
     * @param array $client_details {
     *     @var array[] $customfields {
     *         @var string $id
     *         @var string $value
     *     }
     *     @var string|null $email Required for autodetect
     *     @var string|null $id Required for autodetect
     * }
     * @param bool $autodetect If false, autodetect behaviour will be skipped.
     * @return string|null eg. "stack-user:1245"
     */
    protected function existingMasterStackUser(
        array $client_details,
        $autodetect = true
    ) {
        if($this->stackUserCustomField) {
            foreach($client_details["customfields"] as $f) {
                if($f["id"] == $this->stackUserCustomField) {
                    if($f["value"] == "*") {
                        if($autodetect) {
                            try {
                                $response = $this->servicesAPI->getWithFields(
                                    "/reseller/*/susers"
                                );
                                foreach($response->users as $ref => $user) {
                                    if(
                                        $user->name == $client_details["email"]
                                    ) {
                                        $custom_info = [
                                            $this->stackUserCustomField => $ref,
                                        ];
                                        localAPI(
                                            "UpdateClient",
                                            [
                                                "clientid" =>
                                                    $client_details["id"],
                                                "customfields" => base64_encode(
                                                    serialize($custom_info)
                                                ),
                                            ],
                                            $this->adminUser
                                        );
                                        return $ref;
                                    }
                                }
                            } catch(\TwentyI\API\Exception $e) {
                                trigger_error($e->getMessage());
                            }
                        }
                        return null;
                    } else {
                        return $f["value"];
                    }
                }
            }
        }
        return null;
    }

    /**
     * Returns the master stack user for the current user, if one already
     * exists.
     *
     * @param array $params {
     *     @see clientsDetails()
     * }
     * @return string|null eg. "stack-user:1245"
     */
    protected function existingMasterStackUserForRequest(array $params) {
        return $this->existingMasterStackUser($this->clientsDetails($params));
    }

    /**
     * Returns the master stack user for the current user, if any is possible.
     *
     * @param array $params {
     *     @see clientsDetails()
     * }
     * @return string|null eg. "stack-user:1245"
     */
    protected function masterStackUserForRequest(array $params) {
        $existing = $this->existingMasterStackUserForRequest($params);
        if($this->stackUserCustomField and !$existing) {
            $user_info = $this->clientsDetails($params);

            try {
                $response = $this->servicesAPI->postWithFields(
                    "/reseller/*/susers",
                    [
                        "newUser" => [
                            "person_name" => $user_info["fullname"],
                            "company_name" => $user_info["companyname"],
                            "address" => implode("\n", array_filter([
                                $user_info["address1"],
                                $user_info["address2"],
                            ])),
                            "city" => $user_info["city"],
                            "sp" => $user_info["state"],
                            "pc" => $user_info["postcode"],
                            "cc" => $user_info["country"],
                            "voice" => @$user_info["phonenumberformatted"] ?: $user_info["phonenumber"],
                            "notes" => null,
                            "billing_ref" => null,
                            "email" => $user_info["email"],
                            "nominet_contact_type" => null,
                        ],
                    ]
                );
                $custom_info = [
                    $this->stackUserCustomField => $response->result->ref,
                ];
                $existing = $response->result->ref;
            } catch(\TwentyI\API\Exception $e) {
                trigger_error($e->getMessage());
                $custom_info = [
                    $this->stackUserCustomField => null,
                ];
            }
            localAPI(
                "UpdateClient",
                [
                    "clientid" => $user_info["id"],
                    "customfields" => base64_encode(serialize($custom_info)),
                ],
                $this->adminUser
            );
        }
        return $existing;
    }

    /**
     * Returns the options for configuration of the product.
     * @return array
     */
    public static function configOptions() {
        $options = static::$CONFIG_OPTIONS;
        $options["stackUserCustomField"]["Options"] =
            self::possibleStackUserFields();
        $options["adminUser"]["Options"] =
            self::possibleAdminUsers();
        return $options;
    }

    /**
     * Set up the API config from a given config file. This is typically
     * only useful in testing or development.
     *
     * @param string|null $config_file
     */
    public static function init($config_file) {
        if($config_file and file_exists($config_file)) {
            $contents = file_get_contents($config_file);
            $config = json_decode(file_get_contents($config_file));
            \TwentyI\API\Services::$serviceURL = $config->services->url;
            \TwentyI\API\Authentication::$serviceURL = $config->auth->url;
            \TwentyI\API\ControlPanel::$serviceURL = $config->controlpanel->url;
            if(!(
                \TwentyI\API\Services::$serviceURL and \TwentyI\API\Authentication::$serviceURL and
                \TwentyI\API\ControlPanel::$serviceURL
            )) {
                throw new \Exception("Config load fail: $contents => ".json_encode($config));
            }
        }
    }

    /**
     * Returns the set of admin users.
     *
     * @return string[] A username to name map
     */
    public static function possibleAdminUsers() {
        $out = [];
        foreach(Capsule::table('tbladmins')->get() as $user) {
            $out[$user->username] = implode(" ", [$user->firstname, $user->lastname]);
        }
        return $out;
    }

    /**
     * Returns the set of custom user fields which might include the
     * stack user one.
     *
     * @return array A number to name map
     */
    public static function possibleStackUserFields() {
        $out = [];
        $query = Capsule::table('tblcustomfields')
            ->where("type", "=", "client")
            ->where("fieldtype", "=", "text")
            ->where("adminonly", "=", "on");
        foreach($query->get() as $field) {
            $out[$field->id] = $field->fieldname;
        }
        return $out;
    }

    /**
     * Returns the shortened version string for this module
     *
     * @return string
     */
    public function shortVersion() {
        if(self::LIBVERSION == "\$Revision\$") {
            return "master";
        } else {
            return preg_replace(
                "/^[$]Revision:(.+)[$]/",
                "\\1",
                self::LIBVERSION
            );
        }
    }

    /**
     * Returns the User-Agent string for this module.
     *
     * @return string
     */
    public static function userAgent() {
        static $user_agent = null;
        if(!$user_agent) {
            global $CONFIG;
            $version = self::shortVersion();
            $user_agent = "20iWHMCS/{$version} (WHMCS {$CONFIG["Version"]})";
        }
        return $user_agent;
    }

    /**
     * @property string The WHMCS admin user
     */
    public $adminUser;

    /**
     * @property TwentyI\API\Authentication
     */
    public $authAPI;

    /**
     * @property TwentyI\API\Services
     */
    public $servicesAPI;

    /**
     * @property string The field ref (number) for the stack users on clients
     */
    public $stackUserCustomField;

    /**
     * Builds the object given WHMCS params.
     * @param object $config {
     *     @var string $servicesAPIKey
     *     @var string $authAPIKey
     *     @var string $stackUserCustomField
     *     @var string $adminUser
     * }
     * @param array|null $params {
     *     @var array $configoption {
     *         @var string $apiKey
     *     }
     *     @var string $domain
     * }
     */
    public function __construct($config, array $params = null) {
        $this->servicesAPI =
            new \TwentyI\API\Services($config->servicesAPIKey);
        $this->authAPI =
            new \TwentyI\API\Authentication($config->authAPIKey);

        $this->authAPI->setUserAgent(self::userAgent());
        $this->servicesAPI->setUserAgent(self::userAgent());
        $this->stackUserCustomField = $config->stackUserCustomField;
        $this->adminUser = $config->adminUser;
    }

    /**
     * Sends the client details to the 20i Stack user.
     *
     * @param array $user_info {
     *     @var int $userid
     *     @var array $olddata {
     *         @var array[] $customfields {
     *             @var string $id
     *             @var string $value
     *         }
     *     }
     *     @var string $firstname
     *     @var string $lastname
     *     @var string|null $companyname
     *     @var string $email
     *     @var string $address1
     *     @var string $address2
     *     @var string $city
     *     @var string $state
     *     @var string $postcode
     *     @var string $country ISO3166 alpha2
     *     @var string $phonenumber
     *     @var string $phonenumberformatted
     * }
     */
    public function hookClientEdit(array $user_info) {
        $master_stack_user = $this->existingMasterStackUser(
            $user_info["olddata"],
            false
        );

        if($master_stack_user) {
            try {
                $this->servicesAPI->postWithFields(
                    "/reseller/*/susers",
                    [
                        "contact" => [
                            $master_stack_user => [
                                "person_name" => implode(" ", [
                                    $user_info["firstname"],
                                    $user_info["lastname"],
                                ]),
                                "company_name" => $user_info["companyname"],
                                "address" => implode("\n", array_filter([
                                    $user_info["address1"],
                                    $user_info["address2"],
                                ])),
                                "city" => $user_info["city"],
                                "sp" => $user_info["state"],
                                "pc" => $user_info["postcode"],
                                "cc" => $user_info["country"],
                                "voice" => trim(str_replace(" ", "", $user_info["phonenumber"])),
                                "email" => $user_info["email"],
                            ],
                        ],
                    ]
                );

            } catch(\TwentyI\API\Exception $e) {
                trigger_error($e->getMessage());
            }
        }
    }
}
