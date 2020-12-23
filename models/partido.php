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
    public function setIdArbitrosPartido($id_arbitros_partido){
        $this->id_arbitros_partido = $id_arbitros_partido;
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
        $sql = 'SELECT ID_PARTIDO, FECHA_DATE, NOMBRE_FECHA AS FECHA_STRING, CL.NOMBRE_CLUB AS CLUB_LOCAL,  CV.NOMBRE_CLUB AS CLUB_VISITA,
        CONCAT(PT.NOMBRE_1," ",PT.NOMBRE_2," ",PT.APELLIDO_1," ",PT.APELLIDO_2) AS NOMBRE_TURNO,
        CONCAT(PA.NOMBRE_1," ",PA.NOMBRE_2," ",PA.APELLIDO_1," ",PA.APELLIDO_2) AS NOMBRE_ARBITRO_1,
        CONCAT(NOMBRE_COMUNA," ", CALLE_PASAJE) AS DIRECCION,
        NOMBRE_CAMPEONATO from PARTIDOS
        INNER JOIN FECHA_CAMPEONATO ON (PARTIDOS.ID_FECHA_CAMPEONATO_FK = FECHA_CAMPEONATO.ID_FECHA_CAMPEONATO)
        INNER JOIN CLUB CL ON (PARTIDOS.ID_CLUB_LOCAL_FK = CL.ID_CLUB)
        INNER JOIN CLUB CV ON (PARTIDOS.ID_CLUB_VISITA_FK = CV.ID_CLUB)
        INNER JOIN PERSONA PT ON (PARTIDOS.RUT_PERSONA_TURNO_FK = PT.RUT_PERSONA)
        INNER JOIN PARTIDO_ARBITROS ON (PARTIDOS.ID_ARBITROS_PARTIDO_FK = PARTIDO_ARBITROS.ID_PARTIDO_ARBITRO)
        INNER JOIN PERSONA PA ON (PARTIDO_ARBITROS.RUT_PERSONA_FK_ARBITRO1 = PA.RUT_PERSONA)
        INNER JOIN DIRECCION ON (PARTIDOS.ID_DIRECCION_FK = DIRECCION.ID_DIRECCION)
        INNER JOIN COMUNA ON (DIRECCION.ID_COMUNA_FK = COMUNA.ID_COMUNA)
        INNER JOIN CAMPEONATO ON (PARTIDOS.ID_CAMPEONATO_FK = CAMPEONATO.ID_CAMPEONATO)WHERE partidos.ID_CAMPEONATO_FK ='.$this->getIdCampeonato();
        $respuesta = $database->query($sql);
        return $respuesta;
    }
}