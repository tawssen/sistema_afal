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

}