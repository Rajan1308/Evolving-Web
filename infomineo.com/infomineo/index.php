<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Infomenio 1.0
 */

get_header();
?>
<?php

if (class_exists('acf')) {    

    $page_banner_images          = get_field('page_banner_images',417);
	 
 
 
	
	 
  //  $project_banner_title   = get_field('project_banner_title');
   
	
  


}
?>

<?php if(!empty($page_banner_images)){?>
<section class="innerbanner" id="inner">
 <!-- start div Swiper -->
 <?php $p=1;
 foreach($page_banner_images as $page_banner_images_value){?>
        <div class="banner left" style="background-image: url(<?php echo $page_banner_images_value['page_banner_image'];?>);background-position: center right;">
            <div class="row h-100 justify-content-center align-items-center m-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="title">
    <?php if($page_banner_images_value['page_banner_content']){ echo $page_banner_images_value['page_banner_content']; }?>
                             
                            </div>
                        </div>
                         <?php if(!empty($page_banner_images_value['page_banner_video_code'])){?>
                         <div class="col-md-4">
                            <div class="playnow">
                                <div class="circle pulse"></div>
                                <div class="circle">
                                <?php //if(!empty($page_banner_images_value['page_banner_video_code'])){?>
                                
                                   <div class="overlay-pop">
                        <a id="play-video" class="video-play-button" href="#" data-toggle="modal" data-target="#videoModel<?php echo $p;?>">
                            <span></span>
                        </a>
                    </div>
                                    <?php //}?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                </div>
        </div>
    </div>
</div>
<?php $p++;
}?>
<!-- end div swiper -->
</section>
<?php }?>
<?php
wp_reset_query();
 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args  = array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
	'paged' => $paged,
	'category_name' => 'blog',
   // 'cat'            => 14,
     'orderby'        => 'date',
    'order'          => 'ASC',
    'post_status'    => 'publish'
);
$the_query = new WP_Query( $args );
if ($the_query->have_posts() ) {

		$i = 0;
		

		?>

<section class="blogs blog-list bg-light pt-5 pb-3">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12 text-center mb-5">
                <h5><i class="far fa-circle"></i> Blogs</h5>
                <h2 class="mt-3 mb-3">Our Latest Blogs</h2>
            </div>
            <?php
			while( $the_query->have_posts() ) {
    $the_query->the_post();
	
	
	 $blog_or_news_author1 = get_field('blog_or_news_author',get_the_ID());
	 $read_time1 = get_field('read_time',get_the_ID());
	$news_or_blog_post_date1 = get_field('news_or_blog_post_date',get_the_ID());
				?>
          
             <?php $post_img1 = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()),'full');?>
            <div class="col-md-4">
                <div class="card rounded-0">
                <?php if(!empty( $post_img1)){?>
                <img src="<?php echo $post_img1;?>" class="rounded-0" alt="dubai_bg">
                <?php } ?>
                <div class="card-body p-4 blue-bg">
                  <h3 class="card-title font-weight-600"><a href="<?php echo get_permalink(get_the_ID());?>" class="link-color text-white"><?php the_title();?></a></h3>
                  
                  <h6 class="text-white font-weight-600 mb-4 mt-4"><span><i class="far fa-calendar-alt"></i>  <?php if(!empty( $news_or_blog_post_date1)){ echo $news_or_blog_post_date1; }?></span> | <span><i class="fas fa-user"></i> <?php if(!empty( $blog_or_news_author1)){ echo $blog_or_news_author1; }?></span> </h6>
                  <p class="card-text mt-3 text-white mb-4"><?php echo substr(get_the_excerpt(),200);?></p>
                  <div class="link mt-4">
                    <span><a href="<?php echo get_permalink(get_the_ID());?>" class="text-white">Read complete blog</a></span>
                    <span class="float-right text-white"><?php if(!empty( $read_time1)){ echo $read_time1; }?></span>
                  </div>
                </div>
              </div>
            </div>
            
         <?php   } ?>
           
            
            
            
            
            
            
            
            
            
           
            
        </div>
        
        <div class="mt-5 mb-5">
            <nav aria-label="Page navigation example">
            
            <div class="pagination">
     <?php
     $big = 999999999;
     echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $the_query->max_num_pages,
          'prev_text' => '<i class="far fa-chevron-double-left"></i> Previous',
          'next_text' => 'Next <i class="far fa-chevron-double-right"></i>',
		 'type'=> 'list'
     ) );
?>
</div>
              <!--  <ul class="pagination justify-content-center">
                <li class="page-item first disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="far fa-chevron-double-left"></i> Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item last">
                    <a class="page-link" href="#">Next <i class="far fa-chevron-double-right"></i></a>
                </li>
                </ul>-->
            </nav>
        </div>
    </div>
</section>
<!-- /blog-details -->
<?php
}
wp_reset_query();

?>

<?php
get_footer();
