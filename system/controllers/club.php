
<?php 

/**
 * 
 */
class ClubController
{
	
	static public function insertarClubController(){
		if (isset($_POST["code"]) && isset($_POST["ruc"]) && isset($_POST["name"]) && isset($_POST["direccion"]) && isset($_POST["liga"]) && isset($_SESSION["id"])) {

			$club_code = $_POST["code"];
			$club_ruc = $_POST["ruc"];
			$club_name = $_POST["name"];

			$club_direccion = $_POST["direccion"];
			$club_liga = $_POST["liga"];

			
			if (empty($club_code) OR
				empty($club_ruc)  OR 
				empty($club_name) OR
				empty($club_liga)) {
				echo ' <div class="alert alert-danger error">
  							<strong>ERROR</strong> Llene todos los campos correctamente.
						</div>';
			}else{
				$insertar = ClubModel::insertarClubModel("club", $club_code, $club_ruc, $club_name, $club_direccion, $club_liga);
				if ($insertar == "ok") {
					echo "<script>location.href='clubs';</script>";;
				}else{
					echo '<div class="alert alert-danger error">
  							<strong>ERROR</strong> Ocurrio un error al guardar los Datos.
						  </div>';
				}
			}
		}
	}
	static public function mostrarClubController(){

		$respuesta = ClubModel::mostrarClubModel("club");

		return $respuesta;
	}	

}
