<?php
/**
 * Template Name: Business Translation Template
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

 $slider_message_link = get_field('slider_message_link');
	 
	 $slider_message_form_code = get_field('slider_message_form_code');
     $service_introduction_title          = get_field('service_introduction_title');
	  $service_introduction_subtitle          = get_field('service_introduction_subtitle');
	 $service_introduction_content = get_field('service_introduction_content');
	  $service_introduction_image = get_field('service_introduction_image');
	  $introduction_content_left = get_field('introduction_content_left');
	   $introduction_content_right = get_field('introduction_content_right');
	 $about_business_list = get_field('about_business_list');
	 $methodology_title = get_field('methodology_title');
	 $methodology_content = get_field('methodology_content');
	 
	 $related_services_list = get_field('related_services_list');
	// $contact_page_right_content = get_field('contact_page_right_content');
	 $expert_services_content_title = get_field('expert_services_content_title');
	
	 
  $related_service_heading   = get_field('related_service_heading');
   
	$testimonial_heading = get_field('testimonial_heading',get_the_ID());
	   $testimonial_list = get_field('testimonial_list',get_the_ID());
	   
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
	   $faq_content = get_field('faq_content');
	 $about_business_section_background_image = get_field('about_business_section_background_image');
  


}
?>

 <main class="main">
<?php if(!empty($page_banner_slider_images) ) {?>
                <!-- Start Banner -->
               <section class="banner child-banner">
                    <div class="links-banner">
                        <a href="<?php echo site_url();?>">Home</a> / <a href="#" class="active"><?php echo get_the_title();?></a>
                    </div>
                    <div class="owl-carousel owl-theme">
                    <?php foreach($page_banner_slider_images as $page_banner_slider_images_val){?>
                        <div class="item"> 
                            <div class="slide slide1" style="background-image: url('<?php if(!empty($page_banner_slider_images_val['page_banner_slider_image']) ) { echo $page_banner_slider_images_val['page_banner_slider_image'];}?>');">
                            
                            <div class="slide-content">
                             <?php if(!empty($page_banner_slider_images_val['page_banner_icon'])){?>
                                    <img src="<?php echo $page_banner_slider_images_val['page_banner_icon'];?>" alt="<?php echo $page_banner_slider_images_val['page_banner_title']; ?>">
                                    <?php }?>
                                    
                                    <h1>   <?php if(!empty($page_banner_slider_images_val['page_banner_title']) ) { echo $page_banner_slider_images_val['page_banner_title'];}?></h1>
                                    <p>
                                        <?php if(!empty($page_banner_slider_images_val['page_banner_slider_image_cpation']) ) { echo $page_banner_slider_images_val['page_banner_slider_image_cpation'];}?>
                                    </p>
                                    <span class="line"></span>
                                </div>
                                
                                
                            </div>
                        </div>
<?php }?>
                        

                        
                    </div>
                     <?php if(!empty($slider_message) ) {?>
                    <div class="box-message">
                        <div class="left-side">
                        <h1><?php  echo $slider_message;?></h1>
                        </div>
                         <?php if(!empty($slider_message_link) ) {?>
                        <div class="right-side">
                            <a href="<?php echo $slider_message_link['url'];?>" class="btn btn-info" data-toggle="modal" data-target="#enquireModal">
                               <?php echo $slider_message_link['title'];?>
                            </a>
                        </div>
                        <?php }?>
                    </div>
                    <?php }?>
                   
                </section>
                <?php }?>
                
                
               <!-- Start Normal Section -->
                <section class="normal pad-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="100">
                                <div class="img-content">
                                  <?php if(!empty($service_introduction_image) ) { ?> <img src=" <?php  echo $service_introduction_image;?>" class="img-fluid"  alt="<?php echo $service_introduction_title; ?>"> <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 right-side" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="100">
                                <h2 class="section-title"> <?php if(!empty($service_introduction_title) ) { echo $service_introduction_title;}?></h2>
                                <?php if(!empty($service_introduction_content) ) { echo $service_introduction_content;}?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Start According -->
                 <?php if(!empty($about_business_list) ) {?>  
            
            
                <!-- Start According -->
                <section class="according-section"   style=" <?php if(!empty($about_business_section_background_image)){ ?> background-image: url(<?php echo $about_business_section_background_image; ?>); <?php }?>">
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
                                      <button class="btn btn-link btn-block text-left <?php if($i!=3){ echo 'collapsed'; }?>" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne">
                                        <span><?php echo $i;?></span>
                                       <?php if(!empty($about_business_list_val['about_business_title']) ) { echo $about_business_list_val['about_business_title'];}?>
                                      </button>
                                    </h2>
                                  </div>
                              
                                  <div id="collapseOne<?php echo $i;?>" class="collapse <?php if($i==3){ echo 'show'; }?>" aria-labelledby="headingOne<?php echo $i;?>" data-parent="#accordionExample">
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
                
                
               
               
                   <?php if(!empty($benefits_contents) ) {?>  
                
                <!-- Start Benefits -->
                <section class="benefits-serveices">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6 col-12 left-side"  data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                      data-aos-offset="100">
                      <?php if(!empty($benefits_image) ) { ?>
                        <img src="<?php echo $benefits_image;?>" alt="<?php  echo $benefits_title; ?>">
                        <?php }?>
                      </div>
                      <div class="col-md-6 col-12 right-side"  data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                      data-aos-offset="100">
                        <h2 class="section-title">
                          <?php if(!empty($benefits_title) ) { echo $benefits_title;}?>
                        </h2>
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
                                    <img src="<?php echo $expert_services_content_val['expert_services_image'] ;?>" alt="<?php $expert_services_content_val['expert_services_content_title'];  ?>">
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

         
               <div class="methodology-section-bg">
                    <div class="container">
                        <h2 class="section-title text-center"><?php if(!empty($methodology_title) ) { echo $methodology_title;}?></h2>
                        <?php if(!empty($methodology_image) ) { ?>
                        <div class="img-content"  data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                        data-aos-offset="100">
                            <img src="<?php echo $methodology_image;?>" class="img-fluid" alt="<?php echo $methodology_title; ?>">
                        </div>
                        <?php }?>
                         
               
                
                
                <?php if(!empty($faq_content)){?>
                
                
                 <!-- Start FAQ -->
                <section class="faq faq-new"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                data-aos-offset="100">
                    <div class="container">
                        <div class="accordion" id="faq">
  <?php 
  $f=1;
  foreach($faq_content as $faq_content_val){?>
                            <div class="card">
                              <div class="card-header" id="headingOnen<?php echo $f;?>">
                                <h2 >
                                  <button class="btn btn-link btn-block text-left <?php if($f!=1) { echo 'collapsed';} ?>" type="button" data-toggle="collapse" data-target="#collapseOnen<?php echo $f;?>" aria-expanded="true" aria-controls="collapseOnen<?php echo $f;?>">
                                    <i class="far fa-plus"></i> <span> <?php if(!empty($faq_content_val['faq_question']) ) { echo $faq_content_val['faq_question'];}?></span>
                                  </button>
                                </h2>
                              </div>
                          
                              <div id="collapseOnen<?php echo $f;?>" class="collapse <?php if($f==1) { echo 'show';} ?>" aria-labelledby="headingOnen<?php echo $f;?>" data-parent="#faq">
                                <div class="card-body">
                                
                                
                                
                                  <!-- Start Methodology-->
             
                          <?php if(!empty($faq_content_val['faq_answer']) ) {?>
                          
                        <div class="row">
                          <?php 
						  $m=1;
						  
						  foreach($faq_content_val['faq_answer'] as $faq_answer_val){?>
                            <div class="col-md-6 col-12 <?php if($m%2==0){ echo 'right-side';} else{ echo 'left-side' ;}?>"  data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="100">
                                <h3>  <?php if(!empty($faq_answer_val['faq_title']) ) { echo $faq_answer_val['faq_title'];}?></h3>
                              
                                 <?php if(!empty($faq_answer_val['faq_content']) ) { echo $faq_answer_val['faq_content'];}?>
                               
                                 <?php if(!empty($faq_answer_val['faq_image']) ) {?>
                                <img src="<?php echo $faq_answer_val['faq_image']['url'] ;?>" class="img-fluid" 
                                alt="<?php echo $faq_answer_val['faq_image']['alt']; ?>">
                                <?php }?>
                            </div>
                          <?php 
						  
						  $m++;
						  } ?>   
                            
                    </div>
                  
                    <?php }?>
                
                
                                <!--  <p>
                                  <?php //if(!empty($faq_content_val['faq_answer']) ) { echo $faq_content_val['faq_answer'];}?>
                                </p>-->
                                  
                                </div>
                              </div>
                            </div>
    <?php
	$f++;
	
	 }?>
                            
  
                            
                          </div>
                    </div>
                </section>
                <?php }?>
                 </div>
                </div>
<?php if(!empty($testimonial_list)){?>
                <!-- Start Our Clients -->
                <section class="client" >
                    <div class="container" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                    data-aos-offset="0" >
                        <div id="carouselExampleIndicators" class="carousel slide top-to-bottom" data-ride="carousel">
                         <div class="carousel-inner">
                          <?php 
						  $s=1;
						  foreach($testimonial_list as $testimonial_list_val){?>  
                           
                          
                              <div class="carousel-item <?php if($s==1){ echo 'active';}?>">
                                  <h2 class="section-title"> <?php if(!empty($testimonial_heading)){ echo $testimonial_heading; }?></h2>
                                <p><?php echo $testimonial_list_val->post_content;?></p>
                                <h4><?php echo $testimonial_list_val->post_title;?></h4>
                              </div>
                             <?php  $s++; }?> 
                              
                              
                            </div>
                            <ol class="carousel-indicators">
                             <?php $t=1;
							 foreach($testimonial_list as $testimonial_list_val){
								 $testimonial_img = wp_get_attachment_url(get_post_thumbnail_id($testimonial_list_val->ID),'full');
								 ?>  
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $t;?>" 
                                class="<?php if($t==1){ echo 'active'; } ?>">
                                    <img src="<?php echo $testimonial_img;?>" alt="user">
                                </li>
                                <?php $t++; }?>
                               
                              </ol>
                            <div class="arrows">
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"><i class="far fa-chevron-up"></i></span>
                                    
                                  </a>
                                  <span></span>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"><i class="far fa-chevron-down"></i></span>
                                    
                                  </a>
                            </div>
                          </div>
                    </div>
                </section>
<?php }?>

            </main>
     
     
     
        
            <?php if(!empty($slider_message_form_code)){?>
            
              <!-- Enquire Modal -->
             <div class="modal fade contact-modal" id="enquireModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    
                      <?php echo apply_filters("the_content",$slider_message_form_code);?>
                  </div>
              </div>
              </div>
          </div>
    
    <?php }?>       
              
<?php get_footer(); ?>

<script>
$('.collapse').on('shown.bs.collapse', function (e) {
    var $panel = $(this).closest('.card');
    var additionalOffset = 100;
    $('html,body').animate({
        scrollTop: $panel.offset().top - additionalOffset
    }, 1200);
});

var dataString = "region=<?php echo $_REQUEST['region'];?>&industry=<?php echo $_REQUEST['industry'];?>&keywords=<?php echo $_REQUEST['keywords'];?>";
$("#more-btn").click(function(){
$.ajax
({
  type: "GET",
  url: "<?php echo site_url();?>/case-studies.php",
  data: dataString,
  success: function(html)
  {
	  $("#cstudies").html(html);
	  
     //alert(html);
  }
});
});


function cformsubmit()
{
	 
   // avoid to execute the actual submit of the form.

    var form = $("#cform");
	 
    var url = form.attr('action');
  
    $.ajax({
           type: "GET",
           url: "<?php echo site_url();?>/case-studies-new.php",
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
			 $("#cstudies").html(data);
              //alert(data); // show response from the php script.
           }
         });

    return false;
}
</script>
 <script>
    $(document).ready(function() {
		setTimeout(function(){ $('select[name="select_enquiry"]').find('option[value="Business Translation"]').attr("selected",true).change(); }, 2000);	

   });
    </script>