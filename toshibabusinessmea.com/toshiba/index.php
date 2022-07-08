<?php
/**
 * The main template file 
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage TOSHIBA
 * @since Toshiba 1.0
 */
get_header();
if( class_exists( 'acf')){
    $post_show_tag      = get_field('toshiba_blog_lat_pop');
}
?>
<div class="blog_tabbing_section">
    <div class="blog_tabbing_wrap">
        <ul class="tabs">
            <li class="active" rel="tab1"><?php _e('All','tosiba'); ?></li>
<!--             <li rel="tab2"><?php _e('Blogs','tosiba'); ?></li> -->
            <li rel="tab3"><?php _e('News','tosiba'); ?></li>
			<li rel="tab4"><?php _e('Events','tosiba'); ?></li>
        </ul>
        <div class="tab_container">
            <h3 class="d_active tab_drawer_heading" rel="tab1"><?php _e('All Blogs','tosiba'); ?></h3>
            <div id="tab1" class="tab_content">
                <h2><?php _e('All Blogs','tosiba'); ?></h2>
                <div class="blog-medai">
                     <?php
                        $args  = array (
                            'post_type'    => ['post', 'event'],
                            'post_status'  => 'publish',
                            'order'        => 'ASC',
							'posts_per_page' => -1,
                        );
                        $query = new WP_Query( $args );
// 					echo "<pre>";
// 					print_r($query);
// 					echo "</pre>";
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                $post_title         = get_the_title( $id );
                                $post_image         = get_the_post_thumbnail_url( $id );
                                $post_content       = get_the_content( $id );
                                $post_date          = get_the_date( 'F Y', $id );
                                $post_author        = get_the_author( $id );
                                $post_link          = get_permalink( $id );
								$external_url       = get_field('external_url', $id);
                                if( class_exists( 'acf')){
                                    $post_show_tag      = get_field('toshiba_blog_lat_pop');
									if('event' == get_post_type() ) {
                                    	$post_show_title    = $post_show_tag == '1' ? __('Events','tosiba') : __('Events','tosiba') ;
									} else {
// 										$post_show_title    = $post_show_tag == '1' ? __('Popular','tosiba') : __('Latest','tosiba') ;
									$post_show_title    = $post_show_tag == '1' ? __('News','tosiba') : __('News','tosiba') ;
									}
                                }
                                
                             ?>
                             <div class="media_center_in">
                            <div class="inner">
                                <?php if ( !empty ( $post_image ) ) { ?>
                                    <div class="image">
                                        <a href="<?php if($external_url){ echo $external_url; }else{echo $post_link; } ?>" tabindex="0">
                                            <img src="<?php echo $post_image; ?>" alt="<?= $post_title ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="content">
                                    <?php if ( !empty ( $post_show_title ) ) { ?>
                                        <div class="media">
                                            <strong><?php echo $post_show_title; ?></strong>
                                        </div>
                                    <?php } ?>
                                    <div class="date">
                                        <ul>
                                            <?php if ( !empty ( $post_date ) ) { ?>
                                                <li><?php echo $post_date; ?></li>
                                            <?php } ?>
                                            <?php if ( !empty ( $post_author ) ) { ?>
                                                <li><?php echo $post_author; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <?php if ( !empty ( $post_title ) ) { ?>
                                        <div class="title">
                                            <a href="<?php if($external_url){ echo $external_url; }else{echo $post_link; } ?>" tabindex="0">
                                                <?php echo $post_title; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="readmore">
                                        <a href="<?php if($external_url){ echo $external_url; }else{echo $post_link; } ?>" tabindex="0" >
											<?php  _e('Read More','tosiba');?>
										</a>
									
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                            wp_reset_query();
                            wp_reset_postdata();
                        }
                    ?>
                    
                </div>
            </div>
            <!-- #tab1 -->
          <!--  <h3 class="tab_drawer_heading" rel="tab2"><?php _e('Blogs','tosiba'); ?></h3>
            <div id="tab2" class="tab_content">
                <h2><?php _e('Blogs','tosiba'); ?></h2>
                <div class="blog-medai">
                    <?php
                        $args  = array (
                            'post_type'    => 'post',
                            'post_status'  => 'publish',
                            'order'        => 'ASC', 
                            'category_name' => 'blog',
							'meta_query' => array(
                                array(
                                    'key'     => 'toshiba_blog_lat_pop',
//                                     'value'   => '0',
                                    'compare' => '=',
                                ),
                            ),
							'posts_per_page' => -1,
							
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                $post_title         = get_the_title( $id );
                                $post_image         = get_the_post_thumbnail_url( $id );
                                $post_content       = get_the_content( $id );
                                $post_date          = get_the_date( 'F Y', $id );
                                $post_author        = get_the_author( $id );
                                $post_link          = get_permalink( $id );
								$external_url       = get_field('external_url', $id);
                                if( class_exists( 'acf')){
                                    $post_show_tag      = get_field('toshiba_blog_lat_pop');
                                    $post_show_title    = $post_show_tag == '1' ? __('Blog','tosiba') : __('Blog','tosiba') ;
                                }
                             ?>
                             <div class="media_center_in">
                            <div class="inner">
                                <?php if ( !empty ( $post_image ) ) { ?>
                                    <div class="image">
                                        <a href="<?php if($external_url){ echo $external_url; }else{echo $post_link; } ?>" tabindex="0">
                                            <img src="<?php echo $post_image; ?>" alt="<?= $post_title ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="content">
                                    <?php if ( !empty ( $post_show_title ) ) { ?>
                                        <div class="media">
                                            <strong><?php echo $post_show_title; ?></strong>
                                        </div>
                                    <?php } ?>
                                    <div class="date">
                                        <ul>
                                            <?php if ( !empty ( $post_date ) ) { ?>
                                                <li><?php echo $post_date; ?></li>
                                            <?php } ?>
                                            <?php if ( !empty ( $post_author ) ) { ?>
                                                <li><?php echo $post_author; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <?php if ( !empty ( $post_title ) ) { ?>
                                        <div class="title">
                                            <a href="<?php if($external_url){ echo $external_url; }else{echo $post_link; } ?>" tabindex="0">
                                                <?php echo $post_title; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="readmore">
                                        <a href="<?php if($external_url){ echo $external_url; }else{echo $post_link; } ?>" tabindex="0">
											<?php  _e('Read More','tosiba');?>
										</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                            wp_reset_query();
                            wp_reset_postdata();
                        }
                    ?>
                    
                </div>  
            </div> -->
            <!-- #tab2 -->
            <h3 class="tab_drawer_heading" rel="tab3"><?php _e('News','tosiba'); ?></h3>
            <div id="tab3" class="tab_content">
                <h2><?php _e('News','tosiba'); ?></h2>
                <div class="blog-medai">
                     <?php
                        $args  = array (
                            'post_type'    => 'post',
                            'post_status'  => 'publish',
                            'order'        => 'ASC',
							'category_name' => 'news',
                            'meta_query' => array(
                                array(
                                    'key'     => 'toshiba_blog_lat_pop',
//                                     'value'   => '1',
                                    'compare' => '=',
                                ),
                            ),
							'posts_per_page' => -1,
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                $post_title         = get_the_title( $id );
                                $post_image         = get_the_post_thumbnail_url( $id );
                                $post_content       = get_the_content( $id );
                                $post_date          = get_the_date( 'F Y', $id );
                                $post_author        = get_the_author( $id );
                                $post_link          = get_permalink( $id );
								$external_url       = get_field('external_url', $id);
                                if( class_exists( 'acf')){
                                    $post_show_tag      = get_field('toshiba_blog_lat_pop');
                                    $post_show_title    = $post_show_tag == '1' ? __('News','tosiba') : __('News','tosiba') ;
                                }
                             ?>
                             <div class="media_center_in">
                            <div class="inner">
                                <?php if ( !empty ( $post_image ) ) { ?>
                                    <div class="image">
                                        <a href="<?php if($external_url){ echo $external_url; }else{echo $post_link; } ?>" tabindex="0">
                                            <img src="<?php echo $post_image; ?>" alt="<?= $post_title ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="content">
                                    <?php if ( !empty ( $post_show_title ) ) { ?>
                                        <div class="media">
                                            <strong><?php echo $post_show_title; ?></strong>
                                        </div>
                                    <?php } ?>
                                    <div class="date">
                                        <ul>
                                            <?php if ( !empty ( $post_date ) ) { ?>
                                                <li><?php echo $post_date; ?></li>
                                            <?php } ?>
                                            <?php if ( !empty ( $post_author ) ) { ?>
                                                <li><?php echo $post_author; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <?php if ( !empty ( $post_title ) ) { ?>
                                        <div class="title">
                                            <a href="<?php if($external_url){ echo $external_url; }else{echo $post_link; } ?>" tabindex="0" >
                                                <?php echo $post_title; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="readmore">
                                        <a href="<?php if($external_url){ echo $external_url; }else{echo $post_link; } ?>" tabindex="0"  ><?php  _e('Read More','tosiba');?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                            wp_reset_query();
                            wp_reset_postdata();
                        }
                    ?>
                </div>
            </div>
            <!-- #tab3 -->
			<h3 class="d_active tab_drawer_heading" rel="tab4"><?php _e('All Events','tosiba'); ?></h3>
            <div id="tab4" class="tab_content">
                <h2><?php _e('All Events','tosiba'); ?></h2>
                <div class="blog-medai">
                     <?php
                        $args  = array (
                            'post_type'    => 'event',
                            'post_status'  => 'publish',
                            'order'        => 'DESC',
							'posts_per_page' => -1,
                        );
                        $query = new WP_Query( $args );
					
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                $post_title         = get_the_title( $id );
                                $post_image         = get_the_post_thumbnail_url( $id );
                                $post_content       = get_the_content( $id );
                                $post_date          = get_the_date( 'F Y', $id );
                                $post_author        = get_the_author( $id );
                                $post_link          = get_permalink( $id );
                                if( class_exists( 'acf')){
                                    $post_show_tag      = get_field('toshiba_blog_lat_pop');
                                    $post_show_title    = $post_show_tag == '1' ? __('Events','tosiba') : __('Events','tosiba') ;
                                }
                                
                             ?>
                             <div class="media_center_in">
                            <div class="inner">
                                <?php if ( !empty ( $post_image ) ) { ?>
                                    <div class="image">
                                        <a href="<?php echo $post_link; ?>" tabindex="0">
                                            <img src="<?php echo $post_image; ?>" alt="<?= $post_title ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="content">
                                    <?php if ( !empty ( $post_show_title ) ) { ?>
                                        <div class="media">
                                            <strong><?php echo $post_show_title; ?></strong>
                                        </div>
                                    <?php } ?>
                                    <div class="date">
                                        <ul>
                                            <?php if ( !empty ( $post_date ) ) { ?>
                                                <li><?php echo $post_date; ?></li>
                                            <?php } ?>
                                            <?php if ( !empty ( $post_author ) ) { ?>
                                                <li><?php echo $post_author; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <?php if ( !empty ( $post_title ) ) { ?>
                                        <div class="title">
                                            <a href="<?php echo $post_link; ?>" tabindex="0">
                                                <?php echo $post_title; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="readmore">
                                        <a href="<?php echo $post_link; ?>" tabindex="0"><?php  _e('Read More','tosiba');?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                            wp_reset_query();
                            wp_reset_postdata();
                        }
                    ?>
                    
                </div>
            </div>
            <!-- #tab4 -->
        </div>
    </div>
</div>

</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>