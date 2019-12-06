<?php 

/**
 * 
 */
class UsuariosController
{
	
	public static function guardarPasswordController(){
		if(isset($_SESSION['id']) && isset($_POST["old-pass"]) && isset($_POST["new-pass"])){
			if (!empty($_SESSION['id']) && !empty($_POST["old-pass"]) && !empty($_POST["new-pass"])) {
				$old_pass = $_POST["old-pass"];
				$new_pass = $_POST["new-pass"];
				$usu_id   = $_SESSION['id'];
				$usu      = $_SESSION['usuario'];

			   	$old_pass = crypt($old_pass, '$6$rounds=5000$usesomesillystringforsalt$');
			   	$new_pass = crypt($new_pass, '$6$rounds=5000$usesomesillystringforsalt$');

				$datosController = array("usuario"=>$usu,
				                     "password"=>$old_pass);

				$respuesta = IngresoModels::ingresoModel($datosController, "usuario");
				if($respuesta["nick"] == $usu && $respuesta["pass"] == $old_pass){

					  $guardar_pass = UsuariosModel::guardarPasswordModel('usuario', $usu_id, $new_pass);

					  if ($guardar_pass == 'ok') {
					  	echo "<div class='col-md-12 mt-2 alert alert-success'>Contraseña Actualizada</div>";
					  }
				}				

			}

		}
	}
}