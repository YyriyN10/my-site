<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_cgbc_options' );

	function yuna_cgbc_options() {
		Container::make( 'theme_options', __('Options'))
		         ->set_icon( 'dashicons-admin-generic' )
		         ->add_tab( __( 'Contacts' ), array(
			         Field::make_text('clinic_rial_address', 'Адреса клініки'),

		         ) )

		         ->add_tab( __( 'Site options' ), array(
			         Field::make_association('policy_page', 'Сторінка політики конфіденційності')
			              ->set_types( array(
				              array(
					              'type'      => 'post',
					              'post_type' => 'page',
				              )
			              ) )
			              ->set_max( 1 )


		         ) )

		         ->add_tab( __( 'Contact form options' ), array(

		         ) );

	}
