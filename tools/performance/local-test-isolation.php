<?php
/** Optional LOCAL ONLY MU plugin. Copy to wp-content/mu-plugins/ for tests; remove afterwards. */
if (!defined('ABSPATH') || !defined('DB_HOST') || !in_array(DB_HOST, array('127.0.0.1', 'localhost', '::1'), true)) { return; }
$mw_test_host = strtolower(explode(':', $_SERVER['HTTP_HOST'] ?? '')[0]);
if ($mw_test_host !== 'mwhoster.test') { return; }
// Optional source-baseline replay for visual QA only. The snapshot is local and ignored.
if ( ($_SERVER['HTTP_X_MW_BASELINE'] ?? '') === '1' && is_dir(ABSPATH . 'tools/performance/.local/before-theme') ) {
    add_filter('stylesheet_directory', function () { return ABSPATH . 'tools/performance/.local/before-theme'; });
    add_filter('stylesheet_directory_uri', function () { return home_url('/tools/performance/.local/before-theme'); });
}
if (!defined('DISABLE_WP_CRON')) { define('DISABLE_WP_CRON', true); }
// Prevent local tests from sending server-side marketing events or mail.
add_filter('pre_http_request', function ($pre, $args, $url) {
    return new WP_Error('mwhoster_local_test', 'Outbound HTTP disabled during local performance tests.');
}, PHP_INT_MAX, 3);
add_filter('pre_wp_mail', '__return_false', PHP_INT_MAX);
add_action('send_headers', function () {
    // Browser and Lighthouse isolation, including imported third-party scripts/beacons.
    header("Content-Security-Policy: default-src 'self' data: blob:; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' data: https://fonts.gstatic.com; img-src 'self' data: blob: http://mw.bloggerplex.top https://www.mwhoster.com; connect-src 'self'; frame-src 'self'; form-action 'none'; base-uri 'self'");
});
