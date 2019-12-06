<?php  
require_once "conexion.php";
/**
 * 
 */
class ClientesModel
{
	
	
	static public function insertarClienteModel($tabla, $name, $last_name, $address, $phone, $ruc){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, direccion, telefono, ruc) VALUES (:nombre, :apellido, :direccion, :telefono, :ruc) ");
		$stmt->bindParam(":nombre", $name, PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $last_name, PDO::PARAM_STR);	
		$stmt->bindParam(":direccion", $address, PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $phone, PDO::PARAM_STR);
		$stmt->bindParam(":ruc", $ruc, PDO::PARAM_STR)	;
		$stmt->execute();
		
		if ($stmt) {
			return "ok";			# code...
		}		
		
		$stmt->close();
	}
	static public function mostrarClienteModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
}