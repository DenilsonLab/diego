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
      <!-- <title>Home</title> -->
      <div class="col-md-12 text-center mt-5 mb-3">
        <h1 class="title">Ligas</h1>
      </div>

      <!-- Agregar -->
      <div class="col-md-12">
        <button type="button" class="btn btn-primary" id="btn-agregar" name="button" data-toggle="modal" data-target="#form-add">Agregar Liga</button>
      </div>
      <!-- Fin de boton agregar -->

      <!-- Tarjeta de Jugador -->
      <div class="col-md-12">
          <form class="form-group mt-3">
            <input type="text" id="searchInput" onkeyup="searchPlayer()" class="form-control" placeholder="Buscar por Nombre/R.U.C">
          </form>
        <div class="table-responsive-sm">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ruc</th>
              </tr>
            </thead>
            <tbody  id="listPlayer">
            	<?php 
            		$ligas = LigaController::mostrarLigasController();
            		$contador = 1;
            	 ?>
            <?php foreach ($ligas as $key => $value): ?>
              <tr>
                <th scope="row"><?php echo $contador++; ?></th>
                <td><?php echo $value[1]; ?></td>
                <td><?php echo $value[2]; ?></td>
                <td><?php echo $value[2]; ?></td>
              </tr>
            <?php endforeach ?>


            </tbody>
          </table>
        </div>
      </div>

      <!-- Form Add Player -->
      <!-- Modal -->
      <div id="form-add" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Agregar Liga</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="" method="post" class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="name">Nombre</label>
                    <input type="text" name="ligaNombre" id="name" class="form-control" required>
                  </div>
                  <div class="col">
                    <label for="ligaRuc">Ruc</label>
                    <input type="text" name="ligaRuc" id="ligaRuc" class="form-control" required>
                  </div>                
                  <div class="col-md-12 mt-5">
                  	<button type="submit" class="form-control btn btn-primary">Guardar</button>
                  </div>          
                  <?php $insertar = LigaController::insertarLigaController(); ?>
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
      td2 = tr[i].getElementsByTagName("td")[1];
;
      if (td) {
        txtValue = td.textContent || td.innerText;
        txtValue2 = td2.textContent || td2.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1 ||
            txtValue2.toUpperCase().indexOf(filter) > -1 ) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  </script>