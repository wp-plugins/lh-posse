<item>
<title><?php the_title_rss() ?></title>
<link><?php the_permalink() ?></link>
<dc:creator><?php the_author() ?></dc:creator>
<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
<guid isPermaLink="false"><?php the_guid(); ?></guid>
<content:encoded><![CDATA[<?php echo lh_posse_truncate($post->post_content, "200");
?>
]]></content:encoded>
</item>