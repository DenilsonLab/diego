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
		$stmt = Conexion::conectar()->prepare("SELECT j.id_jugador, j.nombre, j.apellido, j.cin, j.fecha_nac, j.nro_registro, c.nombre, j.estado FROM $tabla AS j INNER JOIN club AS c ON j.Club_id_club = c.id_club WHERE j.estado != 'inactivo'");	
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
	static public function borrarJugadorPorIdModel($id){
		$stmt = Conexion::conectar()->prepare("UPDATE jugador SET estado = 'inactivo' WHERE id_jugador = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);		
		$stmt->execute();

		return $stmt;

		$stmt->close();
	}
}