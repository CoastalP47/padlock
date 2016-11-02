<?php
/**
 * Fired during plugin activation
 *
 * @link       http://pateason.com
 * @since      1.0.0
 *
 * @package    Padlock
 * @subpackage Padlock/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Padlock
 * @subpackage Padlock/includes
 * @author     Pat Eason <patrick@pateason.com>
 */
class Padlock_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate(){
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		Padlock_Activator::createAuthAssignmentTable();
		Padlock_Activator::createAuthRuleTable();
	}

	private static function createAuthAssignmentTable(){
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		//auth_assignments
		$table_name = $wpdb->prefix . "padlock_auth_assignment";
		$sql = "CREATE TABLE $table_name (
		  id TINYINT(11) NOT NULL AUTO_INCREMENT,
		  user_id TINYINT(11) NOT NULL,
		  auth_rule TINYINT(11) NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta($sql);
	}

	private static function createAuthRuleTable(){
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		//auth_rules
		$table_name = $wpdb->prefix . "padlock_auth_rule";
		$sql = "CREATE TABLE $table_name (
		  id TINYINT(11) NOT NULL AUTO_INCREMENT,
		  name VARCHAR(255) NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta($sql);
	}

}
