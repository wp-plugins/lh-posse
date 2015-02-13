<item>
<title><?php the_title_rss() ?></title>
<link><?php echo lh_posse_get_link_url(); ?></link>
<dc:creator><?php the_author() ?></dc:creator>
<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
<guid isPermaLink="false"><?php the_permalink(); ?></guid>
<content:encoded><![CDATA[<?php   $result = preg_replace('#(<a[^>]*>).*?(</a>)#', '', get_the_excerpt());
echo $result; ?>
]]></content:encoded>
</item>