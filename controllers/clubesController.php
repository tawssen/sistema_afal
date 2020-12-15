<?php
require_once 'models/club.php';
require_once 'models/asociacion.php';
require_once 'config/parameters.php';
require_once 'models/persona';

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
        //Lo primero es validar la dirección
        $persona = new Persona();
        $persona->setRutPersona();
        $persona->setDvpersona();
        $persona->setNombre1();
        $persona->setNombre2();
        $persona->setApellido1();
        $persona->setApellido2();
        $persona->setFechaNacimiento();
        $persona->setNumeroTelefono();
        $persona->setIdDireccion();
        $persona->setIdCorreo();
        $persona->setIdAsociacion();
        $persona->setIdPerfil();
        $persona->setIdTipoEstado();
    }

}
