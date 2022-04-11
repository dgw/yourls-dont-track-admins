# Don't Track Admins

a plugin for YOURLS by dgw

with contributions by fenuz and ozh

## Description

*Don't Track Admins* checks to see if the user requesting a link is logged in to
the YOURLS installation. If so, it short-circuits the click-tracking and
redirect logging routines in YOURLS' redirect handler.

## README Note

This README is a work in progress, in the same vein as the plugin. 

## Requirements

* A YOURLS instance
    * All the server software required to run YOURLS
    * At least version 1.7.1 of YOURLS

That's it. *Don't Track Admins* doesn't need anything fancy in your server
configuration.

## Installation

Two easy ways of installing *Don't Track Admins* on your YOURLS site: Git or FTP

### Via Git (simplest)

1. SSH into your server and `cd [YOURLS_ROOT]/user/plugins`
2. `git clone https://github.com/dgw/yourls-dont-track-admins.git dont-track-admins`
3. Activate the plugin from the YOURLS dashboard

Updating is also really simple: Just `git pull origin` to update the plugin.

### Via FTP (more leg work)

1. Download [the latest *Don't Track Admins* release](https://github.com/dgw/yourls-dont-track-admins/releases/latest)
2. Unzip the archive
3. Upload the plugin folder to `[YOURLS_ROOT]/user/plugins`
4. Activate the plugin from YOURLS' dashboard

## Changelog

* v0.1 (2011-09-18):
    * Initial test version
* v1.0 (2011-09-19):
    * Catch other tracking function too
    * "Release"
* v1.1 (not officially released)
    * Restructured plugin/hooks
* v1.2 (2014-05-31)
    * Add hooks after other plugins loaded
* v1.3 (2022-04-11)
    * Updates & tweaks to work with current YOURLS (1.7/1.8)

## License

The *Don't Track Admins* plugin is released under the GNU General Public License,
version 3 (GPLv3). Complete license text can be found in the "COPYING" file.
