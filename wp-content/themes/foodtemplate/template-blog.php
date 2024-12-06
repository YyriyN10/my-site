<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template blog
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package foodtemplate
	 *
	 */

	get_header();?>
<?php
	$blogMainImage = carbon_get_post_meta(get_the_ID(), 'food_blog_page_main_screen_image');
	$blogMainTitle = carbon_get_post_meta(get_the_ID(), 'food_blog_page_main_screen_title');
	$blogMainText = carbon_get_post_meta(get_the_ID(), 'food_blog_page_main_screen_text');

	if( $blogMainImage && $blogMainTitle):?>
		<!-- main screen -->
		<section class="blog-main-screen main-screen main-screen--big indent-horizontal" style="background-image: url(<?php echo $blogMainImage;?>)">
			<div class="container-fluid">
				<div class="row">
					<div class="content col-12 text-center">
						<h1 class="heading heading-big"><?php echo $blogMainTitle;?></h1>
						<p><?php echo $blogMainText;?></p>
					</div>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php
	$blogArgs = array(
		'posts_per_page' => 4,
		'orderby' 	 => 'date',
		'post_type'  => 'blog',
		'post_status'    => 'publish'
	);

	$blogList = new WP_Query( $blogArgs );

	if ( $blogList->have_posts() ) :?>

      <!-- Blog -->
      <section class="home-blog indent-horizontal">
        <div class="container-fluid">
          <div class="row content" id="blog-list">
			  <?php while ( $blogList->have_posts() ) : $blogList->the_post(); ?>
				  <?php get_template_part('template-parts/blog-item');?>
			  <?php endwhile;?>
          </div>
        </div>
        <div id="blog-scroll-detection"></div>
      </section>
	<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php get_footer();
