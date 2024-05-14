<?php
$argsn = array(
	'post_type'			=> 'featurednews'
);

$loopn = new WP_Query($argsn);

while ( $loopn->have_posts() ) {
	$loopn->the_post();
	$newsimgurl = get_the_post_thumbnail_url();
	$newstitle = get_the_title();
	$newsexertp = get_the_excerpt();
	$newscontent = get_the_content();
	$newsurlink = get_post_permalink();

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
							echo 'YouTube';
						} elseif ( $videotype == 2 ) {
							if ( $videofb ) {
								?>
									<div class="fb-video" data-href="<?php echo $videofb; ?>" data-width="" style="width: 100%;" data-show-text="false"><blockquote cite="<?php echo $videofb; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $videofb; ?>"></a><p></p>Posted by <a href="#">Facebook</a> on -.</blockquote></div>
								<?php
							}
						} elseif ( $videotype == 3 ) {
							if ( $videovimeo ) {
								?>
									<iframe width="100%" height="320" src="<?php echo $videovimeo; ?>" style="background-color: #000;" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								<?php
							}
						} else {
							if ( $videofile ) {
								?>
									<video width="100%" height="320" controls style="background-color: #000;">
										<source src="<?php echo $videofile; ?>" type="video/mp4">
									</video>
								<?php
							}
						}
					?>
						<div class="card-body bg-tranparent border-bottom-0">
						<?php if ( $newstitle ) { ?>
							<h3 class="card-title"><?php echo $newstitle; ?></h3>
						<?php } ?>
						</div>
						<div class="card-footer bg-tranparent border-top-0">
							<a href="<?php echo $newsurlink; ?>" class="card-link">Read more</a>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="m-2">
					<div class="card bg-tranparent w-100">
					<?php if ( $newsimgurl ) { ?>
						<div class="feat-news w-100 bg-media-scroll" style="background-image: url('<?php echo $newsimgurl; ?>'); height: 320px;"></div>
					<?php } ?>
						<div class="card-body bg-tranparent border-bottom-0">
						<?php if ( $newstitle ) { ?>
							<h3 class="card-title"><?php echo $newstitle; ?></h3>
						<?php } ?>
						</div>
						<div class="card-footer bg-tranparent border-top-0">
							<a href="<?php echo $newsurlink; ?>" class="card-link">Read more</a>
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