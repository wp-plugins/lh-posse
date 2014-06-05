<?php



function lh_posse_add_twitter_meta() {

global $post;

$lh_posse_image_opt_val = get_option('lh_posse_ogp_image');

echo "\n<!-- begin LH Posse Twitter output -->\n";

if (get_option('lh_posse_tw_username')){

echo "<meta name=\"twitter:site\" content=\"".get_option('lh_posse_tw_username')."\">\n";


}

if (is_singular()){

$format = get_post_format();
if ( false === $format ) {

echo "<meta name=\"twitter:card\" content=\"summary\">\n";

} elseif ( $format == "gallery" ) {

echo "<meta name=\"twitter:card\" content=\"gallery\">\n";

} elseif ( $format == "image" ) {

echo "<meta name=\"twitter:card\" content=\"image\">\n";

}




} else {


echo "<meta name=\"twitter:card\" content=\"summary\">\n";

}


echo "<!-- end LH Posse Twitter output -->\n\n";

}


add_action('wp_head', 'lh_posse_add_twitter_meta');


















?>