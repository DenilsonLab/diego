<?php  
require_once "models/config.php";
require_once "models/ruta.php";
require_once "models/ingreso.php";
require_once "models/liga.php";
require_once "models/club.php";
require_once "models/jugadores.php";
require_once "models/aranceles.php";
require_once "models/clientes.php";
require_once "models/factura.php";
require_once "models/usuarios.php";




require_once "controllers/config.php";
require_once "controllers/template.php";
require_once "controllers/ruta.php";
require_once "controllers/ingreso.php";
require_once "controllers/liga.php";
require_once "controllers/club.php";
require_once "controllers/jugadores.php";
require_once "controllers/aranceles.php";
require_once "controllers/clientes.php";
require_once "controllers/factura.php";
require_once "controllers/usuarios.php";


$page_config = PageConfigController::mostrarConfigModel();

define("LASTFACT", $page_config[0][2]);

$template = new TemplateController();
$template -> template();

