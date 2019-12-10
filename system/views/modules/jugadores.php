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
        <h1 class="title">Jugadores</h1>
      </div>

      <!-- Agregar Jugador -->
      <div class="col-md-12">
        <button type="button" class="btn btn-primary" id="btn-agregar-jugador" name="button" data-toggle="modal" data-target="#form-add-player">Agregar Jugador</button>
      </div>
      <!-- Fin de boton agregar a jugador -->

      <!-- Tarjeta de Jugador -->
      <div class="col-md-12">
          <form class="form-group mt-3">
            <input type="text" id="searchInput" onkeyup="searchPlayer()" class="form-control" placeholder="Buscar por Nombre/C.I N/Club">
          </form>
        <div class="table-responsive-sm">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">C.I N°</th>
                <th scope="col">Fecha de Nac</th>
                <th scope="col">N° Registro</th>
                <th scope="col">Club</th>
              </tr>
            </thead>
            <tbody  id="listPlayer">
                  <?php $mostrar_jugadores = JugadoresController::mostrarJugadoresController(); 
                        $contador = 1;
                  ?>
                  <?php foreach ($mostrar_jugadores as $key => $value): ?>              
              <tr id="jugador-id-<?php echo $value[0]; ?>">
                    <td scope="row"><?php echo $contador++; ?></td>
                    <td><?php echo $value[1]; ?></td>
                    <td><?php echo $value[2]; ?></td>
                    <td><?php echo $value[3]; ?></td>
                    <td><?php echo $value[4]; ?></td>
                    <td><?php echo $value[5]; ?></td>
                    <td><?php echo $value[6]; ?></td>
                    <td><a class="btn btn-primary" href="editar/jugador/<?php echo $value[0]; ?>">Editar</a></td>
                    <td><button class="btn btn-danger" onclick="eliminarJugador(<?php echo $value[0]; ?>)"><span class="fa fa-trash"></span></button></td>
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
              <h4 class="modal-title">Agregar Jugador</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="#" method="post" class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control">
                  </div>
                  <div class="col">
                    <label for="last-name">Apellido</label>
                    <input type="text" name="last-name" id="last-name" class="form-control">
                  </div>                
                  <div class="col-md-12">
                    <label for="cin">Cedula de Identidad</label>
                    <input type="text" name="cin" id="cin" class="form-control">
                  </div> 
                  <div class="col-md-12">
                    <label for="birthday">Fecha de Nacimiento</label>
                    <input type="date" name="birthday" id="birthday" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label for="register-number">Numero de Registro</label>
                    <input type="text" name="register-number" id="register-number" class="form-control">
                  </div>
                  <div class="col-md-12">

                    <label for="club">Elegir Club</label>
                    <select name="club" id="club" class="form-control
                    ">
                      <?php $mostrar_club = ClubController::mostrarClubController(); ?>
                      <?php foreach ($mostrar_club as $key => $value): ?>
                        <option value="<?php echo $value[0] ?>"><?php echo $value[3] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div> 
                  <div class="col-md-12">
                    <button type="submit" class=" mt-3 btn btn-primary">Registrar</button>
                  </div> 
                  <?php $insertar = JugadoresController::insertarJugadorController(); ?>                                    
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

function eliminarJugador(id){
  $.ajax({

      type: "post",
      url:'ajax/jugador.php',
      data: {eliminar:id},
      success:function(data){
        alert("El Jugador se eliminó");
        $("#jugador-id-"+id).hide(300, function(){
          $(this).remove();
        })
      }

  })
}
  </script>