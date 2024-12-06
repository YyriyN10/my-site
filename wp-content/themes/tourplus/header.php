<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TourPlus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">

	<header class="site-header">
		<div class="container">
      <div class="row">
        <div class="content col-12">
          <?php if( is_front_page() ):?>
              <div class="logo">
                <svg width="36" height="44" viewBox="0 0 36 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.8896 8.04186C13.8896 3.64819 17.4514 0.0864258 21.8451 0.0864258V18.7094H13.8896V8.04186Z" fill="#FF492F"/>
                  <path d="M13.9463 24.4581H21.9017V35.1257C21.9017 39.5193 18.34 43.0811 13.9463 43.0811V24.4581Z" fill="#FF9F1C"/>
                  <path d="M27.123 10.7152C31.5167 10.7152 35.0785 14.277 35.0785 18.6707V29.3382H27.123V10.7152Z" fill="#078E14"/>
                  <path d="M0.769531 18.6706C0.769531 14.277 4.3313 10.7152 8.72497 10.7152V29.3382H0.769531V18.6706Z" fill="#1064AE"/>
                </svg>
                <span class="logo-text">Tour<span>plus</span></span>
              </div>
          <?php else:?>
            <a href="<?php echo get_home_url('/');?>" class="logo">
              <svg width="36" height="44" viewBox="0 0 36 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.8896 8.04186C13.8896 3.64819 17.4514 0.0864258 21.8451 0.0864258V18.7094H13.8896V8.04186Z" fill="#FF492F"/>
                <path d="M13.9463 24.4581H21.9017V35.1257C21.9017 39.5193 18.34 43.0811 13.9463 43.0811V24.4581Z" fill="#FF9F1C"/>
                <path d="M27.123 10.7152C31.5167 10.7152 35.0785 14.277 35.0785 18.6707V29.3382H27.123V10.7152Z" fill="#078E14"/>
                <path d="M0.769531 18.6706C0.769531 14.277 4.3313 10.7152 8.72497 10.7152V29.3382H0.769531V18.6706Z" fill="#1064AE"/>
              </svg>
              <span class="logo-text">Tour<span>plus</span></span>
            </a>
          <?php endif;?>
          <nav class="header-navigation">
	          <?php
		          wp_nav_menu(
			          array(
				          'theme_location' => 'menu-1',
				          'menu_id'        => 'primary-menu',
                    'container' => false,
                    'menu_class' => 'main-menu'
			          )
		          );
	          ?>
          </nav>
          <button class="menu-btn slide-line" id="menu-btn">
            <span></span><span></span><span></span>
          </button>
        </div>
      </div>
    </div>
	</header>
<main>