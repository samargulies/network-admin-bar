<?php
/*
Plugin Name: Network Admin Bar
Plugin URI: http://belabor.org/
Description: Add a Network Admin link to the Admin Bar
Version: 1.0
Author: Sam Margulies
*/
 
function network_admin_adminbar() {

	if( is_super_admin() ) {
	
		global $wp_admin_bar;
		
		// Remove the logout link so we can re-add it as the last item
		$wp_admin_bar->remove_menu('logout');
		
		// Network admin link under my account
		$wp_admin_bar->add_menu( array(
			'parent' => 'my-account-with-avatar',
			'id' => 'network-admin',
			'title' => __( 'Network Admin' ),
			'href' => network_admin_url()
		));
		
		// Sites sub-menu
		$wp_admin_bar->add_menu( array(
			'parent' => 'network-admin',
			'id' => 'network-admin-sites',
			'title' => __( 'Sites' ),
			'href' => network_admin_url('sites.php')
		));
		
		// Users sub-menu
		$wp_admin_bar->add_menu( array(
			'parent' => 'network-admin',
			'id' => 'network-admin-users',
			'title' => __( 'Users' ),
			'href' => network_admin_url('users.php')
		));
		
		// Themes sub-menu
		$wp_admin_bar->add_menu( array(
			'parent' => 'network-admin',
			'id' => 'network-admin-themes',
			'title' => __( 'Themes' ),
			'href' => network_admin_url('themes.php')
		));
		
		// Plugins sub-menu
		$wp_admin_bar->add_menu( array(
			'parent' => 'network-admin',
			'id' => 'network-admin-plugins',
			'title' => __( 'Plugins' ),
			'href' => network_admin_url('plugins.php')
		));
				
		// Finally, add the logout link back
		$wp_admin_bar->add_menu( array(
			'parent' => 'my-account-with-avatar',
			'id' => 'logout',
			'title' => __( 'Logout' ),
			'href' => wp_logout_url()
		));
	}
}
add_action( 'wp_before_admin_bar_render', 'network_admin_adminbar' );

?>