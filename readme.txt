=== LH Posse ===
Contributors: shawfactor
Donate link: http://localhero.biz/plugins/lh-posse/
Tags: feed, feeds, rss, Facebook, Twitter, POSSE, Indieweb, syndication,xmlrpc,IFTTT
Requires at least: 3.0
Tested up to: 3.9
Stable tag: trunk

A flexible way to syndicate your content to Facebook, Twitter, Google Drive and many more via IFTTT using customised feeds.
== Description ==

Once activated the plugin adds three new feeds. E.G. http://localhero.biz/feed/lh-posse-fb/,  http://localhero.biz/feed/lh-posse-tw/, and   http://localhero.biz/feed/lh-posse-attach/. These feeds are customised for flexible syndication via IFTTT to social media and online productivity apps. You can view the recipes utilising lh-posse feeds here: https://ifttt.com/recipes/search?q=lh-posse&ac=false

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

**0.05 January 6, 2014**  
* Code fix, attachment feed, and twitter app

**0.06 June 5, 2014**  
*  Removed xmlrpc (to be moved to own plugin), added attachment feed