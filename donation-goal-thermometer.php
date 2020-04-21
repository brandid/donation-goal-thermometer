<?php
/*
Plugin Name: Donation Goal Thermometer
Plugin URI:
Description: Display a thermometer chart for donation goals, with an easy to use shortcode.
Version: 0.0.1
Author: brandiD
Author URI: https://thebrandiD.com
Text Domain: donationgoalthermometer
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( "Denied." );
}

// Define Constants.
define( 'DGTHERMOMETER_PLUGIN_VERSION', '0.0.1');

require_once plugin_dir_path( __FILE__ ) . 'donationgoalthermometer-functions.php';

add_action( 'wp_enqueue_scripts', 'donation_goal_thermometer_load_scripts' );

/**
 * Loads required scripts and styles.
 *
 * @since 0.0.1
 *
 */
function donation_goal_thermometer_load_scripts() {

	// Enqueue jQuery.thermometer.
	wp_enqueue_script(
		'jquery-thermometer',
		plugin_dir_url( __FILE__ ) . 'js/jquery.thermometer.js',
		[ 'jquery' ],
		'1.0',
		true
	);

	// Enqueue custom thermometer JS.
	wp_enqueue_script(
		'donation-goal-thermometer-js',
		plugin_dir_url( __FILE__ ) . 'js/donation-goal-thermometer.js',
		[ 'jquery', 'jquery-thermometer' ],
		DGTHERMOMETER_PLUGIN_VERSION,
		true
	);

	wp_enqueue_style(
		'donationgoalthermometer-css',
		plugin_dir_url( __FILE__ ) . 'css/donationgoalthermometer-style.css',
		array(),
		DGTHERMOMETER_PLUGIN_VERSION,
		'all'
	);

}
