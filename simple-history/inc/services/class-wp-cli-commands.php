<?php

namespace Simple_History\Services;

use WP_CLI;

/**
 * Module that loads WP-CLI commands.
 */
class WP_CLI_Commands extends Service {
	/**
	 * Called when module is loaded.
	 */
	public function loaded() {
		if ( defined( WP_CLI::class ) && WP_CLI ) {
			$this->register_commands();
		}
	}

	/**
	 * Register WP-CLI commands.
	 */
	protected function register_commands() {
		// Backward compatibility alias for simple-history list.
		WP_CLI::add_command(
			'simple-history',
			WP_CLI_List_Command::class,
		);

		WP_CLI::add_command(
			'simple-history db',
			WP_CLI_Db_Command::class,
		);

		// Add command `wp event list`.
		WP_CLI::add_command(
			'simple-history event',
			WP_CLI_List_Command::class,
		);

		// Add command `wp event search`.
		WP_CLI::add_command(
			'simple-history event',
			WP_CLI_Search_Command::class,
		);

		// Add command `wp event get <id>`.
		WP_CLI::add_command(
			'simple-history event',
			WP_CLI_Get_Command::class,
		);
	}
}