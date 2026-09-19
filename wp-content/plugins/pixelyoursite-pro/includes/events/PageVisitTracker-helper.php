<?php

namespace PixelYourSite;

class PageVisitTracker {
	private $user_id;
	private $ip_address;
	private $table_name;

	public function __construct($user_id = null) {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'pys_user_page_visits';

		$this->ip_address = $this->get_user_ip();
		if ($user_id && !empty($user_id)) {
			$this->user_id = $user_id;
		}

		$this->create_table_if_not_exists();

	}

	// Delegates to the canonical PYS()->get_user_ip() implementation
	// (supports CF-Connecting-IP, True-Client-IP, pys_client_ip filter).
	private function get_user_ip() {
		return PYS()->get_user_ip();
	}

	// Method for creating a table if it doesn't exist yet
	private function create_table_if_not_exists() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE IF NOT EXISTS {$this->table_name} (
		    id INT AUTO_INCREMENT,
		    user_id INT DEFAULT NULL,
		    ip_address VARCHAR(45) DEFAULT NULL,
		    event_id INT NOT NULL,
		    visit_count INT DEFAULT 1,
		    PRIMARY KEY (id),
		    UNIQUE KEY unique_user_page (user_id, ip_address, event_id)
		) $charset_collate;";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}


	// Method for updating the hit counter
	public function update_page_visits($event_id) {
		global $wpdb;
		$existingEntry = null;
		// Exclude admin, AJAX requests, wp-json, and wp-cron pages
		if (is_admin() || (function_exists('wp_doing_ajax') && wp_doing_ajax())) {
			return; // Do not track visits for these conditions
		}


		// Prepare the query to check for an existing entry
		if(!empty($this->user_id)){
			$existingEntry = $wpdb->get_row($wpdb->prepare(
				"SELECT id, visit_count FROM {$this->table_name} WHERE ip_address = %s AND user_id = 0",
				$this->ip_address
			));
		}

		if ($existingEntry) {
			// Entry exists, update the visit_count of the existing user_id entry and delete the duplicate
			$wpdb->query($wpdb->prepare(
				"INSERT INTO {$this->table_name} (user_id, ip_address, event_id, visit_count) VALUES (%d, %s, %d, %d + 1)
            ON DUPLICATE KEY UPDATE visit_count = visit_count + 1",
				$this->user_id, $this->ip_address, $event_id, $existingEntry->visit_count
			));

			// Delete the duplicate entry
			$wpdb->delete($this->table_name, ['id' => $existingEntry->id]);
		} else {
			$wpdb->query($wpdb->prepare(
				"INSERT INTO {$this->table_name} (user_id, ip_address, event_id, visit_count) VALUES (%d, %s, %d, 1)
            ON DUPLICATE KEY UPDATE visit_count = visit_count + 1",
				$this->user_id, $this->ip_address, $event_id
			));
		}
	}

	// Method for getting the number of visits
	public function get_page_visit_count($event_id) {
		global $wpdb;


		// We get the number of visits for a specific user/IP and page
		$visit_count = $wpdb->get_var($wpdb->prepare(
			"SELECT visit_count FROM {$this->table_name} WHERE  user_id = %d AND ip_address = %s AND event_id = %d",
			$this->user_id ,$this->ip_address, $event_id
		));

		return $visit_count ? $visit_count : 0;
	}
}