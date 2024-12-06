<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

add_action( 'wp_enqueue_scripts', 'foodtemplate_ajax_data', 99 );
function foodtemplate_ajax_data(){

wp_localize_script('foodtemplate-main-js', 'foodtemplate_ajax',
	array(
		'url' => admin_url('admin-ajax.php')
	)
);

}

/**
 * Portfolio infinite scroll
 */

add_action('wp_ajax_portfolio_scroll', 'portfolio_scroll_callback');
add_action('wp_ajax_nopriv_portfolio_scroll', 'portfolio_scroll_callback');

function portfolio_scroll_callback(){

	$pageNumber = $_POST['pageNumber'];
	$catId = $_POST['catId'];

	if ( $pageNumber > 1 ){
		$offset = ($pageNumber * 4) + 6;
	}else{
		$offset = 6;
	}


	if ( $catId == 0 ){

		$portfolioArgs = array(
			'posts_per_page' => 4,
			'orderby' 	 => 'date',
			'post_type'  => 'our_menu',
			'post_status'    => 'publish',
			'offset' => $offset
		);

		$portfolioList = new WP_Query( $portfolioArgs );

		if ( $portfolioList->have_posts() ) :?>
				<?php while ( $portfolioList->have_posts() ) : $portfolioList->the_post(); ?>
					<?php get_template_part('template-parts/portfolio-loop');?>
				<?php endwhile;?>
			<?php endif; ?>
		<?php wp_reset_postdata();

	}else{
		$portfolioArgs = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'menu_tax',
					'field' => 'id',
					'lang' => false,
					'suppress_filters' => false,
					'terms' => $catId
				)
			),
			'posts_per_page' => 4,
			'orderby' 	 => 'date',
			'post_type'  => 'our_menu',
			'post_status'    => 'publish',
			'offset' => $offset
		);

		$portfolioList = new WP_Query( $portfolioArgs );

		if ( $portfolioList->have_posts() ) :?>
			<?php while ( $portfolioList->have_posts() ) : $portfolioList->the_post(); ?>
				<?php get_template_part('template-parts/portfolio-loop');?>
			<?php endwhile;?>
		<?php endif; ?>
		<?php wp_reset_postdata();
	}

	wp_die();
}

/**
 * Portfolio change category
 */

add_action('wp_ajax_portfolio_change_category', 'portfolio_change_category_callback');
add_action('wp_ajax_nopriv_portfolio_change_category', 'portfolio_change_category_callback');

function portfolio_change_category_callback(){

	$catId = $_POST['catId'];

	$i = 0;

	if ( $catId == 0 ){

		$portfolioArgs = array(
			'posts_per_page' => 6,
			'orderby' 	 => 'date',
			'post_type'  => 'our_menu',
			'post_status'    => 'publish',
		);

		$portfolioList = new WP_Query( $portfolioArgs );

		if ( $portfolioList->have_posts() ) :?>
			<?php while ( $portfolioList->have_posts() ) : $portfolioList->the_post(); $i++;?>
				<?php get_template_part('template-parts/portfolio-category','', $i);?>
			<?php endwhile;?>
		<?php endif; ?>
		<?php wp_reset_postdata();

	}else{
		$portfolioArgs = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'menu_tax',
					'field' => 'id',
					'lang' => false,
					'suppress_filters' => false,
					'terms' => $catId
				)
			),
			'posts_per_page' => 6,
			'orderby' 	 => 'date',
			'post_type'  => 'our_menu',
			'post_status'    => 'publish',
		);

		$portfolioList = new WP_Query( $portfolioArgs );

		if ( $portfolioList->have_posts() ) :?>
			<?php while ( $portfolioList->have_posts() ) : $portfolioList->the_post(); $i++;?>
				<?php get_template_part('template-parts/portfolio-category', '', $i);?>
			<?php endwhile;?>
		<?php endif; ?>
		<?php wp_reset_postdata();
	}

	wp_die();
}

/**
 * Blog infinite scroll
 */

add_action('wp_ajax_blog_scroll', 'blog_scroll_callback');
add_action('wp_ajax_nopriv_blog_scroll', 'blog_scroll_callback');

function blog_scroll_callback(){

	$pageNumber = $_POST['pageNumber'];

	if ( $pageNumber > 1 ){
		$offset = ($pageNumber * 4) + 4;
	}else{
		$offset = 4;
	}

	$blogArgs = array(
		'posts_per_page' => 4,
		'orderby' 	 => 'date',
		'post_type'  => 'blog',
		'post_status'    => 'publish',
		'offset' => $offset
	);

	$blogList = new WP_Query( $blogArgs );

	if ( $blogList->have_posts() ) :?>
		<?php while ( $blogList->have_posts() ) : $blogList->the_post(); ?>
			<?php get_template_part('template-parts/blog-item');?>
		<?php endwhile;?>
	<?php endif; ?>
	<?php wp_reset_postdata();

	wp_die();
}