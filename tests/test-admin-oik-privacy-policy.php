<?php // (C) Copyright Bobbing Wide 2017


/**
 * @package oik-privacy-policy
 * 
 * Test the functions in admin/oik-privacy-policy.php
 */
class Tests_admin_oik_privacy_policy extends BW_UnitTestCase {

	/**
	 */
	function setUp() {
		parent::setUp();
		//oik_require_lib( "oik-sc-help" );
		if ( !defined( 'BW_TRANSLATE_DEPRECATED' ) ) {
			define( 'BW_TRANSLATE_DEPRECATED', true ); 
		}
		oik_require( "admin/oik-privacy-policy.php", "oik-privacy-policy" );
	}
	
	/**
	 * Reloads the text domains
	 * 
	 * - Loading the 'oik-libs' text domain from the oik-libs plugin invalidates tests where the plugin is delivered from WordPress.org so oik-libs won't exist.
	 * - but we do need to reload oik's and oik-privacy-policy's text domains
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
	 * Tests oik_privacy_options_do_page
	 * which assumes admin/oik-privacy-policy.php has been loaded
	 *
	 * Note: For environment dependence we'll need to update the settings.
	 * We may also need to do this if the site was previously in a different locale.
	 
	 * Need to change the effective from date.
	 
<textarea rows="1" cols="100" name="bw_privacy_policy[effdate]">This policy is effective from:&nbsp;November 2017</textarea>

	* and adjust the nav menu items
	
<select name="bw_nav_menu">
<option value="321" >a2z</option>
<option value="311" >aati</option>
<option value="10" >bwdesign</option>
<option value="82" >ch</option>
<option value="81" >footer</option>
<option value="52" >ginormous_footer</option>
<option value="5" >ImStore</option>
<option value="80" >oik</option>
<option value="3" >Primary</option>
<option value="201" >rngs</option>
<option value="31" >shook</option>
<option value="27" >shortcodes</option>
<option value="6" >Sidebar images</option>
<option value="73" >top</option>
<option value="20" >wordup-galleries</option>
<option value="68" >workingFEEDBACK</option>
<option value="0"  selected='selected'>none</option>
</select>
	 
	 */
	function test_oik_privacy_policy_options_do_page() {
		$this->switch_to_locale( 'en_GB' );
		ob_start(); 
		$_REQUEST['_bw_privacy_policy_reset'] = "on";
		oik_privacy_policy_options_do_page();
		$html = ob_get_contents();
		ob_end_clean();
		$this->assertNotNull( $html );
		$html = $this->replace_admin_url( $html );
		$html = $this->replace_home_url( $html );
		$html = str_replace( bw_format_date( null, "F Y"), "Month CCYY", $html );
		$html = $this->remove_oik_privacy_policy_menu_selector( $html ); 
		$html_array = $this->tag_break( $html );
		$this->assertNotNull( $html_array );
		$html_array = $this->replace_nonce_with_nonsense( $html_array );
		$html_array = $this->replace_nonce_with_nonsense( $html_array, "closedpostboxesnonce", "closedpostboxesnonce" );
		//$this->generate_expected_file( $html_array );
		$this->assertArrayEqualsFile( $html_array );
	}
	
	
	/**
	 * Tests oik_privacy_options_do_page
	 * which assumes admin/oik-privacy-policy.php has been loaded
	 */
	function test_oik_privacy_policy_options_do_page_bb_BB() {
		$this->switch_to_locale( 'bb_BB' );
		$_REQUEST['_bw_privacy_policy_reset'] = "on";
		ob_start(); 
		oik_privacy_policy_options_do_page();
		$html = ob_get_contents();
		ob_end_clean();
		$this->assertNotNull( $html );
		$html = $this->replace_admin_url( $html );
		$html = $this->replace_home_url( $html );
		$html = str_replace( bw_format_date( null, "F Y"), "Month CCYY", $html );
		$html = $this->remove_oik_privacy_policy_menu_selector( $html ); 
		$html_array = $this->tag_break( $html );
		$this->assertNotNull( $html_array );
		$html_array = $this->replace_nonce_with_nonsense( $html_array );
		$html_array = $this->replace_nonce_with_nonsense( $html_array, "closedpostboxesnonce", "closedpostboxesnonce" );
		//$this->generate_expected_file( $html_array );
		$this->assertArrayEqualsFile( $html_array );
		$this->switch_to_locale( 'en_GB' );
	}
	
	/**
	 * Removes the menu selector from the generated HTML.
	 */
	function remove_oik_privacy_policy_menu_selector( $html ) {
		$menu_selector = bw_ret( oik_privacy_policy_menu_selector() );
		$html = str_replace( $menu_selector, "<!-- remove_oik_privacy_policy_menu_selector() -->", $html );
		return $html;
	}
	
	// How can we mess up wp_get_nav_menus? 
	// Need to set nav_menu_options so that $auto_add is true then false
	// 
	
	
	
	
}
	
