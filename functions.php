<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

$dir = plugin_dir_path( __FILE__ );

/**
 * Shortcodes
 */
// require_once $dir . '/inc/shortcode.php';

/**
 * Administrace jízdního řádu
 */



/**
 * register_in_admin_menu
 */
require_once $dir . '/inc/register_in_admin_menu.php';

/**
 * Scripts and Styles
 */
require_once $dir . '/inc/enqueue-scripts.php';






/**
 * Admin SPOJU
 */
require_once $dir . '/pages/admin_jizdniho_radu.php';

/**
 * Admin TABULKA
 */
require_once $dir . '/pages/tabulka_jizdniho_radu.php';
