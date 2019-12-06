<?php  

class Ruta{

	static public function rutaController(){

		if(isset($_GET["action"])){

			$enlaces = $_GET["action"];
			$enlaces = explode("/", $enlaces);
			$enlaces = $enlaces[0];


		}

		else{

			$enlaces = "index";

		}

		$respuesta = RutaModels::rutaModel($enlaces);

		include $respuesta;

	}


}