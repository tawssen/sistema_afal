<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Asociación Linares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" href="<?=base_url?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="<?=base_url?>datatables/datatables.min.css">
    <link rel="stylesheet" href="<?=base_url?>datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">
    <link href="<?=base_url?>styles/carousel.css" rel="stylesheet">
    <link href="<?=base_url?>styles/aside.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


  </head>
  <body style=""> <!-- Cambiar color al fondo -->
<main>

<header class=>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?=base_url?>">Asociación Linares</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="<?=base_url?>">Inicio</a>
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
         <a href="<?=base_url?>inicio/cerrarsesion"class="btn btn-danger" >Cerrar Sesion</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</header>