<?php
// Use only for LOCAL WP-CLI tests: --require=tools/performance/local-cli-guard.php
if ( PHP_SAPI !== 'cli' ) { exit(1); }
require __DIR__ . '/local-db-inventory.php';
if ( ! defined('DISABLE_WP_CRON') ) { define('DISABLE_WP_CRON', true); }
