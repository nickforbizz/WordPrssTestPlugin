<?php
/**
 * @package TestPlugin
 * 
 **/

namespace Inc;

use Elementor\Core\Admin\Menu\Base;

final class Init{

    /**
     * Store all the classes inside an array
     *
     * @return array Full list of classes
     */
    public static function get_services(){
        return array(
            Pages\Admin::class,
            Base\Enqueue::class,
        );
    }


    /**
     * Register the classes
     *
     * @return void
     */
    public static function register_services(){
        foreach(self::get_services() as $class){
            $service = self::instantiate($class);
            if( method_exists( $service, 'register' ) ){
                $service->register();
            }
        }
    }


    /**
     * Instanciate the class
     *
     * @param  [type] $class
     * @return object Instance of the class
     */
    public static function instantiate($class){
        $service = new $class();
        return $service;
    }

}



// class TestPlugin
// {

//     public $plugin;

//     function __construct()
//     {
//         add_action('init', array($this, 'custom_post_type'));
//         $this->plugin = plugin_basename(__FILE__);
//     }

//     function registerAssets() {
        
//         add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
//     }

//     // activate plugin
//     function activate()
//     {
//         // generate CPT
//         $this->custom_post_type();
//         Activate::activate();
//     }

//     // deactivate plugin
//     function deactivate()
//     {

//         Deactivate::deactivate();
//     }

//     // uninstall plugin
//     function uninstall()
//     {
//     }

//     public function custom_post_type()
//     {
//         $labels = array(
//             'name' => 'TestPlugin',
//             'singular_name' => 'Test',
//             'add_new' => 'Add New',
//             'add_new_item' => 'Add New Test',
//             'edit_item' => 'Edit Test',
//             'new_item' => 'New Test',
//             'view_item' => 'View Test',
//             'search_items' => 'Search TestPlugin',
//             'not_found' => 'No TestPlugin found',
//             'not_found_in_trash' => 'No TestPlugin found in trash',
//             'menu_name' => 'TestPlugin',
//         );

//         $args = array(
//             'labels' => $labels,
//             'public' => true,
//             'has_archive' => true,
//             'rewrite' => array('slug' => 'tests'),
//             'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
//             'taxonomies' => array('publication_category'),
//         );

//         register_post_type('publication', $args);
//     }


//     function settings_link($links) {
//         $setting_link = "<a href='admin.php?page=test_plug'> Settings </a>";
//         array_push($links, $setting_link);
//         return $links;
//     }
// }


// if (class_exists('TestPlugin')) {
//     $testPlugin = new TestPlugin();
//     $testPlugin->registerAssets();
// }


// // activation hook
// register_activation_hook(__FILE__, array($testPlugin, 'activate'));

// // deactivation hook
// register_deactivation_hook(__FILE__, array($testPlugin, 'deactivate'));
// // uninstallation hook