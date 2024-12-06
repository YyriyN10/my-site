<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template portfolio
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package foodtemplate
	 *
	 */

	get_header();?>

<?php
	$portfolioMainTitle = carbon_get_post_meta(get_the_ID(), 'food_portfolio_page_main_screen_title');
	$portfolioMainText = carbon_get_post_meta(get_the_ID(), 'food_portfolio_page_main_screen_text');
	$portfolioMainImage = carbon_get_post_meta(get_the_ID(), 'food_portfolio_page_main_screen_image');

	if( $portfolioMainTitle && $portfolioMainImage ):?>
		<!-- main screen -->
		<section class="portfolio-main-screen main-screen main-screen--big indent-horizontal" style="background-image: url(<?php echo $portfolioMainImage;?>)">
			<div class="container-fluid">
				<div class="row">
					<div class="content col-12 text-center">
						<h1 class="heading heading-big"><?php echo $portfolioMainTitle;?></h1>
					</div>
				</div>
			</div>
			<div class="scroll-element">
				<span class="scroll-element__text">Scroll</span>
				<span class="dash-wrapper">
              <span class="dash"></span>
            </span>
			</div>
		</section>
	<?php endif;?>

	 <?php

		$portfolioCat = get_categories( array(
			'taxonomy'     => 'menu_tax',
			'type'         => 'our_menu',
			'child_of'     => false,
			'parent'       => '',
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => false,
			'number'       => 0,
			'pad_counts'   => false,
		) );

		$i = 0;
		?>
	<!-- Portfolio -->
	<section class="our-portfolio indent-horizontal">
		<div class="container-fluid">
			<div class="row">
				<ul class="category-list col-12">
					<li class="category active">
						<a href="#" rel="nofollow" data-cat="0">All</a>
					</li>
					<?php if( $portfolioCat ):?>
						<?php foreach( $portfolioCat as $cat ):?>
							<li class="category">
								<a href="#" rel="nofollow" data-cat="<?php echo $cat->term_id;?>"><?php echo $cat->name;?></a>
							</li>
						<?php endforeach;?>

					<?php endif;?>
				</ul>
			</div>
			<div class="row portfolio-content" id="portfolio-content">
          <?php
              $portfolioArgs = array(
                'posts_per_page' => 6,
                'orderby' 	 => 'date',
                'post_type'  => 'our_menu',
                'post_status'    => 'publish'
              );

			$portfolioList = new WP_Query( $portfolioArgs );

			if ( $portfolioList->have_posts() ) :?>

				<?php while ( $portfolioList->have_posts() ) : $portfolioList->the_post(); $i++; ?>
					<a href="<?php the_permalink();?>"
						<?php if( $i === 1 || $i === 4):?>
							class="item col-lg-8 col-md-7 col-sm-6"
						<?php elseif ($i === 2 || $i === 3):?>
							class="item col-lg-4 col-md-5 col-sm-6"
						<?php else:?>
							class="item col-sm-6"
						<?php endif;?>
					>
            <span class="inner">
              <img
                  class="lazy"
                  data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>"
                  alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);?>"
              >
            <span class="info">
              <span class="name card-title"><?php the_title();?></span>
              <?php
	              $categoryList = get_the_terms(get_the_ID(), 'menu_tax');
              ?>
              <span class="cat-name">
                <?php foreach( $categoryList as $postCat ):?>
	                <?php echo $postCat->name;?>
                <?php endforeach;?>
              </span>
            </span>
            </span>


					</a>
				<?php endwhile;?>

			<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
      <div id="scroll-detected" >

      </div>
		</div>

	</section>


<?php get_footer();
