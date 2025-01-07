<?php
$argsprod = array(
	'post_type'			=> 'products'
);

$loopprod = new WP_Query($argsprod);

while ( $loopprod->have_posts() ) {
	$loopprod->the_post();
	$prodimgurl = get_the_post_thumbnail_url();
	$prodtitle = get_the_title();
	$prodexertp = get_the_excerpt();
	$prodcontent = get_the_content();
	$produrlink = get_post_permalink();
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