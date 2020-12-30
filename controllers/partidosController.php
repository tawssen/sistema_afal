<?php 
require_once 'config/parameters.php';
require_once 'models/campeonato.php';
require_once 'models/partido.php';
require_once 'models/persona.php';

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
        $persona = new Persona();
        $todosLosArbitros = $persona->obtenerArbitros();
        $todosLosTurnos = $persona->obtenerTurnos();
        require_once 'views/partidos/gestionPartidos.php';
    }

    public function crear(){
        $partido = new Partido();
        $partido->setFechaDate($_POST['']);
        $partido->setFechaCampeonato($_POST['fechacampeonato']);
        $partido->setIdCLubLocal((int) $_POST['clublocal']);
        $partido->setIdCLubVisita((int) $_POST['clubvisita']);
        $partido->setRutTurno((int) $_POST['']);
        $partido->setRutArbitro1((int)$_POST['arbitroprincipal']);
        $partido->setRutArbitro2((int)$_POST['segundoarbitro']);
        $partido->setRutArbitro3((int)$_POST['tercerarbitro']);
        if($fechaCampeonato=="0"){
            echo 'debe ingresar fecha campeonato';
        }
        elseif($arbitro2<1 && $arbitro3<1){

        }elseif($arbitro2>0 && $arbitro3<1){

        }else{

        }
    }
}