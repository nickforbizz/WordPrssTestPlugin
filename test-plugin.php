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



class TestPlugin
{

    public $plugin;

    function __construct()
    {
        add_action('init', array($this, 'custom_post_type'));
        $this->plugin = plugin_basename(__FILE__);
    }

    function registerAssets() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_menu', array($this, 'add_admin_pages'));
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    // activate plugin
    function activate()
    {
        // generate CPT
        $this->custom_post_type();
        // flush rules
        flush_rewrite_rules();
    }

    // deactivate plugin
    function deactivate()
    {

        flush_rewrite_rules();
    }

    // uninstall plugin
    function uninstall()
    {
    }

    public function custom_post_type()
    {
        $labels = array(
            'name' => 'Publications',
            'singular_name' => 'Publication',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Publication',
            'edit_item' => 'Edit Publication',
            'new_item' => 'New Publication',
            'view_item' => 'View Publication',
            'search_items' => 'Search Publications',
            'not_found' => 'No publications found',
            'not_found_in_trash' => 'No publications found in trash',
            'menu_name' => 'Publications',
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'publications'),
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
            'taxonomies' => array('publication_category'),
        );

        register_post_type('publication', $args);
    }


    function enqueue() {
        wp_enqueue_style('pluginstyle', plugins_url('/Assets/style.css', __FILE__) );
        wp_enqueue_script('pluginstyle', plugins_url('/Assets/main.js', __FILE__) );
    }

    function add_admin_pages() {
        add_menu_page('Test Plug', 'Testplug', 'manage_options', 'test_plug', 
        array( $this, 'admin_index' ), 'dashicons-book', 3);
    }

    function admin_index() {
        require_once( plugin_dir_path(__FILE__) . 'templates/dashboard.php' );
    }

    function settings_link($links) {
        $setting_link = "<a href='admin.php?page=test_plug'> Settings </a>";
        array_push($links, $setting_link);
        return $links;
    }
}


if (class_exists('TestPlugin')) {
    $testPlugin = new TestPlugin();
    $testPlugin->registerAssets();
}


// activation hook
register_activation_hook(__FILE__, array($testPlugin, 'activate'));

// deactivation hook
register_deactivation_hook(__FILE__, array($testPlugin, 'deactivate'));
// uninstallation hook