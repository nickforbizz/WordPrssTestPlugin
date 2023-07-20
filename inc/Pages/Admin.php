<?php
/**
 * @package TestPlugin
 * 
 **/

namespace Inc\Pages;

use Inc\Base\BaseController;

class Admin extends BaseController
{

    public function register() {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    public function add_admin_pages() {
        // add_menu_page('Test Plug', 'Testplug', 'manage_options', 'test_plug', 
        // array( $this, 'admin_index' ), 'dashicons-store', 110);

        add_menu_page(
            'Test Plug',
            'Testplug',
            'manage_options', // Capability required to access the menu
            'Testplug-plugin-settings', // Menu slug
            array( $this, 'admin_index'), // Callback function to display the page
            'dashicons-admin-generic' // Icon URL or dashicons class name
        );
    }


   

    public function admin_index() {
        require_once( $this->plugin_path . 'templates/dashboard.php' );
    }
}