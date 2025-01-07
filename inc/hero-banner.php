<?php

	$videohero = get_field('video_hero','option');
	$logotopwithlabel = get_field('logo_top_with_label','option');

	if( have_rows('call_to_action','option') ):
		while( have_rows('call_to_action','option') ): the_row();
			$ctalabel = get_sub_field('cta_label');
			$ctalink = get_sub_field('cta_link');
			$ctaicon = get_sub_field('cta_icon');
		endwhile;
	endif;

	if( have_rows('cta_phone','option') ):
		while( have_rows('cta_phone','option') ): the_row();
			$phonelabel = get_sub_field('phone_label');
			$phonelink = get_sub_field('phone_link');
			$phoneicon = get_sub_field('phone_icon');
		endwhile;
	endif;

    if ( is_front_page() ) {
?>
		<div class="video-auto-height">
			<video id="thevideoban" onclick="fnVPlayPause();" playsinline autoplay muted loop>
				<source src="<?php echo $videohero; ?>" type="video/mp4">
			</video>
			<div id="hero-cta" class="text-center" style="z-index: 1; position: relative; top: 40%;">
				<img src="<?php echo $logotopwithlabel; ?>">
				<aside id="searchbox-hero" class="widget-area container m-auto">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</aside><!-- #secondary -->
				<div class="d-flex justify-content-center">
					<a href="<?php echo $ctalink; ?>" class="btn btn-main btn-main-padding rounded-2 m-2"><?php echo $ctalabel; ?></a>
					<a href="tel:<?php echo $phonelink; ?>" class="btn btn-main btn-main-padding rounded-2 m-2"><?php echo $phonelabel; ?></a>
				</div>
			</div>
		</div>

		<script>
			var video = document.getElementById("thevideoban");

			function fnVPlayPause() {
				if (video.paused) {
					video.play();
				} else {
					video.pause();
				}
			}
		</script>
<?php
    }