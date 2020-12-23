<?php

require_once '../../config/database.php';

$resultado = false; 
$database = Database::connect();

$SQL = 'SELECT ID_PARTIDO, FECHA_DATE, NOMBRE_FECHA AS FECHA_STRING, CL.NOMBRE_CLUB AS CLUB_LOCAL,  CV.NOMBRE_CLUB AS CLUB_VISITA,
CONCAT(PT.NOMBRE_1," ",PT.NOMBRE_2," ",PT.APELLIDO_1," ",PT.APELLIDO_2) AS NOMBRE_TURNO,
CONCAT(PA.NOMBRE_1," ",PA.NOMBRE_2," ",PA.APELLIDO_1," ",PA.APELLIDO_2) AS NOMBRE_ARBITRO_1,
CONCAT(NOMBRE_COMUNA," ", CALLE_PASAJE) AS DIRECCION,
NOMBRE_CAMPEONATO from PARTIDOS
INNER JOIN FECHA_CAMPEONATO ON (PARTIDOS.ID_FECHA_CAMPEONATO_FK = FECHA_CAMPEONATO.ID_FECHA_CAMPEONATO)
INNER JOIN CLUB CL ON (PARTIDOS.ID_CLUB_LOCAL_FK = CL.ID_CLUB)
INNER JOIN CLUB CV ON (PARTIDOS.ID_CLUB_VISITA_FK = CV.ID_CLUB)
INNER JOIN PERSONA PT ON (PARTIDOS.RUT_PERSONA_TURNO_FK = PT.RUT_PERSONA)
INNER JOIN PARTIDO_ARBITROS ON (PARTIDOS.ID_ARBITROS_PARTIDO_FK = PARTIDO_ARBITROS.ID_PARTIDO_ARBITRO)
INNER JOIN PERSONA PA ON (PARTIDO_ARBITROS.RUT_PERSONA_FK_ARBITRO1 = PA.RUT_PERSONA)
INNER JOIN DIRECCION ON (PARTIDOS.ID_DIRECCION_FK = DIRECCION.ID_DIRECCION)
INNER JOIN COMUNA ON (DIRECCION.ID_COMUNA_FK = COMUNA.ID_COMUNA)
INNER JOIN CAMPEONATO ON (PARTIDOS.ID_CAMPEONATO_FK = CAMPEONATO.ID_CAMPEONATO)WHERE FECHA_DATE BETWEEN "'.$_POST['fechadesde'].'" AND "'.$_POST['fechahasta'].'"';


$respuesta = $database->query($SQL);

if($respuesta){
    $resultado = $respuesta->fetch_all(MYSQLI_ASSOC);
}

echo json_encode($resultado);