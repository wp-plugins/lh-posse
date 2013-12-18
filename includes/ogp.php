<?php

if ( function_exists( 'add_image_size' ) ) { 

add_image_size( 'lh-posse-ogp-thumbnail', 1500, 1500 ); 

}

add_filter( 'jetpack_enable_opengraph', '__return_false', 99 );

function lh_posse_truncate($string,$min) {
    $text = trim(strip_tags($string));
    if(strlen($text)>$min) {
        $blank = strpos($text,' ');
        if($blank) {
            # limit plus last word
            $extra = strpos(substr($text,$min),' ');
            $max = $min+$extra;
            $r = substr($text,0,$max);
            if(strlen($text)>=$max) $r=trim($r,'.').'...';
        } else {
            # if there are no spaces
            $r = substr($text,0,$min).'...';
        }
    } else {
        # if original length is lower than limit
        $r = $text;
    }

$r = trim(preg_replace('/\s\s+/', ' ', $r));
    return $r;
}




function lh_posse_get_the_post_thumbnail_src($img){
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}



function lh_posse_add_ogp_meta() {

global $post;

$lh_posse_image_opt_val = get_option('lh_posse_ogp_image');

echo "\n<!-- begin LH Posse OGP output -->\n";
echo "<meta name=\"application-name\" content=\"".get_bloginfo( 'name' )."\" />\n";
echo "<meta name=\"msapplication-tooltip\" content=\"".get_bloginfo( 'description', 'display' )."\" />\n";




if (is_singular()){

?>
<meta property="og:url" content="<?php the_permalink() ?>"/>   
<meta property="og:title" content="<?php single_post_title(''); ?>" />   
<meta property="og:description" content="<?php if ($post->post_excerpt){ echo $post->post_excerpt;  } else {  echo lh_posse_truncate($post->post_content, "120"); } ?>" />   
<meta property="og:type" content="article" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>"/>
<?php if (wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID))){

$photon_removed = remove_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ) );

?>
<meta property="og:image" content="<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'lh-posse-ogp-thumbnail'); echo $image[0]; ?>"/>
<?php if ( $photon_removed )
add_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ), 10, 3 );



} else {

echo "<meta property=\"og:image\" content=\"".$lh_posse_image_opt_val."\"/>\n";

}



} else {




echo "<meta property=\"og:title\" content=\"";
bloginfo('name');
echo "\"/>\n";

echo "<meta property=\"og:type\" content=\"website\"/>\n";
echo "<meta property=\"og:url\" content=\"";
bloginfo('url');
echo "\"/>\n";

echo "<meta property=\"og:image\" content=\"".$lh_posse_image_opt_val."\"/>\n";
echo "<meta property=\"og:site_name\" content=\"";
bloginfo('name');
echo "\"/>\n";

echo "<meta property=\"og:description\" content=\"";
bloginfo('description');
echo "\"/>\n";

}


echo "<!-- end LH Posse OGP output -->\n\n";

}


add_action('wp_head', 'lh_posse_add_ogp_meta');


function lh_posse_schema($attr) {

$attr .= "\n xmlns:og=\"http://ogp.me/ns#\"";
return $attr;

}

add_filter('language_attributes', 'lh_posse_schema');



?>