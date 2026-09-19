<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PysContentIdScanner {

    const CRON_HOOK     = 'pys_content_id_scan_batch';
    const OPTION_PREFIX = 'pys_content_id_scan_';
    const BATCH_SIZE    = 200;

    public static function init() {
        add_action( self::CRON_HOOK, [ __CLASS__, 'processBatch' ] );
        add_action( 'wp_ajax_pys_download_content_id_report', [ __CLASS__, 'downloadCsvReport' ] );
    }

    public static function startScan( string $pixelSlug, string $fieldName ) {
        $timestamp = wp_next_scheduled( self::CRON_HOOK, [ $pixelSlug ] );
        if ( $timestamp ) {
            wp_unschedule_event( $timestamp, self::CRON_HOOK, [ $pixelSlug ] );
            if ( PYS()->getLog() ) {
                PYS()->getLog()->debug( "[ContentIdScanner] Existing scan cancelled and restarted for pixel: {$pixelSlug}" );
            }
        }
        update_option( self::OPTION_PREFIX . $pixelSlug, [
            'status'        => 'scanning',
            'field_name'    => $fieldName,
            'started_at'    => time(),
            'scanned_at'    => null,
            'offset'        => 0,
            'total_scanned' => 0,
            'missing'       => [],
        ], false );
        wp_schedule_single_event( time(), self::CRON_HOOK, [ $pixelSlug ] );
        spawn_cron();
        if ( PYS()->getLog() ) {
            PYS()->getLog()->debug( "[ContentIdScanner] Scan started for pixel: {$pixelSlug}, field: {$fieldName}" );
        }
    }

    public static function processBatch( string $pixelSlug ) {
        $data = get_option( self::OPTION_PREFIX . $pixelSlug, [] );
        if ( empty( $data ) || $data['status'] !== 'scanning' ) {
            return;
        }

        $pixel            = PYS()->getRegisteredPixels()[ $pixelSlug ] ?? null;
        $variableAsSimple = $pixel ? (bool) $pixel->getOption( 'woo_variable_as_simple' ) : false;
        $fieldName        = $data['field_name'];
        $offset           = (int) $data['offset'];
        if ( PYS()->getLog() ) {
            PYS()->getLog()->debug( "[ContentIdScanner] Processing batch for pixel: {$pixelSlug}, offset: {$offset}, batch_size: " . self::BATCH_SIZE );
        }

        $post_types = $variableAsSimple ? [ 'product' ] : [ 'product', 'product_variation' ];
        $missing_before = count( $data['missing'] );

        $query = new \WP_Query( [
            'post_type'      => $post_types,
            'post_status'    => 'publish',
            'posts_per_page' => self::BATCH_SIZE,
            'offset'         => $offset,
            'fields'         => 'ids',
            'no_found_rows'  => false,
        ] );

        foreach ( $query->posts as $product_id ) {
            $value = get_post_meta( $product_id, $fieldName, true );
            if ( empty( $value ) ) {
                $product           = wc_get_product( $product_id );
                $data['missing'][] = [
                    'id'   => $product_id,
                    'name' => $product ? $product->get_name() : "Product #$product_id",
                    'sku'  => $product ? $product->get_sku() : '',
                    'type' => $product ? $product->get_type() : 'unknown',
                ];
            }
        }

        $data['total_scanned'] += count( $query->posts );
        $data['offset']         = $offset + self::BATCH_SIZE;
        if ( PYS()->getLog() ) {
            $batch_missing = count( $data['missing'] ) - $missing_before;
            PYS()->getLog()->debug( "[ContentIdScanner] Batch complete. Missing in batch: {$batch_missing}, total_scanned: {$data['total_scanned']}" );
        }

        if ( count( $query->posts ) < self::BATCH_SIZE ) {
            $data['status']     = 'complete';
            $data['scanned_at'] = time();
            if ( PYS()->getLog() ) {
                PYS()->getLog()->debug( "[ContentIdScanner] Scan COMPLETE for pixel: {$pixelSlug}. Total missing: " . count( $data['missing'] ) . ", total_scanned: {$data['total_scanned']}" );
            }
        }

        update_option( self::OPTION_PREFIX . $pixelSlug, $data, false );

        if ( $data['status'] === 'scanning' ) {
            wp_schedule_single_event( time() + 5, self::CRON_HOOK, [ $pixelSlug ] );
            spawn_cron();
        }
    }

    public static function logMissingProduct( string $pixelSlug, int $productId ) {
        $data = get_option( self::OPTION_PREFIX . $pixelSlug, [] );
        if ( empty( $data ) ) {
            return;
        }
        if ( in_array( $productId, array_column( $data['missing'] ?? [], 'id' ) ) ) {
            return;
        }
        $product           = wc_get_product( $productId );
        $data['missing'][] = [
            'id'   => $productId,
            'name' => $product ? $product->get_name() : "Product #$productId",
            'sku'  => $product ? $product->get_sku() : '',
            'type' => $product ? $product->get_type() : 'unknown',
        ];
        update_option( self::OPTION_PREFIX . $pixelSlug, $data, false );
        if ( PYS()->getLog() ) {
            PYS()->getLog()->debug( "[ContentIdScanner] Runtime missing product detected. Pixel: {$pixelSlug}, product_id: {$productId}" );
        }
    }

    public static function getReport( string $pixelSlug ): array {
        return get_option( self::OPTION_PREFIX . $pixelSlug, [] );
    }

    public static function downloadCsvReport() {
        check_ajax_referer( 'pys_save_settings', '_wpnonce' );
        if ( ! current_user_can( 'manage_pys' ) ) {
            wp_die();
        }

        $pixelSlug = sanitize_key( $_GET['pixel'] ?? '' );
        $data      = self::getReport( $pixelSlug );
        if ( empty( $data['missing'] ) ) {
            wp_die( 'No data' );
        }

        header( 'Content-Type: text/csv' );
        header( 'Content-Disposition: attachment; filename="pys-missing-content-id-' . $pixelSlug . '.csv"' );
        $output = fopen( 'php://output', 'w' );
        fputcsv( $output, [ 'Product ID', 'Product Name', 'SKU', 'Type', 'Edit URL' ] );
        foreach ( $data['missing'] as $item ) {
            fputcsv( $output, [
                $item['id'],
                $item['name'],
                $item['sku'],
                $item['type'],
                admin_url( 'post.php?post=' . $item['id'] . '&action=edit' ),
            ] );
        }
        fclose( $output );
        exit;
    }
}
