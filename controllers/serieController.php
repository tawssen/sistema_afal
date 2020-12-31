<?php
require_once 'models/serie.php';
require_once 'models/auditoria.php';

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
        $auditoria = new Auditoria();     

        $series->setNombreSerie($_POST['nombreSerie']);
        $respuesta = $series->crearSerie();

          /*=============INSERTAR TABLA AUDITORIA (ACCION INSERT)=========*/       
          date_default_timezone_set('America/Santiago');
          $fechaActual = date('Y-m-d');
          $horaActual = date("H:i:s");

          $auditoria->setNombreUsuario($_POST['NombreUsuario']);
          $auditoria->setRutUsuario($_POST['rutUsuario']);
          $auditoria->setFechaRegistro($fechaActual);
          $auditoria->setHoraRegistro($horaActual);
          $auditoria->setModulo('Serie');
          $auditoria->setAccion('INSERTAR');
          $auditoria->setDescripcion('Se a registrado la serie '.$_POST['nombreSerie']);
          $auditoria->InsertAuditoria();
                       
          /*==============================================================*/ 

        if($respuesta>0){
            header('location:'.base_url.'serie/index');
        }else{
            header('location:'.base_url.'serie/crear&in=crear&error=crear');
        }
        
    }

    public function editar(){
        $series = new Serie();
        $auditoria = new Auditoria();  

        $series->setNombreSerie($_POST['nombreSerie']);
        $series->setIdSerie($_GET['idserie']);
        $respuesta= $series->editarSerie();

          /*=============INSERTAR TABLA AUDITORIA (ACCION INSERT)=========*/       
          date_default_timezone_set('America/Santiago');
          $fechaActual = date('Y-m-d');
          $horaActual = date("H:i:s");

          $auditoria->setNombreUsuario($_POST['NombreUsuario']);
          $auditoria->setRutUsuario($_POST['rutUsuario']);
          $auditoria->setFechaRegistro($fechaActual);
          $auditoria->setHoraRegistro($horaActual);
          $auditoria->setModulo('Serie');
          $auditoria->setAccion('MODIFICAR');
          $auditoria->setDescripcion('Se a modificado el '.$_POST['nombreSerie']);
          $auditoria->InsertAuditoria();
                       
          /*==============================================================*/ 

        if($respuesta>0){
            header('location:'.base_url.'serie/index');
        }else{
            header('location:'.base_url.'serie/editar&in=crear&error=editar');
        }
    }

    public function eliminar(){
        $series = new Serie();
        $auditoria = new Auditoria();  
        $series->setIdSerie($_GET['idserie']);
        $respuesta = $series->eliminarSerie();
         /*=============INSERTAR TABLA AUDITORIA (ACCION DELETE)=========*/       
         date_default_timezone_set('America/Santiago');
         $fechaActual = date('Y-m-d');
         $horaActual = date("H:i:s");

       
         $auditoria->setNombreUsuario($_GET['user']);
         $auditoria->setRutUsuario($_GET['rutuser']);
         $auditoria->setFechaRegistro($fechaActual);
         $auditoria->setHoraRegistro($horaActual);
         $auditoria->setModulo('Serie');
         $auditoria->setAccion('ELIMINAR');
         $auditoria->setDescripcion('Se a eliminado la serie de id '.$_GET['idserie']);
         $resultado = $auditoria->InsertAuditoria();
                      
         /*==============================================================*/ 

        if($respuesta>0){
            header('location:'.base_url.'serie/index');
        }else{
            header('location:'.base_url.'serie/index&&errordelete=delete');
        }
    }
}