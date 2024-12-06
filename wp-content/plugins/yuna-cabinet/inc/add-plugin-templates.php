<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Add cabinet template
	 */

	add_filter( 'theme_page_templates', 'yuna_cabinet_templates', 10, 3 );

	function yuna_cabinet_templates( $templates ){

		$templates[ YUNA_CAB_DIR. 'template/cabinet-template.php'] = __( 'Template cabinet', YUNA_CAB_TD );

		return $templates;
	}

	add_filter( 'template_include', 'yuna_cabinet_change_page_template' );

	function yuna_cabinet_change_page_template($template){

		global $wp_query, $post;

		if (is_page()) {

			echo $post->ID;

			$meta = get_post_meta(get_the_ID());

			if (!empty($meta['_wp_page_template'][0]) && $meta['_wp_page_template'][0] != $template) {
				$template = $meta['_wp_page_template'][0];
			}
		}

		if ($post->post_type == 'yuna_cabinet_lessons'){

			$template = YUNA_CAB_DIR . 'template/template-lesson.php';
		}

		if ($post->post_type == 'yuna_cabinet_curses'){

			$template = YUNA_CAB_DIR . 'template/template-course.php';
		}



		return $template;
	}

	/**
	 * Add lesson template
	 */

	/*add_filter( 'single_template', 'lesson_post_type_template' ) ;

	function lesson_post_type_template( $single_template ) {

		global $wp_query, $post;

		if ($post->post_type == 'yuna_cabinet_lessons'){

			$single_template = YUNA_CAB_DIR . '/template/template-lesson.php';
		}
		return $single_template;
	}*/

	/**
	 * Add course template
	 */

	/*add_filter( 'single_template', 'course_post_type_template' ) ;

	function course_post_type_template( $single_template ) {

		global $wp_query, $post;

		if ($post->post_type == 'yuna_cabinet_curses'){

			$single_template = YUNA_CAB_DIR . 'template/template-course.php';
		}
		return $single_template;
	}*/




//	function ccm_get_template_part($slug, $name = null) {
//
//		do_action("ccm_get_template_part_{$slug}", $slug, $name);
//
//		$templates = array();
//		if (isset($name))
//			$templates[] = "{$slug}-{$name}.php";
//
//		$templates[] = "{$slug}.php";
//
//		ccm_get_template_path($templates, true, false);
//	}
//
//	function ccm_get_template_path($template_names, $load = false, $require_once = true ) {
//		$located = '';
//		foreach ( (array) $template_names as $template_name ) {
//			if ( !$template_name )
//				continue;
//
//			if ( file_exists(YUNA_CAB_DIR . $template_name)) {
//				$located = YUNA_CAB_DIR . $template_name;
//				break;
//			}
//		}
//
//		if ( $load && '' != $located )
//			load_template( $located, $require_once );
//
//		return $located;
//	}



