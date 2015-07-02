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
<?php
/* This function is called when the user has not selected a thumbnail for the post. An image from the 
post is chosen randomly. */
function roadfighter_main_image_new() {
    global $post, $posts;
    //This is required to set to Null
    $id = '';
    // $the_title = '';
    // Till Here
    $permalink = get_permalink($id);
    $homeLink = get_template_directory_uri();
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $first_img = $matches [1] [0];
    }
    if (empty($first_img)) { //Defines a default image  
    } else {
      //  print "<a href='$permalink'><img src='$first_img' width='250px' height='160px' class='postimg wp-post-image' alt='$the_title' /></a>";
     $imageAndLink = "<a href='$permalink'><img src='$first_img' width='250px' height='160px' class='postimg wp-post-image' /></a>"; 
     return $imageAndLink;    
    }
}
?>
<?php 
/* This recursive function gets an array of table columns as input and with these columns makes 
an array of table rows as output. Each row has maximum three columns. */
function makeTR(&$stackTD, &$stackTR) {
	if (count($stackTD) == 0) {
		$returnedTR = "";	
		array_push($stackTR, $returnedTR);
	} 
	else if (count($stackTD) == 1) {
		$td = array_pop($stackTD);
		$returnedTR = "<tr>".$td."</tr>";
		array_push($stackTR, $returnedTR);
	}
	else if (count($stackTD) == 2) {
		$td = array_pop($stackTD);
		$returnedTR = "<tr>".$td;
		$td = array_pop($stackTD);
		$returnedTR = $returnedTR.$td."</tr>";			
		array_push($stackTR, $returnedTR);
	}
	else { // Number of tds >=3
	    $td = array_pop($stackTD);
		$returnedTR = "<tr>".$td;
	    for ($i=0; $i < 2; $i++) { 
			$td = array_pop($stackTD);
			$returnedTR = $returnedTR.$td;
		}
		$returnedTR = $returnedTR."</tr>";
		array_push($stackTR, $returnedTR);
		makeTR($stackTD, $stackTR);
	}
	
}
?>
<?php /*
The products (=the posts of the category Products) are located in a table. The rows (and the columns) 
of the table are defined in the form of PHP strings and locate in an array. 
This array of strings is converted to a single string and this string is echoed inside html tags as shown below:
<table>
  	<tbody> 
      <?php 
        $table = implode(" ", $stackTR);
	   echo $table;
      ?>
    </tbody>
</table>
$stackTR is an array of strings that each string is a row of the table. 
*/?>

<?php /*
I removed the title, date and excerpt from the posts of the category Products. 
I did this because I wanted the posts to look like a product representation. The result was fantastic.  
*/?>
<div class ="panel-content">
<?php /* <div class ="panel-content"> */ ?>
<?php 
$stackTD = array("");
?>	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
       <?php /* Start post */ ?>
       <?php 
          /*
		   The function the_ID() echos the post ID. Whereas, the function get_the_ID() returns the post ID. 
		   */ 
          $ID = get_the_ID();   
		  $IDstr = strval($ID); // Convert integer to string. 
		  $postTitle = get_the_title();
		  $postClassArray = get_post_class();
		  $postClassStr = implode(" ", $postClassArray); // Convert array to string.          
          $tableItem = "<div id=\"post-".$IDstr."\""." "."class=\"".$postClassStr."\"".">"; 
		  if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){
		  	$postPermalink = get_permalink(); 
			$postThumbnail = get_the_post_thumbnail();// thumbnail = featured image 	
			$imageAndLink = "<a href='$postPermalink'>$postThumbnail</a>"; 
		  }else {
                  $imageAndLink = roadfighter_main_image_new();
                }
		  $tableItem = $tableItem."<div class=\"post_content\">";
		 // $tableItem = $tableItem.$imageAndLink."</div>";
		  $tableItem = $tableItem.$imageAndLink;
		  $tableItem = $tableItem."<div class=\"thumbnail-text\">";
		  $tableItem = $tableItem.$postTitle."</div>";
		  $tableItem = $tableItem."</div>";
		  $tableItem = $tableItem."<div class=\"clear\"></div>";
		  $tableItem = $tableItem."</div>";
          
		  $tableTD = "<td>".$tableItem."</td>";
		  array_push($stackTD,$tableTD);
		  //echo $tableItem;
	    ?> 
	     <?php /*
         <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
           
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
           <?php /*
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
                <?php //<?php the_excerpt(); // We don't need the post excerpt under the thumbnail. ?>
             </div> 
		    */ ?>   
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
     <?php /*
            <div class="clear"></div>
        </div>
	  */ ?> 
    <?php endwhile; 	
 // else:
    ?>    
<?php /*
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <p>
    <?php _e('Sorry, no posts matched your criteria.', 'rdf'); ?>
        </p>
    </div> 
 */ ?>    
  <?php endif; ?>
  <table>
  	<tbody> 
      <?php
        // $stackTD = array("<td>...</td>"); // Each category should have at least one post. 
        $stackTR = array("");
        makeTR($stackTD, $stackTR);
        $table = implode(" ", $stackTR);
		echo $table;
      ?>
    </tbody>
  </table>    
</div>  
<div class="clear"></div>
<?php /* </div> */ ?>
<?php /* <div class="clear"></div> */ ?>
<?php /* <!--End post */ ?>