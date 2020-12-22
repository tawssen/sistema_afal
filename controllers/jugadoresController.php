<?php
require_once 'config/parameters.php';
require_once 'models/club.php';
require_once 'models/jugador.php';
class jugadoresController{
    
    public function index(){
        $club = new Club();
        $todosLosClubes = $club->obtenerClubes();
        require_once 'views/jugadores/jugadores.php';
    }
    
    public function gestionjugador(){
        $jugador = new Jugador();
        $club = new Club();
        $jugador->setidClub($_GET['id']);
        $unClub = $club->obtenerUnClub($_GET['id']);
        $jugadorNoAderido = $jugador->obtenerJugadorNoAderido();
        $todosLosJugadoresPorClub = $jugador->obtenerJugadoresPorClub();
        require_once 'views/jugadores/gestionjugadores.php';
    }

    public function aderirJugadorClub()
    {   
        $id = $_POST['id'];
        $jugador = new Jugador();     
        if(isset($_POST['jugador']) & isset($_POST['id'])){
           
            $jugador->setrutPersona($_POST['jugador']);
            $jugador->setidClub($_POST['id']);
            $resultado = $jugador->agregarJugadorClub();
            if($resultado){
                header('location:'.base_url.'jugadores/gestionjugador&id='.$id);
            }else{                
                header('location:'.base_url.'jugadores/gestionjugador&id='.$id);
                echo '<h1>Verificar Controlador</h1>';
            }
            
        }else{
            echo '<div class="container"> Error Pajero <div>';
            header('location:'.base_url.'jugadores/gestionjugador&id='.$_GET['id']);
        }
           
    }

    public function desincribirJugador(){
        $jugador = new Jugador(); 
        $id = $_GET['idclub'];
   
        if(isset($_GET['rut'])){
          echo ' []Resive EL rut: ' .$_GET['rut'];
          $jugador->setrutPersona($_GET['rut']);
          $jugador->eliminarJugador();
          header('location:'.base_url.'jugadores/gestionjugador&id='.$id);
        }else{
            echo ' []No resive EL rut';
        }
    }

}