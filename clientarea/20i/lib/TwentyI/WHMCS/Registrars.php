<?php
namespace TwentyI\WHMCS;

use Illuminate\Database\Capsule\Manager as Capsule;
use WHMCS\Domains\DomainLookup\SearchResult;
use WHMCS\Domains\DomainLookup\ResultsList;

/**
 * This class is for registrar WHMCS activities
 */
class Registrars extends Base {
    private static $contactFieldMap = [
        "postalInfo" => [
            "name" => ["separator" => " ", "fields" => ["First Name", "Last Name"]],
            "org" => "Company Name",
            "addr" => [
                "street" => ["Address 1", "Address 2"],
                "city" => "City",
                "sp" => "State",
                "pc" => "Postcode",
                "cc" => "Country",
            ],
        ],
        "voice" => "Phone Number",
        "email" => "Email Address",
        "extension" => [
            "trad-name" => "Trading Name",
            "type" => "Nominet Registrant Type",
            "co-no" => "Company Number",
            "opt-out" => "Opt-out of WHOIS",
        ],
    ];

    /**
     * Returns an API-acceptable contact from the supplied WHMCS array.
     *
     * @param array $in
     * @param array|null $map Should only be set recursively.
     * @return object
     */
    private static function arrayToContact(array $in = null, array $map = null) {
        if(isset($in)) {
            if(!isset($map)) {
                $map = self::$contactFieldMap;
            }
            $contact = (object)[];
            foreach($map as $k => $v) {
                if(is_string($v)) {
                    $contact->$k = $in[$v];
                } elseif(isset($v[0])) {
                    $contact->$k = [];
                    $i = 0;
                    foreach($v as $f) {
                        $contact->{$k}[] = $in[$f];
                        $i++;
                    }
                } elseif(isset($v["separator"]) and isset($v["fields"])) {
                    $contact->$k = implode(
                        $v["separator"],
                        array_map(function($f) use ($in) {return $in[$f];}, $v["fields"])
                    );
                } else {
                    $contact->$k = self::arrayToContact($in, $v);
                }
            }
            return $contact;
        } else {
            return $in;
        }
    }

    /**
     * Returns a WHMCS-acceptable contact array from the supplied object.
     *
     * @param object $contact
     * @param array|null $map Should only be set recursively.
     * @return array A plain k-v map.
     */
    private static function contactToArray($contact = null, array $map = null) {
        if(isset($contact)) {
            if(!isset($map)) {
                $map = self::$contactFieldMap;
            }
            $out = [];
            foreach($map as $k => $v) {
                if(is_string($v)) {
                    $out[$v] = $contact->$k;
                } elseif(isset($v[0])) {
                    $i = 0;
                    foreach($v as $f) {
                        $out[$f] = $contact->{$k}[$i];
                        $i++;
                    }
                } elseif(isset($v["separator"]) and isset($v["fields"])) {
                    $values = explode($v["separator"], $contact->$k);
                    $extra_count = count($values) - count($v["fields"]);
                    if($extra_count > 0) {
                        array_splice(
                            $values,
                            0,
                            $extra_count,
                            implode(" ", array_slice($values, 0, $extra_count))
                        );
                    }
                    $i = 0;
                    foreach($v["fields"] as $f) {
                        $out[$f] = $values[$i];
                        $i++;
                    }
                } else {
                    $out += self::contactToArray($contact->$k, $v);
                }
            }
            return $out;
        } else {
            return [];
        }
    }

    /**
     * Sometimes the WHMCS database has garbage for the domain name, eg.
     * following imports or switches from another provider. This tries to fix
     * that garbage.
     *
     * @param string $name eg. " example.org^M"
     * @return string eg. "example.org"
     */
    private static function lessGarbageName($name) {
        return trim($name);
    }

    /**
     * Returns the client details part of the request.
     *
     * @param array $params {
     *     @var string $userid
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
        return localAPI(
            "getClientsDetails",
            [
                "clientid" => $params["userid"],
            ],
            $this->adminUser
        );
    }

    /**
     * Returns an API-format contact hash from the given WHMCS request.
     *
     * @param array $params {
     *     @var string $sld
     *     @var string $tld
     *     @var string|null $companyname
     *     @var string $fullname
     *     @var string $address1
     *     @var string $address2
     *     @var string $fullphonenumber
     *     @var string $email
     *     @var string $countrycode
     *     @var string $postcode
     *     @var string|null $state
     *     @var string $city
     * }
     * @param string $field_prefix
     * @return array {
     *     @var string|null $organisation
     *     @var string $name
     *     @var string $address
     *     @var string $telephone,
     *     @var string $email
     *     @var string $cc
     *     @var string|null $pc
     *     @var string|null $sp
     *     @var string $city
     *     @var array|null $extension
     * }
     */
    protected function contactInfoFromRequest(array $params, $field_prefix = "") {
        $name = self::lessGarbageName($params["sld"] . "." . $params["tld"]);
        $whmcs_uk_types_to_nominet = [
            "Individual" => "IND",
            "UK Limited Company" => "LTD",
            "UK Public Limited Company" => "PLC",
            "UK Partnership" => "PTNR",
            "UK Limited Liability Partnership" => "LLP",
            "Sole Trader" => "STRA",
            "UK Registered Charity" => "RCHAR",
            "UK Entity (other)" => "OTHER",
            "Foreign Organization" => "FCORP",
            "Other foreign organizations" => "FOTHER",
            "UK Industrial/Provident Registered Company" => "IP",
            "UK School" => "SCH",
            "UK Government Body" => "GOV",
            "UK Corporation by Royal Charter" => "CRC",
            "UK Statutory Body" => "STAT",
            "Non-UK Individual" => "FIND",
        ];
        if(preg_match('/[.]uk$/i', $name) and !$field_prefix) {
            $extension = array_filter([
                "trad-name" => null, // Not yet implemented??
                "type" => isset($params["additionalfields"]["Legal Type"]) ?
                    $whmcs_uk_types_to_nominet[$params["additionalfields"]["Legal Type"]] :
                    null,
                "co-no" => @$params["additionalfields"]["Company ID Number"],
                "opt-out" => @$params["additionalfields"]["WHOIS Opt-out"] ? "Y" : "N",
            ]);
        } else {
            $extension = null;
        }
        /* Nominet's name mapping rules are simply that it takes org followed by name, so... */
        if(@$params["additionalfields"]["Registrant Name"] and !$field_prefix) {
            $effective_org = $params["additionalfields"]["Registrant Name"];
        } else {
            $effective_org = $params[$field_prefix . "companyname"] ?:
                (
                    @$params[$field_prefix . "fullname"] ?:
                    implode(" ", [
                        $params[$field_prefix . "firstname"],
                        $params[$field_prefix . "lastname"]
                    ])
                );
        }
        return [
            "organisation" => $effective_org,
            "name" =>
                @$params[$field_prefix . "fullname"] ?:
                implode(" ", [
                    $params[$field_prefix . "firstname"],
                    $params[$field_prefix . "lastname"]
                ]),
            "address" => implode("\n", [
                $params[$field_prefix . "address1"],
                $params[$field_prefix . "address2"],
            ]),
            "telephone" => $params[$field_prefix . "fullphonenumber"],
            "email" => $params[$field_prefix . "email"],
            "cc" => @$params[$field_prefix . "countrycode"] ?: $params[$field_prefix . "country"],
            "pc" => $params[$field_prefix . "postcode"],
            "sp" => $params[$field_prefix . "state"],
            "city" => $params[$field_prefix . "city"],
            "extension" => $extension,
        ];
    }

    /**
     * @var array The config options for the <m>_ConfigOptions() entry point
     */
    public static $CONFIG_OPTIONS = [
        /*"servicesAPIKey" => [ // 1
            "FriendlyName" => "Services API Key (deprecated)",
            "Type" => "password",
            "Size" => 32,
            "Description" => "Please do not use",
        ],
        "authAPIKey" => [ // 2
            "FriendlyName" => "Auth API Key (deprecated)",
            "Type" => "password",
            "Size" => 32,
            "Description" => "Please do not use",
        ],*/
        "combinedAPIKey" => [ // 5
            "FriendlyName" => "Password",
            "Type" => "password",
            "Size" => 48,
            "Description" => "Your combined API key",
        ],
        "adminUser" => [ // 3
            "FriendlyName" => "WHMCS Admin user",
            "Type" => "dropdown",
            "Options" => [],
            "Description" => "A WHMCS admin user, required to correctly complete setups",
        ],
        "stackUserCustomField" => [ // 4
            "FriendlyName" => "Stack User custom field",
            "Type" => "dropdown",
            "Options" => [],
            "Description" => "The custom field you're using for stack user details, see documentation",
        ],
        "allowUKPrivacy" => [
            "FriendlyName" => "Enable paid privacy service for .UK",
            "Type" => "yesno",
            "Description" => "This lets you register .uk domains with paid domain privacy (different from WHOIS opt-out)",
        ],
    ];

    /**
     * @var array The config options for the <m>_DomainSuggestionOptions() entry point
     */
    public static $SUGGESTION_CONFIG_OPTIONS = [
        "useRealSuggestions" => [
            "FriendlyName" => "Use registry-supplied suggestions",
            "Type" => "yesno",
            "Description" => "",
        ],
    ];

    /**
     * Builds the config from database then returns an object.
     *
     * @return self|null
     */
    public static function any() {
        $config_fields = [];
        foreach(Capsule::table('tblregistrars')->where("registrar", "=", "domain20i")->get() as $config) {
            $config_fields[$config->setting] = Decrypt($config->value);
        }
        if($config_fields) {
            return self::fromRequest($config_fields);
        }
        return null;
    }

    /**
     * Returns the options for configuration of the product.
     * @return array
     */
    public static function configOptions() {
        $options = parent::configOptions();
        $config = [];
        $query = Capsule::table('tblregistrars')
            ->where("registrar", "=", "domain20i");
        foreach($query->get() as $field) {
            $config[$field->setting] = Decrypt($field->value);
        }
        if(@$config["servicesAPIKey"]) {
            $options["combinedAPIKey"]["Default"] =
                implode("+", [$config["servicesAPIKey"], $config["authAPIKey"]]);
        }
        return $options;
    }

    /**
     * Returns an object given WHMCS params.
     *
     * @param array $params {
     *     @var array $configoption {
     *         @var string $apiKey
     *     }
     *     @var string $domain
     * }
     * @return self
     */
    public static function fromRequest(array $params) {
        return new self((object) $params, $params);
    }

    /**
     * @property bool True if .uk privacy is allowed
     */
    public $allowUKPrivacy;

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
    public function __construct($product_config, array $params = null) {
        if($product_config->combinedAPIKey) {
            list($services_key, $auth_key) = explode("+", $product_config->combinedAPIKey);
            $product_config->servicesAPIKey = $services_key;
            $product_config->authAPIKey = $auth_key;
        }
        $this->allowUKPrivacy = $product_config->allowUKPrivacy;
        parent::__construct($product_config, $params);
    }

    /**
     * Checks if a domain can be registered.
     *
     * @param array $params {
     *     @param string $searchTerm
     *     @param string|null $punyCodeSearchTerm
     *     @param string[] $tldsToInclude eg. [".uk"]
     *     @param bool $isIdnDomain
     *     @param bool $premiumEnabled
     *     ...
     * }
     * @return WHMCS\Domains\DomainLookup\ResultsList<WHMCS\Domains\DomainLookup\SearchResult[]>
     */
    public function checkAvailability(array $params) {
        $search = $params["isIdnDomain"] ?
            $params["punyCodeSearchTerm"] :
            $params["searchTerm"];
        $expanded_names = array_map(
            function($tld) use ($search) {
                return $search . $tld;
            },
            $params["tldsToInclude"]
        );
        $results = $this->servicesAPI->getWithFields(
            "/domain-search/" . implode(",", $expanded_names),
            [
                "detailed" => +(count($expanded_names) < 3),
            ]
        );
        $header = array_shift($results);
        $out = new ResultsList();
        foreach($results as $result) {
            if(preg_match("/^\Q{$search}\E(?<tld>[.].+)/", $result->name, $md)) {
                $prefix = $search;
                $tld = $md["tld"];
            } else {
                list($prefix, $tld) = explode(".", $result->name, 2);
                $tld = "." . $tld;
            }
            $sr = new SearchResult($prefix, $tld);
            switch($result->can) {
                case "register":
                    $sr->setStatus(SearchResult::STATUS_NOT_REGISTERED);
                    break;
                case "transfer":
                case "transfer?":
                case "transfer-prepare":
                    $sr->setStatus(SearchResult::STATUS_REGISTERED);
                    break;
                default:
                    $sr->setStatus(SearchResult::STATUS_UNKNOWN);
                    break;
            }
            $out->append($sr);
        }
        return $out;
    }

    /**
     * Creates the service.
     *
     * @param array $params {
     *     @var string $sld
     *     @var string $tld
     *     @var int $regperiod
     *     @var string|null $companyname
     *     @var string $fullname
     *     @var string $address1
     *     @var string $address2
     *     @var string $fullphonenumber
     *     @var string $email
     *     @var string $countrycode
     *     @var string $postcode
     *     @var string|null $state
     *     @var string $city
     *     @var string|null $adminfirstname
     *     @var string|null $adminlastname
     *     @var string|null $admincompanyname
     *     @var string|null $adminemail
     *     @var string|null $adminaddress1
     *     @var string|null $adminaddress2
     *     @var string|null $admincity
     *     @var string|null $adminstate
     *     @var string|null $adminpostcode
     *     @var string|null $admincountry
     *     @var string|null $adminfullphonenumber
     *     @var string $ns1
     *     @var string|null $ns2
     *     @var string|null $ns3
     *     @var string|null $ns4
     *     @var string|null $ns5
     *     @var bool|null $dnsmanagement
     *     @var bool|null $emailforwarding
     *     @var bool|null $idprotection
     * }
     * @throws TwentyI\API\Exception
     * @return bool
     */
    public function create(array $params) {
        $master_stack_user = $this->masterStackUserForRequest($params);

        $name = self::lessGarbageName($params["sld"] . "." . $params["tld"]);

        $nameservers = array_values(array_filter(
            $params,
            function($v, $k) {
                return(preg_match('/^ns[0-9]/', $k) and $v);
            },
            ARRAY_FILTER_USE_BOTH
        ));

        $response = $this->servicesAPI->postWithFields(
            "/reseller/*/addDomain",
            [
                "name" => $name,
                "years" => $params["regperiod"],
                "contact" => $this->contactInfoFromRequest($params),
                /*"limits" => [
                    "mailCatchAllForwarders" => $params["emailforwarding"] ?
                        1 :
                        0,
                    "mailForwarders" => $params["emailforwarding"] ?
                        "INF" :
                        0,
                ],*/
                "otherContacts" => [
                    "admin" => @$params["adminemail"] ?
                        $this->contactInfoFromRequest($params, "admin") :
                        null,
                    "tech" => @$params["techemail"] ?
                        $this->contactInfoFromRequest($params, "tech") :
                        null,
                    "billing" => @$params["billingemail"] ?
                        $this->contactInfoFromRequest($params, "billing") :
                        null,
                ],
                "nameservers" => $nameservers,
                "stackUser" => $master_stack_user,
                "privacyService" =>
                (
                    @$params["idprotection"] and
                    (
                        $this->allowUKPrivacy or
                        !preg_match("/[.]uk$/i", $name)
                    )
                ),
            ]
        );
        return $response->result;
    }

    /**
     * Fetches the current contacts
     *
     * @param array $params {
     *     @var string $sld
     *     @var string $tld
     * }
     * @throws TwentyI\API\Exception
     * @return array {
     *     @var string|null $error
     *     @var array $Registrant {
     *         @var string $First_Name
     *         @var string $Last_Name
     *         @var string|null $Company_Name
     *         @var string $Email_Address
     *         @var string $Address_1
     *         @var string|null $Address_2
     *         @var string $City
     *         @var string|null $State
     *         @var string|null $Postcode
     *         @var string $Country
     *         @var string $Phone_Number
     *         @var string|null $Fax_Number
     *     }
     *     @var array|null $Technical See $Registrant
     *     @var array|null $Billing See $Registrant
     *     @var array|null $Admin See $Registrant
     * }
     */
    public function getContacts(array $params) {
        $name = self::lessGarbageName($params["sld"] . "." . $params["tld"]);
        $contacts = $this->servicesAPI->getWithFields("/domain/{$name}/contacts");

        return array_filter([
            "Registrant" => self::contactToArray(@$contacts->registrant),
            "Technical" => self::contactToArray(@$contacts->technical),
            "Billing" => self::contactToArray(@$contacts->billing),
            "Admin" => self::contactToArray(@$contacts->admin),
        ]);
    }

    /**
     * Fetches the current nameservers
     *
     * @param array $params {
     *     @var string $sld
     *     @var string $tld
     * }
     * @throws TwentyI\API\Exception
     * @return string[] The nameservers
     */
    public function getNameservers(array $params) {
        $name = self::lessGarbageName($params["sld"] . "." . $params["tld"]);
        return $this->servicesAPI->getWithFields("/domain/{$name}/nameservers");
    }

    /**
     * Checks for suggested domain registrations
     *
     * @param array $params {
     *     @param string $searchTerm
     *     @param string|null $punyCodeSearchTerm
     *     @param string[] $tldsToInclude eg. ["uk"]
     *     @param bool $isIdnDomain
     *     @param bool $premiumEnabled
     *     @param array $suggestionSettings
     *     ...
     * }
     * @return WHMCS\Domains\DomainLookup\ResultsList<WHMCS\Domains\DomainLookup\SearchResult[]>
     */
    public function getSuggestions(array $params) {
        $search = $params["isIdnDomain"] ?
            $params["punyCodeSearchTerm"] :
            $params["searchTerm"];
        $results = $this->servicesAPI->getWithFields(
            "/domain-search/{$search}",
            [
                "suggestOnly" => true,
            ]
        );
        $header = array_shift($results);
        $out = new ResultsList();
        foreach($results as $result) {
            if(preg_match("/^\Q{$search}\E(?<tld>[.].+)/", $result->name, $md)) {
                $prefix = $search;
                $tld = $md["tld"];
            } else {
                list($prefix, $tld) = explode(".", $result->name, 2);
                $tld = "." . $tld;
            }
            if(in_array(
                preg_replace("/^[.]/", "", $tld),
                $params["tldsToInclude"]
            )) {
                $sr = new SearchResult($prefix, $tld);
                $sr->setStatus(SearchResult::STATUS_NOT_REGISTERED);
                $out->append($sr);
            }
        }
        return $out;
    }

    /**
     * Returns upstream info about a domain.
     *
     * @param array $params {
     *     @var string $domainid
     *     @var string $domain
     *     @var string $sld
     *     @var string $tld
     *     @var string $registrar
     *     @var string $regperiod
     *     @var string $status
     *     @var string $dnsmanagement
     *     @var string $emailforwarding
     *     @var string $idprotection
     * }
     * @return array {
     *     @var bool $active
     *     @var bool $expired
     *     @var string $expirydate
     * }
     */
    public function info(array $params) {
        $name = self::lessGarbageName($params["domain"]);
        $expiry_date =
            $this->servicesAPI->getWithFields(
                "/domain/{$name}/upstreamExpiryDate"
            );
        $contract =
            $this->servicesAPI->getWithFields(
                "/domain/{$name}/contract"
            );
        return [
            "active" => $expiry_date and !$contract->overdue,
            "expired" => $contract->overdue,
            "expirydate" => $expiry_date,
        ];
    }

    /**
     * Renews the service.
     *
     * @param array $params {
     *     @var string $sld
     *     @var string $tld
     *     @var int $regperiod
     * }
     * @throws TwentyI\API\Exception
     * @return bool
     */
    public function renew(array $params) {
        $name = self::lessGarbageName($params["sld"] . "." . $params["tld"]);
        $response = $this->servicesAPI->postWithFields(
            "/reseller/*/renewDomain",
            [
                "name" => $name,
                "years" => $params["regperiod"],
            ]
        );
        return $response->result;
    }

    /**
     * Updates the current contacts
     *
     * @param array $params {
     *     @var array $contactdetails {
     *         @var array $Registrant {
     *             @var string $First_Name
     *             @var string $Last_Name
     *             @var string|null $Company_Name
     *             @var string $Email_Address
     *             @var string $Address_1
     *             @var string|null $Address_2
     *             @var string $City
     *             @var string|null $State
     *             @var string|null $Postcode
     *             @var string $Country
     *             @var string $Phone_Number
     *             @var string|null $Fax_Number
     *         }
     *         @var array|null $Technical See $Registrant
     *         @var array|null $Billing See $Registrant
     *         @var array|null $Admin See $Registrant
     *     }
     *     ...
     * }
     * @throws TwentyI\API\Exception
     * @return bool
     */
    public function setContacts(array $params) {
        $name = self::lessGarbageName($params["sld"] . "." . $params["tld"]);

        $response =
            $this->servicesAPI->postWithFields(
                "/domain/{$name}/contacts",
                array_filter([
                    "registrant" => self::arrayToContact(@$params["contactdetails"]["Registrant"]),
                    "technical" => self::arrayToContact(@$params["contactdetails"]["Technical"]),
                    "billing" => self::arrayToContact(@$params["contactdetails"]["Billing"]),
                    "admin" => self::arrayToContact(@$params["contactdetails"]["Admin"]),
                ])
            );
        return $response->result;
    }

    /**
     * Updates the current nameservers
     *
     * @param array $params {
     *     @var string $sld
     *     @var string $tld
     *     @var string $ns1
     *     @var string|null $ns2
     *     @var string|null $ns3
     *     @var string|null $ns4
     *     @var string|null $ns5
     * }
     * @throws TwentyI\API\Exception
     * @return bool
     */
    public function setNameservers(array $params) {
        $name = self::lessGarbageName($params["sld"] . "." . $params["tld"]);

        $new_ns = array_filter(
            $params,
            function($v, $k) {
                return(preg_match('/^ns[0-9]/', $k) and $v);
            },
            ARRAY_FILTER_USE_BOTH
        );
        $old_ns = $this->getNameservers($params);
        $add_ns = array_values(array_diff($new_ns, $old_ns));
        $rem_ns = array_values(array_diff($old_ns, $new_ns));

        $response =
            $this->servicesAPI->postWithFields(
                "/domain/{$name}/nameservers",
                [
                    "ns" => $add_ns,
                    "old-ns" => $rem_ns,
                ]
            );
        return $response->result;
    }

    /**
     * Logs into Stack as the service.
     *
     * @param array $params {
     *     @var string $domainid
     *     ...
     * }
     * @throws TwentyI\API\Exception
     * @throws
     * @return string The single-sign-on URL.
     */
    public function singleSignOn(array $params) {
        $domain = Capsule::table('tbldomains')->find($params["domainid"]);
        if(false and !$domain->emailforwarding) {
            $scopes = [
                "default",
                "no+mailCatchAllForwarders",
                "no+mailForwarders"
            ];
        } else {
            $scopes = null;
        }
        $client_info = localAPI(
            "getClientsDetails",
            [
                "clientid" => $domain->userid,
            ],
            $this->adminUser
        );
        $master_stack_user = $this->existingMasterStackUser($client_info);
        if($master_stack_user) {
            $token_info =
                $this->authAPI->controlPanelTokenForUser(
                    $master_stack_user,
                    $scopes
                );
            return $this->servicesAPI->singleSignOn(
                $token_info->access_token,
                $domain->domain
            );
        } else {
            throw new \Exception("Single-sign-on requires a master stack user");
        }
    }

    /**
     * Starts a transfer
     *
     * @param array $params {
     *     @var string $domainid
     *     @var string $sld
     *     @var string $tld
     *     @var int $regperiod {
     *         The number of years to add. Since WHMCS does not support 0-year
     *         transfers, if regperiod is 1 the domain will be inspected and if
     *         its first payment was 0 this value will be taken to be 0 also.
     *
     *         If the first payment was more than 0 but the registry does not
     *         support years on transfer (eg. for .uk), the domain will be
     *         implicitly renewed for the supplied period after transfer.
     *     }
     *     @var string|null $companyname
     *     @var string $fullname
     *     @var string $address1
     *     @var string $address2
     *     @var string $fullphonenumber
     *     @var string $email
     *     @var string $countrycode
     *     @var string $postcode
     *     @var string|null $state
     *     @var string $city
     *     @var string|null $adminfirstname
     *     @var string|null $adminlastname
     *     @var string|null $admincompanyname
     *     @var string|null $adminemail
     *     @var string|null $adminaddress1
     *     @var string|null $adminaddress2
     *     @var string|null $admincity
     *     @var string|null $adminstate
     *     @var string|null $adminpostcode
     *     @var string|null $admincountry
     *     @var string|null $adminfullphonenumber
     *     @var string|null $eppcode
     *     @var string $ns1
     *     @var string|null $ns2
     *     @var string|null $ns3
     *     @var string|null $ns4
     *     @var string|null $ns5
     *     @var bool|null $dnsmanagement
     *     @var bool|null $emailforwarding
     *     @var bool|null $idprotection
     * }
     * @throws TwentyI\API\Exception
     * @return bool
     * }
     * @throws TwentyI\API\Exception
     * @return bool
     */
    public function transfer(array $params) {
        $master_stack_user = $this->masterStackUserForRequest($params);

        $name = self::lessGarbageName($params["sld"] . "." . $params["tld"]);

        if($params["regperiod"] == 1) {
            // Stop! Workaround time!
            $domain = Capsule::table('tbldomains')
                ->where("id", "=", $params["domainid"])
                ->first();
            if(preg_match("/[.]uk$/i", $name) && $domain->firstpaymentamount == 0.00) { // Allow free .UK transfers
                $years = 0;
            } else {
                $years = $params["regperiod"];
            }
        } else {
            $years = $params["regperiod"];
        }

        $nameservers = array_values(array_filter(
            $params,
            function($v, $k) {
                return(preg_match('/^ns[0-9]/', $k) and $v);
            },
            ARRAY_FILTER_USE_BOTH
        ));

        $response = $this->servicesAPI->postWithFields(
            "/reseller/*/transferDomain",
            [
                "name" => $name,
                "years" => $years,
                "emulateYears" => 1,
                "contact" => $this->contactInfoFromRequest($params),
                /*"limits" => [
                    "mailCatchAllForwarders" => $params["emailforwarding"] ?
                        1 :
                        0,
                    "mailForwarders" => $params["emailforwarding"] ?
                        "INF" :
                        0,
                ],*/
                "otherContacts" => [
                    "admin" => @$params["adminemail"] ?
                        $this->contactInfoFromRequest($params, "admin") :
                        null,
                    "tech" => @$params["techemail"] ?
                        $this->contactInfoFromRequest($params, "tech") :
                        null,
                    "billing" => @$params["billingemail"] ?
                        $this->contactInfoFromRequest($params, "billing") :
                        null,
                ],
                "authcode" => @$params["eppcode"],
                "nameservers" => $nameservers,
                "stackUser" => $master_stack_user,
                "privacyService" =>
                    (
                        @$params["idprotection"] and
                        (
                            $this->allowUKPrivacy or
                            !preg_match("/[.]uk$/i", $name)
                        )
                    ),
            ]
        );
        return $response->result;
    }

    /**
     * Returns upstream info about a domain transfer.
     *
     * @param array $params {
     *     @var string $domainid
     *     @var string $domain
     *     @var string $sld
     *     @var string $tld
     *     @var string $registrar
     *     @var string $regperiod
     *     @var string $status
     *     @var string $dnsmanagement
     *     @var string $emailforwarding
     *     @var string $idprotection
     * }
     * @return array {
     *     @var bool|null $completed
     *     @var string|null $expirydate
     *     @var bool|null $failed
     *     @var string|null $reason If failed
     * }
     */
    public function transferInfo(array $params) {
        $name = self::lessGarbageName($params["domain"]);
        $pending_transfer =
            $this->servicesAPI->getWithFields(
                "/domain/{$name}/pendingTransfer"
            );
        if($pending_transfer) {
            $expiry_date = null;
        } else {
            $expiry_date =
                $this->servicesAPI->getWithFields(
                    "/domain/{$name}/upstreamExpiryDate"
                );
        }
        return [
            "completed" => !$pending_transfer,
            "expiry_date" => $expiry_date,
            "failed" => ($pending_transfer == "failed"),
            "reason" => null,
        ];
    }

    /**
     * Updates mutable state for a domain.
     *
     * @param array $params {
     *     @var string $domainid
     *     @var string $domain
     *     @var string $sld
     *     @var string $tld
     *     @var string $registrar
     *     @var string $regperiod
     *     @var string $status
     *     @var string $dnsmanagement
     *     @var string $emailforwarding
     *     @var string $idprotection
     * }
     */
    public function update(array $params) {
        if(false) {
            $name = self::lessGarbageName($params["domain"]);
            $this->servicesAPI->postWithFields(
                "/reseller/*/domainLimit",
                [
                    "domainId" => [$name],
                    "limits" => [
                        "mailCatchAllForwarders" => $params["emailforwarding"] ?
                            1 :
                            0,
                        "mailForwarders" => $params["emailforwarding"] ?
                            "INF" :
                            0,
                    ],
                ]
            );
        }
    }
}
