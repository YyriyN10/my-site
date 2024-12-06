<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>

	<div class="wrap">

	<h1>Option page</h1>

  <?php

	  global $wpdb;

    $getUserList = $wpdb->prefix.'users';
    $getAllPages = $wpdb->prefix.'posts';
    $getUserCurses = $wpdb->prefix.'user_courses';

	  $usersList = $wpdb->get_results( "SELECT * FROM `$getUserList`", ARRAY_A );
	  $pagesList = $wpdb->get_results( "SELECT * FROM `$getAllPages` WHERE post_type = 'yuna_cabinet_curses'", ARRAY_A );
	  $checkUserCurses = $wpdb->get_results( "SELECT * FROM `$getUserCurses`", ARRAY_A );

	  $checkedUserID = '';
	  $checkedCurseID = '';
	  $checkedUserRol = '';

  ?>
  <?php if( $usersList ):?>
    <table class="wp-list-table widefat fixed striped table-view-list posts">
      <thead>
      <tr>
        <th>Імʼя користувача</th>
        <th>Email коистувача</th>
        <th>Роль користувача</th>
        <th>Перелік відкритої інформації</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach( $usersList as $user ):?>
        <?php
          if ( $checkUserCurses ){
            foreach ( $checkUserCurses as $checkUser ){
              if ( $checkUser['user_id'] == $user['ID'] ){
                $checkedUserID = $checkUser['user_id'];
              }
            }
          }
        ?>
        <tr>
          <td><?php echo $user['user_nicename'];?></td>
          <td><?php echo $user['user_email'];?></td>
          <td>
            <form method="post" action="<?php echo admin_url( 'admin-post.php' ) ?>">
	            <?php if ( $checkedUserID == $user['ID'] ):?>
                <input type="hidden" name="action" value="user_rol_update">
	            <?php else:?>
                <input type="hidden" name="action" value="user_rol_add">
	            <?php endif;?>
              <input type="hidden" name="user-id" value="<?php echo $user['ID'];?>">
	            <?php wp_nonce_field('user_course','user_course_add_curses');?>
              <select name="user-role" >
                <?php if( $checkedUserID == $user['ID'] ):?>
                  <?php
                    foreach( $checkUserCurses as $checkRol ){
                      if ( $checkRol['user_id'] == $checkedUserID ){

	                      $checkedUserRol = $checkRol['user_role'];

                      }
                    }

                    if ( $checkedUserRol != '' ):?>
                      <option value="role_standard"
                        <?php if ($checkedUserRol == 'role_standard'):?>
                          selected
                        <?php endif;?>
                      >
                        Стандартна
                      </option>
                      <option value="role_middle"
	                      <?php if ($checkedUserRol == 'role_middle'):?>
                          selected
	                      <?php endif;?>
                      >
                        Середня
                      </option>
                      <option value="role_high"
	                      <?php if ($checkedUserRol == 'role_high'):?>
                          selected
	                      <?php endif;?>
                      >
                        Висока
                      </option>
                      <option value="role_premium"
	                      <?php if ($checkedUserRol == 'role_premium'):?>
                          selected
	                      <?php endif;?>
                      >
                        Преміум
                      </option>
                      <option value="role_vip"
	                      <?php if ($checkedUserRol == 'role_vip'):?>
                          selected
	                      <?php endif;?>
                      >
                        VIP
                      </option>
                    <?php else:?>
                      <option value="role_standard">Стандартна</option>
                      <option value="role_middle">Середня</option>
                      <option value="role_high">Висока</option>
                      <option value="role_premium">Преміум</option>
                      <option value="role_vip">VIP</option>
                    <?php endif;?>
                <?php else:?>
                  <option value="role_standard">Стандартна</option>
                  <option value="role_middle">Середня</option>
                  <option value="role_high">Висока</option>
                  <option value="role_premium">Преміум</option>
                  <option value="role_vip">VIP</option>
                <?php endif;?>
              </select>
              <button type="submit" class="button button-primary">Зберегти</button>
            </form>
          </td>
          <td>
            <?php if( $pagesList ):?>
              <form method="post" class="users-courses" action="<?php echo admin_url( 'admin-post.php' ) ?>">
                <?php if ( $checkedUserID == $user['ID'] ):?>
                    <input type="hidden" name="action" value="user_course_update">
                <?php else:?>
                    <input type="hidden" name="action" value="user_course_add">
	              <?php endif;?>
                <input type="hidden" name="user-id" value="<?php echo $user['ID'];?>">
	              <?php wp_nonce_field('user_course','user_course_add_curses');?>

                <fieldset>
	                <?php if( $checkedUserID == $user['ID'] ):?>
                    <?php
                      if ( $checkUserCurses ){
                        foreach ( $checkUserCurses as $checkCurse ){

                          if ( $checkCurse['user_id'] == $checkedUserID ){

	                          $checkedCurseID = json_decode($checkCurse['user_curses']);

                          }
                        }
                      }
                    ?>
		                <?php foreach( $pagesList as $page ): $item = '';?>
                      <?php
                        if ( is_array($checkedCurseID) ){
                          foreach( $checkedCurseID as $courseId ){
                            if( $courseId == $page['ID'] ){
                              $item = $courseId;
                            }
                          }
                        }else{
	                        if( $checkedCurseID == $page['ID'] ){
		                        $item = $checkedCurseID;
	                        }
                        }
                      ?>
                      <?php if( $item == $page['ID'] ):?>
                        <label>
                          <input type="checkbox" name="curse-name[]" checked value="<?php echo $page['ID'];?>">
					                <?php echo $page['post_title'];?>
                        </label>
                      <?php else:?>
                        <label>
                          <input type="checkbox" name="curse-name[]" value="<?php echo $page['ID'];?>">
					                <?php echo $page['post_title'];?>
                        </label>
                      <?php endif;?>
		                <?php endforeach;?>
                  <?php else:?>
		                <?php foreach( $pagesList as $page ):?>
                      <label>
                        <input type="checkbox" name="curse-name[]" value="<?php echo $page['ID'];?>">
				                <?php echo $page['post_title'];?>
                      </label>
		                <?php endforeach;?>
	                <?php endif;?>
                </fieldset>
                <button type="submit" class="button button-primary">Зберегти</button>
              </form>
            <?php endif;?>
          </td>
        </tr>
      <?php endforeach;?>

      </tbody>
    </table>
  <?php endif;?>

</div>