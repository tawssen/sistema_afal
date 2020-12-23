<?php
require_once 'config/database.php';
class FechaCampeonato{

    private $id_fecha_campeonato;
    private $nombre_fecha;
    private $id_campeonato;
    
    // Geter y Seter IdFechaCampeonato
    public function getIdFechaCampeonato(){
        return $this->id_fecha_campeonato;
    }
    public function SetIdFechaCampeonato($id_fecha_campeonato){
        $this->id_fecha_campeonato = $id_fecha_campeonato;
    }
    // Geter y Seter NombreCampeonato
    public function getNombreCampeonato(){
        return $this->nombre_fecha;
    }
    public function SetNombreCampeonato($nombre_fecha){
        $this->nombre_fecha = $nombre_fecha;
    }
    // Geter y Seter IdCampeonato
    public function getIdCampeonato(){
        return $this->id_campeonato;
    }
    public function SetIdCampeonato($id_campeonato){
        $this->id_campeonato = $id_campeonato;
    }

}