<?php
/**
 * The template used to display Tag Archive pages
 *
 * 
 */
?>
<?php
/* Hamed:
category.php: 
this is a file from which the file "loop.php" is called. The file "category.php" is accountable for representing a list
of all posts. This file represents the page where the excerpts and thumbnails of all posts are listed. 
We removed the sidebar from this page by removing this code from "category.php":
                  <div class="grid_7 omega">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                  </div> 
We also changed a little the layout of this page by removing this code from "category.php":
                  <div class="grid_17 alpha">  
                  </div>
*/
?>
<?php get_header(); ?>
<div class="page_heading_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page_heading_content">
                <p><?php printf(__('Category Archives: %s', 'rdf'), '' . single_cat_title('', false) . ''); ?>
                </p>
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
                        <?php if (have_posts()) : ?>
                            <?php
                            $category_description = category_description();
                            if (!empty($category_description))
                                echo '' . $category_description . '';
                            /* Run the loop for the category page to output the posts.
                             * If you want to overload this in a child theme then include a file
                             * called loop-category.php and that will be used instead.
                             */
                            ?>
                            <?php get_template_part('loop', 'category'); ?>
                        <?php else: // Hamed: I added "else" to this "if" statement.
						 ?>
						  <div class="warning">Please add a post to this category. 
						  	Each category should have at least one post.</div>
                        <?php endif; ?>
                        <div class="clear"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php next_posts_link(__('&larr; Older posts', 'rdf')); ?>
                            </span> <span class="nav-next">
                                <?php previous_posts_link(__('Newer posts &rarr;', 'rdf')); ?>
                            </span> </nav>	

                          </div>
                 
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>