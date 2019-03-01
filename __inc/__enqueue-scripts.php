<?php

add_action('wp_enqueue_scripts', 'default_adminjr_scripts');
function default_adminjr_scripts() {

  // CSS

  // wp_register_style( 'leaflet-style', 'https://unpkg.com/leaflet@1.3.4/dist/leaflet.css' );
  // wp_enqueue_style( 'leaflet-style' );

  // wp_register_style( 'admin_jr_style', plugins_url( '../app/style/admin_jr_style.css', __FILE__ ) );

  // wp_register_style( 'jquery_ui_style', plugins_url( '../style/jquery-ui.min.css', __FILE__ ) );
  // wp_enqueue_style( 'jquery_ui_style' );

  // wp_register_style( 'jquery_ui_theme_style', plugins_url( '../style/jquery-ui.theme.min.css', __FILE__ ) );
  // wp_enqueue_style( 'jquery_ui_theme_style' );

  wp_register_style( 'admin_jr_style', plugins_url( '../style/style.css', __FILE__ ) );
  wp_enqueue_style( 'admin_jr_style' );


  // JS

  // wp_register_script( 'leaflet-js', 'https://unpkg.com/leaflet@1.3.4/dist/leaflet.js', null, null, true );
  // wp_enqueue_script( 'leaflet-js' );

  // wp_register_script( 'socket-js', 'https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js' );
  // wp_enqueue_script( 'socket-js' );

  // wp_register_script( 'jquery_ui-js', plugins_url( '../js/jquery-ui.min.js', __FILE__ ) );
  // wp_enqueue_script( 'jquery_ui-js' );

  // wp_enqueue_script("jquery-effects-core");
  wp_enqueue_script("jquery-ui-sortable");

  // wp_register_script( 'admin_jr_js', plugins_url( '../app/scripts/main.js', __FILE__ ) );
  // wp_register_script( 'admin_jr_js', plugins_url( '../js/main.js', __FILE__ ) );
  wp_enqueue_script( 'admin_jr_js', plugins_url( '../js/main.js', __FILE__ ), array( 'jquery' ), false, true );

}
