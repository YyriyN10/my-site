<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'food_portfolio_page');

	function food_portfolio_page(){
		Container::make( 'post_meta', __('Portfolio page'))
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-portfolio.php' );
		         } )

		         ->add_tab( __( 'Main screen' ), array(
			         Field::make_text('food_portfolio_page_main_screen_title', 'Головний заголовок'),
			         Field::make_image('food_portfolio_page_main_screen_image', 'Фонове зображення')
			              ->set_type('image')
			              ->set_value_type('url')

		         ) );

	}