<?php
/**
 * Custom WP-Login Form.
 */

function custom_admin_login_style() {
	$bgimgwpadmin = get_field('wp_login_background','option');
	
    if ( has_custom_logo() ) : 
        $image_mlogo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
?>
    	<style type="text/css">
    		body.login div#login h1 a {
    			background-image: url(<?php echo esc_url( $image_mlogo[0] ); ?>)!important;
    		}
    
    		body.login {
    			background-image: url(<?php echo $bgimgwpadmin ?>);
    			background-repeat: no-repeat;
    			background-position: center;
    			background-size: cover;
    			display: flex;
    		}
    
    		body.login #login {
    			padding: 20px 20px;
    			background-color: rgb(255,255,255,.1);
    			margin: auto;
    			border-radius: 12px;
    		}
    
    		body.login #nav, 
    		body.login #backtoblog {
    			text-align: center;
    		}
    
    		body.login #nav a, 
    		body.login #nav a:hover, 
    		body.login #backtoblog a, 
    		body.login #backtoblog a:hover {
    			color: #000000!important;
    		}
    
    		body.login #login form#loginform {
    			background-color: transparent;
    		}
    
    		body.login #login label {
    			color: #000000;
    		}
    	</style>
<?php
    endif;
}
add_action( 'login_enqueue_scripts', 'custom_admin_login_style' );

function custom_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

function custom_login_logo_url_title() {
	return "Key Media";
}
add_filter( 'login_headertitle', 'custom_login_logo_url_title' );

?>