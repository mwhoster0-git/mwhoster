<?php
/**
 * 20i Reseller Provisioning Module
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
 * The module metadata
 *
 * @return array
 */
function provision20i_MetaData()
{
    return [
        "DisplayName" => "20i (" . \TwentyI\WHMCS\Base::shortVersion() . ")",
        "APIVersion" => "1.1",
        "RequiresServer" => true,
        "ServiceSingleSignOnLabel" => "Log in to hosting control panel",
        "AdminSingleSignOnLabel" => "Log in to Stack",
    ];
}

/**
 * Define available config options.
 *
 * @see \TwentyI\WHMCS\Provisioning::configOptions()
 *
 * @return array {
 *     @var array ($option name)
 * }
 */
function provision20i_ConfigOptions() {
    return \TwentyI\WHMCS\Provisioning::configOptions();
}

/**
 * Changes the type of a service.
 *
 * @param array $params
 *
 * @return string "success" or an error message
 */
  function provision20i_ChangePackage(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Provisioning::fromRequest($params);

        $response = $helper->modifyType($params);
        if(!$response) {
            throw new \Exception(
                "Please check your new product has a type code selected and that it belongs to the same platform as the current package."
            );
        }
        return "success";
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
    } catch(\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
    }
}


/**
 * Creates a service.
 *
 * @param array $params
 *
 * @return string "success" or an error message
 */
function provision20i_CreateAccount(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Provisioning::fromRequest($params);

        $response = $helper->create($params);
        if(!$response) {
            throw new \Exception("Unexpected empty response from server");
        }
        return "success";
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
    } catch(\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
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
function provision20i_ServiceSingleSignOn(array $params)
{
    try {
        $helper = \TwentyI\WHMCS\Provisioning::fromRequest($params);
        $url = $helper->singleSignOn($params);
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "provision20i",
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
            "provision20i",
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
 * Suspends a service.
 *
 * @param array $params
 *
 * @return string "success" or an error message
 */
function provision20i_SuspendAccount(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Provisioning::fromRequest($params);

        $response = $helper->disable();
        if(!$response) {
            throw new \Exception("Unexpected empty response from server");
        }
        return "success";
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
    } catch(\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
    }
    return "success";
}

/**
 * Un-suspends a service.
 *
 * @param array $params
 *
 * @return string "success" or an error message
 */
function provision20i_UnsuspendAccount(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Provisioning::fromRequest($params);

        $response = $helper->enable();
        if(!$response) {
            throw new \Exception("Unexpected empty response from server");
        }
        return "success";
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
    } catch(\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
    }
    return "success";
}

/**
 * Cancels a service, or requests cancellation.
 *
 * @param array $params
 *
 * @return string "success" or an error message
 */
function provision20i_TerminateAccount(array $params) {
    try {
        $helper = \TwentyI\WHMCS\Provisioning::fromRequest($params);

        $response = $helper->delete();
        if(!$response) {
            throw new \Exception("Unexpected failure to delete");
        }
        return "success";
    } catch(\TwentyI\API\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
    } catch(\Exception $e) {
        logModuleCall(
            "provision20i",
            __FUNCTION__,
            $params,
            $e->getMessage(),
            "(" . \TwentyI\WHMCS\Base::shortVersion() . ") $e"
        );

        return $e->getMessage();
    }
    return "success";
}

/**
 * Renews a service.
 *
 * @param array $params
 *
 * @return string "success" or an error message
 */
function provision20i_Renew(array $params) {
    return "success";
}
