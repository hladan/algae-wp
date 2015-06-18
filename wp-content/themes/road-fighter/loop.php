<?php /* Start the Loop. */ ?>

<?php /* Code #1: the code below displays the subcategories of current category. If the current category has a parent, 
	        the subcategories of the parent are displayed. */ ?>
<?php
   if (is_category()) {
     $this_category = get_category($cat);
	   /* Debug: 
	      $this_category
	       -> name: Cat1 */
   }
?>
<?php
   if($this_category->category_parent)
     $this_category = wp_list_categories('orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->category_parent."&echo=0"); else
     $this_category = wp_list_categories('orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
     /* Debug:
	    $this_category:
	      <li class="cat-item cat-item-3"><a href="http://localhost/myprojects/aptana/algae-wp-test/?cat=3" >Cat1_1</a>
          </li>
	      <li class="cat-item cat-item-7"><a href="http://localhost/myprojects/aptana/algae-wp-test/?cat=7" >Cat1_2</a>
          </li>         
	 */
   if ($this_category) { ?>
     <div class = "panel-nav">
     <ul>
      <?php echo $this_category; ?>
     </ul>
     </div>
   <?php } ?> 
<?php /* End of Code #1 */ ?>
<div class ="panel-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
       <?php /* Start post */ ?>
        
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php /*
            <div class="post_heading_wrapper"> 
                 Hamed's code
                 The following title is for post excerpts (that end with "Continue Reading...").                
                 We don't need any title. 
                
                <div class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" 
                title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </div>
                
                 We don't need any post date.
                <div class="post_date">
                    <ul class="date">
                        <li class="day"><?php echo get_the_time('d') ?></li>
                        <li class="month"><?php echo get_the_time('M') ?></li>
                    </ul>
                </div>                
                End of Hamed's code            
            </div>*/ ?>
            <div class="post_content">
                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <?php
                } else {
                    echo roadfighter_main_image();
                }
                ?>			  
                <?php the_excerpt(); ?>
             </div>   
            <?php /* Hamed: we don't need the phrase "Continue Reading..." for the posts' excerpts.     
                <a class="read_more" href="<?php the_permalink() ?>"><?php _e('Continue Reading...','rdf'); ?></a>   
                Hamed: we don't need the author, the category, the tags and the number of comments of the posts.
                <ul class="post_meta">
                <li class="posted_by"><?php the_author_posts_link(); ?></li>
                <li class="post_category"><?php the_category(', '); ?></li>
                <?php if (has_tag()) { ?>
                    <li class="post_tag"><?php the_tags(__('Tagged with : ', ', ', '')); ?></li>
                <?php } ?>
                <li class="post_comment"><?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></li>
            </ul>
            */?>
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
 </div>
<div class="clear"></div>
<?php /* <!--End post */ ?>