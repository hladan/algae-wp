<?php
/**
 * The template for displaying front page pages.
 *
 */
?>
<?php get_header(); ?>  
<div class="slider-container">
    <div class="slider-wrapper">
        <!--Start Slider Wrapper-->
       <!-- <div class="flexslider"> -->
            <div class="slides">
               <!-- <li> -->
                    <?php if (roadfighter_get_option('roadfighter_slideimage1') != '') { ?>
                        <?php 
			             /* Hamed:
						  * We don't need the slider image to link us to a page.						  
                        <a href="<?php if (roadfighter_get_option('roadfighter_Sliderlink1') != '') {
                        echo esc_url(roadfighter_get_option('roadfighter_Sliderlink1'));
                    } ?>" >
						 */
						 ?> 
                            <img  src="<?php echo roadfighter_get_option('roadfighter_slideimage1'); ?>" alt="Slide Image 1" width="100%" height="100%"/>
                    <?php } else { ?>
                        <img  src="<?php echo get_template_directory_uri(); ?>/images/slider1.jpg" alt="Slide Image 1"/>
                            <?php } ?>
                           
                    <?php /*        
                    <div class="flex-caption-wrapper">
                        <div class="flex-caption">
                            <?php if (roadfighter_get_option('roadfighter_sliderheading1') != '') { ?>
                                <h1><a href="<?php if (roadfighter_get_option('roadfighter_Sliderlink1') != '') {
                                echo esc_url(roadfighter_get_option('roadfighter_Sliderlink1'));
                            } ?>"><?php echo stripslashes(roadfighter_get_option('roadfighter_sliderheading1')); ?></a></h1>
                                <?php } else { ?>
                                <h1><a href="#">Premium WordPress Themes with Single Click Installation</a></h1>
                            <?php } ?>
                            <?php if (roadfighter_get_option('roadfighter_sliderdes1') != '') { ?>
                                <p>					   
                                <?php echo stripslashes(roadfighter_get_option('roadfighter_sliderdes1')); ?>
                                </p>
                            <?php } else { ?>
                                <p><?php _e('Premium WordPress Themes with Single Click Installation, Just a Click and your website is ready for use.Premium WordPress Themes.','rdf'); ?> </p>
                            <?php } ?>
                            <?php if (roadfighter_get_option('roadfighter_slider_button1') != '') { ?>
                                <a class="slider-readmore" href="<?php if (roadfighter_get_option('roadfighter_Sliderlink1') != '') {
                                echo roadfighter_get_option('roadfighter_Sliderlink1');
                            } ?>"><span><?php echo stripslashes(roadfighter_get_option('roadfighter_slider_button1')); ?></span></a>
                            <?php } else { ?>
                                <a class="slider-readmore" href="<?php if (roadfighter_get_option('roadfighter_Sliderlink1') != '') {
                                echo roadfighter_get_option('roadfighter_Sliderlink1');
                            } ?>"><span><?php _e('Read More','rdf'); ?></span></a>
                        <?php } ?>
                        </div>
                    </div>
                    */
                    ?>
               <!-- </li> -->
            </div>
       <!-- </div> -->
    </div>
</div>
</div>
</div>
<div class="clear"></div>
<div class="home_container">
   

            <div class="home-content">

                <?php /* Hamed: we don't need a page info now. 
				 
                <div class="page_info">
                    <?php if (roadfighter_get_option('roadfighter_page_main_heading') != '') { ?>
                        <h1><?php echo stripslashes(roadfighter_get_option('roadfighter_page_main_heading')); ?></h1>
                        <?php } else { ?>
                        <h1><?php _e('We make different products using microalgae.','rdf'); ?></h1>
                        <?php } ?>
                        <?php /*
                        <?php if (roadfighter_get_option('roadfighter_page_sub_heading') != '') { ?>
                        <h3><?php echo stripslashes(roadfighter_get_option('roadfighter_page_sub_heading')); ?></h3>
                                <?php } else { ?>
                        <h3><?php _e('Just a Click and your website is ready for use. Your Site is faster to built, easy to use & Search Engine Optimized.','rdf'); ?></h3>
                                <?php } ?>
						 */
					/*	 ?> */
                /* </div> */
                
                ?>                          
  
                <?php /* We don't need a feature on our homepage. Instead, we create a table that contains 
				  the categories (with thumbnails) of our products. To see how the code of features looks, see the original 
				  version of Road Fighter theme. */?>
      
                <?php /* Category images on the homepage
                <div class="category-left">
                    <a href="http://localhost/myprojects/aptana/algae-wp-test/?cat=18">
       	            <img src="<?php bloginfo('template_directory');?>/images/cosmeceutical.jpg"/ width="100%"></a>
                </div>
                <div class="category-right">
                    <a href="http://localhost/myprojects/aptana/algae-wp-test/?cat=19">
       	            <img src="<?php bloginfo('template_directory'); ?>/images/nutraceutical.jpg"/ width="100%"></a>
                </div>
                */
                ?> 
                <?php
                /* Hamed: 
				 * Road-Fighter theme: we don't need the bottom tagline button that is represented with the text "View Portfolio".				  
                <div class="bottom_tagline">
                    <div class=" grid_18 ipad-tagline alpha">
                        <div class="bottom_tagline_text">
                            <?php if (roadfighter_get_option('roadfighter_tag_head') != '') { ?>
                                <h1><?php echo stripslashes(roadfighter_get_option('roadfighter_tag_head')); ?></h1>
                                <?php } else { ?>
                                <h1><?php _e('Any Important notice with a call to action button can come here.','rdf'); ?></h1>
                                <?php } ?>
                        </div>
                    </div>
                    <div class=" grid_6 ipad-tagline omega">
                        <div class="bottom_tagline_button">
                            <?php if (roadfighter_get_option('roadfighter_homepage_button') != '') { ?>
                                <a href="<?php echo esc_url(roadfighter_get_option('roadfighter_homepage_button_link')); ?>"><?php echo stripslashes(roadfighter_get_option('roadfighter_homepage_button')); ?></a>
                                <?php } else { ?>
                                <a href="<?php echo esc_url(roadfighter_get_option('roadfighter_homepage_button_link')); ?>"><?php _e('View Portfolio','rdf'); ?></a>
                            <?php } ?>  
                        </div>
                    </div>
                </div>
				 */
				 ?>
            </div>
            
       
        <div class="clear"></div>
   
</div>
<?php get_footer(); ?>