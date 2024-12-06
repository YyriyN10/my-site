<?php
  if ( ! defined( 'ABSPATH' ) ) {
  exit;
  }
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
      <?php if ( is_user_logged_in() ) :?>
        <h3>Вітаємо!</h3>
      <?php else:?>
        <h3>Ви не авторизовані</h3>
        <a href="#" rel="nofollow" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Авторизуватись</a>
        <a href="#" rel="nofollow" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal">Зареєструватись</a>

        <!-- Login Modal -->
        <div class="modal modal-login" id="loginModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Авторизуватись</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <?php
                  $args = array(
                    'echo'           => true,
                    'redirect'       => site_url( $_SERVER['REQUEST_URI'] ),
                    'form_id'        => 'loginform',
                    'label_username' => __( 'Username' ),
                    'label_password' => __( 'Password' ),
                    'label_remember' => __( 'Remember Me' ),
                    'label_log_in'   => __( 'Log In' ),
                    'id_username'    => 'user_login',
                    'id_password'    => 'user_pass',
                    'id_remember'    => 'rememberme',
                    'id_submit'      => 'wp-submit',
                    'remember'       => true,
                    'value_username' => NULL,
                    'value_remember' => false
                  );

                  wp_login_form( $args );
                  ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Login Modal -->
        <div class="modal modal-login" id="registrationModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Зареєструватися</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form id="registerform" action="<?php esc_url( wp_registration_url() ) ?>" method="post">
                  <p>
                    <label for="user_login">
                      Іʼмя користувача<br>
                      <input type="text" name="user_login" id="user_login" class="input" value="" size="20" style="">
                    </label>
                  </p>
                  <p>
                    <label for="user_email">
                      E-mail<br>
                      <input type="email" name="user_email" id="user_email" class="input" value="" size="25">
                    </label>
                  </p>

                  <p id="reg_passmail">Підтвердження реєстрації буде надіслано на ваш e-mail</p>

                  <br class="clear">
                  <input type="hidden" name="redirect_to" value="">

                  <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Реєстрація"></p>
                </form>
              </div>
            </div>
          </div>
        </div>

      <?php endif;?>
      </div>
    </div>
  </div>
</section>

