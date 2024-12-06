<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_home_main_screen' );

	function yuna_home_main_screen(){
		Block::make(  __('Main Screen') )
		     ->add_fields( array(
			     Field::make_text('yuna_main_screen_title', 'Головний заголовок' ),
			     Field::make_text('yuna_main_screen_text', 'Текст слогану' ),
			     Field::make_image('yuna_main_screen_bg_pic', 'Фонове зображення' )
				     ->set_type('image')
			         ->set_value_type('url')
		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Головний екран -->
			     <section class="main-screen" id="particles-js" style="background-image: url(<?php echo $fields['yuna_main_screen_bg_pic'];?>)">
				     <div class="container">
					     <div class="row">
						     <div class="content col-12 text-center">
							     <h1 class="main-title"><?php echo $fields['yuna_main_screen_title']; ?></h1>
							     <?php if( $fields['yuna_main_screen_text'] ):?>
								     <p class="slogan-text"><?php echo $fields['yuna_main_screen_text']; ?></p>
							     <?php endif;?>
							     <a href="#" rel="nofollow" class="button" data-toggle="modal" data-target="#formModal">
                     <span class="button-text"><?php echo esc_html( pll__( 'Залишити повідомлення' ) ); ?></span>

							     </a>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




