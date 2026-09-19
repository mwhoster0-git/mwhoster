<?php
namespace TwentyI\WHMCS;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
 * This class is for common WHMCS activities
 */
class Provisioning extends Base {
    /**
     * @var array The config options for the <m>_ConfigOptions() entry point
     */
    public static $CONFIG_OPTIONS = [
        "typeCode" => [ // 1
            "FriendlyName" => "Type Code",
            "Type" => "text",
            "Size" => 32,
            "Description" => "The type of this hosting service",
        ],
        "adminUser" => [ // 2
            "FriendlyName" => "WHMCS Admin user",
            "Type" => "dropdown",
            "Options" => [],
            "Description" => "A WHMCS admin user, required to correctly complete setups",
        ],
        "stackUserCustomField" => [ // 3
            "FriendlyName" => "Stack User custom field",
            "Type" => "dropdown",
            "Options" => [],
            "Description" => "The custom field you're using for stack user details, see documentation",
        ],
    ];

    /**
     * @return self|null
     */
    public static function any() {
        $server_config = Capsule::table('tblservers')
            ->where("type", "=", "provision20i")
            ->first();
        $product_config = Capsule::table('tblproducts')
            ->where("servertype", "=", "provision20i")
            ->first();
        if($server_config and $product_config) {
            $password = Decrypt($server_config->password);
            return new self(
                (object)["password" => $password],
                $product_config
            );
        } else {
            return null;
        }
    }

    /**
     * Returns the options for configuration of the product.
     * @return array
     */
    public static function configOptions() {
        $options = parent::configOptions();
        $server_config = Capsule::table('tblservers')
            ->where("type", "=", "provision20i")
            ->first();
        if($server_config) {
            $password = Decrypt($server_config->password);
            if($password) {
                list($services_key) = explode("+", $password);
                $services_api = new \TwentyI\API\Services($services_key);
                $services_api->setUserAgent(self::userAgent());
                $types = $services_api->getWithFields(
                    "/reseller/*/packageTypes"
                );
                $type_options = [];
                foreach($types as $type) {
                    $type_options[$type->id] = $type->label;
                }
                $options["typeCode"]["Type"] = "dropdown";
                $options["typeCode"]["Options"] = $type_options;
            }
        }
        return $options;
    }

    /**
     * Returns an object given WHMCS params.
     *
     * @param array $params {
     *     @var string $serverpassword
     * }
     * @return self
     */
    public static function fromRequest(array $params) {
        return new self(
            (object) ["password" => $params["serverpassword"]],
            (object) $params,
            $params
        );
    }

    /**
     * @property string
     */
    private $serviceId;

    /**
     * @property string|null
     */
    private $storedPackageId;

    /**
     * Returns the client details part of the request.
     *
     * @param array $params {
     *     @var array $clientsdetails
     * }
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
    protected function clientsDetails(array $params) {
        return $params["clientsdetails"];
    }

    /**
     * @property string|null
     */
    public $domain;

    /**
     * @property string The type reference
     */
    public $typeCode;

    /**
     * Builds the object given WHMCS params.
     * @param object $server_config {
     *     @var string $password
     * }
     * @param object $product_config {
     *     @var mixed $configoption1
     *     @var mixed $configoption2
     *     @var mixed $configoption3
     * }
     * @param array|null $params {
     *     @var array $customfields {
     *         @var string $packageId
     *     }
     *     @var string $domain
     *     @var string $serviceid
     * }
     */
    public function __construct($server_config, $product_config, array $params = null) {
        list($services_key, $auth_key) = explode("+", $server_config->password);
        parent::__construct((object) [
            "servicesAPIKey" => $services_key,
            "authAPIKey" => $auth_key,
            "stackUserCustomField" => $product_config->configoption3,
            "adminUser" => $product_config->configoption2,
        ], $params);
        $this->typeCode = $product_config->configoption1;

        if($params) {
            $this->domain = $params["domain"];
            $this->serviceId = $params["serviceid"];
            $this->storedPackageId = $params["customfields"]["packageId"];
        }
    }

    /**
     * Property getter
     *
     * @param string $n
     * @return mixed
     */
    public function __get($n) {
        switch($n) {
            /**
             * @property string|null $packageId The package ID, if there is one.
             */
            case "packageId":
                if($this->storedPackageId and $this->storedPackageId == "*") {
                    $package_info = $this->servicesAPI->getWithFields(
                        "/package/{$this->domain}"
                    );
                    $this->storedPackageId = $package_info->id;
                    if($this->storedPackageId) {
                        localAPI(
                            "updateClientProduct",
                            [
                                "serviceid" => $this->serviceId,
                                "customfields" => base64_encode(serialize([
                                    "packageId" => $this->storedPackageId,
                                ]))
                            ],
                            $this->adminUser
                        );
                    }
                }
                return $this->storedPackageId;
            default:
                return null;
        }
    }

    /**
     * Creates the service.
     *
     * @param array $params {
     *     @var array $customfields {
     *         @var string $otherNames Comma-separated list of other names for
     *             the site.
     *     }
     * }
     * @throws TwentyI\API\Exception
     * @return int
     */
    public function create(array $params) {
        $other_domain_names = $params["customfields"]["otherNames"] ?
            preg_split('/,/', $params["customfields"]["otherNames"]) :
            [];
        $master_stack_user = $this->masterStackUserForRequest($params);

        $response = $this->servicesAPI->postWithFields(
            "/reseller/*/addWeb",
            [
              "type" => $this->typeCode,
              "domain_name" => $this->domain,
              "extra_domain_names" => $other_domain_names,
              "stackUser" => $master_stack_user,
            ]
        );
        if($response) {
            localAPI(
                "updateClientProduct",
                [
                    "serviceid" => $this->serviceId,
                    "customfields" => base64_encode(serialize([
                        "packageId" => $response->result,
                    ]))
                ],
                $this->adminUser
            );
        }
        return $response;
    }

    /**
     * Removes the service.
     *
     * @throws TwentyI\API\Exception
     * @return int 1 if removed successfully
     */
    public function delete() {
        if(!$this->packageId) {
            throw new \Exception("Cannot delete without package ID");
        }
        return $this->servicesAPI->postWithFields(
            "/reseller/*/updatePackage",
            [
                "id" => [$this->packageId],
                "delete-id" => [$this->packageId],
            ]
        );
    }

    /**
     * Disables the service
     *
     * @throws TwentyI\API\Exception
     * @return mixed
     */
    public function disable() {
        if(!$this->packageId) {
            throw new \Exception("Cannot disable without package ID");
        }
        return $this->servicesAPI->postWithFields(
            "/package/{$this->packageId}/userStatus",
            [
              "subservices" => [
                "default" => false,
              ],
            ]
        );
    }

    /**
     * Enables the service
     *
     * @throws TwentyI\API\Exception
     * @return mixed
     */
    public function enable() {
        if(!$this->packageId) {
            throw new \Exception("Cannot enable without package ID");
        }
        return $this->servicesAPI->postWithFields(
            "/package/{$this->packageId}/userStatus",
            [
              "subservices" => [
                "default" => true,
              ],
            ]
        );
    }


    /**
     * Modifies the type of an existing service
     *
     * @param array $params {
     * }
     * @throws TwentyI\API\Exception
     * @return int
     */
      public function modifyType(array $params) {
        $master_stack_user = $this->masterStackUserForRequest($params);

        $response = $this->servicesAPI->postWithFields(
            "/reseller/*/updatePackage",
            [
                "id" => [
                    $this->packageId,
                ],
                "packageBundleTypes" => [
                    $this->packageId => $this->typeCode,
                ]
            ]
        );
        return $response->result;
    }


    /**
     * Logs into Stack as the service.
     *
     * If the service ref is currently "*", in addition to the ref being
     * autodetected, any existing master stack user will be granted access to
     * the service.
     *
     * @param array $params
     * @throws TwentyI\API\Exception
     * @throws Exception
     * @return string The single-sign-on URL.
     */
    public function singleSignOn(array $params) {
        $master_stack_user = $this->existingMasterStackUserForRequest($params);
        if(
            $this->storedPackageId and
            $this->storedPackageId == "*" and
            $master_stack_user
        ) {
            logModuleCall(
                "provision20i",
                __FUNCTION__,
                $params,
                null,
                "(" . \TwentyI\WHMCS\Base::shortVersion() . ") Overriding access to {$this->domain} to include {$master_stack_user} in StackCP. Please note that this only covers PackageId=*."
            );
            $this->servicesAPI->postWithFields(
                "/reseller/*/susers",
                [
                    "grant_map" => [
                        $master_stack_user => [
                            $this->packageId => true,
                        ]
                    ]
                ]
            );
        }
        if($master_stack_user) {
            $token_info =
                $this->authAPI->controlPanelTokenForUser($master_stack_user);
            if($this->packageId) {
                $package_info = $this->servicesAPI->getWithFields(
                    "/package/{$this->packageId}"
                );
                return $this->servicesAPI->singleSignOn(
                    $token_info->access_token,
                    $package_info->name
                );
            } else {
                return $this->servicesAPI->singleSignOn(
                    $token_info->access_token,
                    null
                );
            }
        } else {
            if(!$this->packageId) {
                throw new \Exception("Cannot single-sign-on without package ID");
            }
            $package_info = $this->servicesAPI->getWithFields(
                "/package/{$this->packageId}"
            );
            if(!$package_info->stackUsers[0]) {
                throw new \Exception("No stack users to authenticate");
            }
            $token_info =
                $this->authAPI->controlPanelTokenForUser(
                    $package_info->stackUsers[0]
                );
            return $this->servicesAPI->singleSignOn(
                $token_info->access_token,
                $package_info->name
            );
        }
    }
}
