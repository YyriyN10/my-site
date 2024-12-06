<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	};

	/**
	 * Add new users role
	 */

	add_action('admin_post_user_rol_add', 'user_rol_add_callback');
	add_action('admin_post_nopriv_user_rol_add', 'user_rol_add_callback');

	function user_rol_add_callback(){

		$userId = $_POST['user-id'];
		$userRole = $_POST['user-role'];

		global $wpdb;

		$query = "INSERT INTO `{$wpdb->prefix}user_courses` (user_id, user_role ) VALUES (%s, %s)";

		$wpdb->query( $wpdb->prepare( $query, $userId , $userRole ));

		wp_redirect( $_POST['_wp_http_referer'] );

	}

	/**
	 * Update users role
	 */

	add_action('admin_post_user_rol_update', 'user_rol_update_callback');
	add_action('admin_post_nopriv_user_rol_update', 'user_rol_update_callback');

	function user_rol_update_callback(){

		$userId = $_POST['user-id'];
		$userRole = $_POST['user-role'];

		global $wpdb;

		$query = "UPDATE `{$wpdb->prefix}user_courses` SET user_role = %s WHERE user_id = $userId";

		$wpdb->query( $wpdb->prepare( $query, $userRole ));

		wp_redirect( $_POST['_wp_http_referer'] );

	}
