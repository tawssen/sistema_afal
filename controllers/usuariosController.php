<?php
require_once 'models/usuario.php';
require_once 'models/persona.php';
require_once 'models/tipo_estado.php';
require_once 'config/parameters.php';
class usuariosController{

    public function index(){   

        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])|| iseet($_SESSION['Dirigente y D_Tecnico']) ){
            $usuario = new Usuario();
            $todosLosUsuarios = $usuario->obtenerUsuarios();
            include_once 'views/usuarios/usuarios.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
        
    }
    public function gestionEditar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])|| iseet($_SESSION['Dirigente y D_Tecnico']) ){
            if(!isset($_GET['in'])){
                $_SESSION['mensajeError'] = true;
            }else{
                unset($_SESSION['mensajeError']);
            }
            $usuario = new Usuario();
            $persona = new Persona();
            $estado = new Tipoestado();
            $todosLosEstados = $estado->obtenerEstados();
            $todasLasPersonas = $persona->obtenerPersona();  
            $usuarioSeleccionado = $usuario->obtenerUnUsuarios($_GET['id']);
            include_once 'views/usuarios/gestionUsuarios.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }
    public function editar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])|| iseet($_SESSION['Dirigente y D_Tecnico']) ){
            $usuario = new Usuario();
            $usuario->setIdUsuario($_POST['idUsuario']);
            $usuario->setNombreUsuario($_POST['nombreUsuario']);
            $ClaveEncriptada = password_hash($_POST['claveUsuario'], PASSWORD_DEFAULT);
            $usuario->setClaveUsuario($ClaveEncriptada);
            $usuario->setRutUsuario($_POST['rutPersona']);
            $usuario->setEstadoUsuario($_POST['tipoestado']);
             
            $respuesta = $usuario->editarUsuario();
            if($respuesta){
                header('location:'.base_url.'usuarios/index');
                exit;
            }else{
                header('location:'.base_url.'usuarios/gestionEditar&id='.$_GET['id']);
            }
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }
    public function eliminar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])|| iseet($_SESSION['Dirigente y D_Tecnico']) ){
                $usuario = new Usuario();
                $id = $_GET['idUsuario'];
                $estado = $_GET['estado'];
        
              
           
                $usuario->setIdUsuario($_GET['idUsuario']);
                $usuario->setEstadoUsuario($_GET['estado']);
                echo $id;
                echo $estado;
                echo $usuario->deshabilitarUsuario();
                header('location:'.base_url.'usuarios/index');
            
        }else{

        }
    }

}