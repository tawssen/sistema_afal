<?php
require_once 'config/parameters.php';
require_once 'models/campeonato.php';
require_once 'models/asociacion.php';
require_once 'models/serie.php';
require_once 'models/estado_campeonato.php';
require_once 'models/campeonatos_equipos.php';

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
            if(!isset($_GET['in'])){
                $_SESSION['mensajeError'] = true;
            }else{
                unset($_SESSION['mensajeError']);
            }
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

    public function crear(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $campeonato = new Campeonato();
            $campeonato->setNombreCampeonato($_POST['nombreCampeonato']);
            $campeonato->setFechaInicio($_POST['fechaInicioCampeonato']);
            $campeonato->setIdAsociacion($_POST['nombreAsociacion']);
            $campeonato->setIdSerie($_POST['nombreSerie']);
    
            $respuesta = $campeonato->crearCampeonato();
            if($respuesta){
                header('location:'.base_url.'campeonatos/index');
                exit;
            }else{
                header('location:'.base_url.'campeonatos/gestionCrear');
            }
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function gestionEditar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            if(!isset($_GET['in'])){
                $_SESSION['mensajeError'] = true;
            }else{
                unset($_SESSION['mensajeError']);
            }
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

    public function editar(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $campeonato = new Campeonato();
        
            $campeonato->setIdCampeonato($_POST['idCampeonato']);
            $campeonato->setNombreCampeonato($_POST['nombreCampeonato']);
            $campeonato->setFechaInicio($_POST['fechaInicioCampeonato']);
            $campeonato->setIdAsociacion($_POST['nombreAsociacion']);
            $campeonato->setIdSerie($_POST['nombreSerie']);
            $campeonato->setIdEstadoCampeonato($_POST['estadoCampeonato']);
    
            $respuesta = $campeonato->editarCampeonato();
            if($respuesta){
                header('location:'.base_url.'campeonatos/index');
                exit;
            }else{
                header('location:'.base_url.'campeonatos/gestionEditar&id='.$_GET['id']);
            }
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function eliminar(){
        $campeonato = new Campeonato();
        $campeonato->setIdCampeonato($_GET['idcampeonato']);
        $campeonato->setIdEstadoCampeonato($_GET['estadocampeonato']);
        $campeonato->deshabilitarCampeonato();
        header('location:'.base_url.'campeonatos/index');
    }

    public function gestionarParticipantes(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $clubesParticipantes = new ClubesParticipantes();
            $clubesParticipantes->setIdCampeonato($_GET['idcampeonato']);
            $participantes = $clubesParticipantes->obtenerClubesParticipantes();
            $clubesNoInscritos = $clubesParticipantes->obtenerClubesNoInscritos();
            require_once 'views/campeonatos/participantes.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function agregarParticipante(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){
            $participante = new ClubesParticipantes();
            $participante->setIdClub($_GET['idclub']);
            $participante->setIdCampeonato($_GET['idcampeonato']);
            $respuesta = $participante->inscribirClub();
            header('location:'.base_url.'campeonatos/gestionarParticipantes&idcampeonato='.$_GET['idcampeonato']);
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

    public function eliminarInscripcion(){
        $participante = new ClubesParticipantes();
        $participante->setIdClubesParticipantes($_GET['id']);
        $participante->eliminarInscripcion();
        header('location:'.base_url.'campeonatos/gestionarParticipantes&idcampeonato='.$_GET['idcampeonato']);
    }
}