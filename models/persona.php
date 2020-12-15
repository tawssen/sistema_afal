<?php

class Persona{
    
    private $rut_persona;
    private $dv_persona;
    private $nombre_1;
    private $nombre_2;
    private $apellido_1;
    private $apellido_2;
    private $fecha_nacimiento;
    private $numero_telefono;
    private $id_direccion;
    private $id_correo;
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
        public function getIdDireccion(){
            return $this->id_direccion;
        }
        public function setIdDireccion($id_direccion){
            $this->id_direccion = $id_direccion;
        }
        public function getIdCorreo(){
            return $this->id_correo;
        }
        public function setIdCorreo($id_correo){
            $this->id_correo = $id_correo;
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
        public function setIdPerfil(){
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
}