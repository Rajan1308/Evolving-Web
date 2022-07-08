<?php
/**
 * Template Name: All Projects page Template
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since nolte 1.0
 */
get_header();
?>
<?php
if (class_exists('acf')) {    



$banner_image = get_field('banner_image');
$banner_caption = get_field('banner_caption');

   
	 
	 
	  $introduction_title          = get_field('introduction_title');
	 $introduction_title_background = get_field('introduction_title_background');
	 $introduction_content = get_field('introduction_content');
	  $introduction_banner = get_field('introduction_banner');
	
	  
	  
	  $corporate_title = get_field('corporate_title');
	  $corporate_content = get_field('corporate_content');
	  $corporate_list = get_field('corporate_list');
	  
	   $our_factory_slider = get_field('our_factory_slider');
	   
	   $quality_standards_title = get_field('quality_standards_title');
	  $quality_standards_title_background_text = get_field('quality_standards_title_background_text');
	  $quality_standards_subtitle = get_field('quality_standards_subtitle');
	  $quality_standards_content = get_field('quality_standards_content');
	  $quality_standards_list = get_field('quality_standards_list');
	  
	  $sustainability_title = get_field('sustainability_title');
	  $sustainability_content = get_field('sustainability_content');
	  $sustainability_banner = get_field('sustainability_banner');
	  $sustainability_right_image = get_field('sustainability_right_image');
	  
	  
	  $certifications_list = get_field('certifications_list');
	  $certifications_heading = get_field('certifications_heading');
	  $certifications_subheading = get_field('certifications_subheading');
	   $certifications_content = get_field('certifications_content');
	  
	  $download_section_banner = get_field('download_section_banner');
	  $download_section_list = get_field('download_section_list');
	  
	  
	   $right_partner_heading = get_field('right_partner_heading');
	    $right_partner_banner_image = get_field('right_partner_banner_image');
	   
	  $right_partner_list = get_field('right_partner_list');
	  $request_a_meeting_form_title = get_field('request_a_meeting_form_title');
	  $request_a_meeting_form_code = get_field('request_a_meeting_form_code');
	 
	 
	  $positioning_in_the_market_section_title = get_field('positioning_in_the_market_section_title');
	  $positioning_in_the_market_content = get_field('positioning_in_the_market_content');
	  
	  
	  $positioning_in_the_market_chart_x_axis = get_field('positioning_in_the_market_chart_x_axis');
	  $positioning_in_the_market_y_axix = get_field('positioning_in_the_market_y_axix');
	  $positioning_in_the_market_chart_brands = get_field('positioning_in_the_market_chart_brands');
	  
	  $all_projects_heading = get_field('all_projects_heading');
	  $all_projects_section_content = get_field('all_projects_section_content');
	  
	  $all_projects_list = get_field('all_projects_list');
	  $download_our_projects_link = get_field('download_our_projects_link');
	    $download_project_file = get_field('download_project_file');
	   $download_our_projects_form_code = get_field('download_our_projects_form_code');
	   
/*	  $facebook_link          = get_field('facebook_link','option');
  $linkedin_link          = get_field('linkedin_link','option');
  $youtube_link          = get_field('youtube_link','option');
	*/
	 
  //  $project_banner_title   = get_field('project_banner_title');
   
	
  


}
?>

<section class="banner parallax-window relative" style="background: url(<?php if(!empty($banner_image)){ echo $banner_image; }?>);">
    <div class="container-fluid">
    <div class="">
        <div class="inner-title pr-5 pl-5 pt-3 pb-3" data-aos="fade-right">
            <h1 class="mt-1 mb-0 font-weight-bolder relative text-white">
                <?php if(!empty($banner_caption)){ echo $banner_caption; }?>
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 pb-0 bg-transparent">
                  <li class="breadcrumb-item"><a href="<?php echo site_url();?>" class="text-white  font-weight-bold"><?php _e( 'Home', 'nolte' ); ?>  </a></li>
                  <li class="breadcrumb-item text-yellow font-weight-bold active" aria-current="page"><?php echo get_the_title();?></li>
                </ol>
            </nav>
        </div>
    </div>
    </div>
</section>
<!-- /banner -->

<section class="whoweare whitebg p-5">
    <div class="relative text-center" data-aos="zoom-in">
    <?php if(!empty($introduction_title)){?>
        <h2 class="mt-1 mb-3 center font-weight-bolder relative">
          <?php echo $introduction_title;?>
        </h2>
        <?php }?>
         <?php if(!empty($introduction_title_background)){?>
        <h6 class="w-100"><?php echo $introduction_title_background;?></h6>
        <?php }?>
    </div>
    <div class="container">
        <div class="text-center mt-5">
           <?php if(!empty($introduction_content)){ echo $introduction_content; }?>
        </div>
    </div>
</section>
<?php if(!empty($introduction_banner)){?>

<section class="home-slider slideInto" id="home">
    <!-- start div Swiper -->
     
        <div class="h-100vh slider-wrapper d-xl-flex align-items-center">
            <div class="owl-carousel main-carousel">
            <?php foreach($introduction_banner as $introduction_banner_val){?>
                <div class="item slide" style="background-image: url('<?php if(!empty($introduction_banner_val['introduction_banner_image'])){ echo $introduction_banner_val['introduction_banner_image']; }?>');">
                    <div class="container-fluid h-100">
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <h3 class="pl-3 pr-3 text-center text-white slideTitle" data-aos="zoom-in"><?php if(!empty($introduction_banner_val['introduction_banner_title'])){ echo $introduction_banner_val['introduction_banner_title']; }?></h3>
                                  <?php if(!empty($introduction_banner_val['introduction_banner_banner_caption'])){?>
                                <div class="col-md-6 offset-md-3 black-bg mt-2" data-aos="fade-up">
                              
                                    <p class="p-3 text-center text-white"><?php echo $introduction_banner_val['introduction_banner_banner_caption']; ?></p>
                                
                               </div>   
                               <?php }?>                         
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                
                
            </div>
        </div>
    
    <!-- end div swiper -->
</section>
<?php }?>
<section class="ourproducts subBrand mt-5">
    <div class="container">
        <div class="relative text-center">
          <?php if(!empty($corporate_title)){?>
            <h2 class="mt-1 mb-3 center font-weight-bolder relative">
                <?php echo $corporate_title;?>
            </h2>
            <?php }?>
            <?php if(!empty($corporate_title)){?>
            <h6 class="w-100">  <?php echo $corporate_title;?></h6>
            <?php }?>
        </div>
        <div class="text-center mt-5 mb-5">
           <?php if(!empty($corporate_content)){ echo $corporate_content; }?>
        </div>
    </div>
     <?php if(!empty($corporate_list)){?>
    <div class="whatsnew Corporate">
        <div class="container">
            <div class="owl-carousel owl-theme wtsnews"  data-aos="zoom-in">
            <?php foreach($corporate_list as $corporate_list_val){?>
                <div class="item text-center"> 
                  <?php if(!empty($corporate_list_val['corporate_icon'])){?>           
                        <img src="<?php echo $corporate_list_val['corporate_icon'];?>" class="w-auto d-inline-block mb-4"  alt="">
                        <?php }?>
                         <?php if(!empty($corporate_list_val['corporate_title'])){?>   
                        <div class="content">
                            <h5 class="mt-3 font-weight-bold w-75 m-auto"><?php echo $corporate_list_val['corporate_title'];?></h5>
                        </div>
                        <?php }?>
                </div>
                <?php }?>
                
                
                
            </div>
        </div>
    </div>
    <?php }?>
</section>
 <?php if(!empty($our_factory_slider)){?>

<section class="home-slider slideInto mt-3" id="home">
    <!-- start div Swiper -->
     
        <div class="h-100vh slider-wrapper d-xl-flex align-items-center">
            <div class="owl-carousel main-carousel">
            <?php foreach($our_factory_slider as $our_factory_slider_val){?>
                <div class="item slide" style="background-image: url('<?php if(!empty($our_factory_slider_val['our_factory_banner'])){ echo $our_factory_slider_val['our_factory_banner']; }?>');">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                             <div class="bl-bg">
                             <?php if(!empty($our_factory_slider_val['our_factory_banner_title'])){?>  
                                <h2 class="pl-3 pr-3 text-left text-white slideTitle" data-aos="zoom-in"><?php echo $our_factory_slider_val['our_factory_banner_title'] ;?></h2>
                                <?php }?>
                                
                                    <div class="p-3 text-left text-white">
                                    
                                     <?php if(!empty($our_factory_slider_val['our_factory_banner_content'])){ echo $our_factory_slider_val['our_factory_banner_content']; }?>
                                    
                                    </div>
                                
                               
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                
                
            </div>
        </div>
    
    <!-- end div swiper -->
</section>

<?php }?>
<section class="ourprocess p-5 black-bg">
    <div class="relative text-center" data-aos="zoom-in">
      <?php if(!empty($quality_standards_title)){?>  
        <h2 class="mt-1 mb-3 center font-weight-bolder relative text-white">
           <?php echo $quality_standards_title;?>
        </h2><?php } ?>
       
       <?php if(!empty($quality_standards_title_background_text)){?>  <h6 class="w-100 text-white"> <?php echo $quality_standards_title_background_text;?></h6>  <?php }?>
    </div>
    <div class="container">
        <div class="text-center">
            <?php if(!empty($quality_standards_subtitle)){?>  <h5 class="font-weight-bolder mb-3 text-white"><?php echo $quality_standards_subtitle;?></h5>
            <?php }?>
             <?php if(!empty($quality_standards_content)){?>
            <p class="text-white"><?php echo $quality_standards_content;?></p>
            <?php }?>
        </div>
    </div>
   <?php if(!empty($quality_standards_list)){?> 
<div class="processContainer mt-3">
    <div class="container">
        <div class="owl-carousel owl-theme process">
        <?php
		$i=1;
		
		 foreach($quality_standards_list as $quality_standards_list_val){?>
            <div class="item" data-aos="fade-up"> 
            <?php if(!empty($quality_standards_list_val['quality_standards_list__image'])){?>
                <div class="image">
                    <img src="<?php echo $quality_standards_list_val['quality_standards_list__image'];?>" alt="">
                    <div class="numbers">
                        <h4><?php echo $i;?></h4>
                    </div>
                </div>
                <?php }?>
                 
                <div class="captions">
                 <?php if(!empty($quality_standards_list_val['quality_standards_list_title'])){?>
                    <h3 class="text-white font-weight-bolder w-75 mt-4 mb-4"><?php echo $quality_standards_list_val['quality_standards_list_title'];?></h3>
                    <?php }?>
                      <?php if(!empty($quality_standards_list_val['quality_standards_list_content'])){?>
                    <div class="text-white"><?php echo $quality_standards_list_val['quality_standards_list_content'] ;?></div>
                        <?php }?>
                </div>
              
            </div>
            <?php $i++; }?>
            
            
            
        </div>
    </div>
</div>
<?php }?>
</section>
<!-- / -->


<section class="initiatives pt-5 pb-5" style="background:#111111 url(<?php if(!empty($sustainability_banner)){ echo $sustainability_banner; }?>)">
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center">

            <div class="col-md-7">
                <div class="relative text-left">
                <?php if(!empty($sustainability_title)){ ?>
                    <h2 class="mt-1 mb-3 font-weight-bolder relative text-white">
                      <?php echo $sustainability_title ;?>
                    </h2>
					<?php }?>
                    
                </div>
                <div class="captions">
                 <?php if(!empty($sustainability_content)){ ?>
                    <div class="text-white">  <?php echo $sustainability_content ;?></div>
                    <?php }?>
                </div>
            </div>
            <div class="col-md-5 aos-init" data-aos="fade-left">
             <?php if(!empty($sustainability_right_image)){ ?>
                <img src="  <?php echo $sustainability_right_image ;?>" class="img-responsive" alt="">
                <?php }?>
            </div>
        </div>
    </div>
</section>
<!-- / -->


<?php if(!empty($certifications_list)){?>
<section class="brochures p-5">
    <div class="container">
        <div class="relative text-center"  data-aos="zoom-in">
        <?php if(!empty($certifications_heading)){?>
            <h2 class="mt-1 mb-3 center font-weight-bolder relative">
                <?php echo $certifications_heading;?>
            </h2>
            <h6 class="w-100"> <?php echo $certifications_heading;?></h6>
            <?php }?>
            <div class="text-center">
                <?php if(!empty($certifications_subheading)){?>
                 <h5 class="font-weight-bolder mb-3 text-white"> <?php echo $certifications_subheading;?></h5>
                 <?php }?>
                  <?php if(!empty($certifications_content)){?>
                <p class="text-white2"> <?php echo $certifications_content;?></p>
                <?php }?>
            </div>        
        </div>

        <div class="row">
            <div class="col-md-12"  data-aos="fade-up">
                <div class="owl-carousel owl-theme brochures">
                <?php 
				$c=1;
				foreach($certifications_list as $certifications_list_val){?>
                    <div class="item">
                        <div class="box14">
                           <?php if(!empty($certifications_list_val['certifications_image'])){?>
                            <img src="<?php echo $certifications_list_val['certifications_image'];?>" alt="">
                            <?php }?>
                            <div class="box-content">
                                <div class="contnentContainer text-center">
                                 <?php if(!empty($certifications_list_val['certifications_title'])){?>
                                    <h3 class="title-content"><?php echo $certifications_list_val['certifications_title'];?></h3>
                                    <?php }?>
                                    <span class="post-content">
                                     <?php if(!empty($certifications_list_val['certifications_content'])){ echo $certifications_list_val['certifications_content'];?>
                                 
                                    <?php }?>
                                    
                                    </span>
                                </div>
                                 <?php if(!empty($certifications_list_val['certifications_title'])){?>
                                    <h5 class="title font-weight-bolder"><a href="#"><?php echo $certifications_list_val['certifications_title'];?></a></h5>
                                    <?php }?>
                            </div>
                        </div>
                        <div class="download text-center">
                            <a href="#" class="download black-button w-100" data-toggle="modal" data-target="#downloadform<?php echo $c;?>">
                              <?php if(!empty($certifications_list_val['certifications_download_text'])){ echo $certifications_list_val['certifications_download_text']; } else{ _e( 'Download', 'nolte' );}?></a>
                        </div>
                    </div>
                    <?php  $c++;
					}?>
                    
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- /awards -->
<?php }?>
<?php if(!empty($download_section_list)){?>
<section class="join-login noborder relative black-bg pb-5">
    <div class="container-fluid p-0">
    <?php if(!empty($download_section_banner)){?>
        <div class="m-auto">
            <img src="<?php echo $download_section_banner;?>" width="100%" alt="">
        </div>
        <?php }?>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10 join" data-aos="fade-up">
                <div class="row whitebg justify-content-center align-items-center">
<?php
$d=1;

 foreach($download_section_list as $download_section_list_val){?>
                    <div class="col-md-6">
                        <div class="media why whitebg p-4">
                         <?php if(!empty($download_section_list_val['download_icon'])){?>
                            <img class="align-self-center mr-3" src="<?php echo $download_section_list_val['download_icon'];?>" alt="installation">
                            <?php }?>
                            <div class="media-body">
                                <h5 class="mt-1 mb-0 font-weight-bolder relative">
                                  <?php if(!empty($download_section_list_val['download_title'])){ echo $download_section_list_val['download_title'];}?>   
                                </h5>
                                <p class="mb-4 m-auto"><a href="#"  data-toggle="modal" data-target="#downloadformm<?php echo $d;?>"><u>  <?php if(!empty($download_section_list_val['download_link_text'])){ echo $download_section_list_val['download_link_text']; } else{ _e( 'Download', 'nolte' );}?></u></a></p>
                                
                            </div>
                        </div>
                    </div>
                    <?php  $d++;}?>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- / -->

<?php }?>
<?php if(!empty($right_partner_list)){?>

<section class="partners p-5" style="background: black url(<?php if(!empty($right_partner_banner_image)){ echo $right_partner_banner_image; }?>);">
    <div class="container pb5">
        <div class="relative text-center" data-aos="zoom-in">
        <?php if(!empty($right_partner_heading)){?>
            <h3 class="mt-1 mb-3 center font-weight-bolder relative text-white">
               <?php echo $right_partner_heading;?>
            </h3>
            <h6 class="w-100"> <?php echo $right_partner_heading;?></h6>
            <?php }?>
            <div class="row mt-5">
            <?php
			$p=1;
			 foreach($right_partner_list as $right_partner_list_val){?>
                <div class="col-md-3">
                    <div class="numb"><span><?php echo $p;?></span></div>
                    <div class="title">
                        <h4 class="text-white font-weight-bolder"> <?php if(!empty($right_partner_list_val['right_partner_title'])){ echo $right_partner_list_val['right_partner_title'];}?></h4>
                    </div>
                    <div class="desciption text-white">
                        <?php if(!empty($right_partner_list_val['right_partner_content'])){ echo $right_partner_list_val['right_partner_content'];}?>
                    </div>
                </div>
                <?php $p++;}?>
                
                
                
            </div>        
        </div>

</section>
<?php }?>
<?php if(!empty($request_a_meeting_form_code)){?>
<section class="allproject-form">
    <div class="container">
        <div class="formContainer whitebg p-5 shadow">
            <h4 class="font-weight-bolder mb-4"> <?php if(!empty($request_a_meeting_form_title)){ echo $request_a_meeting_form_title;}?></h4>
              <?php echo apply_filters("the_content",$request_a_meeting_form_code); ?>
        </div>
    </div>
</section>
<!-- / -->
<?php }?>
<?php if(!empty($positioning_in_the_market_chart_brands)){?>
<section class="market">
    <div class="container">
        <div class="relative text-center"  data-aos="zoom-in">
         <?php if(!empty($positioning_in_the_market_section_title)){?>
            <h2 class="mt-1 mb-3 center font-weight-bolder relative">
               <?php echo $positioning_in_the_market_section_title;?>
            </h2>
            <h6 class="w-100"> <?php echo $positioning_in_the_market_section_title;?></h6>
            <?php }?>
            <div class="text-center">
                <p>  <?php if(!empty($positioning_in_the_market_content)){ echo $positioning_in_the_market_content;}?></p>
            </div>        
        </div>
        <div class="chart mt-5 mb-5">
            <div class="row">
            <div class="col-md-1 rotate align-items-center"><p> <?php if(!empty($positioning_in_the_market_chart_x_axis)){ echo $positioning_in_the_market_chart_x_axis;}?></p></div>
            <div class="product-range col-md-11" style="height: 370px;">
                    <div class="d-flex h-100 justify-content-center align-items-end"> 
                    <?php foreach($positioning_in_the_market_chart_brands as $positioning_in_the_market_chart_brands_val){?>
                        <div class="product text-center" style="height:  <?php if(!empty($positioning_in_the_market_chart_brands_val['chart_brands_position'])){ echo $positioning_in_the_market_chart_brands_val['chart_brands_position'];}?>;width: 25%;"><?php if(!empty($positioning_in_the_market_chart_brands_val['chart_brand_image'])){ ?><img src="<?php echo $positioning_in_the_market_chart_brands_val['chart_brand_image'];?>" alt=""   data-aos="zoom-in" data-aos-easing="ease" data-aos-delay="200"  data-toggle="tooltip" data-placement="top" title=""> <?php }?></div>
                        <?php }?>
                    
                    </div>
                    <div class="text text-center"><p> <?php if(!empty($positioning_in_the_market_y_axix)){ echo $positioning_in_the_market_y_axix;}?></p></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / -->
<?php }?>
<?php if(!empty($all_projects_list)){?>
<section class="projectTable graybg mt-5 p-5" id="projectTable">
    <div class="container">
        <div class="relative mb-4 text-center">
          <?php if(!empty($all_projects_heading)){?>
        
            <h3 class="mt-1 font-weight-bolder relative">
               <?php echo $all_projects_heading;?>
            </h3>
            <h6 class="w-100">  <?php echo $all_projects_heading;?></h6>
            <?php }?>
            <div class="text-center mt-5">
                <p><?php if(!empty($all_projects_section_content)){ echo $all_projects_section_content;}?></p>
            </div>        
 <?php if(!empty($download_our_projects_link)){?>
  <div class="pull-right mt-3">
  
 
     <a href="javascript:void(0);"  data-toggle="modal" data-target="#download_our_projects-enquire">
     <?php  echo $download_our_projects_link['title'];?>
     </a>
     
     
 
   
  <!--<a href="<?php //if(!empty($download_project_file)){ echo $download_project_file;} else{ echo $download_our_projects_link['url'];}?>"><?php  //echo $download_our_projects_link['title'];?></a>-->
  </div>
  
  
  
 <?php }?>

  <div class="float-right mt-3 mb-3">
<form  name="pgform" id="pgform" method="get" action="<?php echo get_the_permalink();?>#projectTable">
<select name="projectlimit" onchange="pgformsubmit();">
   <option <?php if(isset($_REQUEST['projectlimit']) && $_REQUEST['projectlimit']==$total){ echo "selected"; }?> value="<?php  echo $total;?>"> <?php _e( 'View All', 'nolte' ); ?></option>
   <option <?php if(isset($_REQUEST['projectlimit']) && $_REQUEST['projectlimit']==50){ echo "selected"; }?> value="50">50</option>
   <option <?php if(isset($_REQUEST['projectlimit']) && $_REQUEST['projectlimit']==100){ echo "selected"; }?> value="100">100</option>
   </select>
     </form>  
     </div>
        </div>

        <div class="table">
            <table class="table table-striped whitebg">
                <thead class="black-bg text-white">
                  <tr>
                    <th scope="col"><?php _e( 'Project', 'nolte' );?></th>
                    <th scope="col"><?php _e( 'Country', 'nolte' );?></th>
                    <th scope="col"><?php _e( 'Brand', 'nolte' );?></th>
                    <th scope="col"><?php _e( 'No. of Units', 'nolte' );?></th>
                  </tr>
                </thead>
                <tbody>
                <?php
				$page = ! empty( $_GET['pg'] ) ? (int) $_GET['pg'] : 1;
$total = count( $all_projects_list ); //total items in array  
if(isset($_REQUEST['projectlimit']) && $_REQUEST['projectlimit']!=''){ 
$limit = $_REQUEST['projectlimit']; //per page 
}
else{
	$limit = $total; //per page 
}
$totalPages = ceil( $total/ $limit ); //calculate total pages
$page = max($page, 1); //get 1 page when $_GET['page'] <= 0
$page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
$offset = ($page - 1) * $limit;
if( $offset < 0 ) $offset = 0;

$all_projects_list = array_slice( $all_projects_list, $offset, $limit );
				
				
				 foreach($all_projects_list as $all_projects_list_val){
					$number_of_units = get_field('number_of_units',$all_projects_list_val->ID);
	              $project_country = get_field('project_country',$all_projects_list_val->ID);
				  $brandterm = get_the_terms($all_projects_list_val->ID,'brand');
					?>
                  <tr>
                    <th scope="row"><?php echo $all_projects_list_val->post_title;?></th>
                    <td><?php if(!empty($project_country)){ echo $project_country;}?></td>
                     <td><?php if(!empty($brandterm)){ echo $brandterm[0]->name;}?></td>
                     <td><?php if(!empty($number_of_units)){ echo $number_of_units;}?></td>
                  </tr>
                  <?php }?>
                 
                </tbody>
              </table>
              
        </div>
        <div class="row" style="display:none">
       <?php
	    $link = get_the_permalink().'?pg=%d#projectTable';
		
		?>
        <div class="project_pagination col-md-12">
         <?php
		
		 if( $page == 1 ) 
  { 
   ?>
   <div class="col-md-6">&nbsp;</div>
   <?php
  }
  else 
  { 
  ?>
  <div class="col-md-6"><a href="<?php echo get_the_permalink();?>?pg=<?php echo $page - 1;?>#projectTable"> &#171; Prev </a></div>
  <?php
  
  }  
  ?>
        <?php
		
		 if( $page == $totalPages ) 
  { 
   ?>
   <div class="col-md-6">&nbsp;</div>
   <?php
  }
  else 
  { 
  ?>
  <div class="col-md-6"><a href="<?php echo get_the_permalink();?>?pg=<?php echo $page + 1;?>#projectTable"> Next  &#187; </a></div>
  <?php
  
  }  
  ?>
  </ul>
  <?php
$pagerContainer = '<div class="selectedRows">';   
if( $totalPages != 0 ) 
{
  if( $page == 1 ) 
  { 
    $pagerContainer .= '';
  } 
  else 
  { 
    $pagerContainer .= sprintf( '<a href="' . $link . '"> &#171; Prev </a>', $page - 1 ); 
  }
  
 // $pagerContainer .= ' <span> page <strong>' . $page . '</strong> from ' . $totalPages . '</span>'; 
  if( $page == $totalPages ) 
  { 
    $pagerContainer .= ''; 
  }
  else 
  { 
    $pagerContainer .= sprintf( '<a href="' . $link . '"> Next  &#187; </a>', $page + 1 ); 
  }           
}                   
$pagerContainer .= '</div>';


//echo $pagerContainer;
?></div>
<div class="selectedRows">
<form  name="pgform" id="pgform" method="get" action="<?php echo get_the_permalink();?>#projectTable">
<select name="projectlimit" onchange="pgformsubmit();">
   <option <?php if(isset($_REQUEST['projectlimit']) && $_REQUEST['projectlimit']==$total){ echo "selected"; }?> value="<?php  echo $total;?>">View All</option>
   <option <?php if(isset($_REQUEST['projectlimit']) && $_REQUEST['projectlimit']==50){ echo "selected"; }?> value="50">50</option>
   <option <?php if(isset($_REQUEST['projectlimit']) && $_REQUEST['projectlimit']==100){ echo "selected"; }?> value="100">100</option>
   </select>
     </form>   
  </div>      
    </div>

</section>
<?php }?>
 <?php 
 if(!empty($certifications_list)){
				$k=1;
				foreach($certifications_list as $certifications_list_val){?>
<div class="modal fade bd-example-modal-lg" id="downloadform<?php echo $k;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered opacity-animate3">
      <div class="modal-content">
       
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-body">
           <div class="form">
            <div class="formContainer p-5">
                <h3 class="font-weight-bolder"><?php if(!empty($certifications_list_val['certifications_title'])){ echo $certifications_list_val['certifications_title']; }?></h3>
                <p><?php if(!empty($certifications_list_val['certifications_content'])){ echo $certifications_list_val['certifications_content']; }?></p>
 
                <div action="" class="mt-3">
                  <?php if(!empty($certifications_list_val['certifications_download_form_code'])){ echo apply_filters("the_content",$certifications_list_val['certifications_download_form_code']); }?>
                </div>
            </div>
        </div>
          
        </div>
        
      </div>
    </div>
  </div>
  <?php $k++; }
 }?>
 
 <?php 
 if(!empty($download_section_list)){
				$k2=1;
	 foreach($download_section_list as $download_section_list_val){?>
<div class="modal fade bd-example-modal-lg" id="downloadformm<?php echo $k2;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered opacity-animate3">
      <div class="modal-content">
       
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-body">
           <div class="form">
            <div class="formContainer p-5">
                <h3 class="font-weight-bolder"><?php if(!empty($download_section_list_val['download_title'])){ echo $download_section_list_val['download_title']; }?></h3>
               
 
                <div action="" class="mt-3">
                  <?php if(!empty($download_section_list_val['download_form_code'])){ echo apply_filters("the_content",$download_section_list_val['download_form_code']); }?>
                </div>
            </div>
        </div>
          
        </div>
        
      </div>
    </div>
  </div>
  <?php $k2++; }
 }?>
 
 
 
  <?php if(!empty($download_our_projects_form_code)){?>
  
  <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="download_our_projects-enquire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered opacity-animate3">
      <div class="modal-content">
       
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-body">
           <div class="form">
            <div class="formContainer p-5">
               <h3 class="font-weight-bolder">  <?php  echo $download_our_projects_link['title'];?></h3>
                     
 
                  <?php if(!empty($download_our_projects_form_code)){ echo apply_filters("the_content",$download_our_projects_form_code); }?>
                  
                
            </div>
        </div>
          
        </div>
        
      </div>
    </div>
  </div>
  <?php }?>
<?php get_footer(); ?>
<script>
function pgformsubmit(){
	$("#pgform").submit();
}
</script>