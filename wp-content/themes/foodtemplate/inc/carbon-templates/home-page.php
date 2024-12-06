<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'food_home_page' );

	function food_home_page() {
		Container::make( 'post_meta', __('Home page'))
			->where( function( $homeFields ) {
				$homeFields->where( 'post_type', '=', 'page' );
				$homeFields->where( 'post_template', '=', 'template-home.php' );
			} )

		         ->add_tab( __( 'Main screen' ), array(
			         Field::make_text('food_home_page_main_screen_title', 'Головний заголовок'),
			         Field::make_text('food_home_page_main-screen_text', 'Текст'),
			         Field::make_image('food_home_page_main-screen_image', 'Зображення')
			            ->set_type('image'),
			         Field::make_complex('food_home_page_main-screen_image_spices', 'Зображення спецій')
			            ->add_fields(array(
			            	Field::make_image('image', 'Зображення спеції')
				                ->set_type('image')
			            ))

		         ) )

		         ->add_tab( __( 'Diet plan' ), array(
			         Field::make_text('food_home_page_diet_title', 'Заголовок блоку'),
			         Field::make_rich_text('food_home_page_diet_left_text', 'Текст у лівій колонці'),
			         Field::make_rich_text('food_home_page_diet_right_text', 'Текст у правій колонці'),
			         Field::make_image('food_home_page_diet_left_image', 'Зображення в лівій колонці')
			            ->set_type('image'),
			         Field::make_image('food_home_page_diet_right_image', 'Зображення в правій колонці')
			              ->set_type('image'),

		         ) )

		         ->add_tab( __( 'Our menu' ), array(
			         Field::make_text('food_home_page_our_menu_title', 'Заголовок блоку'),
			         Field::make_rich_text('food_home_page_our_menu_text', 'Текст блоку'),
			         Field::make_image('food_home_page_our_menu_image', 'Зображення блоку')
			            ->set_type('image')
		         ) )

				->add_tab( __( 'Cook' ), array(
					Field::make_text('food_home_page_cook_title', 'Заголовок блоку'),
					Field::make_rich_text('food_home_page_cook_text', 'Текст блоку'),
					Field::make_image('food_home_page_cook_image', 'Зображення')
					     ->set_type('image'),

				) )

				->add_tab( __( 'Advantages' ), array(
					Field::make_complex('food_home_page_advantages_list', 'Перелік переваг')
						->add_fields(array(
							Field::make_image('icon', 'Іконка')
							     ->set_type('image')
							     ->set_value_type('url'),
							Field::make_text('name', 'Назва'),
							Field::make_text('description', 'Опис'),

						))
				) )

				->add_tab( __( 'Reservation' ), array(
					Field::make_text('food_home_page_reservation_title', 'Заголовок блоку'),
					Field::make_rich_text('food_home_page_reservation_text', 'Текст блоку'),

				) )

				->add_tab( __( 'Calories' ), array(
					Field::make_text('food_home_page_calories_title', 'Заголовок блоку'),
					Field::make_rich_text('food_home_page_calories_text', 'Текст блоку'),
					Field::make_complex('food_home_page_calories_list', 'Послідовність')
						->add_fields(array(
							Field::make_text('name', 'Назва'),
							Field::make_image('image', 'Зображення')
								->set_type('image')
						))

				) );



	}
