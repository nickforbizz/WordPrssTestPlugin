<?php
/**
 * @package TestPlugin
 * 
 * SettingApi Class
 */

 namespace Inc\Api;

class SettingApi 
{
    public $pages = array();



    public function register(){
        if( !empty($this->pages) ){
            add_action( 'admin_menu', array($this, 'addAdminMenu') );
        }
    }


    /**
     * AddPages
     *
     * @param  array $pages
     * @return void
     */
    public function addPages(array $pages) {
        $this->pages = $pages;
        return $this;
    }


    public function addAdminMenu(){
        foreach ($this->pages as $page) {
            add_menu_page( 
                $page['page_title'], 
                $page['menu_title'], 
                $page['capability'], 
                $page['menu_slug'], 
                $page['callback'], 
                $page['icon_url'], 
                $page['position'], 
            );
        }
    }
}
