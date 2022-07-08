<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage TOSHIBA
 * @since Toshiba 1.0
 */
get_header();
while ( have_posts() ) {
  the_post();
  /*
   * product inner meta fields
   */
  $product_id      = get_the_ID();
  $product_title   = get_the_title( $product_id );
  $product_content = get_the_content( $product_id );
  $product_date    = get_the_date( 'F m, Y', $product_id );
  $product_author  = get_the_author( $product_id );
  $select_product  = get_field( 'toshiba_blog_sections', $product_id );
  $select_image    = get_field( 'toshiba_blog_img', $product_id );
  $select_image    = ! empty( $select_image ) ? $select_image[ 'url' ] : '';
  $select_printer  = get_field( 'toshiba_blog_printer', $product_id );
  $product_desc    = get_field( 'toshiba_blog_desc', $product_id );
  $printer         = get_the_title( $select_printer );
  $printer_name    = get_the_content( $select_printer );
  $printer_details = get_field( 'toshiba_printer_f_list', $select_printer );
  $printer_image   = get_the_post_thumbnail_url( $select_printer );
  $share_title     = get_field( 'tosiba_blog_inner_social_share_title', 'option' );
  $next_post_title = get_field( 'tosiba_next_blog_post_title', 'option' );
  ?>
  <div class="single_news_blog">
    <div class="container">
      <section class="news_detail_sec">
          <?php if ( ! empty( $product_title ) ) { ?>
              <h2><?php echo $product_title; ?></h2>
          <?php } ?>
          <div class="date_name">
              <ul>
                  <?php if ( ! empty( $product_date ) ) { ?>
                      <li><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/calendar-1.svg" alt="Calendar"><?php echo $product_date; ?></li>
                  <?php } ?>
                  <?php if ( ! empty( $product_author ) ) { ?>
                      <li><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/user-1.svg" alt="<?= $product_author ?>"><?php echo $product_author; ?></li>
                  <?php } ?> 
              </ul>
          </div>
          <?php if ( ! empty( $product_content ) ) { ?>
              <p><?php echo $product_content; ?></p>
          <?php } ?>
          <?php if ( $select_product ) { ?>
              <div class="news_detail">
                  <img src="<?php echo $select_image; ?>" alt="<?= $product_title  ?>" />
              </div>
          <?php } else { ?>
              <div class="blog_detail">
                <div class="barcode-label-printers">
                  <div class="container">
                    <div class="barcode-label_section">             
                      <div class="barcode-label_wrap scroll-bar">
                        <div class="inner">
                          <div class="left ">
                              <?php if ( ! empty( $printer ) ) { ?>
                                  <h4><?php echo $printer; ?></h4>
                              <?php } ?>
                              <?php
                              foreach ( $printer_details as $prnt_key => $prnt_val ) {
                                  $features  = $prnt_val[ 'toshiba_printer_f_list_feature' ];
                                  $feature[] = $features;
                              }
                              echo implode( '| ', $feature );
                              ?>  
                              <?php if ( ! empty( $printer_name ) ) { ?>
                                  <div class="prag"><p><?php echo $printer_name; ?></p></div>                          
                              <?php } ?>
                          </div>
                          <?php if ( ! empty( $printer_image ) ) { ?>
                          <div class="right">
                              <div class="image">
                                  <img src="<?php echo $printer_image; ?>" alt="<?= $printer ?>">
                              </div>                          
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
          <?php } ?> 
          <?php if ( ! empty( $product_desc ) ) { ?>
              <div class="nb_text_detail">
                  <p><?php echo $product_desc; ?></p>
              </div>
          <?php } ?>
          <div class="social_media_sec">
              <?php if ( ! empty( $share_title ) ) { ?>
                  <strong><?php echo $share_title; ?></strong>
              <?php } ?>
              <ul>
                  <li>
                      <a href="javascript:void(0)" onclick="javascript:window.open('//www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'); return false;">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                  </li>
                  <li>
                      <a href="javascript:void(0)" onclick="javascript:window.open('//twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'); return false;">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                  </li>
                  <li>
                      <a href="javascript:void(0)" onclick="javascript:window.open('//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink(); ?>&amp;title=<?php echo $product_title; ?>&amp;summary=&amp;source=', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'); return false;">
                          <i class="fa fa-linkedin" aria-hidden="true"></i>
                      </a>
                  </li>
                  <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              </ul>
          </div>
          <div class="date_name">
            <ul>
              <?php if ( ! empty( $product_date ) ) { ?>
                  <li><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/calendar-1.svg" alt="Calendar"><?php echo $product_date; ?></li>
              <?php } ?>
              <?php if ( ! empty( $product_author ) ) { ?>
                  <li><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/user-1.svg" alt="<?= $product_author ?>"><?php echo $product_author; ?></li>
              <?php } ?>
            </ul>        
          </div>
      </section>
    </div>
  </div>
  <?php
  
}
?>
<section class="Read_the_next_blog_section" style="background:url(<?php echo site_url(); ?>/wp-content/uploads/2021/01/Read_the_next_.png) no-repeat center /cover ">
  <div class="container">
    <?php if ( ! empty( $next_post_title ) ) { ?>
      <div class="title"><?php echo $next_post_title; ?></div>
    <?php } ?>
    <div class="media_center_section">
      <?php
      $args  = array (
          'post_type'    => 'post',
          'post_status'  => 'publish',
          'post__not_in' => array ( get_the_ID() ),
          'order'        => 'ASC',
          'date_query'   => array (
              'column' => 'post_date',
              'after'  => get_the_date()
          ),
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
              $query->the_post();
              $post_id  = get_the_ID();
              $array1[] = $post_id;
          }
          
      }
      $args  = array (
          'post_type'    => 'post',
          'post_status'  => 'publish',
          'post__not_in' => array ( get_the_ID() ),
          'order'        => 'ASC',
          'date_query'   => array (
              'column' => 'post_date',
              'before' => get_the_date()
          ),
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
              $query->the_post();
              $post_id  = get_the_ID();
              $array1[] = $post_id;
          }
          wp_reset_query();
          wp_reset_postdata();
      }
      $args  = array (
        'category__in'   => wp_get_post_categories( get_queried_object_id() ),
        'post_type'   => 'post',
        'post_status' => 'publish',
        'post__in'    => $array1,
        'orderby'     => 'post__in',
        'post__not_in'   => array ( get_queried_object_id() )
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          $id            = get_the_ID();
          $post_title    = get_the_title( $id );
          $post_image    = get_the_post_thumbnail_url( $id );
          $post_content  = get_the_content( $id );
          $post_date     = get_the_date( 'F Y', $id );
          $post_author   = get_the_author( $id );
          $post_link     = get_permalink( $id );
          $blog_category = get_the_category();
          $post_type     = $blog_category[ 0 ]->name;
          ?>
          <div class="media_center_in">
              <div class="inner">
                  <?php if(!empty($post_image)) { ?>
                  <div class="image">
                      <a href="<?php echo $post_link; ?>"><img src="<?php echo $post_image; ?>" alt="<?= $post_title ?>"></a>
                  </div>
                <?php } ?>
                  <div class="content">
                      <?php if ( ! empty( $post_type ) ) { ?>
                          <div class="media">
                              <strong><?php echo $post_type; ?></strong>
                          </div>
                      <?php } ?>
                      <div class="date">
                          <ul>
                              <?php if ( ! empty( $post_date ) ) { ?>
                                  <li><?php echo $post_date; ?></li>
                              <?php } ?>
                              <?php if ( ! empty( $post_author ) ) { ?>
                                  <li><?php echo $post_author; ?></li>
                              <?php } ?>
                          </ul>
                      </div>
                      <?php if ( ! empty( $post_title ) ) { ?>
                          <div class="title"><a href="<?php echo $post_link; ?>"> <?php echo $post_title; ?></a></div>
                      <?php } ?>
                      <?php if ( ! empty( $post_content ) ) { ?>
                          <div class="main_text">
                              <?php echo $post_content; ?>
                          </div>
                      <?php } ?>
                      <div class="readmore"><a href="<?php echo $post_link; ?>"><?php _e( 'Read More', 'tosiba' ); ?></a></div>
                  </div>
              </div>
          </div>
          <?php
        }
        wp_reset_query();
        wp_reset_postdata();
      }
      ?>
    </div>
  </div>
</section>

<?php get_footer(); 