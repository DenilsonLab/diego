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
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center mt-3"><h4>Sistema de Ventas y Facturacion</h4></div>
		
		<div class="col-md-12 card card-info p-5">
			<!-- Formulario de Agregar Producto -->
			<form>
				<div class="row">
					<!-- Titulo de Secciones -->
					<hr>
					<!-- Elegir Cliente -->
					<div class="col-md-6">
						<h5>Cliente</h5>
						<?php $mostrar_clientes = ClientesController::mostrarClientesController(); 
	                        $contador = 1;
	                  	?>
                  		
						<select class="form-control" name="cliente-id" id="cliente-id">
							<?php foreach ($mostrar_clientes as $key => $value): ?>
								<option value="<?php echo $value[0]; ?>"><?php echo $value[1].' '.$value[2]; ?></option>		
							<?php endforeach ?>	
						</select>

					</div>
					<!-- Vendedor -->
					<div class="col-md-6">
						<label for="fecha"> Fecha</label>	
						<input type="text" name="fecha" class="form-control" value="<?php echo date("d-m-Y"); ?>"> 
						<br>						
						<span>Vendedor: <strong><?php echo $_SESSION['nombre']; ?></strong> </span>
						<br>	
				
					</div>
					<div class="col-md-3">
						<label for="fact-numero">Numero de Factura</label>
						<input type="text" name="fact_num" class="form-control" id="fact-numero" disabled value="<?php echo LASTFACT + 1; ?>">
					</div>
					<div class="col-md-12">
						<button type="button" id="btn-agregar-item" class="btn btn-success mt-3" data-toggle="modal" data-target="#form-add-item">Agregar Item</button>
						<hr>
						<!-- Tabla de Items -->
					     <div class="table-responsive-sm">
					          <table class="table">
					            <thead>
					              <tr>
					                <th scope="col">Nombre</th>
					                <th scope="col">Cantidad</th>
					                <th scope="col">Precio Unitario</th>
					                <th scope="col">Precio Final</th>
					              </tr>
					            </thead>
					            <tbody id="table-items">              
									
					            </tbody>
					          </table>
					        </div>						
						    <!-- Fin de la tabla  -->
					</div>
					<div class="col-md-12 mt-3">
						<input type="button" id="guardar-factura" class="btn btn-primary" value="Guardar Factura">
					</div>
				</div>

			</form>
			<!-- Finde Formulario de Agregar  -->
		</div>

		<!-- Modal -->
      <div id="form-add-item" class="modal fade" role="dialog">
        <div class="modal-dialog">
 <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">   
              <h4 class="modal-title">Agregar Arancel</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="#" method="post" class="form-group">
				 <div class="row">
				 	<div class="col-md-12">
				 		<label for="arancel"> Arancel</label>
				 		<select class="form-control" name="arancel" id="agregar-arancel-id" required>
				            	<?php 
				            		$mostrar_aranceles = ArancelesController::mostrarArancelController();
				            		$contador = 1;
				            	 ?>
				            <?php foreach ($mostrar_aranceles as $key => $value): ?>
								<option value="<?php echo $value [0] ?>" ><?php echo $value[1]; ?></option>

				            <?php endforeach ?>				 			
				 		</select>

				 	</div>
				 	<div class="col-md-12">
				 		<label for="cant-arancel">Cantidad</label>
				 		<input type="number"  id='cant-arancel' class="form-control " name="cant-arancel" value="1" required>
				 	</div>
				 	<div class="col-md-12 mt-3">
				 		<button id="agregar-arancel" class="btn btn-primary" data-dismiss="modal" type="button">Agregar Item</button>
				 	</div>
				 </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>

        </div>
      </div>

      <!-- End of Form add Player -->


	</div>
</div>
<script>
	$("#agregar-arancel").on("click", function(){
		var arancel_id = $("#agregar-arancel-id").val();
		var cant_arancel = $("#cant-arancel").val();
		$.ajax({
				type: "post",
				url:'ajax/arancel.php',
				data: {arancel_id:arancel_id, cantidad : cant_arancel},
				success:function(data){
					var arancel =  jQuery.parseJSON(data);
					$("#table-items").append(`
						<tr id="row-id-`+arancel[0][0]+`"  >
							
							<td>`+arancel[0][1]+`</td>
							<td>`+cant_arancel+`</td>
							<td>`+arancel[0][3]+`</td>
							<td>`+cant_arancel*arancel[0][3]+`</td>
							<td><button  type="button" id="`+arancel[0][0]+`" class="btn btn-danger btn-eliminar-tmp" onclick="eliminarTmp(`+arancel[0][0]+`)">Eliminar</button></td>

						<tr>	
							`
						
						);
					
					

			}
			});
	});

	$(window).on("load", function(){
		var mostrar = "get_tmp";
		$.ajax({

			type: "post",
			url:'ajax/tmp.php',
			data: {mostrar:mostrar},
			success:function(data){
			
				var datos = jQuery.parseJSON(data);
				datos.forEach(mostrarTmp);

				function mostrarTmp(item, index){
					$("#table-items").append(`
						<tr id="row-id-`+item[0]+`">
							
							<td>`+item[1]+`</td>
							<td>`+item[2]+`</td>
							<td>`+item[3]+`</td>
							<td>`+item[3]*item[2]+`</td>
							<td><button  type="button" id="`+item[0]+`" class="btn btn-danger btn-eliminar-tmp" onclick="eliminarTmp(`+item[0]+`)">Eliminar</button></td>

						<tr>	
							`);
				}
				
			}

		})
	});
function eliminarTmp(id){
	$.ajax({

			type: "post",
			url:'ajax/tmp.php',
			data: {eliminar:id},
			success:function(data){
				$("#row-id-"+id).hide(300, function(){
					$(this).remove();
				})
			}

	})
}


function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
$("#guardar-factura").on("click", function(){
		var usuario = getCookie("id");
		var cliente = $("#cliente-id").val();
		$.ajax({
				type: "post",
				url:'ajax/ventas.php',
				data: {usuario:usuario, cliente : cliente},
				success:function(data){
					if (data == 'vacio') {
						alert('La factura no puede ir vacia');
					}else{
						alert('Factura Generada');
						
						window.open("pdf.php?id_factura="+data);
						location.reload();

					}
					

			}
			})			
	});
</script>