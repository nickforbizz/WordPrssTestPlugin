<?php

/**
 * @package TestPlugin
 * 
 * Activate Class
 */

 namespace Inc\Base;
 
class Activate{

    public static function activate(){
        flush_rewrite_rules();
    }

}