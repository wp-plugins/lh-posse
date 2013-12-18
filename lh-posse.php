<?php
/*
Plugin Name: LH Posse
Plugin URI: http://localhero.biz/plugins/lh-posse/
Description: Adds several feeds to Wordpress customised based on post format for posting to facebook and twiiter via IFTTT
Author: shawfactor
Version: 0.02
Author URI: http://shawfactor.com/

== Changelog ==

= 0.01 =
* Mapped basic facebook compatible feed

= 0.02 =
* Mapped basic twitter feed and added basic xmlrpc server

License:
Released under the GPL license
http://www.gnu.org/copyleft/gpl.html

Copyright 2011  Peter Shaw  (email : pete@localhero.biz)


This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published bythe Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

include_once('includes/shortlinks.php');
include_once('includes/hashtags.php');
include_once('includes/truncenator.php');
include_once('includes/ogp.php');





function lh_posse_fb_output_xml() {


load_template(dirname(__FILE__) . '/feed-lh-posse-fb.php');

}

function lh_posse_tw_output_xml() {


load_template(dirname(__FILE__) . '/feed-lh-posse-tw.php');

}



if ($_GET[feed]){

remove_filter('template_redirect', 'redirect_canonical');

}


function lh_posse_add_feed() {

add_feed('lh-posse-fb', 'lh_posse_fb_output_xml');

add_feed('lh-posse-tw', 'lh_posse_tw_output_xml');


}

add_action('init', 'lh_posse_add_feed');

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

    $hidden_field_name = 'lh_posse_submit_hidden';
   
 // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
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

    echo "<h2>" . __( 'LH Posse Settings', 'menu-test' ) . "</h2>";

    // settings form
    
    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("og:image;", 'menu-test' ); ?> 
<input type="text" name="<?php echo $lh_posse_image_field_name; ?>" value="<?php echo $lh_posse_image_opt_val; ?>" size="50">
</p>

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>



</div>

<?php
}

add_action('admin_menu', 'lh_posse_plugin_menu');

Function lh_posse_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

function lh_posse_query_format_standard($query) {
    if (isset($query->query_vars['post_format']) &&
        $query->query_vars['post_format'] == 'post-format-standard') {
        if (($post_formats = get_theme_support('post-formats')) &&
            is_array($post_formats[0]) && count($post_formats[0])) {
            $terms = array();
            foreach ($post_formats[0] as $format) {
                $terms[] = 'post-format-'.$format;
            }
            $query->is_tax = null;
            unset($query->query_vars['post_format']);
            unset($query->query_vars['taxonomy']);
            unset($query->query_vars['term']);
            unset($query->query['post_format']);
            $query->set('tax_query', array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'post_format',
                    'terms' => $terms,
                    'field' => 'slug',
                    'operator' => 'NOT IN'
                )
            ));
        }
    }
}
add_action('pre_get_posts', 'lh_posse_query_format_standard');

function lh_posse_clean_excerpt($excerpt){

return preg_replace('#(<a[^>]*>).*?(</a>)#', '', $excerpt);

}

function lh_posse_print_hashtags(){

$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    echo ' #'.$tag->slug; 
  }
}


}

function lh_posse_return_hashtags(){

$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
$foo .= ' #'.$tag->slug; 
}
}
return $foo;

}

?>