=== EU Cookie Law ===
Contributors: alexmoss, Milmor, pleer, ShaneJones
Version:	2.3
Stable tag:	2.3
Author:		Alex Moss, Marco Milesi, Peadig, Shane Jones
Author URI:   https://profiles.wordpress.org/milmor/
Tags: eu cookie, cookies, law, analytics, european, italia, garante, privacy, eu cookie law, italy, cookie, consent, europe
Requires at least: 3.8
Tested up to: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

EU Cookie Law informs users that your site has cookies, with a popup for more information and ability to lock scripts before acceptance.

== Description ==

EU Cookie Law is the easiest, most elegant and complete solution that allows your website to comply the european cookie law by informing users that your site has cookies, with a popup for more information and ability to lock scripts before acceptance. This plugin has been coded to comply the more strict italian law too.

https://www.youtube.com/watch?v=6f2qxC3GZJ8

Demo: [www.sanpellegrinoterme.gov.it](http://www.sanpellegrinoterme.gov.it)

= Features =
* **Customize banner**
* Block scripts if cookies are not accepted
* **Automatic block of iframes, embeds, scripts**
* Set cookie expiry
* Fully **responsive** for tablets and smartphones
* Set banner position
* Complete set of developer Shortcodes and PHP Functions
* Manual and **Automatic** set width and height of blocked content

* Compatible with **multilanguage** plugins
* Compatible with **mobile** themes and plugins 

Simply install the plugin and follow the instructions on the Settings page.

= Cookie block =
You can lock cookies using `[cookie]` and `[/cookie]` shortcodes in every post, page and widget. You can use php functions too:
`if ( function_exists('cookie_accepted') && cookie_accepted() ) {
    // Your code
}`

**More Shortcodes & PHP Functions are available [in our faqs](https://wordpress.org/plugins/eu-cookie-law/faq/).**

> EU Cookie Law started from [Peadig](http://peadig.com/wordpress-plugins/eu-cookie-law/) in 2012 and in june 2015 has became part of [WPGov.it](http://www.wpgov.it) that aims to give Italian Public Government powerful open source solutions for websites.

= Included Languages =

* English (EN) - Authors
* Italian (IT) - Authors

If you want to help out, we have included the .pot file in /language folder.

= Contributions =

* Italian community [Porte Aperte sul Web](http://www.porteapertesulweb.it) for beta-testing and ideas.
* This plugin was originally developed by [Peadig](http://peadig.com/wordpress-plugins/eu-cookie-law/).


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `eu-cookie-law` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to the EU Cookie settings page
4. Go through the steps and hit update!

== Frequently Asked Questions ==

= Shortcodes available =

You can lock parts of code in posts, pages and widget with these shortcode:
`[cookie] ... [/cookie]`
Parameters:
`[cookie height="100px" width="100%" text="Hi <b>WordPress</b>"] //My code [/cookie]`

To display a box (in pages/posts) with ability to revoke consent (if cookies accepted) or accept cookies (if not done yet):
`[cookie-control]`

= PHP Functions available =
You can easily verify if cookies consent has been set with:
`if ( function_exists('cookie_accepted') && cookie_accepted() ) {
    // Your code
}`
However this will limit to not showing the wrapped code. If you want to display a box like when using `[cookie]` shortcode, in  php you have:
`generate_cookie_notice($height, $width);
generate_cookie_notice_text($height, $width, $text);`

If you think that we should provide more shortcodes, functions, or enhance what we already provide, please let us know in [our forum](https://wordpress.org/support/plugin/eu-cookie-law).

== Screenshots ==

1. Example (cookie not accepted) - [www.sanpellegrinoterme.gov.it](http://www.sanpellegrinoterme.gov.it)
2. Example (cookie accepted) - [www.sanpellegrinoterme.gov.it](http://www.sanpellegrinoterme.gov.it)
3. Example of the banner
4. Example of `[cookie-control]`

== Changelog ==

= 2.3 08.06.2015 =
* **Added automatic block of iframes, embeds, scripts** (beta)
* **Added** option to enable/disable tinymce button
* Performance improvements
* Minor changes

= 2.2.2 08.06.2015 =
* **Fixed** conflict with the_content filter

= 2.2.1 08.06.2015 =
* **Fixed** expire date bug
* **Fixed** shortcodes in widgets
* Minor improvements 

= 2.2 05.06.2015 =
* **Added** customization options (ex. background+font color)
* Added multilanguage support
* Added italian language
* Better UI for options panel
* Minor bugfixes

= 2.1.1 + 2.1.2 04.06.2015 =
* Fixed shortcodes in `[cookie]...[/cookie]` not being correctly rendered
* Best tinymce icon with windowmanager
* New and enhanced developer functions

= 2.1 03.06.2015 =
* Added option to link directly to a page instead of popup
* Added ability to change default cookie-lock message
* Added `[cookie-control]` shortcode
* Minor changes + bugfixes

= 2.0.3 + 2.0.4 + 2.0.5 - 03.06.2015 =
* Fixed cookie storing caused by wrong iso date
* Better css for small screens
* Fixed jquery enqueue 

= 2.0 + 2.0.1 + 2.0.2 - 02.06.2015 =
* Plugin reload

= 1.2 =
* Fixed cookie storing bug in Firefox

= 1.1 =
* Fixed cookie storing bug
* Added in CSS support for IE