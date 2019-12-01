<?php 
if(!$_SESSION["validar"]){
	echo "<script>location.href='ingreso';</script>";
	exit();
}
include "views/modules/menu.php";
?>

<div class="container">
	<div class="row">
		<h1 class="text-center">Inicio</h1>
	</div>
</div>