<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'tourplus_home_team' );

	function tourplus_home_team(){
		Block::make(  __('Our team') )
		     ->add_fields( array(
			     Field::make_text('tourplus_main_team_title', 'Заголовок блоку' ),


		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- team -->
			     <?php
			     $teamArgs = array(
				     'posts_per_page' => -1,
				     'orderby' 	 => 'date',
				     'post_type'  => 'team',
				     'post_status'    => 'publish'
			     );

			     $teamList = new WP_Query( $teamArgs );

			     if ( $teamList->have_posts() ) :?>

				     <section class="our-team indent-top indent-bottom animation-tracking">
					     <div class="container">
						     <div class="row first-up">
							     <h2 class="block-title col-12 big-title"><?php echo $fields['tourplus_main_team_title'];?></h2>
						     </div>
						     <div class="row second-up">
							     <div class="content col-12" id="our-team-slider">
								     <?php while ( $teamList->have_posts() ) : $teamList->the_post(); ?>
									     <div class="item slide">
										     <div class="pic">
											     <img
											        class="lazy"
											        data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>"
											        alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);?>"
											     >
										     </div>
										     <div class="info">
                           <div>
                             <p class="name"><?php the_title();?></p>
                             <p class="position"><?php echo carbon_get_post_meta(get_the_ID(), 'yuna_team_card_position') ;?></p>
                             <div class="description"><?php the_excerpt();?></div>
                           </div>
										     </div>
									     </div>
								     <?php endwhile;?>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif; ?>
			     <?php wp_reset_postdata(); ?>


			     <?php
		     } );
	}




