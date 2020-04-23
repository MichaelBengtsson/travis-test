<?php

class Wishlist_Test extends Krokedil_Unit_Test_Case {

	public function test_wishlist() {
		global $wpdb;

		$table_name = $wpdb->prefix . 'krokedil_wishlist';
		$flag       = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) ) ) === $table_name;
		$this->assertTrue( $flag );
	}

	public function test_miki_option() {
		print_r( get_option( 'active_plugins' ) );
		$this->assertTrue( get_option( 'miki' ) === 'test' );
	}
}
