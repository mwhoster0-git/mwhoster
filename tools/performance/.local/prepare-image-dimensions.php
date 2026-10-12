<?php
// One-off, explicit child-template edit. Never scans uploads or other applications.
if ( PHP_SAPI !== 'cli' ) { exit(1); }
$root = dirname( __DIR__, 2 );
$theme = $root . '/wp-content/themes/MWhoster-child';
$files = array( 'header.php', 'footer.php', 'dist/index.php', 'dist/shared-web-hosting.php', 'dist/wordpress-web-hosting.php', 'dist/windows-web-hosting.php', 'dist/domain-registration.php', 'dist/domain-transfer.php' );
$report = array();
foreach ( $files as $file ) {
    $html = file_get_contents( $theme . '/' . $file );
    // Keep comments byte-for-byte. Only active static upload URLs are touched.
    $parts = preg_split( '/(<!--[\s\S]*?-->)/', $html, -1, PREG_SPLIT_DELIM_CAPTURE );
    foreach ( $parts as &$part ) {
        if ( substr( $part, 0, 4 ) === '<!--' ) { continue; }
        $part = preg_replace_callback( '/<img\b[^>]*\bsrc="(\/wp-content\/uploads\/[^"<>]+)"[^>]*>/i', function ( $m ) use ( $root, $file, &$report ) {
            $tag = $m[0]; $url = $m[1];
            if ( strpos( $url, '..' ) !== false ) { throw new RuntimeException('Unsafe image path'); }
            $path = $root . $url;
            if ( ! is_file( $path ) ) { throw new RuntimeException('Missing image: ' . $url); }
            if ( pathinfo( $path, PATHINFO_EXTENSION ) === 'svg' ) {
                $svg = simplexml_load_file( $path );
                $box = preg_split( '/[ ,]+/', trim( (string) $svg['viewBox'] ) );
                if ( count( $box ) === 4 ) { $size = array( (float) $box[2], (float) $box[3] ); }
                else { $size = array( (float) $svg['width'], (float) $svg['height'] ); }
            } else { $size = getimagesize( $path ); }
            if ( ! $size || $size[0] <= 0 || $size[1] <= 0 ) { throw new RuntimeException('Unknown image dimensions: ' . $url); }
            $width = preg_match( '/\bwidth="(\d+)(?:px)?"/', $tag, $w ) ? (int) $w[1] : (int) round( $size[0] );
            $height = (int) round( $width * $size[1] / $size[0] );
            $tag = preg_replace( '/\s+(?:width|height)="[^" ]*"/', '', $tag );
            $tag = preg_replace( '/\s*\/?\s*>$/', ' width="' . $width . '" height="' . $height . '" />', $tag );
            $report[] = array( 'file' => $file, 'url' => $url, 'intrinsic' => array( $size[0], $size[1] ), 'rendered_attributes' => array( $width, $height ) );
            return $tag;
        }, $part );
    }
    unset($part);
    if ( ! in_array('--dry-run', $argv, true) ) { file_put_contents( $theme . '/' . $file, implode( '', $parts ) ); }
}
file_put_contents( __DIR__ . '/image-dimensions.json', json_encode( $report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) . PHP_EOL );
echo count($report) . ' image dimension pairs added.' . PHP_EOL;
