<?php

require_once 'config/parameters.php';
require_once 'models/campeonato.php';

class campeonatosController{

    public function index(){
        
        $campeonato = new Campeonato();
        $todosLosCampeonatos = $campeonato->obtenerCampeonatos();

        require_once 'views/campeonatos/campeonatos.php';
    }

}