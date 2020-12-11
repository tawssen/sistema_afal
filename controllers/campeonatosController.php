<?php
require_once 'config/parameters.php';
require_once 'models/campeonato.php';
require_once 'models/asociacion.php';
require_once 'models/serie.php';

class campeonatosController{

    public function index(){
        $campeonato = new Campeonato();
        $todosLosCampeonatos = $campeonato->obtenerCampeonatos();

        require_once 'views/campeonatos/campeonatos.php';
    }

    public function gestionCrear(){
        $asociacion = new Asociacion();
        $serie = new Serie();
        $todasLasAsociaciones = $asociacion->obtenerAsociaciones();
        $todasLasSeries = $serie->obtenerSeries();

        require_once 'views/campeonatos/gestionCampeonatos.php';
    }

    public function gestionEditar(){
        $asociacion = new Asociacion();
        $serie = new Serie();
        $todasLasAsociaciones = $asociacion->obtenerAsociaciones();
        $todasLasSeries = $serie->obtenerSeries();
        $campeonato = new Campeonato();
        $campeonatoSeleccionado = $campeonato->obtenerUnCampeonato($_GET['id']);

        require_once 'views/campeonatos/gestionCampeonatos.php';
    }

    public function crear(){

    }

    public function editar(){

    }

    public function eliminar(){

    }

}