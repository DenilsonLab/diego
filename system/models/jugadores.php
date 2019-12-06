<?php  
require_once "conexion.php";
/**
 * 
 */
class JugadoresModel
{
	
	
	static public function insertarJugadorModel($tabla, $nombre, $last_name, $cin, $birthday, $register_number, $club){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, cin, fecha_nac, nro_registro, Club_id_club) VALUES (:nombre, :apellido, :cin, :fecha_nac, :nro_registro, :club) ");
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $last_name, PDO::PARAM_STR);	
		$stmt->bindParam(":cin", $cin, PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nac", $birthday, PDO::PARAM_STR);
		$stmt->bindParam(":nro_registro", $register_number, PDO::PARAM_INT)	;
		$stmt->bindParam(":club", $club, PDO::PARAM_INT)	;
		$stmt->execute();
		
		if ($stmt) {
			return "ok";			# code...
		}		
		
		$stmt->close();
	}
	static public function mostrarJugadoresModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	static public function mostrarJugadoresForIdModel($tabla, $id){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_jugador = :id");	
		$stmt->bindParam(":id", $id, PDO::PARAM_INT)	;

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
}