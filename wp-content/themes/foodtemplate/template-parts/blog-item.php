<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	?>

<a href="<?php the_permalink();?>" class="blog-item col-md-6 col-sm-10">
	<span class="blog-item__preview-wrapper">
		<img
		   src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>"
		   alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);?>"
		>
		<span class="blog-item__category card-title"></span>
	</span>
	<span class="blog-item__info-wrapper">
    <span class="blog-item__author-info">
      <span class="blog-item__avatar"><?php echo get_avatar(get_the_author_meta('ID'));?></span>
		  <span class="blog-item__author-name"><?php the_author();?></span>
		  <span class="blog-item__post-data"><?php echo get_the_date('F j, Y');?></span>
    </span>

    <span class="blog-item__title card-title"><?php the_title();?></span>
    <span class="blog-item__description"><?php the_excerpt();?></span>
    <span class="blog-item__more">
      Read More
      <svg width="48" height="28" viewBox="0 0 48 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_13989_779)">
        <path d="M34.0517 0.981934L31.3237 3.77L39.6221 12.0625H0.75V15.9375H39.6221L31.3257 24.2319L34.0517 27.0181L47.0659 14L34.0517 0.981934Z" fill="#233000"/>
        </g>
        <defs>
        <clipPath id="clip0_13989_779">
        <rect width="48" height="28" fill="white"/>
        </clipPath>
        </defs>
      </svg>
    </span>
	</span>

</a>
