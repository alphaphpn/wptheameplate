<?php
$argsteam = array(
	'post_type'			=> 'teams'
);

$loopteam = new WP_Query($argsteam);

while ( $loopteam->have_posts() ) {
	$loopteam->the_post();
	$teamimgurl = get_the_post_thumbnail_url();
	$teamtitle = get_the_title();
	$teamexertp = get_the_excerpt();
	$teamcontent = get_the_content();
	$teamurlink = get_post_permalink();
?>
	<div class="flex-fill mb-4">
		<div class="w-100 bg-media-scroll rounded-circle m-auto" style="background-image: url(<?php echo $teamimgurl; ?>); height: 180px; max-width: 180px; min-width: 180px;"></div>
		<h4 class="text-center mt-3"><?php echo $teamtitle; ?></h4>
		<h5 class="text-center"><?php echo $teamexertp; ?></h5>
	</div>
<?php
}

// Reset Post Data
wp_reset_postdata();