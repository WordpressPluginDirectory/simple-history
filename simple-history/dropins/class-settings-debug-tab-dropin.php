<?php

namespace Simple_History\Dropins;

use Simple_History\Helpers;
use Simple_History\Log_Query;

/**
 * Dropin Name: Settings debug
 * Dropin Description: Adds a tab with debug information
 * Dropin URI: https://simple-history.com/
 * Author: Pär Thernström
 */
class Settings_Debug_Tab_Dropin extends Dropin {
	/** @inheritdoc */
	public function loaded() {
		$this->simple_history->register_settings_tab(
			array(
				'slug' => 'debug',
				'name' => __( 'Debug', 'simple-history' ),
				'order' => 10,
				'icon' => 'build',
				'function' => array( $this, 'output' ),
			)
		);
	}

	/**
	 * Output the tab.
	 */
	public function output() {
		load_template(
			SIMPLE_HISTORY_PATH . 'templates/settings-tab-debug.php',
			false,
			array(
				'instantiated_loggers' => $this->simple_history->get_instantiated_loggers(),
				'instantiated_dropins' => $this->simple_history->get_instantiated_dropins(),
				'instantiated_services' => $this->simple_history->get_instantiated_services(),
				'events_table_name' => $this->simple_history->get_events_table_name(),
				'simple_history_instance' => $this->simple_history,
				'wpdb' => $GLOBALS['wpdb'],
				'plugins' => get_plugins(),
				'dropins' => get_dropins(),
				'tables_info' => Helpers::required_tables_exist(),
				'table_size_result' => Helpers::get_db_table_stats(),
				'db_engine' => Log_Query::get_db_engine(),
			)
		);
	}
}
