<?php  
require_once "conexion.php";
/**
 * 
 */
class TmpModel
{
	
	
	
	static public function guardarTmp($tabla, $id, $cantidad, $precio_unit){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (arancel_id, cantidad, precio) VALUES (:arancel_id, :cantidad,:precio) ");
		$stmt->bindParam(":arancel_id", $id, PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);	
		$stmt->bindParam(":precio", $precio_unit, PDO::PARAM_INT);	
		$stmt->execute();
		
		if ($stmt) {
			return "ok";			# code...
		}		
		
		$stmt->close();
	}

	static public function verTmpModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT tmp.id, ara.descripcion, tmp.cantidad, tmp.precio, tmp.arancel_id FROM $tabla AS tmp INNER JOIN aranceles AS ara ON tmp.arancel_id = ara.id_arancel");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}	
	static public function mostrarUltimoTmp($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT tmp.id, ara.descripcion, tmp.cantidad, tmp.precio FROM $tabla AS tmp INNER JOIN aranceles AS ara ON tmp.arancel_id = ara.id_arancel ORDER BY id DESC LIMIT 1");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}	
	static public function vaciarTmpModel(){
		$stmt = Conexion::conectar()->prepare("DELETE FROM tmp");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
	static public function borrarTmpPorIdModel($id){
		$stmt = Conexion::conectar()->prepare("DELETE FROM tmp WHERE id = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);		
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}	
}