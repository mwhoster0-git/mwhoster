<?php
// Read-only, CLI-only inventory. Never bootstrap WordPress or print credentials.
if (PHP_SAPI !== 'cli') { exit(1); }
$root = dirname(__DIR__, 2);
$config = file_get_contents($root . '/wp-config.php');
$mw_config_value = function ($key) use ($config) {
    if (!preg_match('/define\(\s*[\'\"]' . $key . '[\'\"]\s*,\s*([\'\"])(.*?)\1\s*\)/s', $config, $m)) {
        throw new RuntimeException('Cannot safely read config key ' . $key);
    }
    return $m[2];
};
$host = $mw_config_value('DB_HOST');
if (!in_array($host, array('127.0.0.1', 'localhost', '::1'), true)) {
    throw new RuntimeException('Refusing non-loopback database.');
}
preg_match('/\$table_prefix\s*=\s*[\'\"]([a-zA-Z0-9_]+)[\'\"]/', $config, $m);
$prefix = $m[1] ?? '';
if (!$prefix) { throw new RuntimeException('Missing table prefix'); }
mysqli_report(MYSQLI_REPORT_OFF);
$db = mysqli_init();
$db->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
if (!@$db->real_connect($host, $mw_config_value('DB_USER'), $mw_config_value('DB_PASSWORD'), $mw_config_value('DB_NAME'))) {
    throw new RuntimeException('Local WordPress database connection unavailable (credentials suppressed).');
}
$db->set_charset('utf8mb4');
$db->query('SET TRANSACTION READ ONLY');
$db->begin_transaction();
$mw_rows = function ($sql) use ($db) {
    $result = $db->query($sql);
    if (!$result) { throw new RuntimeException('Inventory SELECT failed'); }
    return $result->fetch_all(MYSQLI_ASSOC);
};
$options = $mw_rows("SELECT option_name, option_value FROM {$prefix}options WHERE option_name IN ('home','siteurl','template','stylesheet','active_plugins','elementor_active_kit','show_on_front','page_on_front','page_for_posts')");
foreach ($options as $option) {
    if (in_array($option['option_name'], array('home','siteurl'), true) && parse_url($option['option_value'], PHP_URL_HOST) !== 'mwhoster.test') {
        throw new RuntimeException('Refusing database that is not the mwhoster.test copy.');
    }
}
$posts = $mw_rows("SELECT ID, post_type, post_status, post_name, post_title, post_content FROM {$prefix}posts WHERE post_status='publish' AND post_type IN ('page','post','elementor_library') ORDER BY ID");
$meta = $mw_rows("SELECT p.ID, m.meta_id, m.meta_key, m.meta_value FROM {$prefix}posts p JOIN {$prefix}postmeta m ON p.ID=m.post_id WHERE p.post_status='publish' AND p.post_type IN ('page','post','elementor_library') AND m.meta_key IN ('_wp_page_template','_elementor_edit_mode','_elementor_data','_elementor_template_type','_elementor_conditions','_elementor_page_settings') ORDER BY p.ID, m.meta_id");
$db->rollback();
$dir = __DIR__ . '/.local';
if (!is_dir($dir)) { mkdir($dir, 0700, true); }
file_put_contents($dir . '/db-inventory.json', json_encode(compact('options','posts','meta'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo json_encode(array('loopback_database' => true, 'local_urls_verified' => true, 'posts' => count($posts), 'metadata_records' => count($meta)), JSON_PRETTY_PRINT) . PHP_EOL;
