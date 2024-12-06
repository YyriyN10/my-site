<?php

	/*
	 * Plugin Name: Yuna Cabinet
	 * Plugin URI: https://yuna.com.ua
	 * Description: A plugin that impliments Yuna Functionality;
	 * Version: 1.0.0
	 * Author: Yuriy Naiden
	 * Author URI: https://yuna.com.ua
	 * License: GPLv2 or later
	 * Text Domain: yuna-cabinet
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	define ( 'YUNA_CAB_DIR', plugin_dir_path(__FILE__) );
	define ( 'YUNA_CAB_URL', plugin_dir_url(__FILE__) );
	define ( 'YUNA_CAB_TD', 'yuna-cabinet' );

	add_action( 'admin_menu', 'yunaCabinetOptions');

	function yunaCabinetOptions(){

		add_menu_page(
			'Налаштування особистого кабінету',
			'Опції особистого кабінету',
			'manage_options',
			'yuna-cabinet-options',
			'render_cabinet_options',
			'',
			10
		);

	}

	/**
	 * Init carbon fields
	 */

	add_action('plugins_loaded', 'yuna_cabinet_init_fields');

	function yuna_cabinet_init_fields(){

		require YUNA_CAB_DIR . 'vendor/autoload.php';

		\Carbon_Fields\Carbon_Fields::boot();
	}

	/**
	 * Carbon multilang
	 */

	function yuna_cabinet_lang_prefix() {
		$prefix = '';
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
			return $prefix;
		}
		$prefix = '_' . ICL_LANGUAGE_CODE;
		return $prefix;
	}

	function render_cabinet_options(){

		require YUNA_CAB_DIR . '/template/option-page.php';
	}


	function yunaCabinetScripts() {

		wp_enqueue_style('yuna-cabinet-styles', YUNA_CAB_URL . '/assets/css/yuna-cabinet.min.css', array(), _S_VERSION);

		wp_enqueue_script( 'yuna-cabinet-js', YUNA_CAB_URL . '/assets/js/yuna-cabinet.min.js', array('jquery'), _S_VERSION, true );

	}

	add_action( 'wp_enqueue_scripts', 'yunaCabinetScripts' );

	/**
	 * Init theme Ajax
	 */

	add_action( 'wp_enqueue_scripts', 'yuna_ajax_data', 99 );
	function yuna_ajax_data(){

		wp_localize_script('yuna-cabinet-js', 'yuna_ajax',
			array(
				'url' => admin_url('admin-ajax.php')
			)
		);

	}

	require YUNA_CAB_DIR . '/inc/functions.php';







