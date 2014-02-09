<?php

function lh_posse_plugin_menu() {
add_options_page('LH Posse Options', 'LH Posse', 'manage_options', 'lh-posse-identifier', 'lh_posse_plugin_options');
}

function lh_posse_plugin_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

    // variables for the field and option names 
    	$lh_posse_image_opt_name = 'lh_posse_ogp_image';
	$lh_posse_image_field_name = 'lh_posse_ogp_image';

    $lh_posse_ogp_hidden_field_name = 'lh_posse_ogp_submit_hidden';
   
 // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $lh_posse_ogp_hidden_field_name]) && $_POST[ $lh_posse_ogp_hidden_field_name ] == 'Y' ) {
        // Read their posted value
	$lh_posse_image_opt_val = $_POST[ $lh_posse_image_field_name ];


        // Save the posted value in the database
	update_option( $lh_posse_image_opt_name, $lh_posse_image_opt_val );

        // Put an settings updated message on the screen



?>
<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
<?php

    } else {

$lh_posse_image_opt_val = get_option('lh_posse_ogp_image');

}

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __('OGP Settings', 'menu-test' ) . "</h2>";

    // settings form
    
    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $lh_posse_ogp_hidden_field_name; ?>" value="Y">

<p><?php _e("og:image;", 'menu-test' ); ?> 
<input type="text" name="<?php echo $lh_posse_image_field_name; ?>" value="<?php echo $lh_posse_image_opt_val; ?>" size="50">
</p>

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>



</div>

<?php

   // variables for the field and option names 


	$lh_posse_tw_username_field_name = 'lh_posse_tw_username';
	$lh_posse_tw_username_opt_name = 'lh_posse_tw_username';
	$lh_posse_tw_oauth_access_token_field_name = 'lh_posse_tw_oauth_access_token';
	$lh_posse_tw_oauth_access_token_opt_name = 'lh_posse_tw_oauth_access_token';
	$lh_posse_tw_oauth_access_token_secret_field_name = 'lh_posse_tw_oauth_access_token_secret';
	$lh_posse_tw_oauth_access_token_secret_opt_name = 'lh_posse_tw_oauth_access_token_secret';
	$lh_posse_tw_consumer_key_field_name = 'lh_posse_tw_consumer_key';
	$lh_posse_tw_consumer_key_opt_name = 'lh_posse_tw_consumer_key';
	$lh_posse_tw_consumer_secret_field_name = 'lh_posse_tw_consumer_secret';
	$lh_posse_tw_consumer_secret_opt_name = 'lh_posse_tw_consumer_secret';
	$lh_posse_tw_auto_tweet_field_name = 'lh_posse_tw_auto_tweet';
	$lh_posse_tw_auto_tweet_opt_name = 'lh_posse_tw_auto_tweet';


    $lh_posse_tw_hidden_field_name = 'lh_posse_tw_submit_hidden';
   

 // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $lh_posse_tw_hidden_field_name ]) && $_POST[ $lh_posse_tw_hidden_field_name ] == 'Y' ) {
        // Read their posted value
	$lh_posse_tw_username_opt_val = $_POST[ $lh_posse_tw_username_field_name ];
	$lh_posse_tw_oauth_access_token_opt_val = $_POST[ $lh_posse_tw_oauth_access_token_field_name ];
	$lh_posse_tw_oauth_access_token_secret_opt_val = $_POST[ $lh_posse_tw_oauth_access_token_secret_field_name ];
	$lh_posse_tw_consumer_key_opt_val = $_POST[ $lh_posse_tw_consumer_key_field_name ];
	$lh_posse_tw_consumer_secret_opt_val = $_POST[ $lh_posse_tw_consumer_secret_field_name ];
	$lh_posse_tw_auto_tweet_opt_val = $_POST[ $lh_posse_tw_auto_tweet_field_name ];



        // Save the posted value in the database
 	update_option( $lh_posse_tw_username_opt_name,  $lh_posse_tw_username_opt_val );
	update_option( $lh_posse_tw_oauth_access_token_opt_name,  $lh_posse_tw_oauth_access_token_opt_val );
	update_option( $lh_posse_tw_oauth_access_token_secret_opt_name,  $lh_posse_tw_oauth_access_token_secret_opt_val );
	update_option( $lh_posse_tw_consumer_key_opt_name,  $lh_posse_tw_consumer_key_opt_val );
	update_option( $lh_posse_tw_consumer_secret_opt_name,  $lh_posse_tw_consumer_secret_opt_val );
	update_option( $lh_posse_tw_auto_tweet_opt_name,  $lh_posse_tw_auto_tweet_opt_val );


        // Put an settings updated message on the screen



?>
<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
<?php

    } else {

$lh_posse_tw_username_opt_val = get_option($lh_posse_tw_username_opt_name);
$lh_posse_tw_oauth_access_token_opt_val = get_option($lh_posse_tw_oauth_access_token_opt_name);
$lh_posse_tw_oauth_access_token_secret_opt_val = get_option($lh_posse_tw_oauth_access_token_secret_opt_name);
$lh_posse_tw_consumer_key_opt_val = get_option($lh_posse_tw_consumer_key_opt_name);
$lh_posse_tw_consumer_secret_opt_val = get_option($lh_posse_tw_consumer_secret_opt_name);
$lh_posse_tw_auto_tweet_opt_val = get_option($lh_posse_tw_auto_tweet_opt_name);



}

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Twitter Settings', 'menu-test' ) . "</h2>";

    // settings form
    
    ?>

<form name="form2" method="post" action="">
<input type="hidden" name="<?php echo $lh_posse_tw_hidden_field_name; ?>" value="Y">

<p><?php _e("Twitter Site Username:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $lh_posse_tw_username_field_name; ?>" value="<?php echo $lh_posse_tw_username_opt_val; ?>" size="20">
</p>

<p><?php _e("Twitter Oauth Access Token:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $lh_posse_tw_oauth_access_token_field_name; ?>" value="<?php echo $lh_posse_tw_oauth_access_token_opt_val; ?>" size="55">
</p>

<p><?php _e("Twitter Oauth Access Token Secret:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $lh_posse_tw_oauth_access_token_secret_field_name; ?>" value="<?php echo $lh_posse_tw_oauth_access_token_secret_opt_val; ?>" size="50">
</p>

<p><?php _e("Twitter Consumer Key:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $lh_posse_tw_consumer_key_field_name; ?>" value="<?php echo $lh_posse_tw_consumer_key_opt_val; ?>" size="45">
</p>

<p><?php _e("Twitter Consumer Key Secret:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $lh_posse_tw_consumer_secret_field_name; ?>" value="<?php echo $lh_posse_tw_consumer_secret_opt_val; ?>" size="45">
</p>

<p><?php _e("Auto tweet posts:", 'menu-test' ); ?> 

<?php if ($lh_posse_tw_auto_tweet_opt_val == "yes") { ?>
<input type="radio" name="<?php echo $lh_posse_tw_auto_tweet_field_name; ?>" value="no" />No <input type="radio" name="<?php echo $lh_posse_tw_auto_tweet_field_name; ?>" value="yes" checked="checked" />Yes
<?php } else { ?>
<input type="radio" name="<?php echo $lh_posse_tw_auto_tweet_field_name; ?>" value="no" checked="checked" />No <input type="radio" name="<?php echo $lh_posse_tw_auto_tweet_field_name; ?>" value="yes" />Yes
<?php } ?>
</p>


<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>



</div>

<?php

    echo "<h2>" . __( 'Run Twitter Send', 'menu-test' ) . "</h2>";


$lh_posse_tw_test_hidden_field_name = 'lh_posse_tw_test_submit_hidden';

if( isset($_POST[ $lh_posse_tw_test_hidden_field_name]) && $_POST[ $lh_posse_tw_test_hidden_field_name ] == 'Y' ) {

lh_posse_twitter_run();

} else {

$lh_posse_tw_auto_tweet_opt_val = get_option($lh_posse_tw_auto_tweet_opt_name);

if ($lh_posse_tw_auto_tweet_opt_val == "yes"){

?>


<form name="form3" method="post" action="">
<input type="hidden" name="<?php echo $lh_posse_tw_test_hidden_field_name; ?>" value="Y">

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Run Test') ?>" />
</p>

</form>


<?php

}

}



}

add_action('admin_menu', 'lh_posse_plugin_menu');







?>