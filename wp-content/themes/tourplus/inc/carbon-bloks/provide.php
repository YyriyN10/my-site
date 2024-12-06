<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'tourplus_home_provide' );

	function tourplus_home_provide(){
		Block::make(  __('Provide') )
		     ->add_fields( array(
			     Field::make_text('tourplus_main_provide_title', 'Заголоаок блоку' ),
			     Field::make_rich_text('tourplus_main_provide_text', 'Текст блоку"' ),
			     Field::make_complex('tourplus_main_provide_image_gallery', 'Галерея зображень')
              ->add_fields(array(
                 Field::make_image('image', 'Зображення')
                  ->set_type('image')
              )),
			     Field::make_image('tourplus_main_provide_image', 'Зображення блоку')
					->set_type('image'),
			     Field::make_complex('tourplus_main_provide_list', 'Перелік переваг')
			        ->add_fields(array(
			        	Field::make_image('icon', 'Зображення')
				            ->set_type('image')
				            ->set_value_type('url'),
				        Field::make_text('title', 'Назва'),
				        Field::make_text('text', 'Опис')
			        ))
		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- provide-->
			     <section class="provide indent-top animation-tracking">
				     <div class="container">
					     <div class="row">
						     <div class="title-wrapper col-xl-5 col-lg-6 first-up">
							     <h2 class="block-title small-title"><?php echo $fields['tourplus_main_provide_title'];?></h2>
							     <div class="pic">
                     <?php if( $fields['tourplus_main_provide_image_gallery'] ):?>
                       <div class="provide-slider" id="provide-slider">
	                       <?php foreach( $fields['tourplus_main_provide_image_gallery'] as $item ):?>
                           <div class="slide">
                             <img
                                 src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
                                 alt="<?php echo get_post_meta($$item['image'], '_wp_attachment_image_alt', TRUE);?>"
                             >
                           </div>
	                       <?php endforeach;?>
                       </div>
                     <?php else:?>
                       <div class="inner">
                         <img
                             class="lazy"
                             data-src="<?php echo wp_get_attachment_image_src($fields['tourplus_main_provide_image'], 'full')[0];?>"
                             alt="<?php echo get_post_meta($fields['tourplus_main_provide_image'], '_wp_attachment_image_alt', TRUE);?>"
                         >
                       </div>
                     <?php endif;?>
							     </div>
						     </div>
						     <div class="content col-lg-6 offset-xl-1 indent-bottom second-up">
							     <div class="text"><?php echo wpautop($fields['tourplus_main_provide_text']);?></div>
							     <?php if( $fields['tourplus_main_provide_list'] ):?>
								     <ul class="provide-advantages-list">
									     <?php foreach( $fields['tourplus_main_provide_list'] as $item ):?>
										     <li class="provide-advantages-item">
											     <div class="icon">
												     <img src="<?php echo $item['icon'];?>" alt="" class="svg-pic">
											     </div>
											     <h3 class="name"><?php echo $item['title'];?></h3>
											     <p class="description"><?php echo $item['text'];?></p>
										     </li>
									     <?php endforeach;?>

								     </ul>
							     <?php endif;?>

						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




