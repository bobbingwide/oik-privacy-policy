<?php // (C) Copyright Business Link 2012, (C) Bobbing Wide 2012, 2014

/** 
 * Return an array of the text for each of the different selectable parts of the privacy policy
 *
 * Even though this privacy policy was written for use in the UK and Northern Ireland there is no reason
 * why it could not be translated... into Welsh for example. 
 * It may also be necessary to generate the privacy policy in the language of visitors for whom 
 * English is not their first language.
 *
 * Note: Not all strings are 'correctly' Internationalized.
 * Also note that some HTML only strings are also internationalized.  
 */ 
function oik_default_privacy_policy() {
  $text = array();
  $text['intro']= __( "<p>This privacy policy sets out how [bw_company] uses and protects any information that you give [bw_company] when you use this website.</p>", 'oik-privacy-policy' );
  $text['intro'] .= __( "<p>[bw_company] is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement.</p>", 'oik-privacy-policy' );
  $text['intro'] .= __( "<p>[bw_company] may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.", 'oik-privacy-policy' );
  $text['intro'] .= __( "&nbsp;", 'oik-privacy-policy' );

  $text['effdate'] = __( "This policy is effective from:&nbsp;", 'oik-privacy-policy' ) . bw_format_date( null, "F Y");
  

  $text['wecollect'] = __( "<h3>What we collect</h3>", 'oik-privacy-policy' );
  $text['wecollect'] .= __( "<p>We may collect the following information:</p>", 'oik-privacy-policy' );
  $text['wecollect'] .= __( "<ul>", 'oik-privacy-policy' );
  $text['wecollect-name'] = __( "<li>name and job title</li>", 'oik-privacy-policy' );
  $text['wecollect-contact'] = __( "<li>contact information including email address</li>", 'oik-privacy-policy' );
  $text['wecollect-demographics'] = __( "<li>demographic information such as postcode, preferences and interests</li>", 'oik-privacy-policy' );
  $text['wecollect-other'] = __( "<li>other information relevant to customer surveys and/or offers</li>", 'oik-privacy-policy' );
  $text['wecollect-eul'] = __( "</ul>", 'oik-privacy-policy' );
  
  $text['weusefor'] = __( "<h3>What we do with the information we gather</h3>", 'oik-privacy-policy' );
  $text['weusefor'] .= __( "<p>We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:</p>", 'oik-privacy-policy' );
  $text['weusefor'] .= __( "<ul>", 'oik-privacy-policy' );
  $text['weusefor-internal'] = __( "<li>Internal record keeping.</li>", 'oik-privacy-policy' );
  $text['weusefor-improve'] = __( "<li>We may use the information to improve our products and services</li>", 'oik-privacy-policy' );
  $text['weusefor-emails'] = __( "<li>We may periodically send promotional emails about new products, special offers or other information which we think you may find interesting using the email address which you have provided.</li>", 'oik-privacy-policy' );
  $text['weusefor-research'] = __( "<li>From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone, fax or mail. We may use the information to customise the website according to your interests.</li>", 'oik-privacy-policy' );
  $text['weusefor-eul'] = __( "</ul>", 'oik-privacy-policy' );
  
  $text['security'] = __( "<h3>Security</h3>", 'oik-privacy-policy' );
  $text['security'] .= __( "<p>We are committed to ensuring that your information is secure. In order to prevent unauthorised access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.</p>", 'oik-privacy-policy' );
  
  /* This is the original text from the Business Link sample privacy policy. We replace it by the text from the ICC Cookie Guide   
  
  $text['cookies'] = __( "<h3>How we use cookies</h3>", 'oik-privacy-policy' );
  $text['cookies'] .= __( "<p>A cookie is a small file which asks permission to be placed on your computer's hard drive. ", 'oik-privacy-policy' ); 
  $text['cookies'] .= __( "Once you agree, the file is added and the cookie helps analyse web traffic or lets you know when you visit a particular site. ", 'oik-privacy-policy' );
  $text['cookies'] .= __( "Cookies allow web applications to respond to you as an individual. ", 'oik-privacy-policy' );
  $text['cookies'] .= __( "The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences.</p>", 'oik-privacy-policy' );
  $text['cookies-analytics'] = __( "<p>We use traffic log cookies to identify which pages are being used. This helps us analyse data about webpage traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system.</p>", 'oik-privacy-policy' );
  $text['cookies-service'] = __( "<p>Overall, cookies help us provide you with a better website by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us.</p>", 'oik-privacy-policy' );
  $text['cookies-acceptance'] = __( "<p>You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website.</p>", 'oik-privacy-policy' );
  */
  

  /**
    Implementation of the suggested text from the 
    [ICC UK Cookie guide](http://www.international-chamber.co.uk/components/com_wordpress/wp/wp-content/uploads/2012/04/icc_uk_cookie_guide.pdf)

    In line with recent changes in European legislation, UK law now requires website operators to ask 
    for a website user's permission when placing certain kinds of cookie on their devices for the first time.

    Where consent is required, the law states that it should be "informed consent". 
    This increases the onus on websites to ensure that visitors understand what cookies are and why website operators  and others want to use them.

    The Information Commissioner's Office (ICO) has published detailed guidance on the law.
    A number of other organisations have published information about the use of cookies by businesses.

    e.g. From allaboutcookies.org

    $text['all-about-cookies'] = __( "Also known as browser cookies or tracking cookies, cookies are small, often encrypted text files, located in browser directories. 
                                They are used by us to help our users navigate this website efficiently and perform certain functions. 
                                Due to their core role of enhancing or enabling usability or site processes, disabling cookies may prevent users from using certain parts of this website.", 'oik-privacy-policy' );
                                
  */

  /** Extracted from the April 2012 version of the ICC Cookie Guide */

  $text['cookies'] = __( "<h3>What is a cookie?</h3>", 'oik-privacy-policy' ); 
  $text['cookies'] .= __( "<p>Cookies are text files containing small amounts of information which are downloaded to your device when you visit a website. ", 'oik-privacy-policy' );
  $text['cookies'] .= __( "Cookies are then sent back to the originating website on each subsequent visit, or to another website that recognises that cookie. ", 'oik-privacy-policy' );
  $text['cookies'] .= __( "Cookies are useful because they allow a website to recognise a user's device. ", 'oik-privacy-policy' ); 
  $text['cookies'] .= __( "</p>", 'oik-privacy-policy' );

  $text['cookies-info'] = __( "<p>You can find more information about cookies at:</p><ul>", 'oik-privacy-policy' ); 
  $text['cookies-all-about'] = __( "<li><a href=\"http://www.allaboutcookies.org\">www.allaboutcookies.org</a></li>", 'oik-privacy-policy' );
  $text['cookies-online-choices'] = __( "<li><a href=\"http://www.youronlinechoices.eu\">www.youronlinechoices.eu</a></li>", 'oik-privacy-policy' );
  $text['cookies-google-video'] = __( "<li>For a video about cookies visit <a href=\"http://www.google.co.uk/goodtoknow/data-on-the-web/cookies\">a look at cookies</a></li>", 'oik-privacy-policy' );
  $text['cookies-info-eul'] = __( "</ul>", 'oik-privacy-policy' );

  $text['cookies-more-info'] = __( "Cookies do lots of different jobs, like letting you navigate between pages efficiently, remembering your preferences, and generally improve the user experience. ", 'oik-privacy-policy' );
  $text['cookies-help-ads'] = __( "They can also help to ensure that adverts you see online are more relevant to you and your interests. ", 'oik-privacy-policy' );
  $text['cookies-categorised'] = __( "The cookies used on this website have been categorised based on the categories found in the ICC UK Cookie guide. ", 'oik-privacy-policy' );
  
  $text['cookie-cat-1'] = __( "<h3>Category 1: strictly necessary cookies</h3>", 'oik-privacy-policy' );
  $text['cookie-cat-1'] .= __( "<p>These cookies are essential in order to enable you to move around the website and use its features, such as accessing secure areas of the website. Without these cookies services you have asked for, like shopping baskets or e-billing, cannot be provided.</p>", 'oik-privacy-policy' );                          
                            
  $text['cookie-cat-2'] = __( "<h3>Category 2: performance cookies</h3>", 'oik-privacy-policy' );
  $text['cookie-cat-2'] .= __( "<p>These cookies collect information about how visitors use a website, for instance which pages visitors go to most often, and if they get error messages from web pages. These cookies don't collect information that identifies a visitor. All information these cookies collect is aggregated and therefore anonymous. It is only used to improve how a website works.</p>", 'oik-privacy-policy' );
                            
  $text['cookie-consent-2'] = __( "<p>By using our website, you agree that we can place these type of cookies on your device.</p>", 'oik-privacy-policy' );                                                                                                                  
  
  $text['cookie-cat-3'] = __( "<h3>Category 3: functionality cookies</h3>", 'oik-privacy-policy' );
  $text['cookie-cat-3'] .= __( "<p>These cookies allow the website to remember choices you make (such as your user name, language or the region you are in) and provide enhanced, more personal features. For instance, a website may be able to provide you with local weather reports or traffic news by storing in a cookie the region in which you are currently located. These cookies can also be used to remember changes you have made to text size, fonts and other parts of web pages that you can customise. They may also be used to provide services you have asked for such as watching a video or commenting on a blog. The information these cookies collect may be anonymised and they cannot track your browsing activity on other websites.</p>", 'oik-privacy-policy' );
  
  $text['cookie-consent-3'] = __( "<p>By using our website, you agree that we can place these type of cookies on your device.</p>", 'oik-privacy-policy' );                                                                                                                  
                            
  $text['cookie-cat-4'] = __( "<h3>Category 4: targeting cookies or advertising cookies</h3>", 'oik-privacy-policy' );
  $text['cookie-cat-4'] .= __( "<p>These cookies are used to deliver adverts more relevant to you and your interests They are also used to limit the number of times you see an advertisement as well as help measure the effectiveness of the advertising campaign. They are usually placed by advertising networks with the website operator's permission. They remember that you have visited a website and this information is shared with other organisations such as advertisers. Quite often targeting or advertising cookies will be linked to site functionality provided by the other organizations.</p>", 'oik-privacy-policy' ); 
  
  $text['cookie-list'] = __( "A list of all the cookies used on this website by category is set out below.", 'oik-privacy-policy' );
  // **?** TODO - determine the best way to list cookies
  // Apparently the cookie info needs to include: Cookie Name, Cookie Length (seconds) & Description.
  
  
  $text['links'] = __( "<h3>Links to other websites</h3>", 'oik-privacy-policy' );
  $text['links'] .= __( "<p>Our website may contain links to other websites of interest. ", 'oik-privacy-policy' );
  $text['links'] .= __( "However, once you have used these links to leave our site, you should note that we do not have any control over that other website. ", 'oik-privacy-policy' );
  $text['links'] .= __( "Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. ", 'oik-privacy-policy' );
  $text['links'] .= __( "You should exercise caution and look at the privacy statement applicable to the website in question.</p>", 'oik-privacy-policy' );
  $text['personal-info'] = __( "<h3>Controlling your personal information</h3>", 'oik-privacy-policy' );
  $text['personal-info'] .= __( "<p>You may choose to restrict the collection or use of your personal information in the following ways:</p>", 'oik-privacy-policy' );
  $text['personal-info'] .= __( "<ul>", 'oik-privacy-policy' );
 
  $text['personal-info-dm'] = __( "<li>whenever you are asked to fill in a form on the website, look for the box that you can click to indicate that you do not want the information to be used by anybody for direct marketing purposes</li>", 'oik-privacy-policy' );
  $text['personal-info-change'] = __( "<li>if you have previously agreed to us using your personal information for direct marketing purposes, you may change your mind at any time by writing to or emailing us at [bw_mailto]</li>", 'oik-privacy-policy' );
  $text['personal-info-eul'] = __( "</ul>", 'oik-privacy-policy' );
  
  $text['third-parties'] = __( "<p>We will not sell, distribute or lease your personal information to third parties unless we have your permission or are required by law to do so. We may use your personal information to send you promotional information about third parties which we think you may find interesting if you tell us that you wish this to happen.</p>", 'oik-privacy-policy' );
  $text['data-protection'] = __( "<p>You may request details of personal information which we hold about you under the Data Protection Act 1998.</p>", 'oik-privacy-policy' ); 
  $text['data-protection-fee'] = __( "<p>A small fee will be payable.</p>", 'oik-privacy-policy' ); 
  $text['data-protection-addr'] = __( "If you would like a copy of the information held on you please write to: [bw_address]</p>", 'oik-privacy-policy' );
  $text['data-correction'] = __( "<p>If you believe that any information we are holding on you is incorrect or incomplete, please write to or email us as soon as possible at the above address. We will promptly correct any information found to be incorrect.</p>", 'oik-privacy-policy' );

  return( $text );
}			
