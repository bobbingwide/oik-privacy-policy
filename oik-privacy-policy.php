<?php
/**
Plugin Name: oik-privacy-policy
Depends: oik base plugin
Plugin URI: https://www.oik-plugins.com/oik-plugins/oik-privacy-policy
Description: Generate a privacy policy page, compliant with UK cookie law (EU cookie directive) for use on your website
Version: 1.4.9
Author: bobbingwide
Author URI: https://bobbingwide.com/about-bobbing-wide
Text Domain: oik-privacy-policy
Domain Path: /languages/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

    Copyright 2012-2025 Bobbing Wide (email : herb@bobbingwide.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/

/** 
 * Implement "oik_admin_menu" for oik-privacy-policy
 */
function oik_privacy_policy_admin_menu() {
  oik_require( "admin/oik-privacy-policy.php", "oik-privacy-policy" );
  oik_privacy_policy_lazy_admin_menu( __FILE__ );
}

/**
 * oik-privacy-policy plugin dependency logic
 *
 * This code will produce a message when oik-privacy_policy is activated but oik isn't.
 * 
 * Version     | oik version dependency
 * --------    | ----------------------
 * 1.2         | 1.13
 * 1.3         | 2.2
 * 1.3.1-1.3.3 | 2.5 or higher. Note: oik v2.5 was the latest in April 2015.
 * 1.4.0       | 3.2.2
 * 1.4.1       | 3.2.8
 *
 */ 
function oik_privacy_policy_activation() {
  static $plugin_basename = null;
  if ( !$plugin_basename ) {
    $plugin_basename = plugin_basename(__FILE__);
    add_action( "after_plugin_row_oik-privacy-policy/oik-privacy-policy.php", "oik_privacy_policy_activation" );  
    if ( !function_exists( "oik_plugin_lazy_activation" ) ) { 
      require_once( "admin/oik-activation.php" );
    }
  }  
  $depends = "oik:3.2.8";
  oik_plugin_lazy_activation( __FILE__, $depends, "oik_plugin_plugin_inactive" );
}

/**
 * Function to invoke when oik-privacy-policy is loaded
 */
function oik_privacy_policy_loaded() {
  add_action( "oik_admin_menu", "oik_privacy_policy_admin_menu" );
  add_action( "admin_notices", "oik_privacy_policy_activation", 12 );
}

oik_privacy_policy_loaded();