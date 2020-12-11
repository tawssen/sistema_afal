<?php

require_once 'config/database.php';

class Usuario{

    private $id_usuario;
    private $nombre_usuario;
    private $clave_usuario;
    private $rut_usuario;
    private $estado_usuario;

    public function getIdUsuario(){
        return $this->id_usuario;
    }
    
    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function getNombreUsuario(){
        return $this->nombre_usuario;
    }

    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function getClaveUsuario(){
        return $this->clave_usuario;
    }

    public function setClaveUsuario($clave_usuario)
    {
        $this->clave_usuario = $clave_usuario;
    }
    
    public function getRutUsuario(){
        return $this->rut_usuario;
    }

    public function setRutUsuario($rut_usuario)
    {
        $this->rut_usuario = $rut_usuario;
    }
    
    public function getEstadoUsuario(){
        return $this->estado_usuario;
    }

    public function setEstadoUsuario($estado_usuario)
    {
        $this->estado_usuario = $estado_usuario;
    }

    public function validarUsuario(){
         
        $result = false;
        $user = $this->nombre_usuario;
        $clave = $this->clave_usuario;

        $database = Database::connect();
        $sql = "SELECT * FROM usuarios inner join persona on (usuarios.RUT_PERSONA_FK = persona.RUT_PERSONA) where NOMBRE_USUARIO = '$user'";
        $login = $database->query($sql);
        if($login && $login->num_rows == 1)
        {
            $usuario = $login->fetch_object();
            $clave_obtenida = $usuario->CLAVE_USUARIO;         

            //verificar contraseña
            $Contraseña_verificada = password_verify($clave, $clave_obtenida);
            if($Contraseña_verificada){
                $result = $usuario;
            }
            
        }
   
        return $result;
       
    }
}

?>