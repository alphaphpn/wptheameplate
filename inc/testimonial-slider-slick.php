<?php
$argst = array(
	'post_type'			=> 'testimonials'
);

$loopt = new WP_Query($argst);

while ( $loopt->have_posts() ) {
	$loopt->the_post();
	$testimonyimgurl = get_the_post_thumbnail_url();
	$testimonytitle = get_the_title();
	$testimonyexertp = get_the_excerpt();
	$testimonycontent = get_the_content();
	$testimonyurlink = get_post_permalink();

	if( have_rows('video_post_settings') ):
		while( have_rows('video_post_settings') ): the_row();
			$videoonly = get_sub_field('video_only');
			$videotype = get_sub_field('video_type');
			$videofile = get_sub_field('video_file');
			$videoyt = get_sub_field('youtube_video');
			$videofb = get_sub_field('facebook_video');
			$videovimeo = get_sub_field('vimeo_video');
	
			if ( $videoonly ) { ?>
				<div class="m-2">
					<div class="card bg-tranparent w-100 border-0">
					<?php
						if ( $videotype == 1 ) {
							if ( $videoyt ) {
								?>
									<iframe width="100%" height="180" src="<?php echo $videoyt; ?>" class="m-auto text-center" style="background-color: #000; max-width: 320px;" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								<?php
							}
						} elseif ( $videotype == 2 ) {
							if ( $videofb ) {
								?>
									<div class="fb-video m-auto text-center" data-href="<?php echo $videofb; ?>" data-width="" style="width: 100%; max-width: 320px;" data-show-text="false"><blockquote cite="<?php echo $videofb; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $videofb; ?>"></a><p></p>Posted by <a href="#">Facebook</a> on -.</blockquote></div>
								<?php
							}
						} elseif ( $videotype == 3 ) {
							if ( $videovimeo ) {
								?>
									<iframe width="100%" height="180" src="<?php echo $videovimeo; ?>" class="m-auto text-center" style="background-color: #000; max-width: 320px;" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								<?php
							}
						} else {
							if ( $videofile ) {
								?>
									<video width="100%" height="180" class="m-auto text-center" controls style="background-color: #000; max-width: 320px;">
										<source src="<?php echo $videofile; ?>" type="video/mp4">
									</video>
								<?php
							}
						}
					?>
						<div class="card-body bg-tranparent border-bottom-0">
						<?php if ( $testimonytitle ) { ?>
							<h5 class="card-title text-center"><?php echo $testimonytitle.'<br>'.$testimonyexertp; ?></h5>
						<?php } ?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="m-2">
					<div class="card bg-tranparent w-100 py-3">
					<?php if ( $testimonyimgurl ) { ?>
						<div class="w-100 bg-media-scroll rounded-circle m-auto" style="background-image: url('<?php echo $testimonyimgurl; ?>'); height: 80px; max-width: 80px"></div>
					<?php } ?>
						<div class="card-body bg-tranparent border-bottom-0">
						<?php if ( $testimonytitle ) { ?>
							<p class="testicontent text-center text-indent-zero m-auto"><q><?php echo $testimonycontent; ?></q></p>
							<h5 class="card-title text-center mt-3"><?php echo $testimonytitle.'<br>'.$testimonyexertp; ?></h5>
						<?php } ?>
						</div>
					</div>
				</div>
<?php
			}
		endwhile;
	endif;
}

// Reset Post Data
wp_reset_postdata();