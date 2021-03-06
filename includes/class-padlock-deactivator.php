<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://pateason.com
 * @since      1.0.0
 *
 * @package    Padlock
 * @subpackage Padlock/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Padlock
 * @subpackage Padlock/includes
 * @author     Pat Eason <patrick@pateason.com>
 */
class Padlock_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		Padlock_Deactivator::dropAuthAssignmentTable();
		Padlock_Deactivator::dropAuthRuleTable();
	}

	private static function dropAuthAssignmentTable(){
		global $wpdb;
		$table_name = $wpdb->prefix . "padlock_auth_assignment";
		$wpdb->query("DROP TABLE IF EXISTS $table_name");
	}

	private static function dropAuthRuleTable(){
		global $wpdb;
		$table_name = $wpdb->prefix . "padlock_auth_rule";
		$wpdb->query("DROP TABLE IF EXISTS $table_name");
	}

}
