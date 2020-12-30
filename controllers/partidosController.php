<?php 
require_once 'config/parameters.php';
require_once 'models/campeonato.php';
require_once 'models/partido.php';
require_once 'models/persona.php';
require_once 'models/club.php';

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
        $club = new Club();
        $partido->setFechaDate($_POST['fechapartido']);
        $partido->setFechaCampeonato($_POST['fechacampeonato']);
        $partido->setIdCLubLocal((int) $_POST['clublocal']);
        $clubLocal = $club->obtenerUnClub($partido->getIdCLubLocal());
        $partido->setIdCLubVisita((int) $_POST['clubvisita']);
        $partido->setRutTurno((int) $_POST['turnopartido']);
        $partido->setRutArbitro1((int)$_POST['arbitroprincipal']);
        $partido->setRutArbitro2((int)$_POST['segundoarbitro']);
        $partido->setRutArbitro3((int)$_POST['tercerarbitro']);
        $partido->setNombreEstadio($clubLocal['NOMBRE_ESTADIO']);
        $partido->setIdCampeonato((int)$_GET['campeonato']);

        if($partido->getFechaCampeonato()=="0"){
            header('location:'.base_url.'partidos/gestionCrear&error=fechacampeonato&campeonato='.$_GET['campeonato']);
        }
        elseif($partido->getIdCLubLocal()<1){
            echo 'debe ingresar un club local y visitante';
            header('location:'.base_url.'partidos/gestionCrear&error=clublocal&campeonato='.$_GET['campeonato']);
        }
        elseif($partido->getIdCLubVisita()<1){
            echo 'debe ingresar un club visitante';
            header('location:'.base_url.'partidos/gestionCrear&error=clubvisita&campeonato='.$_GET['campeonato']);
        }
        elseif($partido->getRutTurno()<1){
            echo 'debe ingresar un turno';
            header('location:'.base_url.'partidos/gestionCrear&error=rutturno&campeonato='.$_GET['campeonato']);
        }
        elseif($partido->getRutArbitro1()<1){
            header('location:'.base_url.'partidos/gestionCrear&error=arbitroprincipal&campeonato='.$_GET['campeonato']);
        }
        elseif($partido->getRutArbitro2()<1 && $partido->getRutArbitro3()<1){
            $resultado = $partido->crearPartido();
            if(!$resultado==false){
                header('location:'.base_url.'partidos/partidos&campeonato='.$_GET['campeonato']);
            }
        }elseif($partido->getRutArbitro2()>0 && $partido->getRutArbitro3()<1){
            $resultado = $partido->crearPartido();
            if(!$resultado==false){
                header('location:'.base_url.'partidos/partidos&campeonato='.$_GET['campeonato']);
            }
        }else{
            $resultado = $partido->crearPartido();
            if(!$resultado==false){
                header('location:'.base_url.'partidos/partidos&campeonato='.$_GET['campeonato']);
            }
        }
    }
}