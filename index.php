<?php
/*
  Plugin Name: Google Analytics Scroll Depth Tracking
  Plugin URI: http://rtcamp.com
  Description: Google Analytics plugin to track page scrolling
  Version: 1.0.0
  Author: rtCamp
  Text Domain: rtga-scroll-depth
  Author URI: http://rtcamp.com
 */

/**
 * Index file, contains the plugin metadata and activation processes
 *
 * @package rtga-scroll-depth
 * @subpackage index.php
 */

if ( !defined( 'RT_GA_SD_URL' ) ) {
	define( 'RT_GA_SD_URL', plugin_dir_url( __FILE__ ) );
}

add_action( 'init', 'rtga_init');
function rtga_init() {
	add_action( 'wp_enqueue_scripts', 'rtga_register_scripts' );
	add_action( 'wp_footer', 'rtga_scroll_spool_analytics', 999 );
}

function rtga_register_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'rtga-scroll-depth', RT_GA_SD_URL . 'assets/js/jquery.scrolldepth.js', array( 'jquery' ) );
}

function rtga_scroll_spool_analytics() {
?>
<script>
	jQuery.scrollDepth();
</script>
<?php
}
