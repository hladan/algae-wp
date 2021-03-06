<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php
/* Hamed: 
 single.php:
This file is accountable for representing the post that user selects on the posts page. 
By clicking a thumbnail or the phrase "Continue reading …", this file is executed. 
We removed the sidebar from loaded page by removing the following code from single.php:
                   <div class="grid_7 omega">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                  </div>  
 */ 
?>
<?php get_header(); ?>
<div class="page_heading_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page_heading_content">
                <?php roadfighter_breadcrumbs(); ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="page-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page-content">                   
                <?php /*  <div class="grid_17 alpha"> */ ?>
                    <div class="content-bar">  
                      <div class="panel-left"></div> 
                         <div class="panel-right"></div>
                       <div class="panel-content-post">  
                        <?php /* Start the Loop. */ ?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php /* Start post */ ?>
                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="post_heading_wrapper">
                                        <?php /* Hamed: the following title is for posts. 
										  [compare to the title at loop.php] */?>
                                        <div class="post_title"><?php the_title(); ?></div>
                                        <?php /* Hamed: we don't need the post date. */?>
                                        <?php /*
                                        <div class="post_date">
                                            <ul class="date">
                                                <li class="day"><?php echo get_the_time('d') ?></li>
                                                <li class="month"><?php echo get_the_time('M') ?></li>
                                            </ul>
                                        </div>
										 */?> 
                                    </div>
                                    <?php /* We don't need to display the thumbnail on a post. 
									 IMPORTANT: for each product we should provide two images: small size and large size images.
									 The small image is used as thumbnail. You should insert the image through admin by clicking
									 the link "Set featured image" next to the post editor. You should insert the big image manually 
									 by inserting it to the post editor through the button "Add Media", how?: 
									 when you click on a picture to insert, a drop down list on the right asks which size you want to insert.
									 You can pick Medium, Large and Full size. 
									 */ ?>
                                    <?php /* <div class="post_thumbnail"><?php the_post_thumbnail(); ?></div> */ ?>                               
                                   
                                    <div class="post_content">
                                        <?php the_content(); ?></div>
                                    <?php /* Hamed: Hamed: we don't need the author, the category, the tags and the number of comments of the posts.*/?>
                                    <?php /*
                                    <ul class="post_meta">
                                        <li class="posted_by"><?php the_author_posts_link(); ?></li>
                                        <li class="post_category"><?php the_category(', '); ?></li>
                                        <?php if (has_tag()) { ?>
                                            <li class="post_tag"><?php the_tags(__('Tagged with : ', ', ', '')); ?></li>
                                        <?php } ?>
                                        <li class="post_comment"><?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></li>
                                    </ul>*/?>
                                    <div class="clear"></div>
                                </div>
                            <?php endwhile;
                        else:
                            ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <p>
                            <?php _e('Sorry, no posts matched your criteria.', 'rdf'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <div class="clear"></div>
                        <?php wp_link_pages(array('before' => '<div class="clear"></div><div class="page-link"><span>' . __('Pages:', 'rdf') . '</span>', 'after' => '</div>')); ?>
                        <?php /* Start Comment box */ ?>
                        <?php /* Hamed: we don't need the comment box.*/?>
                        <?php /*comments_template();*/ ?>
                        <?php /* End Comment box */ ?>
                        <div class="clear"></div>
                        <?php /* Hamed: we don't need the previous and next posts. */?> 
                        <?php /*
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous Post ', 'rdf')); ?>
                            </span> <span class="nav-next">
                        <?php next_post_link('%link', __('Next Post <span class="meta-nav">&rarr;</span>', 'rdf')); ?>
                            </span> </nav> */?>
                        <?php /* End post */ ?>
                    </div>
               <?php /*  </div> */ ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>