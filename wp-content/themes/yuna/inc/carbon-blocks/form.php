<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_home_form' );

	function yuna_home_form(){
		Block::make(  __('Form') )
		     ->add_fields( array(
			     Field::make_text('yuna_main_form_block_title', 'Заголовок блоку'),
			     Field::make_text('yuna_main_form_text', 'Текст')

		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- About -->
			     <section class="contact-form indent animation-tracking" >
				     <div class="container">
					     <div class="row">
						     <div class="content col-12">
							     <h2 class="block-title first-up"><span><?php echo $fields['yuna_main_form_block_title'];?></span></h2>
							     <p class="text first-up"><?php echo $fields['yuna_main_form_text'];?></p>
							     <form method="post" class="second-up">
								     <?php wp_nonce_field('contact_form','hash'); ?>
								     <div class="form-group">
									     <input type="text" name="name" class="form-control" placeholder="<?php echo esc_html( pll__( 'Імʼя' ) ); ?>">
								     </div>
								     <div class="form-group">
									     <input type="tel" name="phone" class="form-control" placeholder="<?php echo esc_html( pll__( 'Телефон' ) ); ?>">
								     </div>
								     <div class="form-group">
									     <input type="email" name="email" class="form-control" placeholder="Email">
								     </div>
								     <button type="submit" class="button">
									     <span class="button-text"><?php echo esc_html( pll__( 'Надіслати' ) ); ?></span>
								     </button>
								     <div class="form-group textarea-group">
									     <textarea name="message" class="form-control" placeholder="<?php echo esc_html( pll__( 'Повідомлення' ) ); ?>"></textarea>
								     </div>

							     </form>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




