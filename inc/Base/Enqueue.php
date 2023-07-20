<?php
/**
 * @package TestPlugin
 * 
 **/

namespace Inc\Base;

class Enqueue extends BaseController
{

    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }


    public function enqueue() {
        wp_enqueue_style('pluginstyle', $this->plugin_path_url . 'Assets/style.css' );
        wp_enqueue_script('pluginstyle', $this->plugin_path_url . 'Assets/main.js' );
    }
}