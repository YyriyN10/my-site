<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	add_action('init', 'yuna_polylang_strings' );

	function yuna_polylang_strings() {

		if( ! function_exists( 'pll_register_string' ) ) {
			return;
		}

		pll_register_string(
			'yuna_btn_main_screen',
			'Залишити повідомлення',
			'Кнопки',
			false
		);

		pll_register_string(
			'yuna_btn_portfolio_go_to',
			'Дивитись',
			'Кнопки',
			false
		);

		pll_register_string(
			'yuna_btn_form',
			'Надіслати',
			'Кнопки',
			false
		);

		pll_register_string(
			'yuna_form_placeholder_name',
			'Імʼя',
			'Форма',
			false
		);

		pll_register_string(
			'yuna_form_placeholder_phone',
			'Телефон',
			'Форма',
			false
		);



	}