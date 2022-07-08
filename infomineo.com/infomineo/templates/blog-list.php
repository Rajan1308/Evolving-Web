<?php
/**
 * Template Name: Bloglist Page
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Infomenio 1.0
 */
get_header();
?>
<?php
if (class_exists('acf')) {    
$banner_image = get_field('banner_image');
$banner_caption = get_field('banner_caption');
	
	 
  


}


?>
<main class="main">
<?php if(!empty($banner_image) ) {?>
                <!-- Start Banner -->
              <!-- Start Banner -->
                <div class="banner-other" style="background-image: url(<?php if(!empty($banner_image)){ echo $banner_image; }?>)">
                    <h1><?php if(!empty($banner_caption)){ echo $banner_caption; }?></h1>
                    <div class="links-page">
                        <a href="<?php echo site_url();?>">Home</a>  / <a href="#" class="active">Latest Blogs</a>
                    </div>
                </div>
            <?php }?>   
                 <!-- Start Blog Section -->
              


<?php
  wp_reset_query();
							  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				  	$args2 = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	 'posts_per_page' => 12,
	'paged' => $paged, 
    'hide_empty' => true, 
    'orderby' => 'date',
    'order' => 'DESC'
	
);
					
				
   $blog_group_query = new WP_Query($args2); 
    if ($blog_group_query->have_posts() ) {
		
		//$category = get_category_by_slug( 'blog' );

$args = array(
'type'                     => 'post',
'orderby'                  => 'name',
'order'                    => 'ASC',
'hide_empty'               => true,
'hierarchical'             => 1,
'taxonomy'                 => 'category',
); 
$child_categories = get_categories($args );
/*echo "<pre>";

	print_r($child_categories);
	echo "</pre>";*/
	
	/* $p=1;
	 $childcat_arr =array();
	 foreach($child_categories as $child_categories_val){
					  
					  $childcat =  $child_categories_val->name;
					  if(!empty($region)){
						   $childcat_arr[$p] = $childcat;
					  }
					
					  
					  $p++;
	 }*/
   ?>
    

               <!-- Start Blog -->
            <div class="blog-section blog-page" id="blog-section">
                <div class="container"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                data-aos-offset="300">
                    <div class="filter">
                         <form action="#blog-section" class="row" method="get" id="cform" name="cform">
                            <div class="col-lg-5 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="region">Select a Category</label>
                                    <select name="blogtype" class="form-control"  id="blogtype" onchange="javascript:cformsubmit();">
                                     <option value="" selected>Show All</option>
                                    <?php  foreach($child_categories as $child_categories_val){ ?>
                                        <option value="<?php echo $child_categories_val->slug;?>" <?php if(isset($_REQUEST['blogtype']) && $_REQUEST['blogtype']==$child_categories_val->slug) echo 'selected';?>><?php echo $child_categories_val->name;?></option>
                                        <?php }?>
                                    </select>
                                </div> 
                            </div>
                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="region">Search by Keyword</label>
                                    <input type="text" class="form-control" name="keyword" id="kyword" value="<?php if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']!='') echo $_REQUEST['keyword'];?>" placeholder="Search by Keyword" onkeyup="havascript:cformsubmit();">
                                </div>
                            </div>
                        </form>
                    </div>
                    
                     <?php
					 
					   wp_reset_query();
							  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				 	$args2 = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	 'posts_per_page' => 12,
	'paged' => $paged, 
    'hide_empty' => true, 
    'orderby' => 'date',
    'order' => 'DESC'
	
);
						
							if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']!='' ){
								         	  wp_reset_query();
				 	$args2 = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	 'posts_per_page' => 12,
	'paged' => $paged, 
    'hide_empty' => true, 
    'orderby' => 'date',
    'order' => 'DESC',
	's' => $_REQUEST['keyword']
	
	
);			
							}
							
							
							 if(isset($_REQUEST['blogtype']) && $_REQUEST['blogtype']!='' ){
								         	  wp_reset_query();
				 	$args2 = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	 'posts_per_page' => 12,
	'paged' => $paged, 
    'hide_empty' => true, 
    'orderby' => 'date',
    'order' => 'DESC',
	'tax_query' => array(
        array(
            'taxonomy' => 'category', // get 'posts' only within this taxonomy (category)
            'field'    => 'slug', // get 'posts' by the slug field (can also be 'name')
            'terms'    => $_REQUEST['blogtype'], //get 'posts' terms by the slug field named: 'category1' (or termX)
        ),
    )
	
);			
							}	
					 if(isset($_REQUEST['blogtype']) && $_REQUEST['blogtype']!='' && isset($_REQUEST['keyword']) && $_REQUEST['keyword']!=''){
								         	  wp_reset_query();
											    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				 	$args2 = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	 'posts_per_page' => -1,
	 'hide_empty' => true, 
    'orderby' => 'date',
    'order' => 'DESC',
	's' => $_REQUEST['keyword'],
	'tax_query' => array(
        array(
            'taxonomy' => 'category', // get 'posts' only within this taxonomy (category)
            'field'    => 'slug', // get 'posts' by the slug field (can also be 'name')
            'terms'    => $_REQUEST['blogtype'], //get 'posts' terms by the slug field named: 'category1' (or termX)
        ),
    ),
	
);			
							}		
							
							
					
   $career_group_query2 = new WP_Query($args2); 
   $k=1;
   $k2=1;
   ?>
   <div id="bloglist">
                    <div class="row">
                       <?php   while ( $career_group_query2->have_posts() ) : $career_group_query2->the_post();
					   $blogimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()),'full');
					   
					      $post_date = get_the_date('F d Y', get_the_ID());
	 // $post_date = get_field('post_date',get_the_ID());
	  $content= get_post_field('post_excerpt',get_the_ID());
					   
					   ?>
                        <div class="col-md-4 col-12">
                                <div class="card-content">
                                    <div class="img-content">
                                    <?php if(!empty($blogimg)){?>
                                        <img src="<?php echo $blogimg;?>" alt="image">
                                        <?php }?>
                                        <div class="social-links">
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_permalink();?>" target="blank"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="https://www.facebook.com/share.php?u=<?php the_permalink();?>&t=<?php the_title();?>" target="blank"><i class="fab fa-facebook-f"></i></a>
                                          </div> 
                                    </div>
                                     <?php if(!empty($post_date)){?>
                                    <div class="date">
                                    
                                       <?php echo $post_date;?> | <span>
                                       
                                      <?php $category_detail=get_the_category(get_the_ID());//$post->ID
									  
									  $ct=1;
									  $catt='';
foreach($category_detail as $cd){
	//if($ct!=1){
$catt = $catt.$cd->cat_name.',';
	//}
$ct++;


}

echo substr($catt,0,-1);
?>
                                       </span>
                                    </div>
                                    <?php }?>
                                    <a href="<?php echo get_permalink(get_the_ID());?>"><?php echo get_the_title();?></a>
                                    <p><?php echo $content;?></p>
                                </div>
                            </div>
                        <?php endwhile;?>
                        
                        

                        
                        
                        

                        
                        
                        
                        
                    </div>
                    <nav aria-label="Page navigation text-center">
                       <?php
     $big = 999999999;
     echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $career_group_query2->max_num_pages,
          'prev_text' => '<i class="far fa-chevron-double-left"></i> Previous',
          'next_text' => 'Next <i class="far fa-chevron-double-right"></i>',
		  'type'=>'list'
     ) );
?>
                     <!--   <ul class="pagination">
                          <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                          <li class="page-item "><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>-->
                      </nav>
                      </div>
                </div>
            </div>
            <?php } ?>
            </main>
            
         

      
                   
             
<?php get_footer(); ?>
  <script>
// this is the id of the form
function cformsubmit()
{
	if ($("#blogtype").val() === "" && $("#kyword").val() === "") {
		 window.location.href = '<?php echo get_the_permalink();?>';
	 }
   // avoid to execute the actual submit of the form.

    var form = $("#cform");
	 
    var url = form.attr('action');
  
    $.ajax({
           type: "GET",
           url: "<?php echo site_url();?>/bloglist.php",
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
			 $("#bloglist").html(data);
             //alert(data); // show response from the php script.
           }
         });

    return false;
}
</script>     