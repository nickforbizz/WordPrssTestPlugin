<?php

/**
 * @package TestPlugin
 * 
 * SettingsLinks Class
 */

namespace Inc\Base;

class SettingsLinks extends BaseController
{

    public function register()
    {
        add_filter( "plugin_action_links_". $this->plugin, array( $this, 'settings_link' ) );
    }


    function settings_link($links)
    {
        $setting_link = "<a href='admin.php?page=Testplug-plugin-settings'> Settings </a>";
        array_push($links, $setting_link);
        return $links;
    }
}
