<?php // (C) Copyright Bobbing Wide 2017


/**
 * @package oik-privacy-policy
 * 
 * Test the functions in admin/oik-default-privacy-policy.php
 */
class Tests_admin_oik_default_privacy_policy_inc extends BW_UnitTestCase {

	/**
	 */
	function setUp() {
		parent::setUp();
		oik_require( "admin/oik-default-privacy-policy.php", "oik-privacy-policy" );
	}
	
	function test_oik_default_privacy_policy() {
		$this->switch_to_locale( "en_GB" );
		$array = oik_default_privacy_policy();
		$html = $this->arraytohtml( $array );
    $html = str_replace( bw_format_date( null, "F Y"), "Month CCYY", $html );
		//$this->generate_expected_file( $html );
		$this->assertArrayEqualsFile( $html );
		
	}
	
	function test_oik_default_privacy_policy_bb_BB() {
		$this->switch_to_locale( "bb_BB" );
		$array = oik_default_privacy_policy();
		$html = $this->arraytohtml( $array );
		$html = str_replace( bw_format_date( null, "F Y"), "Month CCYY", $html );
		//$this->generate_expected_file( $html );
		$this->assertArrayEqualsFile( $html );
		$this->switch_to_locale( "en_GB" );
	
	}
	
	/**
	 * Reloads the text domains
	 * 
	 * - Loading the 'oik-libs' text domain from the oik-libs plugin invalidates tests where the plugin is delivered from WordPress.org so oik-libs won't exist.
	 * - but we do need to reload oik's and oik-privacy-policy's text domains
	 * - and cause the null domain to be rebuilt... since oik might use it
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
}
