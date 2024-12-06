<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Add Carbon Fields
	 */

	add_action( 'after_setup_theme', 'carbon_load' );

	function carbon_load() {
		require get_template_directory() . '/vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}

	/**
	 * Create Block Category
	 */

	add_filter( 'block_categories_all' , function( $categories ) {

		$categories[] = array(
			'slug'  => 'yuna-custom-category',
			'title' => 'Yuna Blocks'
		);

		return $categories;
	} );

	/**
	 * Add Blocks
	 */

	require ('carbon-bloks/main-screen.php');
	require ('carbon-bloks/popular-tour.php');
	require ('carbon-bloks/about-us.php');
	require ('carbon-bloks/provide.php');
	require ('carbon-bloks/trip-gallery.php');
	require ('carbon-bloks/reviews.php');
	require ('carbon-bloks/post-type-fields.php');
	require ('carbon-bloks/our-team.php');
	require ('carbon-bloks/call-to-action.php');
	require ('carbon-bloks/options-page.php');
