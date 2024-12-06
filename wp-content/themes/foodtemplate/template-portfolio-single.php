<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template portfolio single
	 *
	 * Template post type: our_menu
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package foodtemplate
	 *
	 */

	get_header();?>

<?php
	$productMainImage = carbon_get_post_meta(get_the_ID(), 'food_menu_post_type_main_image');

	if( $productMainImage ):?>
		<!-- main screen -->
		<section class="portfolio-main-screen main-screen main-screen--big indent-horizontal" style="background-image: url(<?php echo $productMainImage;?>)">
			<div class="container-fluid">
				<div class="row">
					<div class="content col-12 text-center">
						<h1 class="heading heading-big"><?php the_title();?></h1>
					</div>
				</div>
			</div>
			<div class="scroll-element">
				<span class="scroll-element__text">Scroll</span>
				<span class="dash-wrapper">
              <span class="dash"></span>
            </span>
			</div>
		</section>
	<?php endif;?>
	<?php
	    $productContentText1 = carbon_get_post_meta(get_the_ID(), 'food_menu_post_type_first_text_part');
		$productContentText2 = carbon_get_post_meta(get_the_ID(), 'food_menu_post_type_second_text_part');
		$productContentText3 = carbon_get_post_meta(get_the_ID(), 'food_menu_post_type_third_text_part');
		$productContentImage1 = carbon_get_post_meta(get_the_ID(), 'food_menu_post_type_small_image');
		$productContentImage2 = carbon_get_post_meta(get_the_ID(), 'food_menu_post_type_medium_image');
		$productContentImage3 = carbon_get_post_meta(get_the_ID(), 'food_menu_post_type_big_image');

	    if( $productContentText1 && $productContentText2 && $productContentImage1 && $productContentImage2 ):?>
	    <!-- Product content -->
	    <section class="product-content indent-horizontal">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="content col-12">
		          <div class="text firs-part"><?php echo wpautop($productContentText1);?></div>
	            <div class="double-pic-wrapper">
		            <div class="pic-big">
			            <img
			               class="lazy"
			               data-src="<?php echo wp_get_attachment_image_src($productContentImage2, 'full')[0];?>"
			               alt="<?php echo get_post_meta($productContentImage2, '_wp_attachment_image_alt', TRUE);?>"
			            >
		            </div>
		            <div class="pic-small">
			            <img
			               class="lazy"
			               data-src="<?php echo wp_get_attachment_image_src($productContentImage1, 'full')[0];?>"
			               alt="<?php echo get_post_meta($productContentImage1, '_wp_attachment_image_alt', TRUE);?>"
			            >
		            </div>

	            </div>
		        <div class="text second-part"><?php echo wpautop($productContentText2);?></div>
		          <div class="text third-part"><?php echo wpautop($productContentText3);?></div>
		          <div class="pic-wrapper">
			          <img
			             class="lazy"
			             data-src="<?php echo wp_get_attachment_image_src($productContentImage3, 'full')[0];?>"
			             alt="<?php echo get_post_meta($productContentImage3, '_wp_attachment_image_alt', TRUE);?>"
			          >
		          </div>
	          </div>
	        </div>
	      </div>
	    </section>
	<?php endif;?>

        <!-- Posts navigation -->
        <section class="posts-navigation indent-horizontal">
          <div class="container-fluid">
            <div class="row">
              <div class="content col-12">
                <div class="prev-post post-navigation">
	                <?php previous_post_link(
	                    '%link',
                      '<span class="arrow"><svg width="48" height="28" viewBox="0 0 48 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_6790_1570)">
<path d="M13.7642 0.982422L16.4922 3.77048L8.19386 12.063H47.0659V15.938H8.19386L16.4902 24.2324L13.7642 27.0185L0.749981 14.0005L13.7642 0.982422Z" fill="#233000"/>
</g>
<defs>
<clipPath id="clip0_6790_1570">
<rect width="48" height="28" fill="white"/>
</clipPath>
</defs>
</svg>
previous  Page 
</span><span class="post-name mini-title">%title</span>',
                      true, '', 'menu_tax' ); ?>
                </div>
                <svg class="bg-pic" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="18" cy="4" r="4" fill="black"/>
                  <circle cx="18" cy="18" r="4" fill="black"/>
                  <circle cx="18" cy="32" r="4" fill="black"/>
                  <circle cx="32" cy="4" r="4" fill="black"/>
                  <circle cx="32" cy="18" r="4" fill="black"/>
                  <circle cx="32" cy="32" r="4" fill="black"/>
                  <circle cx="4" cy="4" r="4" fill="black"/>
                  <circle cx="4" cy="18" r="4" fill="black"/>
                  <circle cx="4" cy="32" r="4" fill="black"/>
                </svg>

                <div class="next-post post-navigation">
	               <?php next_post_link(
	                   '%link',
                     '<span class="arrow">Next page <svg width="48" height="28" viewBox="0 0 48 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_13989_779)">
<path d="M34.0517 0.981934L31.3237 3.77L39.6221 12.0625H0.75V15.9375H39.6221L31.3257 24.2319L34.0517 27.0181L47.0659 14L34.0517 0.981934Z" fill="#233000"/>
</g>
<defs>
<clipPath id="clip0_13989_779">
<rect width="48" height="28" fill="white"/>
</clipPath>
</defs>
</svg>
</span><span class="post-name mini-title">%title</span> ',
                     true,
                     '', 'menu_tax' );?>
               </div>

              </div>
            </div>
          </div>
        </section>


<?php get_footer();
