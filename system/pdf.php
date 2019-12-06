<?php
if (!isset($_GET['id_factura'])) {
	die("No se puede generar factura porque el id es inexistente");
}
if (empty($_GET['id_factura'])) {
	die("No se puede generar factura porque el id es inexistente");
}
$id_factura = $_GET['id_factura'];
require_once  "controllers/factura.php";
require_once  "models/factura.php";
 $aranceles = FacturasController::facturaDetalleController($id_factura);
 $cabecera = FacturasController::facturaCabeceraController($id_factura);
echo "Generando factura";
$fecha = $cabecera[0][0];
$fechaNew = date("d-m-Y", strtotime($fecha));
$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>FACTURA</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	Para,<br />
	<b>CLIENTE</b><br />
	Nombres : '.$cabecera[0][1].' '. $cabecera[0][2].'<br /> 
	Dirección de facturación: '.$cabecera[0][3].' <br />
  RUC:  '.$cabecera[0][5].'
	</td>
	<td width="35%">         
	Factura No. : '.$cabecera[0][8].'<br />
	Factura Fecha :  '.$fechaNew.'<br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">#</th>
	<th align="left">Arancel</th>
	<th align="left">Cantidad</th>
	<th align="left">Precio Unit.</th>
	<th align="left">Precio Total</th> 
	</tr>';
$count = 0;
$suma = 0;   
foreach ($aranceles as $key => $value) {
	$count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$value[2].'</td>
	<td align="left">'.$value[0].'</td>
	<td align="left">'.number_format($value[1]).'</td>  
  <td >'.number_format($value[1]*$value[0]).'</td>
	</tr>';
  $totalUnit = $value[1]*$value[0];
  $suma += $totalUnit;
}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Monto Total</b></td>
	<td align="left"><b>'.number_format($suma).'</b></td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
// create pdf of invoice	
$invoiceFileName = 'factura-'.$cabecera[0][8].'.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>  