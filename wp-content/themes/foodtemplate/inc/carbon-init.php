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
	 * Add templates
	 */

	require ('carbon-templates/options.php');
	require ('carbon-templates/home-page.php');
	require ('carbon-templates/post-fields.php');
	require ('carbon-templates/menu-page.php');
	require ('carbon-templates/contact-page.php');
	require ('carbon-templates/page-about.php');
	require ('carbon-templates/portfolio-page.php');
	require ('carbon-templates/blog-page.php');
