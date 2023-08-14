=== WP Report Post ===
Contributors: esiteq
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FHF5UF699YTSW&source=url
Tags: report, post, page
Requires at least: 3.0.1
Tested up to: 5.2
Requires PHP: 5.2
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Highly customizable plugin to let your site visitors to report posts with inappropriate contents to administrator / editor.

== Description ==

Report Post is a highly customizable plugin that lets your visitors to report posts or pages with inappropriate content. All these reports are displayed as a table in your Administrator section so you can decide what to do next: edit contents, unpublish posts/pages, or just delete these reports. The plugin was designed to work in both automatic and manual modes. In automatic mode, the link to report will be added to post's meta box. In manual mode, you can place the link, button or image anywhere you want in templates.

Features:

* Easy to use - you can simply activate the plugin and it will do the thing
* Highly customizable via Options and CSS
* AJAX based - no page reload will occur
* Can be used in Automatic and Manual modes (to use in templates)
* Works for Posts, Pages and Custom post types
* Supports AJAXly loaded posts, 'infinite scroll' posts, etc.
* Does not use additional databases / tables anymore. All reports are stored in postmeta.
* Modal window instead of expandable form (works with AJAXly loaded posts!)
* Bulk Unpublish, Publish, Delete Posts, Delete Reports
* All texts displayed in front end are customizable via Options
* Admin notification about reported posts
* Can use Captcha to protect from spam

Plugin demo: www.esiteq.com/projects/wordpress-report-post-plugin/

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wp-report-post` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Enjoy :-)

== Usage ==

Plugin handles 4 class names. Two pre-defined (.report-post-link for a simple link with exclamation mark icon and .report-post-button for button)
and two custom that you can define yourself (.report-post-custom-link and .report-post-custom-button, respectively).

To work correctly, report link must be placed inside of an <article> tag. Article tag must have id="post-XXXX", where XXXX is the id of current post. If your theme does not use <article> tags, you can add post-id="XXXX" attribute to report link, e.g.

    <a href="#" post-id="<?php echo $post->ID; ?>" class="report-post-link">Report Inappropriate Post</a> 

== Frequently Asked Questions ==

= I am using custom Wordpress theme and there is no Report link appears in the post =
You may have specified incorrectly element and class (or id) to add link to. Check your theme's template and find an element that presents in each post.

= I want to use custom link / button / image to display Report form =
You can place report link / form anywhere on the page. Example markup:

    <a href="#" class="report-post-custom-link" post-id="<?php echo $post->ID; ?>">Report Post</a>

== Screenshots ==

1. Report Post Modal window

2. Report post link (it can be a button, or custom link / icon / button / etc)

3. Reported posts in the admin section, grouped by Post

4. Plugin options

== Upgrade Notice ==

= 2.0.1 =
New version imports reports created by version 0.X so they are available again.

= 2.0 =
Be aware when upgrading from 0.X to 2.0. Old report database is not supported anymore. It means that all reports made with previous version of the plugin will be lost. 

== Changelog ==

= 2.1.2 =
Bug fixed: duplicate reports were sent to administrator

= 2.1.1 =
Bug fixed: not expanding report when clicking user name in admin section

= 2.1.0 =
* Email notifications added
* IP Logging added
* reCaptcha added

= 2.0.2 =
Added report date in two formats: Human (e.g 3 minutes ago) and Date / Time

= 2.0.1 =
* Fixed posts per page in admin section, set to 25
* Added import of reports created by version 0.X

= 2.0 =
Completely remastered. Well, this is not an update of previous version of the plugin. This is a new plugin written from scratch.

= 0.2.4 =
Fixed bug with incorrect link to attached image

= 0.2.2 =
Fixed bug with duplicate reports

= 0.2.1 =
Removed engine and encoding from CREATE TABLE query - default values will be used (in case if InnoDB is not supported on your hosting)

= 0.2 =
* Perverted AJAX calls were replaced in a normal Wordpress way
* Added email notifications for reported posts
* Compatible with Wordpress 3.8.x and new themes
* Multiple minor bugfixes

= 0.1 =
* CSS buttons added
* Fixed textarea width