<?php 
if (isset($_SESSION["validar"])) {
  
  if(!$_SESSION["validar"]){
    echo "<script>location.href='ingreso';</script>";
    exit();
    
  }
  include "views/modules/menu.php";
}else{
    echo "<script>location.href='ingreso';</script>";
    exit();
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="title mt-3">
				<span class="inicio-title">Bienvenido <strong><?php echo $_SESSION['nombre']; ?></strong></span>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-12">
				<h4>Accesos Directos</h4>
			</div>
			<div class="row">
				<div class="col-md-4 col-6 mt-3  d-inline">
					<div class="card text-center bg-primary text-white">
						<span class="fa fa-user-circle m-4 dashboard-icon "></span>
						<h5 class="mb-5 dashboard-title"><a href="jugadores" class="text-white">Jugadores</a></h5>
					</div>
				</div>
				<div class="col-md-4 col-6 mt-3  d-inline">
					<div class="card text-center bg-success text-white">
						<span class="fa fa-flag m-4 dashboard-icon "></span>
						<h5 class="mb-5 dashboard-title"><a href="clubs" class="text-white">Clubes</a></h5>
					</div>
				</div>
				<div class="col-md-4 col-6 mt-3  d-inline">
					<div class="card text-center bg-danger text-white">
						<span class="fa fa-users m-4 dashboard-icon "></span>
						<h5 class="mb-5 dashboard-title"><a href="clientes" class="text-white">Clientes</a></h5>
					</div>
				</div>
				<div class="col-md-4 col-6 mt-3 d-inline">
					<div class="card text-center bg-warning text-white">
						<span class="fa fa-futbol m-4 dashboard-icon "></span>
						<h5 class="mb-5 dashboard-title"><a href="ligas" class="text-white">Ligas</a></h5>
					</div>
				</div>	
				<div class="col-md-4 col-6 mt-3 d-inline">
					<div class="card text-center bg-secondary text-white">
						<span class="fa fa-shopping-bag m-4 dashboard-icon "></span>
						<h5 class="mb-5 dashboard-title"><a href="aranceles" class="text-white">Aranceles</a></h5>
					</div>
				</div>	
				<div class="col-md-4 col-6 mt-3 d-inline">
					<div class="card text-center bg-info text-white">
						<span class="fa fa-file m-4 dashboard-icon "></span>
						<h5 class="mb-5 dashboard-title"><a href="ventas" class="text-white">Ventas</a></h5>
					</div>
				</div>																				
			</div>
		</div>
	</div>
</div>