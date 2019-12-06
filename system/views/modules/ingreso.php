

   <div class="container">
      <div class="row ">
        <div class="col-md-12 mt-5">
          <h1 class="title text-center">Liga System</h1>
        </div>
          <div class="col-md-4 col-xs-12 bg-secondary text-white d-block mt-5 opacity-5 mr-auto ml-auto ">
            <div class="col-md-12">
              <h2 class="text-center">Entrar al Sistema</h2>
            </div>
            <form action="" method="post" class="form-group center" >
              <div class="col-md-12 mt-3">
                <label for="username">Nombre de Usuario</label>
                <input type="text" id="username" name="userIngreso" class="form-control">
              </div>
              <div class="col-md-12 mt-3">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="passwordIngreso" class="form-control">
              </div>
              <div class="col-md-12 mt-4">
                <button type="submit"  class="btn btn-primary d-block m-auto" name="button">Entrar <span class="fa fa-arrow-right"></span></button>
              </div>
              <?php 
                  $ingreso = new Ingreso();
                  $ingreso -> ingresoController();
              ?>

            </form>
          </div>
      </div>

    </div>