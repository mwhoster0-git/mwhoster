<?php
/** Public WordPress assets. No account-wide cache or third-party measurement changes. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function mwhoster_asset_version( $file ) {
    return (string) filemtime( get_stylesheet_directory() . '/' . $file );
}

function mwhoster_image_url( $file ) {
    return add_query_arg( 'ver', mwhoster_asset_version( $file ), get_stylesheet_directory_uri() . '/' . $file );
}

function mwhoster_custom_template() {
    $templates = array(
        'dist/index.php', 'dist/shared-web-hosting.php', 'dist/wordpress-web-hosting.php',
        'dist/windows-web-hosting.php', 'dist/domain-registration.php', 'dist/domain-transfer.php',
    );
    $template = get_page_template_slug();
    return in_array( $template, $templates, true ) ? $template : '';
}

/** Fail open if a custom page gains Elementor content or a global builder integration. */
function mwhoster_static_template_assets() {
    if ( is_admin() || is_preview() || isset( $_GET['elementor-preview'] ) || ! mwhoster_custom_template() ) { return false; }
    $post = get_post();
    if ( ! $post || trim( $post->post_content ) !== '' || get_post_meta( $post->ID, '_elementor_edit_mode', true ) === 'builder' || get_post_meta( $post->ID, '_elementor_data', true ) ) { return false; }
    static $global_documents = null;
    if ( null === $global_documents ) {
        $global_documents = get_posts( array(
            'post_type' => 'elementor_library', 'post_status' => 'publish', 'numberposts' => 1, 'fields' => 'ids',
            'meta_query' => array( array( 'key' => '_elementor_template_type', 'value' => array( 'header', 'footer', 'popup', 'single', 'single-page', 'archive' ), 'compare' => 'IN' ) ),
        ) );
    }
    return empty( $global_documents );
}

function mwhoster_enqueue_public_assets() {
    $base = get_stylesheet_directory_uri() . '/';
    $template = mwhoster_custom_template();
    $carousel = in_array( $template, array( 'dist/windows-web-hosting.php', 'dist/domain-transfer.php' ), true );
    $profile = 'full'; // Unknown templates keep the complete theme vocabulary.
    if ( mwhoster_static_template_assets() ) {
        $profile = $carousel ? 'carousel' : 'hosting';
        // Complete-template utility inventory is valid only for these two routes.
        $home_shared = ( is_front_page() && 'dist/index.php' === $template )
            || ( is_page( 'shared-web-hosting' ) && 'dist/shared-web-hosting.php' === $template );
        if ( $home_shared && is_readable( get_stylesheet_directory() . '/assets/css/mwhoster-home-shared.css' ) ) {
            $profile = 'home-shared';
        }
    } elseif ( ! $template && ( is_singular( 'post' ) || is_page( array( 'blog', 'guide', 'contact', 'privacy-policy', 'terms-conditions' ) ) ) ) {
        $profile = 'shared';
    }
    // Same Inter families/weights; direct discovery avoids the old nested CSS import.
    wp_enqueue_style( 'mwhoster-inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null );
    $css = 'assets/css/mwhoster-' . $profile . '.css';
    wp_enqueue_style( 'mwhoster-layout', $base . $css, array( 'mwhoster-inter' ), mwhoster_asset_version( $css ) );

    $args = array( 'in_footer' => true, 'strategy' => 'defer' );
    wp_enqueue_script( 'mwhoster-bootstrap', $base . 'assets/js/vendors/bootstrap.bundle.min.js', array( 'jquery' ), mwhoster_asset_version( 'assets/js/vendors/bootstrap.bundle.min.js' ), $args );
    wp_enqueue_script( 'mwhoster-megamenu', $base . 'assets/js/vendors/hs.megamenu.js', array( 'jquery' ), mwhoster_asset_version( 'assets/js/vendors/hs.megamenu.js' ), $args );
    // HSMegaMenu 1.0.0 declares this inside its constructor closure, while prototype
    // keyboard handlers access it outside that closure. Supply the expected binding
    // without editing the vendor library. This restores Escape/Enter/arrow-key handling.
    wp_add_inline_script( 'mwhoster-megamenu', 'var isMenuOpened = false;', 'before' );
    $deps = array( 'jquery', 'mwhoster-bootstrap', 'mwhoster-megamenu' );
    if ( $carousel ) {
        wp_enqueue_script( 'mwhoster-owl', $base . 'assets/js/vendors/owl.carousel.min.js', array( 'jquery' ), mwhoster_asset_version( 'assets/js/vendors/owl.carousel.min.js' ), $args );
        $deps[] = 'mwhoster-owl';
    }
    // Opt-in for future actual theme widgets; registration alone transfers nothing.
    foreach ( array( 'slider' => 'bootstrap-slider.min.js', 'popup' => 'magnific-popup.min.js', 'validator' => 'validator.min.js' ) as $widget => $file ) {
        wp_register_script( 'mwhoster-' . $widget, $base . 'assets/js/vendors/' . $file, array( 'jquery' ), mwhoster_asset_version( 'assets/js/vendors/' . $file ), $args );
    }
    wp_enqueue_script( 'mwhoster-app', $base . 'assets/js/app.js', $deps, mwhoster_asset_version( 'assets/js/app.js' ), $args );

    // Preserve the existing GA4 ID, immediate configuration and Tawk embed/consent timing.
    wp_enqueue_script( 'mwhoster-gtag', 'https://www.googletagmanager.com/gtag/js?id=G-4CV2FZ1SCP', array(), null, array( 'strategy' => 'async', 'in_footer' => false ) );
    wp_add_inline_script( 'mwhoster-gtag', "window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-4CV2FZ1SCP');", 'before' );
    wp_register_script( 'mwhoster-tawk', false, array(), null, true );
    wp_enqueue_script( 'mwhoster-tawk' );
    wp_add_inline_script( 'mwhoster-tawk', "var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){var s1=document.createElement('script'),s0=document.getElementsByTagName('script')[0];s1.async=true;s1.src='https://embed.tawk.to/5db18300df22d91339a0d428/default';s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();" );
}
add_action( 'wp_enqueue_scripts', 'mwhoster_enqueue_public_assets', 0 );

function mwhoster_trim_static_elementor_styles() {
    if ( ! mwhoster_static_template_assets() ) { return; }
    // Keep the active kit (variables / global inheritance) and every builder/editor route.
    $styles = wp_styles();
    $kit_handle = 'elementor-post-' . (int) get_option( 'elementor_active_kit' );
    if ( isset( $styles->registered[ $kit_handle ] ) ) {
        // The kit declares frontend as a dependency; a dequeue alone would reload it.
        $styles->registered[ $kit_handle ]->deps = array_values( array_diff( $styles->registered[ $kit_handle ]->deps, array( 'elementor-frontend' ) ) );
    }
    wp_dequeue_style( 'elementor-frontend' );
}
add_action( 'wp_enqueue_scripts', 'mwhoster_trim_static_elementor_styles', 100 );
add_action( 'wp_print_styles', 'mwhoster_trim_static_elementor_styles', 100 );
add_filter( 'elementor/frontend/print_google_fonts', function ( $print ) {
    return mwhoster_static_template_assets() ? false : $print;
} );

// Smush 4.3.4 core/lazy-load/class-lazy-load-transform.php passes skip, src, markup.
add_filter( 'smush_skip_image_from_lazy_load', function ( $skip, $src, $markup ) {
    return $skip || false !== strpos( $markup, 'mwhoster-eager' );
}, 10, 3 );
