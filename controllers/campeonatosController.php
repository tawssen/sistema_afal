<?php
require_once 'config/parameters.php';
require_once 'models/campeonato.php';
require_once 'models/asociacion.php';
require_once 'models/serie.php';
require_once 'models/estado_campeonato.php';

class campeonatosController{

    public function index(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $campeonato = new Campeonato();
            $todosLosCampeonatos = $campeonato->obtenerCampeonatos();
            require_once 'views/campeonatos/campeonatos.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function gestionCrear(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $asociacion = new Asociacion();
            $serie = new Serie();
            $todasLasAsociaciones = $asociacion->obtenerAsociaciones();
            $todasLasSeries = $serie->obtenerSeries();
            require_once 'views/campeonatos/gestionCampeonatos.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function gestionEditar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $asociacion = new Asociacion();
            $serie = new Serie();
            $estadoCampeonato = new EstadoCampeonato();
            $campeonato = new Campeonato();
            $todasLasAsociaciones = $asociacion->obtenerAsociaciones();
            $todasLasSeries = $serie->obtenerSeries();
            $todosLosEstados = $estadoCampeonato->obtenerEstadosDeCampeonatos();
            $campeonatoSeleccionado = $campeonato->obtenerUnCampeonato($_GET['id']);
            require_once 'views/campeonatos/gestionCampeonatos.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function crear(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $campeonato = new Campeonato();

            $campeonato->setNombreCampeonato($_POST['nombreCampeonato']);
            $campeonato->setFechaInicio($_POST['fechaInicioCampeonato']);
            $campeonato->setIdAsociacion($_POST['nombreAsociacion']);
            $campeonato->setIdSerie($_POST['nombreSerie']);
    
            $campeonato->crearCampeonato();
            header('location:'.base_url.'campeonatos/index');
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function editar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $campeonato = new Campeonato();
        
            $campeonato->setIdCampeonato($_POST['idCampeonato']);
            $campeonato->setNombreCampeonato($_POST['nombreCampeonato']);
            $campeonato->setFechaInicio($_POST['fechaInicioCampeonato']);
            $campeonato->setIdAsociacion($_POST['nombreAsociacion']);
            $campeonato->setIdSerie($_POST['nombreSerie']);
            $campeonato->setIdEstadoCampeonato($_POST['estadoCampeonato']);
    
            $campeonato->editarCampeonato();
            header('location:'.base_url.'campeonatos/index');
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function eliminar(){

    }

}