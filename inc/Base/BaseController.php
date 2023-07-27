<?php

/**
 * @package TestPlugin
 * 
 * BaseController Class
 */

namespace Inc\Base;

class BaseController
{
    public $plugin_path, $plugin_path_url, $plugin;

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2) );
        $this->plugin_path_url = plugin_dir_url( dirname( __FILE__, 2) );
        $plugin = plugin_basename( dirname( __FILE__, 3 ) );
        $this->plugin = $plugin . "/" . $plugin . ".php";
    }
}

