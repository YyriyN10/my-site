<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Register a tour post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna1.0
	 */

	function tour_post_type() {

		$labels = array(
			'name'               => _x( 'Наші тури', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Наші тури', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Наші тури', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Наші тури', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Додати новий тур', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Додати новий тур', 'yuna' ),
			'new_item'           => __( 'Новий тур', 'yuna' ),
			'edit_item'          => __( 'Редагувати тур', 'yuna' ),
			'view_item'          => __( 'Дивитись тур', 'yuna' ),
			'all_items'          => __( 'Всі тури', 'yuna' ),
			'search_items'       => __( 'Шукати тур', 'yuna' ),
			'parent_item_colon'  => __( 'Батько туру:', 'yuna' ),
			'not_found'          => __( 'Тур не знайдено', 'yuna' ),
			'not_found_in_trash' => __( 'У кошику турів не знайдно', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'tour' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'tour' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-palmtree',
			'supports'           => array( 'title', 'thumbnail', 'excerpt')
		);

		register_post_type( 'tour', $args );
	}

	add_action( 'init', 'tour_post_type' );

	/**
	 * Register a team post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna1.0
	 */

	function team_post_type() {

		$labels = array(
			'name'               => _x( 'Наша команда', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Наша команда', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Наша команда', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Наша команда', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Додати нового співробітника', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Додати нового співробітника', 'yuna' ),
			'new_item'           => __( 'Новий співробітник', 'yuna' ),
			'edit_item'          => __( 'Редагувати співробітника', 'yuna' ),
			'view_item'          => __( 'Дивитись співробітника', 'yuna' ),
			'all_items'          => __( 'Всі співробітники', 'yuna' ),
			'search_items'       => __( 'Шукати співробітника', 'yuna' ),
			'parent_item_colon'  => __( 'Батько співробітника:', 'yuna' ),
			'not_found'          => __( 'Співробітника не знайдено', 'yuna' ),
			'not_found_in_trash' => __( 'У кошику співробітників не знайдно', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'team' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'team' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-groups',
			'supports'           => array( 'title', 'thumbnail', 'excerpt')
		);

		register_post_type( 'team', $args );
	}

	add_action( 'init', 'team_post_type' );

	/**
	 * Register a reviews post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna1.0
	 */

	function reviews_post_type() {

		$labels = array(
			'name'               => _x( 'Відгуки', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Відгуки', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Відгуки', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Відгуки', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Додати новий відгук', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Додати новий відгук', 'yuna' ),
			'new_item'           => __( 'Новий відгук', 'yuna' ),
			'edit_item'          => __( 'Редагувати відгук', 'yuna' ),
			'view_item'          => __( 'Дивитись відгук', 'yuna' ),
			'all_items'          => __( 'Всі відгуки', 'yuna' ),
			'search_items'       => __( 'Шукати відгук', 'yuna' ),
			'parent_item_colon'  => __( 'Батько відгука:', 'yuna' ),
			'not_found'          => __( 'Відгук не знайдено', 'yuna' ),
			'not_found_in_trash' => __( 'У кошику відгуків не знайдно', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'reviews' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'reviews' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 7,
			'menu_icon'          => 'dashicons-format-status',
			'supports'           => array( 'title', 'thumbnail')
		);

		register_post_type( 'reviews', $args );
	}

	add_action( 'init', 'reviews_post_type' );
