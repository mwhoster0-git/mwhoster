<?php
/**
 * Hooks for WHMCS -> 20i Reseller Hosting API
 * @copyright 2017 20i Limited
 * @license BSD-3-Clause
 */

require_once __DIR__ . "/../../../20i/vendor/autoload.php";
\TwentyI\WHMCS\Base::init(__DIR__ . "/api.json");

/**
 * Hooks client editing
 *
 * @param array $vars See TwentyI\WHMCS\Provisioning
 */
add_hook('ClientEdit', 1, function($vars) {
    try {
        $helper = \TwentyI\WHMCS\Provisioning::any();
        if($helper) {
            $helper->hookClientEdit($vars);
        }
    } catch(\Exception $e) {
        trigger_error($e->getMessage());
    }

});

/**
 * Hooks the product details chunk.
 *
 * @param array $vars {
 *     @var string|null $username
 *     @var array|null $serverdata
 *     ...
 * }
 */
add_hook("ClientAreaProductDetailsPreModuleTemplate", 1, function(array $vars) {
    // Wipe misleading stuff from the page.
    $vars["username"] = null;
    $vars["serverdata"] = null;
    return $vars;
});
