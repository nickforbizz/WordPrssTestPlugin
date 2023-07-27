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
    public $sub_pages = array();



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



    /**
     * AddSubPages
     *
     * @param  array $subpages
     * @return void
     */
    public function AddSubPages(array $subpages) {
        $this->sub_pages =  array_merge( $this->sub_pages, $subpages );
        return $this;
    }


    /**
     * AddSubPage
     *
     * @param  array $pages
     * @return void
     */
    public function withSubPage( string $title = null ) {
        if( empty($this->pages) ){
            return $this;
        }
        // exit($title);

        $page = $this->pages[0];
        $subpage = array( array(
            'parent_slug' => $page['menu_slug'], 
            'page_title' => $page['page_title'], 
            'menu_title' => $title ? $title : $page['menu_title'], 
            'capability' => $page['capability'], 
            'menu_slug' => $page['menu_slug'], 
            'callback' => $page['callback'], 
        ) );

        $this->sub_pages = $subpage;

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



        // subpage
        foreach ($this->sub_pages as $page) {
            add_submenu_page( 
                $page['parent_slug'], 
                $page['page_title'], 
                $page['menu_title'], 
                $page['capability'], 
                $page['menu_slug'], 
                $page['callback'], 
            );
        }
    }
}
