<?php 
require_once "conexion.php";
/**
 * 
 */
class FacturaModel
{
	
		static public function facturaCabeceraModel($tabla, $id_factura){
		$stmt = Conexion::conectar()->prepare("SELECT cab.fecha, cli.nombre, cli.apellido, cli.direccion, cli.telefono, cli.ruc, usu.nombre , usu.apellido , cab.nro_fact
												FROM $tabla AS cab 
												INNER JOIN cliente AS cli ON cab.Cliente_id_cliente = cli.id_cliente 
												INNER JOIN usuario AS usu ON cab.Usuario_id_usu = usu.id_usu 
												WHERE cab.id_venta =  :factura");	
		$stmt -> bindParam(":factura",  $id_factura, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}


	static public function facturaDetalleModel($tabla, $id_factura){
		$stmt = Conexion::conectar()->prepare("SELECT det.cantidad,  det.precio, aran.descripcion 
												FROM $tabla AS det 
												INNER JOIN aranceles AS aran ON det.Aranceles_id_arancel = aran.id_arancel 
												WHERE det.Venta_cabecera_id_venta = :factura");	
		$stmt -> bindParam(":factura",  $id_factura, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
		static public function todasLasFacturas($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT cab.fecha, cli.nombre, cli.apellido, cli.direccion, cli.telefono, cli.ruc, usu.nombre , usu.apellido , cab.nro_fact, cab.id_venta
												FROM $tabla AS cab 
												INNER JOIN cliente AS cli ON cab.Cliente_id_cliente = cli.id_cliente 
												INNER JOIN usuario AS usu ON cab.Usuario_id_usu = usu.id_usu 
												");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}


}


