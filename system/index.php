<?php  
require_once "models/ruta.php";
require_once "models/ingreso.php";
require_once "models/liga.php";
require_once "models/club.php";



require_once "controllers/template.php";
require_once "controllers/ruta.php";
require_once "controllers/ingreso.php";
require_once "controllers/liga.php";
require_once "controllers/club.php";

$template = new TemplateController();
$template -> template();