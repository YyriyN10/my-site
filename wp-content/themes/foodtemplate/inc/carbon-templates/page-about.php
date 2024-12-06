<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'food_about_page');

	function food_about_page(){
		Container::make( 'post_meta', __('About page'))
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-about.php' );
		         } )

		         ->add_tab( __( 'Main screen' ), array(
			         Field::make_text('food_about_page_main_screen_title', 'Головний заголовок'),
			         Field::make_text('food_about_page_main_screen_text', 'Текст'),
			         Field::make_image('food_about_page_main_screen_image', 'Фонове зображення')
			              ->set_type('image')
			              ->set_value_type('url')

		         ) )

				->add_tab( __( 'Our story' ), array(
					Field::make_text('food_about_page_story_title', 'Заголовок блоку'),
					Field::make_rich_text('food_about_page_story_text', 'Текст блоку'),
					Field::make_image('food_about_page_story_image', 'Зображення')
						->set_type('image')
				) )

		         ->add_tab( __( 'Team' ), array(
		         	 Field::make_complex('food_about_page_team_list', 'Перелік працівників')
			            ->add_fields(array(
			            	Field::make_text('name', 'Імʼя'),
				            Field::make_text('position', 'Посада'),
				            Field::make_image('image', 'Зображення')
				                ->set_type('image'),
				            Field::make_rich_text('text', 'Текст')
			            ))
		         ) )

				->add_tab( __( 'Video' ), array(
					Field::make_text('food_about_page_video_title', 'Заголовок блоку'),
					Field::make_text('food_about_page_video_text', 'Заголовок блоку'),
					Field::make_image('food_about_page_video_poster', 'Постер відео')
						->set_value('image')
						->set_value_type('url'),
					Field::make_image('food_about_page_video_file', 'Файл з відео')
						->set_type('video')
						->set_value_type('url')
				) )

				->add_tab( __( 'Process' ), array(
					Field::make_text('food_about_page_process_title', 'Заголовок блоку'),
					Field::make_complex('food_about_page_process_list', 'Перелік кроків')
					     ->add_fields(array(
						     Field::make_text('name', 'Назва'),
						     Field::make_image('image', 'Зображення')
						          ->set_type('image'),
						     Field::make_rich_text('text', 'Текст')
					     ))
				) )

		         ->add_tab( __( 'Reservation' ), array(
			         Field::make_text('food_about_page_reservation_title', 'Заголовок блоку'),
			         Field::make_rich_text('food_about_page_reservation_text', 'Текст блоку'),

		         ) );
	}