<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_home_technologies' );

	function yuna_home_technologies(){
		Block::make(  __('Technologies') )
		     ->add_fields( array(
		     	Field::make_complex('yuna_main_technologies_list', 'Перелік технологій')
					->add_fields(array(
						Field::make_image('icon', 'Зображення технології' )
						     ->set_type('image')
						     ->set_value_type('url')
					))
		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Технології -->
			     <section class="technologies indent animation-tracking" >
				     <div class="container-fluid">
					     <div class="row first-up">
						     <div class="content col-12">
                   <?php foreach( $fields['yuna_main_technologies_list'] as $item ):?>
                     <div class="item">
                       <img src="<?php echo $item['icon'];?>" alt="" class="svg-pic">
                     </div>
                   <?php endforeach;?>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




