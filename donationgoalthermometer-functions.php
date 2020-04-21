<?php
/*
 * Custom functions for the Donation Goal Thermometer plugin.
 */

function dgthermometer_shortcode( $atts = array() ) {

	// Get atts and assign vars.
	$donated_total = $atts['donated'];
	$goal_total    = $atts['goal'];
	$data_pct      = ( floatval( $donated_total ) / floatval( $goal_total ) ) * 100;
	// Round pct to 2 decimal places.
	$data_pct      = number_format( $data_pct, 2, '.', '' );
	$vertical      = 'vertical' === $atts[0] ? 'vertical' : '';
	$orientation   = 'vertical' === $atts[0] ? 'data-orientation="vertical"' : '';

	ob_start();

	echo '<section class="donation-goal-thermometer ' . $vertical . '">';

	echo '<div class="meter" data-percent="' . $data_pct . '" data-donated="' . $donated_total . '" data-goal="' . $goal_total . '" ' . $orientation . '></div>';

	echo '</section>';

	// Put contents into a var.
	$output = ob_get_contents();

	// Clear the memory.
	ob_end_clean();

	// Output everything.
	return $output;

}

function dgthermometer_register_shortcodes() {
    add_shortcode( 'donation-goal-thermometer', 'dgthermometer_shortcode' );
}

add_action( 'init', 'dgthermometer_register_shortcodes' );
