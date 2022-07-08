<?php
/**
 * Template Name: Projects page Template
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
	 
	 $completed_projects_count          = get_field('completed_projects_count');
	 $completed_projects_suffix = get_field('completed_projects_suffix');
	 $completed_projects_text = get_field('completed_projects_text');
	 
	 $countries_count          = get_field('countries_count');
	 $countries_suffix = get_field('countries_suffix');
	 $countries_text = get_field('countries_text');
	 
	 
	 $showrooms_count          = get_field('showrooms_count');
	 $showrooms_suffix = get_field('showrooms_suffix');
	 $showrooms_text = get_field('showrooms_text');
	 
	 $happy_customers_count          = get_field('happy_customers_count');
	 $happy_customers_suffix = get_field('happy_customers_suffix');
	 $happy_customers_text = get_field('happy_customers_text');
	
	 
	   
	   
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
                  <li class="breadcrumb-item"><a href="<?php echo site_url();?>" class="text-white  font-weight-bold"><?php _e( 'Home', 'nolte' ); ?>   </a></li>
                  <li class="breadcrumb-item text-yellow font-weight-bold active" aria-current="page"><?php echo get_the_title();?></li>
                </ol>
            </nav>
        </div>
    </div>
    </div>
</section>
<!-- /banner -->
<!-- /banner -->

<section class="whoweare whitebg p-5">

    <div class="relative text-center" data-aos="zoom-in">
        <h2 class="mt-1 mb-3 center font-weight-bolder relative" data-aos="zoom-in">
         <?php if(!empty( $introduction_title)){ echo $introduction_title;}?>  
        </h2>
        <h6 class="w-100">  <?php if(!empty( $introduction_title_background)){ echo $introduction_title_background;}?></h6>
    </div>
    <div class="container">
        <div class="text-center mb-5">
            <?php if(!empty( $introduction_content)){ echo $introduction_content;}?>
        </div>
    


       <div class="statistics mb-5">
            <div class="row justify-content-center">
              <?php if(!empty($completed_projects_count)){ ?>
                <div class="col-md-3">
                    <div class="gray-bg h-100 p-4 border-bottom-yellow text-center">
                        <h3 class="font-weight-bloder"><span class="counter" data-count="<?php echo $completed_projects_count;?>"></span><span> <?php if(!empty( $completed_projects_suffix)){ echo $completed_projects_suffix;}?> </span></h3>
                        <h5 class="font-weight-bold cap"> <?php if(!empty( $completed_projects_text)){ echo $completed_projects_text;}?>  </h5>
                    </div>
                </div>
                <?php }?>
                 <?php if(!empty($countries_count)){ ?>
                <div class="col-md-3">
                    <div class="gray-bg h-100 p-4 border-bottom-yellow text-center">
                        <h3 class="font-weight-bloder"><span class="counter" data-count="<?php echo $countries_count;?>"></span><span> <?php if(!empty( $countries_suffix)){ echo $countries_suffix;}?> </span></h3>
                        <h5 class="font-weight-bold cap"> <?php if(!empty( $countries_text)){ echo $countries_text;}?>  </h5>
                    </div>
                </div>
                <?php }?>
                <?php if(!empty($showrooms_count)){ ?>
                <div class="col-md-3">
                    <div class="gray-bg h-100 p-4 border-bottom-yellow text-center">
                        <h3 class="font-weight-bloder"><span class="counter" data-count="<?php echo $showrooms_count;?>"></span><span> <?php if(!empty( $showrooms_suffix)){ echo $showrooms_suffix;}?> </span></h3>
                        <h5 class="font-weight-bold cap"> <?php if(!empty( $showrooms_text)){ echo $showrooms_text;}?>  </h5>
                    </div>
                </div>
                <?php }?>
                <?php if(!empty($happy_customers_count)){ ?>
                <div class="col-md-3">
                    <div class="gray-bg h-100 p-4 border-bottom-yellow text-center">
                        <h3 class="font-weight-bloder"><span class="counter" data-count="<?php echo $happy_customers_count;?>"></span><span> <?php if(!empty( $happy_customers_suffix)){ echo $happy_customers_suffix;}?> </span></h3>
                        <h5 class="font-weight-bold cap"> <?php if(!empty( $happy_customers_text)){ echo $happy_customers_text;}?>  </h5>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>

</section>
<?php
$project_country = get_meta_values( 'project_country', 'project' );
$project_countries = array_unique($project_country);

$project_city =array();
//$project_city = get_meta_values( 'project_city', 'project' );
$project_city = get_meta_values_child( $_REQUEST['project_country'],'project_country','project_city', 'project' ) ;
$project_cites = array_unique($project_city);
/*echo "<pre>";
print_r($project_countries);
echo "</pre>";*/


	$cat_args = array(
    'orderby'       => 'term_id', 
	'parent'       => 0,
    'order'         => 'ASC',
    'hide_empty'    => true, 
);

$brand = get_terms('brand', $cat_args);
 ?>


<section class="allproject-form m-0">
    <div class="container">
        <div class="formContainer m-0 border-0 whitebg p-5 shadow">
            <h4 class="font-weight-bolder mb-4"><?php _e( 'Filter Projects', 'nolte' ); ?></h4>
             <form action="<?php echo get_the_permalink();?>" class="row ml-auto" method="get" name="cform" id="cform">
                   <input type="hidden" name="lang" id="lang" value="<?php echo ICL_LANGUAGE_CODE ;?>"/>
                 <div class="row w-100">
                 <?php if(!empty($project_countries)){?>
                        <div class="form-group col-md-6">
                        
                            <label for="Countries"><?php _e( 'Countries', 'nolte' ); ?></label>
                            <select name="project_country" id="project_country" class="form-control select2" id="exampleFormControl" onchange="javascript:cformsubmit();">
                                <option value=""><?php _e( 'Select Country', 'nolte' ); ?></option>
                                <?php foreach($project_countries as $project_countries_val){?>
                                <option value="<?php echo $project_countries_val;?>"><?php echo $project_countries_val;?></option>
                                <?php }?>
                               
                            </select>
                        </div>
                        <?php }?>
                           <?php if(!empty($project_cites)){?>
                        <div class="form-group col-md-3" id="cityselect">
                            <label for="Cities"><?php _e( 'Cities', 'nolte' ); ?></label>
                                        <select name="project_city" id="project_city" class="form-control select2" id="exampleFormControl2" onchange="javascript:cformsubmit();">
                                            <option value=""><?php _e( 'Select City', 'nolte' ); ?></option>
                                               <?php foreach($project_cites as $project_cites_val){?>
                                            <option value="<?php echo $project_cites_val;?>"><?php echo $project_cites_val;?></option>
                                            <?php }?>
                                          
                                        </select>
                       </div>
                       <?php }?>
                       <div class="form-group col-md-3">
                           <label for="Products"><?php _e( 'Brands', 'nolte' ); ?></label>
                            <?php if(!empty($brand)){?>
                               <select name="brandp" id="brandp" class="form-control select2" onchange="javascript:cformsubmit();" >
                                              <option value="" ><?php _e( 'Select Brand', 'nolte' ); ?></option>
                                            <?php foreach($brand as $brand_val){?>
                                                <option value="<?php echo $brand_val->slug;?>" <?php if(isset($_REQUEST['brand']) && $_REQUEST['brand']==$brand_val->slug){ echo "selected";  }?>><?php echo $brand_val->name;?></option>
                                                <?php }?>
                                            </select> 
                             <?php }?>
                                       
                        </div>
                </div>

            </form>
        </div>
    </div>
</section>
<!-- / -->
<section class="filtersection">
    <div class="container" id="filtersection">
     
    </div>
</section>
<!-- / -->
  <?php
 
 wp_reset_query();
 
   $pagedp = ( get_query_var( 'pagedp' ) ) ? get_query_var( 'pagedp' ) : 1;
   
   	$argsp2 = array(
	'post_type' => 'project', 
    'post_status' => 'publish',
    'hide_empty' => true, 
	'posts_per_page' => 15,
	 'paged' => $pagedp, 
    'orderby' => 'date',
    'order' => 'DESC' ,
	 
          );
   if(isset($_REQUEST['brandp']) && $_REQUEST['brandp']!=''){
				  	$argsp2 = array(
	'post_type' => 'project', 
    'hide_empty' => true, 
    'post_status' => 'publish',
	'posts_per_page' => 15,
	 'paged' => $pagedp, 
    'orderby' => 'date',
    'order' => 'DESC' ,
	 'tax_query' => array(
	 
				 array(
                     'taxonomy' => 'brand',
                     'field' => 'slug',
                     'terms' => $_REQUEST['brandp']
                )
           ));
   }
   if(isset($_REQUEST['project_city']) && $_REQUEST['project_city']!=''){
				  	$argsp2 = array(
	'post_type' => 'project', 
    'post_status' => 'publish',
    'hide_empty' => true, 
	'posts_per_page' => 15,
	 'paged' => $pagedp, 
    'orderby' => 'date',
    'order' => 'DESC' ,
	 'meta_query' => array(
	 
				 array(
                     'key' => 'project_city',
                     'value' => $_REQUEST['project_city'],
                     'compare' => '='
                )
           ));
   }
   
    if(isset($_REQUEST['project_country']) && $_REQUEST['project_country']!=''){
				  	$argsp2 = array(
	'post_type' => 'project', 
    'post_status' => 'publish',
    'hide_empty' => true, 
	'posts_per_page' => 15,
	 'paged' => $pagedp, 
    'orderby' => 'date',
    'order' => 'DESC' ,
	 'meta_query' => array(
	 
				 array(
                     'key' => 'project_country',
                     'value' => $_REQUEST['project_country'],
                     'compare' => '='
                )
           ));
   }
   
     if((isset($_REQUEST['brandp']) && $_REQUEST['brandp']!='') && (isset($_REQUEST['project_city']) && $_REQUEST['project_city']!='')){
				  	$argsp2 = array(
	'post_type' => 'project', 
    'post_status' => 'publish',
    'hide_empty' => true, 
	'posts_per_page' => 15,
	 'paged' => $pagedp, 
    'orderby' => 'date',
    'order' => 'DESC' ,
	'meta_query' => array(
	 
				 array(
                     'key' => 'project_city',
                     'value' => $_REQUEST['project_city'],
                     'compare' => '='
                )
           ),
	 'tax_query' => array(
	 
				 array(
                     'taxonomy' => 'brand',
                     'field' => 'slug',
                     'terms' => $_REQUEST['brandp']
                )
           ));
   }
   
    if((isset($_REQUEST['brandp']) && $_REQUEST['brandp']!='') && (isset($_REQUEST['project_country']) && $_REQUEST['project_country']!='')){
				  	$argsp2 = array(
	'post_type' => 'project', 
    'post_status' => 'publish',
    'hide_empty' => true, 
	'posts_per_page' => 15,
	 'paged' => $pagedp, 
    'orderby' => 'date',
    'order' => 'DESC' ,
	'meta_query' => array(
	 
				 array(
                     'key' => 'project_country',
                     'value' => $_REQUEST['project_country'],
                     'compare' => '='
                )
           ),
	 'tax_query' => array(
	 
				 array(
                     'taxonomy' => 'brand',
                     'field' => 'slug',
                     'terms' => $_REQUEST['brandp']
                )
           ));
   }
   
    if((isset($_REQUEST['project_city']) && $_REQUEST['project_city']!='') && (isset($_REQUEST['project_country']) && $_REQUEST['project_country']!='')){
				  	$argsp2 = array(
	'post_type' => 'project', 
    'post_status' => 'publish',
    'hide_empty' => true, 
	'posts_per_page' => 15,
	 'paged' => $pagedp, 
    'orderby' => 'date',
    'order' => 'DESC' ,
	'meta_query' => array(
	   'relation' => 'AND',
				 array(
                     'key' => 'project_country',
                     'value' => $_REQUEST['project_country'],
                     'compare' => '='
                ),
				 array(
                     'key' => 'project_city',
                     'value' => $_REQUEST['project_city'],
                     'compare' => '='
                )
           ),
);
   }
   
    if((isset($_REQUEST['project_city']) && $_REQUEST['project_city']!='') && (isset($_REQUEST['project_country']) && $_REQUEST['project_country']!='') && (isset($_REQUEST['brandp']) && $_REQUEST['brandp']!='')){
				  	$argsp2 = array(
	'post_type' => 'project', 
    'post_status' => 'publish',
    'hide_empty' => true, 
	'posts_per_page' => 15,
	 'paged' => $pagedp, 
    'orderby' => 'date',
    'order' => 'DESC' ,
	'meta_query' => array(
	   'relation' => 'AND',
				 array(
                     'key' => 'project_country',
                     'value' => $_REQUEST['project_country'],
                     'compare' => '='
                ),
				 array(
                     'key' => 'project_city',
                     'value' => $_REQUEST['project_city'],
                     'compare' => '='
                )
           ),
		    'tax_query' => array(
	 
				 array(
                     'taxonomy' => 'brand',
                     'field' => 'slug',
                     'terms' => $_REQUEST['brandp']
                )
           )
);
   }
  
   $project_group_query = new WP_Query( $argsp2); 
   
   $k=1;
if($project_group_query){ 
  ?>
<section class="products mt-5 ourproducts">
    <div class="container">
        <div class="row" id="productlist">
           <?php   while ( $project_group_query->have_posts() ) : $project_group_query->the_post();
   	$product_img2 = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()),'full');
	$number_of_units = get_field('number_of_units',get_the_ID());
	
	
	?>
            <div class="col-md-4 mb-4 aos-init aos-animate" data-aos="zoom-in">
                    <div class="image box14">
                    
                    <?php if(!empty($product_img2)){?>
                    <a href="<?php echo get_the_permalink(get_the_ID());?>">
                    <img src="<?php echo $product_img2;?>" alt="">
                    </a>  <?php } else{?>
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/noimage.png" alt="">
                  <?php }?>
                    <div class="box-content"></div>
<a href="<?php echo get_the_permalink(get_the_ID());?>" class="product-link"></a>

                  
                    </div>
                    <div class="caption mt-3">
                        <h4> <a href="<?php echo get_the_permalink(get_the_ID());?>"><?php echo get_the_title();?></a></h4>
                       <?php if(!empty($number_of_units)){?> <p>Number of units : <?php echo $number_of_units;?></p> <?php }?>
                    </div>
            </div>
            <?php endwhile;?>
            
            

            
            
            
            <div class="pagination p-5  text-center project-pagi">
        <nav aria-label="Page navigation" class="m-auto">
           <?php 
		  
		   if($project_group_query->max_num_pages>1){?>
        <ul class="pagination">
                          <?php for($pp=1; $pp <= $project_group_query->max_num_pages; $pp++){?>
                          <?php  if(isset($_REQUEST['pagedp']) && $_REQUEST['pagedp']!=''){?>
                                <li class="page-item <?php if( $pagedp==$pp) echo "active";?>"><a class="page-link" href="javascript:void(0);" 
                                onclick="javascript:get_datap('<?php echo $pp; ?>' );"><?php echo $pp;?></a></li>
                                <?php }else {?>
                                 <li class="page-item <?php if( $pagedp==$pp) echo "active";?>"><a class="page-link  <?php if( $pagedp==$pp) echo "active";?>" href="javascript:void(0);" 
                                onclick="javascript:get_datap('<?php echo $pp; ?>');"><?php echo $pp;?></a></li>
                                <?php }?>
                                <?php }?>
                                
                              </ul>
                              <?php }?>
          </nav>
    </div>
            
            
            
            
        </div>
    </div>
</section>
<?php }
 wp_reset_query();
?>
<?php get_footer(); ?>
<script>
function clearbrand(){
	
	
	  $('#brandp').prop('selectedIndex',0).change(); 
}
function clearcountry(){
	
	
	  $('#project_country').prop('selectedIndex',0).change(); 
}
function clearcity(){
	
	// $('select[name="project_city"]').find('option[value=""]').attr("selected",true).change(); 
	 $('#project_city').prop('selectedIndex',0).change(); 
}
function cformsubmit(){
 
   // avoid to execute the actual submit of the form.

    var form = $("#cform");
	 
  //  var url = form.attr('action');
  
    $.ajax({
           type: "GET",
           url: "<?php echo site_url();?>/get_projects_all.php",
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
			 $("#productlist").html(data);
			  $("#filtersection").html( $("#filtersectionc").html());
			  	  $("#cityselect").html( $("#cityselectn").html());
			 
              //alert(data); // show response from the php script.
           }
         });

    return false;
}

function get_datap(p)
{
	
	
	
   // avoid to execute the actual submit of the form.
 var brandp = $('#brandp').val();
  var project_city = $('#project_city').val();
  var project_country = $('#project_country').val();
 var lang = $('#lang').val();
    $.ajax({
           type: "GET",
           url: '<?php echo site_url();?>/get_projects_all.php?pagep='+p+'&brandp='+brandp +'&project_city='+project_city+'&project_country='+project_country+'&lang='+lang,
		 
           success: function(data)
           {
			  $("#productlist").html(data);
			  $("#filtersection").html( $("#filtersectionc").html());
              //alert(data); // show response from the php script.
           }
         });
	 
    return false;
	 
}
</script>
