<?php

class Ingreso{

	static public function ingresoController(){

		if(isset($_POST["userIngreso"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["userIngreso"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])){

			   	$encriptar = crypt($_POST["passwordIngreso"], '$6$rounds=5000$usesomesillystringforsalt$');

				$datosController = array("usuario"=>$_POST["userIngreso"],
				                     "password"=>$encriptar);

				$respuesta = IngresoModels::ingresoModel($datosController, "usuario");

				$intentos = $respuesta["intentos"];
				$usuarioActual = $_POST["userIngreso"];
				$maximoIntentos = 2;

				echo $respuesta["id_usu"];
			    
			    #echo $encriptar;

				if($intentos < $maximoIntentos){

					if($respuesta["nick"] == $_POST["userIngreso"] && $respuesta["pass"] == $encriptar){

						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuario");


						$_SESSION["validar"] = true;
						$_SESSION["id"] = $respuesta["id_usu"];
						$_SESSION["usuario"] = $respuesta["nick"];
						$_SESSION["nombre"]  = $respuesta["nombre"];
						$_SESSION["cargo"]	 = $respuesta["cargo"];
						setcookie('id', $respuesta["id_usu"]);

						echo "<script>location.href='inicio';</script>";;

					}

					else{

						++$intentos;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

						echo '<div class="alert alert-danger">Error al ingresar</div>';

					}

				}

				else{

						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

						echo '<div class="alert alert-danger">Ha fallado 3 veces, demuestre que no es un robot</div>';

				}

			}

		}
	}

}