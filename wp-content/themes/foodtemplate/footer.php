<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package foodtemplate
 */

?>
</main>
	<footer class="site-footer indent-horizontal">
		<div class="container-fluid">
      <div class="row">
        <div class="content col-12">
          <p class="company-name subtitle"><?php echo carbon_get_theme_option('food_option_footer_logo_text');?></p>
          <div class="site-footer__contacts">
            <h5 class="mini-title"><?php echo carbon_get_theme_option('food_option_footer_contacts_text');?></h5>
	          <?php get_template_part('template-parts/phone');?>
	          <?php get_template_part('template-parts/email');?>
            <p class="address"><?php echo carbon_get_theme_option('food_option_rial_address');?></p>
          </div>
          <div class="site-footer__form">
            <h5 class="mini-title"><?php echo carbon_get_theme_option('food_option_footer_form_title');?></h5>
            <form method="post" action="">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Address">
              </div>
              <button type="submit" class="button form-btn">Subscribe</button>
            </form>
            <p class="small-text"><?php echo carbon_get_theme_option('food_option_footer_form_text');?></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="copy-wrapper col-12">
          <p class="copy">&copy; 2020 - <?php echo date('Y');?> <?php echo carbon_get_theme_option('food_option_footer_copy_text');?></p>
	        <?php get_template_part('template-parts/social');?>
        </div>
      </div>
    </div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
