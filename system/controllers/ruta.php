<?php  

class Ruta{

	static public function rutaController(){

		if(isset($_GET["action"])){

			$enlaces = $_GET["action"];

		}

		else{

			$enlaces = "index";

		}

		$respuesta = RutaModels::rutaModel($enlaces);

		include $respuesta;

	}


}