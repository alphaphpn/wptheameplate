<?php

	global $paged;

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	$argsn = array(
		'post_type'			=> 'product', 
		'posts_per_page'	=> 40, 
		'paged'				=> $paged, 
	);

	$loopn = new WP_Query($argsn);

	while ( $loopn->have_posts() ) {
		$loopn->the_post();
		$productid = get_the_ID();
		$productsimgurl = get_the_post_thumbnail_url();
		$productstitle = get_the_title();
		$productsexertp = get_the_excerpt();
		$productscontent = get_the_content();
		$productsurlink = get_post_permalink();

		$product = wc_get_product( $productid );

		// $product->get_regular_price();
		// $product->get_sale_price();
		// $product->get_price();

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
							<?php if ( $productstitle ) { ?>
								<h3 class="card-title"><?php echo $productstitle; ?></h3>
							<?php } ?>
							</div>
							<div class="card-footer bg-tranparent border-top-0">
								<a href="<?php echo $productsurlink; ?>" class="card-link">Read more</a>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="my-product-list content card bg-tranparent w-100 m-2 flex-fill">
						<form class="cart" action="<?php echo $productsurlink; ?>" method="post" enctype="multipart/form-data">
						<?php if ( $productsimgurl ) { ?>
							<div class="feat-products w-100 bg-media-scroll" style="background-image: url('<?php echo $productsimgurl; ?>');"></div>
						<?php } ?>
							<div class="card-body bg-tranparent border-bottom-0">
							<?php if ( $productstitle ) { ?>
								<h3 class="card-title title-2-lines"><?php echo $productstitle; ?></h3>
							<?php } ?>
								<h5 class="price text-right"><span class="woocommerce-Price-amount amount"><bdi><?php echo $product->get_price_html(); ?></bdi></h5>
								<div class="quantity text-right">
									<input type="number" id="quantity_<?php echo $productid; ?>" class="input-text qty text" name="quantity" value="1" aria-label="Product quantity" size="4" min="1" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
								</div>
							</div>
							<div class="card-footer bg-tranparent border-top-0 d-flex">
								<a href="<?php echo $productsurlink; ?>" class="card-link d-inline w-50">Read more</a>
								<button type="submit" name="add-to-cart" value="238" class="btn btn-main single_add_to_cart_button button alt d-inline w-50">Add to cart</button>
							</div>
						</form>
					</div>
	<?php
				}
			endwhile;
		endif;
	}

?>

	<a href="#" id="loadMore" class="btn btn-main w-100 bottom-0 mt-5 mx-auto">Load More Products</a>

<?php

	// Reset Post Data
	wp_reset_postdata();