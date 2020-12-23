$(document).ready(function(){
    let fecha = moment();
    let fechadesde = fecha.format('YYYY-MM-DD');
    let fechahasta = fecha.add(7, 'days').format('YYYY-MM-DD');
    $.ajax({
        url: "../ajax/php/obtenerCampeonatos.php",
        type: "POST",
        data: {fechadesde: fechadesde,fechahasta:fechahasta},
        dataType: "json",
        success: function(respuesta){        
           console.log(respuesta)
        },
        error: function(){

        }
    })
    $('#partidosProximos').DataTable(); 
})