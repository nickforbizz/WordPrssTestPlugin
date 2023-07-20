<?php
/**
 * @package TestPlugin
 * 
 **/

namespace Inc\Base;

class Enqueue{

    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }


    public function enqueue() {
        wp_enqueue_style('pluginstyle', PLUGIN_PATH_URL . 'Assets/style.css' );
        wp_enqueue_script('pluginstyle', PLUGIN_PATH_URL . 'Assets/main.js' );
    }
}