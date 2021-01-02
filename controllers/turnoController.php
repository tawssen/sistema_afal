<?php
require_once 'config/parameters.php';
require_once 'config/database.php';
require_once 'models/partido.php';

class turnoController{

    public function index(){
        $identity = $_SESSION['identity'];
        $partidos = new Partido();
        $partidos->setRutTurno($identity->RUT_PERSONA_FK);
        $partidosTurno = $partidos->obtenerPartidosTurno();
        require_once 'views/turno/inicio.php';
    }
}