<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'food_contact_page');

	function food_contact_page(){
		Container::make( 'post_meta', __('Contact page'))
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-contact.php' );
		         } )

		         ->add_tab( __( 'Main screen' ), array(
			         Field::make_text('food_contact_page_main_screen_title', 'Головний заголовок'),
			         Field::make_text('food_contact_page_main_screen_text', 'Текст'),
			         Field::make_image('food_contact_page_main_screen_image', 'Фонове зображення')
			              ->set_type('image')
			              ->set_value_type('url')

		         ) )

				->add_tab( __( 'Content' ), array(
					Field::make_image('food_contact_page_left_image', 'Ліве зображення')
					     ->set_type('image'),
					Field::make_image('food_contact_page_right_image', 'Праве зображення')
					     ->set_type('image'),
					Field::make_text('food_contact_page_map_link', 'Посилання на мапі')
						->set_attribute('type', 'url'),
					Field::make_rich_text('food_contact_page_contact_text'),
					Field::make_text('food_contact_page_location_text')

				) )

		         ->add_tab( __( 'Reservation' ), array(
			         Field::make_text('food_contact_page_reservation_title', 'Заголовок блоку'),
			         Field::make_rich_text('food_contact_page_reservation_text', 'Текст блоку'),

		         ) );
	}