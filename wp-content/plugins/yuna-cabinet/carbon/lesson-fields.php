<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_cabinet_lesson_fields' );

	function yuna_cabinet_lesson_fields(){

		Container::make( 'post_meta', 'Контент уроку' )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'yuna_cabinet_lessons' );
		         } )

		         ->add_fields( array(

		         	  Field::make_select('lesson_content_type'.yuna_cabinet_lang_prefix(), 'Тип контенту уроку')
			            ->set_options(array(
			            	'video_content' => 'Відео',
				            'text_content' => 'Текст'
			            )),

			          Field::make_file('lesson_video_lesson'.yuna_cabinet_lang_prefix(), 'Відео уроку')
			            ->set_type('video')
			            ->set_value_type('url')
				          ->set_conditional_logic( array(
					          'relation' => 'AND',
					          array(
						          'field' => 'lesson_content_type'.yuna_cabinet_lang_prefix(),
						          'value' => 'video_content',
						          'compare' => '=',
					          )
				          ) ),

			          Field::make_rich_text('lesson_text_lesson'.yuna_cabinet_lang_prefix(), 'Текст уроку')
				          ->set_conditional_logic( array(
					          'relation' => 'AND',
					          array(
						          'field' => 'lesson_content_type'.yuna_cabinet_lang_prefix(),
						          'value' => 'text_content',
						          'compare' => '=',
					          )
				          ) )

		         ));

		Container::make( 'post_meta', 'Тестування для уроку' )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'yuna_cabinet_lessons' );
		         } )

		         ->add_fields( array(
			         Field::make_text('lesson_test_name'.yuna_cabinet_lang_prefix(), 'Назва тесту'),
			         Field::make_text('lesson_test_success'.yuna_cabinet_lang_prefix(), 'Кількість правильних відповідей для проходження тестування')
									->set_attribute('type', 'number'),
			         Field::make_complex('lesson_tests_list'.yuna_cabinet_lang_prefix(), 'Питання для тестування')
			              ->add_fields(array(
			              	Field::make_select('answer_type', 'Оберіть тип відповіді')
												->add_options(array(
													'radio_type' => 'Може бути тільки одна правильнв відповідь',
													'checkbox_type' => 'Може бути кілька правильних відповідей'
												)),
				              Field::make_textarea('question_text', 'Текст питання')
				                   ->set_rows(4),
				              Field::make_complex('answer_options', 'Варіанти відповідей')
				                   ->add_fields(array(
					                   Field::make_text('number', 'Номер варіанту відповіді')
					                        ->set_attribute('type', 'number'),
					                   Field::make_textarea('answer', 'Текст відповіді')
					                        ->set_rows(3)
				                   )),
				              Field::make_text('right_answer', 'Номер правельної відповіді')
				                ->set_attribute('type', 'number')
					              ->set_conditional_logic( array(
						              'relation' => 'AND',
						              array(
							              'field' => 'answer_type',
							              'value' => 'radio_type',
							              'compare' => '=',
						              )
					              ) ),
				              Field::make_complex('right_answer_list', 'Номери правильних відповідей')
					              ->set_conditional_logic( array(
						              'relation' => 'AND',
						              array(
							              'field' => 'answer_type',
							              'value' => 'checkbox_type',
							              'compare' => '=',
						              )
						              ))
						             ->add_fields(array(
						             	  Field::make_text('right_answer_item', 'Номер правельної відповіді')
							                ->set_attribute('type', 'number')
						              ))

			              ))
		         ));
	}
