<?php  
require_once "../models/tmp.php";

if (isset($_POST["mostrar"])) {
	if ($_POST["mostrar"] == "get_tmp") {
		$return = TmpModel::verTmpModel("tmp");

		
		$return = json_encode($return);
		echo $return;
	}

	
}
if (isset($_POST["eliminar"])) {
		$id = $_POST["eliminar"];
		$return = TmpModel::borrarTmpPorIdModel($id);

		echo $return;

	
}
?>