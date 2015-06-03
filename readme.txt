=== EU Cookie Law ===
Contributors: alexmoss, Milmor, pleer, ShaneJones
Version:      2.1
Author:       Alex Moss, Marco Milesi, Peadig, Shane Jones
Author URI:   https://profiles.wordpress.org/milmor/
Tags: eu cookie, cookies, law, analytics, european, italia, garante, privacy
Requires at least: 3.8
Tested up to: 4.3
Stable tag: 2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

EU Cookie Law informs users that your site has cookies, with a popup for more information and ability to lock scripts before acceptance.

== Description ==

EU Cookie Law allows to comply the EU Cookie Law by informing users that your site has cookies, with a popup for more information and ability to lock scripts before acceptance.

https://www.youtube.com/watch?v=6f2qxC3GZJ8

Simply install the plugin and follow the instructions on the Settings page.

Demo: [www.sanpellegrinoterme.gov.it](http://www.sanpellegrinoterme.gov.it)

= Features =
* Customizable banner
* Easy shortcodes that block scripts if cookies are not accepted
* Set cookie expiry
* Compatible with multilanguage plugins
* Compatible with mobile themes and plugins 
* Great responsiveness for tablets and smartphones
* Set banner position

= Cookie block =
You can lock cookies using `[cookie]` and `[/cookie]` shortcodes in every page and widget.
ex. `[cookie height="100px" width="100%"] //My code [/cookie]`

In php files:
`if ( cookie_accepted() ) {
	//My code
}`

You can also use `[cookie-control]` in your cookie policy to display a box that allows to revoke consent (if cookies accepted) of accept cookies (if not done yet).



> EU Cookie Law started from [Peadig](http://peadig.com/wordpress-plugins/eu-cookie-law/) in 2012 and in june 2015 has became part of the project [WPGov.it](http://www.wpgov.it) that aims to give Italian Public Government powerful open source solutions to make complete and law-compatible websites.

= Included Languages =

* English (EN) - Authors
* Italian (IT) - Coming soon

= Contributions =

* Italian community [Porte Aperte sul Web](http://www.porteapertesulweb.it) for beta-testing and ideas.
* This plugin was originally developed by [Peadig](http://peadig.com/wordpress-plugins/eu-cookie-law/).


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `eu-cookie-law` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to the EU Cookie settings page
4. Go through the steps and hit update!

== Screenshots ==

1. Example (cookie not accepted) - [www.sanpellegrinoterme.gov.it](http://www.sanpellegrinoterme.gov.it)
2. Example (cookie accepted) - [www.sanpellegrinoterme.gov.it](http://www.sanpellegrinoterme.gov.it)
3. Example of the banner
4. Example of `[cookie-control]`

== Changelog ==

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
