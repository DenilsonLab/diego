<?php 
require_once "../models/jugadores.php";
if (isset($_POST["eliminar"])) {
		$id = $_POST["eliminar"];
		$return = JugadoresModel::borrarJugadorPorIdModel($id);

		print_r($return) ;#$return;

	
}


?>