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
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])|| iseet($_SESSION['Dirigente y D_Tecnico'])){
            $club = new Club();
            $todoslosClubes = $club->obtenerClubes();
            include_once 'views/clubes/clubes.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
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
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])|| iseet($_SESSION['Dirigente y D_Tecnico'])){
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

            if($ingreso==false){
                header('location:'.base_url.'clubes/gestionCrear&errorcreate=true');
            }else{
                header('location:'.base_url.'clubes/index');
            }
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }

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
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])|| iseet($_SESSION['Dirigente y D_Tecnico'])){
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
                if(!is_object($resultado)){
                    header('location:'.base_url.'clubes/gestionEditar&clubSeleccionado='.$_POST['idClub'].'&erroredit=true');
                }else{
                    $club->setIdDireccion($resultado['ID_DIRECCION']);
                }
            }else{
                $resultado = $direccion->obtenerDireccion();
                $club->setIdDireccion($resultado['ID_DIRECCION']);
            }
            $club->setIdClub($_POST['idClub']);
            $club->setRutClub($_POST['rutClub']);
            $club->setDvClub($_POST['dvClub']);
            $club->setNombreClub($_POST['nombreClub']);
            $club->setFechaFundacionClub($_POST['fechaFundacion']);
            $club->setNombreEstadio($_POST['nombreEstadio']);
            $club->setIdCorreo($_POST['correoClub']);
            $club->setIdAsociacion($_POST['nombreAsociacion']);
            $editar = $club->editarClub();

            if($editar==false){
                echo 'el false: '.$editar;
                header('location:'.base_url.'clubes/gestionCrear&erroredit=true');
            }else{
                header('location:'.base_url.'clubes/index');
                echo 'el else: '.$editar;
            }
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function eliminar(){
        $club = new Club();
        $club->setIdClub($_GET['idclub']);
        $club->setIdTipoEstado(2);
        $consulta = $club->eliminar();
        echo $consulta;
    }
}
