<?php 

require_once 'config/database.php';

class Partido_Jugadores{

    private $id_partido_jugadores;
    private $id_partido_fk;
    private $rut_jugador_fk;
    private $numero_jugador;   

    public function getIdPartidoJugadores(){
        return $this->id_partido_jugadores;
    }

    public function setIdPartidoJugadores($id_partido_jugadores){
        $this->id_partido_jugadores = $id_partido_jugadores;
    }

    public function getIdPartidosFk(){
        return $this->id_partido_fk;
    }

    public function setIdPartidosFk($id_partido_fk){
        $this->id_partido_fk = $id_partido_fk;
    }

    public function getRutJugador(){
        return $this->rut_jugador_fk;
    }

    public function setRutJugador($rut_jugador_fk){
        $this->rut_jugador_fk = $rut_jugador_fk;
    }


    public function getNumeroJugador(){
        return $this->numero_jugador;
    }

    public function setNumeroJugador($numero_jugador){
        $this->numero_jugador = $numero_jugador;
    }

}