<?php


function lh_posse_add_rel_syndication($content){

global $post;

if (is_single() and !is_feed()){

$content .= "<div class=\"usyndication\">Also on:<br/>";

$lh_posse_tw_username_opt_val = get_option('lh_posse_tw_username');

$lh_posse_tw_username_opt_val = str_replace("@", "", $lh_posse_tw_username_opt_val);

$statusid = get_post_meta( $post->ID, "_lh_posse_tw_status_id", true ); 

if ($statusid){

$content .= "<a class=\"u-syndication\" rel=\"syndication\" href=\"http://twitter.com/".$lh_posse_tw_username_opt_val."/status/".$statusid."\" >Twitter</a>";

}

$content .= "</div>";

}

return $content;

}


add_filter('the_content', 'lh_posse_add_rel_syndication', 20 );


?>