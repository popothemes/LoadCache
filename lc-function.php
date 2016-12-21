<?php
/*========== LoadCache wp site Remove Css Js ===========*/ 
function lc_remove_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'lc_remove_css_js', 9999 );
add_filter( 'script_loader_src', 'lc_remove_css_js', 9999 );
 
/*========== Load Cache wp site Clean Head ==========*/
function lc_start_cleanhead() {
  add_action('init', 'lc_clean_head');
} 
function lc_clean_head() {
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'feed_links_extra', 3 );
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'index_rel_link' );
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'rel_canonical', 10, 0 );
  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
  remove_action( 'wp_head', 'wp_generator' );
}
add_action('after_setup_theme','lc_start_cleanhead');

/*=========== LoadCache site Frontend Scripts =============*/
function lc_frontend_scripts() {    
   wp_enqueue_script('lc-frontend-custom', plugins_url( '/js/lc-frontend-custom.js' , __FILE__ ), array('jquery'),null,true);
}
 add_action( 'wp_enqueue_scripts', 'lc_frontend_scripts' );  