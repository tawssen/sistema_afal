<?php
require_once 'models/club.php';
require_once 'models/asociacion.php';
require_once 'config/parameters.php';
require_once 'models/persona.php';
require_once 'models/direccion.php';
require_once 'models/provincia.php';
require_once 'models/comuna.php';

class clubesController{

    public function index(){   
        $club = new Club();
        $todoslosClubes = $club->obtenerClubes();
        include_once 'views/clubes/clubes.php';
    }

    public function gestionCrear(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){  
            $asociacion = new Asociacion();
            $todasLasAsociaciones = $asociacion->obtenerAsociaciones();        
            require_once 'views/clubes/gestionClubes.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function crear(){
        $direccion = new Direccion();
        $club = new Club();
        $direccion->setCallePasaje($_POST['calle']);
        $direccion->setComuna($_POST['comuna']);
        $direccion->setProvincia($_POST['provincia']);
        $direccion->setRegion($_POST['region']);

        $verificarDireccion = $direccion->verificarDireccion();
        if($verificarDireccion<1){
            $ingresar = $direccion->ingresarDireccion();
            $resultado = $direccion->obtenerDireccion();
            $club->setIdDireccion($resultado['ID_DIRECCION']);
        }else{
            $resultado = $direccion->obtenerDireccion();
            $club->setIdDireccion($resultado['ID_DIRECCION']);
        }

        $club->setRutClub($_POST['rutClub']);
        $club->setDvClub($_POST['dvClub']);
        $club->setNombreClub($_POST['nombreClub']);
        $club->setFechaFundacionClub($_POST['fechaFundacion']);
        $club->setNombreEstadio($_POST['nombreEstadio']);
        $club->setIdCorreo($_POST['correoClub']);
        $club->setIdAsociacion($_POST['nombreAsociacion']);
        $ingreso = $club->ingresarClub();
    }

    public function gestionEditar(){
        $club = new Club();
        $asociacion = new Asociacion();
        $provincia = new Provincia();
        $comuna = new Comuna();
        $todasLasAsociaciones = $asociacion->obtenerAsociaciones();
        $clubSeleccionado = $club->obtenerUnClub($_GET['clubSeleccionado']);
        $todasLasProvincias = $provincia->obtenerProvinciasDeRegion($clubSeleccionado['ID_REGION_FK']);
        $todasLasComunas = $comuna->obtenerComunasDeProvincia($clubSeleccionado['ID_PROVINCIA_FK']);
        require_once 'views/clubes/gestionClubes.php';
    }

    public function editar(){
        $club = new Club();
        $direccion = new Direccion();
        $direccion->setCallePasaje($_POST['calle']);
        $direccion->setComuna($_POST['comuna']);
        $direccion->setProvincia($_POST['provincia']);
        $direccion->setRegion($_POST['region']);

        $verificarDireccion = $direccion->verificarDireccion();
        if($verificarDireccion<1){
            $ingresar = $direccion->ingresarDireccion();
            $resultado = $direccion->obtenerDireccion();
            $club->setIdDireccion($resultado['ID_DIRECCION']);
        }else{
            $resultado = $direccion->obtenerDireccion();
            $club->setIdDireccion($resultado['ID_DIRECCION']);
        }
        
        $club->setRutClub($_POST['rutClub']);
        $club->setDvClub($_POST['dvClub']);
        $club->setNombreClub($_POST['nombreClub']);
        $club->setFechaFundacionClub($_POST['fechaFundacion']);
        $club->setNombreEstadio($_POST['nombreEstadio']);
        $club->setIdCorreo($_POST['correoClub']);
        $club->setIdAsociacion($_POST['nombreAsociacion']);
        
    }
}
