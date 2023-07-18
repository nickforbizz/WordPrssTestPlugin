<?php

/**
 * Trigger on Plugin uninstall
 * @package TestPlugin
 */

if ( ! defined( 'WP_UNISTALL_PLUGIN' ) ) {
    die;
}

// Clear DB
// $Publications = get_posts( array( 'post_type' => 'Publications', 'numberposts' => -1 ) );
// foreach ($Publications as $pub) {
//     wp_delete_post( $pub->id, true );
// }

// Clear DB via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts where post_type = 'Publications'" );
$wpdb->query( "DELETE FROM wp_postmeta where post_id not in (SELECT id from wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships where object_id not in (SELECT id from wp_posts)" );