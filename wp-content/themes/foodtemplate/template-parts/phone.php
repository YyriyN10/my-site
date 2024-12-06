<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}


    $phone = carbon_get_theme_option('food_option_phone');
    $phoneToColl = preg_replace( '/[^0-9]/', '', $phone);

	 if( str_contains(strval($phone), '+') ):?>
	<a href="tel:+<?php echo $phoneToColl;?>" class="phone"><?php echo $phone;?></a>
<?php else:?>
	<a href="tel:<?php echo $phoneToColl;?>" class="phone"><?php echo $phone;?><</a>
<?php endif;?>