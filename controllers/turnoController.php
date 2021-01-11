<?php
require_once 'config/parameters.php';
require_once 'config/database.php';
require_once 'models/partido.php';
require_once 'models/partido_jugadores.php';

class turnoController{

    public function index(){
        $identity = $_SESSION['identity'];
        $partidos = new Partido();
        $partidos->setRutTurno($identity->RUT_PERSONA_FK);
        $partidosTurno = $partidos->obtenerPartidosTurno();
        require_once 'views/turno/inicio.php';
    }

    public function gestionPartidos(){
        $partidoJugadores = new Partido_Jugadores();
        $partidoJugadores->setIdPartidosFk($_GET['partido']);
        $partido = new Partido();
        $partido->setIdPartido($_GET['partido']);
        $datosPartido = $partido->obtenerUnPartido();
        $jugadoresLocal = $partidoJugadores->obtenerJugadoresLocal($datosPartido->ID_CLUB_LOCAL_FK);
        $jugadoresVisita = $partidoJugadores->obtenerJugadoresVisita($datosPartido->ID_CLUB_VISITA_FK);
        $datosClubTecnico = $partidoJugadores->datosPartidosClubes($datosPartido->ID_SERIE_FK);
        require_once 'views/turno/gestionPartidos.php';
    }
}