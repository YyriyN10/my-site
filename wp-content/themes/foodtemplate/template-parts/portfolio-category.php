<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>

<a href="<?php the_permalink();?>"
	<?php if( $args === 1 || $args === 4):?>
		class="item col-lg-8 col-md-7 col-sm-6"
	<?php elseif ( $args === 2 || $args === 3):?>
		class="item col-lg-4 col-md-5 col-sm-6"
	<?php else:?>
		class="item col-sm-6"
	<?php endif;?>
>
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
