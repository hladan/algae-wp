
<?php
/*
Plugin Name: hl-dropdown-toggle
Description: This plugin adds a button to the post editor. By clicking the button you can assign a name to a toggle button and also a text to the content that is displayed when the toggle button is clicked on your webpage.      
Version: 1.0
Author: Hamed Ladan
*/
add_action('init', 'add_button');

function add_button() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
   {
     add_filter('mce_external_plugins', 'add_plugin');
     add_filter('mce_buttons', 'register_button');
   }
}

function register_button($buttons) {
   array_push($buttons, "mytoggle");
   return $buttons;
}

function add_plugin($plugin_array) {
   $plugin_array['mytoggle'] = $dir = plugins_url( 'hl-dropdown-toggle.js', __FILE__ );
   return $plugin_array;
}

function toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"name" => 'NAME' // Default value of the attribute "name" is "NAME". 
	), $atts));
/* The icon that is displayed on the drop-down toggle on the browser is called "glyphicon-collapse-down". */
/* Values are assigned to the variables "name" and "content" by admin. We get help from 
   JavaScript (the file "hl-dropdown-toggle.js") to facilitate these assignments. */	
    return '<button id="button" type="button" class="btn btn-primary txt-align-left" 
         data-toggle="collapse" data-target="#demo">
          <span class="glyphicon glyphicon-collapse-down"></span>'.' '.'<strong>'.$name.'</strong>'.'
</button>'.'<div id="demo" class="collapse">'.$content.'</div>';
}
add_shortcode('toggle','toggle');
?>