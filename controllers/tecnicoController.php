<?php 
require_once 'models/tecnico.php';
require_once 'models/club.php';
require_once 'models/serie.php';
require_once 'models/tecnico_serie.php';
class tecnicoController{

    public function index(){
        $identity = $_SESSION['identity'];
        if(isset($_SESSION['identity']) && $identity->ID_PERFIL_FK=="1"){
            $tecnico = new Tecnico();
            $club = new Club();
            $serie = new Serie();

            $todasLasSeries = $serie->obtenerSeries();
            $todoslosClubes = $club->obtenerClubes();
            $todosLosTecnico = $tecnico->obtenerTecnico();
            require_once 'views/persona/tecnico.php';
        }
    }

    public function tecnicoClub(){
        $identity = $_SESSION['identity'];
        if(isset($_SESSION['identity']) && $identity->ID_PERFIL_FK=="1"){
            $tecnico = new Tecnico();
            $club = new Club();
            
            $todoslosClubes = $club->obtenerClubes();
            require_once 'views/Tecnico/tecnico_club.php';
        }
    }

    public function gestiontecnico(){
        $identity = $_SESSION['identity'];
        if(isset($_SESSION['identity']) && $identity->ID_PERFIL_FK=="1"){
            $tecnico = new Tecnico();
            $club = new Club();
            $unClub = $club->obtenerUnClub($_GET['id']);
            $tecnico->setidClub($_GET['id']);
            $todosLosTecnico = $tecnico->obtenerTecnicosPorClub();
            require_once 'views/Tecnico/gestiontecnico.php';
        }
    }

    public function eliminartecnico(){
        $id = $_GET['idclub'];
        $identity = $_SESSION['identity'];
        if(isset($_SESSION['identity']) && $identity->ID_PERFIL_FK=="1"){
            $tecnico = new Tecnico();
            $stecnico = new Tecnico_Serie();
            
            $tecnico->setrutPersona($_GET['rut']);

            $dato = $tecnico->obtenerDatosTecnicos();
            $datosTecnico= (array) $dato;
            
            $stecnico->setIdPersonaTecnico($datosTecnico['ID_PERSONA_TECNICO']);
            $stecnico->eliminarTecnicoSerie();
            $respuesta = $tecnico->eliminarTecnico();
            header('location:'.base_url.'tecnico/gestiontecnico&id='.$id);
        }else{
            echo '<div class="container mt-5">';
            echo '<h1>No tienes permiso para acceder a este apartado del sistema</h1>';
            echo '</div>';
        }
    }
   
    public function AgregarTecnicoClub(){
     $tecnico = new Tecnico();
     $stecnico = new Tecnico_Serie();

     $tecnico->setrutPersona($_POST['rutTecnico']);
     $tecnico->setidClub($_POST['clublocal']);
     
     $res = $tecnico->aderirTecnicoClub();
     $dato = $tecnico->obtenerDatosTecnicos();
     $datosTecnico= (array) $dato;
     echo $datosTecnico['ID_PERSONA_TECNICO'];
     if($datosTecnico){
        $stecnico->setIdPersonaTecnico($datosTecnico['ID_PERSONA_TECNICO']);
        $stecnico->setIdSerie($_POST['Serie']);
        $stecnico->agregarSerieTecnico();
        header('location:'.base_url.'tecnico/index');
     }else{
        echo 'No Funciona';
     }

    }

    public function EliminarTecnicoClub(){
        $tecnico = new Tecnico();
        $stecnico = new Tecnico_Serie();

        $tecnico->setrutPersona($_GET['rutTecnico']);
        
        $dato = $tecnico->obtenerDatosTecnicos();
        $datosTecnico= (array) $dato;
        $stecnico->setIdPersonaTecnico($datosTecnico['ID_PERSONA_TECNICO']);
        $stecnico->eliminarTecnicoSerie();
        $res = $tecnico->eliminarTecnico();
        if($res){
            header('location:'.base_url.'tecnico/index');
        }else{
           echo 'No Funciona';
        }
   
       }

}