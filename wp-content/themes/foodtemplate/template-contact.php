<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template contact
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package foodtemplate
	 *
	 */

	get_header();?>

<?php
	$contactMainTitle = carbon_get_post_meta(get_the_ID(), 'food_contact_page_main_screen_title');
	$contactMainText = carbon_get_post_meta(get_the_ID(), 'food_contact_page_main_screen_text');
	$contactMainImage = carbon_get_post_meta(get_the_ID(), 'food_contact_page_main_screen_image');
	$contactWorkDey = carbon_get_theme_option('food_option_open_time_week');
	$contactBrunch = carbon_get_theme_option('food_option_open_time_brunch');
	$contactLunch = carbon_get_theme_option('food_option_open_time_lunch');
	$contactDinner = carbon_get_theme_option('food_option_open_time_dinner');

	if( $contactMainTitle && $contactMainImage ):?>
		<!-- main screen -->
		<section class="contact-main-screen main-screen main-screen--big indent-horizontal" style="background-image: url(<?php echo $contactMainImage;?>)">
			<div class="container-fluid">
				<div class="row">
					<div class="content col-lg-7">
						<h1 class="heading heading-big"><?php echo $contactMainTitle;?></h1>
						<div class="text mini-title"><?php echo $contactMainText;?></div>
					</div>
				</div>
				<div class="row">
					<div class="working-time col-xl-5 offset-xl-7 col-lg-6 offset-lg-6 col-md-10 offset-md-1">
						<div class="open-wrapper">
							<p class="mini-title">Open Time</p>
							<p class="dey"><?php echo $contactWorkDey;?></p>
						</div>
						<div class="time-wrapper">
							<p class="time">Brunch</br><?php echo $contactBrunch;?></p>
							<p class="time">Lunch</br><?php echo $contactLunch;?></p>
							<p class="time">Dinner</br><?php echo $contactDinner;?></p>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif;?>
    <?php
        $contentLeftPic = carbon_get_post_meta(get_the_ID(), 'food_contact_page_left_image');
	      $contentRightPic = carbon_get_post_meta(get_the_ID(), 'food_contact_page_right_image');
	      $contentMapLink = carbon_get_post_meta(get_the_ID(), 'food_contact_page_map_link');
	      $contentContactText = carbon_get_post_meta(get_the_ID(), 'food_contact_page_contact_text');
	      $contentContactLocation = carbon_get_post_meta(get_the_ID(), 'food_contact_page_location_text');

        if( $contentLeftPic && $contentRightPic ):?>
        <!-- Content -->
        <section class="contact-content indent-horizontal">
          <svg class="bg-pic" width="448" height="394" viewBox="0 0 448 394" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M230.593 33.8116C230.593 33.8116 257.753 -0.8984 302.343 1.0816C346.933 3.0616 386.793 30.4716 399.153 75.9416C411.173 120.152 400.063 159.032 378.233 181.172C357.063 202.622 312.943 204.622 312.943 204.622M297.913 297.482C297.913 297.482 314.983 298.922 325.403 325.302C338.733 359.052 307.803 392.142 307.803 392.142C308.823 370.862 280.173 367.532 257.563 356.232C234.953 344.932 241.603 311.002 250.913 295.212C260.223 279.422 279.753 272.902 291.373 277.752C301.463 281.962 293.253 299.962 281.843 290.872C264.863 277.342 270.873 247.822 346.683 226.922C422.493 206.022 447.113 288.382 447.113 288.382C447.113 288.382 436.033 282.622 410.313 288.822C384.593 295.032 390.363 301.232 359.323 302.572C328.283 303.902 292.483 265.452 292.483 265.452M292.483 265.462C292.483 265.462 391.183 229.632 406.123 256.332C421.063 283.032 333.143 242.902 333.143 242.902M265.983 305.072C265.983 305.072 297.243 337.922 301.233 344.572C305.223 351.222 299.233 362.192 291.593 357.212C283.943 352.222 292.493 312.032 292.493 312.032M343.173 265.942C343.173 265.942 359.413 269.362 370.943 280.442M44.0028 65.0416C65.4328 37.3316 114.353 12.4716 173.543 19.1216C232.733 25.7716 268.653 49.7116 291.923 91.6116C315.203 133.512 311.873 217.312 288.593 249.902C265.323 282.502 225.873 325.842 149.303 323.002C75.6328 320.272 19.7628 272.252 4.31281 203.072C-9.4072 141.632 22.5628 92.7616 44.0028 65.0416ZM106.143 138.622C100.443 140.832 98.8228 153.922 106.143 155.912C113.463 157.912 123.213 153.252 121.443 147.262C119.663 141.282 113.013 135.962 106.143 138.622ZM250.443 105.412C253.073 100.402 246.963 92.0016 240.943 95.7216C234.913 99.4416 230.903 108.502 235.383 110.682C239.873 112.862 247.273 111.452 250.443 105.412ZM113.463 188.482C111.063 193.602 117.543 201.712 123.393 197.722C129.243 193.732 132.843 184.502 128.263 182.532C123.693 180.562 116.353 182.312 113.463 188.482ZM355.053 50.8816C352.823 52.6416 359.623 81.1516 352.313 83.2416C345.003 85.3316 344.223 77.1316 347.743 76.0816C351.263 75.0416 365.813 98.4516 368.893 97.5116C371.973 96.5816 367.723 65.3416 373.983 66.2416C380.253 67.1316 380.513 74.7416 376.593 75.1916C372.683 75.6316 357.283 49.1216 355.053 50.8816ZM217.213 63.2316C224.673 79.0416 177.553 178.312 165.193 164.062C152.833 149.822 234.963 76.8216 251.063 80.3716C267.163 83.9216 300.023 152.682 284.703 165.742C269.383 178.802 163.803 186.752 165.653 175.522C167.503 164.292 269.383 165.202 275.593 181.752C281.803 198.302 280.543 208.592 271.433 228.292C262.323 247.992 251.603 273.882 229.893 269.352C208.193 264.822 152.193 193.882 164.833 186.022C177.473 178.162 212.203 261.442 200.763 284.772C191.233 304.222 112.933 310.042 105.603 280.542C97.0328 246.042 144.123 182.502 151.883 186.672C159.643 190.842 114.193 269.272 79.6128 265.942C45.0328 262.602 28.7328 201.892 37.3228 179.712C45.9128 157.532 144.013 164.222 146.233 174.712C148.453 185.192 43.3828 159.402 35.3428 147.162C27.3028 134.922 63.3128 60.1716 96.7428 65.1716C130.173 70.1716 165.883 160.632 156.003 165.812C146.123 170.992 102.043 71.0716 123.423 51.5616C144.803 32.0516 206.953 41.4616 217.213 63.2316Z" stroke="black" stroke-miterlimit="10"/>
          </svg>
          <div class="container-fluid">
            <div class="row">
              <div class="pic-wrapper col-md-6">
                <img
                   class="lazy"
                   data-src="<?php echo wp_get_attachment_image_src($contentLeftPic, 'full')[0];?>"
                   alt="<?php echo get_post_meta($contentLeftPic, '_wp_attachment_image_alt', TRUE);?>"
                >
              </div>
              <div class="content-wrapper col-md-6">
                <div class="text text-contact"><?php echo wpautop($contentContactText);?></div>
              </div>
            </div>
            <div class="row">
              <div class="content-wrapper col-md-6">
                <div class="text text-location">
                  <p class="mini-title"><?php echo $contentContactLocation;?></p>
                  <a href="<?php echo $contentMapLink;?>" rel="nofollow" class="button border-btn">View in maps</a>
                </div>
              </div>
              <div class="pic-wrapper col-md-6">
                <img
                    class="lazy"
                    data-src="<?php echo wp_get_attachment_image_src($contentRightPic, 'full')[0];?>"
                    alt="<?php echo get_post_meta($contentRightPic, '_wp_attachment_image_alt', TRUE);?>"
                >
              </div>
            </div>
          </div>
        </section>
    <?php endif;?>

<?php
	$formRegistrationTitle = carbon_get_post_meta(get_the_ID(), 'food_contact_page_reservation_title');
	$formRegistrationText = carbon_get_post_meta(get_the_ID(), 'food_contact_page_reservation_text');

	if ( $formRegistrationTitle ){

		$formRegistrationArgs = array(
			'title' => $formRegistrationTitle,
			'text' => $formRegistrationText
		);

		get_template_part('template-parts/block-reservation', '', $formRegistrationArgs);
	}
?>
<?php get_footer();
