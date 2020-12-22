<?php
require_once 'models/serie.php';

class serieController{

    public function index(){
        $series = new Serie();
        $todasLasSeries = $series->obtenerSeries();
        require_once 'views/serie/serie.php';
    }

    public function crearserie(){
        require_once 'views/serie/gestionSerie.php';
    }

    public function editarserie(){
        $series = new Serie();
        $series->setIdSerie($_GET['idserie']);
        $serieSeleccionada = $series->obtenerUnaSerie();
        require_once 'views/serie/gestionSerie.php';
    }

    public function crear(){
        $series = new Serie();
        $series->setNombreSerie($_POST['nombreSerie']);
        $respuesta = $series->crearSerie();
        if($respuesta>0){
            header('location:'.base_url.'serie/index');
        }else{
            header('location:'.base_url.'serie/crear&in=crear&error=crear');
        }
        
    }

    public function editar(){
        $series = new Serie();
        $series->setNombreSerie($_POST['nombreSerie']);
        $series->setIdSerie($_GET['idserie']);
        $respuesta= $series->editarSerie();
        if($respuesta>0){
            header('location:'.base_url.'serie/index');
        }else{
            header('location:'.base_url.'serie/editar&in=crear&error=editar');
        }
    }

    public function eliminar(){
        $series = new Serie();
        $series->setIdSerie($_GET['idserie']);
        $respuesta = $series->eliminarSerie();
        echo $respuesta;
        if($respuesta>0){
            header('location:'.base_url.'serie/index');
        }else{
            header('location:'.base_url.'serie/index&&errordelete=delete');
        }
    }
}