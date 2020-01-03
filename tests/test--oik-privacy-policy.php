<?php // (C) Copyright Bobbing Wide 2017-2020

/**
 * @package oik-privacy-policy
 * 
 * Test the functions in oik-privacy-policy.php
 */
class Tests_oik_privacy_policy extends BW_UnitTestCase {

	/**
	 */
	function setUp(): void {
		parent::setUp();
	}
	
	/** 
	 * Q. Is it possible to test the behaviour of oik-privacy-policy even when it's not activated?
	 * A. It should be since oik-privacy-policy really only responds to admin stuff.
	 * 
	 * Q. What actions do we need to invoke when the plugin's been activated/loaded?
	 * A. Probably depends on the plugin.
	 *
	 * A generic routine might want to determine the plugin/theme name automatically
	 * 
	 * If the plugin's not activated then we don't expect it to be loaded.
	 * There are probably exceptions to this.
	 * If it's not loaded
	 */
	function test_is_plugin_loaded() {
		$plugin = "oik-privacy-policy"; 
		$activated = $this->is_plugin_activated( $plugin );
		$loaded = $this->is_plugin_loaded( $plugin );
		$this->assertEquals( $activated, $loaded );
		
		if ( !$loaded ) {
			//echo "Loading... $plugin" . PHP_EOL;
			$loaded = $this->load_plugin( $plugin );
		}	
		$this->assertTrue( $loaded );
	}
	
	/**
	 * Tests if the given plugin is activated
	 * 
	 * This uses the oik-activation.php file provided by the plugin
	 * This file is expected to exist in plugins which are dependent upon oik.
	 *
	 * @param string $plugin plugin slug
	 * @return bool true if activated
	 */
	function is_plugin_activated( $plugin ) {
		oik_require( "admin/oik-activation.php", $plugin );
		$activated = oik_plugin_is_plugin_activated( $plugin );
		return $activated;
	}
	
	/**
	 * Tests if the plugin is loaded
	 * 
	 * This uses the oik shared library file.
	 * Perhaps this file should be delivered in oik-batch?
	 * 
	 * We need to specify the full file name of the main plugin file
	 * otherwise we could end up finding a test file with the same suffix.
	 *
	 * What separator character should we be using?
	 * We can't use oik_path since that creates a fully qualified file name
	 * which may mess things up when using symlinks. 
	 * 
	 * @param string $plugin plugin slug
	 * @return bool true if the file is loaded
	 */
	function is_plugin_loaded( $plugin ) {
		oik_require_lib( "bobbfunc" );
		$loaded_file = bw_is_loaded( "oik-privacy-policy\oik-privacy-policy.php", false );
		$loaded = (bool) $loaded_file;
		return $loaded;
	}
	
	/**
	 * Loads the plugin's main file
	 */
	function load_plugin( $plugin ) {
		//echo $plugin . PHP_EOL;
		oik_require( "$plugin.php", $plugin );
		$loaded = $this->is_plugin_loaded( $plugin );
		return $loaded;
	}
	
	/**
	 * Reloads the text domains
	 * 
	 * - Loading the 'oik-libs' text domain from the oik-libs plugin invalidates tests where the plugin is delivered from WordPress.org so oik-libs won't exist.
	 * - but we do need to reload oik's and oik-nivo-slider's text domains
	 * - and cause the null domain to be rebuilt.
	 */
	function reload_domains() {
		$domains = array( "oik", "oik-privacy-policy" );
		foreach ( $domains as $domain ) {
			$loaded = bw_load_plugin_textdomain( $domain );
			$this->assertTrue( $loaded, "$domain not loaded" );
		}
		oik_require_lib( "oik-l10n" );
		oik_l10n_enable_jti();
	}
	
	/**
	 * Tests that the privacy policy menu is created with translated titles
	 */
	
	function test_oik_privacy_policy_admin_menu() {
		wp_set_current_user( 1 );
		$this->unset_submenu();
		$this->switch_to_locale( 'en_GB' );
		oik_privacy_policy_admin_menu();
		$registered = get_registered_settings();
		$this->assertArrayHasKey( 'bw_privacy_policy', $registered );
		global $submenu;
		
		$html = $this->arraytohtml( $submenu );
		//$this->generate_expected_file( $html );
		$this->assertArrayEqualsFile( $html );
		$this->switch_to_locale( 'en_GB' );
	}
	
	/**
	 * Tests that the privacy policy menu is created with translated titles
	 */
	function test_oik_privacy_policy_admin_menu_bb_BB() {
		wp_set_current_user( 1 );
		$this->unset_submenu();
		$this->switch_to_locale( 'bb_BB' );
		oik_privacy_policy_admin_menu();
		$registered = get_registered_settings();
		$this->assertArrayHasKey( 'bw_privacy_policy', $registered );
		global $submenu;
		$html = $this->arraytohtml( $submenu );
		//$this->generate_expected_file( $html );
		$this->assertArrayEqualsFile( $html );
		$this->switch_to_locale( 'en_GB' );
	}
	
	function unset_submenu() {	
		unset( $GLOBALS['submenu'] );
		//print_r( $GLOBALS['submenu'] );
	}

	


}
