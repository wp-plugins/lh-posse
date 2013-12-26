<?php

function lh_posse_escape_string($string){

$startTag = '"[%&'; 
$endTag = '&%]"';
$regex = preg_quote($startTag) . '(.*?)' . preg_quote($endTag) . 's';
preg_match($regex,$string,$results);

if ($results[0]){

$clean = str_replace('[%&', '' , $results[0]);

$clean = str_replace('&%]', '' , $clean);

$string = str_replace($results[0], substr(json_encode(preg_replace( "/\r|\n/", "", utf8_encode($clean))), 1, -1) , $string);

$string = lh_posse_escape_string($string);

}

return $string;

}

function lh_posse_simple_insert_post($content, $username, $password){

$test = json_decode(lh_posse_escape_string(stripslashes(utf8_encode($content[description]))));

$enter =  (array) $test;

if ($content[post_status]){

$enter[post_status] = $content[post_status];

}


if ($content[mt_keywords]){

$enter[tags_input] = implode(",", $content[mt_keywords]);

}

$post_id = wp_insert_post($enter);

return strval($post_id);

}





function lh_posse_simple_update_post($content, $username, $password){

$test = json_decode(lh_posse_escape_string(stripslashes(utf8_encode($content[description]))));

$enter =  (array) $test;

if ($content[post_status]){

$enter[post_status] = $content[post_status];

}


if ($content[mt_keywords]){

$enter[tags_input] = implode(",", $content[mt_keywords]);

}

$post_id = wp_update_post($enter);

return strval($post_id);

}



?>