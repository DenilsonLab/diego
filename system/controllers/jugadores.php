<?php 

/**
 * 
 */
class JugadoresController
{
	
	static public function insertarJugadorController(){
		if (isset($_POST["name"]) && 
			isset($_POST["last-name"])  && 
			isset($_POST["cin"]) && 
			isset($_POST["birthday"]) && 
			isset($_POST["register-number"]) && 
			isset($_POST["club"])
		) {
			$nombre = $_POST["name"];
			$last_name    = $_POST["last-name"];
			$cin 	= $_POST["cin"];
			$birthday = $_POST["birthday"];
			$register_number = $_POST["register-number"];
			$club = 	$_POST["club"];

			if (empty($nombre )    		OR
				empty($last_name) 		OR
				empty($cin)     		OR
				empty($birthday)		OR
				empty($register_number) OR
				empty($club ) )
			{
				echo ' <div class="alert alert-danger error">
  							<strong>ERROR</strong> Llene todos los campos correctamente.
						</div>';	
			}else{
				$insertar = JugadoresModel::insertarJugadorModel("jugador", $nombre, $last_name, $cin, $birthday, $register_number, $club );

				if ($insertar == "ok") {
					echo "<script>location.href='jugadores';</script>";;
				}else{
					echo $insertar;
				}	
			}
		}
	}
	static public function mostrarJugadoresController(){

		$respuesta = JugadoresModel::mostrarJugadoresModel("jugador");

		return $respuesta;
	}
	static public function mostrarJugadoresForIdController($id){

		$respuesta = JugadoresModel::mostrarJugadoresForIdModel("jugador", $id);

		return $respuesta;
	}		

}
?>