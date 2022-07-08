<?php
/**
 * Template Name: Contact Template
 *
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
     $contact_title          = get_field('contact_title');
	 $contact_subtitle = get_field('contact_subtitle');
	  $location_heading = get_field('location_heading');
	 $location_top_sections = get_field('location_top_sections');
	 $location_bottom_sections = get_field('location_bottom_sections');
	 $contact_form_code = get_field('contact_form_code');
	 
	 $contact_page_left_content = get_field('contact_page_left_content');
	 $contact_page_right_content = get_field('contact_page_right_content');
	
	
	 
  //  $project_banner_title   = get_field('project_banner_title');
   
	
  


}
?>

<main class="main">
                <!-- Start Banner -->
                <?php if(!empty($banner_image)){?>
                <div class="banner-other" style="background-image: url(<?php echo $banner_image;?>)">
                   <h1><?php echo $banner_caption;?></h1>
                    <?php }?>
                    <div class="links-page">
                        <a href="<?php echo site_url();?>">Home</a> / <a href="#" class="active">Contact Us</a>
                    </div>
                </div>
                <!-- Start Contact Form -->
                <section class="contact contact-after padt-90 " id="getintouch">
                    <div class="container">
                        <div class="row">
                          
                            <div class="col-lg-6 col-12" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="300">
                            <?php echo apply_filters("the_content",$contact_page_left_content);?>
                              
                            </div>
                            <div class="col-lg-6 col-12" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                            data-aos-offset="300">
                                <?php echo $contact_page_right_content;?>
                            </div>
                            
                        </div>
                    </div>
                </section>
                
                 <?php
				  wp_reset_query();
				  	$args = array(
	'post_type' => 'office', 
	 'post_status' => 'publish',
    'hide_empty' => true, 
    'orderby' => 'date',
    'order' => 'ASC' 
);
   $office_group_query = new WP_Query( $args);
   ?>
    <?php  if ( $office_group_query->have_posts() ) : ?>
                <!-- Start Loaction Section -->
                <section class="location" id="location">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-6 col-12 left-side" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                      data-aos-offset="100">
                        <h2 class="section-title">Our Locations</h2>
                        <div class="accordion" id="accordionExample">
   <?php 
    $office_map_code = array();
					 $of=1;
					  while ( $office_group_query->have_posts() ) : $office_group_query->the_post();
					  $office_contact_details = get_field('office_contact_details',get_the_ID());  
					  $office_address = get_field('office_address',get_the_ID());
                      $footer_contact_link          = get_field('footer_contact_link',get_the_ID());
					  $officeslug = get_post_field( 'post_name', get_the_ID() );
					  $office_map_code2 =  get_field('office_map_code', get_the_ID());
					  if(!empty($office_map_code2)){
						   $office_map_code[$of] = apply_filters("the_content",$office_map_code2);
					  }
					  ?>
                          <div class="card">
                            <div class="card-header" id="headingOne<?php echo $of;?>">
                              <h2 >
                                 <?php  if(isset($_REQUEST['office-location'])){
							?>
                                <button class="btn btn-link btn-block text-left <?php  if($_REQUEST['office-location']!=$officeslug){ echo 'collapsed';}?>" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $of;?>" aria-expanded="true" aria-controls="collapseOne">
                                  <i class="far fa-plus"></i> <span> <?php echo get_the_title();?></span>
                                </button>
                                <?php } else{ ?>
                                
                                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $of;?>" aria-expanded="true" aria-controls="collapseOne">
                                  <i class="far fa-plus"></i> <span> <?php echo get_the_title();?></span>
                                </button>
                                <?php } ?>
                              </h2>
                            </div>
                        <?php  if(isset($_REQUEST['office-location'])){
							?>
                            <div id="collapseOne<?php echo $of;?>" class="collapse <?php  if($_REQUEST['office-location']==$officeslug){ echo 'show';}?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <?php
						}else{?>
                            <div id="collapseOne<?php echo $of;?>" class="collapse <?php  if($of==1){ echo 'show';}?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <?php }?>
                              <div class="card-body">
                                <p><?php echo $office_address;?></p>
                                <div class="row">
                                  <div class="row contact">
                                    <div class="col-md-6 col-12">
                                    <?php echo $office_contact_details;?>
                                    </div>
                                    <div class="col-md-6 col-12 location-icon">
                                    
                                    
                                      <a href="<?php echo site_url();?>/contact/?office-location=<?php echo $officeslug;?>" class="btn btn-light btn<?php echo $of;?>"><i class="far fa-directions"></i> Get Directions</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
  
                       <?php 
						 $of++;
						 endwhile;
						  wp_reset_query();
						 ?>
                             
  
                          

                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-12 right-side" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100" data-aos-easing="ease-in-sine" data-aos-anchor-placement="top-bottom" 
                      data-aos-offset="100">
                      <!--  <div class="map map1 active">
                            <?php 
					   //print_r($office_map_code);
					   
					  // if(!empty($office_map_code)){?>
                            <?php 
				 /*  if(isset($_REQUEST['office-location']) && $_REQUEST['office-location']!=''){
				        $the_slug = $_REQUEST['office-location'];
                    $args = array(
                      'name'        => $the_slug,
                      'post_type'   => 'office',
                      'post_status' => 'publish',
                      'numberposts' => 1
                    );
                    $my_posts = get_posts($args);
                    //print_r($my_posts);
                      echo $office_map_coden =  get_field( 'office_map_code', $my_posts[0]->ID );

                                       }
                                       else{
                                       echo $office_map_code[1];

                                       }*/
                                       ?>
                            <?php  // }?>
                            <!--  <img src="ui/media/images/map.png" class="img-fluid" alt="map">--
                        </div>-->
                        
                          <?php  if(!empty($office_map_code)){	
											  ?>
                          <?php
						  $m=1;
						   foreach($office_map_code as $office_map_code_val){?>
                             <div class="map map<?php echo $m;?> <?php if($m==1){ echo 'active'; }?>">
                              <?php
								if(isset($_REQUEST['office-location']) && $_REQUEST['office-location']!=''){
				        $the_slug = $_REQUEST['office-location'];
                    $args = array(
                      'name'        => $the_slug,
                      'post_type'   => 'office',
                      'numberposts' => 1
                    );
                    $my_posts = get_posts($args);
                    //print_r($my_posts);
                     echo  $office_map_coden =  get_field( 'office_map_code', $my_posts[0]->ID );

                                       }
                                       else{
								
								
								 echo $office_map_code_val;
									   }?>
                            </div>
                            <?php $m++; }?>
                            
                            
                            <?php }?>
                       
                      </div>
                    </div>
                    
                  </div>
                </section>
<?php endif;?>
            </main>
<?php get_footer(); ?>
