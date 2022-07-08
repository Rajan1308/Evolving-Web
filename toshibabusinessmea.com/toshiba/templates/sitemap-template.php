<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Template Name: SiteMap Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */

get_header(); ?>
<div class="sitemap-section">
 <?php the_content(); ?>
</div>
<?php
get_footer(); ?>