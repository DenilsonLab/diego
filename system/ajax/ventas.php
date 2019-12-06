<?php  
require_once "../controllers/config.php";
require_once "../models/config.php";
require_once "../models/ventas.php";
require_once "../models/tmp.php";
if (isset($_POST["usuario"]) && isset($_POST["cliente"])) {
	$page_config = PageConfigController::mostrarConfigModel();
	$factura_number = $page_config[0][2] + 1;
	$usuario = $_POST["usuario"];
	$cliente = $_POST["cliente"];
	$fecha = date("Y,m,d");

	$listar_tmp = TmpModel::verTmpModel("tmp");
	if (empty($listar_tmp)) {
		echo "vacio";
		die();
	}
	$insertar_venta = VentasModel::insertarVentaCabeceraModel("venta_cabecera", $fecha, $cliente, $usuario, $factura_number);
	$actualizar_factura = PageConfigModel::actualizarUltimaFactura("options", $factura_number);

	

	foreach ($listar_tmp as $key => $tmp) {
		$id_arancel = $tmp["arancel_id"];
		$cantidad = $tmp["cantidad"];
		$precio = $tmp["precio"];
		$insertar_detalle_venta = VentasModel::insertarDetalleVentaModel("venta_detalle", $insertar_venta, $id_arancel, $cantidad, $precio);
	}

	$vaciar_tmp = TmpModel::vaciarTmpModel();

	echo $insertar_venta;


}