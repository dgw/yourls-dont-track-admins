<?php
/*
Plugin Name: Don't Track Admins
Plugin URI: https://github.com/dgw/yourls-dont-track-admins
Description: Don't count clicks on short URLs if user is logged in to the YOURLS installation
Version: 1.3
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

/* Initialize the filters only when a redirection to a short URL occurs */
yourls_add_action('redirect_shorturl', 'dgw_dont_track_admins_init');
function dgw_dont_track_admins_init() {
    /* If user is logged in to yourls... */
    if( yourls_is_valid_user() === true ) {
        /* ...then filter the tracking routines */
        # first the click tracker
        yourls_add_filter( 'shunt_update_clicks', 'yourls_return_true' );
        # then the detailed logger
        yourls_add_filter( 'shunt_log_redirect', 'yourls_return_true' );
    }
}
