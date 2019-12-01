<?php  
require_once "conexion.php";
/**
 * 
 */
class LigaModel
{
	
	
	static public function insertarLigaModel($tabla, $liga_name, $liga_ruc){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, ruc) VALUES (:nombre, :ruc) ");
		$stmt->bindParam(":nombre", $liga_name, PDO::PARAM_STR);
		$stmt->bindParam(":ruc", $liga_ruc, PDO::PARAM_STR)	;	
		$stmt->execute();
		
		if ($stmt) {
			return "ok";			# code...
		}		
		
		$stmt->close();
	}
	static public function mostrarLigasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}	
}