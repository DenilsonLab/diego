<?php  
require_once "conexion.php";

/**
 * 
 */
class UsuariosModel
{
	public static function guardarPasswordModel($tabla, $usu_id, $pass){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pass = :pass WHERE id_usu = :id");
		$stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
		$stmt->bindParam(":id", $usu_id, PDO::PARAM_INT)	;	
		$stmt->execute();
		
		if ($stmt) {
			return "ok";			# code...
		}		
		
		$stmt->close();		
	}
}