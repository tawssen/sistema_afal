<?php
require_once 'config/database.php';

class Tecnico{

    private $id_persona_tecnico;
    private $rut_persona;
    private $id_club;

    public function getIdPersonaTecnico(){
        return $this->id_persona_tecnico;
    }

    public function setIdPersonaTecnico($id_persona_tecnico){
        $this->id_persona_tecnico = $id_persona_tecnico;
    }

    public function getrutPersona(){
        return $this->rut_persona;
    }

    public function setrutPersona($rut_persona){
        $this->rut_persona = $rut_persona;
    }

    public function getidClub(){
        return $this->id_club;
    }

    public function setidClub($id_club){
        $this->id_club = $id_club;
    }
    
    public function obtenerTecnico(){
        $resultado = false;
        $database = Database::connect();
        $sql = "SELECT * FROM persona
        INNER JOIN direccion ON persona.ID_DIRECCION_FK = direccion.ID_DIRECCION 
        INNER JOIN comuna ON direccion.ID_COMUNA_FK = comuna.ID_COMUNA 
        INNER JOIN asociacion ON persona.ID_ASOCIACION_FK = asociacion.ID_ASOCIACION
        WHERE NOT EXISTS(SELECT NULL FROM PERSONA_TECNICO  WHERE PERSONA_TECNICO.RUT_PERSONA_FK = persona.RUT_PERSONA )AND ID_PERFIL_FK IN (2 , 5)";       
        $respuesta = $database->query($sql);

        if($respuesta){
            $resultado = $respuesta;
        }

        return $resultado;
    }


    public function aderirTecnicoClub(){
        $database = Database::connect();
        $rut = $this->getrutPersona();
        $id = $this->getidClub();
        $sql = "INSERT INTO PERSONA_TECNICO (RUT_PERSONA_FK, ID_CLUB_FK) VALUES ($rut,$id)";
        $respuesta = $database->query($sql);
        return $respuesta;
    }

    public function eliminarTecnico(){
        $database = Database::connect();
        $sql = "DELETE FROM PERSONA_TECNICO WHERE RUT_PERSONA_FK =".$this->getrutPersona();
        $respuesta = $database->query($sql);
        return $respuesta;
    }

    public function obtenerTecnicosPorClub(){
        $database = Database::connect();
        $sql = "SELECT * FROM PERSONA_TECNICO PT 
        INNER JOIN PERSONA P ON (PT.RUT_PERSONA_FK = P.RUT_PERSONA) WHERE ID_CLUB_FK =".$this->getidClub();
        $respuesta = $database->query($sql);
        return $respuesta;
    }

    public function obtenerDatosTecnicos(){
        $database = Database::connect();
        $sql = "SELECT * FROM PERSONA_TECNICO WHERE RUT_PERSONA_FK =".$this->getrutPersona();
        $datos = $database->query($sql);
        $respuesta = $datos->fetch_object();
        return $respuesta;
    }
}