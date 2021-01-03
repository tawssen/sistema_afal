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
    private $nombre_estadio;
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
        return $this->fecha_campeonato;
    }
    public function setFechaCampeonato($fecha_campeonato){
        $this->fecha_campeonato = $fecha_campeonato;
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

    public function getNombreEstadio(){
        return $this->nombre_estadio;
    }

    public function setNombreEstadio($nombre_estadio){
        $this->nombre_estadio = $nombre_estadio;
    }

    public function getIdCampeonato(){
        return $this->id_campeonato;
    }

    public function setIdCampeonato($id_campeonato){
        $this->id_campeonato = $id_campeonato;
    }

    public function obtenerPartidos(){
        $database = Database::connect();
        $sql = "SELECT * FROM partidoS 
        INNER JOIN campeonato ON partidos.ID_CAMPEONATO_FK = campeonato.ID_CAMPEONATO
        WHERE campeonato.ID_ESTADO_CAMPEONATO_FK = 2";
        $respuesta = $database->query($sql);
        return $respuesta;
    }

    public function obtenerPartidosDeCampeonato(){
        $database = Database::connect();
        $sql = 'SELECT ID_PARTIDO, FECHA_DATE, PA.RUT_PERSONA AS RUT_ARBITRO, FECHA_CAMPEONATO AS FECHA_STRING, CL.NOMBRE_CLUB AS CLUB_LOCAL,  CV.NOMBRE_CLUB AS CLUB_VISITA,
        CONCAT(PT.NOMBRE_1," ",PT.NOMBRE_2," ",PT.APELLIDO_1," ",PT.APELLIDO_2) AS NOMBRE_TURNO,
        CONCAT(PA.NOMBRE_1," ",PA.NOMBRE_2," ",PA.APELLIDO_1," ",PA.APELLIDO_2) AS NOMBRE_ARBITRO,
        ID_ESTADO_CAMPEONATO_FK
        from PARTIDOS
        INNER JOIN CLUB CL ON (PARTIDOS.ID_CLUB_LOCAL_FK = CL.ID_CLUB)
        INNER JOIN CLUB CV ON (PARTIDOS.ID_CLUB_VISITA_FK = CV.ID_CLUB)
        INNER JOIN PERSONA PT ON (PARTIDOS.RUT_PERSONA_TURNO_FK = PT.RUT_PERSONA)
        INNER JOIN PERSONA PA ON (PARTIDOS.RUT_PERSONA_ARBITRO_1 = PA.RUT_PERSONA)
        INNER JOIN CAMPEONATO ON (PARTIDOS.ID_CAMPEONATO_FK = CAMPEONATO.ID_CAMPEONATO)WHERE partidos.ID_CAMPEONATO_FK ='.$this->getIdCampeonato();
        $respuesta = $database->query($sql);
        return $respuesta;
    }

    public function crearPartido(){
        $database = Database::connect();
        $sql = "";
        $resultado = false;
        
        if($this->getRutArbitro1()>0 && $this->getRutArbitro2()<1 && $this->getRutArbitro3()<1){
            $sql = 'INSERT INTO partidos (FECHA_DATE,FECHA_CAMPEONATO,ID_CLUB_LOCAL_FK,ID_CLUB_VISITA_FK,RUT_PERSONA_TURNO_FK,RUT_PERSONA_ARBITRO_1,RUT_PERSONA_ARBITRO_2,RUT_PERSONA_ARBITRO_3,NOMBRE_ESTADIO,ID_CAMPEONATO_FK,ID_ESTADO_PARTIDO_FK) VALUES 
            ("'.$this->getFechaDate().'","'.$this->getFechaCampeonato().'",'.$this->getIdCLubLocal().','.$this->getIdCLubVisita().','.$this->getRutTurno().','.$this->getRutArbitro1().',null,null,"'.$this->getNombreEstadio().'",'.$this->getIdCampeonato().',DEFAULT)';

        }elseif($this->getRutArbitro1()>0 && $this->getRutArbitro2()>0 && $this->getRutArbitro3()<1){
            $sql = 'INSERT INTO partidos (FECHA_DATE,FECHA_CAMPEONATO,ID_CLUB_LOCAL_FK,ID_CLUB_VISITA_FK,RUT_PERSONA_TURNO_FK,RUT_PERSONA_ARBITRO_1,RUT_PERSONA_ARBITRO_2,RUT_PERSONA_ARBITRO_3,NOMBRE_ESTADIO,ID_CAMPEONATO_FK,ID_ESTADO_PARTIDO_FK) VALUES 
            ("'.$this->getFechaDate().'","'.$this->getFechaCampeonato().'",'.$this->getIdCLubLocal().','.$this->getIdCLubVisita().','.$this->getRutTurno().','.$this->getRutArbitro1().','.$this->getRutArbitro2().',null,"'.$this->getNombreEstadio().'",'.$this->getIdCampeonato().',DEFAULT)';

        }elseif($this->getRutArbitro1()>0 && $this->getRutArbitro2()>0 && $this->getRutArbitro3()>0){
            $sql = 'INSERT INTO partidos (FECHA_DATE,FECHA_CAMPEONATO,ID_CLUB_LOCAL_FK,ID_CLUB_VISITA_FK,RUT_PERSONA_TURNO_FK,RUT_PERSONA_ARBITRO_1,RUT_PERSONA_ARBITRO_2,RUT_PERSONA_ARBITRO_3,NOMBRE_ESTADIO,ID_CAMPEONATO_FK,ID_ESTADO_PARTIDO_FK) VALUES 
            ("'.$this->getFechaDate().'","'.$this->getFechaCampeonato().'",'.$this->getIdCLubLocal().','.$this->getIdCLubVisita().','.$this->getRutTurno().','.$this->getRutArbitro1().','.$this->getRutArbitro2().','.$this->getRutArbitro3().',"'.$this->getNombreEstadio().'",'.$this->getIdCampeonato().',DEFAULT)';
        }

        $respuesta = $database->query($sql);
        if($respuesta){
            $resultado = $respuesta;
        }
        return $resultado;
    }
    
    public function obtenerPartidosTurno(){
        $database = Database::connect();
        $sql = 'SELECT ID_PARTIDO, FECHA_DATE, PA.RUT_PERSONA AS RUT_ARBITRO, FECHA_CAMPEONATO AS FECHA_STRING, CL.NOMBRE_CLUB AS CLUB_LOCAL,  CV.NOMBRE_CLUB AS CLUB_VISITA,
        PT.RUT_PERSONA AS RUT_TURNO,
        CONCAT(PA.NOMBRE_1," ",PA.NOMBRE_2," ",PA.APELLIDO_1," ",PA.APELLIDO_2) AS NOMBRE_ARBITRO,
        ID_ESTADO_CAMPEONATO_FK
        from PARTIDOS
        INNER JOIN CLUB CL ON (PARTIDOS.ID_CLUB_LOCAL_FK = CL.ID_CLUB)
        INNER JOIN CLUB CV ON (PARTIDOS.ID_CLUB_VISITA_FK = CV.ID_CLUB)
        INNER JOIN PERSONA PT ON (PARTIDOS.RUT_PERSONA_TURNO_FK = PT.RUT_PERSONA)
        INNER JOIN PERSONA PA ON (PARTIDOS.RUT_PERSONA_ARBITRO_1 = PA.RUT_PERSONA)
        INNER JOIN CAMPEONATO ON (PARTIDOS.ID_CAMPEONATO_FK = CAMPEONATO.ID_CAMPEONATO) WHERE PT.RUT_PERSONA ='.$this->getRutTurno();
        $respuesta = $database->query($sql);
        return $respuesta;
    }
}