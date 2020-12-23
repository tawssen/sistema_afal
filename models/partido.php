<?php
require_once 'config/database.php';
class Partido{

    private $id_partido;
    private $fecha_date;
    private $id_fecha_campeonato;
    private $id_club_local;
    private $id_club_visita;
    private $rut_turno; // apunta a la tabla persona aquellas personas que cuenten con perfil turno
    private $id_arbitros_partido; 
    private $id_direccion;
    private $id_campeonato;
    
    // Geter y Seter FechaDate
    public function getFechaDate(){
        return $this->fecha_date;
    }
    public function setFechaDate($fecha_date){
          $this->fecha_date = $fecha_date;
    }
    
    // Geter y Seter IdFechaCampeonato
    public function getIdFechaCampeonato(){
        return $this->id_fecha_campeonato;
    }
    public function setIdFechaCampeonato($id_fecha_campeonato){
        $this->id_fecha_campeonato = $id_fecha_campeonato;
    }
     
    // Geter y Seter IdCLubLocal
    public function getIdCLubLocal(){
        return $this->id_club_local;
    }
    public function setIdCLubLocal($id_club_local){
        $this->id_club_local = $id_club_local;
    }
    
    // Geter y Seter IdCLubVisita
    public function getIdCLubVisita(){
        return $this->id_club_visita;
    }
    public function setIdCLubVisita($id_club_visita){
        $this->id_club_visita = $id_club_visita;
    }
    
    // Geter y Seter RutTurno
    public function getRutTurno(){
        return $this->rut_turno;
    }
    public function setRutTurno($rut_turno){
        $this->rut_turno = $rut_turno;
    }

    // Geter Y Seter IdArbitrosPartido
    public function getIdArbitrosPartido(){
        return $this->id_arbitros_partido;
    }
    public function IdArbitrosPartido($id_arbitros_partido){
        $this->id_arbitros_partido = $id_arbitros_partido;
    }

    // Geter Y Seter IdDireccion
    public function getIdDireccion(){
        return $this->id_direccion;
    }
    public function SetIdDireccion($id_campeonato){
        $this->id_campeonato = $id_campeonato;
    }

    public function obtenerPartidos(){
        $database = Database::connect();
        $sql = "SELECT * FROM partidos";
        $respuesta = $database->query($sql);
        return $respuesta;
    }
}