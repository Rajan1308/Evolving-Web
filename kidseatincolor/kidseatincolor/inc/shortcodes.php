<?php
//Column Shortcode
function column_sc( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'checkmark' => '',
		),
		$atts
	);
    ob_start();
    ?>
    <div class="editor-column <?= ($atts['checkmark']) ? 'checkmark' : '' ?>">
        <?= $content ?>
    </div>
    <?php
    $output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode( 'col', 'column_sc' );

//Accordion
function accordion_sc( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'id' => '',
		),
		$atts
	);

    ob_start();
    ?>
	<section class="accordion-promo bg-white">
		<div class="wrapper">
			<?php if( get_field('accordion_promo_title', $atts['id']) ){ ?>
				<h3><?= get_field('accordion_promo_title', $atts['id']); ?></h3>
			<?php } ?>
			<?php foreach(get_field('accordion_block', $atts['id']) as $item){ ?>
				<div class="accordion">
					<div class="body-text-1">
						<div class="accordion-question"><b><?= $item['question']; ?></b></div>
						<div class="accordion-answer"><?= $item['answer']; ?></div>
					</div>
				</div>
			<?php } ?>   
		</div>
	</section>
    <?php
    $output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode( 'accordion', 'accordion_sc' );