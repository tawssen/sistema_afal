<?php ?>

<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Asociación Linares</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Programación</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Posiciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>
        </ul>
        
        <?php if(!isset($_SESSION['identity'])): ?>
        <input type="submit" class="btn btn-success" value="Iniciar sesión" data-bs-toggle="modal" data-bs-target="#sesionModal">
        <?php else:?>
         <a href="inicio/cerrarsesion"class="btn btn-danger" >Cerrar Sesion</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</header>