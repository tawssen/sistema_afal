<?php
require_once 'config/database.php';

class Tecnico_Serie{

    private $id_tecnico_serie;
    private $rut_persona;
    private $id_serie;

    public function getIdTecnicoSerie(){
        return $this->id_tecnico_serie;
    }

    public function setIdTecnicoSerie($id_tecnico_serie){
        $this->id_tecnico_serie = $id_tecnico_serie;
    }

    public function getrutPersona(){
        return $this->rut_persona;
    }

    public function setrutPersona($rut_persona){
        $this->rut_persona = $rut_persona;
    }

    public function getIdSerie(){
        return $this->id_serie;
    }

    public function setIdSerie($id_serie){
        $this->id_serie = $id_serie;
    }

}