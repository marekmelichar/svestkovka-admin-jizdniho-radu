<?php

// AJAX DEFS

add_action( 'wp_ajax_query_stanice', 'query_stanice' );
function query_stanice() {

  global $wpdb;

  // $queryStanice = "SELECT sta.nazevStanice, sta.id FROM stanice sta
  //                   WHERE sta.zastavovat
  //                   ORDER BY sta.poradiStanice;";

  $idSpecSpoje = $_GET['idSpecSpoje'];

  // idSpecSpoje z tabulky jizdniRad === 106
  $queryStanice = "CALL dejStaniceOdjezdyJizRad('2019-12-15', $idSpecSpoje, @aa);";

  $result_stanice = $wpdb->get_results($queryStanice);
  // var_dump($result_stanice);

  $response = array();

  foreach ($result_stanice as $item) {
    // var_dump($item);
    $response[] = array(
      // 'id' => $item->id,
      // 'nazevStanice' => $item->nazevStanice
      // 'item' => $item,
      'casOdjezdu' => $item->casOdjezdu,
      'idStanice' => $item->idStanice,
      'nazevStanice' => $item->nazevStanice,
      'poznamky' => $item->poznamky
    );
  }

  echo json_encode($response);

	wp_die(); // this is required to terminate immediately and return a proper response
}



add_action( 'wp_ajax_query_spoje', 'query_spoje' );
function query_spoje() {

  global $wpdb;

  // $querySpoje = "SELECT spoj.idSpecSpoje, spoj.cisloSpoje, spoj.poznamky  FROM  spec_spoje spoj
  //                 WHERE spoj.typDne = 2 and spoj.smer = 1
  //                 ORDER BY spoj.poradiVJizdRadu;";

  $querySpoje = "CALL dejPlatneSpoje ('2019-12-15',@aa);";

  $result_spoje = $wpdb->get_results($querySpoje);

  $response = array();

  foreach ($result_spoje as $item) {
    $response[] = array(
      // 'idSpecSpoje' => $item->idSpecSpoje,
      // 'cisloSpoje' => $item->cisloSpoje,
      // 'poznamky' => $item->poznamky
      // 'item' => $item
      'cisloSpoje' => $item->cisloSpoje,
      'idSpecSpoje' => $item->idSpecSpoje,
      'poznamky' => $item->poznamky,
      'smer' => $item->smer,
      'typDne' => $item->typDne
    );
  }

  echo json_encode($response);

	wp_die(); // this is required to terminate immediately and return a proper response
}



// add_action( 'wp_ajax_query_jRad', 'query_jRad' );
// function query_jRad() {

//   global $wpdb;

//   $querySpoje = "SELECT  jRad.casOdjezdu, jRad.idStanice, jRad.idSpecSpoje FROM jizdniRad jRad
//                 WHERE jRad.idSpecSpoje = 106  AND jRad.poznamky <> 'Nejede'
//                 ORDER BY casOdjezdu;";

//   $result_spoje = $wpdb->get_results($querySpoje);

//   $response = array();

//   foreach ($result_spoje as $item) {
//     $response[] = array(
//       'casOdjezdu' => $item->casOdjezdu,
//       'idStanice' => $item->idStanice,
//       'idSpecSpoje' => $item->idSpecSpoje
//     );
//   }

//   echo json_encode($response);

// 	wp_die(); // this is required to terminate immediately and return a proper response
// }







function adminjr_admin_sub_page_tabulka_func() { ?>
  <div id="tabulka_jizdniho_radu" class="wrap">
		<h1>Tabulka jízdního řádu</h1>
    
    <div class="tables">
      <div>
        <span class="heading">smer Lovosice</span>
        <select id="smer_lovosice">
          <option>Vyberte</option>
        </select>
        <table id="table_do_lovosic">
          <thead></thead>
          <tbody></tbody>
        </table>
      </div>

      <div>
      <span class="heading">smer Most</span>
        <select id="smer_most">
          <option>Vyberte</option>
        </select>
        <table id="table_do_mostu">
          <thead></thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
    
  </div>

<?php } ?>
