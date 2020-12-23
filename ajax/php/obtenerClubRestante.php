<?php

require_once '../../config/database.php';

$resultado = false;
$database = Database::connect();
$sql = "SELECT * FROM club WHERE not ID_CLUB =".$_POST['id'];

$respuesta = $database->query($sql);

if($respuesta){
    $resultado = $respuesta->fetch_all(MYSQLI_ASSOC);
}

echo json_encode($resultado);