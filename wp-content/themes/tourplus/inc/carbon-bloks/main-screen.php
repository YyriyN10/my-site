<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'tourplus_home_main_screen' );

	function tourplus_home_main_screen(){
		Block::make(  __('Main Screen') )
		     ->add_fields( array(
			     Field::make_rich_text('tourplus_main_screen_text', 'Текст на головному екрані' ),
			     Field::make_image('tourplus_main_screen_bg', 'Фонове зображення на головному екрані' )
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('tourplus_main_screen_video', 'Відео на головний екран' )
			          ->set_type('video')
			          ->set_value_type('url')
		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Головний екран -->
			     <section class="main-screen"  style="background-image: url(<?php echo $fields['tourplus_main_screen_bg'];?>)">
				     <div class="container">
					     <div class="row">
						     <div class="content col-xl-5 col-lg-7 col-md-9">
							     <div class="text"><?php echo wpautop($fields['tourplus_main_screen_text']);?></div>
							     <?php if( $fields['tourplus_main_screen_video'] ):?>
								     <div class="watch-btn-wrapper">
									     <a href="#" data-video="<?php echo $fields['tourplus_main_screen_video'];?>" class="play-btn">
                         <span>
                           <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M12.3589 7.79037C12.0773 7.17999 11.2178 6.72161 9.49885 5.80483C7.94667 4.977 7.17059 4.56309 6.53713 4.64479C5.98427 4.71609 5.48624 5.01491 5.16315 5.46918C4.79297 5.98966 4.79297 6.86922 4.79297 8.62836C4.79297 10.3875 4.79297 11.2671 5.16315 11.7875C5.48624 12.2418 5.98427 12.5406 6.53713 12.6119C7.17059 12.6936 7.94667 12.2797 9.49885 11.4519C11.2178 10.5351 12.0773 10.0767 12.3589 9.46634C12.6043 8.93463 12.6043 8.32209 12.3589 7.79037Z" fill="white"/>
                         </svg>
                         </span>

                         Watch Video
                       </a>
								     </div>
							     <?php endif;?>
						     </div>
					     </div>
				     </div>
			     </section>

			     <?php
		     } );
	}




