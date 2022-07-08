<?php
/**
 * Template Name: Research Template
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Infomenio 1.0
 */
get_header();
?>
<?php
if (class_exists('acf')) {    
$page_banner_slider_images = get_field('page_banner_slider_images');
$slider_message = get_field('slider_message');
     $service_introduction_title          = get_field('service_introduction_title');
	  $service_introduction_subtitle          = get_field('service_introduction_subtitle');
	 $service_introduction_content = get_field('service_introduction_content');
	  $service_introduction_image = get_field('service_introduction_image');
	  $introduction_content_left = get_field('introduction_content_left');
	   $introduction_content_right = get_field('introduction_content_right');
	 $about_business_list = get_field('about_business_list');
	 $methodology_title = get_field('methodology_title');
	 $methodology_content = get_field('methodology_content');
	 $methodology_form_code = get_field('methodology_form_code');
	 $related_services_list = get_field('related_services_list');
	// $contact_page_right_content = get_field('contact_page_right_content');
	 $expert_services_content_title = get_field('expert_services_content_title');
	
	 
  $related_service_heading   = get_field('related_service_heading');
   
	$testimonial_heading = get_field('testimonial_heading','option');
	   $testimonial_list = get_field('testimonial_list','option');
	   
	   $methodology_title =  get_field('methodology_title');
	   $methodology_subtitle =  get_field('methodology_subtitle');
	   $methodology_link =  get_field('methodology_link');
	   $methodology__contents =  get_field('methodology__contents');
	   $methodology_image =  get_field('methodology_image');
	   $expert_services_title =  get_field('expert_services_title');
	   $expert_services_content =  get_field('expert_services_content');
	   
	   
	   $benefits_title =  get_field('benefits_title');
	   $benefits_contents =  get_field('benefits_contents');
	   $benefits_image =  get_field('benefits_image');
	   $benefits_subtitle = get_field('benefits_subtitle');
	   
	  $business_research_services_title = get_field('business_research_services_title');
	    $business_research_services_list = get_field('business_research_services_list');
  


}
?>

 <main class="main">
<?php 
$parent_page_id = wp_get_post_parent_id(get_the_id());
	$parent_page = get_post($parent_page_id);

//if(!empty($page_banner_slider_images) ) {
	
	//print_r($parent_page);
	
	?>
              <?php if(!empty($page_banner_slider_images) ) {?>
                <!-- Start Banner -->
                <section class="banner child-banner banner-other">
                   
                    <div class="owl-carousel owl-theme">
                    <?php foreach($page_banner_slider_images as $page_banner_slider_images_val){?>
                        <div class="item"> 
                            <div class="slide slide1" style="background-image: url('<?php if(!empty($page_banner_slider_images_val['page_banner_slider_image']) ) { echo $page_banner_slider_images_val['page_banner_slider_image'];}?>');">
                            
                            <div class="slide-content">
                         
                    <h1><?php if(!empty($page_banner_slider_images_val['page_banner_slider_image_cpation']) ) { echo $page_banner_slider_images_val['page_banner_slider_image_cpation'];}?></h1>
                    <div class="links-page">
                        <a href="<?php echo site_url();?>">Home</a> / <a href="<?php echo get_permalink($parent_page->ID);?>"><?php echo $parent_page->post_title;?></a> / <a href="#" class="active"><?php echo get_the_title();?></a>
                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
<?php }?>
                        

                        
                    </div>
                    
                   
                </section>
                <?php }?>
                
                
                
                <!-- Start Normal Section -->
                <section class="normal normal-services padt-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="100">
                                <div class="img-content">
                                  <?php if(!empty($service_introduction_image) ) { ?> <img src=" <?php  echo $service_introduction_image;?>" class="img-fluid"  alt="<?php echo get_the_title(); ?>"> <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 right-side" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="100">
                              <a href="<?php echo get_permalink($parent_page->ID);?>"><i class="far fa-chevron-left"></i> Go Back</a>
                                <h2 class="section-title"> <?php if(!empty($service_introduction_title) ) { echo $service_introduction_title;}?></h2>
                                <?php if(!empty($service_introduction_content) ) { echo $service_introduction_content;}?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Start According -->
                 <?php if(!empty($about_business_list) ) {?>  
            
            
                <!-- Start According -->
                <section class="according-section">
                    <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                    data-aos-offset="100">
                        <div class="col-lg-6  col-12">
                            <div class="accordion" id="accordionExample">
                                <?php
								$i=1;
								 foreach($about_business_list as $about_business_list_val){?>
                                <div class="card">
                                  <div class="card-header" id="headingOne<?php echo $i;?>">
                                    <h2>
                                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne">
                                        <span><?php echo $i;?></span>
                                       <?php if(!empty($about_business_list_val['about_business_title']) ) { echo $about_business_list_val['about_business_title'];}?>
                                      </button>
                                    </h2>
                                  </div>
                              
                                  <div id="collapseOne<?php echo $i;?>" class="collapse " aria-labelledby="headingOne<?php echo $i;?>" data-parent="#accordionExample">
                                    <div class="card-body">
                                     <?php if(!empty($about_business_list_val['about_business_content']) ) { echo $about_business_list_val['about_business_content'];}?>
                                       
                                    </div>
                                  </div>
                                </div>
<?php $i++; }?>
                                

                                
                              </div>
                        </div>
                    </div>
                </section>
                <?php }?>

                <!-- Start Our Methodology -->
                <section class="our-Methodology" style=" <?php if(!empty($methodology_image) ) { ?>background-image: url('<?php echo $methodology_image;?>'); <?php }?>">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6 col-12 left-side"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                      data-aos-offset="100">
                        <h2 class="section-title"> <?php if(!empty($methodology_title) ) { echo $methodology_title;}?></h2>
                        <p>
                         <?php if(!empty($methodology_subtitle) ) { echo $methodology_subtitle;}?>
                        </p>
                          <?php if(!empty($methodology_link) ) { ?>
                        <div class="link">
                          <a href="<?php echo $methodology_link['url'];?>" class="btn btn-info"  data-toggle="modal" data-target="#enquireModalm">
						  <?php echo $methodology_link['title'];?></a>
                        </div>
						<?php }?>
                      </div>
                       <?php if(!empty($methodology__contents) ) { ?>
                      
                      <div class="col-md-6 col-12 right-side"  data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                      data-aos-offset="100">
                        <ul class="list-unstyled">
                        <?php foreach($methodology__contents as $methodology__contents_val){?>
                          <li>
                              <i class="far fa-check"></i>
                              <div class="right-text">
                                <h3>  <?php if(!empty($methodology__contents_val['methodology_content_title']) ) { echo $methodology__contents_val['methodology_content_title'];}?></h3>
                               <?php if(!empty($methodology__contents_val['methodology_content']) ) { echo $methodology__contents_val['methodology_content'];}?>
                              </div>
                          </li>
                          <?php }?>
                         
                      </ul>
                      </div>
                      <?php }?>
                    </div>
                    
                  </div>
                </section>
                   <?php if(!empty($benefits_contents) ) {?>  
                
                <!-- Start Benefits -->
                <section class="benefits-serveices">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6 col-12 left-side"  data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                      data-aos-offset="100">
                      <?php if(!empty($benefits_image) ) { ?>
                        <img src="<?php echo $benefits_image;?>" alt="<?php echo $benefits_title; ?>">
                        <?php }?>
                      </div>
                      <div class="col-md-6 col-12 right-side"  data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                      data-aos-offset="100">
                        <h2 class="section-title">
                          <?php if(!empty($benefits_title) ) { echo $benefits_title;}?>
                        </h2>
                          <h4> <?php if(!empty($benefits_subtitle) ) { echo $benefits_subtitle;}?></h4>
                         
                        <ul class="list-unstyled">
                        <?php foreach($benefits_contents as $benefits_contents_val){?>
                          <li>
                              <i class="far fa-check"></i>
                              <div class="right-text">
                                <h3> <?php if(!empty($benefits_contents_val['benefits_content_title']) ) { echo $benefits_contents_val['benefits_content_title'];}?></h3>
                                <p><?php if(!empty($benefits_contents_val['benefits_content']) ) { 
								echo $benefits_contents_val['benefits_content'];}?></p>
                              </div>
                          </li>
                          <?php }?>
                        
                        
                      </ul>
                      </div>
                    </div>
                  </div>
                </section>
               <?php }?> 
                  <?php 
				 
				  
				  if(!empty($expert_services_content) ) { ?>

                <!-- Start Expert Services -->
                <section class="expert-services"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                data-aos-offset="100">
                    <div class="container text-center">
                        <h2 class="section-title">
                           <?php if(!empty($expert_services_content_title) ) { echo $expert_services_content_title;}?>
                          </h2>
                        <div class="row">
                        <?php 
						 $e=1;
						foreach($expert_services_content as $expert_services_content_val){?>
                            <div class="col-md-4 col-12">
                                <div class="export-content">
                                 <?php if(!empty($expert_services_content_val['expert_services_image']) ) {?>
                                    <img src="<?php echo $expert_services_content_val['expert_services_image'] ;?>" alt="icon">
                                    <?php }?>
                                    <h2> <?php if(!empty($expert_services_content_val['expert_services_content_title']) ) { echo $expert_services_content_val['expert_services_content_title'];}?></h2>
                                        <p> <?php if(!empty($expert_services_content_val['expert_services_details']) ) { echo $expert_services_content_val['expert_services_details'];}?></p>
                                </div>
                            </div>
                            <?php $e++; 
							if($e==4){
								echo '</div><div class="row">
                            <div class="col-md-2 col-12"></div>';
							}
							
							}?>
                           
                            
                        </div>
                        
                    </div>
                </section>
                <?php }?>
                
                
                
                
                  <?php if(!empty($business_research_services_list) ) {?>
                
                <!-- Start Related Services-->
                <div class="services-section services-hover">
                    <div class="container-fluid">
                        <h2 class="section-title">  <?php if(!empty($business_research_services_title) ) { echo $business_research_services_title;}?></h2>
                        <div class="row">
                        <?php foreach($business_research_services_list as $related_services_list_val){
							
							$related_services_img = wp_get_attachment_url(get_post_thumbnail_id($related_services_list_val->ID),'full');
							?>
                            <div class="col-md col-12" >
                                <a href="<?php echo get_permalink($related_services_list_val->ID);?>" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                                data-aos-offset="100"  style=" <?php if(!empty($related_services_img) ){?> background-image:url(<?php echo $related_services_img;?>);<?php }?> "><p><?php echo $related_services_list_val->post_title;?></p></a>
                            </div>
                            <?php }?>
                          
                        </div>
                    </div>
                </div>
<?php }?>


         
            

            </main>
            
               
            <?php if(!empty($methodology_form_code)){?>
            
              <!-- Enquire Modal -->
             <div class="modal fade contact-modal" id="enquireModalm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    
                      <?php echo apply_filters("the_content",$methodology_form_code);?>
                  </div>
              </div>
              </div>
          </div>
   
    <?php }?>
              
              
<?php get_footer(); ?>

 <script>
    $(document).ready(function() {
	setTimeout(function(){ $('select[name="select_enquiry"]').find('option[value="Business Research"]').attr("selected",true).change(); }, 2000);	

   });
    </script>