<?php
/**
 * Hooks for WHMCS -> 20i Domains API
 * @copyright 2017 20i Limited
 * @license BSD-3-Clause
 */

require_once __DIR__ . "/../../../20i/vendor/autoload.php";

/**
 * Hooks client editing
 *
 * @param array $vars See TwentyI\WHMCS
 */
add_hook('ClientEdit', 1, function($vars) {
    try {
        $helper = \TwentyI\WHMCS\Registrars::any();
        if($helper) {
            $helper->hookClientEdit($vars);
        }
    } catch(\Exception $e) {
        trigger_error($e->getMessage());
    }
});
