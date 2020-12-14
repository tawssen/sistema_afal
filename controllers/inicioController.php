<?php

require_once 'models/usuario.php';
require_once 'config/parameters.php';
class inicioController{

    public function index(){
        require_once 'views/inicio/inicio.php';
    }

    public function iniciarsesion(){
            
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setNombreUsuario($_POST['usuario']);
            $usuario->setClaveUsuario($_POST['clave']);
            $identity = $usuario->validarUsuario();
            
            
            if($identity && is_object($identity)){
                
                $_SESSION['identity'] = $identity;
                
                if($identity->ID_PERFIL_FK == 1){                        
                    $_SESSION['Dirigente'] = true;                        
                    header("Location:".base_url);
                }elseif($identity->ID_PERFIL_FK == 2){
                    $_SESSION['D_Tecnico'] = true;
                    header("Location:".base_url);
                }elseif($identity->ID_PERFIL_FK == 3){
                    $_SESSION['Turno'] = true;
                    header("Location:".base_url);
                }elseif($identity->ID_PERFIL_FK == 4){
                    $_SESSION['Dirigente y D_Tecnico'] = true;
                    header("Location:".base_url);
                }
            }else{
                $_SESSION['Error_InicioSesion'] = 'No se han encontrado datos';
                echo 'No se han encontrado sus datos';
            }
        }                                    
    }

    public function cerrarsesion(){
        if(isset($_SESSION['identity'])){
             unset($_SESSION['identity']);
        }
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
       }
       header('location:'.base_url);
    }

}

?>