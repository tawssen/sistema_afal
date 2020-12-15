<?php 

class Direccion{
    private $id_direccion;
    private $calle_pasaje;
    private $id_comuna_fk;
    private $id_provincia_fk;
    private $id_region_fk;

    public function getIdDireccion(){
        return $this->id_direccion;
    }

    public function setIdDireccion($id_direccion){
        $this->id_direccion = $id_direccion;
    }

    public function getCallePasaje(){
        return $this->calle_pasaje;
    }
    public function setCallePasaje($calle_pasaje){
        $this->calle_pasaje = $calle_pasaje;
    }

    public function getIdComuna(){
        return $this->id_comuna_fk;
    }
    public function setComuna($id_comuna_fk){
        $this->id_comuna_fk = $id_comuna_fk;
    }

    public function getIdProvincia(){
        return $this->id_provincia_fk;
    }
    public function setProvincia($id_provincia_fk){
        $this->id_provincia_fk = $id_provincia_fk;
    }

    public function getIdRegion(){
        return $this->id_region_fk;
    }
    public function setRegion($id_region_fk){
        $this->id_region_fk = $id_region_fk;
    }

    public function obtenerDirecciones(){
        $resultado = false;
        $database = Database::connect();
        $condicion = 1;
        $sql = "SELECT * FROM campeonato INNER JOIN asociacion ON campeonato.ID_ASOCIACION_FK = asociacion.ID_ASOCIACION INNER JOIN serie ON campeonato.ID_SERIE_FK = serie.ID_SERIE INNER JOIN estado_campeonato ON campeonato.ID_ESTADO_CAMPEONATO_FK = estado_campeonato.ID_ESTADO_CAMPEONATO WHERE ID_ESTADO_CAMPEONATO_FK = $condicion";

        $respuesta = $database->query($sql);

        if($respuesta){
            $resultado = $respuesta;
        }

        return $resultado;
    }
}