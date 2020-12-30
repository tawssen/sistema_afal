<?php
require_once 'config/database.php';

class Partido{

    private $id_partido;
    private $fecha_date;
    private $fecha_campeonato;
    private $id_club_local;
    private $id_club_visita;
    private $rut_turno; // apunta a la tabla persona aquellas personas que cuenten con perfil turno
    private $rut_persona_arbitro_1; 
    private $rut_persona_arbitro_2; 
    private $rut_persona_arbitro_3; 
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
    public function getFechaCampeonato(){
        return $this->id_fecha_campeonato;
    }
    public function setFechaCampeonato($id_fecha_campeonato){
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
    public function getRutArbitro1(){
        return $this->rut_persona_arbitro_1;
    }
    public function setRutArbitro1($rut_persona_arbitro_1){
        $this->rut_persona_arbitro_1 = $rut_persona_arbitro_1;
    }

    public function getRutArbitro2(){
        return $this->rut_persona_arbitro_2;
    }
    public function setRutArbitro2($rut_persona_arbitro_2){
        $this->rut_persona_arbitro_2 = $rut_persona_arbitro_2;
    }

    public function getRutArbitro3(){
        return $this->rut_persona_arbitro_3;
    }
    public function setRutArbitro3($rut_persona_arbitro_3){
        $this->rut_persona_arbitro_3 = $rut_persona_arbitro_3;
    }

    // Geter Y Seter IdDireccion
    public function getIdDireccion(){
        return $this->id_direccion;
    }

    public function setIdDireccion($id_direccion){
        $this->id_direccion = $id_direccion;
    }

    public function getIdCampeonato(){
        return $this->id_campeonato;
    }

    public function setIdCampeonato($id_campeonato){
        $this->id_campeonato = $id_campeonato;
    }

    public function obtenerPartidos(){
        $database = Database::connect();
        $sql = "SELECT * FROM partidos";
        $respuesta = $database->query($sql);
        return $respuesta;
    }

    public function obtenerPartidosDeCampeonato(){
        $database = Database::connect();
        $sql = 'SELECT ID_PARTIDO, FECHA_DATE, FECHA_CAMPEONATO AS FECHA_STRING, CL.NOMBRE_CLUB AS CLUB_LOCAL,  CV.NOMBRE_CLUB AS CLUB_VISITA,
        CONCAT(PT.NOMBRE_1," ",PT.NOMBRE_2," ",PT.APELLIDO_1," ",PT.APELLIDO_2) AS NOMBRE_TURNO,
        CONCAT(NOMBRE_COMUNA," ", CALLE_PASAJE) AS DIRECCION,
        NOMBRE_CAMPEONATO from PARTIDOS
        INNER JOIN CLUB CL ON (PARTIDOS.ID_CLUB_LOCAL_FK = CL.ID_CLUB)
        INNER JOIN CLUB CV ON (PARTIDOS.ID_CLUB_VISITA_FK = CV.ID_CLUB)
        INNER JOIN PERSONA PT ON (PARTIDOS.RUT_PERSONA_TURNO_FK = PT.RUT_PERSONA)
        INNER JOIN DIRECCION ON (PARTIDOS.ID_DIRECCION_FK = DIRECCION.ID_DIRECCION)
        INNER JOIN COMUNA ON (DIRECCION.ID_COMUNA_FK = COMUNA.ID_COMUNA)
        INNER JOIN CAMPEONATO ON (PARTIDOS.ID_CAMPEONATO_FK = CAMPEONATO.ID_CAMPEONATO)WHERE partidos.ID_CAMPEONATO_FK ='.$this->getIdCampeonato();
        $respuesta = $database->query($sql);
        return $respuesta;
    }

    public function crearPartido(){
        $database = Database::connect();
        $sql = "";
        $resultado = false;
        
        $sql = "INSERT INTO partidos (FECHA_DATE,FECHA_CAMPEONATO,ID_CLUB_LOCAL_FK,ID_CLUB_VISITA_FK,RUT_PERSONA_TURNO_FK,RUT_PERSONA_ARBITRO_1,ID_DIRECCION_FK,ID_CAMPEONATO_FK) VALUES ()";
        $respuesta = $database->query($sql);
        if($respuesta){
            $resultado = $respuesta;
        }
        return  $resultado;
    }
}