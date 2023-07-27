<?php

/**
 * @package TestPlugin
 * 
 **/

namespace Inc\Pages;

use Inc\Api\SettingApi;
use Inc\Base\BaseController;

class Admin extends BaseController
{
    public $settings;


    public function __construct()
    {
        $this->settings = new SettingApi();
    }


    public function register()
    {
        // add_action('admin_menu', array($this, 'add_admin_pages'));
        $pages = array(array(
            'page_title' => 'Test Plug',
            'menu_title' => 'Testplug',
            'capability' => 'manage_options',
            'menu_slug' => 'Testplug-plugin-settings',
            'callback' => function () {
                echo "<h1> Hi am Nik </h1>";
            },
            'icon_url' => 'dashicons-admin-generic',
            'position' => 110,
        ));

        $subpages = array(array(
            'parent_slug' => 'Testplug-plugin-settings',
            'page_title' => 'Categories',
            'menu_title' => 'Categories',
            'capability' => 'manage_options',
            'menu_slug' => 'Testplug-plugin-categories',
            'callback' => function () {
                echo "<h1> Hi, its Taxonomies </h1>";
            },
        ));


        $this->settings
            ->addPages($pages)
            ->withSubPage('General')
            ->AddSubPages($subpages)
            ->register();
    }

    // public function add_admin_pages() {
    //     // add_menu_page('Test Plug', 'Testplug', 'manage_options', 'test_plug', 
    //     // array( $this, 'admin_index' ), 'dashicons-store', 110);

    //     add_menu_page(
    //         'Test Plug',
    //         'Testplug',
    //         'manage_options', // Capability required to access the menu
    //         'Testplug-plugin-settings', // Menu slug
    //         array( $this, 'admin_index'), // Callback function to display the page
    //         'dashicons-admin-generic' // Icon URL or dashicons class name
    //     );
    // }




    // public function admin_index() {
    //     require_once( $this->plugin_path . 'templates/dashboard.php' );
    // }
}
