<?php 
require_once 'config/parameters.php';
require_once 'models/campeonato.php';
require_once 'models/partido.php';

class partidosController{

    public function index(){
        $campeonato = new Campeonato();
        $partido = new Partido();
        $todosLosCampeonatos = $campeonato->obtenerCampeonatosVigentes();
        $todosLosPartidos = $partido->obtenerPartidos();
        require_once 'views/partidos/partidos.php';
    }

    public function partidos(){
        $partido = new Partido();
        $partido->setIdCampeonato($_GET['campeonato']);
        $todosLosPartidos = $partido->obtenerPartidosDeCampeonato();
        require_once 'views/partidos/partidosCampeonato.php';
    }

    public function gestionCrear(){

        require_once 'views/partidos/gestionPartidos.php';
    }
}