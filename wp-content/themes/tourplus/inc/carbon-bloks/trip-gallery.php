<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'tourplus_home_trip_gallery' );

	function tourplus_home_trip_gallery(){
		Block::make(  __('Trip gallery') )
		     ->add_fields( array(
			     Field::make_text('tourplus_main_trip_gallery_title', 'Заголоаок блоку' ),
			     Field::make_text('tourplus_main_trip_gallery_subtitle', 'Підзаголовок блоку"' ),
			     Field::make_image('tourplus_main_trip_gallery_image1', 'Зображення 1')
			          ->set_type('image'),
			     Field::make_image('tourplus_main_trip_gallery_image2', 'Зображення 2')
			          ->set_type('image'),
			     Field::make_image('tourplus_main_trip_gallery_image3', 'Зображення 3')
			          ->set_type('image'),
			     Field::make_image('tourplus_main_trip_gallery_image4', 'Зображення 4')
			          ->set_type('image'),
			     Field::make_image('tourplus_main_trip_gallery_image5', 'Зображення 5')
			          ->set_type('image'),
			     Field::make_image('tourplus_main_trip_gallery_image6', 'Зображення 6')
			          ->set_type('image'),
		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- trip gallery-->
			     <section class="trip-gallery indent-top indent-bottom animation-tracking">
				     <div class="container">
					     <div class="row">
                 <h2 class="block-title small-title col-12 text-center first-up"><?php echo $fields['tourplus_main_trip_gallery_title'];?></h2>
                 <div class="col-12 text-center first-up">
                   <h3 class="subtitle d-inline-block"><?php echo $fields['tourplus_main_trip_gallery_subtitle'];?></h3>
                 </div>

                 <div class="gallery col-12 second-up">
                   <div class="pic">
                     <img
                        class="lazy parallax-image"
                        data-src="<?php echo wp_get_attachment_image_src($fields['tourplus_main_trip_gallery_image1'], 'full')[0];?>"
                        alt="<?php echo get_post_meta($fields['tourplus_main_trip_gallery_image1'], '_wp_attachment_image_alt', TRUE);?>"
                     >
                   </div>
                   <div class="pic">
                     <img
                         class="lazy parallax-image2"
                         data-src="<?php echo wp_get_attachment_image_src($fields['tourplus_main_trip_gallery_image2'], 'full')[0];?>"
                         alt="<?php echo get_post_meta($fields['tourplus_main_trip_gallery_image2'], '_wp_attachment_image_alt', TRUE);?>"
                     >
                   </div>
                   <div class="pic">
                     <img
                         class="lazy parallax-image"
                         data-src="<?php echo wp_get_attachment_image_src($fields['tourplus_main_trip_gallery_image3'], 'full')[0];?>"
                         alt="<?php echo get_post_meta($fields['tourplus_main_trip_gallery_image3'], '_wp_attachment_image_alt', TRUE);?>"
                     >
                   </div>
                   <div class="pic">
                     <img
                         class="lazy parallax-image2"
                         data-src="<?php echo wp_get_attachment_image_src($fields['tourplus_main_trip_gallery_image4'], 'full')[0];?>"
                         alt="<?php echo get_post_meta($fields['tourplus_main_trip_gallery_image4'], '_wp_attachment_image_alt', TRUE);?>"
                     >
                   </div>
                   <div class="pic">
                     <img
                         class="lazy parallax-image"
                         data-src="<?php echo wp_get_attachment_image_src($fields['tourplus_main_trip_gallery_image5'], 'full')[0];?>"
                         alt="<?php echo get_post_meta($fields['tourplus_main_trip_gallery_image5'], '_wp_attachment_image_alt', TRUE);?>"
                     >
                   </div>
                   <div class="pic">
                     <img
                         class="lazy parallax-image2"
                         data-src="<?php echo wp_get_attachment_image_src($fields['tourplus_main_trip_gallery_image6'], 'full')[0];?>"
                         alt="<?php echo get_post_meta($fields['tourplus_main_trip_gallery_image6'], '_wp_attachment_image_alt', TRUE);?>"
                     >
                   </div>
                 </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




