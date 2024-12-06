
<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>
<a href="#" rel="nofollow" class="tour-preview slide" data-tour="<?php the_ID();?>">
	<span class="tour-preview__pic">
		<img
			src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>"
			alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);?>"
		>
		<span class="tour-preview__price"><?php echo carbon_get_post_meta(get_the_ID(), 'yuna_tour_card_price');?></span>
	</span>
	<span class="tour-preview__name"><?php the_title();?></span>
	<span class="tour-preview__description"><?php the_excerpt();?></span>
	<span class="tour-preview__more">
		START JOURNEY
		<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M14.3018 8.5H2.30176M14.3018 8.5L10.3018 4.5M14.3018 8.5L10.3018 12.5" stroke="#FF492F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>

	</span>
</a>