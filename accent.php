<?php

class Accent {

	/**
	 * @var The name of the accent. Eg: e_acute
	 */
	private $name;

	/**
	 * @var string: The name of the prefix aliel_ to avoid conflicts
	 */
	private $identifier;

	/**
	 * @var string The javascript file linked to the button
	 */
	private $filename;

	public function __construct($name) {
		global $typenow;
		$this->name       = $name;
		$this->identifier = 'aliel_' . $name;
		$this->filename   = plugins_url( '/buttons/' . $name . '.js', __FILE__ );;

		// check user permissions
		if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
			return;
		}
		// verify the post type
		if( ! in_array( $typenow, array( 'post', 'page' ) ) )
			return;
		// check if WYSIWYG is enabled
		if ( get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", array($this, "aliel_register_buttons"));
			add_filter('mce_buttons', array($this, 'aliel_add_buttons'));
		}
	}

	/**
	 * Links the javascript button with the editor
	 */
	public function aliel_register_buttons($plugin_array) {
		$plugin_array[$this->identifier] = $this->filename;
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