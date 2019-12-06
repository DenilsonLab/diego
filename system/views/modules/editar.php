<?php 
if(!$_SESSION["validar"]){
	echo "<script>location.href='ingreso';</script>";
	exit();
}
include "views/modules/menu.php";

	$enlaces = $_GET["action"];
	$enlaces = explode("/", $enlaces);
	$enlaces = $enlaces[1];
if ($enlaces == "jugadores") {
	include dirname(__FILE__)."/editar-jugadores.php";
}
?>
