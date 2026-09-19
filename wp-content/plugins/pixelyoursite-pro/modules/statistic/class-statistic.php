<?php
namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
include_once 'class-order-statistic.php';
include_once 'class-order-woo-statistic.php';
include_once 'class-order-edd-statistic.php';

class PysStatistic {

    private static $_instance;
    private $tables = [];
    public $wooStatistic;
    public $eddStatistic;

	public $delete_time = 30;
	public $delete_timeStart = "";
	public $delete_timeEnd = "";
    /**
     * @return PysStatistic
     */

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'adminEnqueueScripts' ) );
        add_action( 'init', array($this, 'init'), 1 );
    }

    public function init()
    {
        global $wpdb;

        $orderTable = new StatOrdersTable($wpdb);
        $productTable = new StatProductsTable($wpdb);
        $landingTable = new StatLandingTable($wpdb);
        $trafficTable = new StatTrafficTable($wpdb);
        $utmCampaing = new StatUtmCampaingTable($wpdb);
        $utmContent = new StatUtmContentTable($wpdb);
        $utmMedium = new StatUtmMediumTable($wpdb);
        $utmSource = new StatUtmSourceTable($wpdb);
        $utmTerm = new StatUtmTermTable($wpdb);

        // Security check: verify user capability and nonce before processing delete requests
        if((isset($_POST['delete_time']) && $_POST['delete_time'] != "") || (isset($_POST['delete_type']) && $_POST['delete_type'] != "")){
            if ( current_user_can( 'manage_pys' )
                && isset( $_POST['_wpnonce'] )
                && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ), 'pys_delete_statistic' )
            ) {
                $orderTable->deleteDataBasedOnTime($_POST);
                $productTable->deleteDataBasedOnTime($_POST);
            }
        }


        $this->wooStatistic = new WooOrderStatistic($orderTable,$productTable,$landingTable,$trafficTable,$utmCampaing,$utmContent,$utmMedium,$utmSource,$utmTerm);
        $this->eddStatistic = new EddOrderStatistic($orderTable,$productTable,$landingTable,$trafficTable,$utmCampaing,$utmContent,$utmMedium,$utmSource,$utmTerm);
        $this->tables = [$orderTable,$productTable,$landingTable,$trafficTable,$utmCampaing,$utmContent,$utmMedium,$utmSource,$utmTerm];

        add_filter("pys_db_tables",function ($items) {
            return array_merge($items,$this->tables);
        });
    }


    function adminMenu() {
        if(isWooCommerceActive()) {
            add_submenu_page( 'pixelyoursite', 'WooCommerce Reports', 'WooCommerce Reports',
                'manage_pys', 'pixelyoursite_woo_reports', array( $this, 'wooReport' ),5 );
        }
        if(isEddActive()) {
            add_submenu_page( 'pixelyoursite', 'EDD Reports', 'EDD Reports',
                'manage_pys', 'pixelyoursite_edd_reports', array( $this, 'eddReport' ) ,6);
        }
    }

    function adminEnqueueScripts() {
        if(isset($_GET['page']) && ($_GET['page'] == 'pixelyoursite_woo_reports' || $_GET['page'] == 'pixelyoursite_edd_reports')) {



            wp_enqueue_script( 'jquery-ui-datepicker' );
            wp_enqueue_style( 'pys_calendar', PYS_URL . '/dist/styles/calendar.css', array(  ), PYS_VERSION );
            wp_enqueue_script( 'pys_chart', PYS_URL . '/dist/scripts/chart.min.js' );
            wp_enqueue_script( 'chart_adapter', PYS_URL .'/dist/scripts/chartjs-adapter-date-fns.js',
                array('pys_chart'),
                PYS_VERSION
            );

            wp_register_script( 'js-cookie-admin', PYS_URL . '/dist/scripts/js.cookie-2.1.3.min.js', array( 'jquery',  'pys_chart',
                'bootstrap' ), '2.1.3' );

            wp_enqueue_script( 'js-cookie-admin' );
            wp_enqueue_script( 'pys_chart_js', PYS_URL . '/dist/scripts/admin_stat.js', array( 'jquery',  'pys_chart',
                'bootstrap' ), PYS_VERSION );

        }
    }

    public function wooReport() {
        $user_id = get_current_user_id();
        include __DIR__.'/../../includes/views/html-report-woo.php';
    }

    public function eddReport() {
        include __DIR__.'/../../includes/views/html-report-edd.php';
    }
    function globalWooReport() {
        if ( ! current_user_can( 'manage_pys' ) ) {
            wp_die( 'Unauthorized' );
        }

        ob_clean();

        $stat        = $this->wooStatistic;
        $export_type = isset( $_REQUEST['export_type'] ) ? sanitize_key( $_REQUEST['export_type'] ) : '';
        $start_date  = isset( $_REQUEST['start_date'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['start_date'] ) ) : '';
        $end_date    = isset( $_REQUEST['end_date'] )   ? sanitize_text_field( wp_unslash( $_REQUEST['end_date'] ) )   : '';
        $filter_type = isset( $_REQUEST['filter_type'] ) ? sanitize_key( $_REQUEST['filter_type'] ) : '';
        $model       = isset( $_REQUEST['model'] ) ? (int) $_REQUEST['model'] : 0;
        $cog         = isset( $_REQUEST['cog'] )   ? (int) $_REQUEST['cog']   : 0;
        $label       = isset( $_REQUEST['label'] ) ? map_deep( wp_unslash( $_REQUEST['label'] ), 'sanitize_text_field' ) : array();

        $base_url = home_url();
        $base_url_without_http = sanitize_file_name( str_replace( array( 'http://', 'https://' ), '', $base_url ) );

        if ( $export_type === 'all' ) {
            $name = $base_url_without_http . '-chatgptfile-woo-' . sanitize_file_name( $start_date ) . '_to_' . sanitize_file_name( $end_date ) . '.csv';
            header( 'Content-Type: text/csv; charset=utf-8' );
            header( 'Content-Disposition: attachment; filename="' . $name . '"' );
            $stat->exportGPT( $label, $start_date, $end_date, $filter_type, $model, $cog );
        } elseif ( $export_type === 'current' ) {
            $name = $base_url_without_http . '-export-current-data-woo-' . sanitize_file_name( $start_date ) . '_to_' . sanitize_file_name( $end_date ) . '.csv';
            header( 'Content-Type: text/csv; charset=utf-8' );
            header( 'Content-Disposition: attachment; filename="' . $name . '"' );
            $stat->exportFullCurrent( $label, $start_date, $end_date, $filter_type, $model, $cog );
        }
    }

    function singleWooReport() {
        if ( ! current_user_can( 'manage_pys' ) ) {
            wp_die( 'Unauthorized' );
        }

        ob_clean();

        $start_date        = isset( $_REQUEST['start_date'] )        ? sanitize_text_field( wp_unslash( $_REQUEST['start_date'] ) )        : '';
        $end_date          = isset( $_REQUEST['end_date'] )          ? sanitize_text_field( wp_unslash( $_REQUEST['end_date'] ) )          : '';
        $filter_id         = isset( $_REQUEST['filter_id'] )         ? absint( $_REQUEST['filter_id'] )                                    : 0;
        $filter_type       = isset( $_REQUEST['filter_type'] )       ? sanitize_key( $_REQUEST['filter_type'] )                           : '';
        $single_table_type = isset( $_REQUEST['single_table_type'] ) ? sanitize_key( $_REQUEST['single_table_type'] )                     : '';
        $model             = isset( $_REQUEST['model'] )             ? (int) $_REQUEST['model']                                           : 0;
        $cog               = isset( $_REQUEST['cog'] )               ? (int) $_REQUEST['cog']                                             : 0;

        $name = 'export-' . sanitize_file_name( $filter_type ) . '-' . $filter_id . '-' . sanitize_file_name( $start_date ) . '_to_' . sanitize_file_name( $end_date ) . '.csv';
        header( 'Content-Type: text/csv; charset=utf-8' );
        header( 'Content-Disposition: attachment; filename="' . $name . '"' );
        $stat = $this->wooStatistic;
        $stat->exportSingle( $start_date, $end_date, $filter_id, $single_table_type, $filter_type, $model, $cog );
    }

    function globalEddReport() {
        if ( ! current_user_can( 'manage_pys' ) ) {
            wp_die( 'Unauthorized' );
        }

        ob_clean();

        $stat        = $this->eddStatistic;
        $export_type = isset( $_REQUEST['export_type'] ) ? sanitize_key( $_REQUEST['export_type'] ) : '';
        $start_date  = isset( $_REQUEST['start_date'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['start_date'] ) ) : '';
        $end_date    = isset( $_REQUEST['end_date'] )   ? sanitize_text_field( wp_unslash( $_REQUEST['end_date'] ) )   : '';
        $filter_type = isset( $_REQUEST['filter_type'] ) ? sanitize_key( $_REQUEST['filter_type'] ) : '';
        $model       = isset( $_REQUEST['model'] ) ? (int) $_REQUEST['model'] : 0;
        $cog         = isset( $_REQUEST['cog'] )   ? (int) $_REQUEST['cog']   : 0;
        $label       = isset( $_REQUEST['label'] ) ? map_deep( wp_unslash( $_REQUEST['label'] ), 'sanitize_text_field' ) : array();

        $base_url = home_url();
        $base_url_without_http = sanitize_file_name( str_replace( array( 'http://', 'https://' ), '', $base_url ) );

        if ( $export_type === 'all' ) {
            $name = $base_url_without_http . '-chatgptfile-edd-' . sanitize_file_name( $start_date ) . '_to_' . sanitize_file_name( $end_date ) . '.csv';
            header( 'Content-Type: text/csv; charset=utf-8' );
            header( 'Content-Disposition: attachment; filename="' . $name . '"' );
            $stat->exportGPT( $label, $start_date, $end_date, $filter_type, $model, $cog );
        } elseif ( $export_type === 'current' ) {
            $name = $base_url_without_http . '-export-current-data-edd-' . sanitize_file_name( $start_date ) . '_to_' . sanitize_file_name( $end_date ) . '.csv';
            header( 'Content-Type: text/csv; charset=utf-8' );
            header( 'Content-Disposition: attachment; filename="' . $name . '"' );
            $stat->exportFullCurrent( $label, $start_date, $end_date, $filter_type, $model, $cog );
        }
    }

    function singleEddReport() {
        if ( ! current_user_can( 'manage_pys' ) ) {
            wp_die( 'Unauthorized' );
        }

        ob_clean();

        $start_date        = isset( $_REQUEST['start_date'] )        ? sanitize_text_field( wp_unslash( $_REQUEST['start_date'] ) )        : '';
        $end_date          = isset( $_REQUEST['end_date'] )          ? sanitize_text_field( wp_unslash( $_REQUEST['end_date'] ) )          : '';
        $filter_id         = isset( $_REQUEST['filter_id'] )         ? absint( $_REQUEST['filter_id'] )                                    : 0;
        $filter_type       = isset( $_REQUEST['filter_type'] )       ? sanitize_key( $_REQUEST['filter_type'] )                           : '';
        $single_table_type = isset( $_REQUEST['single_table_type'] ) ? sanitize_key( $_REQUEST['single_table_type'] )                     : '';
        $model             = isset( $_REQUEST['model'] )             ? (int) $_REQUEST['model']                                           : 0;
        $cog               = isset( $_REQUEST['cog'] )               ? (int) $_REQUEST['cog']                                             : 0;

        $name = 'export-' . sanitize_file_name( $filter_type ) . '-' . $filter_id . '-' . sanitize_file_name( $start_date ) . '_to_' . sanitize_file_name( $end_date ) . '.csv';
        header( 'Content-Type: text/csv; charset=utf-8' );
        header( 'Content-Disposition: attachment; filename="' . $name . '"' );
        $stat = $this->eddStatistic;
        $stat->exportSingle( $start_date, $end_date, $filter_id, $single_table_type, $filter_type, $model, $cog );
    }
}


/**
 * @return PysStatistic
 */
function PysStatistic() {
    return PysStatistic::instance();
}

PysStatistic();