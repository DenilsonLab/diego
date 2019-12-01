<?php 
if(!$_SESSION["validar"]){
  echo "<script>location.href='ingreso';</script>";
  exit();
}
include "views/modules/menu.php";


session_destroy();
echo "<script>location.href='ingreso';</script>";
die("Saliendo del Sistema :) ...");

?>