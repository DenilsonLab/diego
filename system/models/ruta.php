<?php

class RutaModels{

	static public function rutaModel($enlaces){

		if($enlaces == "inicio" OR
           $enlaces == "jugadores" OR 
           $enlaces == "ligas" OR
           $enlaces == "clubs" OR
           $enlaces == "clientes" OR
           $enlaces == "aranceles" OR
           $enlaces == "ingreso" OR
           $enlaces == "salir"  
       ){

			$module = "views/modules/".$enlaces.".php";
		}	

		else if($enlaces == "index"){
			$module = "views/modules/inicio.php";
		}else{
			$module = "views/modules/inicio.php";
		}
		return $module;

	}


}