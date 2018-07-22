<?php

class Accent {

	/**
	 * The name of the accent. Eg: e_acute
	 */
	private $name;

	/**
	 * The name of the prefix aliel_ to avoid conflicts
	 */
	private $identifier;

	/**
	 * The javascript path linked to the button
	 */
	private $pathname;

	public function __construct($filename) {
		global $typenow;

		// Removes the extension pathname
		$this->name       = basename($filename, ".js");

		// Adds a prefix to make the variable unique
		$this->identifier = 'aliel_' . $this->name;

		// Creates the pathname
		$this->pathname   = plugins_url( '/buttons/' . $filename, __FILE__ );;

		// check user permissions
		if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
			return;
		}
		// verify the post type
		if( ! in_array( $typenow, array( 'post', 'page' ) ) )
			return;
		// check if WYSIWYG is enabled
		if ( get_user_option('rich_editing') == 'true') {
			// Registers and adds the buttons
			add_filter("mce_external_plugins", array($this, "aliel_register_buttons"));
			add_filter('mce_buttons', array($this, 'aliel_add_buttons'));
		}
	}

	/**
	 * Links the javascript button with the editor
	 */
	public function aliel_register_buttons($plugin_array) {
		$plugin_array[$this->identifier] = $this->pathname;
		return $plugin_array;
	}

	/**
	 * Adds the button to the editor
	 */
	public function aliel_add_buttons($buttons) {
		array_push($buttons, $this->identifier);
		return $buttons;
	}

}