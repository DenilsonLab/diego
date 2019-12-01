<?php

require_once "conexion.php";

class IngresoModels{

	static public function ingresoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_usu, nombre, apellido, nick, pass, cargo, intentos FROM $tabla WHERE nick = :nick");

		$stmt -> bindParam(":nick", $datosModel["usuario"], PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	static public function intentosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE usuario = :usuario");

		$stmt -> bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
		$stmt -> bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}

		else{

			return "error";
		}

	}

}