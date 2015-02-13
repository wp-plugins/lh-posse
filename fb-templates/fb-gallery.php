<?php 

preg_match_all('/^\[gallery.*\]/',$post->post_content, $result); 

//print_r($result);


foreach( $result[0] as $match){


if ($match == "[gallery]"){

$images = get_children("post_type=attachment&post_mime_type=image&post_parent=".$post->ID );

//print_r($images);

foreach($images as $image) {

?>

<item>
<title><?php the_title_rss() ?></title>
<link><?php echo wp_get_attachment_url( $image->ID ); ?></link>
<dc:creator><?php the_author() ?></dc:creator>
<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true, $image), false); ?></pubDate>
<guid isPermaLink="false"><?php echo $image->guid; ?></guid>
<description><![CDATA[<?php echo $image->post_excerpt; ?>]]></description>
<content:encoded><![CDATA[

<img src="<?php echo wp_get_attachment_url( $image->ID ); ?>" />
<?php echo $image->post_excerpt; ?>

]]></content:encoded>


</item>

<?php




}




} else {

preg_match_all('/ids="(.*?)"/i',$match, $foo);


$query = "select * from ".$wpdb->prefix."posts a where a.post_mime_type = 'image/jpeg' and a.ID in (".$foo[1][0].") order by a.ID desc";

//echo $query;

$images = $wpdb->get_results($query);

//print_r($images);

foreach($images as $image) {

?>

<item>
<title><?php the_title_rss() ?></title>
<link><?php echo $image->guid; ?></link>
<dc:creator><?php the_author() ?></dc:creator>
<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true, $image), false); ?></pubDate>
<guid isPermaLink="false"><?php echo $image->guid; ?></guid>
<description><![CDATA[<?php echo $image->post_excerpt; ?>]]></description>
<content:encoded><![CDATA[

<img src="<?php echo $image->guid; ?>" />

]]></content:encoded>


</item>

<?php




}



}

}



?>