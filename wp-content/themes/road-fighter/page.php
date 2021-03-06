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
                    <div class="content-bar">   
                        <h1><?php 
                          /* Hamed: we don't need the title of pages. */
                          /* the_title(); */
                        ?></h1>
                        <?php if (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                            <div class="clear"></div>
                            <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'rdf') . '</span>', 'after' => '</div>')); ?>
                        <?php endif; ?>
                    </div>
                    <?php 
                      /* Hamed: we don't need users to comment on our pages. */				 
					  /* comments_template(); */                     
                    ?>                                              
                    <?php 
                      /* <div class="grid_7 omega"> */
                      /* Hamed: we don't need the sidebar that contains the search bar, categories and archives on our pages. */ 
                      /* get_sidebar(); */
                      /* </div> */
                    ?>               
        </div>
    </div>
	    <div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>