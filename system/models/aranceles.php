<?php  
require_once "conexion.php";
/**
 * 
 */
class ArancelesModel
{
	
	
	static public function insertarArancelModel($tabla, $descripcion, $precio){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion, precio) VALUES (:descripcion, :precio) ");
		$stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
		$stmt->bindParam(":precio", $precio, PDO::PARAM_INT)	;	
		$stmt->execute();
		
		if ($stmt) {
			return "ok";			# code...
		}		
		
		$stmt->close();
	}
	static public function mostrarArancelModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
	static public function mostrarArancelForIdModel($tabla, $id){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_arancel = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}		
}