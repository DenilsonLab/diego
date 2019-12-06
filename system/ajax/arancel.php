<?php  
require_once "../models/aranceles.php";
require_once "../models/tmp.php";

if (isset($_POST["arancel_id"])) {//Validamos si los datos enviados por ajax existen
	$id = $_POST['arancel_id']; 
	$cantidad = $_POST["cantidad"];
	$arancel = ArancelesModel::mostrarArancelForIdModel("aranceles", $id); //Traemos el arancel con el id correspondiente para guardar en una tabla temporal
    $precio_unit = $arancel[0]['precio']; //Tomamos el precio unitario
    $precio_final = $precio_unit * $cantidad; //Multiplicamos para el precio final

	


	$guardar_arancel_tmp = TmpModel::guardarTmp("tmp", $id, $cantidad, $precio_unit); //Guardamos el tmp 
    $last_tmp = TmpModel::mostrarUltimoTmp("tmp"); //traemos el ultimo tmp registrado

    $last_tmp = json_encode($last_tmp); //codificamos como json
	echo $last_tmp; //le contestamos a ajax
}
?>