<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'tourplus_home_call_to_action' );

	function tourplus_home_call_to_action(){
		Block::make(  __('Call to action') )
		     ->add_fields( array(
			     Field::make_text('tourplus_main_call_to_action_title', 'Заголоаок блоку' ),
			     Field::make_rich_text('tourplus_main_call_to_action_text', 'Текст блоку"' ),
			     Field::make_text('tourplus_main_call_to_action_btn_text', 'Текст у кнопці "Забронювати"' ),
			     Field::make_image('tourplus_main_call_to_action_bg', 'Фонове зображення')
              ->set_value_type('url')
		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- call to action -->
			     <section class="call-to-action animation-tracking" style="background-image: url(<?php echo $fields['tourplus_main_call_to_action_bg'];?>)">
				     <div class="container">
					     <div class="row">
						     <div class="content col-xl-7 col-lg-8">
							     <h2 class="block-title big-title first-up"><?php echo $fields['tourplus_main_call_to_action_title'];?></h2>
							     <div class="text second-up"><?php echo wpautop($fields['tourplus_main_call_to_action_text']);?></div>
							     <a href="#" rel="nofollow" data-toggle="modal" data-target="#formModal" class="button second-up">
                       <?php echo $fields['tourplus_main_call_to_action_btn_text'];?>
                   </a>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




