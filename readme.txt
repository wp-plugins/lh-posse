=== LH Posse ===
Contributors: shawfactor
Donate link: http://lhero.org/plugins/lh-posse/
Tags: feed, feeds, rss, Facebook, Twitter, POSSE, Indieweb, syndication,xmlrpc,IFTTT
Requires at least: 3.0
Tested up to: 4.2
Stable tag: trunk

A flexible way to syndicate your content to Facebook, Twitter, or anywhere via IFTTT using customised feeds.
== Description ==

Once activated the plugin adds three new feeds:

To assist in this synidication LH-posse also:

* A Facebook optimised feed of your posts: eg http://lhero.org/?feed=lh-posse-fb.
* A twitter optimised feed of your posts: eg http://lhero.org/?feed=lh-posse-tw
* A general feed of your attachments: eg http://lhero.org/?feed=lh-posse-attach

All feeds are built to work with post formats so the message output that is avaialable for each social network (or other location) is tailored for thta social network and adjusted based on the post format used.

It has been developed for use in [LocalHero][].

[LocalHero]: http://localhero.biz/

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

**0.07 February 13, 2015**  
*  Removed twitter api, now has its own plugin (to be added to repository)