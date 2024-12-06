<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_home_portfolio' );

	function yuna_home_portfolio(){
		Block::make(  __('My portfolio') )
		     ->add_fields( array(
			     Field::make_text('yuna_main_portfolio_block_title', 'Заголовок блоку'),
			     Field::make_text('yuna_main_portfolio_sub_text', 'Додатковий текст')

		     ) )

		     ->set_category( 'yuna-custom-category')
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			      <?php
			      	$portfolioArgs = array(
			      		'posts_per_page' => -1,
			      		'orderby' 	 => 'date',
			      		'post_type'  => 'portfolio',
			      		'post_status'    => 'publish'
			      	);

			      	$portfolioList = new WP_Query( $portfolioArgs );

			      		  if ( $portfolioList->have_posts() ) :?>
					          <!-- Portfolio -->
					          <section class="portfolio indent animation-tracking">
						          <div class="container-fluid">
							          <div class="row first-up">
								          <h2 class="block-title col-12 text-center">
									          <span><?php echo $fields['yuna_main_portfolio_block_title'];?></span>
								          </h2>
								          <?php if( $fields['yuna_main_portfolio_sub_text'] ):?>
									          <p class="subtitle col-lg-8 offset-lg-2 text-center">* <?php echo $fields['yuna_main_portfolio_sub_text'];?></p>
								          <?php endif;?>
							          </div>
							          <div class="row second-up">
								          <div class="content col-12">
									          <?php while ( $portfolioList->have_posts() ) : $portfolioList->the_post();?>
										          <div class="item">
                                <div class="preview-pic">
                                  <img
                                      class="lazy"
                                      data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>"
                                      alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);?>"
                                  >
                                </div>
                                <div class="info">
                                  <button class="lock-info">
                                    <?php echo esc_html( pll__( 'Подробиці' ) ); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512.01 336.37"><path fill-rule="nonzero" d="M469.51 336.37H42.47c-9.9-.03-19.84-3.47-27.89-10.47-17.68-15.4-19.55-42.24-4.15-59.92L229.45 14.56c1.51-1.7 3.17-3.33 4.98-4.82 18.06-14.93 44.83-12.41 59.76 5.65l206.65 249.76a42.308 42.308 0 0 1 11.17 28.71c0 23.47-19.03 42.51-42.5 42.51z"/></svg>
                                  </button>
                                  <div class="inner">
                                    <h3 class="name"><?php the_title();?></h3>
                                    <p class="description"><?php echo carbon_get_post_meta(get_the_ID(), 'yuna_portfolio_card_description');?></p>
                                    <a href="<?php echo carbon_get_post_meta(get_the_ID(), 'yuna_portfolio_card_link');?>" rel="nofollow" class="more" >
	                                    <?php echo esc_html( pll__( 'Дивитись' ) ); ?>
                                      <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 404.39"><path fill-rule="nonzero" d="M438.95 219.45 0 219.99v-34.98l443.3-.55L269.8 25.79 293.39 0 512 199.92 288.88 404.39l-23.59-25.8z"/></svg>
                                    </a>
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




