<?php

if ( !isset( $HTTP_RAW_POST_DATA ) ){ $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' ); }

//mail("shawfactor@gmail.com", "post data", $HTTP_RAW_POST_DATA);



include_once("../../../wp-includes/class-IXR.php"); /* not included in wp-settings */

function lh_tools_weblogUpdates_ping($args) {
mail("shawp4@anz.com", "post data", $args[0]);

$return['flerror'] = false;

$return['message'] = "Thanks for pinging";

return $return;

}

function addTwoNumbers($args) {
    $number1 = $args[0];
    $number2 = $args[1];
    return $number1 + $number2;
}
$server = new IXR_Server(array(
    'weblogUpdates.ping' => 'lh_tools_weblogUpdates_ping',
    'demo.addTwoNumbers' => 'addTwoNumbers'
));



//if ( !isset( $HTTP_RAW_POST_DATA ) ){ $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' ); }

//mail("shawp4@anz.com", "post data", $HTTP_RAW_POST_DATA);



?>