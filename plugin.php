<?php
/*
Plugin Name: Don't Track Admins
Plugin URI: https://github.com/dgw/yourls-dont-track-admins
Description: Short-circuits the yourls_update_clicks() function if the user requesting the link is logged in to YOURLS.
Version: 0.1
Author: dgw
Author URI: http://technobabbl.es/
*/

/* Short out click tracker for logged-in users
 *
 * @uses filter shunt_update_clicks
 *
 * We're going to hook into this filter and modify this value.
 */
 
function dgw_dont_track_admins( $shortcircuit = false ) {
	if( yourls_is_valid_user() === true ) { // If user is logged in to yourls...
		$shortcircuit = true; // ...we want to short-circuit the click updater.
	} else {
		$shortcircuit = false; // Just in case
	}
	return $shortcircuit; // true (if user is logged in) or false (if not)
}

/* Filter the tracking routines */
# first the click tracker
yourls_add_filter( 'shunt_update_clicks', 'dgw_dont_track_admins' );
# then the detailed logger
yourls_add_filter( 'shunt_log_redirect', 'dgw_dont_track_admins' );
