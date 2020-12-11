<?php

require_once 'config/database.php';
class Club{

    private $id_club;
    private $rut_club;
    private $dv_club;
    private $nombre_club;
    private $fecha_fundacion_club;
    private $giro;
    private $nombre_estadio;
    private $id_direccion;
    private $id_correo;
    private $id_asociacion;
    private $id_tipo_estado;

    public function getIdClub(){
        return $this->id_club;
    }
        
    public function setIdClub($id_club){
        $this->id_club = $id_club;
    }

    public function getRutClub(){
        return $this->rut_club;
    }

    public function setRutClub($rut_club){
        $this->rut_club = $rut_club;
    }

    public function getDvClub(){
        return $this->dv_club;
    }

    public function setDvClub($dv_club){
        $this->dv_club = $dv_club;
    }
        
    public function getNombreClub(){
        return $this->nombre_club;
    }

    public function setNombreClub($nombre_club)
    {
        $this->nombre_club = $nombre_club;
    }
    
    public function getFechaFundacionClub(){
        return $this->fecha_fundacion_club;
    }

    public function setFechaFundacionClub($fecha_fundacion_club)
    {
        $this->fecha_fundacion_club = $fecha_fundacion_club;
    }

    public function getGiro(){
        return $this->giro;
    }

    public function setGiro($giro)
    {
        $this->giro = $giro;
    }

    public function getNombreEstadio(){
        $this->nombre_estadio;
    }

    public function setNombreEstadio($nombre_estadio){
        $this->nombre_estadio = $nombre_estadio;
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

    public function getIdTipoEstado(){
        return $this->id_tipo_estado;
    }
    
    public function setIdTipoEstado($id_tipo_estado){
        $this->id_tipo_estado = $id_tipo_estado;
    }

    public function obtenerClubes(){
        $sql = "select * from club
        inner join direccion on(club.ID_DIRECCION_FK = direccion.ID_DIRECCION)
        inner join correo on(club.ID_CORREO_FK = correo.ID_CORREO)
        inner join asociacion on(club.ID_ASOCIACION_FK = asociacion.ID_ASOCIACION)
        inner join tipo_estado on(club.ID_TIPO_ESTADO_FK = tipo_estado.ID_TIPO_ESTADO)";
        $database = Database::connect();
        $datosObtenidosClubes = $database->query($sql);
        return $datosObtenidosClubes;
    }
    

}