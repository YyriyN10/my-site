<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Add user avatar
	 */

	add_action('admin_post_add_user_avatar', 'add_user_avatar_callback');
	add_action('admin_post_nopriv_add_user_avatar', 'add_user_avatar_callback');

	function add_user_avatar_callback(){

		$userId = base64_decode($_POST['user-id']);
		$siteUrl = $_POST['site-url'];
		
		$file1Links = '';

		$filename = $_FILES["avatar"]["name"];
		$tempname = $_FILES["avatar"]["tmp_name"];
		$folder = $_SERVER["DOCUMENT_ROOT"]."/wp-content/plugins/yuna-cabinet/uploads/" . $filename;

		$file1Links = $siteUrl."/wp-content/plugins/yuna-cabinet/uploads/" . $_FILES['avatar']['name'];

		global $wpdb;

		$query = "INSERT INTO `{$wpdb->prefix}user_cabinet_meta` (user_id, user_avatar) VALUES (%s, %s)";

		$wpdb->query( $wpdb->prepare( $query, $userId, $file1Links));

		if (move_uploaded_file($tempname, $folder)) {
			wp_redirect( $_POST['_wp_http_referer'] );
		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}

	}

	/**
	 * Update user avatar
	 */

	add_action('admin_post_update_user_avatar', 'update_user_avatar_callback');
	add_action('admin_post_nopriv_update_user_avatar', 'update_user_avatar_callback');

	function update_user_avatar_callback(){

		$userId = base64_decode($_POST['user-id']);
		$siteUrl = $_POST['site-url'];

		$file1Links = '';

		$filename = $_FILES["avatar"]["name"];
		$tempname = $_FILES["avatar"]["tmp_name"];
		$folder = $_SERVER["DOCUMENT_ROOT"]."/wp-content/plugins/yuna-cabinet/uploads/" . $filename;

		$file1Links = $siteUrl."/wp-content/plugins/yuna-cabinet/uploads/" . $_FILES['avatar']['name'];

		global $wpdb;

		$query = "UPDATE `{$wpdb->prefix}user_cabinet_meta` SET user_avatar = %s WHERE user_id = $userId";

		$wpdb->query( $wpdb->prepare( $query, $file1Links));

		if (move_uploaded_file($tempname, $folder)) {
			wp_redirect( $_POST['_wp_http_referer'] );
		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}

	}

	/**
	 * Update user avatar
	 */

	add_action('admin_post_update_user_full_name', 'update_user_full_name_callback');
	add_action('admin_post_nopriv_update_user_full_name', 'update_user_full_name_callback');

	function update_user_full_name_callback(){

		$userId = base64_decode($_POST['user-id']);
		$userFullName = $_POST['user-full-name'];

		global $wpdb;

		$query = "UPDATE `{$wpdb->prefix}user_cabinet_meta` SET user_full_name = %s WHERE user_id = $userId";

		$wpdb->query( $wpdb->prepare( $query, $userFullName));

		wp_redirect( $_POST['_wp_http_referer'] );

	}

	/**
	 * Add user meta
	 */

	add_action('admin_post_add_cabinet_user_meta', 'add_cabinet_user_meta_callback');
	add_action('admin_post_nopriv_add_cabinet_user_meta', 'add_cabinet_user_meta_callback');

	function add_cabinet_user_meta_callback(){

		$userId = base64_decode($_POST['user-id']);
		$siteUrl = $_POST['site-url'];
		$userName = $_POST['full-name'];

		$file1Links = '';

		$filename = $_FILES["avatar"]["name"];
		$tempname = $_FILES["avatar"]["tmp_name"];
		$folder = $_SERVER["DOCUMENT_ROOT"]."/wp-content/plugins/yuna-cabinet/uploads/" . $filename;

		$file1Links = $siteUrl."/wp-content/plugins/yuna-cabinet/uploads/" . $_FILES['avatar']['name'];

		global $wpdb;

		$query = "UPDATE `{$wpdb->prefix}user_cabinet_meta` SET user_avatar = %s WHERE user_id = $userId";

		$wpdb->query( $wpdb->prepare( $query, $file1Links));

		if (move_uploaded_file($tempname, $folder)) {
			wp_redirect( $_POST['_wp_http_referer'] );
		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}

	}

	/**
	 * Update user meta
	 */

	add_action('admin_post_update_cabinet_user_meta', 'update_cabinet_user_meta_callback');
	add_action('admin_post_nopriv_update_cabinet_user_meta', 'update_cabinet_user_meta_callback');

	function update_cabinet_user_meta_callback(){

		$userId = base64_decode($_POST['user-id']);
		$siteUrl = $_POST['site-url'];
		$userName = $_POST['full-name'];

		$file1Links = '';

		$filename = $_FILES["avatar"]["name"];
		$tempname = $_FILES["avatar"]["tmp_name"];
		$folder = $_SERVER["DOCUMENT_ROOT"]."/wp-content/plugins/yuna-cabinet/uploads/" . $filename;

		$file1Links = $siteUrl."/wp-content/plugins/yuna-cabinet/uploads/" . $_FILES['avatar']['name'];

		global $wpdb;

		if ( !empty($userName) && empty($filename) ){
			$query = "UPDATE `{$wpdb->prefix}user_cabinet_meta` SET user_full_name = %s WHERE user_id = $userId";

			$wpdb->query( $wpdb->prepare( $query, $userName));
		}

		if ( !empty($filename) && !empty($userName) ){

			$query = "UPDATE `{$wpdb->prefix}user_cabinet_meta` SET user_avatar = %s user_full_name = %s WHERE user_id = $userId";

			$wpdb->query( $wpdb->prepare( $query, $file1Links, $userName));
		}

		if ( !empty($filename) && empty($userName) ){

			$query = "UPDATE `{$wpdb->prefix}user_cabinet_meta` SET user_avatar = %s WHERE user_id = $userId";

			$wpdb->query( $wpdb->prepare( $query, $file1Links));
		}

		if (move_uploaded_file($tempname, $folder)) {

		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}

		wp_redirect( $_POST['_wp_http_referer'] );

	}