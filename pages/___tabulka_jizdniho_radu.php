<?php

// AJAX DEFS

add_action( 'wp_ajax_query_stanice', 'query_stanice' );
function query_stanice() {

  global $wpdb;

  // $smer = $_POST['select_direction_value'];
  // $date = $_POST['date'];

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
  // echo $response;

	wp_die(); // this is required to terminate immediately and return a proper response
}



add_action( 'wp_ajax_query_spoje', 'query_spoje' );
function query_spoje() {

  global $wpdb;

  // $smer = $_POST['select_direction_value'];
  // $date = $_POST['date'];

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
  // echo $response;

	wp_die(); // this is required to terminate immediately and return a proper response
}



add_action( 'wp_ajax_query_jRad', 'query_jRad' );
function query_jRad() {

  global $wpdb;

  // $smer = $_POST['select_direction_value'];
  // $date = $_POST['date'];

  $querySpoje = "SELECT  jRad.casOdjezdu, jRad.idStanice, jRad.idSpecSpoje FROM jizdniRad jRad
                WHERE jRad.idSpecSpoje = 1  AND jRad.poznamky <> 'Nejede'
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
  // echo $response;

	wp_die(); // this is required to terminate immediately and return a proper response
}















function adminjr_admin_sub_page_tabulka_func() { ?>

  <?php

  global $wpdb;

  $stanice = "SELECT sta.nazevStanice, sta.id FROM stanice sta
                WHERE sta.zastavovat
                ORDER BY sta.poradiStanice;";
  $result_stanice = $wpdb->get_results($stanice);


  $spoje = "SELECT spoj.idSpecSpoje, spoj.cisloSpoje, spoj.poznamky  FROM  spec_spoje spoj
                  WHERE spoj.typDne = 2 and spoj.smer = 1
                  ORDER BY spoj.poradiVJizdRadu;";
  $result_spoje = $wpdb->get_results($spoje);


  $jRad = "SELECT  jRad.casOdjezdu, jRad.idStanice, jRad.idSpecSpoje FROM jizdniRad jRad
            WHERE jRad.idSpecSpoje = 1  AND jRad.poznamky <> 'Nejede'
            ORDER BY casOdjezdu;";
  $result_jRad = $wpdb->get_results($jRad);




  // var_dump($result_jRad);

  $sloupec = 1;	 // tj. druhy sloupec tabulky
  $radek = 1;	 // tj. druhy radek tabulky

  ?>

  <div id="tabulka_jizdniho_radu" class="wrap">
		<h1>Tabulka jízdního řádu</h1>

    <table>

      <thead>
        <tr>
          <th></th>
          <?php foreach ($result_spoje as $spoje) { ?>
            <th>
              <?php echo $spoje->cisloSpoje . '<br/>'; ?>
              <?php echo $spoje->poznamky; ?>
              <button type="button" name="button">Save</button>
            </th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result_spoje as $spoje) { ?>
          <?php foreach ($result_stanice as $stanice) { ?>
            <tr>
              <?php foreach ($result_jRad as $jRad) { ?>
                <?php if (($spoje->idSpecSpoje == $jRad->idSpecSpoje ) && ( $stanice->id == $jRad->idStanice ) ) { ?>
                  <td><?php echo $stanice->nazevStanice; ?> ++</td>
                  <td><?php echo $jRad->casOdjezdu; ?></td>
                <?php } ?>
              <?php } ?>
            </tr>
          <?php } ?>
        <?php } ?>
      </tbody>

    </table>
  </div>

<?php } ?>
