<?php
/**
 * 20i Domain Module
 *
 * @see http://my.20i.com/services/reseller/apiDoc
 *
 * @copyright 2017 20i Limited
 * @license BSD-3-Clause
 */

if (!defined("WHMCS")) {
  die("This file may not be accessed directly");
}

require_once __DIR__ . "/../../../20i/vendor/autoload.php";
\TwentyI\WHMCS\Base::init(__DIR__ . "/api.json");

/**
 * Define available config options (domain suggestions)
 *
 * @return array {
 *     @var array ($option name)
 * }
 */
function domain20i_DomainSuggestionOptions() {
    return \TwentyI\WHMCS\Registrars::$SUGGESTION_CONFIG_OPTIONS;
}

/**
 * Define available config options.
 *
 * @see \TwentyI\WHMCS\Registrars::configOptions()
 *
 * @return array {
 *     @var array ($option name)
 * }
 */
function domain20i_getConfigArray() {
    return [
        "FriendlyName" => [
            "Type" => "System",
            "Value" => "20i",
        ],
    ] + \TwentyI\WHMCS\Registrars::configOptions();
}

/**
 * Registers a domain.
 *
 * @var array $params
 * @return array {
 *     @var bool|null $success
 *     @var string|null $error
 * }
 */
function domain20i_RegisterDomain(array $params)
{
    try {
        $response = \TwentyI\WHMCS\Registrars::fromRequest($params)->create($params);
        if($response) {
            return ["success" => true];
        } else {
            return ["error" => "An unknown error occurred"];
        }
    } catch(\TwentyI\API\HTTPException\PaymentRequired $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );
        return [
            "error" => "There was a problem provisioning the service, please contact support",
        ];
    } catch(\TwentyI\API\HTTPException $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );
        return [
            "error" => "There was a problem provisioning the service, please contact support",
        ];
    }
}

/**
 * Starts a domain transfer
 *
 * @var array $params
 * @return array {
 *     @var bool|null $success
 *     @var string|null $error
 * }
 */
function domain20i_TransferDomain($params)
{
    try {
        $response =
            \TwentyI\WHMCS\Registrars::fromRequest($params)->transfer($params);
        if($response) {
            return ["success" => true];
        } else {
            return ["error" => "An unknown error occurred"];
        }
    } catch(\TwentyI\API\HTTPException\PaymentRequired $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );
        return [
            "error" => "There was a problem provisioning the service, please contact support",
        ];
    } catch(\TwentyI\API\HTTPException $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );
        return [
            "error" => "There was a problem provisioning the service, please contact support",
        ];
    }
}

/**
 * Renews a domain
 *
 * @var array $params
 * @return array {
 *     @var bool|null $success
 *     @var string|null $error
 * }
 */
function domain20i_RenewDomain($params)
{
    try {
        $response = \TwentyI\WHMCS\Registrars::fromRequest($params)->renew($params);
        if($response) {
            return ["success" => true];
        } else {
            return ["error" => "An unknown error occurred"];
        }
    } catch(\TwentyI\API\HTTPException\PaymentRequired $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );
        return [
            "error" => "There was a problem provisioning the service, please contact support",
        ];
    } catch(\TwentyI\API\HTTPException $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );
        return [
            "error" => "There was a problem provisioning the service, please contact support",
        ];
    }
}

/**
 * Provides single-sign-on to the service
 *
 * @param array $params
 * @return array {
 *     @var bool $success
 *     @var string|null $redirectTo
 *     @var string|null $errorMsg User-visible error message
 * }
 */
function domain20i_ServiceSingleSignOn(array $params)
{
    try {
        $helper = \TwentyI\WHMCS\Registrars::fromRequest($params);
        $url = $helper->singleSignOn($params);
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "success" => false,
            "redirectTo" => null,
            "errorMsg" => $e->getMessage(),
        ];
    } catch(\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "success" => false,
            "redirectTo" => null,
            "errorMsg" => $e->getMessage(),
        ];
    }
    return [
        "success" => true,
        "redirectTo" => $url,
        "errorMsg" => null,
    ];
}

/**
 * Wraps ServiceSingleSignOn so that we can ensure that it actually appears.
 *
 * @param array $params
 * @return array {
 *     @var string $templatefile
 *     @var array $vars
 * }
 */
function domain20i_singleSignOn(array $params)
{
    $results = domain20i_ServiceSingleSignOn($params);
    return [
        "templatefile" => "sso",
        "vars" => $results,
    ];
}

/**
 * WARNING: Not documented by WHMCS
 *
 * @param array $params {
 *     @param string $domainid
 * }
 * @return array {
 *     @var bool $external
 *     @var string $code
 * }
 */
function domain20i_GetEmailForwarding(array $params) {
    return [
        "external" => true,
        "code" => "<a href='clientarea.php?action=domaindetails&id={$params["domainid"]}&modop=custom&a=singleSignOn'>Access Control Panel</a>",
    ];
}

/**
 * The custom buttons for the client area.
 *
 * @return array A button name to function name stub map.
 */
function domain20i_ClientAreaCustomButtonArray()
{
    return array(
        "Log in to control panel" => "singleSignOn",
    );
}

/**
 * Fetches the current nameservers from upstream.
 *
 * @param array $params
 * @return array {
 *     @var string|null $error
 *     @var bool|null $success
 *     @var string|null $ns1
 *     @var string|null $ns2
 *     @var string|null $ns3
 *     @var string|null $ns4
 *     @var string|null $ns5
 * }
 */
function domain20i_GetNameservers(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Registrars::fromRequest($params);
        $nameservers = $helper->getNameservers($params);

        if($nameservers) {
            return [
                "success" => true,
                "error" => null,
            ] + array_combine(
                array_map(
                    function($i) {return "ns" . ($i+1);},
                    array_keys($nameservers)
                ),
                $nameservers
            );
        } else {
            return [
                "success" => false,
                "error" => "Could not fetch nameservers",
            ];
        }
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "success" => false,
            "error" => $e->getMessage(),
        ];
    } catch(\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "success" => false,
            "error" => $e->getMessage(),
        ];
    }
}

/**
 * Updates the current nameservers
 *
 * @param array $params {
 *     @var string $ns1
 *     @var string|null $ns2
 *     @var string|null $ns3
 *     @var string|null $ns4
 *     @var string|null $ns5
 *     ...
 * }
 * @return array {
 *     @param string|null $error
 *     @param bool|null $success
 * }
 */
function domain20i_SaveNameservers(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Registrars::fromRequest($params);
        $nameservers = $helper->setNameservers($params);
        return [
            "success" => true,
            "error" => null,
        ];
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "success" => false,
            "error" => $e->getMessage(),
        ];
    } catch(\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "success" => false,
            "error" => $e->getMessage(),
        ];
    }
}

/**
 * Fetches the current contacts from upstream.
 *
 * @param array $params
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
function domain20i_GetContactDetails(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Registrars::fromRequest($params);
        return $helper->getContacts($params);
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "error" => $e->getMessage(),
        ];
    } catch(\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "error" => $e->getMessage(),
        ];
    }
}

/**
 * Updates the contacts.
 *
 * @param array $params {
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
 * @return array {
 *     @var bool|null $success
 *     @var string|null $error
 * }
 */
function domain20i_SaveContactDetails(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Registrars::fromRequest($params);

        $result = $helper->setContacts($params);

        return [
            "success" => !!$result,
        ];
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "error" => $e->getMessage(),
        ];
    } catch(\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "error" => $e->getMessage(),
        ];
    }
}

/**
 * Checks if a domain can be registered.
 *
 * @param array $params {
 *     @param string $searchTerm
 *     @param string|null $punyCodeSearchTerm
 *     @param string[] $tldsToInclude
 *     @param bool $isIdnDomain
 *     @param bool $premiumEnabled
 *     ...
 * }
 * @return WHMCS\Domains\DomainLookup\ResultList WHMCS\Domains\DomainLookup\SearchResult[]
 */
function domain20i_CheckAvailability(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Registrars::fromRequest($params);

        return $helper->checkAvailability($params);
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "error" => $e->getMessage(),
        ];
    } catch(\Exception $e) {
        logModuleCall(
            "domain20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return [
            "error" => $e->getMessage(),
        ];
    }
}

/**
 * May perform the WHMCS domain suggestions action
 *
 * @see domain20i_CheckAvailability()
 *
 * @param array $params {
 *     @param string $searchTerm
 *     @param string|null $punyCodeSearchTerm
 *     @param string[] $tldsToInclude
 *     @param bool $isIdnDomain
 *     @param bool $premiumEnabled
 *     @var array $suggestionSettings
 *     ...
 * }
 * @return WHMCS\Domains\DomainLookup\ResultList WHMCS\Domains\DomainLookup\SearchResult[]
 */
function domain20i_GetDomainSuggestions(array $params) {
    if(!@$params["suggestionSettings"]["useRealSuggestions"]) {
        return domain20i_CheckAvailability([
            "tldsToInclude" => array_map(
                function($s) {return "." . $s;},
                $params["tldsToInclude"]
            ),
        ] + $params);
    } else {
        try {
            $helper = \TwentyI\WHMCS\Registrars::fromRequest($params);

            return $helper->getSuggestions($params);
        } catch(\TwentyI\API\Exception $e) {
            logModuleCall(
                "domain20i",
                __FUNCTION__,
                $params,
                $e->getMessage(),
                "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
            );

            return [
                "error" => $e->getMessage(),
            ];
        } catch(\Exception $e) {
            logModuleCall(
                "domain20i",
                __FUNCTION__,
                $params,
                $e->getMessage(),
                "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
            );

            return [
                "error" => $e->getMessage(),
            ];
        }
    }
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
function domain20i_Sync(array $params) {
    $helper = \TwentyI\WHMCS\Registrars::fromRequest($params);
    $helper->update($params);
    return $helper->info($params);
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
 *     @var string|null $error On exception
 * }
 */
function domain20i_TransferSync(array $params) {
    $helper = \TwentyI\WHMCS\Registrars::fromRequest($params);

    return $helper->transferInfo($params);
}
