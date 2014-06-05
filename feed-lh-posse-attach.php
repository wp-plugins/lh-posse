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
<?php 

$args = array( 'post_parent' => $post->ID, 'post_type'   => 'attachment',  'posts_per_page' => -1, 'post_status' => 'inherit' );

$childs = get_children( $args, $output ); 

//print_r($childs);

foreach ( $childs as $child ) { 

?>


<item>
<title><?php echo $child->post_title ?></title>";
<guid isPermaLink="false"><?php echo $child->guid; ?></guid>
<link><?php echo wp_get_attachment_url($child->ID); ?></link>
<description><![CDATA[<?php echo $child->post_excerpt; ?>]]></description>
<content:encoded><![CDATA[<?php echo $child->post_content; ?>]]></content:encoded>
</item>



<?php

}


?>
<?php endwhile; ?>
</channel>
</rss>