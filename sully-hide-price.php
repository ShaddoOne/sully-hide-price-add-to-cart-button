<?php

/*
* Plugin Name: Sully - Hide Price & Add to Cart Button 
* Plugin URI: http://thesully.tech/
* Description: Hide Product Price and add to cart button on shop and product detail page for guest and registered users.
* Author: Connor Sullivan
* Author URI: http://thesully.tech/
* Text Domain: 
* Version: 1.0
*/
/**
 * @package SullyPlugin
 */

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

class SullyPlugin
{
	function __construct() {
		add_action( 'init', array( $this, 'custom_post_type' ) );
	}
	function activate() {
		// generated a CPT
		$this->custom_post_type();
		// flush rewrite rules
		flush_rewrite_rules();
	}
	function deactivate() {
		// flush rewrite rules
		flush_rewrite_rules();
	}
	function uninstall() {
		// delete CPT
		// delete all the plugin data from the DB
	}
	function custom_post_type() {
		register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
	}
}

if ( class_exists( 'SullyPlugin' )) {
	$sullyPlugin = new SullyPlugin();
}

// activation
register_activation_hook( __FILE__, array( $sullyPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $sullyPlugin, 'deactivate' ) );

// uninstall
register_uninstall_hook( __FILE__, array( $sullyPlugin, 'uninstall') );