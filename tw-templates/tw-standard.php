<item>
<title><?php the_title_rss() ?></title>
<link><?php the_permalink() ?></link>
<dc:creator><?php the_author() ?></dc:creator>
<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
<guid isPermaLink="false"><?php the_permalink(); ?></guid>
<content:encoded><![CDATA[<?php  echo lh_posse_truncate(lh_posse_clean_excerpt(get_the_excerpt()).lh_posse_return_hashtags() ,"120"); echo " ".lh_posse_shortlink(); ?>]]></content:encoded>
</item>