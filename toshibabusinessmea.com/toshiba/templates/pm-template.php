<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Print Management Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
$page_id = get_the_ID();
if ( class_exists( 'acf' ) ) {
    /* Feature Section */
    $intro_field             = get_field( 'toshiba_pm_f_intro_field', $page_id );
    $intro_title             = get_field( 'toshiba_pm_f_intro_title', $page_id );
    $intro_logo              = get_field( 'toshiba_pm_f_intro_img', $page_id );
    $faetures_title          = get_field( 'toshiba_pm_f_title', $page_id );
    $faetures_img            = get_field( 'toshiba_pm_f_img', $page_id );
    $faetures                = get_field( 'toshiba_pm_f_features', $page_id );
    $faetures_btns           = get_field( 'toshiba_pm_f_btn', $page_id );
    $high_req_form_shortcode = get_field( 'toshiba_pm_f_request_a_quote_form_shortcode', $page_id );
    $high_req_form_label     = get_field( 'toshiba_pm_f_request_a_quote_label', $page_id );
    /* Challenges Section */
    $challenge_sec_title     = get_field( 'toshiba_pm_c_title', $page_id );
    $challenge_sec_img       = get_field( 'toshiba_pm_c_img', $page_id );
    $challenge_title         = get_field( 'toshiba_pm_c_ctitle', $page_id );
    $challenge               = get_field( 'toshiba_pm_c_cdesc', $page_id );
    $solution_title          = get_field( 'toshiba_pm_c_stitle', $page_id );
    $solution                = get_field( 'toshiba_pm_c_sdesc', $page_id );
    /* Benifits Section */
    $benifits_title          = get_field( 'toshiba_pm_b_title', $page_id );
    $benifits_img            = get_field( 'toshiba_pm_b_img', $page_id );
    $benifits                = get_field( 'toshiba_pm_b_benifits', $page_id );
    /* Partner Solution Section */
    $partner_sol_title       = get_field( 'toshiba_pm_ps_title', $page_id );
    $partner_solution        = get_field( 'toshiba_pm_ps_sol', $page_id );
}
?>

<div class="empowering_top_logo_wrap">
    <div class="container">
        <div class="">
            <?php if ( $intro_field == 'logo' && ! empty( $intro_logo ) ) { ?>
                <img src="<?php echo $intro_logo; ?>" alt="<?= $intro_title ?>">            
            <?php } elseif ( $intro_field == 'title' && ! empty( $intro_title ) ) { ?>
                <h2><?php echo $intro_title; ?></h2>
            <?php } ?>
        </div>
    </div>
</div>

<section class="features_section">
    <div class="features_wrap">
        <div class="right-bg"></div>
        <div class="container">
            <div class="features_inner">
                <div class="left pos_rel">
                    <div class="content_wrap">
                        <?php if ( ! empty( $faetures_title ) ) { ?>
                            <div class="sec-main-titel"><?php echo $faetures_title; ?></div>
                        <?php } ?>
                        <?php
                        if ( ! empty( $faetures ) ) {
                            echo $faetures;
                        }
                        ?>
                    </div>
                        <div class="Downloads_btn pm-left-button">
                            <?php if ( !empty ( $high_req_form_label ) ) { ?>
                                <div class="button-1"><a href="#" data-fancybox data-src="#hidden-content" ><?php echo $high_req_form_label; ?></a>
                                </div>
                            <?php } ?>
                            <?php  if ( ! empty( $faetures_btns ) ) { 
                                    foreach ( $faetures_btns as $buttons ) {
                                        $btn_link = $buttons[ 'toshiba_pm_f_btn_link' ];
                                        $btn_txt  = $buttons[ 'toshiba_pm_f_btn_title' ];
                                        if ( ! empty( $btn_link ) ) {
                                            ?>
                                            <div class="button-1"><a href="<?php echo $btn_link; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-download" ><?php echo $btn_txt; ?></a></div>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                        </div>
                    <?php if ( !empty ( $high_req_form_shortcode ) ) { ?>
                        <div class="Request_quote_form contact_us_form" id="hidden-content" style="display: none;">
                            <script>
                              hbspt.forms.create({
                            	region: "na1",
                            	portalId: "8244541",
                            	formId: "163aacff-7b6c-4432-aed4-71300ecdc91d"
                            });
                            </script>
                        </div>
                    <?php } ?>
					<?php if ( !empty ( $high_req_form_shortcode ) ) { ?>
                        <div class="Request_quote_form contact_us_form" id="hidden-content-download" style="display: none;">
							<input type="hidden" id="pdflink" value="<?php echo $btn_link; ?>" />
                            <script>
                              hbspt.forms.create({
                            	region: "na1",
                            	portalId: "8244541",
                            	formId: "9d556644-d84a-45ca-9dc0-2cf421816ac7"
                            });
                            </script>
                        </div>
                    <?php } ?>
                </div>
                <div class="right ">
                    <div class="image">
                        <?php if ( ! empty( $faetures_img ) ) { ?>
                            <img src="<?php echo $faetures_img; ?>" alt="Features Image">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="your_challenge_sec">
    <div class="border_box">
        <div class="container">
            <div class="inner">
                <div class="other">
                    <div class="img_div">
                        <?php if ( ! empty( $challenge_sec_img ) ) { ?>
                            <img src="<?php echo $challenge_sec_img; ?>" alt="<?php if($challenge_sec_title) { echo $challenge_sec_title; } else{echo 'logo';}  ?>"> 
                        <?php } ?>
                        <?php if ( ! empty( $challenge_sec_title ) ) { ?>
                            <h2 class="sec_title"><?php echo $challenge_sec_title; ?></h2>
                        <?php } ?>
                    </div>                         
                </div>
                <div class="left">
                    <?php if ( ! empty( $challenge_title ) ) { ?>
                        <h2><?php echo $challenge_title; ?></h2>
                    <?php } ?>
                    <?php
                    if ( ! empty( $challenge ) ) {
                        echo $challenge;
                    }
                    ?>
                </div>   
                <div class="right">
                    <?php if ( ! empty( $solution_title ) ) { ?>
                        <h2><?php echo $solution_title; ?></h2>
                    <?php } ?>
                    <?php
                    if ( ! empty( $solution ) ) {
                        echo $solution;
                    }
                    ?>
                </div>        
            </div>
        </div> 
        <div class="line"></div>
        <div class="bottom_logo">
            <img src="<?php echo TOSHIBA_THEME_IMAGE_FOLDER; ?>/challenge_shapes.png" alt="Challenge Shapes"/>
        </div> 
    </div>      
</section>
<section class="your_benifit_sec">
    <div class="inner">
        <div class="right">
            <div class="img_div">
                <?php if ( ! empty( $benifits_img ) ) { ?>
                    <img src="<?php echo $benifits_img; ?>" alt="<?= $benifits_title ?>">   
                <?php } ?>
            </div>                         
        </div>
        <div class="left right-padding">
            <?php if ( ! empty( $benifits_title ) ) { ?>
                <h2><?php echo $benifits_title; ?></h2>
            <?php } ?>
            <?php
            if ( ! empty( $benifits ) ) {
                echo $benifits;
            }
            ?>
        </div>        
    </div>
</section>
<?php
if ( $partner_solution ) {
    foreach ( $partner_solution as $solutions ) {
        
    }
}
?>
<?php if ( ! empty( $partner_solution ) ) { ?>
    <section class="partner_solution_sec scroll-bar">
        <div class="container">
            <?php if ( ! empty( $partner_sol_title ) ) { ?>
                <h2 class="sec-main-titel"><?php echo $partner_sol_title; ?></h2>
            <?php } ?>
            <?php
            foreach ( $partner_solution as $sol_key => $solutions ) {
                $partner_sol_title    = $solutions[ 'toshiba_pm_s_sol_title' ];
                $partner_sol_desc     = $solutions[ 'toshiba_pm_s_sol_desc' ];
                $partner_sol_solution = $solutions[ 'toshiba_pm_s_sol_single' ];
                if ( ! empty( $partner_sol_title ) ) {
                    ?>
                    <h5><?php echo $partner_sol_title; ?></h5>
                    <?php
                }
                if ( ! empty( $partner_sol_desc ) ) {
                    echo $partner_sol_desc;
                }
                if ( ! empty( $partner_sol_solution ) ) {
                    ?>
                    <div class="row">
                        <?php foreach ( $partner_sol_solution as $key => $value ) { ?>
                            <div class="box <?php echo ($sol_key == 0 ) ? 'box-3' : 'box-6'; ?>">
                                <div class="img_div ">
                                    <?php if ( ! empty( $value[ 'toshiba_ms_s_sol_single_img' ] ) ) { ?>
                                        <img src="<?php echo $value[ 'toshiba_ms_s_sol_single_img' ]; ?>" alt="<?= $partner_sol_title ?>"/>
                                    <?php } ?>
                                    <div class="box_content">
                                        <div class="prag">
                                            <?php
                                            if ( ! empty( $value[ 'toshiba_ms_s_sol_single_desc' ] ) ) {
                                                echo $value[ 'toshiba_ms_s_sol_single_desc' ];
                                            }
                                            ?>          
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                }
                ?>
                <?php
            }
            ?>            
        </div>   
    </section>
<?php } ?>
<?php get_footer(); ?>