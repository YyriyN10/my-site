<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_portfolio_card' );

	function yuna_portfolio_card(){

		Container::make( 'post_meta', __('Portfolio card') )
			->where( 'post_type', '=', 'portfolio' )
		     ->add_fields( array(
			     Field::make_text('yuna_portfolio_card_description', 'Коротки опис' ),
			     Field::make_text('yuna_portfolio_card_link', 'Посилання на приклад' ),
		     ) );



	}




