<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yuna
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
          <div class="logo">YUNA</div>
          <button class="menu-btn slide-line" id="menu-btn">
            <span></span><span></span><span></span>
          </button>
          <nav class="main-menu-wrapper">
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
	        <?php
		        $langArgs = array(
			        'show_names' => 1,
			        'display_names_as' => 'slug',
			        'show_flags' => 0,
			        'hide_current' => 0,
			        'hide_if_no_translation' => 0
		        );
	        ?>
          <ul class="lang-list">
            <?php pll_the_languages($langArgs);?>
          </ul>
        </div>
      </div>
    </div>
	</header>
  <main>
