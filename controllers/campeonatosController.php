<?php
require_once 'config/parameters.php';
require_once 'models/campeonato.php';
require_once 'models/asociacion.php';
require_once 'models/serie.php';
require_once 'models/estado_campeonato.php';

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
        $estadoCampeonato = new EstadoCampeonato();
        $campeonato = new Campeonato();
        $todasLasAsociaciones = $asociacion->obtenerAsociaciones();
        $todasLasSeries = $serie->obtenerSeries();
        $todosLosEstados = $estadoCampeonato->obtenerEstadosDeCampeonatos();
        $campeonatoSeleccionado = $campeonato->obtenerUnCampeonato($_GET['id']);

        require_once 'views/campeonatos/gestionCampeonatos.php';
    }

    public function crear(){
        $campeonato = new Campeonato();

        $campeonato->setNombreCampeonato($_POST['nombreCampeonato']);
        $campeonato->setFechaInicio($_POST['fechaInicioCampeonato']);
        $campeonato->setIdAsociacion($_POST['nombreAsociacion']);
        $campeonato->setIdSerie($_POST['nombreSerie']);

        $campeonato->crearCampeonato();
        header('location:'.base_url);
    }

    public function editar(){
        $campeonato = new Campeonato();
        
        $campeonato->setIdCampeonato($_POST['idCampeonato']);
        $campeonato->setNombreCampeonato($_POST['nombreCampeonato']);
        $campeonato->setFechaInicio($_POST['fechaInicioCampeonato']);
        $campeonato->setIdAsociacion($_POST['nombreAsociacion']);
        $campeonato->setIdSerie($_POST['nombreSerie']);
        $campeonato->setIdEstadoCampeonato($_POST['estadoCampeonato']);

        $campeonato->editarCampeonato();
        header('location:'.base_url);
    }

    public function eliminar(){

    }

}