<?php 

/**
 * 
 *//*
class JugadoresController
{
	
	static public function insertarJugador(){
		if (isset($_POST["nombreA"]) && 
			isset($_POST["urlA"])  && 
			isset($_POST["userA"]) && 
			isset($_POST["passA"]) && 
			isset($_POST["categoriaA"]) && 
			isset($_POST["descripcionA"])
		) {
			$nombre = $_POST["nombreA"];
			$url    = $_POST["urlA"];
			$pass 	= $_POST["passA"];
			$categoria = $_POST["categoriaA"];
			$user   = $_POST["userA"];
			$descripcion = 	$_POST["descripcionA"];

			if ($nombre    == '' OR
				$url       == '' OR
				$pass      == '' OR
				$categoria == '' OR
				$user      == '' OR
				$descripcion== '' ) 
			{
				echo ' <div class="alert alert-danger error">
  							<strong>ERROR</strong> Llene todos los campos correctamente.
						</div>';	
			}else{
				$insertar = InsertarDatosModel::insertarAccesosModel("accesos", $nombre, $descripcion, $url, $user, $pass, $categoria );

				if ($insertar == "ok") {
					echo "<script>location.href='insertarAcceso';</script>";;
				}else{
					echo $insertar;
				}	
			}
		}
	}


}*/
?>