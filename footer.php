<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpTheameplate
 */

$blog_info = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

$cyear = date('Y');
$companyname = get_field('company_name','option');
$footerBgColor = get_field('footer_bgcolor','option');
$footerLogo = get_field('logo_right_with_label','option');
$footerParghColor = get_field('footer_paragraph_colour','option');
$footerLinkColor = get_field('footer_link_colour','option');
$menuloc = get_nav_menu_locations();
$cf7frm = get_field('contact_form_7','option');
$pageloader = get_field('page_loader','option');
$duration = $pageloader['duration'] * 100;
$developedby = get_field('developed_by','option');
$developedbyurl = get_field('developed_by_url','option');
$headrBGColor = get_field('header_bgcolor','option');
$headerBgColorOnScrollDown = get_field('header_bgcolor_scrolldown','option');
$contentwidth = get_field('content_width','option');
$contactform = get_field('contact_form','option');
$cfbgcolor = get_field('cf_background_color','option');
$cfbgimg = get_field('contact_form_background_image','option');
$fontfamily = get_field('font_family','option');
$logo = get_field('logo','option');
$logowhite = get_field('logo_white','option');

if( have_rows( 'google_map_location','option' ) ): while( have_rows( 'google_map_location','option' ) ) : the_row();
	$longitude = get_sub_field('longitude');
	$latitude = get_sub_field('latitude');
	endwhile;
endif;

$frmaploc = '//maps.google.com/maps?q='.$longitude.','.$latitude.'&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed';

$dummyimg = "//staging.alphaphpn.com/keymedia/wp-content/uploads/2023/01/img-foot-gallery.jpg";

?>
	
	<style>
		.copy-right-footer a,
		.social-ico-footer a:hover {
			color: <?php echo $footerLinkColor; ?>;
		}
		
		.social-ico-footer a {
			color: #fff;
			font-size: 30px;
		}
		
		.copy-right-footer {
			font-weight: 100;
		}
		
		#forth-menu a {
			font-family: <?php echo $fontfamily; ?>;
			font-size: 14px;
			line-height: 26px;
			font-weight: 400;
			margin-left: 12px;
		}
		
		#third-menu, 
		#forth-menu {
			list-style: none;
			margin-left: 0;
			padding-left: 0;
			font-size: 14px;
			line-height: 26px;
		}
		
		#openhour {
			font-size: 14px;
			line-height: 26px;
		}
		
		#third-menu a,
		#forth-menu a, 
		#openhour a {
			color: <?php echo $footerParghColor ?>;
		}
		
		#third-menu a:visited,
		#forth-menu a:visited, 
		#openhour a:visited {
			color: <?php echo $footerParghColor ?>;
		}
		
		#third-menu a:hover,
		#forth-menu a:hover, 
		#openhour a:hover {
			color: <?php echo $footerLinkColor ?>;
			text-decoration: none;
		}
		
		input[type=submit].ninja-forms-field.nf-element {
			background: <?php echo $footerLinkColor; ?>;
			text-transform: uppercase;
			font-weight: 700;
		}
		
		input[type=submit].ninja-forms-field.nf-element:hover {
			background: transparent;
			color: <?php echo $footerLinkColor; ?>;
			border: 1px solid <?php echo $footerLinkColor; ?>;
		}
	</style>

	<section id="contact-us" class="bg-media-scroll" style="background-color: <?php echo $cfbgcolor; ?>; background-image: url(<?php echo $cfbgimg; ?>); color: <?php echo $footerParghColor; ?>;">
		<div class="w-100 h-100 position-relative bg-overlay-bg-dark">
			<div class="<?php echo $contentwidth; ?> py-5">
				<?php echo do_shortcode( $contactform ); ?>
		</div>
		</div>
	</section>

	<footer id="colophon" class="site-footer text-center" style="background-color: <?php echo $footerBgColor; ?>">
		<iframe style="position: relative; margin-bottom: -10px;" class="responsive-iframe map-footer" src="<?php echo $frmaploc; ?>" width="100%" height="450" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		
		<div class="slick-img-gallery row footer-gallery-img m-0">
			<?php
				$argsimgalerrys = array( 'post_type' => 'image-galleries' );
				$loopimgalerrys = new WP_Query( $argsimgalerrys );
				while ( $loopimgalerrys->have_posts() ) : $loopimgalerrys->the_post();
					$imgalerrysgurl = get_the_post_thumbnail_url();
			?>
					<div class="col-md-2 indi-gallery p-0 m-0 bg-media-scroll zoom-img" style="background: url(<?php echo $imgalerrysgurl; ?>);">
						<div class="position-absolute w-100 h-100 zoom-overlay-bg" style="background: rgb(135 0 4 / 50%);"></div>
					</div>
			<?php
				endwhile;
				wp_reset_query();
			?>
		</div>
		
		<div class="<?php echo $contentwidth; ?>">
			<div class="row pt-5 text-left" style="color: <?php echo $footerParghColor; ?>;">
				<div class="col-lg-3">
					<div class="site-logo">
						<img src="<?php echo $footerLogo; ?>" style="max-height: 80px">
					</div>
					<div class="social-ico-footer d-flex justify-content-start">
						<?php
							if( have_rows( 'contact_us_at','option' ) ): while( have_rows( 'contact_us_at','option' ) ) : the_row();
								$mediatype = get_sub_field('media_type');
								$iconcontactus = get_sub_field('icon_contactus');
								$socialhref = get_sub_field('link');
									if ( $mediatype==0 ) {
						?>
										<div class="p-2"><a href="<?php echo $socialhref; ?>" target="_blank"><i class="<?php echo $iconcontactus; ?>"></i></a></div>
						<?php
								}
								endwhile;
							else :
								
							endif;
						?>
					</div>
				</div>
				<div class="col-lg-3">
					<?php
						$menuqlinks = wp_get_nav_menu_name("menu-3");
						echo '<label>'.$menuqlinks.'</label>';
						wp_nav_menu( array(
							'theme_location'	=> 'menu-3',
							'menu_id'			=> 'third-menu', 
							'container_class'	=> '',
							'menu_class'		=> ''
						) );
					?>
				</div>
				<div class="col-lg-3">
					<?php
						$menuqlinks = wp_get_nav_menu_name("menu-4");
						echo '<label>Contact Us</label>';
						wp_nav_menu( array(
							'theme_location'	=> 'menu-4',
							'menu_id'			=> 'forth-menu', 
							'container_class'	=> '',
							'menu_class'		=> ''
						) );
					?>
				</div>
				<div class="col-lg-3">
					<label>Operations Hours</label>
					<?php
						if ( ! is_active_sidebar( 'openhour-1' ) ) {
							return;
						}
					?>
					<div id="openhour" class="widget-area">
						<?php dynamic_sidebar( 'openhour-1' ); ?>
					</div><!-- #openhour -->
				</div>
			</div>
		</div>
		
		<div class="site-info <?php echo $contentwidth; ?> py-3">
			<hr>
			<div class="copy-right-footer" style="color: <?php echo $footerParghColor; ?>; font-size: 11px;">© Copyright <?php echo date("Y").' '.$blog_info; ?> | <a href="<?php echo home_url(); ?>/terms-and-conditions/">Terms &amp; Conditions</a> | <a href="<?php echo home_url(); ?>/privacy-policy/">Privacy Policy</a> | Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="<?php echo $developedbyurl; ?>" target="_blank" rel="noopener"><?php echo $developedby; ?></a></div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<a href="#myHome" id="back-to-top" style="display: none;"><i class="fas fa-chevron-up" aria-hidden="true"></i></a>

<script>
	var loader;

	document.addEventListener("DOMContentLoaded", function() {
		loader = document.getElementById('loader');
		loadNow(1);
	});

	function loadNow(opacity) {
		if (opacity <= 0) {
			displayContent();
		} else {
		loader.style.opacity = opacity;
		window.setTimeout(function() {
			loadNow(opacity - 0.03);
			}, <?php echo $duration; ?>);
		}
	}

	function displayContent() {
		loader.style.display = 'none';
		document.getElementById('page').style.display = 'block';
	}
	
	// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
			document.querySelector(".site-logo img.custom-logo").style.maxHeight = "32px";
			document.querySelector(".site-header").style.backgroundColor = "<?php echo $headrBGColor; ?>";
			document.querySelector(".site-header").style.backgroundImage = "<?php echo $headerBgColorOnScrollDown; ?>";
			document.querySelector("#site-navigation .site-logo a img").src = "<?php echo $logowhite; ?>";
			document.querySelector("#site-navigation .site-logo a img").srcset = "";
			document.querySelector("#head-notification").style.display = "none";
		} else {
			document.querySelector(".site-logo img.custom-logo").style.maxHeight = "68px";
			document.querySelector(".site-header").style.backgroundColor = "rgba(0,0,0,0.2)";
			document.querySelector(".site-header").style.backgroundImage = "unset";
			document.querySelector("#site-navigation .site-logo a img").src = "<?php echo $logo; ?>";
			document.querySelector("#site-navigation .site-logo a img").srcset = "";
			document.querySelector("#head-notification").style.display = "block";
		}
	}
</script>

<?php wp_footer(); ?>

</body>
</html>