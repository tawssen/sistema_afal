<?php

class Campeonato{
    
    private $id_campeonato;
    private $nombre_campeonato;
    private $fecha_inico;
    private $id_asociacion;
    private $id_serie;
    private $id_estado_campeonato;

    public function getIdCampeonato(){
        return $this->id_campeonato;
    }

    public function setIdCampeonato($id_campeonato){
        $this->id_campeonato = $id_campeonato;
    }

    public function getNombreCampeonato(){
        return $this->nombre_campeonato
    }

    public function setNombreCampeonato($nombre_campeonato){
        $this->nombre_campeonato = $nombre_campeonato;
    }

    public function getFechaInico(){
        return $this->fecha_inico;
    }

    public function setFechaInicio($fecha_inico){
        $this->fecha_inicio = $fecha_inico;
    }

    public function getIdAsociacion(){
        return $this->id_asociacion;
    }
    
    public function setIdAsociacion($id_asociacion){
        $this->id_asociacion = $id_asociacion;
    }

    public function getIdSerie(){
        return $this->id_serie;
    }

    public function setIdSerie($id_serie){
        $this->id_serie = $id_serie
    }

    public function getIdEstadoCampeonato(){
        return $this->id_estado_campeonato;
    }
    
    public function setIdEstadoCampeonato($id_estado_campeonato){
        $this->id_estado_campeonato = $id_estado_campeonato;
    }
}