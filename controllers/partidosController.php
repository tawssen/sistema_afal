<?php 

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
}