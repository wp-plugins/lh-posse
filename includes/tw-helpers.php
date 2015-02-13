<?php

function lh_posse_tw_output_status_standard(){
global $post;

$return = lh_posse_truncate_string(lh_posse_clean_excerpt(get_the_title()." ".get_the_excerpt()).lh_posse_return_hashtags() ,"100")." ".wp_get_shortlink();

return $return;

}

function lh_posse_tw_output_status_link(){
global $post;

$return = lh_posse_truncate_string(lh_posse_clean_excerpt(get_the_excerpt()).lh_posse_return_hashtags() ,"120").lh_posse_get_link_url();

return $return;

}


function lh_posse_tw_output_status_status(){
global $post;

$return = lh_posse_truncate_string(lh_posse_clean_excerpt(get_the_excerpt()).lh_posse_return_hashtags() ,"140");

return $return;

}


function lh_posse_tw_output_status_gallery(){
global $post;

$return = lh_posse_tw_output_status_standard();

return $return;

}

function lh_posse_tw_output_status_aside(){
global $post;

$return = lh_posse_tw_output_status_status();

return $return;

}

function lh_posse_tw_output_status_quote(){
global $post;

// this requires it own separate handling, for now use standard handler

$return = lh_posse_tw_output_status_standard();

return $return;

}

function lh_posse_tw_output_status_video(){
global $post;

// this requires it own separate handling, for now use standard handler

$return = lh_posse_tw_output_status_standard();

return $return;

}


function lh_posse_tw_output_status_audio(){
global $post;

// this requires it own separate handling, for now use standard handler

$return = lh_posse_tw_output_status_standard();

return $return;

}

function lh_posse_tw_output_status_image(){
global $post;

// this requires it own separate handling, for now use standard handler

$return = lh_posse_tw_output_status_standard();

return $return;

}


function lh_posse_tw_output_status_chat(){
global $post;

// this requires it own separate handling, for now use standard handler

$return = lh_posse_tw_output_status_standard();

return $return;

}




?>