<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'tourplus_options' );

	function tourplus_options() {
		Container::make( 'theme_options', __('Options'))
		         ->set_icon( 'dashicons-admin-generic' )
		         ->add_tab( __( 'Contacts' ), array(
			         Field::make_text('tourplus_option_rial_address', 'Адреса'),
			         Field::make_text('tourplus_option_phone', 'Телефон'),
			         Field::make_text('tourplus_option_email', 'E-mail')
		                ->set_attribute('type', 'email'),

		         ) )

		         ->add_tab( __( 'Social' ), array(
			         Field::make_text('tourplus_option_facebook_link', 'Facebook')
			              ->set_attribute('type', 'url'),
			         Field::make_text('tourplus_option_instagram_link', 'Instagram')
			              ->set_attribute('type', 'url'),
			         Field::make_text('tourplus_option_twitter_link', 'Twitter')
			              ->set_attribute('type', 'url'),

		         ) )

		         ->add_tab( __( 'Site option' ), array(
					Field::make_rich_text('tourplus_option_footer_text', 'Текст у футері')
		         ) );

	}
