<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Register a Portfolio post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna1.0
	 */

	function portfolio_post_type() {

		$labels = array(
			'name'               => _x( 'Портфоліо', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Портфоліо', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Портфоліо', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Портфоліо', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Додати новий кейс', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Додати новий кейс', 'yuna' ),
			'new_item'           => __( 'Новий кейс', 'yuna' ),
			'edit_item'          => __( 'Редагувати кейс', 'yuna' ),
			'view_item'          => __( 'Дивитись кейс', 'yuna' ),
			'all_items'          => __( 'Всі кейси', 'yuna' ),
			'search_items'       => __( 'Шукати кейс', 'yuna' ),
			'parent_item_colon'  => __( 'Батько кейсу:', 'yuna' ),
			'not_found'          => __( 'Кейс не знайдено', 'yuna' ),
			'not_found_in_trash' => __( 'У кошику кейсів не знайдно', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'portfolio' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'portfolio' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-portfolio',
			'supports'           => array( 'title', 'thumbnail',)
		);

		register_post_type( 'portfolio', $args );
	}

	add_action( 'init', 'portfolio_post_type' );

