<?php
require_once 'config/database.php';
class Persona{
    
    private $rut_persona;
    private $dv_persona;
    private $nombre_1;
    private $nombre_2;
    private $apellido_1;
    private $apellido_2;
    private $fecha_nacimiento;
    private $numero_telefono;
    private $correo;
    private $id_direccion;
    private $id_asociacion;
    private $id_perfil;
    private $id_tipo_estado;

        public function getRutPersona(){
            return $this->rut_persona;
        }
        public function setRutPersona($rut_persona){
            $this->rut_persona = $rut_persona;
        }
        public function getDvPersona(){
            return $this->dv_persona;
        }
        public function setDvpersona($dv_persona){
            $this->dv_persona = $dv_persona;
        }     
        public function getNombre1(){
            return $this->nombre_1;
        }
        public function setNombre1($nombre_1){
            $this->nombre_1 = $nombre_1;
        }
        public function getNombre2(){
            return $this->nombre_2;
        }
        public function setNombre2($nombre_2){
            $this->nombre_2 = $nombre_2;
        }
        public function getApellido1(){
            return $this->apellido_1;
        }
        public function setApellido1($apellido_1){
            $this->apellido_1 = $apellido_1;   
        }
        public function getApellido2(){
            return $this->apellido_2;
        }
        public function setApellido2($apellido_2){
            $this->apellido_2 = $apellido_2;   
        }
        public function getFechaNacimiento(){
            return $this->fecha_nacimiento;
        }
        public function setFechaNacimiento($fecha_nacimiento){
            $this->fecha_nacimiento = $fecha_nacimiento;
        }
        public function getNumeroTelefono(){
            return $this->numero_telefono;
        }
        public function setNumeroTelefono($numero_telefono){
            $this->numero_telefono = $numero_telefono;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function setCorreo($correo){
            $this->correo = $correo;
        }
        public function getIdDireccion(){
            return $this->id_direccion;
        }
        public function setIdDireccion($id_direccion){
            $this->id_direccion = $id_direccion;
        }
        public function getIdAsociacion(){
            return $this->id_asociacion;
        }
        public function setIdAsociacion($id_asociacion){
            $this->id_asociacion = $id_asociacion;
        }
        public function getIdPerfil(){
            return $this->id_perfil;    
        }
        public function setIdPerfil($id_perfil){
            $this->id_perfil = $id_perfil;
        }
        public function getIdTipoEstado(){
            return $this->id_tipo_estado;
        }
        public function setIdTipoEstado($id_tipo_estado){
            $this->id_tipo_estado = $id_tipo_estado;
        }


        public function obtenerPersona(){
            $sql = "SELECT * FROM PERSONA";
            $database = Database::connect();
            $datosObtenidosPersona = $database->query($sql);
            return $datosObtenidosPersona;

        }
        public function ingresarPersona(){
            $database = Database::connect();

            $rut = $this->getRutPersona();
            $dv = $this->getDvPersona();
            $nom_1 = $this->getNombre1();
            $nom_2 = $this->getNombre2();
            $ape_1 = $this->getApellido1();
            $ape_2 = $this->getApellido2();
            $fechaN = $this->getFechaNacimiento();
            $num_tel = $this->getNumeroTelefono();
            $correo = $this->getCorreo();
            $direc = $this->getIdDireccion();
            $asoc = $this->getIdAsociacion();
            $perf = $this->getIdPerfil();
            $t_estado = 1;
            
           

            $sql = "INSERT INTO persona (RUT_PERSONA,DV,NOMBRE_1,NOMBRE_2,APELLIDO_1,APELLIDO_2,FECHA_NACIMIENTO,NUMERO_TELEFONO,CORREO_ELECTRONICO,ID_DIRECCION_FK,ID_ASOCIACION_FK,ID_PERFIL_FK,ID_TIPO_ESTADO_FK) 
            VALUES ($rut,$dv,'$nom_1','$nom_2','$ape_1','$ape_2','$fechaN',$num_tel,'$correo',$direc,$asoc,$perf,$t_estado)";
            $respuesta = $database->query($sql);
            return 'Esta es la consulta'. $sql;
        }
}