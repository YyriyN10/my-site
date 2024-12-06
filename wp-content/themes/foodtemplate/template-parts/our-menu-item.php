<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	?>

<a href="<?php the_permalink();?>" class="out-menu-position col-md-6">
	<span class="price card-title"><?php echo carbon_get_post_meta(get_the_ID(), 'food_menu_post_type_price');?></span>
	<span class="name subtitle"><?php the_title();?></span>
	<span class="description"><?php the_excerpt();?></span>
</a>
