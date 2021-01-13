<?php
require_once 'config/parameters.php';
require_once 'config/database.php';
require_once 'models/partido.php';
require_once 'models/partido_jugadores.php';
require_once 'models/tipo_gol.php';
require_once 'models/tipo_falta.php';
require_once 'models/tipo_tarjeta.php';
require_once 'models/estado_partido.php';

class turnoController{

    public function index(){
        $identity = $_SESSION['identity'];
        $partidos = new Partido();
        $estados = new Estado_Partido();
        $estadoPartidos = $estados->obtenerEstados();
        $partidos->setRutTurno($identity->RUT_PERSONA_FK);
        $partidosTurno = $partidos->obtenerPartidosTurno();
        require_once 'views/turno/inicio.php';
    }

    public function gestionPartidos(){
        /*CLASES*/
        $partidoJugadores = new Partido_Jugadores();
        $partido = new Partido();
        $tipoGol = new Tipo_Gol();
        $tipotarjeta = new Tipo_Targeta();
        $tipofalta = new Tipo_Falta();
        /*===================================================*/
        $partidoJugadores->setIdPartidosFk($_GET['partido']);
        $partido->setIdPartido($_GET['partido']);

        $datosPartido = $partido->obtenerUnPartido();
        $todosLosTiposGoles = $tipoGol->obtenerTiposGoles(); /*OBTENER TIPOS DE GOLES*/
        $todosLosTiposTarjeta = $tipotarjeta->obtenerTiposTarjetas(); /*OBTENER TIPOS DE TARJETA*/
        $todosLosTiposFalta = $tipofalta->obtenerTiposFaltas(); /*OBTENER TIPOS DE FALTAS*/
        $jugadoresLocal = $partidoJugadores->obtenerJugadoresLocal($datosPartido->ID_CLUB_LOCAL_FK);
        $jugadoresVisita = $partidoJugadores->obtenerJugadoresVisita($datosPartido->ID_CLUB_VISITA_FK);
        $datosClubTecnico = $partidoJugadores->datosPartidosClubes($datosPartido->ID_SERIE_FK);
        require_once 'views/turno/gestionPartidos.php';
    }
}