<?php
require_once 'config/parameters.php';
require_once 'models/persona.php';
require_once 'models/perfil.php';
require_once 'models/asociacion.php';
require_once 'models/usuario.php';
require_once 'models/direccion.php';
require_once 'models/provincia.php';
require_once 'models/comuna.php';
require_once 'models/tipo_estado.php';
class personaController{

    public function index(){

        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])|| iseet($_SESSION['Dirigente y D_Tecnico']) ){
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

        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])|| iseet($_SESSION['Dirigente y D_Tecnico']) ){
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
            $usuario = new Usuario();

            $direccion->setCallePasaje($_POST['callePasaje']);
            $direccion->setComuna($_POST['comuna']);
            $direccion->setProvincia($_POST['provincia']);
            $direccion->setRegion($_POST['region']);
    
            $verificarDireccion = $direccion->verificarDireccion();
            if($verificarDireccion<1){
                $ingresar = $direccion->ingresarDireccion();
                $resultado = $direccion->obtenerDireccion();
                $persona->setIdDireccion($resultado['ID_DIRECCION']);
            }else{
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

            /*=============CREAR USUARIO================*/           
            $NombreUsuario = $_POST['rutPersona'].''.$_POST['dvPersona'];
            $ContraseñaUsuario = substr($_POST['rutPersona'], 0, 4); 
            $RutUsuario = $_POST['rutPersona'];

            $usuario->setNombreUsuario($NombreUsuario);
            $ClaveEncriptada = password_hash($ContraseñaUsuario, PASSWORD_DEFAULT);
            $usuario->setClaveUsuario($ClaveEncriptada);
            $usuario->setRutUsuario($RutUsuario);        
           
            if($_POST['perfilPersona'] == 4  || $_POST['perfilPersona'] == 6 || $_POST['perfilPersona'] == 7){              
                echo 'No se creó tal por cual el jugador.';
            }else{
                $respuesta = $usuario->crearUsuario();
            }
            /*==============================================================*/      
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
    
    public function gestionEditar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente']) || iseet($_SESSION['Dirigente y D_Tecnico'])){
            if(!isset($_GET['in'])){
                $_SESSION['mensajeError'] = true;
            }else{
                unset($_SESSION['mensajeError']);
            }
            $persona = new Persona();
            $persona->setRutPersona($_GET['id']);
            $perfil = new Perfil();
            $asociacion = new Asociacion();
            $provincia = new Provincia();
            $comuna = new Comuna();
            $estado = new Tipoestado();
            $datosdeunaPersona = $persona->obtenerUnPersona();


            $todosLosPerfiles = $perfil->obtenerPerfiles();
            $todasLasAsociaciones = $asociacion->obtenerAsociaciones();                                           
            $todosLosEstados = $estado->obtenerEstados();
            $todasLasProvincias = $provincia->obtenerProvinciasDeRegion($datosdeunaPersona['ID_REGION_FK']);
            $todasLasComunas = $comuna->obtenerComunasDeProvincia($datosdeunaPersona['ID_PROVINCIA_FK']);   
               
            include_once 'views/persona/gestionPersona.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }
    
    public function editar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente']) || iseet($_SESSION['Dirigente y D_Tecnico'])){
            $direccion = new Direccion();
            $persona = new Persona();                
    
            $direccion->setCallePasaje($_POST['callePasaje']);
            $direccion->setComuna($_POST['comuna']);
            $direccion->setProvincia($_POST['provincia']);
            $direccion->setRegion($_POST['region']);
    
            $verificarDireccion = $direccion->verificarDireccion();
            if($verificarDireccion<1){
                $ingresar = $direccion->ingresarDireccion();
                $resultado = $direccion->obtenerDireccion();
                $persona->setIdDireccion($resultado['ID_DIRECCION']);
            }else{
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
            $persona->setIdTipoEstado($_POST['tipoestado']);
            $respuesta = $persona->editarPersona();

            if($respuesta && isset($_GET['in'])){
                header('location:'.base_url.'persona/arbitros');
            }else if($respuesta){
                header('location:'.base_url.'persona/index');
            }else if($_GET['in']=="crear"){                
                header('location:'.base_url.'persona/gestionEditar&id='.$_POST['rutPersona']);
            }
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function eliminar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente']) || iseet($_SESSION['Dirigente y D_Tecnico'])){                        
            echo 'paso1: Entra al controlador';
            $persona = new Persona();
            $usuarios = new Usuario();   
             
            if(isset($_GET['rutPersona'])){ //se consulta si existe valor
                $persona->setRutPersona($_GET['rutPersona']);               
                $respuesta = $persona->eliminarPersona();

                if($respuesta == true){

                    $datos = $persona->obtenerUnPersona($_GET['rutPersona']);
                    $datosUsuario = $usuarios->obtenerUnUsuarioEliminar($_GET['rutPersona']);
                   
                    if($datos['ID_PERFIL_FK'] == 4 || $datos['ID_PERFIL_FK'] == 6 || $datos['ID_PERFIL_FK'] == 7){
                        header('location:'.base_url.'persona/index');   

                    }else{
                                                                                                   
                        $idEstadoUsuario = $datosUsuario['ID_TIPO_ESTADO_FK'];
                        $idEstadoPersona = $datos['ID_TIPO_ESTADO_FK_PERSONA'];                    

                        if($idEstadoPersona==2 && $idEstadoUsuario == 1){               
                            $usuarios->setRutUsuario($_GET['rutPersona']);                            
                            $usuarios->deshabilitarUsuarioConRut();                  
                            header('location:'.base_url.'persona/index');  
                        }
                      
                    }                   
                 
                }else{
                    echo 'No se a ejecutado Correctamente la consulta'; 
                }
              
            }else{
                echo 'No se a resibido valor por GET';
               
            }
                                                           
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }           
    }

    public function habilitarunapersona(){
        $persona = new Persona();             
        $usuario = new Usuario();   
        
        if(isset($_GET['rutHabilitar'])){
            $persona->setRutPersona($_GET['rutHabilitar']);        
            $respuesta = $persona->habilitarPersona();

            if($respuesta == true){
                $datosUsuario = $usuario->obtenerUnUsuarioEliminar($_GET['rutHabilitar']);
                $datos = $persona->obtenerUnPersona($_GET['rutHabilitar']);  

                if($datos['ID_PERFIL_FK'] == 4 || $datos['ID_PERFIL_FK'] == 6 || $datos['ID_PERFIL_FK'] == 7){
                     header('location:'.base_url.'persona/index');   

                }else{
                                                                                               
                    $idEstadoUsuario = $datosUsuario['ID_TIPO_ESTADO_FK'];
                    $idEstadoPersona = $datos['ID_TIPO_ESTADO_FK_PERSONA'];                  

                    if($idEstadoPersona==1 && $idEstadoUsuario == 2){               
                        $usuario->setRutUsuario($_GET['rutHabilitar']);
                        $usuario->habilitarUsuarioConRut();                  
                        header('location:'.base_url.'persona/index');  
                    }else{
        
                    }
                  
                }  
            }else{

            }

        }else{

        }
       
    }

    public function arbitros(){
        $arbitros = new Persona();
        $todosLosArbitros = $arbitros->obtenerArbitros();
        require_once 'views/persona/arbitros.php';
    }

    public function eliminarArbitro(){
        $persona = new Persona();
        $persona->setRutPersona($_GET['rut']);
        $respuesta = $persona->eliminarArbitro();
        header('location:'.base_url.'persona/arbitros');
    }
}