<?php 
if(!$_SESSION["validar"]){
	echo "<script>location.href='ingreso';</script>";
	exit();
}
include "views/modules/menu.php";
?>



<div class="container">
	<div class="row">
		<div class="col-md-12 text-center mt-5">
			<h2>Cambiar Contraseña</h2>
		</div>
		<div class="col-md-6 d-block m-auto">
			<div class="card p-2">
				<form method='post' class="form-group">
					<label for="old-pass">Contraseña Actual</label>
					<input type="password" id="old-pass" name="old-pass" class="form-control" required>

					<label for="new-pass">Nueva Contraseña </label>
					<input type="password" id="new-pass" name="new-pass" class="form-control" required>

					<button type="submit" class="btn btn-primary mt-5">Guardar</button>

					<?php $guardar = UsuariosController::guardarPasswordController(); ?>
				</form>
			</div>
		</div>
	</div>
</div>