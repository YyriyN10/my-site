<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template course plugin
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
	 * 3 - якщо авторизований то перевірити чи є у нього права на цей курс +
	 * 4 - якщо нема прав то вивести повідомлення що він немає доступу до цього курсу +
	 * 5 - якщо доступ є то вивести курс +
	 * 6 - в кінці курсу вивести всі уроки тестування +
   * 7 - Якщо тестування по уроку пройдено, вивести помітку +
	 * 
	 */

	$currentUserId = get_current_user_id();
	$courseId = get_the_ID();
	$checkUserCurses = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}user_courses` WHERE user_id = $currentUserId", ARRAY_A );
	$checkedCourseBy = '';

	$lessonCat = get_the_terms( $courseId , 'yuna_cabinet_course_tax')[0]->term_id;

	get_header();?>

  <?php include YUNA_CAB_DIR . '/template/parts/check-logined.php';?>

  <?php if ( $checkUserCurses ):?>
    <?php
      foreach ( $checkUserCurses as $checkCourse ){
        if ( !empty($checkCourse['user_curses'])){

          $cursesIdList = json_decode( $checkCourse['user_curses']);

          foreach ($cursesIdList as $course ){

            if ( $course == $courseId ){
              $checkedCourseBy = $course;
            }
          }
        }
      }
    ?>
  <?php if( $checkedCourseBy == $courseId ):?>
    <section>
      <div class="container">
        <div class="row">
          <h2 class="col-12 text-center"><?php the_title();?></h2>
        </div>
      </div>
    </section>

     <?php
     	$lessonArgs = array(
     		'posts_per_page' => -1,
     		'orderby' 	 => 'date',
     		'post_type'  => 'yuna_cabinet_lessons',
     		'post_status'    => 'publish',
	      'tax_query' => array(
		      array(
			      'taxonomy' => 'yuna_cabinet_course_tax',
			      'field' => 'id',
			      'terms' => $lessonCat,
		      )

	      ),
     	);

     	$lessonList = new WP_Query( $lessonArgs );

     		  if ( $lessonList->have_posts() ) :?>

            <section class="lesson-list">
              <div class="container">
                <div class="row">
                  <h2 class="block-title col-12 text-center">Уроки курсу</h2>
                </div>
                <div class="row">
					        <?php while ( $lessonList->have_posts() ) : $lessonList->the_post(); ?>
                    <?php
                      $complitedLessons = json_decode($checkUserCurses[0]['success_lessons']);
                    ?>
                    <a href="<?php the_permalink();?>" class="lesson-list__item col-lg-4">
                      <span class="lesson-list__preview">
                        <img
                            class="lazy"
                            data-src="<?php echo wp_get_attachment_image_src(get_the_post_thumbnail(), 'full')[0];?>"
                            alt="<?php echo get_post_meta(get_the_post_thumbnail(), '_wp_attachment_image_alt', TRUE);?>"
                        >
                      </span>
                      <span class="lesson-list__name"><?php the_title();?></span>
                      <span class="lesson-list__description"><?php the_excerpt();?></span>
                      <span class="lesson-list__go-to">Перейти</span>
                      <?php
                        if ( !empty( $complitedLessons )){
                          if( is_array($complitedLessons) ){
                            foreach ( $complitedLessons as $item ){
                              if ( $item == get_the_ID() ){
                                echo '<span class="lesson-list__complite">Урок успішно завершено!</span>';
                              }
                            }
                          }else{
	                          if ( $complitedLessons == get_the_ID() ){
		                          echo '<span class="lesson-list__complite">Урок успішно завершено!</span>';
                            }
                          }
                        }
                      ?>
                    </a>
					        <?php endwhile;?>
                </div>
              </div>
            </section>
     	<?php endif; ?>
     <?php wp_reset_postdata(); ?>

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
