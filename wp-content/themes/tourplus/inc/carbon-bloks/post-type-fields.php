<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_review_card' );

	function yuna_review_card(){

		Container::make( 'post_meta', __('Review card') )
		         ->where( 'post_type', '=', 'reviews' )
		         ->add_fields( array(
			         Field::make_textarea('yuna_review_card_text', 'Текст відгуку' ),
		         ) );
	}

	add_action( 'carbon_fields_register_fields', 'yuna_team_card' );

	function yuna_team_card(){

		Container::make( 'post_meta', __('Team card') )
		         ->where( 'post_type', '=', 'team' )
		         ->add_fields( array(
			         Field::make_text('yuna_team_card_position', 'Посада' ),
		         ) );
	}

	add_action( 'carbon_fields_register_fields', 'yuna_tour_card' );

	function yuna_tour_card(){

		Container::make( 'post_meta', __('Tour card') )
		         ->where( 'post_type', '=', 'tour' )
		         ->add_fields( array(
			         Field::make_text('yuna_tour_card_price', 'Вартість' ),
			         Field::make_rich_text('yuna_tour_card_description', 'Опис туру')
		         ) );
	}




