<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template menu page
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package foodtemplate
	 *
	 */

	get_header();?>

	<?php
	    $menuMainTitle = carbon_get_post_meta(get_the_ID(), 'food_menu_page_main_screen_title');
	    $menuMainText = carbon_get_post_meta(get_the_ID(), 'food_menu_page_main-screen_text');
		  $menuMainImage = carbon_get_post_meta(get_the_ID(), 'food_menu_page_main-screen_image');

	    if( $menuMainTitle && $menuMainImage ):?>
	    <!-- main screen -->
	    <section class="menu-main-screen main-screen main-screen--big indent-horizontal" style="background-image: url(<?php echo $menuMainImage;?>)">
	      <div class="container-fluid">
	        <div class="row">
		        <div class="content col-lg-6 col-md-7">
			        <h1 class="heading heading-big"><?php echo $menuMainTitle;?></h1>
			        <div class="text"><?php echo $menuMainText;?></div>
		        </div>
	        </div>
	      </div>
	    </section>
	<?php endif;?>

    <?php

        $menuStarterTitle = carbon_get_post_meta(get_the_ID(), 'food_menu_page_starters_title');
	      $menuStarterText = carbon_get_post_meta(get_the_ID(), 'food_menu_page_starters_text');
	      $menuStarterImage = carbon_get_post_meta(get_the_ID(), 'food_menu_page_starters_image');
	      $menuStarterCategoryList = carbon_get_post_meta(get_the_ID(), 'food_menu_page_starters_menu_type');

	      if( $menuStarterTitle && $menuStarterImage && $menuStarterCategoryList ):

            $catIdList = [];

	          foreach ( $menuStarterCategoryList as $catId ){

	            array_push($catIdList, $catId['id']);
            }

          $menuStarterArgs = array(
            'tax_query' => array(
              array(
                'taxonomy' => 'menu_tax',
                'field' => 'id',
                'lang' => false,
                'suppress_filters' => false,
                'terms' => $catIdList

              )
            ),
            'post_type' => 'our_menu',
            'orderby' 	 => 'date',
            'post_status'  => 'publish',
            'suppress_filters' => false,
            'lang' => false,
          );
	      ?>
        <!-- Starter menu -->
        <section class="menu-page-category starter-menu indent-horizontal">
          <svg class="bg-pic" width="517" height="401" viewBox="0 0 517 401" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M438.348 7.2265C479.891 -18.0206 516.174 -39.1492 516.174 -39.1492M165.192 230.079C157.652 238.87 150.512 247.656 143.893 256.355M288.23 184.293C288.23 184.293 288.225 184.261 288.201 184.189C287.875 182.819 284.582 168.347 286.405 147.978C287.693 133.57 291.534 116.214 300.809 98.4722L300.807 98.4616C300.807 98.4616 300.807 98.4616 300.817 98.4593L300.815 98.4487L300.825 98.4464C300.825 98.4464 300.825 98.4464 300.824 98.4358M300.16 98.4501L300.162 98.461L300.172 98.4587M301.393 103.081C301.393 103.081 294.946 136.36 336.476 149.22M286.891 147.851C270.495 156.76 263.547 170.643 261.612 175.234M199.842 276.105C211.609 279.746 227.439 279.671 248.497 271.271M271.49 191.155C270.005 186.769 267.276 180.578 262.483 174.884C256.311 167.557 246.724 161.061 231.985 160.305C225.004 159.941 216.862 160.868 207.373 163.61C165.165 175.805 161.727 210.021 164.362 230.659C165.327 238.161 167.086 243.867 168.083 246.078C169.235 248.634 171.877 254.214 176.711 259.964M96.6715 293.867C86.3877 312.021 80.9895 336.933 91.3411 362.051C106.933 399.915 138.949 406.353 172.085 395.799C205.221 385.246 222.594 342.347 218.342 316.949C216.089 303.47 210.989 287.421 200.887 275.479C195.2 268.742 187.908 263.315 178.641 260.379C173.373 258.707 167.455 257.852 160.828 258.013C154.028 258.182 148.202 258.728 143.203 259.52M92.349 360.208C71.3929 386.032 44.0892 382.897 26.5225 368.133C21.5049 363.915 17.2701 358.737 14.2238 353.021C10.6672 346.348 8.57912 339.435 7.66426 332.602C5.02041 313.144 11.8268 294.403 20.8746 284.032C29.5685 274.06 45.2203 270.624 53.5225 269.465M13.9649 333.963C13.9649 333.963 3.2217 328.091 1.082 336.926C-1.0577 345.761 8.82369 349.352 11.5114 358.014C14.1991 366.676 12.0306 378.416 16.8702 380.731C21.7079 383.035 28.4887 379.58 27.3423 367.841M418.234 18.9476C418.234 18.9476 393.955 33.2009 401.426 75.575C408.899 117.96 438.247 128.588 438.247 128.588C459.672 98.1513 457.302 65.2004 453.267 38.4483C451.065 23.7899 444.023 13.3145 437.344 8.29629M437.344 8.29629C436.475 7.64271 435.612 7.08612 434.776 6.62195C430.259 4.1383 427.566 5.67945 424.501 7.74455C415.989 13.4758 422.354 20.5813 432.67 16.1751C434.823 15.2622 437.395 12.2158 437.344 8.29629ZM437.344 8.29629C437.351 7.3419 437.243 6.31569 437.022 5.23875C435.36 -3.07261 427.061 -14.7034 404.81 -25.3818C367.915 -43.084 322.38 -37.6797 322.38 -37.6797C322.38 -37.6797 346.448 -2.62874 367.891 18.2887M367.891 18.2887C382.975 14.5671 395.465 14.9922 400.446 15.4745C410.933 16.493 412.853 27.3838 393.955 33.2009C387.832 35.0847 378.167 28.3026 367.891 18.2887ZM367.891 18.2887C351.183 22.4069 331.283 31.62 314.869 51.4719C314.869 51.4719 353.646 58.1725 381.321 41.504C365.211 52.0654 336.004 70.1169 326.025 77.7198C318.039 83.8004 308.865 91.053 298.876 99.2493C298.878 99.2598 298.878 99.2598 298.878 99.2598L298.868 99.2621C298.858 99.2644 298.858 99.2644 298.858 99.2644L298.86 99.2749M250.259 142.223C243.957 147.946 237.582 153.837 231.21 159.869M286.779 114.743C286.779 114.743 266.531 136.15 234.418 147.146C202.305 158.143 161.62 157.389 161.62 157.389C161.62 157.389 160.785 135.804 199.989 101.295C239.193 66.7859 279.077 86.6913 285.981 92.3724C292.875 98.0558 291.688 104.018 279.262 105.998C266.837 107.979 230.639 72.2269 222.071 47.4593C212.749 20.5143 212.209 -8.46795 212.209 -8.46795C212.209 -8.46795 250.213 9.02716 280.054 41.1485C309.896 73.2699 297.365 94.8982 297.365 94.8982L297.353 94.8899M232.829 75.7551C232.829 75.7551 205.928 65.1215 195.9 67.502C195.9 67.502 163.059 -4.79155 71.4316 55.3991C71.4316 55.3991 90.3075 87.4399 130.666 86.8167C171.025 86.1935 186.24 66.9284 186.24 66.9284C186.24 66.9284 110.137 65.1663 103.611 55.73M273.002 73.1775C273.002 73.1775 247.453 37.5662 243.322 32.9317C240.729 30.0281 228.002 33.3706 237.157 46.7695C247.358 61.6946 266.414 55.8382 266.414 55.8382M262.673 105.12C262.673 105.12 200.684 117.589 188.673 136.18M215.445 101.071C215.445 101.071 240.98 101.554 252.674 114.909M341.524 37.1408C341.524 37.1408 356.186 40.4987 369.296 37.7811C382.406 35.0636 382.406 35.0636 382.406 35.0636M408.636 13.0982C408.636 13.0982 383.277 -20.5622 359.861 -19.4026M429.81 30.7874C429.81 30.7874 423.997 60.8629 428.86 83.0603C433.722 105.258 421.038 101.797 418.539 87.6888C416.041 73.5811 431.989 64.0198 431.989 64.0198M417.541 32.4009C417.541 32.4009 430.845 37.6037 434.593 48.413M318.991 183.726C318.991 183.726 324.254 147.416 366.786 138.36C403.373 130.576 422.22 175.855 416.294 196.06C412.765 208.102 401.955 237.175 355.314 240.182M116.276 48.1871C116.276 48.1871 140.754 50.8479 149.232 69.7365M395.251 -10.3248C395.251 -10.3248 376.938 0.868363 362.202 -7.11034M292.008 184.767C285.354 185.711 276.916 189.419 271.383 193.036C246.617 210.531 235.572 242.702 247.719 272.202C251.038 280.253 257.041 290.889 264.445 295.952C307.065 325.105 347.229 284.325 350.667 271.696C352.164 266.198 357.669 251.889 355.174 231.593C355.174 231.593 351.908 207.045 332.498 193.179C313.534 179.615 292.008 184.767 292.008 184.767ZM144.321 255.243C144.321 255.243 143.722 256.059 142.605 257.443C118.451 263.015 114.042 270.241 114.042 270.241C107.743 275.116 101.291 282.574 96.0858 291.777C89.7152 293.203 83.1614 293.064 76.7415 290.467C65.0349 285.733 57.2191 277.97 52.0565 269.518C43.0693 254.821 41.7866 242.752 42.7074 231.421C43.8925 216.793 54.7875 206.573 54.7875 206.573C70.043 188.032 105.088 176.308 128.615 197.064C152.13 217.813 144.321 255.243 144.321 255.243ZM64.8025 234.371C68.0358 231.929 67.7683 213.556 76.8459 217.041C85.9234 220.527 86.7295 234.17 83.2372 236.431C79.745 238.692 72.3366 242.097 71.3663 239.169C70.3961 236.242 72.4859 233.813 73.866 235.201C75.2541 236.577 77.9599 255.843 73.1894 258.639C68.419 261.436 56.9498 249.596 60.3833 248.29C63.8167 246.983 64.4162 247.808 64.787 249.911C65.1578 252.013 57.4573 261.547 52.1026 254.533C46.7479 247.519 51.7819 237.145 56.2036 237.58C60.6433 238 64.8025 234.371 64.8025 234.371ZM294.943 263.287C297.646 262.621 296.314 245.869 304.827 247.569C313.34 249.268 314.995 261.207 313.074 264.547C311.152 267.887 306.485 267.274 307.268 263.956C308.051 260.639 328.321 250.414 330.125 259.171C331.928 267.928 325.893 278.98 318.595 278.972C311.297 278.965 309.814 274.47 306.695 276.158C303.576 277.846 310.242 293.217 299.079 292.89C287.917 292.563 287.01 273.208 289.92 272.897C292.831 272.597 294.309 273.216 294.583 276.05C294.857 278.884 290.402 285.945 279.815 278.972C269.227 271.988 276.797 260.593 282.098 259.612C287.389 258.622 287.833 265.045 294.943 263.287ZM142.552 352.323C145.296 352.486 148.465 335.889 156.108 340.082C163.752 344.276 162.175 356.316 159.464 358.964C156.755 361.623 152.473 359.627 154.097 356.652C155.722 353.677 177.69 349.861 177.09 358.868C176.49 367.876 167.833 376.758 160.894 374.568C153.952 372.368 153.735 367.586 150.319 368.285C146.904 368.984 149.182 385.84 138.66 382.179C128.137 378.518 132.385 359.528 135.233 360.102C138.081 360.676 139.327 361.728 138.838 364.551C138.349 367.373 132.242 372.871 124.02 362.956C115.798 353.04 126.009 344.28 131.307 344.921C136.603 345.552 135.339 351.905 142.552 352.323ZM374.578 190.375C382.331 190.913 375.046 200.915 380.572 202.676C384.447 203.902 389.461 206.437 388.06 212.755C386.946 217.774 373.786 225.264 367.18 212.241C363.769 205.525 374.201 207.051 373.903 210.21C373.646 212.901 369.557 221.86 364.447 221.345C359.327 220.833 354.385 217.069 356.567 210.33C358.047 205.752 363.493 206.997 364.447 199.143C365.273 192.313 367.942 189.917 374.578 190.375ZM180.587 208.041C184.752 204.092 188.047 216.604 190.153 216.613C193.397 216.612 194.506 205.732 199.227 215.927C203.948 226.121 196.246 231.941 193.814 229.206C191.383 226.47 193.739 224.488 194.592 225.093C195.455 225.696 201.112 239.136 195.543 245.474C189.976 251.823 180.479 233.765 182.939 233.197C185.399 232.63 189.208 233.949 185.896 236.8C182.584 239.652 176.758 238.765 176.413 229.286C176.068 219.807 181.56 225.846 182.268 222.101C182.976 218.356 175.416 212.936 180.587 208.041Z" stroke="black" stroke-miterlimit="10"/>
          </svg>
          <div class="container-fluid">
            <div class="row">
              <h2 class="block-title col-12 text-center"><?php echo $menuStarterTitle;?></h2>
              <?php if( $menuStarterText ):?>
                <div class="text col-12 text-center"><?php echo wpautop($menuStarterText);?></div>
              <?php endif;?>
            </div>
            <div class="row content">
              <div class="pic-wrapper col-md-6">
                <img
                   class="lazy"
                   data-src="<?php echo wp_get_attachment_image_src($menuStarterImage, 'full')[0];?>"
                   alt="<?php echo get_post_meta($menuStarterImage, '_wp_attachment_image_alt', TRUE);?>"
                >
              </div>
              <div class="product-list col-md-6">
                <div class="list-wrapper">
	                <?php
		                $menuStarterList = new WP_Query( $menuStarterArgs );

		                if ( $menuStarterList->have_posts() ) :

			                while ( $menuStarterList->have_posts() ) : $menuStarterList->the_post(); ?>
				                <?php get_template_part('template-parts/our-menu-item');?>
			                <?php endwhile;?>
		                <?php endif; ?>
	                <?php wp_reset_postdata(); ?>
                </div>

              </div>
            </div>
          </div>
        </section>
    <?php endif;?>

<?php

	$menuMainsTitle = carbon_get_post_meta(get_the_ID(), 'food_menu_page_mains_title');
	$menuMainsText = carbon_get_post_meta(get_the_ID(), 'food_menu_page_mains_text');
	$menuMainsImage = carbon_get_post_meta(get_the_ID(), 'food_menu_page_mains_image');
	$menuMainsCategoryList = carbon_get_post_meta(get_the_ID(), 'food_menu_page_mains_menu_type');

	if( $menuMainsTitle && $menuMainsImage && $menuMainsCategoryList ):

		$catIdList = [];

		foreach ( $menuMainsCategoryList as $catId ){

			array_push($catIdList, $catId['id']);
		}

		$menuMainsArgs = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'menu_tax',
					'field' => 'id',
					'lang' => false,
					'suppress_filters' => false,
					'terms' => $catIdList
				)
			),
			'post_type' => 'our_menu',
			'orderby' 	 => 'date',
			'post_status'  => 'publish',
			'suppress_filters' => false,
			'lang' => false,
		);
		?>
      <!-- Mains menu -->
      <section class="menu-page-category mains-menu indent-horizontal">
        <div class="container-fluid">
          <div class="row">
            <h2 class="block-title col-12 text-center"><?php echo $menuMainsTitle;?></h2>
			  <?php if( $menuMainsText ):?>
                <div class="text col-12 text-center"><?php echo wpautop($menuMainsText);?></div>
			  <?php endif;?>
          </div>
          <div class="row content">
            <div class="product-list col-md-6">
              <div class="list-wrapper">
	              <?php
		              $menuMainsList = new WP_Query( $menuMainsArgs );

		              if ( $menuMainsList->have_posts() ) :

			              while ( $menuMainsList->have_posts() ) : $menuMainsList->the_post(); ?>
				              <?php get_template_part('template-parts/our-menu-item');?>
			              <?php endwhile;?>
		              <?php endif; ?>
	              <?php wp_reset_postdata(); ?>
              </div>
            </div>
            <div class="pic-wrapper col-md-6">
              <img
                  class="lazy"
                  data-src="<?php echo wp_get_attachment_image_src($menuMainsImage, 'full')[0];?>"
                  alt="<?php echo get_post_meta($menuMainsImage, '_wp_attachment_image_alt', TRUE);?>"
              >
            </div>
          </div>
        </div>
      </section>
	<?php endif;?>

<?php

	$menuDrinksTitle = carbon_get_post_meta(get_the_ID(), 'food_menu_page_drinks_title');
	$menuDrinksText = carbon_get_post_meta(get_the_ID(), 'food_menu_page_drinks_text');
	$menuDrinksImage = carbon_get_post_meta(get_the_ID(), 'food_menu_page_drinks_image');
	$menuDrinksCategoryList = carbon_get_post_meta(get_the_ID(), 'food_menu_page_drinks_menu_type');

	if( $menuDrinksTitle && $menuDrinksImage && $menuDrinksCategoryList ):

		$catIdList = [];

		foreach ( $menuDrinksCategoryList as $catId ){

			array_push($catIdList, $catId['id']);
		}

		$menuDrinksArgs = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'menu_tax',
					'field' => 'id',
					'lang' => false,
					'suppress_filters' => false,
					'terms' => $catIdList

				)
			),
			'post_type' => 'our_menu',
			'orderby' 	 => 'date',
			'post_status'  => 'publish',
			'suppress_filters' => false,
			'lang' => false,
		);
		?>
      <!-- Drinks menu -->
      <section class="menu-page-category drinks-menu indent-horizontal">
        <svg class="bg-pic" width="350" height="417" viewBox="0 0 350 417" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M220.001 147.178C220.001 147.178 244.291 158.524 238.971 212.848C233.651 267.173 170.691 369.939 162.711 380.214C154.731 390.49 123.251 420.831 82.0114 415.445C40.7714 410.059 19.5314 382.124 19.5314 382.124M31.9314 258.508C22.0114 247.626 -16.2086 199.449 30.5714 148.248C83.7814 90.0056 129.631 162.475 129.631 162.475M154.331 144.937C154.241 133.061 156.681 109.474 175.641 96.9362M175.641 96.9362C176.191 96.572 176.751 96.2188 177.331 95.8766C205.271 79.2437 234.091 93.4374 245.171 102.731C256.261 112.035 262.911 120.567 266.901 125.6C270.891 130.632 288.181 164.881 294.391 172.22C300.591 179.56 340.941 214.801 347.591 251.5C354.241 288.209 337.401 307.292 332.521 317.568C327.641 327.843 308.581 350.359 288.181 361.12C267.781 371.892 234.531 371.892 211.921 361.12C198.991 354.973 190.981 347.059 186.491 341.408M175.641 96.9362C154.621 53.0526 169.791 0.947266 169.791 0.947266M167.471 40.5924C167.471 40.5924 190.191 15.1409 229.651 21.9949C269.111 28.8489 283.911 58.2076 283.911 58.2076C283.911 58.2076 268.431 54.7861 240.621 69.9511C212.811 85.116 187.001 69.4654 181.721 66.5296C176.451 63.5937 168.491 52.7884 170.921 48.6495C173.351 44.5106 187.091 35.703 213.691 38.6388C240.291 41.5747 258.471 52.8325 258.471 52.8325M190.631 43.0313C190.631 43.0313 195.511 51.8389 210.581 56.2427C225.651 60.6465 235.411 59.6642 235.411 59.6642M213.691 38.6282C213.691 38.6282 225.661 28.8381 235.421 29.8205M213.241 140.423C233.571 156.67 230.981 183.49 226.541 201.105C222.101 218.72 193.731 279.899 186.191 295.549C178.651 311.211 144.071 364.056 135.201 372.875C126.331 381.682 85.9814 427.199 34.5514 394.408C-16.8786 361.617 5.30143 303.871 8.40143 293.595C11.5014 283.32 40.3214 247.107 53.1814 232.914C66.0414 218.72 118.361 171.25 133.881 159.021C149.401 146.792 187.531 119.861 213.241 140.423ZM126.781 243.189C138.751 253.465 160.921 275.98 138.311 315.614C115.701 355.248 80.6714 336.662 71.3614 330.294C62.0514 323.925 31.0114 291.631 71.3614 251.014C95.6914 226.523 126.781 243.189 126.781 243.189Z" stroke="black" stroke-miterlimit="10"/>
        </svg>

        <div class="container-fluid">
          <div class="row">
            <h2 class="block-title col-12 text-center"><?php echo $menuDrinksTitle;?></h2>
			  <?php if( $menuDrinksText ):?>
                <div class="text col-12 text-center"><?php echo wpautop($menuDrinksText);?></div>
			  <?php endif;?>
          </div>
          <div class="row content">
            <div class="pic-wrapper col-md-6">
              <img
                  class="lazy"
                  data-src="<?php echo wp_get_attachment_image_src($menuDrinksImage, 'full')[0];?>"
                  alt="<?php echo get_post_meta($menuDrinksImage, '_wp_attachment_image_alt', TRUE);?>"
              >
            </div>
            <div class="product-list col-md-6">
              <div class="list-wrapper">
	              <?php
		              $menuDrinksList = new WP_Query( $menuDrinksArgs );

		              if ( $menuDrinksList->have_posts() ) :

			              while ( $menuDrinksList->have_posts() ) : $menuDrinksList->the_post(); ?>
				              <?php get_template_part('template-parts/our-menu-item');?>
			              <?php endwhile;?>
		              <?php endif; ?>
	              <?php wp_reset_postdata(); ?>
              </div>

            </div>
          </div>
        </div>
      </section>
	<?php endif;?>

<?php
	$formRegistrationTitle = carbon_get_post_meta(get_the_ID(), 'food_menu_page_reservation_title');
	$formRegistrationText = carbon_get_post_meta(get_the_ID(), 'food_menu_page_reservation_text');

	if ( $formRegistrationTitle ){

		$formRegistrationArgs = array(
			'title' => $formRegistrationTitle,
			'text' => $formRegistrationText
		);

		get_template_part('template-parts/block-reservation', '', $formRegistrationArgs);
	}
?>
<?php get_footer();