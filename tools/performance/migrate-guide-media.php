<?php
/** WP-CLI: wp eval-file tools/performance/migrate-guide-media.php dry-run [backup-path] */
if ( ! defined( 'ABSPATH' ) || ! defined( 'WP_CLI' ) || ! WP_CLI ) { exit(1); }
$mode = $args[0] ?? 'dry-run';
if ( ! in_array( $mode, array( 'dry-run', 'apply', 'rollback' ), true ) ) { WP_CLI::error( 'Use dry-run, apply, or rollback.' ); }
$backup = $args[1] ?? __DIR__ . '/.local/guide-media-rollback.json';
$manifest = json_decode( file_get_contents( __DIR__ . '/guide-media-manifest.json' ), true );
$local = wp_parse_url( home_url(), PHP_URL_HOST ) === 'mwhoster.test';
if ( $local && ! in_array( DB_HOST, array( '127.0.0.1', 'localhost', '::1' ), true ) ) { WP_CLI::error( 'Local site must use a loopback DB copy.' ); }
if ( ! $local && wp_parse_url( home_url(), PHP_URL_HOST ) !== 'www.mwhoster.com' && wp_parse_url( home_url(), PHP_URL_HOST ) !== 'mwhoster.com' ) { WP_CLI::error( 'Unexpected WordPress site.' ); }

function mw_media_read( $row ) {
    return $row['field'] === 'post_content' ? get_post_field( 'post_content', $row['id'], 'raw' ) : get_post_meta( $row['id'], $row['field'], true );
}
function mw_media_replace( $value, $old, $new ) {
    if ( is_array( $value ) ) { foreach ( $value as &$item ) { $item = mw_media_replace( $item, $old, $new ); } return $value; }
    if ( ! is_string( $value ) ) { return $value; }
    // WordPress handles serialized metadata. JSON escaping in Elementor data is preserved.
    return str_replace( array( $old, str_replace( '/', '\\/', $old ) ), array( $new, str_replace( '/', '\\/', $new ) ), $value );
}
function mw_media_write( $row, $value ) {
    if ( $row['field'] === 'post_content' ) {
        $result = wp_update_post( wp_slash( array( 'ID' => $row['id'], 'post_content' => $value ) ), true );
        if ( is_wp_error( $result ) ) { WP_CLI::error( $result->get_error_message() ); }
    } else { update_post_meta( $row['id'], $row['field'], wp_slash( $value ) ); }
}
if ( $mode === 'rollback' ) {
    $saved = json_decode( file_get_contents( $backup ), true );
    if ( ! $saved || $saved['site'] !== home_url() ) { WP_CLI::error( 'Wrong-site or invalid backup.' ); }
    foreach ( $saved['records'] as $row ) {
        $current = mw_media_read( $row );
        if ( $current !== $row['after'] && $current !== $row['before'] ) { WP_CLI::error( 'Conflict: content changed since migration at post ' . $row['id'] ); }
    }
    foreach ( $saved['records'] as $row ) { if ( mw_media_read( $row ) !== $row['before'] ) { mw_media_write( $row, $row['before'] ); } }
    WP_CLI::success( 'Restored only the recorded guide fields.' );
    return;
}
foreach ( $manifest['assets'] as $asset ) {
    if ( $asset['status'] !== 200 || ! $asset['identical'] || hash_file( 'sha256', ABSPATH . $asset['path'] ) !== $asset['localSHA256'] ) { WP_CLI::error( 'Asset verification failed: ' . $asset['path'] ); }
}
$records = array();
foreach ( $manifest['entries'] as $entry ) {
    if ( ! in_array( $entry['field'], array( 'post_content', '_elementor_data', '_elementor_page_settings' ), true ) ) { WP_CLI::error( 'Field outside allowlist.' ); }
    $post = get_page_by_path( $entry['slug'], OBJECT, 'post' );
    if ( ! $post || $post->post_status !== 'publish' ) { WP_CLI::error( 'Published guide missing: ' . $entry['slug'] ); }
    $key = $post->ID . ':' . $entry['field'];
    if ( ! isset( $records[$key] ) ) {
        $row = array( 'id' => $post->ID, 'slug' => $entry['slug'], 'field' => $entry['field'] );
        $row['before'] = mw_media_read( $row );
        $row['after'] = $row['before'];
        $records[$key] = $row;
    }
    $new = $local ? home_url( wp_parse_url( $entry['new'], PHP_URL_PATH ) ) : $entry['new'];
    $records[$key]['after'] = mw_media_replace( $records[$key]['after'], $entry['old'], $new );
    WP_CLI::line( wp_json_encode( array( 'id' => $post->ID, 'field' => $entry['field'], 'old' => $entry['old'], 'new' => $new ) ) );
}
$records = array_values( array_filter( $records, function ( $row ) { return $row['before'] !== $row['after']; } ) );
if ( $mode === 'dry-run' ) { WP_CLI::success( count( $records ) . ' fields would change; no writes.' ); return; }
if ( ! $records ) { WP_CLI::success( 'Already applied; no writes.' ); return; }
if ( file_exists( $backup ) ) { WP_CLI::error( 'Backup exists; choose a new path. Never overwrite rollback data.' ); }
if ( ! is_dir( dirname( $backup ) ) ) { mkdir( dirname( $backup ), 0700, true ); }
$saved = array( 'site' => home_url(), 'records' => $records );
if ( ! file_put_contents( $backup, wp_json_encode( $saved, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ), LOCK_EX ) ) { WP_CLI::error( 'Cannot write rollback file.' ); }
foreach ( $records as $row ) {
    if ( mw_media_read( $row ) !== $row['before'] ) { WP_CLI::error( 'Concurrent change; abort and review rollback file.' ); }
    mw_media_write( $row, $row['after'] );
}
WP_CLI::success( count( $records ) . ' guide fields updated. Backup: ' . $backup );
