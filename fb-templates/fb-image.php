<?php

$id = get_post_thumbnail_id($post->ID);

$image = get_post($id);

?>
<item>
<title><?php the_title_rss() ?></title>
<link><?php echo $image->guid; ?></link>
<dc:creator><?php the_author() ?></dc:creator>
<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true, $image), false); ?></pubDate>
<guid isPermaLink="false"><?php the_guid(); ?></guid>
<content:encoded><![CDATA[
<?php if ($post->post_excerpt){ echo $post->post_excerpt;  } else {  the_excerpt(); } ?>
]]></content:encoded>
</item>