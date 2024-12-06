<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	};


	/**
	 * Add new users courses
	 */

	add_action('admin_post_user_course_add', 'user_course_add_callback');
	add_action('admin_post_nopriv_user_course_add', 'user_course_add_callback');

	function user_course_add_callback(){

		$userId = $_POST['user-id'];
		$cursesList = $_POST['curse-name'];

		global $wpdb;

		$query = "INSERT INTO `{$wpdb->prefix}user_courses` (user_id, user_curses ) VALUES (%s, %s)";

		$wpdb->query( $wpdb->prepare( $query, $userId , json_encode($cursesList) ));

		wp_redirect( $_POST['_wp_http_referer'] );

	}

	/**
	 * Update users courses
	 */

	add_action('admin_post_user_course_update', 'user_course_update_callback');
	add_action('admin_post_nopriv_user_course_update', 'user_course_update_callback');

	function user_course_update_callback(){

		$userId = $_POST['user-id'];
		$cursesList = $_POST['curse-name'];

		global $wpdb;

		$query = "UPDATE `{$wpdb->prefix}user_courses` SET user_curses = %s WHERE user_id = $userId";

		$wpdb->query( $wpdb->prepare( $query, json_encode($cursesList) ));

		wp_redirect( $_POST['_wp_http_referer'] );

	}


