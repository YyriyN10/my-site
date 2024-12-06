<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'food_menu_post_type');

	function food_menu_post_type(){
		Container::make( 'post_meta', __('Menu card') )
		         ->where( 'post_type', '=', 'our_menu' )
		         ->add_fields( array(
			         Field::make_text('food_menu_post_type_price', 'Вартість страви' ),
			         Field::make_image('food_menu_post_type_main_image', 'Головне зображення')
			              ->set_type('image')
		                  ->set_value_type('url'),
			         Field::make_rich_text('food_menu_post_type_first_text_part', 'Перший текстовий блок'),
			         Field::make_rich_text('food_menu_post_type_second_text_part', 'Другий текстовий блок'),
			         Field::make_rich_text('food_menu_post_type_third_text_part', 'Третій текстовий блок'),
			         Field::make_image('food_menu_post_type_small_image', 'Мале зображення')
			            ->set_type('image'),
			         Field::make_image('food_menu_post_type_medium_image', 'Середнє зображення')
			              ->set_type('image'),
			         Field::make_image('food_menu_post_type_big_image', 'Велике зображення')
			              ->set_type('image')
		         ) );
	}

	add_action('carbon_fields_register_fields', 'food_reviews_post_type');

	function food_reviews_post_type(){
		Container::make( 'post_meta', __('Reviews card') )
		         ->where( 'post_type', '=', 'reviews' )
		         ->add_fields( array(
			         Field::make_textarea('food_reviews_text', 'Текст відгуку' ),
			         Field::make_text('food_reviews_position', 'Чим займається' ),
		         ) );
	}

	add_action('carbon_fields_register_fields', 'food_blog_post_type');

	function food_blog_post_type(){
		Container::make( 'post_meta', __('Blog card') )
		         ->where( 'post_type', '=', 'blog' )
		         ->add_fields( array(
		         	Field::make_image('food_blog_content_main_image', 'Зображення головного екрану')
						->set_type('image')
						->set_value_type('url'),
			         Field::make_textarea('food_blog_content_top_qute', 'Виділиний текст з верху'),
			         Field::make_image('food_blog_content_image_left', 'Зображення ліворуч')
			            ->set_type('image'),
			         Field::make_image('food_blog_content_image_right', 'Зображення праворуч')
			              ->set_type('image'),
			         Field::make_rich_text('food_blog_content_text_top', 'Довільний текст'),
			         Field::make_image('food_blog_content_image_banner', 'Зображення на банері')
			            ->set_type('image')
		                ->set_value_type('url'),
			         Field::make_text('food_blog_content_text_banner', 'Текст банеру'),
			         Field::make_rich_text('food_blog_content_text_bottom', 'Довільний текст')
		         ) );
	}