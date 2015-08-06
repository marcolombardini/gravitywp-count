<?php
/*
Plugin Name: GravityWP - Count 
Plugin URI: http://gravitywp.com/total-count-number-field-multiple-entries-gravity-forms/
Description: Adds a shortcode option to count a number field in multiple entries. 
Author: Erik van Beek
Version: 0.2
Author URI: http://www.aiwos.com
License: GPL2
*/
function gravitywp_count_func ( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'formid' => 'formid',
      'field' => 'field'
      ), $atts ) );
	  
	$search_criteria = null;
	$sorting = null;
	$paging = array( 'offset' => 0, 'page_size' => 200 );
	$entries = GFAPI::get_entries($formid, $search_criteria, $sorting, $paging);
	$countentries = GFAPI::count_entries( $formid );
	$gwp_count = 0;
	for ($row = 0; $row < $countentries ; $row++) {
	    $gwp_count += $entries[$row][$field];
}	
	return $gwp_count;
 }
 
 add_shortcode( 'gravitywp_count', 'gravitywp_count_func' );
 
 ?>
