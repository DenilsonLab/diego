<?php 
require_once "conexion.php";
/**
 * 
 */
class PageConfigModel
{
	
		static public function mostrarConfigModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
	static public function actualizarUltimaFactura($tabla, $value){
		$stmt = Conexion::conectar()->prepare("UPDATE options SET option_value = :value WHERE option_id = 1");
		$stmt->bindParam(":value", $value, PDO::PARAM_STR);	
		$stmt->execute();

		if ($stmt) {
			return "ok";
		}

		$stmt->close();
	}
}
?>