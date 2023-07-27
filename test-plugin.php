<?php

/**
 * @package TestPlugin
 * Plugin Name: Test Plugin
 * Plugin URI: http://your-plugin-uri.com
 * Description: Allows users to manage Test Plugin.
 * Version: 1.0.0
 * Author: Nicholas Waruingi
 * Author URI: http://your-website.com
 */



// Exit if accessed directly.
defined( 'ABSPATH' ) or die("Not allowed here");



if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ){
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}



if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}else{
    error_log( 'Inc\\Init class or register_services() method is not available.' );
    // Display a warning message to the user
    echo '<div class="error">The required plugin functionality is not available. Please contact the site administrator.</div>';
}



// // activation hook
register_activation_hook(__FILE__, array(Inc\Base\Activate::class, 'activate'));

// // deactivation hook
register_deactivation_hook(__FILE__, array(Inc\Base\Deactivate::class, 'deactivate'));

// // uninstallation hook
