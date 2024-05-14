<?php
/**
 * Template Name: Product and Services
 * The Template for Product and Services.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package wpTheameplate
 */

get_header();

$contentwidth = get_field('content_width','option');
$pgenbgcolor = get_field('primary_background','option');
$secondarybackground = get_field('secondary_background','option');
$pgenfcolor = get_field('primary_font_color','option');
$secondaryfontcolor = get_field('secondary_font_color','option');
$homepageimgbg = get_field('homepage_image_background','option');
$sectiontitlealignment = get_field('section_title_alignment','option');

$ownerimage = get_field('owner_image','option');
$ownertitlenameheader = get_field('owner_titlename_header','option');
$ownersubtitleheader = get_field('owner_sub-title_header','option');
$ownernickname = get_field('owner_nickname','option');
$connectwithowner = get_field('connect_with_owner','option');
$abouttheowner = get_field('about_the_owner','option');

$logowhite = get_field('logo_white','option');
$logoopacity = get_field('logo_opacity','option');

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

	<main id="primary" class="site-main pt-0 main-primary-bg-color" style="margin-top: -152px;">
		<div class="<?php echo $contentwidth; ?>">
			<div class="left-float-container main-primary-bg-img pt-5 pb-5 text-light">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'post' === get_post_type() ) :
							?>
							<div class="entry-meta">
								<?php
								wptheameplate_posted_on();
								wptheameplate_posted_by();
								?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

					<div class="entry-content pl-5 pr-5">
						<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wptheameplate' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wptheameplate' ),
								'after'  => '</div>',
							)
						);
						?>

						<!-- CDHJUS4390 here -->
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php wptheameplate_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-<?php the_ID(); ?> -->
			</div>
		</div>
	</main><!-- #main -->

	<!-- Call to Action -->
	<section id="cta" class="main-second-bg-color">
		<div class="<?php echo $contentwidth; ?> pt-5 pb-5">
			<?php include_once('inc/cta-section.php'); ?>
		</div>
	</section>

<?php
get_footer();