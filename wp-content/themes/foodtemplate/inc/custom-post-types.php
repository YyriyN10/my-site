<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Register a menu post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna1.0
	 */

	function menu_post_type() {

		$labels = array(
			'name'               => _x( 'Наше меню', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Наше меню', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Наше меню', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Наше меню', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Додати нову позицію', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Додати нову позицію', 'yuna' ),
			'new_item'           => __( 'Нова позиція', 'yuna' ),
			'edit_item'          => __( 'Редагувати позицію', 'yuna' ),
			'view_item'          => __( 'Дивитись позицію', 'yuna' ),
			'all_items'          => __( 'Всі позиції', 'yuna' ),
			'search_items'       => __( 'Шукати позицію', 'yuna' ),
			'parent_item_colon'  => __( 'Батько позиції:', 'yuna' ),
			'not_found'          => __( 'Позицію не знайдено', 'yuna' ),
			'not_found_in_trash' => __( 'У кошику позицій не знайдено', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => ['menu_tax'],
			'description'        => __( 'Description.', 'our_menu' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'our_menu' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-book',
			'supports'           => array( 'title', 'thumbnail', 'excerpt')
		);

		register_post_type( 'our_menu', $args );
	}

	add_action( 'init', 'menu_post_type' );

	add_action( 'init', 'menu_taxonomy' );
	function menu_taxonomy(){

		register_taxonomy('menu_tax', 'our_menu', array(
			'label'                 => 'menu_tax', // определяется параметром $labels->name
			'labels'                => array(
				'name'              => 'Категорії меню',
				'singular_name'     => 'Категорія меню',
				'search_items'      => 'Пошук категорії меню',
				'all_items'         => 'Всі категорії меню',
				'view_item '        => 'View Genre',
				'parent_item'       => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Редагувати категорію меню',
				'update_item'       => 'Оновити категорію меню',
				'add_new_item'      => 'Додати категорію меню',
				'new_item_name'     => 'New Genre Name',
				'menu_name'         => 'Категорії меню',
			),
			'description'           => 'menu_tax', // описание таксономии
			'public'                => true,
			'publicly_queryable'    => true, // равен аргументу public
			'show_in_nav_menus'     => true, // равен аргументу public
			'show_ui'               => true, // равен аргументу public
			'show_in_menu'          => true, // равен аргументу show_ui
			'show_tagcloud'         => true, // равен аргументу show_ui
			'show_in_rest'          => true, // добавить в REST API
			'rest_base'             => true, // $taxonomy
			'hierarchical'          => true,
			'supports'           => array( 'title', 'thumbnail', 'revisions' ),

			/*'update_count_callback' => '_update_post_term_count',*/
			'rewrite'               => array('slug' => 'our_menu'),
			'capabilities'          => array(),
			'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
			'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
			/*'_builtin'              => false,*/
			'show_in_quick_edit'    => true, // по умолчанию значение show_ui
		) );
	}

	/**
	 * Register a blog post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna1.0
	 */

	function blog_post_type() {

		$labels = array(
			'name'               => _x( 'Блог', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Блог', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Блог', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Блог', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Додати нову статтю', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Додати нову статтю', 'yuna' ),
			'new_item'           => __( 'Нова стаття', 'yuna' ),
			'edit_item'          => __( 'Редагувати статтю', 'yuna' ),
			'view_item'          => __( 'Дивитись статтю', 'yuna' ),
			'all_items'          => __( 'Всі статті', 'yuna' ),
			'search_items'       => __( 'Шукати статтю', 'yuna' ),
			'parent_item_colon'  => __( 'Батько статті:', 'yuna' ),
			'not_found'          => __( 'Статтю не знайдено', 'yuna' ),
			'not_found_in_trash' => __( 'У кошику статтей не знайдено', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => ['blog_tax'],
			'description'        => __( 'Description.', 'blog' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'blog' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-excerpt-view',
			'supports'           => array( 'title', 'thumbnail', 'excerpt')
		);

		register_post_type( 'blog', $args );
	}

	add_action( 'init', 'blog_post_type' );

	add_action( 'init', 'blog_taxonomy' );
	function blog_taxonomy(){

		register_taxonomy('blog_tax', 'blog', array(
			'label'                 => 'blog_tax', // определяется параметром $labels->name
			'labels'                => array(
				'name'              => 'Категорії',
				'singular_name'     => 'Категорія',
				'search_items'      => 'Пошук категорії',
				'all_items'         => 'Всі категорії',
				'view_item '        => 'View Genre',
				'parent_item'       => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Редагувати категорію',
				'update_item'       => 'Оновити категорію',
				'add_new_item'      => 'Додати категорію',
				'new_item_name'     => 'New Genre Name',
				'menu_name'         => 'Категорії',
			),
			'description'           => 'blog_tax', // описание таксономии
			'public'                => true,
			'publicly_queryable'    => true, // равен аргументу public
			'show_in_nav_menus'     => true, // равен аргументу public
			'show_ui'               => true, // равен аргументу public
			'show_in_menu'          => true, // равен аргументу show_ui
			'show_tagcloud'         => true, // равен аргументу show_ui
			'show_in_rest'          => true, // добавить в REST API
			'rest_base'             => true, // $taxonomy
			'hierarchical'          => true,
			'supports'           => array( 'title', 'thumbnail', 'revisions' ),

			/*'update_count_callback' => '_update_post_term_count',*/
			'rewrite'               => array('slug' => 'blog'),
			'capabilities'          => array(),
			'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
			'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
			/*'_builtin'              => false,*/
			'show_in_quick_edit'    => true, // по умолчанию значение show_ui
		) );
	}

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
			'parent_item_colon'  => __( 'Батько відгуку:', 'yuna' ),
			'not_found'          => __( 'Відгук не знайдено', 'yuna' ),
			'not_found_in_trash' => __( 'У кошику відгуків не знайдено', 'yuna' )
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
			'menu_icon'          => 'dashicons-testimonial',
			'supports'           => array( 'title', 'thumbnail')
		);

		register_post_type( 'reviews', $args );
	}

	add_action( 'init', 'reviews_post_type' );
