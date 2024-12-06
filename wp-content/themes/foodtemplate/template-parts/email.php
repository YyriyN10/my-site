<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$siteEmail = carbon_get_theme_option('food_option_email');

	if ( $siteEmail ):?>
		<a href="mailto:<?php echo antispambot($siteEmail, 1);?>" class="email"><?php echo antispambot($siteEmail, 0);?></a>
<?php endif;?>

