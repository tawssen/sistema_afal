<?php
require_once 'config/parameters.php';
require_once 'models/persona.php';
require_once 'models/perfil.php';
require_once 'models/asociacion.php';
require_once 'models/direccion.php';
class personaController{

    public function index(){

        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            if(!isset($_GET['in'])){
                $_SESSION['mensajeError'] = true;
            }else{
                unset($_SESSION['mensajeError']);
            }
            $persona = new Persona();
            $todasLasPersonas = $persona->obtenerPersona();
            include_once 'views/persona/persona.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function gestionCrear(){

        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
              if(!isset($_GET['in'])){
                $_SESSION['mensajeError'] = true;
            }else{
                unset($_SESSION['mensajeError']);
            }
            $persona = new Persona();
            $perfil = new Perfil();
            $asociacion = new Asociacion();
            $todasLasPersonas = $persona->obtenerPersona();
            $todosLosPerfiles = $perfil->obtenerPerfiles();
            $todasLasAsociaciones = $asociacion->obtenerAsociaciones();
            include_once 'views/persona/gestionPersona.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }
    
    public function crear(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $direccion = new Direccion();
            $persona = new Persona();
            $direccion->setCallePasaje($_POST['callePasaje']);
            $direccion->setComuna($_POST['comuna']);
            $direccion->setProvincia($_POST['provincia']);
            $direccion->setRegion($_POST['region']);
    
            $verificarDireccion = $direccion->verificarDireccion();
            if($verificarDireccion<1){
                echo 'ingreso para poder insertar nueva direccion';
                $ingresar = $direccion->ingresarDireccion();
                $resultado = $direccion->obtenerDireccion();
                $persona->setIdDireccion($resultado['ID_DIRECCION']);
            }else{
                echo 'ingreso para poder obtener la direccion';
                $resultado = $direccion->obtenerDireccion();                
                $persona->setIdDireccion($resultado['ID_DIRECCION']);
            }
           $persona->setRutPersona($_POST['rutPersona']);
            $persona->setDvpersona($_POST['dvPersona']);
            $persona->setNombre1($_POST['nombrePersona1']);
            $persona->setNombre2($_POST['nombrePersona2']);
            $persona->setApellido1($_POST['apellidoPersona1']);
            $persona->setApellido2($_POST['apellidoPersona2']);
            $persona->setFechaNacimiento($_POST['fechaNacimiento']);
            $persona->setNumeroTelefono($_POST['numeroTelefono']);
            $persona->setCorreo($_POST['correoElectronico']);
            $persona->setIdAsociacion($_POST['nombreAsociacion']);
            $persona->setIdPerfil($_POST['perfilPersona']);
    
            $respuesta = $persona->ingresarPersona();
            if($respuesta){
                header('location:'.base_url.'persona/index');
                exit;
            }else{
                header('location:'.base_url.'persona/gestionCrear');
            }
            
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
     
    }
}