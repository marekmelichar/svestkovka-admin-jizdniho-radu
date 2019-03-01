<?php




add_action( 'wp_ajax_query_spoju_from_DB', 'query_spoju_from_DB' );
function query_spoju_from_DB() {

  global $wpdb;

  $smer = $_POST['select_direction_value'];
  $date = $_POST['date'];

  $querySpoju = "SELECT sp.cisloSpoje, sp.poznamky, sp.idSpecSpoje , sp.platnostOd, sp.platnostDo FROM spec_spoje sp
  WHERE sp.platnostOd >= $date AND  sp.platnostDo >= $date
  AND   sp.smer = $smer; ";

  $result_spoje = $wpdb->get_results($querySpoju);

  $response = array();

  foreach ($result_spoje as $item) {
    $response[] = array('idSpecSpoje' => $item->idSpecSpoje, 'cisloSpoje' => $item->cisloSpoje, 'poznamky' => $item->poznamky);
  }

  echo json_encode($response);
  // echo $response;

	wp_die(); // this is required to terminate immediately and return a proper response
}








add_action( 'wp_ajax_query_useky_from_DB', 'query_useky_from_DB' );
function query_useky_from_DB() {

  $idSpecSpoje = $_POST['idSpecSpoje'];

  global $wpdb;

  $query_useky = "SELECT sta1.nazevStanice AS pocatecni_stanice_useku, sta2.nazevStanice AS koncova_stanice_useku, trasa.PoradiUseku AS poradi_useku, spec_useku.idSpecUseku AS id_useku
  FROM `spec_useku`
  LEFT JOIN  stanice AS sta1 ON (sta1.id = spec_useku.idStanice1 )
  LEFT JOIN  stanice AS sta2 ON (sta2.id = spec_useku.idStanice2 )
  LEFT OUTER JOIN  spec_trasySpoje AS trasa ON (trasa.idSpecUseku = spec_useku.idSpecUseku AND trasa.idSpecSpoje = $idSpecSpoje)
  WHERE spec_useku.idSpecUseku > 0
  ORDER BY sta1.poradiStanice ASC";

  $result_useky = $wpdb->get_results($query_useky);

  // $smer = $_POST['select_direction_value'];
  // $date = $_POST['date'];
  //
  // $querySpoju = "SELECT sp.cisloSpoje, sp.poznamky, sp.idSpecSpoje , sp.platnostOd, sp.platnostDo FROM spec_spoje sp
  // WHERE sp.platnostOd >= $date AND  sp.platnostDo >= $date
  // AND   sp.smer = $smer; ";
  //
  // $result_spoje = $wpdb->get_results($querySpoju);
  //
  // $response = array();
  //
  // foreach ($result_spoje as $item) {
  //   $response[] = array('idSpecSpoje' => $item->idSpecSpoje, 'cisloSpoje' => $item->cisloSpoje, 'poznamky' => $item->poznamky);
  // }
  //
  // echo json_encode($response);
  // echo $response;

  echo json_encode($result_useky);

	wp_die(); // this is required to terminate immediately and return a proper response
}









function adminjr_menu_admin_page_func(){

  global $wpdb;

  // $query_useky = "SELECT sta1.nazevStanice AS pocatecni_stanice_useku, sta2.nazevStanice AS koncova_stanice_useku, trasa.PoradiUseku AS poradi_useku, spec_useku.idSpecUseku AS id_useku
  // FROM `spec_useku`
  // LEFT JOIN  stanice AS sta1 ON (sta1.id = spec_useku.idStanice1 )
  // LEFT JOIN  stanice AS sta2 ON (sta2.id = spec_useku.idStanice2 )
  // LEFT OUTER JOIN  spec_trasySpoje AS trasa ON (trasa.idSpecUseku = spec_useku.idSpecUseku AND trasa.idSpecSpoje = 2)
  // WHERE spec_useku.idSpecUseku > 0
  // ORDER BY sta1.poradiStanice ASC";
  //
  // $result_useky = $wpdb->get_results($query_useky);




  $query_direction = "SELECT * FROM ciselnik WHERE typCiselniku = 'smerDoMostu'";
  $result_direction = $wpdb->get_results($query_direction);
  // var_dump($result_direction);




  // $query_spoju = "SELECT sp.cisloSpoje, sp.poznamky, sp.idSpecSpoje , sp.platnostOd, sp.platnostDo FROM spec_spoje sp
  // WHERE sp.platnostOd >= '2010-01-01 00:00:00' AND  sp.platnostDo >= '2010-01-01 00:00:00'
  // AND   sp.smer = 1; ";
  // $result_spoju = $wpdb->get_results($query_spoju);
  // var_dump($result_spoju);

	?>
	<div class="wrap">
		<h1>Administrace úseků jízdního řádu</h1>

    <div class="select-direction">
      <h2>Vyberte smer</h2>
      <select id="select_direction" class="" name="">
        <option value="">---</option>

        <?php foreach ($result_direction as $instance) { ?>
          <option value="<?php echo $instance->hodnota ?>"><?php echo $instance->klic ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="select-date">
      <h2>Vyberte datum</h2>
      <input type="text" id="select_date" />
    </div>

    <div class="select-train">
      <h2>Vyberte vlak</h2>
      <select id="select_train" class="" name="">
        <option value="">---</option>
      </select>
    </div>

    <ul id="sortable_col_removed_items">
    </ul>

    <ul id="sortable_first_col">

    </ul>

    <!-- <div id="sortable_second_col">
      <label for="add">
        Add:
        <input id="add_input" type="text" name="add_input" value="">
        <button id="add" type="button" name="add">OK</button>
      </label>
    </div> -->

    <br style="clear:both" />

    <button id="save" type="button" name="save">Save</button>
	</div>

	<?php
}










add_action( 'wp_ajax_delete_usek_from_DB', 'delete_usek_from_DB' );
// add_action( 'wp_ajax_nopriv_delete_usek_from_DB', 'delete_usek_from_DB' );

function delete_usek_from_DB() {

  global $wpdb;


  $data = $_POST['data'];

  $index = 1;

  // $wpdb->query('START TRANSACTION');

  // $resDelete = "DELETE from spec_trasySpoje where idSpecSpoje = 2";
  //
  // $result_delete = $wpdb->get_results($resDelete);

  // var_dump($result_delete);
  var_dump($data);

  foreach ($data as $item) {
    $idSpecSpoje = $item["idSpecSpoje"];

    $resDelete = "DELETE from spec_trasySpoje where idSpecSpoje = $idSpecSpoje";
    $result_delete = $wpdb->get_results($resDelete);
  }

  foreach ($data as $item) {

    $idUseku = $item["idUseku"];
    $idSpecSpoje = $item["idSpecSpoje"];

    // $resDelete = "DELETE from spec_trasySpoje where idSpecSpoje = $idSpecSpoje";
    // $result_delete = $wpdb->get_results($resDelete);

    $resInsert = "INSERT INTO `spec_trasySpoje` (`idSpecSpoje`, `idSpecUseku`, `PoradiUseku`) VALUES ( $idSpecSpoje, $idUseku, $index*10)";
    $result_insert = $wpdb->get_results($resInsert);

    $index++;
  }

	wp_die(); // this is required to terminate immediately and return a proper response
}
