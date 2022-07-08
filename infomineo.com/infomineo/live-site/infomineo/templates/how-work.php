<?php
/**
 * Template Name: How Work Page
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
     $how_we_work_title          = get_field('how_we_work_title');
	 $how_we_work_subtitle = get_field('how_we_work_subtitle');
	  $about_infomineo_title = get_field('about_infomineo_title');
	 $about_infomineo_content = get_field('about_infomineo_content');
	 $about_infomineo_background_image = get_field('about_infomineo_background_image');
	 $about_infomineo_bottom_section_title = get_field('about_infomineo_bottom_section_title');
	 
	 $about_infomineo_bottom_description = get_field('about_infomineo_bottom_description');
	 $about_infomineo_bottom_image = get_field('about_infomineo_bottom_image');
	
	
	 
   $about_infomineo_bottom_video_link   = get_field('about_infomineo_bottom_video_link');
   $what_benefits_section_title   = get_field('what_benefits_section_title');
   $what_benefits_list   = get_field('what_benefits_list');
   
	
  


}
?>
<main class="main">
    <?php if(!empty($banner_image)){?>
                <!-- Start Banner -->
                <div class="banner-other" style="background-image: url(<?php echo $banner_image;?>)">
                    <h1> <?php echo $banner_caption;?></h1>
                    <div class="links-page">
                        <a href="<?php echo site_url();?>">Home</a> / <a href="#" class="active"><?php echo get_the_title();?></a>
                    </div>
                </div> 
              <?php }?>  
                <!-- Start Title-->
                <section class="title padt-90" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                data-aos-offset="300" >
                    <div class="container text-center">
                        <h2 class="section-title"> <?php if(!empty($how_we_work_title)){ echo $how_we_work_title;}?></h2>
                        <p><?php if(!empty($how_we_work_subtitle)){ echo $how_we_work_subtitle;}?></p>
                    </div>
                </section>
                <!-- Start Infomineo bg-->
                <section class="info-bg pad-50"  style=" <?php if(!empty($about_infomineo_background_image)){?> background-image:url(<?php echo $about_infomineo_background_image;?>); <?php }?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-8 col-12" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="300">
                                <h2 class="section-title"> <?php if(!empty($about_infomineo_title)){ echo $about_infomineo_title;}?></h2>
                                
                                <?php if(!empty($about_infomineo_content)){ echo $about_infomineo_content;}?>
                                
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Start Normal Section -->
                <section class="normal normal-how pad-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-12" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="0">
                            <?php if(!empty($about_infomineo_bottom_image)){?>
                            <?php if(!empty($about_infomineo_bottom_video_link)){?>
                                <a href="<?php if(!empty($about_infomineo_bottom_video_link)){ echo $about_infomineo_bottom_video_link;}?>" class="img-content video-trigger">
                                    <!-- <div class="icon-video"><i class="far fa-play"></i></div> -->
                                    <img src="<?php echo $about_infomineo_bottom_image['url'];?>" class="img-fluid"  alt="<?php echo $about_infomineo_bottom_image['alt']; ?>">
                                </a>
                                <?php } else{?>
                                 <img src="<?php echo $about_infomineo_bottom_image['url'];?>" class="img-fluid"  alt="<?php echo $about_infomineo_bottom_image['title']; ?>">
                                <?php }?>
                                <?php }?>
                            </div>
                            <div class="col-lg-5 col-12 right-side" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="0">
                             <?php if(!empty($about_infomineo_bottom_section_title)){ ?><h2><?php echo $about_infomineo_bottom_section_title; ?></h2> <?php }?>
                               <?php if(!empty($about_infomineo_bottom_description)){ echo $about_infomineo_bottom_description;}?>
                            </div>
                        </div>
                    </div>
                </section>
<?php if(!empty($what_benefits_list)){?>
                <!-- Start Benefit -->
                <div class="benefit" >
                    <div class="container-fluid" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                    data-aos-offset="300">
                        <h2 class="section-title">
                            <?php if(!empty($what_benefits_section_title)){ echo $what_benefits_section_title;}?>
                        </h2>
                        <div class="owl-carousel owl-theme">
                        <?php
						$b=1;
						 foreach($what_benefits_list as $what_benefits_list_val){?>
                            <div class="item">
                                <div class="icon">
                                <?php if(!empty($what_benefits_list_val['what_benefits_icon'])){ ?>
                               <img src="<?php echo $what_benefits_list_val['what_benefits_icon']; ?>" alt="<?php echo $what_benefits_list_val['what_benefits_title']; ?>"/> <?php }?>
                                 
                                </div>
                                <h3> <?php if(!empty($what_benefits_list_val['what_benefits_title'])){ echo $what_benefits_list_val['what_benefits_title'];}?></h3>
                           <p>
                                  <?php if(!empty($what_benefits_list_val['what_benefits_content'])){ echo $what_benefits_list_val['what_benefits_content'];}?>
                                </p>
                                <i class="fa fa-angle-down moretxt1" aria-hidden="true"  data-toggle="collapse" id="amoretxt<?php echo $b;?>"></i>
                               <!--<i class="fa fa-angle-down moretxt" aria-hidden="true"  data-toggle="collapse" id="amoretxt<?php //echo $b;?>" data-target="#moretxt<?php //echo $b;?>"></i>-->
                              <div  class="collapse" id="moretxt<?php echo $b;?>"  aria-labelledby="moretxt<?php echo $b;?>" data-parent="#benefit">
                               <?php if(!empty($what_benefits_list_val['what_benefits_content'])){ echo $what_benefits_list_val['what_benefits_content'];}?>
                              </div>
                               
                            </div>
<?php $b++; }?>
                            

                            
                        </div>
                    </div>
                </div>
                <?php }?>
            </main>
<?php get_footer(); ?>
<script>
jQuery(document).ready(function(e) {
	
	 jQuery(".owl-nav button").click(function(e) {
        e.preventDefault();
		jQuery(".active .collapse").removeClass('show1');
		
		
		//return false;
    });
	
    jQuery(".moretxt").click(function(e) {
        e.preventDefault();
	if(jQuery(this).parent().find(".collapse").hasClass('show1')){
		jQuery(this).parent().find(".collapse").removeClass('show1').slideUp(200);
		jQuery(this).removeClass('fa-angle-up');
		jQuery(this).addClass('fa-angle-down');
	}
	else
	{
		jQuery(this).parent().find(".collapse").addClass('show1').slideDown(200);
		jQuery(this).addClass('fa-angle-up');
		jQuery(this).removeClass('fa-angle-down');
		
	}
		//return false;
    });
});

</script>