<?php
	$ctaheadertitle = get_field('cta_header_title','option');
	$sectiontitlealignment = get_field('section_title_alignment','option');
	$ctacontent = get_field('cta_content','option');

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
?>

<div class="border border-main p-5 m-auto" style="max-width: 864px;">
	<h2 class="<?php echo $sectiontitlealignment; ?>"><?php echo $ctaheadertitle; ?></h2>
	<div class="m-auto pt-4 text-justify" style="max-width: 768px;">
		<?php echo $ctacontent; ?>
	</div>
	<div class="d-flex justify-content-center">
		<a href="<?php echo $ctalink; ?>" class="btn btn-main m-2"><?php echo $ctalabel; ?></a>
		<a href="tel:<?php echo $phonelink; ?>" class="btn btn-main m-2"><?php echo $phonelabel; ?></a>
	</div>
</div>