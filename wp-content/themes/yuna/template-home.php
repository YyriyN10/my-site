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
	 * @package yuna
	 *
	 */

	get_header();?>
	<div class="loader" id="loader"></div>
<?php the_content()?>

<?php get_footer();
