<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template blog single
	 *
	 * Template post type: blog
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package foodtemplate
	 *
	 */

	get_header();?>

        <!-- Main screen -->
        <section class="main-screen main-screen--big indent-horizontal" style="background-image: url(<?php echo carbon_get_post_meta( get_the_ID(), 'food_blog_content_main_image');?>)">
          <div class="container-fluid">
            <div class="row">
              <div class="content col-12 text-center">
                <h1 class="heading heading-big"><?php echo the_title();?></h1>
                <p class="post-info">
                  <span class="post-info__author-info">
                    <span class="post-info__avatar"><?php echo get_avatar(get_the_author_meta('ID'));?></span>
                    <span class="post-info__author-name"><?php the_author();?></span>
                    <span class="post-info__post-data"><?php echo get_the_date('F j, Y');?></span>
                  </span>
                </p>
              </div>
            </div>
          </div>
        </section>

<?php
    $postTopText = carbon_get_post_meta( get_the_ID(), 'food_blog_content_top_qute');
	  $postPicLeft = carbon_get_post_meta( get_the_ID(), 'food_blog_content_image_left');
	  $postPicRight = carbon_get_post_meta( get_the_ID(), 'food_blog_content_image_right');
	  $postTopContent = carbon_get_post_meta( get_the_ID(), 'food_blog_content_text_top');
	  $postBanner = carbon_get_post_meta( get_the_ID(), 'food_blog_content_image_banner');
	  $postBannerText= carbon_get_post_meta( get_the_ID(), 'food_blog_content_text_banner');
	  $postBottomContent = carbon_get_post_meta( get_the_ID(), 'food_blog_content_text_bottom');

	  if ( $postTopText && $postPicLeft && $postPicRight ):

?>
	<!-- Blog content -->
	<section class="post-content indent-horizontal" >
		<div class="container-fluid">
			<div class="row">
        <p class="card-title col-xl-8 col-lg-10 col-12 offset-xl-2 offset-lg-1 offset-0"><?php echo $postTopText;?></p>
        <div class="images-list col-xl-10 col-12 offset-xl-1">
          <div class="pic-wrapper">
            <img
                class="lazy"
                data-src="<?php echo wp_get_attachment_image_src( $postPicLeft, 'full')[0];?>"
                alt="<?php echo get_post_meta( $postPicLeft, '_wp_attachment_image_alt', TRUE);?>"
            >
          </div>
          <div class="pic-wrapper">
            <img
                class="lazy"
                data-src="<?php echo wp_get_attachment_image_src( $postPicRight, 'full')[0];?>"
                alt="<?php echo get_post_meta( $postPicRight, '_wp_attachment_image_alt', TRUE);?>"
            >
          </div>
        </div>
        <?php if( $postTopContent ):?>
            <div class="text col-xl-8 col-lg-10 col-12 offset-xl-2 offset-lg-1 offset-0"><?php echo wpautop( $postTopContent );?></div>
        <?php endif;?>
        <?php if( $postBanner && $postBannerText ):?>
           <div class="banner col-12" style="background-image: url(<?php echo $postBanner;?>)">
              <p><?php echo $postBannerText;?></p>
              <svg width="282" height="234" viewBox="0 0 282 234" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path opacity="0.48" d="M126.771 75.7059C126.771 110.691 112.685 143.956 84.5138 175.5C56.3425 207.044 32.4832 226.544 12.9358 234L0 213.353C19.5474 203.029 36.2202 187.831 50.0183 167.757C63.8165 147.684 71.8654 127.037 74.1651 105.816C67.2661 109.257 57.7798 110.978 45.7064 110.978C34.208 110.978 24.1468 105.816 15.5229 95.4926C7.47401 85.1691 3.44954 71.6912 3.44954 55.0588C3.44954 37.853 9.48624 24.375 21.5596 14.625C33.633 4.87501 48.581 0 66.4037 0C84.8012 0 99.4618 6.30883 110.385 18.9265C121.309 30.9706 126.771 49.8971 126.771 75.7059ZM282 75.7059C282 110.691 267.914 143.956 239.743 175.5C211.572 207.044 187.713 226.544 168.165 234L155.229 213.353C174.777 203.029 191.45 187.831 205.248 167.757C219.046 147.684 227.095 127.037 229.395 105.816C222.495 109.257 213.009 110.978 200.936 110.978C189.437 110.978 179.376 105.816 170.752 95.4926C162.703 85.1691 158.679 71.6912 158.679 55.0588C158.679 37.853 164.716 24.375 176.789 14.625C188.862 4.87501 203.81 0 221.633 0C240.031 0 254.691 6.30883 265.615 18.9265C276.538 30.9706 282 49.8971 282 75.7059Z" fill="#EBF0E4"/>
                  </svg>
           </div>
        <?php endif;?>
        <?php if( $postBottomContent ):?>
            <div class="text col-xl-8 col-lg-10 col-12 offset-xl-2 offset-lg-1 offset-0"><?php echo wpautop( $postBottomContent );?></div>
        <?php endif;?>

			</div>
		</div>
	</section>
<?php endif;?>

<?php get_footer();
