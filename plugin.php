<?php
/*
Plugin Name: Don't Track Admins
Plugin URI: http://technobabbl.es/yourls/dont-track-admins/
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
 
yourls_add_filter( 'shunt_update_clicks', 'dgw_dont_track_admins' );
/* This says: when filter 'shunt_update_clicks' is triggered, send its value to function 'dgw_dont_track_admins'
 * and use what this function will return.
 */
 
function dgw_dont_track_admins( $pre = false ) {
	if( yourls_is_valid_user() === true ) { // If user is logged in to yourls...
		$pre = true; // ...we want to short-circuit the click updater.
	} else {
		$pre = false; // Just in case
	}
	return $pre; // true (if user is logged in) or false (if not)
}

