<?php

include_once get_template_directory() . '/functions/inkthemes-functions.php';
$functions_path = get_template_directory() . '/functions/';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces 
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings 

/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */

function roadfighter_wp_enqueue_scripts() {

    if (!is_admin()) {
        wp_enqueue_script('roadfighter-ddsmoothmenu', get_template_directory_uri() . '/js/ddsmoothmenu.js', array('jquery'));
        wp_enqueue_script('roadfighter-cunfon-yui', get_template_directory_uri() . '/js/cufon-yui.js', array('jquery'));
        wp_enqueue_script('roadfighter-Elampa-font', get_template_directory_uri() . '/js/Elampa_400.font.js', array('jquery'));
        wp_enqueue_script('roadfighter-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    }
    /**
     * Enqueueing comment reply js
     */
    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
    /**
     * Enqueueing mobile menu js in footer
     */
    wp_enqueue_script('mobile-menu', get_template_directory_uri() . "/js/mobile-menu.js", array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'roadfighter_wp_enqueue_scripts');

//Front Page Rename
$get_status = roadfighter_get_option('re_nm');
$get_file_ac = get_template_directory() . '/front-page.php';
$get_file_dl = get_template_directory() . '/front-page-hold.php';
//True Part
if ($get_status === 'off' && file_exists($get_file_ac)) {
    rename("$get_file_ac", "$get_file_dl");
}
//False Part
if ($get_status === 'on' && file_exists($get_file_dl)) {
    rename("$get_file_dl", "$get_file_ac");
}

//
function roadfighter_get_option($name) {
    $options = get_option('roadfighter_options');
    if (isset($options[$name]))
        return $options[$name];
}

//
function roadfighter_update_option($name, $value) {
    $options = get_option('roadfighter_options');
    $options[$name] = $value;
    return update_option('roadfighter_options', $options);
}

//
function roadfighter_delete_option($name) {
    $options = get_option('roadfighter_options');
    unset($options[$name]);
    return update_option('roadfighter_options', $options);
}

require_once(get_template_directory() . '/functions/plugin-activation.php');
require_once(get_template_directory() . '/functions/inkthemes-plugin-notify.php');
add_action('tgmpa_register', 'inkthemes_plugins_notify');

/* Hamed: do you have this problem: the <span> tag disappears from the TinyMCE editor whenever
  you switch between the tabs "Text" and "Visual"? The following function solves the problem.*/
function override_mce_options($initArray) {
$opts = '*[*]';
$initArray['valid_elements'] = $opts;
$initArray['extended_valid_elements'] = $opts;
return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');

?>