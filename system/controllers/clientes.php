<?php 

/**
 * 
 */
class ClientesController
{
	
	static public function insertarClienteController(){
		if (isset($_POST["client-name"]) && 
			isset($_POST["client-last-name"])  && 
			isset($_POST["client-address"]) && 
			isset($_POST["client-phone"]) && 
			isset($_POST["client-ruc"])
		) {
			$name = $_POST["client-name"];
			$last_name    = $_POST["client-last-name"];
			$address 	= $_POST["client-address"];
			$phone = $_POST["client-phone"];
			$ruc = $_POST["client-ruc"];
			if (empty($name )    		OR
				empty($last_name) 		OR
				empty($address)     		OR
				empty($phone)		OR
				empty($ruc) )
			{
				echo ' <div class="alert alert-danger error">
  							<strong>ERROR</strong> Llene todos los campos correctamente.
						</div>';	
			}else{
				$insertar = ClientesModel::insertarClienteModel("cliente", $name, $last_name, $address, $phone, $ruc );

				if ($insertar == "ok") {
					echo "<script>location.href='clientes';</script>";;
				}else{
					echo $insertar;
				}	
			}
		}
	}
	static public function mostrarClientesController(){

		$respuesta = ClientesModel::mostrarClienteModel("cliente");

		return $respuesta;
	}	

}
?>