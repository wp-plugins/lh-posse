<?php
/*
Plugin Name: LH Posse
Plugin URI: http://lhero.org/plugins/lh-posse/
Description: Adds several feeds to Wordpress customised based on post format for posting to facebook and twitter via IFTTT
Author: Peter Shaw
Version: 0.07
Author URI: http://shawfactor.com/

== Changelog ==

= 0.01 =
* Mapped basic facebook compatible feed

= 0.02 =
* Mapped basic twitter feed and added basic xmlrpc server

= 0.03 =
* Got xmlrpc server clone working

= 0.04 =
* Helper classes

= 0.05 =
* Twitter app etc

= 0.06 =
* Removed xmlrpc (to be moved to own plugin), added attachment feed

= 0.07 =
* Removed twitter api, now has its own plugin


License:
Released under the GPL license
http://www.gnu.org/copyleft/gpl.html

Copyright 2013  Peter Shaw  (email : pete@localhero.biz)


This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published bythe Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

include_once('includes/hashtags.php');
include_once('includes/truncenator.php');
include_once("includes/tw-helpers.php");
include_once("includes/rel-syndication.php");




function lh_posse_fb_output_xml() {


load_template(dirname(__FILE__) . '/feed-lh-posse-fb.php');

}

function lh_posse_tw_output_xml() {


load_template(dirname(__FILE__) . '/feed-lh-posse-tw.php');

}

function lh_posse_attach_output_xml() {


load_template(dirname(__FILE__) . '/feed-lh-posse-attach.php');

}




if ($_GET[feed]){

remove_filter('template_redirect', 'redirect_canonical');

}


function lh_posse_add_feed() {

add_feed('lh-posse-fb', 'lh_posse_fb_output_xml');

add_feed('lh-posse-tw', 'lh_posse_tw_output_xml');

add_feed('lh-posse-attach', 'lh_posse_attach_output_xml');


}

add_action('init', 'lh_posse_add_feed');


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