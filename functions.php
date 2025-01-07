<?php
/**
 * wpTheameplate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpTheameplate
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wptheameplate_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wpTheameplate, use a find and replace
		* to change 'wptheameplate' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wptheameplate', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wptheameplate' ), 
			'menu-2' => esc_html__( 'Secondary', 'wptheameplate' ), 
			'menu-3' => esc_html__( 'Third', 'wptheameplate' ), 
			'menu-4' => esc_html__( 'Forth', 'wptheameplate' ), 
			'menu-5' => esc_html__( 'Fifth', 'wptheameplate' ), 
			'menu-6' => esc_html__( 'Six', 'wptheameplate' ), 
			'menu-7' => esc_html__( 'Sevent', 'wptheameplate' ), 
			'menu-8' => esc_html__( 'Eight', 'wptheameplate' ), 
			'menu-9' => esc_html__( 'Nine', 'wptheameplate' ), 
			'menu-10' => esc_html__( 'Tenth', 'wptheameplate' )
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wptheameplate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'		=> 250,
			'width'			=> 250,
			'flex-width'	=> true,
			'flex-height'	=> true,
		)
	);
}
add_action( 'after_setup_theme', 'wptheameplate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wptheameplate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wptheameplate_content_width', 640 );
}
add_action( 'after_setup_theme', 'wptheameplate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wptheameplate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wptheameplate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wptheameplate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Operations Hour', 'wptheameplate' ),
			'id'            => 'openhour-1',
			'description'   => esc_html__( 'Add widgets here.', 'wptheameplate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Custom Gallery', 'wptheameplate' ),
			'id'            => 'custom-gallery-1',
			'description'   => esc_html__( 'Add widgets here.', 'wptheameplate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wptheameplate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wptheameplate_scripts() {
	wp_enqueue_style( 'wptheameplate-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wptheameplate-style', 'rtl', 'replace' );
	
	// Bootstrap Style
	wp_register_style( 'bootstrap-style', get_template_directory_uri() .'/assets/bootstrap/4.3.1/css/bootstrap.min.css', array(), false, 'all' );
	wp_enqueue_style( 'bootstrap-style' );

	// Fontawsome
	wp_register_style( 'fontawsome-style', get_template_directory_uri() .'/assets/fontawesome/releases/v5.7.0/css/all.css', array(), false, 'all' );
	wp_enqueue_style( 'fontawsome-style' );

	// Custom Style
	wp_register_style( 'custom-style', get_template_directory_uri() .'/assets/css/style.css', array(), false, 'all' );
	wp_enqueue_style( 'custom-style' );

	// Slick for Slide Blocks
	wp_register_style( 'slick-style', get_template_directory_uri() .'/assets/npm/slick-carousel@1.8.1/slick/slick.css', array(), false, 'all' );
	wp_enqueue_style( 'slick-style' );

	// Custom JS
	wp_register_script( 'custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), '', true );
	wp_enqueue_script( 'custom-script' );

	// JQuery
	wp_register_script( 'jquery3_4_0', get_template_directory_uri() . '/assets/ajax/libs/jquery/3.4.0/jquery.min.js', array(), '', false );
	wp_enqueue_script( 'jquery3_4_0' );

	wp_register_script( 'popper', get_template_directory_uri() . '/assets/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '', false );
	wp_enqueue_script( 'popper' );

	// Bootsrap JS
	wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/assets/bootstrap/4.3.1/js/bootstrap.min.js', array(), '', false );
	wp_enqueue_script( 'bootstrap-script' );

	// Slick for Slide Blocks JS
	wp_register_script( 'slick-script', get_template_directory_uri() . '/assets/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '', false );
	wp_enqueue_script( 'slick-script' );

	wp_enqueue_script( 'wptheameplate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wptheameplate_scripts' );

function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom WP-Login Form Style
 */
require get_template_directory() . '/inc/function-custom-login.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('woocommerce_before_single_product_summary',function() {
  printf('<h4><a href="?added-content">Congratulations, you\'ve just added a link!</a></h4>');
});

add_action('woocommerce_after_single_product_summary','QuadLayers_callback_function');
function QuadLayers_callback_function(){
    printf('
    <h1> Hey there !</h1>
    <div><h5>Welcome to my custom product page</h5>
    <h4><a href="?link-to-somewere">Link to somewere!</a></h4>
    <img src="https://img.freepik.com/free-vector/bird-silhouette-logo-vector-illustration_141216-100.jpg" />
    </div>');
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/* ACF Theme Settings */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Settings');
	acf_add_options_page(array(
		'page_title' => 'Slick Slider',
		'icon_url' => 'dashicons-slides'
	));
	// acf_add_options_page(array(
	// 	'page_title' => 'Post Type 2',
	// 	'icon_url' => 'dashicons-hammer',
	// 	'position' => 8
	// ));
	// acf_add_options_page(array(
	// 	'page_title' => 'Post Type 3',
	// 	'icon_url' => 'dashicons-id-alt',
	// 	'position' => 9
	// ));
}

/* function codex_product_init() {
	$products = array(
		'name'					=> _x( 'Products', 'post type general name', 'your-plugin-textdomain' ), 
		'singular_name'			=> _x( 'Product', 'post type singular name', 'your-plugin-textdomain' ), 
		'menu_name'				=> __( 'Products', 'admin menu', 'your-plugin-textdomain' ), 
		'name_admin_bar'		=> _x( 'Product', 'add new on admin bar', 'your-plugin-textdomain' ), 
		'add_new'				=> _x( 'Add New', 'product', 'your-plugin-textdomain' ), 
		'add_new_item'			=> __( 'Add New Product', 'your-plugin-textdomain' ), 
		'new_item'				=> __( 'New Product', 'your-plugin-textdomain' ), 
		'edit_item'				=> __( 'Edit Product', 'your-plugin-textdomain' ), 
		'view_item'				=> __( 'View Product', 'your-plugin-textdomain' ), 
		'all_items'				=> __( 'All Products', 'your-plugin-textdomain' ), 
		'search_items'			=> __( 'Search Products', 'your-plugin-textdomain' ), 
		'parent_item_colon'		=> __( 'Parent Products:', 'your-plugin-textdomain' ), 
		'not_found'				=> __( 'No Products Found.', 'your-plugin-textdomain' ), 
		'not_found_in_trash'	=> __( 'No Products Found in Trash.', 'your-plugin-textdomain' ), 
		'featured_image'        => __( 'Product image', 'your-plugin-textdomain' ), 
		'set_featured_image'	=> __( 'Set product image', 'your-plugin-textdomain' ),    
		'remove_featured_image'	=> __( 'Remove product image', 'your-plugin-textdomain' ), 
		'use_featured_image'	=> __( 'Use as product image', 'your-plugin-textdomain' ), 
		'insert_into_item'		=> __( 'Insert into product', 'your-plugin-textdomain' ),  
		'uploaded_to_this_item'	=> __( 'Uploaded to this product', 'your-plugin-textdomain' ), 
		'filter_items_list'		=> __( 'Filter product', 'your-plugin-textdomain' ), 
		'items_list_navigation'	=> __( 'Products navigation', 'your-plugin-textdomain' ), 
		'items_list'			=> __( 'Products list', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'				=> $products, 
		'taxonomies'			=> array( 'category', 'thumbnail' ), 
		'description'			=> __( 'Description', 'your-plugin-textdomain'), 
		'public'				=> true, 
		'publicly_queryable'	=> true, 
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true, 
		'rewrite'				=> array( 'slug' => 'products' ), 
		'capability_type'		=> 'post', 
		'has_archive'			=> true, 
		'hierarchical'			=> false, 
		'menu_position'			=> null, 
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'products', $args );
}
add_action('init', 'codex_product_init'); */

/* function codex_service_init() {
	$services = array(
		'name'					=> _x( 'Services', 'post type general name', 'wptheameplate-services' ), 
		'singular_name'			=> _x( 'Service', 'post type singular name', 'wptheameplate-services' ), 
		'menu_name'				=> __( 'Services', 'admin menu', 'wptheameplate-services' ), 
		'name_admin_bar'		=> _x( 'Service', 'add new on admin bar', 'wptheameplate-services' ), 
		'add_new'				=> _x( 'Add New', 'service', 'wptheameplate-services' ), 
		'add_new_item'			=> __( 'Add New Service', 'wptheameplate-services' ), 
		'new_item'				=> __( 'New Service', 'wptheameplate-services' ), 
		'edit_item'				=> __( 'Edit Service', 'wptheameplate-services' ), 
		'view_item'				=> __( 'View Service', 'wptheameplate-services' ), 
		'all_items'				=> __( 'All Services', 'wptheameplate-services' ), 
		'search_items'			=> __( 'Search Services', 'wptheameplate-services' ), 
		'parent_item_colon'		=> __( 'Parent Services:', 'wptheameplate-services' ), 
		'not_found'				=> __( 'No Services Found.', 'wptheameplate-services' ), 
		'not_found_in_trash'	=> __( 'No Services Found in Trash.', 'wptheameplate-services' ), 
		'featured_image'        => __( 'Service image', 'wptheameplate-services' ), 
		'set_featured_image'	=> __( 'Set service image', 'wptheameplate-services' ),    
		'remove_featured_image'	=> __( 'Remove service image', 'wptheameplate-services' ), 
		'use_featured_image'	=> __( 'Use as service image', 'wptheameplate-services' ), 
		'insert_into_item'		=> __( 'Insert into service', 'wptheameplate-services' ),  
		'uploaded_to_this_item'	=> __( 'Uploaded to this service', 'wptheameplate-services' ), 
		'filter_items_list'		=> __( 'Filter service', 'wptheameplate-services' ), 
		'items_list_navigation'	=> __( 'Services navigation', 'wptheameplate-services' ), 
		'items_list'			=> __( 'Services list', 'wptheameplate-services' )
	);

	$args = array(
		'labels'				=> $services, 
		'taxonomies'			=> array( 'category', 'thumbnail' ), 
		'description'			=> __( 'Description', 'wptheameplate-services'), 
		'public'				=> true, 
		'publicly_queryable'	=> true, 
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true, 
		'rewrite'				=> array( 'slug' => 'services' ), 
		'capability_type'		=> 'post', 
		'has_archive'			=> true, 
		'hierarchical'			=> false, 
		'menu_position'			=> null, 
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'services', $args );
}
add_action('init', 'codex_service_init'); */

function codex_indexpost_init() {
	$indexposts = array(
		'name'					=> _x( 'Index Posts', 'post type general name', 'wptheameplate-feat-index-post' ), 
		'singular_name'			=> _x( 'Index Post', 'post type singular name', 'wptheameplate-feat-index-post' ), 
		'menu_name'				=> __( 'Index Posts', 'admin menu', 'wptheameplate-feat-index-post' ), 
		'name_admin_bar'		=> _x( 'Index Post', 'add new on admin bar', 'wptheameplate-feat-index-post' ), 
		'add_new'				=> _x( 'Add New', 'indexpost', 'wptheameplate-feat-index-post' ), 
		'add_new_item'			=> __( 'Add New Index Post', 'wptheameplate-feat-index-post' ), 
		'new_item'				=> __( 'New Index Post', 'wptheameplate-feat-index-post' ), 
		'edit_item'				=> __( 'Edit Index Post', 'wptheameplate-feat-index-post' ), 
		'view_item'				=> __( 'View Index Post', 'wptheameplate-feat-index-post' ), 
		'all_items'				=> __( 'All Index Posts', 'wptheameplate-feat-index-post' ), 
		'search_items'			=> __( 'Search Index Posts', 'wptheameplate-feat-index-post' ), 
		'parent_item_colon'		=> __( 'Parent Index Posts:', 'wptheameplate-feat-index-post' ), 
		'not_found'				=> __( 'No Index Posts Found.', 'wptheameplate-feat-index-post' ), 
		'not_found_in_trash'	=> __( 'No Index Posts Found in Trash.', 'wptheameplate-feat-index-post' ), 
		'featured_image'        => __( 'Index Post image', 'wptheameplate-feat-index-post' ), 
		'set_featured_image'	=> __( 'Set indexpost image', 'wptheameplate-feat-index-post' ),    
		'remove_featured_image'	=> __( 'Remove indexpost image', 'wptheameplate-feat-index-post' ), 
		'use_featured_image'	=> __( 'Use as indexpost image', 'wptheameplate-feat-index-post' ), 
		'insert_into_item'		=> __( 'Insert into indexpost', 'wptheameplate-feat-index-post' ),  
		'uploaded_to_this_item'	=> __( 'Uploaded to this indexpost', 'wptheameplate-feat-index-post' ), 
		'filter_items_list'		=> __( 'Filter indexpost', 'wptheameplate-feat-index-post' ), 
		'items_list_navigation'	=> __( 'Index Posts navigation', 'wptheameplate-feat-index-post' ), 
		'items_list'			=> __( 'Index Posts list', 'wptheameplate-feat-index-post' )
	);

	$args = array(
		'labels'				=> $indexposts, 
		'taxonomies'			=> array( 'category', 'thumbnail' ), 
		'description'			=> __( 'Description', 'wptheameplate-feat-index-post'), 
		'public'				=> true, 
		'publicly_queryable'	=> true, 
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true, 
		'rewrite'				=> array( 'slug' => 'indexposts' ), 
		'capability_type'		=> 'post', 
		'has_archive'			=> true, 
		'hierarchical'			=> false, 
		'menu_position'			=> null, 
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'indexposts', $args );
}
add_action('init', 'codex_indexpost_init');

function codex_headerbanner_init() {
	$headerbanners = array(
		'name'					=> _x( 'Header Banners', 'post type general name', 'wptheameplate-header-banner' ), 
		'singular_name'			=> _x( 'Header Banner', 'post type singular name', 'wptheameplate-header-banner' ), 
		'menu_name'				=> __( 'Header Banners', 'admin menu', 'wptheameplate-header-banner' ), 
		'name_admin_bar'		=> _x( 'Header Banner', 'add new on admin bar', 'wptheameplate-header-banner' ), 
		'add_new'				=> _x( 'Add New', 'headerbanner', 'wptheameplate-header-banner' ), 
		'add_new_item'			=> __( 'Add New Header Banner', 'wptheameplate-header-banner' ), 
		'new_item'				=> __( 'New Header Banner', 'wptheameplate-header-banner' ), 
		'edit_item'				=> __( 'Edit Header Banner', 'wptheameplate-header-banner' ), 
		'view_item'				=> __( 'View Header Banner', 'wptheameplate-header-banner' ), 
		'all_items'				=> __( 'All Header Banners', 'wptheameplate-header-banner' ), 
		'search_items'			=> __( 'Search Header Banners', 'wptheameplate-header-banner' ), 
		'parent_item_colon'		=> __( 'Parent Header Banners:', 'wptheameplate-header-banner' ), 
		'not_found'				=> __( 'No Header Banners Found.', 'wptheameplate-header-banner' ), 
		'not_found_in_trash'	=> __( 'No Header Banners Found in Trash.', 'wptheameplate-header-banner' ), 
		'featured_image'        => __( 'Header Banner image', 'wptheameplate-header-banner' ), 
		'set_featured_image'	=> __( 'Set header banner image', 'wptheameplate-header-banner' ),    
		'remove_featured_image'	=> __( 'Remove header banner image', 'wptheameplate-header-banner' ), 
		'use_featured_image'	=> __( 'Use as header banner image', 'wptheameplate-header-banner' ), 
		'insert_into_item'		=> __( 'Insert into header banner', 'wptheameplate-header-banner' ),  
		'uploaded_to_this_item'	=> __( 'Uploaded to this header banner', 'wptheameplate-header-banner' ), 
		'filter_items_list'		=> __( 'Filter header banner', 'wptheameplate-header-banner' ), 
		'items_list_navigation'	=> __( 'Header Banners navigation', 'wptheameplate-header-banner' ), 
		'items_list'			=> __( 'Header Banners list', 'wptheameplate-header-banner' )
	);

	$args = array(
		'labels'				=> $headerbanners, 
		'taxonomies'			=> array( 'category', 'thumbnail' ), 
		'description'			=> __( 'Description', 'wptheameplate-header-banner'), 
		'public'				=> true, 
		'publicly_queryable'	=> true, 
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true, 
		'rewrite'				=> array( 'slug' => 'headerbanners' ), 
		'capability_type'		=> 'post', 
		'has_archive'			=> true, 
		'hierarchical'			=> false, 
		'menu_position'			=> null, 
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'headerbanners', $args );
}
add_action('init', 'codex_headerbanner_init');

function codex_brandlogo_init() {
	$brandlogos = array(
		'name'					=> _x( 'Brand Logos', 'post type general name', 'wptheameplate-brandlogo' ), 
		'singular_name'			=> _x( 'Brand Logo', 'post type singular name', 'wptheameplate-brandlogo' ), 
		'menu_name'				=> __( 'Brand Logos', 'admin menu', 'wptheameplate-brandlogo' ), 
		'name_admin_bar'		=> _x( 'Brand Logo', 'add new on admin bar', 'wptheameplate-brandlogo' ), 
		'add_new'				=> _x( 'Add New', 'brand logo', 'wptheameplate-brandlogo' ), 
		'add_new_item'			=> __( 'Add New Brand Logo', 'wptheameplate-brandlogo' ), 
		'new_item'				=> __( 'New Brand Logo', 'wptheameplate-brandlogo' ), 
		'edit_item'				=> __( 'Edit Brand Logo', 'wptheameplate-brandlogo' ), 
		'view_item'				=> __( 'View Brand Logo', 'wptheameplate-brandlogo' ), 
		'all_items'				=> __( 'All Brand Logos', 'wptheameplate-brandlogo' ), 
		'search_items'			=> __( 'Search Brand Logos', 'wptheameplate-brandlogo' ), 
		'parent_item_colon'		=> __( 'Parent Brand Logos:', 'wptheameplate-brandlogo' ), 
		'not_found'				=> __( 'No Brand Logos Found.', 'wptheameplate-brandlogo' ), 
		'not_found_in_trash'	=> __( 'No Brand Logos Found in Trash.', 'wptheameplate-brandlogo' ), 
		'featured_image'        => __( 'Brand Logo image', 'wptheameplate-brandlogo' ), 
		'set_featured_image'	=> __( 'Set brand logo image', 'wptheameplate-brandlogo' ),    
		'remove_featured_image'	=> __( 'Remove brand logo image', 'wptheameplate-brandlogo' ), 
		'use_featured_image'	=> __( 'Use as brand logo image', 'wptheameplate-brandlogo' ), 
		'insert_into_item'		=> __( 'Insert into brand logo', 'wptheameplate-brandlogo' ),  
		'uploaded_to_this_item'	=> __( 'Uploaded to this brand logo', 'wptheameplate-brandlogo' ), 
		'filter_items_list'		=> __( 'Filter brand logo', 'wptheameplate-brandlogo' ), 
		'items_list_navigation'	=> __( 'Brand Logos navigation', 'wptheameplate-brandlogo' ), 
		'items_list'			=> __( 'Brand Logos list', 'wptheameplate-brandlogo' )
	);

	$args = array(
		'labels'				=> $brandlogos, 
		'taxonomies'			=> array( 'category', 'thumbnail' ), 
		'description'			=> __( 'Description', 'wptheameplate-brandlogo'), 
		'public'				=> true, 
		'publicly_queryable'	=> true, 
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true, 
		'rewrite'				=> array( 'slug' => 'brand-logos' ), 
		'capability_type'		=> 'post', 
		'has_archive'			=> true, 
		'hierarchical'			=> false, 
		'menu_position'			=> null, 
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'brandlogos', $args );
}
add_action('init', 'codex_brandlogo_init');

function codex_team_init() {
	$teams = array(
		'name'					=> _x( 'Teams', 'post type general name', 'wptheameplate-our-teams' ), 
		'singular_name'			=> _x( 'Team', 'post type singular name', 'wptheameplate-our-teams' ), 
		'menu_name'				=> __( 'Our Teams', 'admin menu', 'wptheameplate-our-teams' ), 
		'name_admin_bar'		=> _x( 'Team', 'add new on admin bar', 'wptheameplate-our-teams' ), 
		'add_new'				=> _x( 'Add New', 'team', 'wptheameplate-our-teams' ), 
		'add_new_item'			=> __( 'Add New Team', 'wptheameplate-our-teams' ), 
		'new_item'				=> __( 'New Team', 'wptheameplate-our-teams' ), 
		'edit_item'				=> __( 'Edit Team', 'wptheameplate-our-teams' ), 
		'view_item'				=> __( 'View Team', 'wptheameplate-our-teams' ), 
		'all_items'				=> __( 'All Teams', 'wptheameplate-our-teams' ), 
		'search_items'			=> __( 'Search Teams', 'wptheameplate-our-teams' ), 
		'parent_item_colon'		=> __( 'Parent Teams:', 'wptheameplate-our-teams' ), 
		'not_found'				=> __( 'No Teams Found.', 'wptheameplate-our-teams' ), 
		'not_found_in_trash'	=> __( 'No Teams Found in Trash.', 'wptheameplate-our-teams' ), 
		'featured_image'        => __( 'Team image', 'wptheameplate-our-teams' ), 
		'set_featured_image'	=> __( 'Set team image', 'wptheameplate-our-teams' ),    
		'remove_featured_image'	=> __( 'Remove team image', 'wptheameplate-our-teams' ), 
		'use_featured_image'	=> __( 'Use as team image', 'wptheameplate-our-teams' ), 
		'insert_into_item'		=> __( 'Insert into team', 'wptheameplate-our-teams' ),  
		'uploaded_to_this_item'	=> __( 'Uploaded to this team', 'wptheameplate-our-teams' ), 
		'filter_items_list'		=> __( 'Filter team', 'wptheameplate-our-teams' ), 
		'items_list_navigation'	=> __( 'Teams navigation', 'wptheameplate-our-teams' ), 
		'items_list'			=> __( 'Teams list', 'wptheameplate-our-teams' )
	);

	$args = array(
		'labels'				=> $teams, 
		'taxonomies'			=> array( 'category', 'thumbnail' ), 
		'description'			=> __( 'Description', 'wptheameplate-our-teams'), 
		'public'				=> true, 
		'publicly_queryable'	=> true, 
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true, 
		'rewrite'				=> array( 'slug' => 'our-teams' ), 
		'capability_type'		=> 'post', 
		'has_archive'			=> true, 
		'hierarchical'			=> false, 
		'menu_position'			=> null, 
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'teams', $args );
}
add_action('init', 'codex_team_init');

function codex_testimonial_init() {
	$testimonials = array(
		'name'					=> _x( 'Testimonials', 'post type general name', 'wptheameplate-testimonial' ), 
		'singular_name'			=> _x( 'Testimonial', 'post type singular name', 'wptheameplate-testimonial' ), 
		'menu_name'				=> __( 'Testimonials', 'admin menu', 'wptheameplate-testimonial' ), 
		'name_admin_bar'		=> _x( 'Testimonial', 'add new on admin bar', 'wptheameplate-testimonial' ), 
		'add_new'				=> _x( 'Add New', 'Testimonial', 'wptheameplate-testimonial' ), 
		'add_new_item'			=> __( 'Add New Testimonial', 'wptheameplate-testimonial' ), 
		'new_item'				=> __( 'New Testimonial', 'wptheameplate-testimonial' ), 
		'edit_item'				=> __( 'Edit Testimonial', 'wptheameplate-testimonial' ), 
		'view_item'				=> __( 'View Testimonial', 'wptheameplate-testimonial' ), 
		'all_items'				=> __( 'All Testimonials', 'wptheameplate-testimonial' ), 
		'search_items'			=> __( 'Search Testimonials', 'wptheameplate-testimonial' ), 
		'parent_item_colon'		=> __( 'Parent Testimonials:', 'wptheameplate-testimonial' ), 
		'not_found'				=> __( 'No Testimonials Found.', 'wptheameplate-testimonial' ), 
		'not_found_in_trash'	=> __( 'No Testimonials Found in Trash.', 'wptheameplate-testimonial' ), 
		'featured_image'		=> __( 'Testimonial image', 'wptheameplate-testimonial' ), 
		'set_featured_image'	=> __( 'Set Testimonial image', 'wptheameplate-testimonial' ),    
		'remove_featured_image'	=> __( 'Remove Testimonial image', 'wptheameplate-testimonial' ), 
		'use_featured_image'	=> __( 'Use as Testimonial image', 'wptheameplate-testimonial' ), 
		'insert_into_item'		=> __( 'Insert into Testimonial', 'wptheameplate-testimonial' ),  
		'uploaded_to_this_item'	=> __( 'Uploaded to this Testimonial', 'wptheameplate-testimonial' ), 
		'filter_items_list'		=> __( 'Filter Testimonial', 'wptheameplate-testimonial' ), 
		'items_list_navigation'	=> __( 'Testimonials navigation', 'wptheameplate-testimonial' ), 
		'items_list'			=> __( 'Testimonials list', 'wptheameplate-testimonial' )
	);

	$args = array(
		'labels'				=> $testimonials, 
		'taxonomies'			=> array( 'category', 'thumbnail' ), 
		'description'			=> __( 'Description', 'wptheameplate-testimonial'), 
		'public'				=> true, 
		'publicly_queryable'	=> true, 
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true, 
		'rewrite'				=> array( 'slug' => 'testimonials' ), 
		'capability_type'		=> 'post', 
		'has_archive'			=> true, 
		'hierarchical'			=> false, 
		'menu_position'			=> null, 
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'testimonials', $args );
}
add_action('init', 'codex_testimonial_init');

function codex_featurednew_init() {
	$featurednews = array(
		'name'					=> _x( 'Featured News', 'post type general name', 'wptheameplate-custom-post' ), 
		'singular_name'			=> _x( 'News', 'post type singular name', 'wptheameplate-custom-post' ), 
		'menu_name'				=> __( 'Featured News', 'admin menu', 'wptheameplate-custom-post' ), 
		'name_admin_bar'		=> _x( 'News', 'add new on admin bar', 'wptheameplate-custom-post' ), 
		'add_new'				=> _x( 'Add New', 'News', 'wptheameplate-custom-post' ), 
		'add_new_item'			=> __( 'Add New News', 'wptheameplate-custom-post' ), 
		'new_item'				=> __( 'New News', 'wptheameplate-custom-post' ), 
		'edit_item'				=> __( 'Edit News', 'wptheameplate-custom-post' ), 
		'view_item'				=> __( 'View News', 'wptheameplate-custom-post' ), 
		'all_items'				=> __( 'All Featured News', 'wptheameplate-custom-post' ), 
		'search_items'			=> __( 'Search Featured News', 'wptheameplate-custom-post' ), 
		'parent_item_colon'		=> __( 'Parent Featured News:', 'wptheameplate-custom-post' ), 
		'not_found'				=> __( 'No Featured News Found.', 'wptheameplate-custom-post' ), 
		'not_found_in_trash'	=> __( 'No Featured News Found in Trash.', 'wptheameplate-custom-post' ), 
		'featured_image'        => __( 'News image', 'wptheameplate-custom-post' ), 
		'set_featured_image'	=> __( 'Set News image', 'wptheameplate-custom-post' ),    
		'remove_featured_image'	=> __( 'Remove News image', 'wptheameplate-custom-post' ), 
		'use_featured_image'	=> __( 'Use as News image', 'wptheameplate-custom-post' ), 
		'insert_into_item'		=> __( 'Insert into News', 'wptheameplate-custom-post' ),  
		'uploaded_to_this_item'	=> __( 'Uploaded to this News', 'wptheameplate-custom-post' ), 
		'filter_items_list'		=> __( 'Filter News', 'wptheameplate-custom-post' ), 
		'items_list_navigation'	=> __( 'Featured News navigation', 'wptheameplate-custom-post' ), 
		'items_list'			=> __( 'Featured News list', 'wptheameplate-custom-post' )
	);

	$args = array(
		'labels'				=> $featurednews, 
		'taxonomies'			=> array( 'category', 'thumbnail' ), 
		'description'			=> __( 'Description', 'wptheameplate-custom-post'), 
		'public'				=> true, 
		'publicly_queryable'	=> true, 
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true, 
		'rewrite'				=> array( 'slug' => 'featured-news' ), 
		'capability_type'		=> 'post', 
		'has_archive'			=> true, 
		'hierarchical'			=> false, 
		'menu_position'			=> null, 
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'featurednews', $args );
}
add_action('init', 'codex_featurednew_init');

function codex_image_gallery_init() {
	$imagegalleries = array(
		'name'					=> _x( 'Image Galleries', 'post type general name', 'wptheameplate-image-gallery' ), 
		'singular_name'			=> _x( 'Image Gallery', 'post type singular name', 'wptheameplate-image-gallery' ), 
		'menu_name'				=> __( 'Image Galleries', 'admin menu', 'wptheameplate-image-gallery' ), 
		'name_admin_bar'		=> _x( 'Image Gallery', 'add new on admin bar', 'wptheameplate-image-gallery' ), 
		'add_new'				=> _x( 'Add New', 'image-gallery', 'wptheameplate-image-gallery' ), 
		'add_new_item'			=> __( 'Add New Image Gallery', 'wptheameplate-image-gallery' ), 
		'new_item'				=> __( 'New Image Gallery', 'wptheameplate-image-gallery' ), 
		'edit_item'				=> __( 'Edit Image Gallery', 'wptheameplate-image-gallery' ), 
		'view_item'				=> __( 'View Image Gallery', 'wptheameplate-image-gallery' ), 
		'all_items'				=> __( 'All Image Galleries', 'wptheameplate-image-gallery' ), 
		'search_items'			=> __( 'Search Image Galleries', 'wptheameplate-image-gallery' ), 
		'parent_item_colon'		=> __( 'Parent Image Galleries:', 'wptheameplate-image-gallery' ), 
		'not_found'				=> __( 'No Image Galleries Found.', 'wptheameplate-image-gallery' ), 
		'not_found_in_trash'	=> __( 'No Image Galleries Found in Trash.', 'wptheameplate-image-gallery' ), 
		'featured_image'        => __( 'Image Gallery image', 'wptheameplate-image-gallery' ), 
		'set_featured_image'	=> __( 'Set image gallery image', 'wptheameplate-image-gallery' ),    
		'remove_featured_image'	=> __( 'Remove image gallery image', 'wptheameplate-image-gallery' ), 
		'use_featured_image'	=> __( 'Use as image gallery image', 'wptheameplate-image-gallery' ), 
		'insert_into_item'		=> __( 'Insert into image gallery', 'wptheameplate-image-gallery' ),  
		'uploaded_to_this_item'	=> __( 'Uploaded to this image gallery', 'wptheameplate-image-gallery' ), 
		'filter_items_list'		=> __( 'Filter image gallery', 'wptheameplate-image-gallery' ), 
		'items_list_navigation'	=> __( 'Image Galleries navigation', 'wptheameplate-image-gallery' ), 
		'items_list'			=> __( 'Image Galleries list', 'wptheameplate-image-gallery' )
	);

	$args = array(
		'labels'				=> $imagegalleries, 
		'taxonomies'			=> array( 'category', 'thumbnail' ), 
		'description'			=> __( 'Description', 'wptheameplate-image-gallery'), 
		'public'				=> true, 
		'publicly_queryable'	=> true, 
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true, 
		'rewrite'				=> array( 'slug' => 'image-galleries' ), 
		'capability_type'		=> 'post', 
		'has_archive'			=> true, 
		'hierarchical'			=> false, 
		'menu_position'			=> null, 
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'image-galleries', $args );
}
add_action('init', 'codex_image_gallery_init');