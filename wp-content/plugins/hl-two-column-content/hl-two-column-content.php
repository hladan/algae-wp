<?php
/*
Plugin Name: hl-two-column-content
Description: This plugin adds a button to the post editor. By clicking the button you are asked for giving inputs in the form of texts. The inputs are displayed in two columns on Web browser. We made this plugin to display the contact information of the companies that distribute our products. The information includes the address, phone and fax numbers and the website of the companies.       
Version: 1.0
Author: Hamed Ladan
*/
add_action('init', 'add_button_twocolumn');

function add_button_twocolumn() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
   {
     add_filter('mce_external_plugins', 'add_plugin_twocolumn');
     add_filter('mce_buttons', 'register_button_twocolumn');
   }
}

function register_button_twocolumn($buttons) {
   array_push($buttons, "mytwocolumn");
   return $buttons;
}

function add_plugin_twocolumn($plugin_array) {
   $plugin_array['mytwocolumn'] = $dir = plugins_url( 'hl-two-column-content.js', __FILE__ );
   return $plugin_array;
}

function twoColumn( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"country_left" => 'COUNTRY', // Default value of the attribute "country_left" is "COUNTRY".
	    "company_left" => 'NAME',
		"address_str_left" => 'STR', // street 
		"address_no_left" => 'NUMBER', // house number 
		"address_zipcode_left" => 'ZIPCODE',  
	    "city_left" => 'CITY',  
		"phone_left" =>'',
		"fax_left" => '',
		"website_left" => '',
		"country_right" => '',
	    "company_right" => '',
		"address_str_right" => '', 
		"address_no_right" => '',  
		"address_zipcode_right" => '',  
	    "city_right" => '',  
		"phone_right" =>'',
		"fax_right" => '',
		"website_right" => ''
		
	), $atts));

/* Values are assigned to the variables above by admin. We get help from 
   JavaScript (the file "hl-two-column-content.js") to facilitate these assignments. */	
  if (strlen((trim($company_right))) == 0) {
    // The if-condition is true when we want to add the information of only a single company.  
  	$returnHTML = 
  	    '<div class="half-column-left"><article><header>'.'<h1>'.$country_left.'</h1>'.'</header>'.
	    '<section>'.'<p>'.$company_left.'</p>'.'<p>'.$address_str_left.' '.$address_no_left.'<br>'.
	    $address_zipcode_left.' '.$city_left.'</p>'.'</section>'.
	'<section>'.'Phone: '.$phone_left.'<br>'.'Fax: '.$fax_left.'</section>'.'<section>'.
	'Website: '.'<a href = "'.$website_left.'" target="_blank">'.$website_left.'</a>'.'</section></article></div>';
  } else {
    $returnHTML = 	
    '<div class="half-column-left"><article><header>'.'<h1>'.$country_left.'</h1>'.'</header>'.
	    '<section>'.'<p>'.$company_left.'</p>'.'<p>'.$address_str_left.' '.$address_no_left.'<br>'.
	    $address_zipcode_left.' '.$city_left.'</p>'.'</section>'.
	'<section>'.'Phone: '.$phone_left.'<br>'.'Fax: '.$fax_left.'</section>'.'<section>'.
	'Website: '.'<a href = "'.$website_left.'" target="_blank">'.$website_left.'</a>'.'</section></article></div>'.
	
    '<div class="half-column-right"><article><header>'.'<h1>'.$country_right.'</h1>'.'</header>'.
	    '<section>'.'<p>'.$company_right.'</p>'.'<p>'.$address_str_right.' '.$address_no_right.'<br>'.
	    $address_zipcode_right.' '.$city_right.'</p>'.'</section>'.
	'<section>'.'Phone: '.$phone_right.'<br>'.'Fax: '.$fax_right.'</section>'.'<section>'.
	'Website: '.'<a href = "'.$website_right.'" target="_blank">'.$website_right.'</a>'.'</section></article></div>';
  }
  return $returnHTML;      
}
add_shortcode('twocolumn','twoColumn');
?>