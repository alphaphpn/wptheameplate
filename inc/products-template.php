<?php

	/**
		* Template Name: Products Template
		* The Template for Products.
		*
		* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
		* 
		* @package wpTheameplate
	**/

	get_header();

	$contentwidth = get_field('content_width','option');
	$pgenbgcolor = get_field('primary_background','option');
	$secondarybackground = get_field('secondary_background','option');
	$pgenfcolor = get_field('primary_font_color','option');
	$secondaryfontcolor = get_field('secondary_font_color','option');
	$sectiontitlealignment = get_field('section_title_alignment','option');
	$innerbanner = get_field('inner_banner','option');

?>

	<style>
		.home main#primary article {
			background-image: url(<?php echo $logoopacity; ?>);
			background-position: top right;
			background-size: contain;
			background-repeat: no-repeat;
		}

		.main-primary-bg-img {
			background-image: url(<?php echo $homepageimgbg; ?>);
		}
		
		.main-primary-bg-color {
			background-color: <?php echo $pgenbgcolor; ?>;
			color: <?php echo $pgenfcolor; ?>;
		}

		.main-second-bg-color {
			background-color: <?php echo $secondarybackground; ?>;
			color: <?php echo $secondaryfontcolor; ?>;
		}
	</style>

	<div id="inner-header-banner" class="w-100 bg-media-scroll" style="background-image: url(<?php echo $innerbanner; ?>);"></div>

	<div class="main-primary-bg-color">
		<div class="<?php echo $contentwidth; ?> pt-5 pb-5">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="pt-5 pb-5">
					<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
					
					<div>
						<?php
							if ( ! is_active_sidebar( 'sidebar-1' ) ) {
								return;
							}
						?>

							<aside id="secondary" class="widget-area <?php echo $contentwidth; ?>">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</aside><!-- #secondary -->
					</div>

					<div class="d-flex justify-content-between flex-wrap">
						<?php

							include_once('featured-products-qty.php');
							
						?>
					</div>

					<div class="pagination mt-5 mx-auto">
						<?php
							$total_pages = $loopn->max_num_pages;

							if ($total_pages > 1) {
								$current_page = max(1, get_query_var('paged'));

								$listString = paginate_links(array(
									'base'			=> get_pagenum_link(1) . '%_%',
									'format'		=> '/page/%#%',
									'current'		=> $current_page,
									'total'			=> $total_pages,
									'prev_text'		=> __('← Previous'),
									'next_text'		=> __('Next  →'),
									'type'			=> 'list',
								));

								$listString = str_replace("<ul class='page-numbers'>", '<ul class="pagination w-100 m-0 text-center"><div class="m-auto d-flex">', $listString);
								$listString = str_replace('page-numbers', 'page-link', $listString);
								$listString = str_replace('<li>', '<li class="page-item">', $listString);
								$listString = str_replace(
									'<li class="page-item"><span aria-current="page" class="page-link current">',
									'<li class="page-item active"><span aria-current="page" class="page-link">',
									$listString
								);

								echo $listString;
							}
						?>
					</div>
				</div>

				<?php wptheameplate_post_thumbnail(); ?>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wptheameplate' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->

				<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'wptheameplate' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							),
							'<span class="edit-link">',
							'</span>'
						);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
	</div>

<?php

	get_footer();