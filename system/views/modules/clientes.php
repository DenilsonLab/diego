<?php 
if (isset($_SESSION["validar"])) {
  
  if(!$_SESSION["validar"]){
    echo "<script>location.href='ingreso';</script>";
    exit();
    
  }
  include "views/modules/menu.php";
}
?>

  <div class="container">
    <div class="row">
      <!-- <title>Home</title> -->
      <div class="col-md-12 text-center mt-5 mb-3">
        <h1 class="title">Clientes</h1>
      </div>

      <!-- Agregar Jugador -->
      <div class="col-md-12">
        <button type="button" class="btn btn-primary" id="btn-agregar-jugador" name="button" data-toggle="modal" data-target="#form-add-player">Agregar Cliente</button>
      </div>
      <!-- Fin de boton agregar a jugador -->

      <!-- Tarjeta de Jugador -->
      <div class="col-md-12">
          <form class="form-group mt-3">
            <input type="text" id="searchInput" onkeyup="searchPlayer()" class="form-control" placeholder="Buscar por Nombre">
          </form>
        <div class="table-responsive-sm">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Ruc</th>
              </tr>
            </thead>
            <tbody  id="listPlayer">
                  <?php $mostrar_clientes = ClientesController::mostrarClientesController(); 
                        $contador = 1;
                  ?>
                  <?php foreach ($mostrar_clientes as $key => $value): ?>              
              <tr>
                    <td scope="row"><?php echo $contador++; ?></td>
                    <td><?php echo $value[1]; ?></td>
                    <td><?php echo $value[2]; ?></td>
                    <td><?php echo $value[3]; ?></td>
                    <td><?php echo $value[4]; ?></td>
                    <td><?php echo $value[5]; ?></td>
                    <td><a class="btn btn-primary" href="editar/cliente/<?php echo $value[0]; ?>">Editar</a></td>
              </tr>
              <?php endforeach ?> 
            </tbody>
          </table>
        </div>
      </div>

      <!-- Form Add Player -->
      <!-- Modal -->
      <div id="form-add-player" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">   
              <h4 class="modal-title">Agregar Cliente</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="#" method="post" class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="client_name">Nombre</label>
                    <input type="text" name="client-name" id="client_name" class="form-control">
                  </div>
                  <div class="col">
                    <label for="cliente_last_name">Apellido</label>
                    <input type="text" name="client-last-name" id="client-last-name" class="form-control">
                  </div>                
                  <div class="col-md-12">
                    <label for="client-address">Dirección</label>
                    <input type="text" name="client-address" id="client-address" class="form-control">
                  </div> 
                  <div class="col-md-12">
                    <label for="client-phone">Telefono</label>
                    <input type="text" name="client-phone" id="client-phone" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label for="client-ruc">RUC</label>
                    <input type="text" name="client-ruc" id="client-ruc" class="form-control">
                  </div> 
                  <div class="col-md-12">
                    <button type="submit" class=" mt-3 btn btn-primary">Registrar</button>
                  </div> 
                  <?php $insertar = ClientesController::insertarClienteController(); ?>                                    
                </div>
              </form>
              

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <!-- End of Form add Player -->

      <!-- Tarjeta de Jugador -->
    </div>
  </div>

  <script>
  function searchPlayer() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("listPlayer");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      td2 = tr[i].getElementsByTagName("td")[2];
      td3 = tr[i].getElementsByTagName("td")[4];
      td4 = tr[i].getElementsByTagName("td")[5];
      if (td) {
        txtValue = td.textContent || td.innerText;
        txtValue2 = td2.textContent || td2.innerText;
        txtValue3 = td3.textContent || td3.innerText;
        txtValue4 = td4.textContent || td4.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1 ||
            txtValue2.toUpperCase().indexOf(filter) > -1 ||
            txtValue3.toUpperCase().indexOf(filter) > -1 ||
            txtValue4.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  </script>