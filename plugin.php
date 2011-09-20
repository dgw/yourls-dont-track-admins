<?php
/*
Plugin Name: Don't Track Admins
Plugin URI: https://github.com/dgw/yourls-dont-track-admins
Description: Short-circuits the yourls_update_clicks() function if the user requesting the link is logged in to YOURLS.
Version: 1.1
Author: dgw
Author URI: http://technobabbl.es/
*/

/**
 * yourls - Don't Track Admins plugin
 * Copyright (C) 2011 by dgw
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General
 * Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>.
 **/

/* Short out click tracker for logged-in users
 *
 * @uses filter shunt_update_clicks
 *
 * We're going to hook into this filter and modify this value.
 */
 
function dgw_dont_track_admins( $unusedvar ) { // If we've gotten here...
    return true; // ...we want to short-circuit the click updater.
}

/* If user is logged in to yourls... */
if( yourls_is_valid_user() === true ) {
    /* ...then filter the tracking routines */
    # first the click tracker
    yourls_add_filter( 'shunt_update_clicks', 'dgw_dont_track_admins' );
    # then the detailed logger
    yourls_add_filter( 'shunt_log_redirect', 'dgw_dont_track_admins' );
}