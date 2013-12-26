=== LH Posse ===
Contributors: shawfactor
Donate link: http://localhero.biz/plugins/lh-posse/
Tags: feed, feeds, rss, Facebook, Twitter, POSSE, Indieweb, syndication,xmlrpc
Requires at least: 3.0
Tested up to: 3.8
Stable tag: trunk

A flexible way to syndicate your content to Facebook and Twitter via IFTTT using customised feeds.
== Description ==

Once activated the plugin adds two new feeds. E.G. http://localhero.biz/feed/lh-posse-fb/ and http://localhero.biz/feed/lh-posse-tw/ these feeds are customised for flexible syndication via IFTTT to social media. You can view the recipes utilising lh-posse feeds here: https://ifttt.com/recipes/search?q=lh-posse&ac=false

It has been developed for use in [LocalHero][].

[LocalHero]: http://localhero.biz/

To assist in this synidication LH-posse also:

* Publishes OGP meta in the HEAD of your HTML (will overide the Jetpacks OGP if Jetpack is installed);
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

**0.03 December 22, 2013**  
* Got xmlrpc server working properly

**0.04 December 24, 2013**  
* RPC helper classes