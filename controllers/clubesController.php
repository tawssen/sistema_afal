<?php
require_once 'models/club.php';
require_once 'config/parameters.php';


class clubesController{

    public function index(){   
        $club = new Club();
        $todoslosClubes = $club->obtenerClubes();
        include_once 'views/clubes/clubes.php';
    }

    public function gestionCrear(){
        if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])){          
            require_once 'views/clubes/gestionClubes.php';
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }

}
