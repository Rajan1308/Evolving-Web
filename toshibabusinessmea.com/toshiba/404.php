<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage TOSHIBA
 * @since Toshiba 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
            
    <section class="error-404 not-found">
      <header class="page-header">
              <h1 class="page-title text-dark" ><?php _e( 'Oops! That page can&rsquo;t be found.', 'toshiba' ); ?></h1>
      </header><!-- .page-header -->

      <div class="page-content">
        <h3 class="page-title" style="color: #000;"><?php _e( 'Oops! That page can&rsquo;t be found.', 'toshiba' ); ?></h3>
              <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'toshiba' ); ?></p>
              <?php #get_search_form(); ?>
      </div><!-- .page-content -->
    </section><!-- .error-404 -->
    <section class="Solutions_section padding-top">
      <div class="Solutions_section_wrap right-padding ">
        <div class="Solutions_content">
          <div class="image">
            <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/printers-bg.png" alt="Solutions">
          </div>
          <div class="main_content">
              <strong>Solutions</strong>
              <h1>Printing Management and Workflow solutions</h1>
              <p>Toshiba has partnered with various organisations to offer solutions that optimise your organisation’s digital workflow and enhance productivity.</p>
          </div>
        </div>
      </div>
      <div class="Solutions_Management_wrap">
        <div class="container">
          <div class="Solutions_Management_section">
            <div class="Management_section">
              <a>
                <div class="image">
                  <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/Output-Management.png" alt="Output <br>Management" class="image-none-hover">
                  <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/Output-Management.png" alt="Output <br>Management" class="image-hover">
                </div>
                <h4>Output <br>Management</h4>
              </a>    
            </div>            
            <div class="Management_section">
              <a href="https://www.toshibabusinessmea.com/wi-fi-direct/">
                  <div class="image">
                    <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/Device-Management.png" alt="Device Management" class="image-none-hover">
                    <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/Device-Management.png" alt="Device Management" class="image-hover">
                  </div>
                  <h4>Device Management</h4>
              </a>    
            </div>            
            <div class="Management_section">
              <a href="https://www.toshibabusinessmea.com/document-management/">
              <div class="image">
                <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/Device-anagement-1.png" alt="Document Management" class="image-none-hover">
                <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/Device-anagement-1.png" alt="Document Management" class="image-hover">
              </div>
                <h4>Document Management</h4>
              </a>    
            </div>            
            <div class="Management_section">
              <a href="https://www.toshibabusinessmea.com/embedded-solutions/">
              <div class="image">
                <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/Embedded-Solutions.png" alt="Embedded Solutions" class="image-none-hover">
                <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/Embedded-Solutions.png" alt="Embedded Solutions" class="image-hover">
              </div>
              <h4>Embedded Solutions</h4>
              </a>    
            </div>            
            <div class="Management_section">
              <a href="https://www.toshibabusinessmea.com/ui-customization/">
              <div class="image">
                <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/UI-Customization.png" alt="UI Customization" class="image-none-hover">
                <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/UI-Customization.png" alt="UI Customization" class="image-hover">
              </div>
              <h4>UI Customization</h4>
              </a>    
            </div>            
          </div>
        </div>
      </div>
      <div class="button_text"><a href="https://www.toshibabusinessmea.com/mobile-solution/">View Solutions Page <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
    </section>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>