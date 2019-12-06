<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 class="">Editar Jugadores</h1>
		</div>
		    <form action="#" method="post" class="form-group">
                <div class="row">
                  <div class="col">

                  <?php 
                  		$enlaces = $_GET["action"];
						$enlaces = explode("/", $enlaces);
                  		$id_jugador = $enlaces[2];

                  		$mostrar_jugadores = JugadoresController::mostrarJugadoresForIdController($id_jugador); 
                        $contador = 1;
                  ?>
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control " value="<?php echo($mostrar_jugadores[0]["nombre"]); ?>">
                  </div>
                  <div class="col">
                    <label for="last-name">Apellido</label>
                    <input type="text" name="last-name" id="last-name" class="form-control"  value="<?php echo($mostrar_jugadores[0]["apellido"]); ?>">
                  </div>                
                  <div class="col-md-12">
                    <label for="cin">Cedula de Identidad</label>
                    <input type="text" name="cin" id="cin" class="form-control"  value="<?php echo($mostrar_jugadores[0]["cin"]); ?>">
                  </div> 
                  <div class="col-md-6">
                    <label for="birthday">Fecha de Nacimiento</label>
                    <input type="date" name="birthday" id="birthday" class="form-control"  value="<?php echo($mostrar_jugadores[0]["fecha_nac"]); ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="register-number">Numero de Registro</label>
                    <input type="text" name="register-number" id="register-number" class="form-control"  value="<?php echo($mostrar_jugadores[0]["nro_registro"]); ?>">
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class=" mt-3 btn btn-primary">Guardar</button>
                  </div> 
                  <?php// $insertar = JugadoresController::insertarJugadorController(); ?>                                    
                </div>
              </form>
	</div>
</div>