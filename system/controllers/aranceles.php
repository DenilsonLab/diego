
<?php 

/**
 * 
 */
class ArancelesController
{
	
	static public function insertarArancelController(){
		if (isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_SESSION["id"])) {
			$descripcion = $_POST["descripcion"];
			$precio = $_POST["precio"];
			if (empty($descripcion) OR
				empty($precio)) {
				echo ' <div class="alert alert-danger error">
  							<strong>ERROR</strong> Llene todos los campos correctamente.
						</div>';
			}else{
				$insertar = ArancelesModel::insertarArancelModel("aranceles", $descripcion, $precio);
				if ($insertar == "ok") {
					echo "<script>location.href='aranceles';</script>";;
				}else{
					echo '<div class="alert alert-danger error">
  							<strong>ERROR</strong> Ocurrio un error al guardar los Datos.
						  </div>';
				}
			}
		}
	}
	static public function mostrarArancelController(){

		$respuesta = ArancelesModel::mostrarArancelModel("aranceles");

		return $respuesta;
	}	

}
