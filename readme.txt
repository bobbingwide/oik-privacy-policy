=== oik-privacy-policy ===
Contributors: bobbingwide, vsgloik
Donate link: https://www.oik-plugins.com/oik/oik-donate/
Tags: privacy policy, UK cookie law, EU cookie directive, oik
Requires at least: 4.9.8
Tested up to: 6.6.2
Stable tag: 1.4.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Gutenberg compatible: Yes

Generate a privacy policy page, compliant with UK cookie law (EU cookie directive) for use on your website

== Description ==
Every website should have a privacy policy. The privacy policy should define how your website uses cookies.
This plugin will help you create your policy page, and attach it to a menu of your choice.
Choose the sections you require and tailor them for your company's information.
The sample text uses shortcodes to reduce the amount of editing you need to do.

While the privacy policy page that is generated is not aware of the block editor, the content is compatible with it.
Since WordPress v4.9.6, core has provided its own privacy notice generator.
We recommend you switch to using the WordPress solution and deactivate this plugin.


== Installation ==
1. Upload the contents of the oik-privacy-policy plugin to the `/wp-content/plugins/oik-privacy-policy' directory
1. Activate the oik-privacy-policy plugin through the 'Plugins' menu in WordPress
1. Visit oik options > privacy policy
1. Choose the sections to include, customise the text then Preview
1. When satisfied Generate your Privacy policy page
1. Deactivate the plugin

Note: oik-privacy-policy is dependent upon the oik plugin. You can activate it but it will not work unless oik is also activated.
Download oik from 
[oik download](https://wordpress.org/plugins/oik/)

== Frequently Asked Questions == 
= Installation = 
 
1. Upload the contents of the oik-privacy-policy plugin to the `/wp-content/plugins/oik-privacy-policy' directory
1. Activate the oik-privacy-policy plugin through the 'Plugins' menu in WordPress
1. Visit oik options > privacy policy
1. Choose the sections to include, customise the text then Preview
1. When satisfied Generate your Privacy policy page
1. Deactivate the plugin

Note: oik-privacy-policy is dependent upon the oik plugin. You can activate it but it will not work unless oik is also activated.
Download oik from 
[oik download](https://wordpress.org/plugins/oik/)

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
[Download a PDF version from oik-plugins](https://www.oik-plugins.com/wp-content/uploads/2012/05/Sample3_privacy_policy.pdf)

The wording for the Cookie categories sections came from the ICC UK Cookie Guide.
[Download ICC UK Cookie Guide Second Edition November 2012](https://www.cookielaw.org/media/1096/icc_uk_cookiesguide_revnov.pdf)

= Is it OK to use this text? =
Yes, but it needs additions for GDPR.

In May 2012, Business Link provided a number of samples. The introduction page for the Sample IT policies, disclaimers and notices page said:
This guide gives sample wording for common internet-related statements and notices. It outlines the main issues that these notices should cover, which in turn will help you to write your own statements tailored to your business' needs. These sample internet policies and notices can be used and modified without copyright infringement.

You can still find this same text on [NI Business Info - sample IT policies, disclaimers and notices](https://nibusinessinfo.co.uk/content/sample-it-policies-disclaimers-and-notices)

= Which of the cookie categories do I need? =

1. Category 1 definitely. WordPress uses a number of cookies
1. Category 2 if you use Google Analytics or similar
1. Category 3 if you use cookies to remember user's choices
1. Category 4 if you use targeting or advertising cookies

Note: For Category 2, 3 and 4 you need to obtain consent.
For Categories 2 and 3 you *can* obtain consent by functional use.

= How do I obtain consent for category 4 cookies? = 
I recommend using a WordPress plugin.
[search for cookie](https://wordpress.org/plugins/search/cookie/)

= Where do I find the list of cookies my site uses? =
You should do a cookie audit. 
Either use the [cookie-cat](https://www.wordpress.org/plugins/cookie-cat/) plugin or perform a cookie audit.
For more information on cookies that WordPress websites may use visit the [cookie-cat website](https://www.cookie-cat.co.uk)


= Can this plugin generate other policies? =
No. There's no need.

= Where can I find more information? = 
[oik-privacy-policy FAQs](https://www.oik-plugins.com/oik-plugins/privacy-policy-page-generator/?oik-tab=faq)

== Screenshots ==
1. oik options - privacy policy: Introduction, effective from
1. privacy policy: Cookie categories sections
1. Preview: Cookie categories sections
1. Generate page: set page title, choose menu
1. Sample generated page: from What is a cookie? 

== Upgrade Notice ==
= 1.4.8 =
Removed dependency on bobbfunc's ep()

== Changelog ==
= 1.4.8 =
* Changed: Removed dependency on bobbfunc's ep() #10
* Tested: With WordPress 6.6.2 and WordPress Multisite
* Tested: With PHPUnit 9.6
* Tested: With PHP 8.3

== Further reading ==
If you want to read more about the oik plugins then please visit the
[oik plugin](https://www.oik-plugins.com/oik) 
**"the oik plugin - for often included key-information"**