<?php
/*
 Plugin Name: French Accents
 Description: Adds the majuscule french accents to the text editor like É, È, À, Ç, œ, or Ù
 License: GPL2
 Author: hereladrastel
 Version: 1.0
 */

include_once plugin_dir_path(__FILE__) . '/French_Accent.php';

/**
 * Entry point
 */
function french_accents_main() {

	// For all the buttons found in the directory buttons, create a button
	$files = scandir(__DIR__ . '/buttons');
	foreach ($files as $file) {
		new French_Accent($file);
	}
}

add_action('admin_head', 'french_accents_main' );
