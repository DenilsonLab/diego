
<?php 

/**
 * 
 */
class LigaController
{
	
	static public function insertarLigaController(){
		if (isset($_POST["ligaNombre"]) && isset($_POST["ligaRuc"]) && isset($_SESSION["id"])) {
			$liga_name = $_POST["ligaNombre"];
			$liga_ruc = $_POST["ligaRuc"];
			if (empty($liga_name) OR
				empty($liga_ruc)) {
				echo ' <div class="alert alert-danger error">
  							<strong>ERROR</strong> Llene todos los campos correctamente.
						</div>';
			}else{
				$insertar = LigaModel::insertarLigaModel("liga", $liga_name, $liga_ruc);
				if ($insertar == "ok") {
					echo "<script>location.href='ligas';</script>";;
				}else if ($insertar = 'existe') {
					echo '<script>
  							alert("ERROR. Esa liga ya existe");
						  </script>';				}
				else{
					echo '<div class="alert alert-danger error">
  							<strong>ERROR</strong> Ocurrio un error al guardar los Datos.
						  </div>';
				}
			}
		}
	}
	static public function mostrarLigasController(){

		$respuesta = LigaModel::mostrarLigasModel("liga");

		return $respuesta;
	}	

}
