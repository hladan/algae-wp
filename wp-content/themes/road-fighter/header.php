<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php wp_title('&#124;', true, 'right'); ?>
        </title> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <?php /* Hamed: we need bootstrap for our project. So I added the following line.*/ ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">   
        <?php /* End of Hamed's code. */ ?>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" /> 
        <?php wp_head(); ?>  
        
    </head>
    <body <?php body_class(); ?> style="background:url('<?php
    if (roadfighter_get_option('roadfighter_bodybg') != '') {
        echo roadfighter_get_option('roadfighter_bodybg');
    } else {
        
    }
    ?>');">
    <?php /* Hamed: we need bootstrap for our project. So I added the following line.*/ ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <?php /* End of Hamed's code. */ ?>
    <?php /* Hamed's code */ ?>
    <?php 
    /*
	 * We created a new header from scratch (see the original version of header.php at the end of current file). 
	 * We divided the header into two equal-sized areas. We set color for the background of these two areas. 
	 * An image is placed in the center of the header. We created the two areas because we wanted the header background
	 * to be independent from the image. It means the header background will always be colorful, even for large screens.  
	 */ 
	 ?>
     <div class="menu-wrapper">
            <div id="MainNav">
              <a class="mobile_nav closed"><?php _e('MENU','rdf'); ?><span></span></a> 
              <?php roadfighter_nav(); ?> 
                           
          </div>   
       
     </div> 
   
   
      <div id="my_header">
        <div id="header-left">
            <div class="logo-wrapper">
     	      <a href="http://algaeing.com">
      			 <div class="logo"></div>	
      		  </a>
       </div>	
        </div>
        <div id="header-right">
           
        </div>
    </div>            
<?php /* End of Hamed's code */ ?>
<?php /* Original version of header.php */
/*
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php wp_title('&#124;', true, 'right'); ?>
        </title> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" /> 
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> style="background:url('<?php
    if (roadfighter_get_option('roadfighter_bodybg') != '') {
        echo roadfighter_get_option('roadfighter_bodybg');
    } else {
        
    }
    ?>');">
        <div class="header_container <?php if (is_home()) { ?>home <?php
        } else {
            echo 'not_home';
        }
            ?>
             ">
            <div class="container_24">
                <div class="grid_24">
                    <header class="header <?php if (is_front_page()) { ?>home <?php
                    } else {
                        echo 'not_home';
                    }
                    ?>">
                        <div class="header_wrapper">
                            <div class="grid_10 alpha">
                                <div class="logo">
                                    <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php if (roadfighter_get_option('roadfighter_logo') != '') { ?><?php echo roadfighter_get_option('roadfighter_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?> logo"/></a>
                                </div>
                            </div>
                            <div class="grid_14 omega">            
                                <div class="call-us">
                                    <?php if (roadfighter_get_option('roadfighter_topright') != '') { ?>
                                        <p> <?php echo stripslashes(roadfighter_get_option('roadfighter_topright')); ?></p>
                                        <a class="btn" href="tel:<?php echo stripslashes(roadfighter_get_option('roadfighter_contact_number')); ?>">
                                        </a>
                                <?php } ?>
                                </div>
                            </div>        
                        </div>
                        <div class="clear"></div>
                        <div class="menu-wrapper">
                            <div id="MainNav">
                                <a href="#" class="mobile_nav closed"><?php _e('Pages Navigation Menu','rdf'); ?><span></span></a>
                            <?php roadfighter_nav(); ?> 
                            </div>   
                        </div>
                    </header>
                </div>
                <div class="clear"></div>
            </div>
        </div>
  */ 
 ?>    