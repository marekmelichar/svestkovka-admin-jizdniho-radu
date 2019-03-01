<?php

// AJAX DEFS

add_action( 'wp_ajax_query_stanice', 'query_stanice' );
function query_stanice() {

  global $wpdb;

  $queryStanice = "SELECT sta.nazevStanice, sta.id FROM stanice sta
                    WHERE sta.zastavovat
                    ORDER BY sta.poradiStanice;";

  $result_stanice = $wpdb->get_results($queryStanice);

  $response = array();

  foreach ($result_stanice as $item) {
    $response[] = array(
      'id' => $item->id,
      'nazevStanice' => $item->nazevStanice
    );
  }

  echo json_encode($response);

	wp_die(); // this is required to terminate immediately and return a proper response
}



add_action( 'wp_ajax_query_spoje', 'query_spoje' );
function query_spoje() {

  global $wpdb;

  $querySpoje = "SELECT spoj.idSpecSpoje, spoj.cisloSpoje, spoj.poznamky  FROM  spec_spoje spoj
                  WHERE spoj.typDne = 2 and spoj.smer = 1
                  ORDER BY spoj.poradiVJizdRadu;";

  $result_spoje = $wpdb->get_results($querySpoje);

  $response = array();

  foreach ($result_spoje as $item) {
    $response[] = array(
      'idSpecSpoje' => $item->idSpecSpoje,
      'cisloSpoje' => $item->cisloSpoje,
      'poznamky' => $item->poznamky
    );
  }

  echo json_encode($response);

	wp_die(); // this is required to terminate immediately and return a proper response
}



add_action( 'wp_ajax_query_jRad', 'query_jRad' );
function query_jRad() {

  global $wpdb;

  $querySpoje = "SELECT  jRad.casOdjezdu, jRad.idStanice, jRad.idSpecSpoje FROM jizdniRad jRad
                WHERE jRad.idSpecSpoje = 106  AND jRad.poznamky <> 'Nejede'
                ORDER BY casOdjezdu;";

  $result_spoje = $wpdb->get_results($querySpoje);

  $response = array();

  foreach ($result_spoje as $item) {
    $response[] = array(
      'casOdjezdu' => $item->casOdjezdu,
      'idStanice' => $item->idStanice,
      'idSpecSpoje' => $item->idSpecSpoje
    );
  }

  echo json_encode($response);

	wp_die(); // this is required to terminate immediately and return a proper response
}







function adminjr_admin_sub_page_tabulka_func() { ?>
  <div id="tabulka_jizdniho_radu" class="wrap">
		<h1>Tabulka jízdního řádu</h1>
  </div>

<?php } ?>
