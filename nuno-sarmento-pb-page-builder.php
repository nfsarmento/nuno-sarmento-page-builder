<?php
/*
Plugin Name: Nuno Sarmento Page Builder
Description: Custom WordPress Page Builder Plugin.
Plugin URI: https://www.nuno-sarmento.com
Version: 1.0.1
Author: Nuno Sarmento
Author URI: https://www.nuno-sarmento.com
License: GPL2
*/
/*
Copyright 2017  Nuno Sarmento  (email : nfsarmento@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/* Do not access this file directly */
defined('ABSPATH') or die('°_°’');

/* ------------------------------------------
// Constants ---------------------------
--------------------------------------------- */

/* Set plugin version constant. */

if( ! defined( 'NUNO_SARMENTO_TEND_PBBASE_VERSION' ) ) {
	define( 'NUNO_SARMENTO_TEND_PBBASE_VERSION', '1.0.1' );
}

/* Set plugin name. */

if( ! defined( 'NUNO_SARMENTO_TEND_PBNAME' ) ) {
	define( 'NUNO_SARMENTO_TEND_PBNAME', 'Nuno Sarmento Page Builder' );
}

/* Set constant path to the plugin directory. */

if ( ! defined( 'NUNO_SARMENTO_TEND_PBBASE_PATH' ) ) {
	define( 'NUNO_SARMENTO_TEND_PBBASE_PATH', plugin_dir_path( __FILE__ ) );
}

/* Set the constant path to the plugin directory URI. */

if ( ! defined( 'NUNO_SARMENTO_TEND_PBBASE_URI' ) ) {
	define( 'NUNO_SARMENTO_TEND_PBBASE_URI', plugin_dir_url( __FILE__ ) );
}

/* ------------------------------------------
// i18n ----------------------------
--------------------------------------------- */

load_plugin_textdomain( 'nuno-sarmento-pb-page-builder', false, basename( dirname( __FILE__ ) ) . '/languages' );


/* ------------------------------------------
// Includes ---------------------------
--------------------------------------------- */

/* Functions */
if ( ! @include( 'nuno-sarmento-pb-functions.php' ) ) {
	require_once( NUNO_SARMENTO_TEND_PBBASE_PATH . 'includes/nuno-sarmento-pb-functions.php' );
}

/* Page Builder */

if( is_admin() ){
	require_once( NUNO_SARMENTO_TEND_PBBASE_PATH . 'includes/nuno-sarmento-pb-page-builder.php' );
}

/* Page Builder */

if ( ! @include( 'nuno-sarmento-pb-front-end.php' ) ) {
	require_once( NUNO_SARMENTO_TEND_PBBASE_PATH . 'includes/nuno-sarmento-pb-front-end.php' );
}

/* Functions */

if ( ! @include( 'nuno-sarmento-pb-settings.php' ) ) {
	require_once( NUNO_SARMENTO_TEND_PBBASE_PATH . 'admin/nuno-sarmento-pb-settings.php' );
}
