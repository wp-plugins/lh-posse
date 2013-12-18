<?php
header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:atom="http://www.w3.org/2005/Atom"
xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
>
<channel>
<title><?php bloginfo_rss('name'); wp_title_rss(); ?></title>
<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
<link><?php bloginfo_rss('url') ?></link>
<description><?php bloginfo_rss("description") ?></description>
<lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
<language><?php bloginfo_rss( 'language' ); ?></language>
<sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
<sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>

<?php while( have_posts()) : the_post(); ?>
<?php $format = get_post_format( $post_id );

if ($format == "gallery"){

include("tw-templates/tw-standard.php");

} elseif ($format == "status"){

include("tw-templates/tw-status.php");

} elseif ($format == "quote"){

include("tw-templates/tw-quote.php");

} elseif ($format == "link"){

include("tw-templates/tw-link.php");

} elseif ($format == "image"){

include("tw-templates/tw-image.php");

} else {

include("tw-templates/tw-standard.php");

}






?>
<?php endwhile; ?>
</channel>
</rss>