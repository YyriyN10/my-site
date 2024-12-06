<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template home
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package foodtemplate
	 *
	 */

	get_header();?>
<?php
	$heroTitle = carbon_get_post_meta(get_the_ID(), 'food_home_page_main_screen_title');
	$heroText = carbon_get_post_meta(get_the_ID(), 'food_home_page_main-screen_text');
	$heroImage = carbon_get_post_meta(get_the_ID(), 'food_home_page_main-screen_image');
	$heroSpices = carbon_get_post_meta(get_the_ID(), 'food_home_page_main-screen_image_spices');

	if ( $heroTitle && $heroImage ):
?>
	<section class="main-hero indent-horizontal">
		<div class="container-fluid">
			<div class="row">
				<div class="text-content col-md-8">
					<h1 class="heading heading-big"><?php echo $heroTitle;?></h1>
					<?php if( $heroText ):?>
						<p class="text"><?php echo $heroText;?></p>
					<?php endif;?>
          <div class="scroll-element">
            <span class="scroll-element__text">Scroll</span>
            <span class="dash-wrapper">
              <span class="dash"></span>
            </span>
          </div>
				</div>
				<div class="image-wrapper col-md-6">
          <img
             class="lazy main-pic"
             data-src="<?php echo wp_get_attachment_image_src($heroImage, 'full')[0];?>"
             alt="<?php echo get_post_meta($heroImage, '_wp_attachment_image_alt', TRUE);?>"
          >
          <?php if( $heroSpices ):?>
              <div class="spices-list">
                <?php foreach( $heroSpices as $item ):?>
                  <div class="pic">
                    <img
                       class="lazy"
                       data-src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
                       alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
                    >
                  </div>
                <?php endforeach;?>
              </div>
          <?php endif;?>
        </div>
			</div>
		</div>
	</section>
<?php endif;?>

    <?php
      $dietPlanTitle = carbon_get_post_meta(get_the_ID(), 'food_home_page_diet_title');
	    $dietPlanLeftText = carbon_get_post_meta(get_the_ID(), 'food_home_page_diet_left_text');
	    $dietPlanRightText = carbon_get_post_meta(get_the_ID(), 'food_home_page_diet_right_text');
	    $dietPlanLeftImage = carbon_get_post_meta(get_the_ID(), 'food_home_page_diet_left_image');
	    $dietPlanRightImage = carbon_get_post_meta(get_the_ID(), 'food_home_page_diet_right_image');

        if( $dietPlanLeftImage && $dietPlanLeftText && $dietPlanRightText && $dietPlanRightImage && $dietPlanTitle):?>
        <!-- Diet plan -->
        <section class="diet-plan indent-horizontal">
          <div class="container-fluid">
            <div class="row">
              <div class="left-column col-md-6">
                <div class="pic">
                  <img
                     class="lazy"
                     data-src="<?php echo wp_get_attachment_image_src($dietPlanLeftImage, 'full')[0];?>"
                     alt="<?php echo get_post_meta($dietPlanLeftImage, '_wp_attachment_image_alt', TRUE);?>"
                  >
                </div>
                <h2 class="subtitle"><?php echo $dietPlanTitle;?></h2>
                <div class="text"><?php echo wpautop($dietPlanLeftText);?></div>
              </div>
              <div class="right-column col-xl-4 offset-xl-2 col-lg-5 offset-lg-1 col-md-5">
                <div class="text"><?php echo wpautop($dietPlanRightText);?></div>
                <div class="pic">
                  <img
                      class="lazy"
                      data-src="<?php echo wp_get_attachment_image_src($dietPlanRightImage, 'full')[0];?>"
                      alt="<?php echo get_post_meta($dietPlanRightImage, '_wp_attachment_image_alt', TRUE);?>"
                  >
                </div>
              </div>
            </div>
          </div>
        </section>
    <?php endif;?>

     <?php
     	$menuArgs = array(
     		'posts_per_page' => 4,
     		'orderby' 	 => 'date',
     		'post_type'  => 'our_menu',
     		'post_status'    => 'publish'
     	);

     	$menuList = new WP_Query( $menuArgs );

     		  if ( $menuList->have_posts() ) :

              $ourMenuTitle = carbon_get_post_meta(get_the_ID(), 'food_home_page_our_menu_title');
	            $ourMenuText = carbon_get_post_meta(get_the_ID(), 'food_home_page_our_menu_text');
	            $ourMenuImage = carbon_get_post_meta(get_the_ID(), 'food_home_page_our_menu_image');

               ?>
                  <!-- Our menu -->
                  <section class="home-menu indent-horizontal">
                    <div class="bg-pic">
                      <img
                         class="lazy"
                         data-src="<?php echo wp_get_attachment_image_src($ourMenuImage, 'full')[0];?>"
                         alt="<?php echo get_post_meta($ourMenuImage, '_wp_attachment_image_alt', TRUE);?>"
                      >
                    </div>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-lg-4 text-wrapper">
                          <h2 class="block-title"><?php echo $ourMenuTitle;?></h2>
                          <div class="text"><?php echo wpautop($ourMenuText);?></div>
                        </div>
                      </div>
                      <div class="row menu-list">
	                      <?php while ( $menuList->have_posts() ) : $menuList->the_post(); ?>
	                        <?php get_template_part('template-parts/our-menu-item');?>
	                      <?php endwhile;?>
                      </div>
                    </div>
                  </section>

     	<?php endif; ?>
     <?php wp_reset_postdata(); ?>

    <?php
        $cookTitle = carbon_get_post_meta(get_the_ID(), 'food_home_page_cook_title');
	      $cookText = carbon_get_post_meta(get_the_ID(), 'food_home_page_cook_text');
	      $cookImage= carbon_get_post_meta(get_the_ID(), 'food_home_page_cook_image');

        if( $cookImage && $cookText && $cookTitle ):?>
        <!-- Cook-->
        <section class="cook-home indent-horizontal">
          <svg class="bg-pic top-pic" width="406" height="336" viewBox="0 0 406 336" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M278.548 131.56C292.963 117.813 313.972 86.9358 307.947 63.7024C296.769 20.6025 235.289 -6.28164 211.66 2.44446C216.661 3.75758 231.583 12.6979 246.446 26.0727C259.957 38.2301 261.871 64.4088 245.155 44.6609C239.303 37.7471 222.154 19.3344 209.665 14.016C184.373 3.24563 158.211 3.10103 138.536 16.2089C150.416 17.8931 173.045 22.0323 195.919 35.0187C224.511 51.2516 233.351 67.3811 232.457 68.7499C231.563 70.1187 232.746 68.5472 206.759 52.3892C165.331 26.6292 110.916 17.4695 72.8562 56.3252C106.313 41.5385 131.858 50.6852 167.156 62.2555C184.476 67.9327 214.084 86.0408 209.793 88.9335C205.501 91.8261 201.545 88.5914 188.048 82.5426C174.551 76.4938 145.774 69.5842 127.609 67.9722C87.5878 64.4207 47.348 57.0127 16.3592 120.229C55.1443 92.777 102.457 97.103 142.936 102.518C151.512 103.666 203.803 115.792 199.164 129.019C196.378 136.963 173.054 127.052 166.292 125.402C159.531 123.752 128.354 115.48 119.326 113.815C110.299 112.15 90.9292 108.124 65.2372 114.94C39.5453 121.755 25.3082 134.262 20.8319 138.987C16.3555 143.711 6.70911 160.03 4.92503 173.022C3.49776 183.415 1.41987 194.328 0.559294 198.485C7.1486 191.235 24.515 175.292 48.6158 165.647C78.7417 153.591 101.595 151.673 112.332 151.688C123.069 151.704 139.5 154.166 138.75 160.348C138 166.53 120.005 172.122 111.214 174.354C102.423 176.586 81.8 181.38 74.0443 183.963C66.2887 186.546 44.23 196.854 29.5896 206.494C14.9493 216.134 10.4039 225.998 6.05859 242.524C2.58234 255.745 8.33007 286.459 11.0964 292.225C9.96434 283.892 14.8843 272.351 26.931 261.99M278.548 131.56L289.342 132.263M278.548 131.56C278.506 123.558 284.231 96.2112 282.384 81.0753C280.074 62.1554 274.694 51.6414 268.028 40.9412M278.548 131.56C276.04 122.816 268.434 101.359 258.071 85.4783C245.117 65.6273 228.546 46.6685 219.135 37.2674M278.548 131.56C275.901 131.808 272.341 132.341 267.979 133.224M278.548 131.56C315.921 144.503 356.012 205.936 340.109 243.643M26.931 261.99C65.4959 254.058 36.3187 276.948 52.5473 278.535C65.6055 279.813 80.0666 278.157 107.359 256.114C123.954 242.711 150.069 198.11 154.811 210.868C160.241 225.475 145.258 252.917 122.473 274.531C94.4214 301.139 60.8089 300.939 57.6953 301.834C62.1995 302.552 91.2989 323.937 108.053 324.006C120.595 324.058 142.646 322.634 165.078 297.58C187.51 272.526 196.996 235.327 199.51 225.09C201.521 216.9 202.543 193.278 202.803 182.491C203.974 177.344 207.765 169.59 213.566 179.757C220.816 192.466 208.478 241.688 199.638 263.741C189.549 288.91 164.028 320.55 138.582 334.014C147.275 333.996 173.239 337.17 190.72 332.705C212.571 327.124 227.05 320.379 238.641 299.147C250.232 277.915 255.652 259.153 258.075 241.697C260.499 224.241 258.62 201.371 257.36 194.202C256.352 188.467 251.685 173.448 250.636 166.471C266.906 174.062 270.616 198.958 271.113 215.147C271.498 227.703 271.803 247.362 269.853 257.317C266.255 275.688 256.349 320.179 230.742 325.083C253.112 324.347 284.169 305.874 296.908 288.799C311.112 269.761 312.606 244.929 311.708 236.044C310.811 227.158 304.523 195.551 299.768 184.635C295.964 175.902 293.161 167.519 292.236 164.419C291.254 161.663 290.688 157.225 296.275 161.525C301.862 165.825 308.309 178.009 310.835 183.564C312.696 188.522 316.704 199.666 317.845 204.578C319.273 210.717 323.025 231.881 322.816 239.556C322.608 247.231 321.761 259.369 318.393 268.398C315.699 275.621 310.678 283.049 308.505 285.861C326.734 284.446 356.785 265.4 364.741 234.426C372.4 204.61 354.897 181.382 339.083 160.136C336.999 157.907 333.438 150.387 343.459 153.938C367.951 162.616 381.559 198.402 381.978 221.834C387.457 219.446 401.118 199.732 403.931 186.598C408.004 167.575 401.522 148.76 386.748 136.634M26.931 261.99C37.8352 255.877 71.4762 236.845 80.8703 231.134C90.917 225.026 116.349 217.255 146.459 185.907M289.342 132.263C299.066 126.084 309.095 121.569 317.103 118.988C325.11 116.407 340.439 116.166 358.015 120.81C367.701 123.37 378.527 129.887 386.748 136.634M289.342 132.263C304.444 134.37 376.821 142.453 385.308 171.683M289.342 132.263C308.844 129.826 350.973 125.553 363.466 127.951C375.959 130.349 384.193 134.739 386.748 136.634M255.102 136.291C260.982 143.485 273.822 162.027 278.14 178.646C283.537 199.42 291.054 234.759 289.33 258.692C287.952 277.839 282.801 289.468 280.398 292.889M255.102 136.291C259.935 134.988 264.25 133.978 267.979 133.224M255.102 136.291C251.545 137.251 247.708 138.369 243.617 139.664M227.17 145.357C230.752 150.463 237.202 169.158 234.355 203.098C230.796 245.523 224.155 265.757 215.444 285.29C208.475 300.917 201.109 311.239 198.298 314.448M227.17 145.357C233.011 143.166 238.511 141.279 243.617 139.664M227.17 145.357C219.503 148.234 211.247 151.633 202.524 155.624M185.486 163.9C180.899 166.259 176.215 168.774 171.45 171.453C162.246 176.628 153.951 181.44 146.459 185.907M185.486 163.9C186.196 172.106 182.886 193.959 174.578 222.209C163.979 258.244 159.718 263.135 145.355 286.581C136.362 301.262 124.433 307.426 118.803 309.131M185.486 163.9C191.331 160.894 197.021 158.141 202.524 155.624M267.979 133.224C258.994 119.944 237.141 90.8479 221.614 80.7067C202.204 68.0303 191.913 60.17 175.53 53.7007M243.617 139.664C241.023 133.467 228.331 118.16 198.32 106.5C160.806 91.9256 140.624 87.2064 106.812 83.9995C79.7618 81.434 65.4706 87.1579 61.7063 90.3405M202.524 155.624C193.686 152.184 167.189 143.48 131.9 136.184C96.611 128.889 55.0272 142.769 38.6464 150.621M146.459 185.907C126.982 188.692 73.6594 206.572 59.7768 214.819C45.8942 223.066 32.1589 234.262 27.0266 238.83" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <svg class="bg-pic bottom-pic" width="495" height="430" viewBox="0 0 495 430" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M166.871 150.717C152.079 130.743 132.83 88.3025 145.191 61.0225C168.121 10.4157 249.439 -9.53158 276.63 6.2337C270.202 6.78218 249.95 14.5929 228.825 27.8683C209.623 39.9354 201.689 71.713 226.45 50.997C235.118 43.7442 260.128 24.7623 276.616 20.8858C310.007 13.0354 342.203 18.4345 363.599 38.7443C348.634 38.2824 319.93 38.5477 289.039 49.6379C250.426 63.5006 236.119 81.4467 236.927 83.3202C237.734 85.1937 236.615 83.0096 272.009 68.6833C328.434 45.8437 397.288 46.1819 435.798 102.066C397.816 76.7548 364.459 82.5549 318.596 89.2557C296.092 92.5436 255.829 108.495 260.489 112.966C265.148 117.438 270.702 114.304 288.586 109.744C306.469 105.185 343.322 102.824 365.999 104.714C415.96 108.879 467.013 108.349 491.636 192.677C449.804 150.658 390.712 145.891 339.791 143.92C329.002 143.503 262.128 147.265 265.012 164.516C266.744 174.876 297.533 167.663 306.197 167.076C314.862 166.489 354.956 162.965 366.41 162.842C377.863 162.72 402.536 161.899 432.67 175.755C462.805 189.611 477.642 208.023 482.139 214.785C486.635 221.548 495.016 243.668 494.44 260.021C493.98 273.103 494.208 286.963 494.38 292.257C487.824 281.939 469.871 258.636 442.296 241.641C407.828 220.397 380.139 213.167 366.935 210.896C353.731 208.626 333.005 208.151 332.61 215.912C332.214 223.672 353.147 234.383 363.479 239.001C373.811 243.619 398.144 253.91 407.129 258.739C416.113 263.568 441.036 280.944 456.981 295.916C472.926 310.889 476.412 323.984 478.231 345.229C479.687 362.225 466.073 398.761 461.443 405.261C464.611 395.257 461.022 380.019 448.42 364.713M166.871 150.717L153.451 149.281M166.871 150.717C168.628 140.889 167.418 106.046 172.917 87.831C179.789 65.062 188.645 53.2824 199.122 41.5481M166.871 150.717C171.818 140.502 185.743 115.743 201.869 98.4271C222.028 76.7824 246.442 57.0058 260.017 47.4537M166.871 150.717C170.072 151.586 174.335 153.001 179.51 155.016M166.871 150.717C118.163 158.663 55.7776 225.647 67.2916 275.396M448.42 364.713C402.697 346.74 433.69 381.101 413.399 379.594C397.072 378.381 379.645 373.262 350.789 340.343C333.244 320.328 310.644 259.925 302.094 274.6C292.304 291.402 304.876 328.335 328.282 359.764C357.098 398.458 398.466 405.377 402.103 407.141C396.412 407.064 356.077 427.153 335.464 423.667C320.033 421.056 293.225 414.606 270.987 379.021C248.749 343.435 245.015 295.679 244.107 282.557C243.381 272.059 247.159 242.8 249.139 229.482C248.797 222.903 245.789 212.562 236.49 223.826C224.866 237.906 229.543 301.052 235.71 330.05C242.749 363.144 267.381 407.485 295.796 429.462C285.112 427.587 252.515 425.955 231.974 416.739C206.298 405.219 189.935 393.84 180.211 365.266C170.486 336.691 167.822 312.468 168.563 290.49C169.304 268.512 176.49 240.796 179.568 232.25C182.03 225.413 190.969 207.944 193.745 199.59C172.124 205.453 162.255 235.271 158.193 255.069C155.043 270.424 150.478 294.53 150.753 307.184C151.261 330.537 153.955 387.349 184.393 398.836C157.048 393.163 122.802 363.832 110.779 340.122C97.3746 313.689 100.831 282.84 103.829 272.107C106.827 261.374 121.295 223.855 129.468 211.448C136.007 201.521 141.239 191.813 143.038 188.199C144.832 185.02 146.474 179.684 138.688 183.78C130.903 187.875 120.379 201.481 116.09 207.772C112.745 213.471 105.442 226.318 102.991 232.113C99.9278 239.357 90.8034 264.577 89.4232 274.057C88.0429 283.537 86.4975 298.642 88.7136 310.46C90.4864 319.915 95.075 330.118 97.1477 334.038C75.0376 328.413 42.1505 298.591 38.9716 258.813C35.9117 220.524 62.3823 195.697 86.3541 172.946C89.3919 170.65 95.3722 162.164 82.295 164.393C50.3339 169.842 25.9749 210.938 20.4649 239.658C14.2376 235.554 1.6435 208.404 0.985486 191.657C0.0324261 167.4 12.0125 145.65 32.7619 133.891M448.42 364.713C436.317 354.872 399.013 324.302 388.681 315.278C377.631 305.627 348.021 290.652 317.683 245.692M153.451 149.281C142.812 139.611 131.444 131.922 122.149 127.042C112.855 122.162 94.0596 118.598 71.4614 120.562C59.0073 121.644 44.3076 127.348 32.7619 133.891M153.451 149.281C134.434 148.652 43.7262 143.161 27.0608 177.29M153.451 149.281C129.992 142.128 79.1084 127.893 63.2373 128.178C47.3661 128.463 36.3074 132.106 32.7619 133.891M194.688 161.532C185.925 169.123 166.187 189.183 157.335 208.695C146.271 233.085 129.496 274.93 126.513 304.723C124.127 328.558 127.981 343.952 130.205 348.67M194.688 161.532C189.024 158.899 183.934 156.739 179.51 155.016M194.688 161.532C198.856 163.47 203.336 165.664 208.09 168.127M227.096 178.633C221.605 184.146 209.689 205.756 205.955 248.091C201.287 301.009 205.138 327.302 211.684 353.174C216.921 373.872 223.776 388.133 226.549 392.677M227.096 178.633C220.382 174.694 214.023 171.201 208.09 168.127M227.096 178.633C235.91 183.804 245.336 189.743 255.21 196.509M274.392 210.316C279.53 214.194 284.752 218.285 290.039 222.594C300.252 230.918 309.425 238.603 317.683 245.692M274.392 210.316C271.771 220.254 271.181 247.826 275.374 284.33C280.723 330.893 284.919 337.814 297.58 369.703C305.507 389.669 318.86 399.79 325.418 403.086M274.392 210.316C267.847 205.374 261.439 200.777 255.21 196.509M179.51 155.016C193.388 140.604 226.457 109.49 247.709 100.332C274.275 88.8845 288.603 81.4143 310.125 76.9531M208.09 168.127C212.6 161.062 231.466 144.947 270.85 137.009C320.079 127.088 345.897 125.588 388.152 128.853C421.955 131.465 438.306 141.548 442.255 146.264M255.21 196.509C266.808 194.163 301.241 189.111 346.182 187.664C391.124 186.216 439.291 212.146 457.756 225.292M317.683 245.692C341.036 253.268 402.783 286.617 418.093 299.716C433.403 312.815 447.903 329.508 453.239 336.218" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>

          <div class="container-fluid">
            <div class="row">
              <div class="pic-wrapper col-md-7 ">
                <img
                   class="lazy"
                   data-src="<?php echo wp_get_attachment_image_src($cookImage, 'full')[0];?>"
                   alt="<?php echo get_post_meta($cookImage, '_wp_attachment_image_alt', TRUE);?>"
                >
              </div>
              <div class="text-wrapper col-md-5 ">
                <h2 class="block-title"><?php echo $cookTitle;?></h2>
                <div class="text"><?php echo wpautop($cookText);?></div>
              </div>
            </div>
          </div>
        </section>
    <?php endif;?>

<?php
    $advantagesList = carbon_get_post_meta(get_the_ID(), 'food_home_page_advantages_list');

    if( $advantagesList):
 ?>
    <!-- Advantages -->
    <section class="advantages indent-horizontal">
      <div class="container-fluid">
        <div class="row content">
          <?php foreach( $advantagesList as $item ):?>
            <div class="item col-lg-4 col-sm-8">
              <div class="icon-wrapper">
                <img src="<?php echo $item['icon'];?>" alt="" class="svg-pic">
              </div>
              <h3 class="name card-title"><?php echo $item['name'];?></h3>
              <p class="description"><?php echo $item['description'];?></p>
            </div>
          <?php endforeach;?>
        </div>
      </div>
    </section>
<?php endif;?>

     <?php
     	$blogArgs = array(
     		'posts_per_page' => 2,
     		'orderby' 	 => 'date',
     		'post_type'  => 'blog',
     		'post_status'    => 'publish'
     	);

     	$blogList = new WP_Query( $blogArgs );

     		  if ( $blogList->have_posts() ) :?>

                  <!-- Blog -->
                  <section class="home-blog indent-horizontal">
                    <div class="container-fluid">
                      <div class="row content" id="blog-list">
	                      <?php while ( $blogList->have_posts() ) : $blogList->the_post(); ?>
                          <?php get_template_part('template-parts/blog-item');?>
	                      <?php endwhile;?>
                      </div>
                    </div>
                  </section>


     	<?php endif; ?>
     <?php wp_reset_postdata(); ?>

    <?php
        $formRegistrationTitle = carbon_get_post_meta(get_the_ID(), 'food_home_page_reservation_title');
	      $formRegistrationText = carbon_get_post_meta(get_the_ID(), 'food_home_page_reservation_text');

	      if ( $formRegistrationTitle ){

	        $formRegistrationArgs = array(
	            'title' => $formRegistrationTitle,
              'text' => $formRegistrationText
          );

	        get_template_part('template-parts/block-reservation', '', $formRegistrationArgs);
        }
    ?>

    <?php
        $caloriesTitle = carbon_get_post_meta(get_the_ID(), 'food_home_page_calories_title');
	      $caloriesText = carbon_get_post_meta(get_the_ID(), 'food_home_page_calories_text');
	      $caloriesList = carbon_get_post_meta(get_the_ID(), 'food_home_page_calories_list');

        if( $caloriesTitle && $caloriesList ):?>
        <!-- Calories -->
        <section class="home-calories indent-horizontal">
          <div class="container-fluid">
            <div class="row">
              <h2 class="heading heading-small col-lg-8 offset-lg-2 text-center"><?php echo $caloriesTitle;?></h2>
              <div class="text col-lg-8 offset-lg-2 text-center"><?php echo wpautop($caloriesText);?></div>
            </div>
            <div class="row content" id="home-calories-slider">
              <?php foreach( $caloriesList as $item ):?>
                <div class="item col-lg-4 col-sm-6">
                  <img
                      data-lazy="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
                      alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
                  >
                  <h3 class="name card-title">
                    <?php echo $item['name'];?>
                    <svg width="48" height="28" viewBox="0 0 48 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_13989_779)">
                        <path d="M34.0517 0.981934L31.3237 3.77L39.6221 12.0625H0.75V15.9375H39.6221L31.3257 24.2319L34.0517 27.0181L47.0659 14L34.0517 0.981934Z" fill="#233000"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_13989_779">
                          <rect width="48" height="28" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                  </h3>
                </div>
              <?php endforeach;?>
            </div>
          </div>
        </section>
    <?php endif;?>

     <?php
     	$reviewArgs = array(
     		'posts_per_page' => -1,
     		'orderby' 	 => 'date',
     		'post_type'  => 'reviews',
     		'post_status'    => 'publish'
     	);

     	$reviewList = new WP_Query( $reviewArgs );

     		  if ( $reviewList->have_posts() ) :?>


                  <!-- Reviews -->
                  <section class="reviews indent-horizontal">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="content col-lg-10 offset-lg-1">
                          <div class="reviews-slider" id="reviews-slider">
	                          <?php while ( $reviewList->have_posts() ) : $reviewList->the_post(); ?>
                              <div class="slide" data-name="<?php the_title();?>" data-avatar="<?php the_post_thumbnail_url();?>" data-position="<?php echo carbon_get_post_meta(get_the_ID(), 'food_reviews_position');?>">
                                <p class="text card-title"><?php echo carbon_get_post_meta(get_the_ID(), 'food_reviews_text');?></p>
                                <svg width="282" height="234" viewBox="0 0 282 234" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path opacity="0.48" d="M126.771 75.7059C126.771 110.691 112.685 143.956 84.5138 175.5C56.3425 207.044 32.4832 226.544 12.9358 234L0 213.353C19.5474 203.029 36.2202 187.831 50.0183 167.757C63.8165 147.684 71.8654 127.037 74.1651 105.816C67.2661 109.257 57.7798 110.978 45.7064 110.978C34.208 110.978 24.1468 105.816 15.5229 95.4926C7.47401 85.1691 3.44954 71.6912 3.44954 55.0588C3.44954 37.853 9.48624 24.375 21.5596 14.625C33.633 4.87501 48.581 0 66.4037 0C84.8012 0 99.4618 6.30883 110.385 18.9265C121.309 30.9706 126.771 49.8971 126.771 75.7059ZM282 75.7059C282 110.691 267.914 143.956 239.743 175.5C211.572 207.044 187.713 226.544 168.165 234L155.229 213.353C174.777 203.029 191.45 187.831 205.248 167.757C219.046 147.684 227.095 127.037 229.395 105.816C222.495 109.257 213.009 110.978 200.936 110.978C189.437 110.978 179.376 105.816 170.752 95.4926C162.703 85.1691 158.679 71.6912 158.679 55.0588C158.679 37.853 164.716 24.375 176.789 14.625C188.862 4.87501 203.81 0 221.633 0C240.031 0 254.691 6.30883 265.615 18.9265C276.538 30.9706 282 49.8971 282 75.7059Z" fill="#EBF0E4"/>
                                </svg>
                              </div>
	                          <?php endwhile;?>
                          </div>
                          <div class="info-controls">
                            <div class="slide-info">
                              <div class="slide-info__avatar">
                                <img
                                   src=""
                                >
                              </div>
                              <div>
                                <p class="name mini-title"></p>
                                <p class="position"></p>
                              </div>
                            </div>
                            <div class="slider-controls">
                              <button class="control prev">
                                <svg width="48" height="28" viewBox="0 0 48 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_6790_1570)">
                                    <path d="M13.7642 0.982422L16.4922 3.77048L8.19386 12.063H47.0659V15.938H8.19386L16.4902 24.2324L13.7642 27.0185L0.749981 14.0005L13.7642 0.982422Z" fill="#233000"/>
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_6790_1570">
                                      <rect width="48" height="28" fill="white"/>
                                    </clipPath>
                                  </defs>
                                </svg>
                              </button>
                              <p class="slide-counter mini-title"><span class="current">1</span> / <span class="all"></span></p>
                              <button class="control next">
                                <svg width="48" height="28" viewBox="0 0 48 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_13989_779)">
                                    <path d="M34.0517 0.981934L31.3237 3.77L39.6221 12.0625H0.75V15.9375H39.6221L31.3257 24.2319L34.0517 27.0181L47.0659 14L34.0517 0.981934Z" fill="#233000"/>
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_13989_779">
                                      <rect width="48" height="28" fill="white"/>
                                    </clipPath>
                                  </defs>
                                </svg>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
     	<?php endif; ?>
     <?php wp_reset_postdata(); ?>

<?php get_footer();
