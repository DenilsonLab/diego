<?php  
require_once "conexion.php";
/**
 * 
 */
class VentasModel
{
	
	
	static public function insertarVentaCabeceraModel($tabla, $fecha, $cliente, $usuario, $factura_number){
		$dbh = Conexion::conectar();
		$stmt = $dbh->prepare("INSERT INTO $tabla (fecha, Cliente_id_cliente, Usuario_id_usu, nro_fact) VALUES (:fecha, :cliente, :usuario, :fact) ");
		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $cliente, PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
		$stmt->bindParam(":fact", $factura_number, PDO::PARAM_STR);					
		$stmt->execute();
		return $dbh->lastInsertId();
		
		/*if ($stmt) {
			return "ok";			# code...
		}*/		
		
		$stmt->close();
	}
	static public function insertarDetalleVentaModel($tabla, $cabecera, $id_arancel, $cantidad, $precio){
		$dbh = Conexion::conectar();
		$stmt = $dbh->prepare("INSERT INTO $tabla (Venta_cabecera_id_venta, Aranceles_id_arancel, cantidad, precio) VALUES (:cabecera, :id_arancel, :cantidad, :precio) ");
		$stmt->bindParam(":cabecera", $cabecera, PDO::PARAM_INT);
		$stmt->bindParam(":id_arancel", $id_arancel, PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
		$stmt->bindParam(":precio", $precio, PDO::PARAM_INT);					
		$stmt->execute();
		
		/*if ($stmt) {
			return "ok";			# code...
		}*/		
		
		//$stmt->close();
	}	
}	