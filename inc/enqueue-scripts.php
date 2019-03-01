<?php

// add_action('wp_enqueue_scripts', 'default_adminjr_scripts');
// function default_adminjr_scripts() {
//
//
// }

add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');

function my_admin_theme_style() {

  wp_enqueue_style('my-admin-theme', plugins_url('../style/style.css', __FILE__));
  wp_enqueue_style('jquery_ui_css', plugins_url('../style/jquery-ui.min.css', __FILE__));

  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.3.1.min.js", array(), '3.3.1' );

  wp_enqueue_script("jquery");
  wp_enqueue_script("jquery-ui-sortable");
  wp_enqueue_script("jquery-ui-datepicker");

  wp_enqueue_script( 'admin_jr_admin_jizdniho_radu_js', plugins_url( '../js/admin_jizdniho_radu.js', __FILE__ ), array(), false, true );
  wp_enqueue_script( 'admin_jr_tabulka_jizdniho_radu_js', plugins_url( '../js/tabulka_jizdniho_radu.js', __FILE__ ), array(), false, true );
  wp_enqueue_script( 'admin_jr_main_js', plugins_url( '../js/main.js', __FILE__ ), array(), false, true );
}
