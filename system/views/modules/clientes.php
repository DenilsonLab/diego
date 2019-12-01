<?php 
if(!$_SESSION["validar"]){
	echo "<script>location.href='ingreso';</script>";
	exit();
}
include "views/modules/menu.php";
?>
