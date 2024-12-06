<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Register a curses post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna cabinet
	 */

	function yuna_cabinet_curses_post_type() {

		$labels = array(
			'name'               => _x( 'Курси', 'post type general name', YUNA_CAB_TD ),
			'singular_name'      => _x( 'Курс', 'post type singular name', YUNA_CAB_TD ),
			'menu_name'          => _x( 'Курси', 'admin menu', YUNA_CAB_TD ),
			'name_admin_bar'     => _x( 'Курси', 'add new on admin bar', YUNA_CAB_TD ),
			'add_new'            => _x( 'Додати новий курс', 'actions', YUNA_CAB_TD ),
			'add_new_item'       => __( 'Додати новий курс', YUNA_CAB_TD ),
			'new_item'           => __( 'Новий курс', YUNA_CAB_TD ),
			'edit_item'          => __( 'Редагувати курс', YUNA_CAB_TD ),
			'view_item'          => __( 'Переглянути курс', YUNA_CAB_TD ),
			'all_items'          => __( 'Всі курси', YUNA_CAB_TD ),
			'search_items'       => __( 'Шукати курс', YUNA_CAB_TD ),
			'parent_item_colon'  => __( 'Батько курсу:', YUNA_CAB_TD ),
			'not_found'          => __( 'Курс не знайдено.', YUNA_CAB_TD ),
			'not_found_in_trash' => __( 'У кошику курсу не знайдено.', YUNA_CAB_TD )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => ['yuna_cabinet_course_tax'],
			'description'        => __( 'Описание.', YUNA_CAB_TD ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'yuna_cabinet_curses' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-portfolio',
			'supports'           => array( 'title', 'thumbnail',)
		);

		register_post_type( 'yuna_cabinet_curses', $args );
	}

	add_action( 'init', 'yuna_cabinet_curses_post_type' );

	/**
	 * Register a lessons post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna cabinet
	 */

	function yuna_cabinet_lessons_post_type() {

		$labels = array(
			'name'               => _x( 'Уроки', 'post type general name', YUNA_CAB_TD ),
			'singular_name'      => _x( 'Урок', 'post type singular name', YUNA_CAB_TD ),
			'menu_name'          => _x( 'Уроки', 'admin menu', YUNA_CAB_TD ),
			'name_admin_bar'     => _x( 'Уроки', 'add new on admin bar', YUNA_CAB_TD ),
			'add_new'            => _x( 'Додати новий урок', 'actions', YUNA_CAB_TD ),
			'add_new_item'       => __( 'Додати новий урок', YUNA_CAB_TD ),
			'new_item'           => __( 'Новий урок', YUNA_CAB_TD ),
			'edit_item'          => __( 'Редагувати урок', YUNA_CAB_TD ),
			'view_item'          => __( 'Переглянути урок', YUNA_CAB_TD ),
			'all_items'          => __( 'Всі уроки', YUNA_CAB_TD ),
			'search_items'       => __( 'Шукати урок', YUNA_CAB_TD ),
			'parent_item_colon'  => __( 'Батько уроку:', YUNA_CAB_TD ),
			'not_found'          => __( 'Урок не знайдено.', YUNA_CAB_TD ),
			'not_found_in_trash' => __( 'У кошику уроку не знайдено.', YUNA_CAB_TD )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => ['yuna_cabinet_course_tax'],
			'description'        => __( 'Описание.', YUNA_CAB_TD ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'yuna_cabinet_lessons' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-list-view',
			'supports'           => array( 'title', 'thumbnail',)
		);

		register_post_type( 'yuna_cabinet_lessons', $args );
	}

	add_action( 'init', 'yuna_cabinet_lessons_post_type' );

	/**
	 * Register a course taxonomy.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna cabinet
	 */

	function yuna_cabinet_course_taxonomy(){

		register_taxonomy('yuna_cabinet_course_tax', array('yuna_cabinet_curses', 'yuna_cabinet_lessons'), array(
			'label'                 => 'yuna_cabinet_course_tax',
			'labels'                => array(
				'name'              => 'Курс',
				'singular_name'     => 'Курс',
				'search_items'      => 'Пошук курсу',
				'all_items'         => 'Всі курси',
				'view_item '        => 'Подивитий категорію',
				'edit_item'         => 'Редагувати курс',
				'update_item'       => 'Оновити курс',
				'add_new_item'      => 'Додати курс',
				'new_item_name'     => 'Новий курс',
				'menu_name'         => 'Курси',
			),
			'description'           => 'Таксономія для звʼязку курсів з уроками',
			'public'                => true,
			'publicly_queryable'    => true,
			'show_in_nav_menus'     => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_rest'          => true,
			'rest_base'             => true,
			'hierarchical'          => true,
			'supports'              => array( 'title', 'thumbnail', 'revisions' ),

			'rewrite'               => array('slug' => 'yuna_cabinet_curses'),
			'query_var'             => 'yuna_cabinet_course_tax',
			'capabilities'          => array(),
			'meta_box_cb'           => null,
			'show_admin_column'     => true,
			'show_in_quick_edit'    => true,
		) );
	}

	add_action( 'init', 'yuna_cabinet_course_taxonomy' );

