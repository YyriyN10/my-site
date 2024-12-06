<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	?>

	<a href="<?php the_permalink();?>" class="item col-sm-6">
		<span class="inner">
    <img
        src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>"
        alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);?>"
    >
	<span class="info">
              <span class="name card-title"><?php the_title();?></span>
    <?php
	    $categoryList = get_the_terms(get_the_ID(), 'menu_tax');
    ?>
              <span class="cat-name">
                <?php foreach( $categoryList as $postCat ):?>
	                <?php echo $postCat->name;?>
                <?php endforeach;?>
              </span>
            </span>
  </span>
	</a>