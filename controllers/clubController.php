<?php
require_once 'models/club.php';
require_once 'config/parameters.php';


class clubController{

    public function index(){
        
        $club = new Club();
        $todoslosClubes = $club->obtenerClubes();
        include_once 'views/clubes/club.php';
    }

    


}
