<?php // (C) Copyright Bobbing Wide 2012-2017, 2023

/**
 * Display privacy policy inactive message
 * 
 * Display a message when oik-privacy-policy is not fully functional due to the dependencies not being activated or installed
 * Note: We can't use oik APIs here as we don't know if it's activated.
 * If the message is issued due to a version mismatch then there is a chance that one plugin attempts to use
 * functions that are not available in the dependent plugin. How do we manage this?
 *
 * @param string $plugin
 * @param string $dependencies
 */
function oik_privacy_policy_inactive( $plugin=null, $dependencies=null ) {
  $dependencies = str_replace( ":", " version ", $dependencies );
  $text = "<p><b>oik-privacy-policy may not be fully functional</b>. It is dependent upon the <b>oik</b> plugin. ";
  $text.= "Please install and activate the required version of this plugin: $dependencies</p>";
  if ( current_filter() == "admin_notices" ) {
    $message = '<div class=" updated fade">';
    $message .= $text;
    $message .= '</div>'; 
    
  } else {
    $message = '<tr class="plugin-update-tr">';
    $message .= '<td colspan="3" class="plugin-update colspanchange">';
    $message .= '<div class="update-message">';
    $message .= $text;
    $message .= "</div>";
    $message .= "</td>";
    $message .= "</tr>";
  }
  echo $message; 
}

/** 
 * Define the admin options for oik privacy policy
 */
function oik_privacy_policy_lazy_admin_menu() {
  register_setting( 'oik_privacy_policy_options', 'bw_privacy_policy', 'oik_privacy_policy_options_validate' ); 
  //add_submenu_page( $parent slug, $page_title, $menu_title, $capability, $menu_slug, $function ); 
  add_submenu_page( 'oik_menu', __( 'privacy policy setup', 'oik-privacy-policy' ), __( "privacy policy", 'oik-privacy-policy' ), 'manage_options', 'oik_privacy_policy', "oik_privacy_policy_options_do_page" );
}

/**
 * Validate the privacy policy fields
 *
 * Note: Checkboxes don't need validating
 * and there's little point validating the text since we allow (X)HTML and shortcodes
 * AND if the user chooses to change a list start field to something else
 * it may not be necessary to check the list end is the right tag.
 *
 * Of course, we're assuming the user is reasonably web savvy
 * and not trying to hack the system.
 * 
 * @param $input 
 * @return $input 
 */
function oik_privacy_policy_options_validate( $input ) {
  return( $input ); 
}

/**
 * Set textdomain context for oik_privacy_policy
 */
function oik_privacy_policy_i18n() {
  if ( function_exists( "bw_context" ) ) {
    bw_context( "textdomain", "oik-privacy-policy" );
  }  
}

/**
 * Display the oik Privacy policy admin page
 * 
 * Use process:
 * Complete the fields in the Privacy policy template, using the checkbox to selectively include/exclude sections.
 * Clicks on the Preview button to preview the policy
 * When happy uses Generate to generate a new page, in the chosen menu  
 */
function oik_privacy_policy_options_do_page() {
  oik_privacy_policy_i18n();
  $generate = bw_array_get( $_REQUEST, "_bw_privacy_policy_generate", null );
  if ( $generate ) {
    oik_privacy_policy_generate_page();
  }
  BW_::oik_menu_header( __( "privacy policy setup", "oik-privacy-policy" ), "w60pc" );
  BW_::oik_box( NULL, NULL, __( "Privacy policy", "oik-privacy-policy" ), "oik_privacy_policy_options" );
  ecolumn();
  scolumn( "w40pc" );
  BW_::oik_box( NULL, NULL, __( "Preview", "oik-privacy-policy" ), "oik_privacy_policy_preview" );
  BW_::oik_box( NULL, NULL, __( "Generate", "oik-privacy-policy" ), "oik_privacy_policy_generate" );
  oik_menu_footer();
  bw_flush();
}

/**
 * Displays privacy policy options
 */
function oik_privacy_policy_options() {
  BW_::p( __( "Choose the content for your privacy policy, change the text as required.", "oik-privacy-policy" ) );
  BW_::p( __( "Click on <b>Preview</b> to see how the privacy policy will appear.", "oik-privacy-policy" ) );   
  
  $option = "bw_privacy_policy"; 
  $options = bw_form_start( $option, "oik_privacy_policy_options" );
  oik_require( "admin/oik-default-privacy-policy.php", "oik-privacy-policy" );
  $options = bw_reset_options( $option, $options, "oik_default_privacy_policy", "_bw_privacy_policy_reset" ); 
  bw_trace2( $options );
  
  $len = 100;
  
  BW_::bw_textarea_cb_arr( $option, __( "Introduction", "oik-privacy-policy" ), $options, 'intro', $len, 5 );
  BW_::bw_textarea_cb_arr( $option, __( "Effective from", "oik-privacy-policy" ) , $options, "effdate", $len, 1 );
  
  BW_::bw_textarea_cb_arr( $option, __( "We collect", "oik-privacy-policy" ) , $options, "wecollect", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Name", "oik-privacy-policy" ) , $options, "wecollect-name", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Contact", "oik-privacy-policy" ) , $options, "wecollect-contact", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Demographic", "oik-privacy-policy" ) , $options, "wecollect-demographics", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Other", "oik-privacy-policy" ) , $options, "wecollect-other", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( "list end", "oik-privacy-policy" ) , $options, "wecollect-eul", $len, 1 );

  BW_::bw_textarea_cb_arr( $option, __( "We use it for", "oik-privacy-policy" ) , $options, "weusefor", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Internally", "oik-privacy-policy" ) , $options, "weusefor-internal", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Improve", "oik-privacy-policy" ) , $options, "weusefor-improve", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Emails", "oik-privacy-policy" ) , $options, "weusefor-emails", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Research", "oik-privacy-policy" ) , $options, "weusefor-research", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( "list end", "oik-privacy-policy" ) , $options, "weusefor-eul", $len, 1 );

  BW_::bw_textarea_cb_arr( $option, __( "Security", "oik-privacy-policy" ) , $options, "security", $len, 4 );
  
  BW_::bw_textarea_cb_arr( $option, __( "<b>Cookies</b>", "oik-privacy-policy" ) , $options, "cookies", $len, 5 );
  BW_::bw_textarea_cb_arr( $option, __( "Cookie info", "oik-privacy-policy" ) , $options, "cookies-info", $len, 1);
  BW_::bw_textarea_cb_arr( $option, __( ".. All about cookies", "oik-privacy-policy" ) , $options, "cookies-all-about", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Online choices", "oik-privacy-policy" ) , $options, "cookies-online-choices", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Google video", "oik-privacy-policy" ) , $options, "cookies-google-video", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( "list end", "oik-privacy-policy" ) , $options, "cookies-info-eul", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( "More info", "oik-privacy-policy" ) , $options, "cookies-more-info", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( "Relevant adverts", "oik-privacy-policy" ) , $options, "cookies-help-ads", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( "Categorised", "oik-privacy-policy" ) , $options, "cookies-categorised", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( "Category 1", "oik-privacy-policy" ) , $options, "cookie-cat-1", $len, 5 );
  
  BW_::bw_textarea_cb_arr( $option, __( "Category 2", "oik-privacy-policy" ) , $options, "cookie-cat-2", $len, 5 );
  BW_::bw_textarea_cb_arr( $option, __( "Consent", "oik-privacy-policy" ) , $options, "cookie-consent-2", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( "Category 3", "oik-privacy-policy" ) , $options, "cookie-cat-3", $len, 5 );
  BW_::bw_textarea_cb_arr( $option, __( "Consent", "oik-privacy-policy" ) , $options, "cookie-consent-3", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( "Category 4", "oik-privacy-policy" ) , $options, "cookie-cat-4", $len, 5 );
  
  BW_::bw_textarea_cb_arr( $option, __( "Cookie list", "oik-privacy-policy" ) , $options, "cookie-list", $len, 5 );
  // This is where we will call the code to list the cookies  **?**
  
  //BW_::bw_textarea_cb_arr( $option, __( "Analytics", "oik-privacy-policy" ) , $options, "cookies-analytics", $len, 5 );
  //BW_::bw_textarea_cb_arr( $option, __( "Service", "oik-privacy-policy" ) , $options, "cookies-service", $len, 5 );
  
  BW_::bw_textarea_cb_arr( $option, __( "External links", "oik-privacy-policy" ) , $options, "links", $len, 5 );
  BW_::bw_textarea_cb_arr( $option, __( "Personal information", "oik-privacy-policy" ) , $options, "personal-info", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Direct marketing", "oik-privacy-policy" ) , $options, "personal-info-dm", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( ".. Changes", "oik-privacy-policy" ) , $options, "personal-info-change", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( "list end", "oik-privacy-policy" ) , $options, "personal-info-eul", $len, 1 );

  BW_::bw_textarea_cb_arr( $option, __( "Third parties", "oik-privacy-policy" ) , $options, "third-parties", $len, 5 );
  BW_::bw_textarea_cb_arr( $option, __( "Data Protection Act 1998", "oik-privacy-policy" ) , $options, "data-protection", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( "Small fee", "oik-privacy-policy" ) , $options, "data-protection-fee", $len, 1 );
  BW_::bw_textarea_cb_arr( $option, __( "Write to", "oik-privacy-policy" ) , $options, "data-protection-addr", $len, 2 );
  BW_::bw_textarea_cb_arr( $option, __( "Correction", "oik-privacy-policy" ) , $options, "data-correction", $len, 3 );
  etag( "table" ); 
  e( isubmit( "ok", __("Preview", "oik-privacy-policy" ), null, "button-primary" ) ); 
  etag( "form" );
  
  bw_flush();
}

/**
 * build the content for a text field if the checkbox is "on"  
 */
function bw_build_content( $array, $index ) {
  $cb = bw_array_get( $array, "{$index}_cb", false );
  if ( $cb ) 
    $text = bw_array_get( $array, $index, null );
  else
    $text = null;
  if ( $text ) 
    e( $text );
}

/**
 * Build the privacy policy for the selected items 
 *
 * Note: since we set options to a null string when resetting them 
 */
function oik_build_privacy_policy() {   
  $option = "bw_privacy_policy"; 
  $options = bw_recreate_options( $option );
  if ( $options !== FALSE && is_array( $options) && count( $options)) {
    foreach ( $options as $key => $value ) {
      if ( substr( $key, -1,3 ) != "_cb" ) { 
        bw_build_content( $options, $key );
      }  
    }  
  }    
}

/** 
 * Display a preview of the privacy policy
 *
 */
function oik_privacy_policy_preview() {
  oik_build_privacy_policy();  
  $page = bw_ret();
  e( apply_filters( 'the_content', $page ) );
  oik_privacy_policy_reset_form(); 
  bw_flush();
}

function oik_privacy_policy_reset_form() {
  bw_form( );
  //$reset = "<input type=\"submit\" name=\"_bw_privacy_policy_reset\" value=\"Reset to defaults\" class=\"button-secondary\"/>";
  //e ( $reset );
  e( isubmit( "_bw_privacy_policy_reset", __("Reset to defaults", "oik-privacy-policy" ), null, "button-secondary" ) ); 
  etag( "form" );
}

/**
 * Generate the privacy policy page
 */ 
function oik_privacy_policy_generate_page() {
  bw_flush();
  oik_build_privacy_policy();
  $page = bw_ret();
  if ( $page ) {
    $title = bw_array_get( $_REQUEST, "bw_privacy_policy_title", __( "Privacy policy", "oik-privacy-policy" ) ); 
    $page_id = _bw_create_page( $title, "page", $page );
    
    $menu = bw_array_get( $_REQUEST, "bw_nav_menu", null );    
    if ( $menu > 0 ) {
       oik_require( "includes/oik-menus.php" );
       bw_insert_menu_item( $title, $menu, $page_id, 0 );
    }
    sdiv( "updated", "message" );
    sp();
    e( __( "Page created:", "oik-privacy-policy" ) );
    e( "&nbsp;" . $title . "&nbsp;" );
    BW_::alink( null, get_permalink( $page_id ), __( "View page", "oik-privacy-policy" ) );
    ep();
    ediv();
  } else {
    sdiv( "error", "message" ); 
    BW_::p( __( "Please select some checkboxes and <b>Preview</b> the result before choosing <b>Generate page</b>", "oik-privacy-policy" ) );
    ediv();
  }
}

/**
 * Create the generate Privacy Policy form 
 */
function oik_privacy_policy_generate() {
  e( '<form method="post" action="" class="inline">' ); 
  stag( 'table class="form-table"' );
  BW_::bw_textfield( "bw_privacy_policy_title", 30, __( "Page title", "oik-privacy-policy" ), __( "Privacy policy", 'oik-privacy-policy') );
  oik_privacy_policy_menu_selector();
  etag( "table" );
  e( isubmit( "_bw_privacy_policy_generate", __( "Generate page", "oik-privacy-policy" ), null, "button-primary" ) ); 
  etag( "form" );
}

if ( !function_exists( "_bw_create_page" ) ) {
function _bw_create_page( $page, $post_type="page", $content=null ) {
  $post = array( 'post_type' => $post_type
               , 'post_status' => 'publish'
               , 'post_title' => $page
               , 'comment_status' => 'closed'
               );
  if ( $content ) {
    $post['post_content'] = $content;
  } else {   
    $post['post_content'] = bw_create_content( $page );
  }  
  $post_id = wp_insert_post( $post, TRUE );
  bw_trace2( $post_id );
  return( $post_id );
}
}  

/**
 * Displays the box allowing the user to choose the menu in which the page is created. 
 */
function oik_privacy_policy_menu_selector() {
  oik_require( "includes/bw_metadata.php" );
  $menus = wp_get_nav_menus( $args = array() );
  $terms = bw_term_array( $menus );
  $terms[0] = __( "none", "oik-privacy-policy" );
  
  $auto_add = get_option( 'nav_menu_options' );
  $auto_add = bw_array_get( $auto_add, "auto_add", 0 );
  $auto_add = bw_array_get( $auto_add, 0, 0 );
  
  if ( $auto_add ) {
    bw_tablerow( array( "&nbsp;", sprintf( __( 'The new page will be added to menu: %1$s', "oik-privacy-policy" ), $terms[$auto_add] ) ) );
  } else { 
    BW_::bw_select( "bw_nav_menu", __( "Add to menu", "oik-privacy-policy" ), $auto_add, array( '#options' => $terms) );
  }
  return( $menus );
}


