$(document).ready(function(){
    $.ajax({
        url: "../ajax/php/obtenerClubes.php",
        type: "POST",
        data: {accion: ""},
        dataType: "json",
        success: function(respuesta){
            respuesta.forEach( club => {
                let opcion = document.createElement("option");
                opcion.value = club.ID_CLUB;
                opcion.text = club.NOMBRE_CLUB;
                document.getElementById("selectClubLocal").appendChild(opcion);
            });
        },
        error: function(){
            console.log("No funciona");
        }
    })
})

$("#selectClubLocal").change(function(){
    const IdCLub = $("#selectClubLocal option:selected").val();
    $("#selectClubVisita").html("");
    let opcionDefault = document.createElement("option");
    opcionDefault.value = "0";
    opcionDefault.text = "Seleccionar Visita";
    document.getElementById("selectClubVisita").appendChild(opcionDefault);

    $.ajax({
        url: "../ajax/php/obtenerClubRestante.php",
        type: "POST",
        data: {id: IdCLub},
        dataType: "json",
        success: function(respuesta){
            respuesta.forEach( clubRestante => {
                let opcion = document.createElement("option");
                opcion.value = clubRestante.ID_CLUB;
                opcion.text = clubRestante.NOMBRE_CLUB;
                document.getElementById("selectClubVisita").appendChild(opcion);
            });
        },
        error: function(){
            console.log("No funciona");
        }
    })


});