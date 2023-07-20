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

use Inc\Init;

// Exit if accessed directly.
defined( 'ABSPATH' ) or die("Not allowed here");
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_PATH_URL', plugin_dir_url( __FILE__ ) );

if( file_exists( dirname( __FILE__ ) . '/vendor/autoload' ) ){
    require_once dirname( __FILE__ ) . '/vendor/autoload';
}



if ( class_exists( 'Inc\\Init' ) ) {
	Init::register_services();
}
