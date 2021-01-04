<?php 

require_once 'config/database.php';

class Tipo_Gol{

    private $id_tipo_gol;
    private $nombre_tipo_gol;

    public function getIdTipoGol(){
        return $this->id_tipo_gol;
    }

    public function setIdIdTipoGol($id_tipo_gol){
        $this->id_tipo_gol = $id_tipo_gol;
    }

    public function getNombreTipoGol(){
        return $this->nombre_tipo_gol;
    }

    public function setNombreTipoGol($nombre_tipo_gol){
        $this->nombre_tipo_gol = $nombre_tipo_gol;
    }
}