<?php
/**
 * Template Name: Search Page
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Infomenio 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */

#$Infomenio_unique_id = Infomenio_unique_id( 'search-form-' );

#$Infomenio_aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>

<?php get_header(); ?>
<?php
global $post;
?>
<main class="main">
<section class="innerbanner" id="inner">
	<div class="banner-other" style="background-image: url(/wp-content/uploads/2021/03/bg18.png)">
        <h1>Search Results for: </h1>
        <div class="links-page">
            <?php _e("<h2 style='font-weight:bold;color:#fff'>".get_query_var('s')."</h2>"); ?>
        </div>
    </div>
</section>
<div class="blog-section blog-page" id="blog-section">
                <div class="container" >
                    <div class="filter row">
                         	<div class="col-md-4"></div>
                            <div class="col-md-4">
                            	<form role="search" <?php echo $Infomenio_aria_label; ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            		<div class="input-group">
										<input type="search" id="<?php echo esc_attr( $Infomenio_unique_id ); ?>" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'Infomenio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
										<input type="submit" class="search-submit btn btn-secondary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'Infomenio' ); ?>" />
									</div>
								</form>
                                
                            </div>
                            <div class="col-md-4"></div>
                            <div class="row mt-4 mb-4"><?php _e("<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>"); ?></div>
                    </div><!-- </div>  -->
                    <div id="bloglist">
                    	<div class="row">
                    		<?php
								$s=get_search_query();
								$args = ['s' => $s ];
								$the_query = new WP_Query( $args );
								if ( $the_query->have_posts() ) {
							        while ( $the_query->have_posts() ) {
							           $the_query->the_post();
							           $search_result_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()),'full');
										$content= get_post_field('post_excerpt',get_the_ID());
							            ?>
							            <div class="col-md-4 col-12">
			                                <div class="card-content">
			                                	<?php if(!empty($search_result_image)){?>
			                                    <div class="img-content">
			                                    	<a href="<?php echo get_permalink(get_the_ID());?>">
			                                        	<img src="<?php echo $search_result_image;?>" alt="<?php echo 	get_the_title();?>">
			                                    	</a>
			                                    </div>
			                                    <?php }?>
			                                    <a href="<?php echo get_permalink(get_the_ID());?>">
			                                    	<?php echo get_the_title();?>
			                                    </a>
			                                </div>
                        				</div>
								<?php
							        }
							    }else{
								?>
						        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
						        <div class="alert alert-info">
						          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
						        </div>
							<?php } ?>
                    	</div>
                    </div><!-- / bloglist -->
                </div>
            </div>
</main>
<?php get_footer(); ?>