<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'tourplus_home_about_us' );

	function tourplus_home_about_us(){
		Block::make(  __('About us') )
		     ->add_fields( array(
			     Field::make_text('tourplus_main_about_us_title', 'Заголоаок блоку' ),
			     Field::make_text('tourplus_main_about_us_subtitle', 'Підзаголоаок блоку' ),
			     Field::make_rich_text('tourplus_main_about_us_text', 'Текст блоку"' ),
			     Field::make_text('tourplus_main_about_us_btn_more_text', 'Текст у кнопці "Детальніше"' ),
			     Field::make_rich_text('tourplus_main_about_us_detail_text', 'Текст детального опису'),
			     Field::make_complex('tourplus_main_about_us_gallery', 'Галірея зображень')
			        ->add_fields(array(
			        	Field::make_image('image', 'зхображення')
				            ->set_type('image')
			        ))
		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- about us -->
			     <section class="about-us indent-top animation-tracking" id="about">
				     <div class="container">
					     <div class="row">
						     <div class="text-content col-xl-5 col-lg-6 first-up">
							     <?php if( $fields['tourplus_main_about_us_subtitle'] ):?>
								     <h3 class="subtitle"><?php echo $fields['tourplus_main_about_us_subtitle'];?></h3>
							     <?php endif;?>
							     <h2 class="block-title big-title"><?php echo $fields['tourplus_main_about_us_title'];?></h2>
							     <div class="text"><?php echo wpautop($fields['tourplus_main_about_us_text']);?></div>
							     <a href="#" rel="nofollow" class="button" data-toggle="modal" data-target="#aboutModal">
                       <?php echo $fields['tourplus_main_about_us_btn_more_text'];?>
                   </a>
						     </div>
						     <?php if( $fields['tourplus_main_about_us_gallery'] ):?>
							     <div class="gallery-wrapper col-xl-6 offset-xl-1 col-lg-6 second-up">
									<?php foreach( $fields['tourplus_main_about_us_gallery'] as $item ):?>
										<div class="pic">
											<img
											   class="lazy parallax-image"
											   data-src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
											   alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
											>
										</div>
									<?php endforeach;?>
							     </div>
						     <?php endif;?>
					     </div>
				     </div>
			     </section>

           <!-- The Modal -->
           <div class="modal about-modal" id="aboutModal">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">
                     <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 121.31 122.876" enable-background="new 0 0 121.31 122.876" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M90.914,5.296c6.927-7.034,18.188-7.065,25.154-0.068 c6.961,6.995,6.991,18.369,0.068,25.397L85.743,61.452l30.425,30.855c6.866,6.978,6.773,18.28-0.208,25.247 c-6.983,6.964-18.21,6.946-25.074-0.031L60.669,86.881L30.395,117.58c-6.927,7.034-18.188,7.065-25.154,0.068 c-6.961-6.995-6.992-18.369-0.068-25.397l30.393-30.827L5.142,30.568c-6.867-6.978-6.773-18.28,0.208-25.247 c6.983-6.963,18.21-6.946,25.074,0.031l30.217,30.643L90.914,5.296L90.914,5.296z"/></g></svg>
                   </button>
                 </div>
                 <div class="modal-body">
                   <?php echo wpautop($fields['tourplus_main_about_us_detail_text']);?>
                 </div>
               </div>
             </div>
           </div>

			     <?php
		     } );
	}




