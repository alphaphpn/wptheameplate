<?php

	$argsn = array(
		'post_type'			=> 'product'
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
					<div class="m-2">
						<div class="card bg-tranparent w-100">
						<?php if ( $productsimgurl ) { ?>
							<div class="feat-products w-100 bg-media-scroll" style="background-image: url('<?php echo $productsimgurl; ?>'); height: 320px;"></div>
						<?php } ?>
							<div class="card-body bg-tranparent border-bottom-0">
							<?php if ( $productstitle ) { ?>
								<h3 class="card-title title-2-lines"><?php echo $productstitle; ?></h3>
							<?php } ?>
								<h5 class="price text-right"><span class="woocommerce-Price-amount amount"><bdi><?php echo $product->get_price_html(); ?></bdi></h5>
							</div>
							<div class="card-footer bg-tranparent border-top-0 d-flex">
								<a href="<?php echo $productsurlink; ?>" class="card-link d-inline w-50">Read more</a>
								<a href="?add-to-cart=<?php echo $productid; ?>" data-quantity="1" class="btn btn-main d-inline w-50 add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $productid; ?>" data-product_sku="<?php echo $product->get_sku(); ?>" aria-label="Add “<?php echo $productstitle; ?>” to your cart" aria-describedby="" rel="nofollow">Add to cart</a>
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