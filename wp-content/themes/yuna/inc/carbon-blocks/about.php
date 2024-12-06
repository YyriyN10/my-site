<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_home_about' );

	function yuna_home_about(){
		Block::make(  __('About') )
		     ->add_fields( array(
			     Field::make_text('yuna_main_about_block_title', 'Заголовок блоку'),
			     Field::make_image('yuna_main_about_image', 'Зображення блоку'),
			     Field::make_rich_text('yuna_main_about_text', 'Текст')

		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- About -->
			     <section class="about-me indent animation-tracking" >
				     <div class="container">
					     <div class="row">
						     <div class="pic-wrapper col-lg-5 col-md-8 offset-md-2 col-10 offset-1 offset-lg-0 second-up">
							     <div class="pic">
								     <img
								        class="lazy parallax-image"
								        data-src="<?php echo wp_get_attachment_image_src($fields['yuna_main_about_image'], 'full')[0];?>"
								        alt="<?php echo get_post_meta($fields['yuna_main_about_image'], '_wp_attachment_image_alt', TRUE);?>"
								     >
							     </div>
						     </div>
						     <div class="content col-lg-7 first-up">
							     <h2 class="block-title"><span><?php echo $fields['yuna_main_about_block_title'];?></span></h2>
							     <div class="text"><?php echo wpautop($fields['yuna_main_about_text']);?></div>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




