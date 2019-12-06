<?php 
if (isset($_SERVER["HTTPS"])) {
      $ssltype = "https://";
    }else{
      $ssltype = "http://";
    }
    $path= dirname($_SERVER['PHP_SELF']);
    $path = $ssltype.$_SERVER['HTTP_HOST'].$path.'/';

?>


<nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-responsive" aria-controls="menu-responsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Liga System</a>
      <div class="collapse navbar-collapse white-text" id="menu-responsive">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $path; ?>inicio">Inicio</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $path; ?>jugadores">Jugadores</a>
          </li> 
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $path; ?>ligas">Ligas</a>
          </li> 
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $path; ?>clubs">Clubs</a>
          </li>                  
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $path; ?>clientes">Clientes</a>
          </li> 
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $path; ?>aranceles">Aranceles</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $path; ?>ventas">Ventas</a>
          </li> 
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $path; ?>facturas">Facturas</a>
          </li>                    
          <div>
        </ul>
        <ul class=" nav navbar-nav navbar-right">
           <li class="nav-item active ">
            <a class="nav-link" href="perfil" id="perfil-dropdown" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-user mr-1" ></span>Perfil</a>
            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="perfil-dropdown">
              <a class="dropdown-item" href="password">Modificar Contraseña</a>
              <a class="dropdown-item" href="salir">Salir del Sistema</a>
            </div>
          </li>
        </ul>

      </div>      
</nav>
