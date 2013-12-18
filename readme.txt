=== LH Posse ===
Contributors: shawfactor
Donate link: http://localhero.biz/plugins/lh-posse/
Tags: feed, feeds, rss, Facebook, Twitter, POSSE, Indieweb, syndication
Requires at least: 3.0
Tested up to: 3.8
Stable tag: trunk

This plugin creates two feeds for POSSEing your content to Facebook and Twitter via IFTTT
== Description ==

It has been developed for use in [LocalHero][].

[LocalHero]: http://localhero.biz/

Once activated the plugin adds two new feeds. E.G. http://localhero.biz/feed/lh-posse-fb/ and http://localhero.biz/feed/lh-posse-tw/ these feeds are customised for flexible syndication via IFTTT.

To assist in this synidication LH-posse also:

* Publishes OGP meta in the HEAD of your HTML (will overide the Jetpacks OGP if JETpack is installed);
* Adds a optional OGP logo for your site in the OGP meta;
* Will autotag hastags in posts which use the post format status;

== Installation ==

1. Upload the entire `lh-posse` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. To enable pretty permalinks (e.g. `http://example.com/feed/lh-posse-fb/`), go to Permalinks in the Setting menu and Save.

== Changelog ==

**0.01 November 11, 2013**  
Initial release.

**0.02 December 12, 2013**  
* Mapped basic facebook feed and added twitter feed plus xmlrpc server