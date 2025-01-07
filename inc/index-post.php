<?php
$contentwidth = get_field('content_width','option');
$sectiontitlealignment = get_field('section_title_alignment','option');
$argsi = array(
	'post_type'			=> 'indexposts'
);

$loopi = new WP_Query($argsi);

while ( $loopi->have_posts() ) {
	$loopi->the_post();
	$indeximgurl = get_the_post_thumbnail_url();
	$indextitle = get_the_title();
	$indexexertp = get_the_excerpt();
	$indexcontent = get_the_content();
	$indexurlink = get_post_permalink();
	$indexbootstrapicon = get_field('bootstrap_icon');
	$indextitleslug = preg_replace('/\s+/', '-', $indextitle);
	$indexbuttonlabel = get_field('button_label');
	$indexbgcolor = get_field('bg_color');

	if ($indeximgurl) {
		?>
			<section id="<?php echo $indextitleslug; ?>" class="main-primary-bg-color bg-media" style="background-color: <?php echo $indexbgcolor; ?>; background-image: url(<?php echo $indeximgurl; ?>);">
				<div class="w-100 h-100 position-relative bg-overlay-bg-grey">
					<div class="<?php echo $contentwidth; ?> pt-5 pb-5 h-100vh">
						<div class="vertical-center ml-auto mr-auto" style="max-width: 728px;">
							<div class="w-100 mb-5 text-center"><i class="<?php echo $indexbootstrapicon; ?>" style="font-size: xxx-large;"></i></div>
							<h2 class="<?php echo $sectiontitlealignment; ?>"><?php echo $indextitle; ?></h2>
							<p class="<?php echo $sectiontitlealignment; ?> mt-4 text-indent-zero"><?php echo $indexcontent; ?></p>
							<div class="w-100 m-auto text-center">
								<a href="#" class="btn btn-main"><?php echo $indexbuttonlabel; ?></a>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
	} else {
		?>
			<section id="<?php echo $indextitleslug; ?>" class="main-primary-bg-color">
				<div class="w-100 h-100 py-5">
					<div class="<?php echo $contentwidth; ?> pt-5 pb-5">
						<div class="ml-auto mr-auto" style="max-width: 728px;">
							<div class="w-100 mb-5 text-center"><i class="<?php echo $indexbootstrapicon; ?>" style="font-size: xxx-large;"></i></div>
							<h2 class="<?php echo $sectiontitlealignment; ?>"><?php echo $indextitle; ?></h2>
							<p class="<?php echo $sectiontitlealignment; ?> mt-4 text-indent-zero"><?php echo $indexcontent; ?></p>
							<div class="w-100 m-auto text-center">
								<a href="#" class="btn btn-main"><?php echo $indexbuttonlabel; ?></a>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
	}
}

// Reset Post Data
wp_reset_postdata();