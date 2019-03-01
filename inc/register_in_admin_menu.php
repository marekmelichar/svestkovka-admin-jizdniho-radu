<?php

add_action( 'admin_menu', 'adminjr_menu' );

function adminjr_menu() {
	add_menu_page( 'Administrace jízdního řádu', 'Administrace jízdního řádu', 'manage_options', 'adminjr/adminjr-admin-page.php', 'adminjr_menu_admin_page_func', 'dashicons-tickets', 6  );
  add_submenu_page( 'adminjr/adminjr-admin-page.php', 'Tabulka jizdniho radu', 'Tabulka jizdniho radu', 'manage_options', 'adminjr/adminjr-admin-sub-page.php', 'adminjr_admin_sub_page_tabulka_func' );
}
