<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'food_options' );

	function food_options() {
		Container::make( 'theme_options', __('Options'))
		         ->set_icon( 'dashicons-admin-generic' )
		         ->add_tab( __( 'Contacts' ), array(
			         Field::make_text('food_option_rial_address', 'Адреса'),
			         Field::make_text('food_option_phone', 'Телефон'),
			         Field::make_text('food_option_email', 'E-mail')
			              ->set_attribute('type', 'email'),

		         ) )

		         ->add_tab( __( 'Social' ), array(
			         Field::make_text('food_option_facebook_link', 'Facebook')
			              ->set_attribute('type', 'url'),
			         Field::make_text('food_option_instagram_link', 'Instagram')
			              ->set_attribute('type', 'url'),
			         Field::make_text('food_option_twitter_link', 'Twitter')
			              ->set_attribute('type', 'url'),
			         Field::make_text('food_option_twitter_youtube', 'Youtube')
			              ->set_attribute('type', 'url'),

		         ) )

		         ->add_tab( __( 'Footer' ), array(
			         Field::make_text('food_option_footer_logo_text', 'Назва компанії'),
			         Field::make_text('food_option_footer_contacts_text', 'Заголовок контактів'),
			         Field::make_text('food_option_footer_form_title', 'Заголовок форми'),
			         Field::make_text('food_option_footer_form_text', 'Текст форми'),
			         Field::make_text('food_option_footer_copy_text', 'Текст копірайту'),
		         ) )

				->add_tab( __( 'Open Time' ), array(
					Field::make_text('food_option_open_time_week', 'Робочі дні'),
					Field::make_text('food_option_open_time_brunch', 'Час бранчу'),
					Field::make_text('food_option_open_time_lunch', 'Час ланчу'),
					Field::make_text('food_option_open_time_dinner', 'Час вечері'),
				) );

	}
