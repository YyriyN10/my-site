<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'food_menu_page' );

	function food_menu_page(){
		Container::make( 'post_meta', __('Menu page'))
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-menu.php' );
		         } )

		         ->add_tab( __( 'Main screen' ), array(
			         Field::make_text('food_menu_page_main_screen_title', 'Головний заголовок'),
			         Field::make_text('food_menu_page_main-screen_text', 'Текст'),
			         Field::make_image('food_menu_page_main-screen_image', 'Фонове зображення')
			              ->set_type('image')
			            ->set_value_type('url')

		         ) )

				->add_tab( __( 'Starters' ), array(
					Field::make_text('food_menu_page_starters_title', 'Головний заголовок'),
					Field::make_rich_text('food_menu_page_starters_text', 'Текст'),
					Field::make_image('food_menu_page_starters_image', 'Зображення')
						->set_type('image'),
					Field::make_association('food_menu_page_starters_menu_type', 'Категорія страв')
						->set_types(array(
							array(
								'type' => 'term',
								'post-type' => 'our_menu'
							)
						))

				) )
				->add_tab( __( 'Mains' ), array(
					Field::make_text('food_menu_page_mains_title', 'Головний заголовок'),
					Field::make_rich_text('food_menu_page_mains_text', 'Текст'),
					Field::make_image('food_menu_page_mains_image', 'Зображення')
					     ->set_type('image'),
					Field::make_association('food_menu_page_mains_menu_type', 'Категорія страв')
					     ->set_types(array(
						     array(
							     'type' => 'term',
							     'post-type' => 'our_menu'
						     )
					     ))

				) )
				->add_tab( __( 'Pastries & Drinks' ), array(
					Field::make_text('food_menu_page_drinks_title', 'Головний заголовок'),
					Field::make_rich_text('food_menu_page_drinks_text', 'Текст'),
					Field::make_image('food_menu_page_drinks_image', 'Зображення')
					     ->set_type('image'),
					Field::make_association('food_menu_page_drinks_menu_type', 'Категорія страв')
					     ->set_types(array(
						     array(
							     'type' => 'term',
							     'post-type' => 'our_menu'
						     )
					     ))

				) )
				->add_tab( __( 'Reservation' ), array(
					Field::make_text('food_menu_page_reservation_title', 'Заголовок блоку'),
					Field::make_rich_text('food_menu_page_reservation_text', 'Текст блоку'),

				) );
	}