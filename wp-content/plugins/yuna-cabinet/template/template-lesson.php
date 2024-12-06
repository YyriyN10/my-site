<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template lesson plugin
	 *
	 * Template post type: yuna_cabinet_lessons
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package yuna-cabinet
	 */

	/**
	 * Що зробити:
	 *
	 * 1 - перевірити чи авторизований користувач +
	 * 2 - якщо не авторизований то вивести повідомлення що він не авторизований і посилання на авторизацію +
	 * 3 - якщо авторизований то перевірити чи є у нього права на цей урок +
	 * 4 - якщо нема прав то вивести повідомлення що він немає доступу до цього уроку +
	 * 5 - якщо доступ є то вивести урок +
	 * 6 - в кінці уроку вивести тестування +
	 * 7 - перевіряти результати тесування та при вдалому проходженні додати відмітку +
   * 8 - додати можливість обирати кілька правельних відповідей +
	 */

	$currentUserId = get_current_user_id();
	$lessonId = get_the_ID();
	$checkUserCurses = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}user_courses` WHERE user_id = $currentUserId", ARRAY_A );
	$checkedCourseBy = '';

	$lessonCat = get_the_terms( $lessonId , 'yuna_cabinet_course_tax')[0]->term_id;

	$categories = get_categories( [
		'taxonomy'     => 'yuna_cabinet_course_tax',
		'type'         => 'yuna_cabinet_curses',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	] );

	if( $categories ){

		foreach( $categories as $cat ){

			if ( $cat->term_id == $lessonCat ){
				$checkedCourseBy = $cat->term_id;
			}
		}
	}

	get_header();?>

	<?php include YUNA_CAB_DIR . '/template/parts/check-logined.php';?>

<?php if ( $checkUserCurses ):?>
	<?php
	foreach ( $checkUserCurses as $checkCourse ){
		if ( !empty($checkCourse['user_curses'])){

			$cursesIdList = json_decode( $checkCourse['user_curses']);

			foreach ($cursesIdList as $course ){

				if ( $course == $checkedCourseBy){
					$checkedCourseBy = $course;
				}
			}
		}
	}
	?>
	<?php if( $checkedCourseBy != '' ):?>
		<section>
			<div class="container">
				<div class="row">
					<h2 class="col-12 text-center"><?php the_title();?></h2>
				</div>
			</div>
		</section>

    <?php
      $testName = carbon_get_post_meta(get_the_ID(), 'lesson_test_name'.yuna_cabinet_lang_prefix());
		  $testQuestionList = carbon_get_post_meta(get_the_ID(), 'lesson_tests_list'.yuna_cabinet_lang_prefix());
		  $testSuccess = carbon_get_post_meta(get_the_ID(), 'lesson_test_success'.yuna_cabinet_lang_prefix());
		  $i = 0;

		  if ( $testName && $testQuestionList && $testSuccess):?>
          <section class="lesson-testing">
            <div class="container">
              <div class="row">
                <h2 class="block-title text-center col-12"><?php echo $testName;?></h2>
              </div>
              <div class="row">
                <form action="<?php echo admin_url( 'admin-post.php' ) ?>" method="post" class="col-12 test-form">
                  <input type="hidden" name="lesson" value="<?php echo base64_encode($lessonId);?>">
                  <input type="hidden" name="user" value="<?php echo $currentUserId;?>">
                  <input type="hidden" name="success" value="<?php echo base64_encode($testSuccess);?>">
	                <?php wp_nonce_field('user_course','user_course_add_curses');?>
                  <?php foreach( $testQuestionList as $question ): $i++;?>
                    <div class="question">
                      <p class="question-text"><?php echo $question['question_text'];?></p>

                      <?php if( $question['answer_type'] == 'radio_type' ):?>
                        <input type="hidden" class="hash" name="question-hash<?php echo $i;?>" value="<?php echo base64_encode($question['right_answer']);?>">
                      <?php endif;?>

	                    <?php if( $question['answer_type'] == 'checkbox_type' ):?>
                        <?php if( $question['right_answer_list'] ): $rightAnswers = ''?>
                          <?php foreach( $question['right_answer_list'] as $item ):?>
                            <?php $rightAnswers = $item['right_answer_item'].' '.$rightAnswers;?>
                          <?php endforeach;?>
                        <?php endif;?>
                        <input type="hidden" class="hash-multi" name="question-hash<?php echo $i;?>" value="<?php echo base64_encode(strrev(trim($rightAnswers)));?>">
	                    <?php endif;?>

                      <?php if( $question['answer_options'] ):?>
                        <?php foreach( $question['answer_options'] as $answer ):?>

                          <?php if( $question['answer_type'] == 'radio_type' ):?>
                            <div class="form-check-inline">
                              <label class="form-check-label">
                                <input type="radio"
                                       class="form-check-input"
                                       value="<?php echo $answer['number'];?>"
                                       name="answer<?php echo $i;?>"
                                ><?php echo $answer['answer'];?>
                              </label>
                            </div>
                          <?php endif;?>

                          <?php if( $question['answer_type'] == 'checkbox_type' ):?>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox"
                                       name="answer<?php echo $i;?>[]"
                                       class="form-check-input checkbox"
                                       value="<?php echo $answer['number'];?>"
                                ><?php echo $answer['answer'];?>
                              </label>
                            </div>
                          <?php endif;?>

                        <?php endforeach;?>
                      <?php endif;?>
                    </div>

                  <?php endforeach;?>

                  <button type="submit" class="btn btn-primary">Відправити</button>
                </form>
                <div class="col-12 lesson-test-result">
                  <div class="alert alert-success d-none">
                    <strong>Вітаємо!</strong> Тест пройдено.
                  </div>
                  <div class="alert alert-danger d-none">
                    <strong>Тест не пройдено!</strong> Спробуйте ще раз
                  </div>
                </div>
              </div>
            </div>
          </section>
        <?php endif;?>
	<?php else:?>
		<section>
			<div class="container">
				<div class="row">
					<h2 class="col-12 text-center">Ви не придбали цей курс</h2>
				</div>
			</div>
		</section>
	<?php endif;?>

<?php else:?>
	<secton>
		<div class="container">
			<div class="row">
				<h2 class="col-12 text-center">У вас нема придбаних курсів</h2>
			</div>
		</div>
	</secton>
<?php endif;?>


<?php get_footer();
