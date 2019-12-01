<?php  
require_once "conexion.php";
/**
 * 
 */
class ClubModel
{
	
	
	static public function insertarClubModel($tabla, $club_code, $club_ruc, $club_name, $club_direccion, $club_liga){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo, ruc, nombre, Direccion, Liga_id_liga) VALUES (:codigo, :ruc, :nombre, :direccion, :liga_id) ");
		$stmt->bindParam(":codigo", $club_code, PDO::PARAM_INT);
		$stmt->bindParam(":ruc", $club_ruc, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $club_name, PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $club_direccion, PDO::PARAM_STR);
		$stmt->bindParam(":liga_id", $club_liga, PDO::PARAM_INT);					
		$stmt->execute();
		
		if ($stmt) {
			return "ok";			# code...
		}		
		
		$stmt->close();
	}
	static public function mostrarClubModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
	
}