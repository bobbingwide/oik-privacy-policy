=== oik-privacy-policy ===
Contributors: bobbingwide, vsgloik
Donate link: http://www.oik-plugins.com/oik/oik-donate/
Tags: privacy policy, UK cookie law, EU cookie directive, oik
Requires at least: 3.9
Tested up to: 4.3
Stable tag: 1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Generate a privacy policy page, compliant with UK cookie law (EU cookie directive) for use on your website

== Description ==
Every website should have a privacy policy. The privacy policy should define how your website uses cookies.
This plugin will help you create your policy page, and attach it to a menu of your choice.
Choose the sections you require and tailor them for your company's information.
The sample text uses shortcodes to reduce the amount of editing you need to do.

== Installation ==
1. Upload the contents of the oik-privacy-policy plugin to the `/wp-content/plugins/oik-privacy-policy' directory
1. Activate the oik-privacy-policy plugin through the 'Plugins' menu in WordPress
1. Visit oik options > privacy policy
1. Choose the sections to include, customise the text then Preview
1. When satisfied Generate your Privacy policy page
1. Deactivate the plugin

Note: oik-privacy-policy is dependent upon the oik plugin. You can activate it but it will not work unless oik is also activated.
Download oik from 
[oik download](http://wordpress.org/extend/plugins/oik/)

== Frequently Asked Questions ==  
= What does this plugin do? =
It helps with the creation of a Privacy Policy page for your website.
It provides sample text, which you can edit, then generates a WordPress page, adding it to your chosen menu.
Checkboxes help you to easily select/deselect the content.

= Can I deactivate the plugin when I've created my page? =
YES. You can deactivate the plugin when you've generated your page.
If you chose to retain the shortcodes in the sample text then you will still need to use the oik plugin.

= From where did you get the sample privacy policy text? =
The text was obtained from a document called Sample3_privacy_policy.doc, downloaded from Business Link's sample privacy policy page.
Since May 2012 the page is no longer accessible. 
[Download a PDF version from oik-plugins](http://www.oik-plugins.com/wp-content/uploads/2012/05/Sample3_privacy_policy.pdf)

The wording for the Cookie categories sections came from the ICC UK Cookie Guide.
[Download ICC UK Cookie Guide Second Edition November 2012](http://www.cookielaw.org/media/1096/icc_uk_cookiesguide_revnov.pdf)

= Is it OK to use this text? =
Yes, Business Link provided a number of samples. The introduction page for the Sample IT policies, disclaimers and notices page said:
This guide gives sample wording for common internet-related statements and notices. It outlines the main issues that these notices should cover, which in turn will help you to write your own statements tailored to your business' needs. These sample internet policies and notices can be used and modified without copyright infringement.

You can still find this same text on [NI Business Info - sample IT policies, disclaimers and notices](http://nibusinessinfo.co.uk/content/sample-it-policies-disclaimers-and-notices)

= Which of the cookie categories do I need? =

1. Category 1 definitely. WordPress uses a number of cookies
1. Category 2 if you use Google Analytics or similar
1. Category 3 if you use cookies to remember user's choices
1. Category 4 if you use targeting or advertising cookies

Note: For Category 2, 3 and 4 you need to obtain consent.
For Categories 2 and 3 you *can* obtain consent by functional use.

= How do I obtain consent for category 4 cookies? = 
I recommend using a WordPress plugin such as 
[cookie-control](http://wordpress.org/extend/plugins/cookie-control/)
or
[cookiecert-eu-cookie-directive](http://wordpress.org/extend/plugins/cookiecert-eu-cookie-directive/)
or
[frankencookie](http://wordpress.org/extend/plugins/frankencookie)

= Where do I find the list of cookies my site uses? =
You should do a cookie audit. 
Either use the [cookie-cat](http://www.wordpress.org/extend/plugins/cookie-cat/) plugin or perform a cookie audit. For more information on cookies that WordPress websites may use visit the [cookie-cat website](http://www.cookie-cat.co.uk)

* I also recommend looking at [Cookie Control by Civic UK](http://www.civicuk.com/cookie-law/index)
* See [Cookie Audits and Privacy Policy](http://civicuk.com/cookie-law/deployment#audit)

= Can this plugin generate other policies? = 
The *WP-Policies* plugin provided a number of policies, including:

* anti-spam policy - policy on SPAM
* disclaimer -  no representations, warranties, or assurances; limitation of Liability
* DMCA notice - Digital Millennium Copyright Act of 1998; respect the individual property of others
* e-mail policy - policy on emails
* earnings disclaimer - you may not get rich with this product
* medical disclaimer - talk to your doctor
* terms of use - website terms and conditions of use
* testimonial disclaimer - policy explaining how testimonials may be used

These may be added to oik-privacy-policy plugin in the future. Let us know your requirements.

= Where can I find more information? = 
[oik-privacy-policy FAQs](http://www.oik-plugins.com/oik-plugins/privacy-policy-page-generator/?oik-tab=faq)

== Screenshots ==
1. oik options - privacy policy: Introduction, effective from
1. privacy policy: Cookie categories sections
1. Preview: Cookie categories sections
1. Generate page: set page title, choose menu
1. Sample generated page: from What is a cookie? 

== Upgrade Notice ==
= 1.3.1 =
* Tested with WordPress 4.3. Now dependent upon oik v2.5 or higher.

= 1.3= 
* Tested with WordPress 4.0. Now dependent upon oik v2.2 or higher.

= 1.2 = 
* Now dependent upon oik base plugin v2.1 or higher for a localized version

= 1.1 = 
* Depends upon oik version 1.17 or higher.  

= 1.0 = 
* Depends upon oik version 1.13 or higher.

== Changelog ==
= 1.3.1 = 
* Changed: Dependent upon oik v2.5
* Changed: Priority of response to "admin_notices" changed from 10 to 12.
* Tested: with WordPress 4.3 and WordPress Multi-Site

= 1.3 =
* Tested: With WordPress 3.9 through 4.0

= 1.2 =
* Changed: Internationalized and created a localized version for the "bb_BB" locale
* Changed: Now depends on oik version 2.1 or higher for i18n and l10n capability to take effect
* Tested: With WordPress 3.8

= 1.1 = 
* Changed: Updated readme.txt - Business Link website has been redeveloped - samples still available from NI Business Info 
* Changed: Updated readme.txt - Use the cookie-cat plugin to create a table of cookies in your Privacy policy
* Changed: Improved dependency checking using functions in a 'common' file  ( admin/oik-activation.php )
* Changed: Now responds to "oik_admin_menu" action.

= 1.0 =
* initial version. Works with oik version 1.13 or higher 

== Further reading ==
If you want to read more about the oik plugins then please visit the
[oik plugin](http://www.oik-plugins.com/oik) 
**"the oik plugin - for often included key-information"**




