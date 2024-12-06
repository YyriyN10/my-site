<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Add lesson test result
	 */

	add_action('wp_ajax_user_lesson_testing', 'user_lesson_testing_test');
	add_action('wp_ajax_nopriv_user_lesson_testing', 'user_lesson_testing_test');

	function user_lesson_testing_test(){

		$lessonId = $_POST['lessonId'];
		$userId = $_POST['userId'];

		global $wpdb;

		$successLessonList = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}user_courses` WHERE user_id = $userId", ARRAY_A );

		if ( !empty($successLessonList[0]['success_lessons']) ){//Перевірка чи є у користувача пройдені уроки
			$listToUpdate = [];
			$lessonAdded = '';
			$lessonList = json_decode($successLessonList[0]['success_lessons']);

			foreach ( $lessonList as $item ){//Перевіряємо чи в пройдених уроках є потосний
				if ( $item == $lessonId ){
					$lessonAdded = $lessonId;
				}
			}

			if ( $lessonAdded != $lessonId ){//Якщо потосного уроку в пройдених немає то додаємо його

				if ( is_array($lessonList) ){//Перевіряємо чи кількість пройдених уроків більше 1го
					foreach ( $lessonList as $item ){
						array_push($listToUpdate, $item);
					}
					array_push($listToUpdate, $lessonId);
				}else{//Якщо кількість пройдених уроків не більше йго
					array_push($listToUpdate, $lessonList, $lessonId);
				}

				$query = "UPDATE `{$wpdb->prefix}user_courses` SET success_lessons = %s WHERE user_id = $userId";
				$wpdb->query( $wpdb->prepare( $query, json_encode($listToUpdate) ));
			}

		}else{//Якщо пройдених уроків немає то додати поточний

			$query = "UPDATE `{$wpdb->prefix}user_courses` SET success_lessons = %s WHERE user_id = $userId";
			$wpdb->query( $wpdb->prepare( $query, json_encode($lessonId) ));

		}

		wp_die();
	}