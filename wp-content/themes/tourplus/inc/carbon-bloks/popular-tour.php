<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'tourplus_home_popular_tour' );

	function tourplus_home_popular_tour(){
		Block::make(  __('Popular tour') )
		     ->add_fields( array(
			     Field::make_text('tourplus_main_popular_tour_title', 'Заголоаок блоку' ),
			     Field::make_rich_text('tourplus_main_popular_tour_text', 'Текст блоку' ),
			     Field::make_text('tourplus_main_popular_tour_btn_all_text', 'Текст у кнопці "Дивитись всі"' ),
			     Field::make_text('tourplus_main_popular_tour_btn_all_link', 'Посилання у кнопці "Дивитись всі"' )
		            ->set_attribute('type', 'url'),
			     Field::make_complex('tourplus_main_popular_tour_our_numbers')
			        ->add_fields(array(
			        	Field::make_text('number_name', 'Назва'),
				        Field::make_text('number', 'Цифра' ),
				        Field::make_text('number_more', 'Додаток до цифри')
			        ))
		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- popular-tour -->
			      <?php
			      	$tourArgs = array(
			      		'posts_per_page' => 3,
			      		'orderby' 	 => 'date',
			      		'post_type'  => 'tour',
			      		'post_status'    => 'publish'
			      	);

			      	$tourList = new WP_Query( $tourArgs );

			      		  if ( $tourList->have_posts() ) :?>
					          <section class="popular-tour indent-top indent-bottom animation-tracking" id="out-tour">
						          <div class="container">
							          <div class="row">
								          <div class="title-wrapper col-12 first-up">
									          <div class="title-text">
										          <h2 class="block-title small-title"><?php echo $fields['tourplus_main_popular_tour_title'];?></h2>
										          <?php if( $fields['tourplus_main_popular_tour_text'] ):?>
                                  <div class="text"><?php echo wpautop($fields['tourplus_main_popular_tour_text']);?></div>
										          <?php endif;?>
									          </div>
									          <a href="#" rel="nofollow" class="button" data-toggle="modal" data-target="#formModal">
                                <?php echo $fields['tourplus_main_popular_tour_btn_all_text'];?>
                            </a>
								          </div>
							          </div>
							          <div class="row second-up">
                          <div class="popular-tour__slider-wrapper col-12">
                            <div class="popular-tour__slider" id="popular-tour-slider">
	                            <?php while ( $tourList->have_posts() ) : $tourList->the_post(); ?>
		                            <?php get_template_part('template-parts/tour-item') ;?></php>
	                            <?php endwhile;?>
                            </div>
                            <button class="slide-control prev">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80.593px" height="122.88px" viewBox="0 0 80.593 122.88" enable-background="new 0 0 80.593 122.88" xml:space="preserve"><g><polygon points="80.593,0 49.771,0 0,61.44 49.771,122.88 80.593,122.88 30.82,61.44 80.593,0"/></g></svg>
                            </button>
                            <button class="slide-control next">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80.593px" height="122.88px" viewBox="0 0 80.593 122.88" enable-background="new 0 0 80.593 122.88" xml:space="preserve"><g><polygon points="0,0 30.82,0 80.593,61.44 30.82,122.88 0,122.88 49.772,61.44 0,0"/></g></svg>
                            </button>
                          </div>
							          </div>
						          </div>
					          </section>

			      	<?php endif; ?>
			      <?php wp_reset_postdata(); ?>

			     <?php if( $fields['tourplus_main_popular_tour_our_numbers'] ):?>
				     <section class="our-numbers" id="advance">
					     <div class="container">
						     <div class="row">
                   <p class="typed" data-typed="rewyherhdhds"></p>
							     <div class="content col-12">
								     <?php foreach( $fields['tourplus_main_popular_tour_our_numbers'] as $item ):?>
									     <dl class="item">
										     <dd class="number">
                           <span class="counter" data-number="<?php echo $item['number'];?>"></span>

											     <?php if( $item['number_more'] ):?>
												     <span class="more-number" ><?php echo $item['number_more'];?></span>
											     <?php endif;?>
										     </dd>
										     <dt class="description"><?php echo $item['number_name'];?></dt>
									     </dl>
								     <?php endforeach;?>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}




