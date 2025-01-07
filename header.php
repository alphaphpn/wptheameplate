<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpTheameplate
 */

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

$headrBGColor = get_field('header_bgcolor','option');
$contentwidth = get_field('content_width','option');
$pageloader = get_field('page_loader','option');

$headrnotif = get_field('header_notification','option');
$mainmenualignment = get_field('main_menu_alignment','option');
$menulinkcoloronhover = get_field('menu_link_color_on_hover','option');

$primarybgbtncolor = get_field('primary_background_button_color','option');
$primarybtnfcolor = get_field('primary_button_font_color','option');

$norightclick = "true";

$displaycontent = "";

if ($pageloader['enable_page_loader'] == 'Yes') {
	$displaycontent = "display: none;";
} else {
	$displaycontent = "display: block;";
}

if ($headrnotif) {
	$clsnotif = "py-1";
} else {
	$clsnotif = "py-0";
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<style>
		a {
			color: <?php echo $primarybgbtncolor; ?>;
		}

		a:hover {
			color: red;
		}
		
		.site-logo a.custom-logo-link {
			padding-left: 0;
		}

		.main-navigation a:hover {
			color: <?php echo $menulinkcoloronhover; ?>;
			text-decoration: none;
		}
		
		.toggled {
			background-color: <?php echo $primarybgbtncolor; ?>;
		}
		
		.btn-main {
			background: <?php echo $primarybgbtncolor; ?>;
			color: <?php echo $primarybtnfcolor; ?>;
			text-transform: uppercase;
		}
		
		.btn-main:hover, 
		.wp-block-button a:hover {
			background: #ffffff!important;
			color: <?php echo $primarybgbtncolor; ?>!important;
			border: 1px solid <?php echo $primarybgbtncolor; ?>!important;
			text-decoration: none!important;
		}

		.btn-main-padding {
			padding: 16px 48px;
		}

		.border-main {
			border-color: <?php echo $primarybgbtncolor; ?>!important;
		}

		#testimonials p.testicontent {
			color: <?php echo $primarybgbtncolor; ?>;
		}
		
		#head-notification p {
			margin: 0;
			text-align: center;
		}
		
		#hero-cta img {
			width: 100%;
			max-width: 400px;
		}
	</style>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="Ve1kK9HX"></script>
</head>

<body id="myHome" <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="60" oncontextmenu="return <?php echo $norightclick; ?>;">
<?php wp_body_open(); ?>

	<?php
		if ($pageloader['enable_page_loader'] == 'Yes') {
			?>
				<div id="loader" style="background: #fff url('<?php echo $pageloader['gif_logo']; ?>') no-repeat center center; background-size: 30px; height: 100vh;"></div>
			<?php
		}
	?>

	<div id="page" class="site" style="<?php echo $displaycontent; ?>; overflow: hidden;">	
		<header id="masthead" class="site-header sticky-top" style="background-color: rgba(0,0,0,0.2);">
		    <div id="head-notification" class="bg-white">
		        <div class="<?php echo $contentwidth; ?>">
					<div class="<?php echo $clsnotif; ?>">
						<?php echo $headrnotif; ?>
					</div>
				</div>
		    </div>
			<nav id="site-navigation" class="main-navigation navbar navbar-expand-sm <?php echo $contentwidth; ?>">
				<?php if ( has_custom_logo() && $show_title ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php endif; ?><!-- .site-branding -->

				<button class="navbar-toggler collapsed ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
				</button>
				
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<?php
						wp_nav_menu( array(
							'theme_location'	=> 'menu-1',
							'menu_id'			=> 'primary-menu', 
							'container_class'	=> $mainmenualignment,
							'menu_class'		=> 'ml-auto w-100'
						) );
					?>
						<aside id="searchbox-nav" class="widget-area">
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
						</aside><!-- #secondary -->
					<?php
						wp_nav_menu( array(
							'theme_location'	=> 'menu-2',
							'menu_id'			=> 'secondary-menu', 
							'menu_class'		=> 'ml-auto'
						) );
					?>
				</div>

			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<?php
			include_once('inc/hero-banner.php');
		?>
