<?php 
if(!$_SESSION["validar"]){
	echo "<script>location.href='ingreso';</script>";
	exit();
  
}
include "views/modules/menu.php";
?>



  <div class="container">
    <div class="row">
      <!-- <title>Home</title> -->
      <div class="col-md-12 text-center mt-5 mb-3">
        <h1 class="title">Facturas</h1>
      </div>


      <!-- Tarjeta de Jugador -->
      <div class="col-md-12">
          <form class="form-group mt-3">
            <input type="text" id="searchInput" onkeyup="searchPlayer()" class="form-control" placeholder="Buscar por Numero de Factura, Fecha">
          </form>
        <div class="table-responsive-sm">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Numero de Factura</th>
                <th scope="col">Cliente</th>
                <th scope="col">Fecha</th>

                <th scope="col"></th>
              </tr>
            </thead>
            <tbody  id="listPlayer">
            	<?php 
            		$facturas = FacturasController::todasLasFacturas();
            		$contador = 1;
            	 ?>
            <?php foreach ($facturas as $key => $value): ?>
              <tr>
                <th scope="row"><?php echo $value["nro_fact"]; ?></th>
                <td><?php echo $value[1].' '.$value[2]; ?></td>
                <td><?php echo $value["fecha"]; ?></td>
                <td><a href="pdf.php?id_factura=<?php echo $value['id_venta']; ?>" class="btn btn-primary"><span class="fa fa-print"></span> Imprimir</a></td>
              </tr>
            <?php endforeach ?>


            </tbody>
          </table>
        </div>
      </div>

      <!-- Form Add Player -->
  
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
      td2 = tr[i].getElementsByTagName("td")[3];
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