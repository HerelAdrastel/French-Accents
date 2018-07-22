<?php
/*
 Plugin Name: Accents
 Description: Ceci est un plugin de test
 License: GPL3
 Author: Herel Adrastel
 Version: 1.0
 */

include_once plugin_dir_path(__FILE__) . '/accent.php';

add_action('admin_head', 'aliel_main' );

function aliel_main() {

	$files = scandir(plugins_url("/buttons", __FILE__));

	foreach ($files as $file) {
		new Accent("e_grave");
	}
}

function debug_to_console( $data ) {
	$output = $data;
	if ( is_array( $output ) )
		$output = implode( ',', $output);

	echo "<script>console.log('" . $output . "');</script>";
}