
<?php 

/**
 * 
 */
class FacturasController
{
	
	static public function facturaCabeceraController($id_factura){

		$respuesta = FacturaModel::facturaCabeceraModel("venta_cabecera", $id_factura);

		return $respuesta;
	}

	static public function facturaDetalleController($id_factura){

		$respuesta = FacturaModel::facturaDetalleModel("venta_detalle", $id_factura);

		return $respuesta;
	}
	static public function todasLasFacturas(){

		$respuesta = FacturaModel::todasLasFacturas("venta_cabecera");

		return $respuesta;
	}		

}