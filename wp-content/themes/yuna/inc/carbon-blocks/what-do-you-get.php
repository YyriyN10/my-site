<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_home_what_get' );

	function yuna_home_what_get(){
		Block::make(  __('What do you get') )
		     ->add_fields( array(
			     Field::make_text('yuna_main_what_get_block_title', 'Заголовок блоку'),
			     Field::make_image('yuna_main_what_get_image', 'Фонове зображення')
		            ->set_value_type('url'),
			     Field::make_complex('yuna_main_what_get_list', 'Перелік переваг')
			        ->add_fields(array(
			        	Field::make_image('icon', 'Іконка переваги')
				            ->set_type('image')
				            ->set_value_type('url'),
				        Field::make_text('text', 'Текст переваги')
			        ))

		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- What do you get -->
			     <section class="what-you-get indent animation-tracking" style="background: url(<?php echo $fields['yuna_main_what_get_image'];?>)">
				     <div class="container-fluid">
					     <div class="row first-up">
						     <h2 class="block-title col-12 text-center">
                   <span><?php echo $fields['yuna_main_what_get_block_title'];?></span>

                 </h2>
					     </div>
					     <div class="row second-up">
						     <?php if( $fields['yuna_main_what_get_list'] ):?>
							     <ul class="content col-12">
								     <?php foreach( $fields['yuna_main_what_get_list'] as $item ):?>
									     <li class="item">
										     <div class="icon">
											     <img src="<?php echo $item['icon'];?>" alt="" class="svg-pic">
										     </div>
										     <p class="text"><?php echo $item['text'];?></p>
									     </li>
								     <?php endforeach;?>
							     </ul>
						     <?php endif;?>

					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




