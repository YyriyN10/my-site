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
	 * WPML Support
	 */

	function yuna_lang_prefix() {
		$prefix = '';
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
			return $prefix;
		}

		$prefix = '_' . ICL_LANGUAGE_CODE;
		return $prefix;
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
	require ('carbon-blocks/options.php');
	require ('carbon-blocks/main-screen.php');
	require ('carbon-blocks/technology.php');
	require ('carbon-blocks/about.php');
	require ('carbon-blocks/what-do-you-get.php');
	require ('carbon-blocks/portfolio-card.php');
	require ('carbon-blocks/form.php');
	require ('carbon-blocks/portfolio.php');