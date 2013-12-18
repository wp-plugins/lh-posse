<item>
<title><?php the_title_rss() ?></title>
<link><?php the_permalink() ?></link>
<dc:creator><?php the_author() ?></dc:creator>
<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
<guid isPermaLink="false"><?php the_guid(); ?></guid>
<content:encoded><![CDATA[<?php 

$quote_content = str_replace("<q>", "\"", get_the_content());

$quote_content = str_replace("</q>", "\"", $quote_content);

$quote_content = str_replace("<cite>", "\n<br/>-", $quote_content);

$quote_content = str_replace("</cite>", "", $quote_content);

echo $quote_content;

?>
]]></content:encoded>
</item>