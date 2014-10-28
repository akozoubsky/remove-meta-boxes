<?php
/**
 * Plugin Name: Remove Meta Boxes
 * Plugin URI: https://github.com/akozoubsky/remove-meta-boxes
 * Description: Remove itens from WP Meta Boxes.
 * Version: 0.0.1
 * Author: Alexandre Kozoubsky
 * Author URI: http://alexandrekozoubsky.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 * 
 * @package    RemoveMetaBoxes
 * @version    0.0.1
 * @author     Alexandre Kozoubsky <alexandre@alexandrekozoubsky.com>
 * @copyright  Copyright (c) 2014 - 2015, Alexandre Kozoubsky
 * @link       https://github.com/akozoubsky/remove-meta-boxes
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Remove widgets from the dashboard screen.
 */

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

function remove_dashboard_widgets() {

	// Remove meta boxes from Wordpress dashboard for all users
	remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
	remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
		
	if ( ! current_user_can( 'activate_plugins' ) ) {
	
		// Globalize the metaboxes array, this holds all the widgets for wp-admin
		global $wp_meta_boxes;
     
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['photocrati_admin_dashboard_widget']); 
    
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
		/* remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); */ // Recent Comments
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
		// use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.    
    
	}
	 
}

/**
 * Remove meta box from posts.
 * @link http://justintadlock.com/archives/2011/04/13/uncluttering-the-post-editing-screen-in-wordpress
 * @link http://codex.wordpress.org/Function_Reference/remove_meta_box
 */
 
add_action( 'add_meta_boxes', 'remove_post_meta_boxes' );

function remove_post_meta_boxes() {

	if ( ! current_user_can( 'activate_plugins' ) ) {
	
		/* Publish meta box. */
		/* remove_meta_box( 'submitdiv', 'post', 'normal' ); */

		/* Category meta box. */
		/* remove_meta_box( 'categorydiv', 'post', 'side' ); */
		
		/* Featured image meta box. */
		/* remove_meta_box( 'postimagediv', 'post', 'side' ); */
			
		/* Excerpt meta box. */
		remove_meta_box( 'postexcerpt', 'post', 'normal' );
				
		/* Comments status */
		remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' ); 
						
		/* Comments meta box. */
		remove_meta_box( 'commentsdiv', 'post', 'normal' );

		/* Revisions meta box. */
		remove_meta_box( 'revisionsdiv', 'post', 'normal' );

		/* Author meta box. */
		/* remove_meta_box( 'authordiv', 'post', 'normal' ); */

		/* Slug meta box. */
		remove_meta_box( 'slugdiv', 'post', 'normal' );

		/* Post tags meta box. */
		remove_meta_box( 'tagsdiv-post_tag', 'post', 'side' ); 

		/* Post format meta box. */
		remove_meta_box( 'formatdiv', 'post', 'normal' );

		/* Trackbacks meta box. */
		remove_meta_box( 'trackbacksdiv', 'post', 'normal' );

		/* Custom fields meta box. */
		remove_meta_box( 'postcustom', 'post', 'normal' );

		/* Comment status meta box. */
		remove_meta_box( 'commentstatusdiv', 'post', 'normal' );

		remove_meta_box('sqpt-meta-tags', 'post', 'normal');	
		remove_meta_box('linktargetdiv', 'link', 'normal');
		remove_meta_box('linkxfndiv', 'link', 'normal');
		remove_meta_box('linkadvanceddiv', 'link', 'normal');
	
	
	}
}

/**
 * Remove meta box from pages.
 * @link http://justintadlock.com/archives/2011/04/13/uncluttering-the-post-editing-screen-in-wordpress
 * @link http://codex.wordpress.org/Function_Reference/remove_meta_box
 */

add_action( 'add_meta_boxes', 'remove_page_meta_boxes' );

function remove_page_meta_boxes() {

	if ( ! current_user_can( 'activate_plugins' ) ) {
		
		/* Publish meta box. */
		remove_meta_box( 'submitdiv', 'page', 'normal' ); 
				
		/* Page attributes meta box. */
		remove_meta_box( 'pageparentdiv', 'page', 'side' );

		/* Excerpt meta box. */
		remove_meta_box( 'postexcerpt' , 'page' , 'normal' ); 
	
		/* Comments status */
		remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); 
	
		/* Comments meta box. */
		remove_meta_box( 'commentsdiv', 'page', 'normal' );
			
		/* Revisions meta box. */
		remove_meta_box( 'revisionsdiv', 'page', 'normal' );
				
		/* Slug meta box. */
		remove_meta_box( 'slugdiv', 'page', 'normal' );
							
		/* Trackbacks meta box. */
		remove_meta_box( 'trackbacksdiv', 'page', 'normal' );
					
		/* Custom fields meta box. */
		remove_meta_box( 'postcustom', 'page', 'normal' );
			
	}
}
?>
