<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template cabinet plugin
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package yuna-cabinet
	 *
	 */

	/**
	 * Що зробити:
	 *
	 * 1. Вивести нахву стінки +
   * 2. Перевірити чи авторизований користуваз +
   * 3. Додати можливість встаноаити аватар +
   * 4. Додати модливість редагувати аватар +
   * 5. Вивести ім!я користувача +
   * 6. Додати можливість редагувати імʼя користувача +
   * 3. Якщо користувач не авторизований написати повідомлення та запропонувати авторезуватись чи зареєструватись
	 * 4. Вивести картку користувача
   * 5. Вивести доступні матеріали
   * 6. Додати форму редагування профілю
	 * 7. Окремо редагування аватару
	 * 8. вивід статистики по навчанню
	 *
	 *
	 *
	 *
	 */


	$currentUserId = get_current_user_id();

	$getUserMeta = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}user_cabinet_meta` WHERE user_id = $currentUserId", ARRAY_A );

	get_header(); ?>

  <section>
    <div class="container">
      <div class="row">
        <h1 class="col-12 text-center"><?php the_title();?></h1>
      </div>

      <div class="row">
        <div class="blocks col-12">
          <div class="div1">
          </div>
          <div class="div2">
          </div>
          <div class="div3">

            <div class="inner"></div>
          </div>
        </div>
      </div>
    </div>

  </section>


<?php  if ( is_user_logged_in() ) :?>

	<section class="user-info">
    <div class="container">
      <div class="row">
        <div class="col-12">
	        <?php if( $getUserMeta ):?>
		        <?php foreach( $getUserMeta as $item ):?>
              <div class="user-info__avatar">
				        <?php if( $item['user_avatar'] ):?>
                  <img src="<?php echo $item['user_avatar'];?>" alt="">
                  <form action="<?php echo admin_url( 'admin-post.php' ) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_user_avatar">
                    <input type="hidden" name="user-id" value="<?php echo base64_encode($currentUserId);?>">
                    <input type="hidden" name="site-url" value="<?php echo get_site_url();?>">
						        <?php wp_nonce_field('user_course','add_user_avatar');?>
                    <label>
                      <input type="file" onchange="this.form.submit()" name="avatar" class="form-control-file border">
                      Замінити аватар
                    </label>
                    <button type="submit" class="button button-primary"></button>
                  </form>
				        <?php else:?>
                  <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 500.462">
                    <path d="M176.723 304.538c-7.873-8.108-17.766-21.504-19.13-36.46l-1.514.029c-3.484-.047-6.854-.847-10.006-2.645-5.042-2.873-8.591-7.795-10.988-13.352-5.074-11.655-9.096-42.333 3.675-51.102l-2.392-1.59-.269-3.395c-.492-6.174-.617-13.644-.742-21.485-.461-28.844-1.046-63.783-24.233-70.79l-9.951-3.009 6.55-8.111c18.744-23.145 38.319-43.397 58.061-58.941 50.954-40.107 105.847-50.659 150.174 3.228 73.927 7.159 97.553 118.191 46.806 167.224 3.048.112 5.923.813 8.461 2.169 9.666 5.178 9.979 16.405 7.436 25.83-2.509 7.873-5.701 17.008-8.714 24.677-3.652 10.364-9.002 12.295-19.337 11.179-.337 16.436-11.731 30.041-21.567 39.161-3.628 3.363-7.779 6.367-12.332 9.02 5.322 11.712 13.223 19.76 22.832 25.563-4.862 7.097-11.289 13.37-18.733 18.691-18.167 12.986-42.146 20.27-64.81 20.27s-46.643-7.284-64.81-20.27c-6.236-4.456-11.754-9.582-16.242-15.301 7.337-6.955 13.169-16.284 16.906-29.011-5.729-3.309-10.847-7.164-15.131-11.579zm185.463 46.633C422.267 368.294 512 351.278 512 493.88c0 3.626-2.959 6.582-6.592 6.582H6.592c-3.636 0-6.592-2.956-6.592-6.582 0-146.99 96.628-112.639 154.364-135.921 6.226 8.411 14.002 15.824 22.832 22.137 22.233 15.894 51.385 24.807 78.804 24.807 27.419 0 56.571-8.913 78.804-24.807 11.135-7.96 20.597-17.672 27.382-28.925z"/>
                  </svg>
                  <form action="<?php echo admin_url( 'admin-post.php' ) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_user_avatar">
                    <input type="hidden" name="user-id" value="<?php echo base64_encode($currentUserId);?>">
                    <input type="hidden" name="site-url" value="<?php echo get_site_url();?>">
						        <?php wp_nonce_field('update_user_avatar','add_user_avatar');?>
                    <label>
                      <input type="file" onchange="this.form.submit()" name="avatar" class="form-control-file border">
                      Додати аватар
                    </label>
                    <button type="submit" class="button button-primary"></button>
                  </form>
				        <?php endif;?>
              </div>
              <div class="user-info__full-name">
	              <?php if( $item['user_full_name'] ):?>
                  <h3 class="name"><?php echo $item['user_full_name'];?></h3>
                  <form action="<?php echo admin_url( 'admin-post.php' ) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_user_full_name">
                    <input type="hidden" name="user-id" value="<?php echo base64_encode($currentUserId);?>">
                    <input type="hidden" name="site-url" value="<?php echo get_site_url();?>">
			              <?php wp_nonce_field('update_user_full_name','update_user_full_name"');?>
                    <input type="text" name="user-full-name" value="">
                    <button type="submit" class="btn btn-success">Замінити</button>
                  </form>
                  <a href="#" rel="nofollow" class="edit-btn">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 121.48 122.88"  xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g>
                        <path class="st0" d="M96.84,2.22l22.42,22.42c2.96,2.96,2.96,7.8,0,10.76l-12.4,12.4L73.68,14.62l12.4-12.4 C89.04-0.74,93.88-0.74,96.84,2.22L96.84,2.22z M70.18,52.19L70.18,52.19l0,0.01c0.92,0.92,1.38,2.14,1.38,3.34 c0,1.2-0.46,2.41-1.38,3.34v0.01l-0.01,0.01L40.09,88.99l0,0h-0.01c-0.26,0.26-0.55,0.48-0.84,0.67h-0.01 c-0.3,0.19-0.61,0.34-0.93,0.45c-1.66,0.58-3.59,0.2-4.91-1.12h-0.01l0,0v-0.01c-0.26-0.26-0.48-0.55-0.67-0.84v-0.01 c-0.19-0.3-0.34-0.61-0.45-0.93c-0.58-1.66-0.2-3.59,1.11-4.91v-0.01l30.09-30.09l0,0h0.01c0.92-0.92,2.14-1.38,3.34-1.38 c1.2,0,2.41,0.46,3.34,1.38L70.18,52.19L70.18,52.19L70.18,52.19z M45.48,109.11c-8.98,2.78-17.95,5.55-26.93,8.33 C-2.55,123.97-2.46,128.32,3.3,108l9.07-32v0l-0.03-0.03L67.4,20.9l33.18,33.18l-55.07,55.07L45.48,109.11L45.48,109.11z M18.03,81.66l21.79,21.79c-5.9,1.82-11.8,3.64-17.69,5.45c-13.86,4.27-13.8,7.13-10.03-6.22L18.03,81.66L18.03,81.66z"/></g>
</svg>
                  </a>
	              <?php else:?>
                  <h3 class="name"><?php echo get_the_author_meta('display_name', $currentUserId );?></h3>
                  <form action="<?php echo admin_url( 'admin-post.php' ) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_user_full_name">
                    <input type="hidden" name="user-id" value="<?php echo base64_encode($currentUserId);?>">
                    <input type="hidden" name="site-url" value="<?php echo get_site_url();?>">
			              <?php wp_nonce_field('update_user_full_name','update_user_full_name"');?>
                    <input type="text" name="user-full-name" value="">
                    <button type="submit" class="btn btn-success">Замінити</button>
                  </form>
                  <a href="#" rel="nofollow" class="edit-btn">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 121.48 122.88"  xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g>
                        <path class="st0" d="M96.84,2.22l22.42,22.42c2.96,2.96,2.96,7.8,0,10.76l-12.4,12.4L73.68,14.62l12.4-12.4 C89.04-0.74,93.88-0.74,96.84,2.22L96.84,2.22z M70.18,52.19L70.18,52.19l0,0.01c0.92,0.92,1.38,2.14,1.38,3.34 c0,1.2-0.46,2.41-1.38,3.34v0.01l-0.01,0.01L40.09,88.99l0,0h-0.01c-0.26,0.26-0.55,0.48-0.84,0.67h-0.01 c-0.3,0.19-0.61,0.34-0.93,0.45c-1.66,0.58-3.59,0.2-4.91-1.12h-0.01l0,0v-0.01c-0.26-0.26-0.48-0.55-0.67-0.84v-0.01 c-0.19-0.3-0.34-0.61-0.45-0.93c-0.58-1.66-0.2-3.59,1.11-4.91v-0.01l30.09-30.09l0,0h0.01c0.92-0.92,2.14-1.38,3.34-1.38 c1.2,0,2.41,0.46,3.34,1.38L70.18,52.19L70.18,52.19L70.18,52.19z M45.48,109.11c-8.98,2.78-17.95,5.55-26.93,8.33 C-2.55,123.97-2.46,128.32,3.3,108l9.07-32v0l-0.03-0.03L67.4,20.9l33.18,33.18l-55.07,55.07L45.48,109.11L45.48,109.11z M18.03,81.66l21.79,21.79c-5.9,1.82-11.8,3.64-17.69,5.45c-13.86,4.27-13.8,7.13-10.03-6.22L18.03,81.66L18.03,81.66z"/></g>
</svg>
                  </a>
	              <?php endif;?>
              </div>

		        <?php endforeach;?>
	        <?php else:?>
            <div class="user-info__avatar">
                <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 500.462">
                  <path d="M176.723 304.538c-7.873-8.108-17.766-21.504-19.13-36.46l-1.514.029c-3.484-.047-6.854-.847-10.006-2.645-5.042-2.873-8.591-7.795-10.988-13.352-5.074-11.655-9.096-42.333 3.675-51.102l-2.392-1.59-.269-3.395c-.492-6.174-.617-13.644-.742-21.485-.461-28.844-1.046-63.783-24.233-70.79l-9.951-3.009 6.55-8.111c18.744-23.145 38.319-43.397 58.061-58.941 50.954-40.107 105.847-50.659 150.174 3.228 73.927 7.159 97.553 118.191 46.806 167.224 3.048.112 5.923.813 8.461 2.169 9.666 5.178 9.979 16.405 7.436 25.83-2.509 7.873-5.701 17.008-8.714 24.677-3.652 10.364-9.002 12.295-19.337 11.179-.337 16.436-11.731 30.041-21.567 39.161-3.628 3.363-7.779 6.367-12.332 9.02 5.322 11.712 13.223 19.76 22.832 25.563-4.862 7.097-11.289 13.37-18.733 18.691-18.167 12.986-42.146 20.27-64.81 20.27s-46.643-7.284-64.81-20.27c-6.236-4.456-11.754-9.582-16.242-15.301 7.337-6.955 13.169-16.284 16.906-29.011-5.729-3.309-10.847-7.164-15.131-11.579zm185.463 46.633C422.267 368.294 512 351.278 512 493.88c0 3.626-2.959 6.582-6.592 6.582H6.592c-3.636 0-6.592-2.956-6.592-6.582 0-146.99 96.628-112.639 154.364-135.921 6.226 8.411 14.002 15.824 22.832 22.137 22.233 15.894 51.385 24.807 78.804 24.807 27.419 0 56.571-8.913 78.804-24.807 11.135-7.96 20.597-17.672 27.382-28.925z"/>
                </svg>
                <form action="<?php echo admin_url( 'admin-post.php' ) ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="add_user_avatar">
                  <input type="hidden" name="user-id" value="<?php echo base64_encode($currentUserId);?>">
                  <input type="hidden" name="site-url" value="<?php echo get_site_url();?>">
                  <?php wp_nonce_field('user_course','add_user_avatar');?>
                  <label>
                    <input type="file" onchange="this.form.submit()" name="avatar" class="form-control-file border">
                    Додати аватар
                  </label>
                  <button type="submit" class="button button-primary"></button>
                </form>
            </div>
            <div class="user-info__full-name">
              <h3 class="name"><?php echo get_the_author_meta('display_name', $currentUserId );?></h3>
              <form action="<?php echo admin_url( 'admin-post.php' ) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update_user_full_name">
                <input type="hidden" name="user-id" value="<?php echo base64_encode($currentUserId);?>">
                <input type="hidden" name="site-url" value="<?php echo get_site_url();?>">
		            <?php wp_nonce_field('update_user_full_name','update_user_full_name"');?>
                <input type="text" name="user-full-name" value="">
                <button type="submit" class="btn btn-success">Замінити</button>
              </form>
              <a href="#" rel="nofollow" class="edit-btn">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 121.48 122.88"  xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g>
                    <path class="st0" d="M96.84,2.22l22.42,22.42c2.96,2.96,2.96,7.8,0,10.76l-12.4,12.4L73.68,14.62l12.4-12.4 C89.04-0.74,93.88-0.74,96.84,2.22L96.84,2.22z M70.18,52.19L70.18,52.19l0,0.01c0.92,0.92,1.38,2.14,1.38,3.34 c0,1.2-0.46,2.41-1.38,3.34v0.01l-0.01,0.01L40.09,88.99l0,0h-0.01c-0.26,0.26-0.55,0.48-0.84,0.67h-0.01 c-0.3,0.19-0.61,0.34-0.93,0.45c-1.66,0.58-3.59,0.2-4.91-1.12h-0.01l0,0v-0.01c-0.26-0.26-0.48-0.55-0.67-0.84v-0.01 c-0.19-0.3-0.34-0.61-0.45-0.93c-0.58-1.66-0.2-3.59,1.11-4.91v-0.01l30.09-30.09l0,0h0.01c0.92-0.92,2.14-1.38,3.34-1.38 c1.2,0,2.41,0.46,3.34,1.38L70.18,52.19L70.18,52.19L70.18,52.19z M45.48,109.11c-8.98,2.78-17.95,5.55-26.93,8.33 C-2.55,123.97-2.46,128.32,3.3,108l9.07-32v0l-0.03-0.03L67.4,20.9l33.18,33.18l-55.07,55.07L45.48,109.11L45.48,109.11z M18.03,81.66l21.79,21.79c-5.9,1.82-11.8,3.64-17.69,5.45c-13.86,4.27-13.8,7.13-10.03-6.22L18.03,81.66L18.03,81.66z"/></g>
</svg>
              </a>
            </div>
	        <?php endif;?>
        </div>
      </div>
    </div>
	</section>
<?php else:?>

  <section>
    <div class="container">
      <div class="rpw">
        <h3 class="col-12 text-center block-title">Ви не авторизувались, будь ласка авторизуйтесь</h3>
      </div>
    </div>
  </section>

<?php endif;?>

<?php

	$checkedUserID = '';
	$checkedCurseID = '';
	$checkUserCurses = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}user_courses`", ARRAY_A );

	if ( $checkUserCurses ){
		foreach ( $checkUserCurses as $checkUser ){
			if ( $checkUser['user_id'] == $currentUserId ){
				$checkedUserID = $checkUser['user_id'];
			}
		}

		foreach ( $checkUserCurses as $checkCurse ) {

			if ( $checkCurse['user_id'] == $checkedUserID ) {

				$checkedCurseID = json_decode( $checkCurse['user_curses'] );

			}
		}
	}

	if ( $checkedUserID == $currentUserId && !empty($checkedCurseID) ):?>

		<?php
		$catArgs = array(
			'posts_per_page' => -1,
			'orderby' 	 => 'date',
			'post_type'  => 'yuna_cabinet_curses',
			'post_status'    => 'publish'
		);

		$postList = new WP_Query( $catArgs );

		if ( $postList->have_posts() ) :?>

      <section class="available-courses">
        <div class="container">
          <div class="row">
            <h2 class="available-courses__title block-title col-12 text-center">Перелік доступних курсів</h2>
          </div>
          <div class="row">
	          <?php while ( $postList->have_posts() ) : $postList->the_post(); $item = '';?>

		          <?php
                foreach( $checkedCurseID as $courseId ){

                  if( $courseId ==  get_the_ID() ){
                    $item = $courseId;
                  }
                }
		          ?>

		          <?php if ( $item == get_the_ID() ):?>

                <a href="<?php the_permalink();?>" class="available-courses__item col-lg-4">
                  <span class="inner">
                    <span class="name"><?php the_title();?></span>
                  </span>
                  <span class="lessons-count">
                    Кількість уроків:
                  </span>
                  <span class="lessons-completed">
                    Кількість пройдених уроків:
                  </span>
                </a>
		          <?php endif;?>

	          <?php endwhile;?>

          </div>
        </div>
      </section>

		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
  <?php else:?>

    <section>
      <div class="row">
        <h3 class="block-title col-12 text-center">У вас нема придбаних курсів</h3>
      </div>
    </section>


	<?php endif;?>

<?php get_footer();
