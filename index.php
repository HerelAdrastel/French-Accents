<?php
/*
 Plugin Name: Accents
 Description: Ceci est un plugin de test
 License: GPL3
 Author: Herel Adrastel
 Version: 1.0
 */

include_once plugin_dir_path(__FILE__) . '/Accent.php';

/**
 * Entry point
 */
function aliel_main() {

	// For all the buttons found in the directory buttons, create a button
	$files = scandir(__DIR__ . '/buttons');
	foreach ($files as $file) {
		new Accent($file);
	}
}

/**
 * Debug fuction used in devlopment
 */
function debug_to_console( $data ) {
	$output = $data;
	if ( is_array( $output ) )
		$output = implode( ',', $output);

	echo "<script>console.log('" . $output . "');</script>";
}

add_action('admin_head', 'aliel_main' );
