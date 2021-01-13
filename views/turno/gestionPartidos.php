<style>
  :root{
    --background: rgb(255,255,255);
    --background-linear1: rgba(255,255,255,1);
    --background-linear2: rgba(255,255,130,1);
    --container: #353535;
    --text-color: white;
    --screen: #353535;
    --btn-hover: black;
    --btn-hover-text: white;
    --shadow: rgba(59,59,59,0.75);
  }

  span{
    font-weight: 300;
    font-size: 45px;
  }

  .c-body{
    background: var(--background);
    background: linear-gradient(135deg, var(--background-linear1) 0%);
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .c-time{
    background-color: var(--container);
    width: 400px;
    border-radius: 10px;
    box-shadow: 4px 10px 15px 0 var(--shadow);
  }

  .c-time>.screen{
    color: var(--text-color);
    background-color: var(--screen);
    margin: 1px;
    text-align: center;
  }

  .c-btn{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 5px;
    margin: 0px 0px;
  }

  .c-btn>button{
    display: block;
    background: none;
    border: none;
    outline: inherit;
    cursor: pointer;
    height: 65px;
    border-radius: 3%;
    color: var(--text-color);
    font-size: 40px;
  }

  button:hover{
    transition: 0.5s;
    background-color: var(--btn-hover);
    color: var(--btn-hover-text);
  }

</style>

<div class="container">
    <div class="max-container mt-3">
    <div class="c-body">
              <div class="c-time">
                <div class="screen">
                  <span id="time">00:00:00:00</span>
                </div>
                <div class="c-btn">
                  <button id="btn-start">&#9658;</button>
                  <button id="btn-stop">&#8718;</button>
                  <button id="btn-reset">&#8635;</button>
                </div>
              </div>
            </div>
        <div class="menu-container">
            <button class="btn btn-primary" id="btnModalGoles" data-bs-toggle="modal" data-bs-target="#modalGoles">Goles</button>
            <button class="btn btn-primary" id="btnModalAmonestaciones" data-bs-toggle="modal" data-bs-target="#modalAmonestaciones">Amonestaciones</button>
            <button class="btn btn-danger">Terminar Partido</button>
            <button class="btn btn-primary" id="btnModalSubstituciones" data-bs-toggle="modal" data-bs-target="#modalSubstituciones">Substituciónes</button>
            <button class="btn btn-primary" id="btnModalObservaciones" data-bs-toggle="modal" data-bs-target="#modalObserciones">Observaciones</button>
        </div>

        <div class="body-container">

            <div class="izq">
                <div class="arriba">
                    <div class="datos">
                        <h4><?=$datosClubTecnico->CLUB_LOCAL?> (LOCAL)</h4>
                        <p>Director Técnico: <?=$datosClubTecnico->NOMBRE_TECNICO_LOCAL?></p>
                    </div>
                    <div class="jugadores">
                        <ul class="list-group">
                          <?php while($jugadorLocal = mysqli_fetch_assoc($jugadoresLocal)){?>
                              <li class="list-group-item"><?php echo '('.$jugadorLocal['NUMERO_JUGADOR'].') '.$jugadorLocal['NOMBRE_1'].' '.$jugadorLocal['APELLIDO_1'].' '.$jugadorLocal['APELLIDO_2'];?></li>
                          <?php }?>    
                        </ul>
                    </div>
                </div>
                <div class="abajo">
                    <div class="sucesos">

                    </div>
                </div>
            </div>

            <div class="der">
                <div class="arriba">
                    <div class="datos">
                      <h4><?=$datosClubTecnico->CLUB_VISITA?> (VISITA)</h4>
                      <p>Director Técnico: <?=$datosClubTecnico->NOMBRE_TECNICO_VISITA?></p>
                    </div>
                    <div class="jugadores">
                        <ul class="list-group">
                          <?php while($jugadorVisita = mysqli_fetch_assoc($jugadoresVisita)){?>
                              <li class="list-group-item"><?php echo $jugadorVisita['NOMBRE_1'].' '.$jugadorVisita['APELLIDO_1'].' '.$jugadorVisita['APELLIDO_2'];?></li>
                          <?php }?>    
                        </ul>
                    </div>
                </div>
                <div class="abajo">
                    <div class="sucesos">
                    
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

   <!-- Modals -->

<!-- Modal Goles -->
<div class="modal fade" id="modalGoles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Goles del Partido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <div class="row">
            <div class="col-5">
                <label for="">CLUB</label>
                <select name="selectIdClub" id="selectClub" class="form-select">
                    <option value="0">Seleccionar Club</option>
                    <option value="<?=$datosPartido->ID_CLUB_LOCAL_FK?>"><?=$datosClubTecnico->CLUB_LOCAL?></option>                     
                    <option value="<?=$datosPartido->ID_CLUB_VISITA_FK?>"><?=$datosClubTecnico->CLUB_VISITA?></option> 
                </select>
            </div>
            <div class="col-7">
                <label for="">JUGADOR</label>
                <select name="" id="selectJugadores" class="form-select" >
                    <option value="">Seleccionar Jugador</option>
                </select>
            </div>            
          </div>

          <div class="row mt-2">
            <div class="col-6">
                <label for="">TIPO GOL</label>
                <select name="" id="selectGol" class="form-select">                  
                    <option value="">Seleccionar Tipo</option>
                    <?php while($goles = mysqli_fetch_assoc($todosLosTiposGoles)){?>
                    <option value="<?php echo $goles['ID_TIPO_GOL'];?>"><?php echo $goles['NOMBRE_TIPO_GOL'];?></option>
                    <?php } mysqli_free_result($todosLosTiposGoles);?>
                    <?php ?>
                </select>
            </div>            
            <div class="col-6">
              <label for="">TIEMPO</label>
              <select name="" id="selecttiempo" class="form-select">
                <option value="0">Seleccionar Tiempo</option>
                <option value="Primero">Primer Tiempo</option>
                <option value="Segundo">Segundo Tiempo</option>
              </select>
            </div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btn-GenerarGol" class="btn btn-primary">Generar Gol</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Amonestaciones -->
<div class="modal fade" id="modalAmonestaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Amonestaciones del Partido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-5">
                <label for="">CLUB</label>
                <select name="" id="selectClubAmonestaciones" class="form-select">
                    <option value="0">Seleccionar Club</option>
                    <option value="<?=$datosPartido->ID_CLUB_LOCAL_FK?>"><?=$datosClubTecnico->CLUB_LOCAL?></option>                     
                    <option value="<?=$datosPartido->ID_CLUB_VISITA_FK?>"><?=$datosClubTecnico->CLUB_VISITA?></option> 
                </select>
            </div>
            <div class="col-7">
                <label for="">JUGADOR</label> 
                <select name="" id="selectJugadoresAmonestaciones" class="form-select" >
                    <option value="">Seleccionar Jugador</option>
                </select>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-4">
                <label for="">TIPO TARJETA</label>
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Tipo</option>
                  <?php while($tarjeta = mysqli_fetch_assoc($todosLosTiposTarjeta)){?>                
                    <option value="<?php echo $tarjeta['ID_TIPO_TARJETA'];?>"><?php echo $tarjeta['NOMBRE_TIPO_TARJETA'];?></option>
                  <?php } mysqli_free_result($todosLosTiposTarjeta);?>
                </select>
            </div>
            <div class="col-4">
                <label for="">TIPO FALTA</label>
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Falta</option>
                    <?php while($falta = mysqli_fetch_assoc($todosLosTiposFalta)){?>                
                    <option value="<?php echo $falta['ID_TIPO_FALTA'];?>"><?php echo $falta['NOMBRE_TIPO_FALTA'];?></option>
                  <?php } mysqli_free_result($todosLosTiposFalta);?>
                </select>
            </div>           
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Generar Amonestacion</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Substituciones -->
<div class="modal fade" id="modalSubstituciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Substituciones del Partido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

       <div class="row">  
         <div class="col-12">
            <label for="">CLUB</label>
            <select name="" id="selectclubsustituciones" class="form-select">
              <option value="0">Seleccionar Club</option>
              <option value="<?=$datosPartido->ID_CLUB_LOCAL_FK?>"><?=$datosClubTecnico->CLUB_LOCAL?></option>                     
              <option value="<?=$datosPartido->ID_CLUB_VISITA_FK?>"><?=$datosClubTecnico->CLUB_VISITA?></option> 
            </select>
          </div>
        </div>

        <div class="row">               
          <div class="col-6">
            <label for="">JUGADOR SALIENTE</label> 
            <select name="" id="selectjugadorSale" class="form-select" >
              <option value="">Seleccionar Jugador Salienete</option>
            </select>
          </div>
          <div class="col-6">
           <label for="">JUGADOR ENTRANTE</label> 
            <select name="" id="selectjugadorEntra" class="form-select" >
             <option value="">Seleccionar Jugador Entrante</option>
           </select>
          </div>          
        </div>
        <div class="row">
          <div class="col-12">
            <label for="">TIEMPO</label>
            <select name="" id="" class="form-select">
              <option value="0">Seleccionar Tiempo</option>
              <option value="1">Primer Tiempo</option>
              <option value="2">Segundo Tiempo</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Generar Subtitucion</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Observaciones -->
<div class="modal fade" id="modalObserciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Observaciones del Partido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="col-12">
          <label for="" class="form-label">OBSERVACION</label>
          <textarea class="form-control" id="" rows="5"  maxlength="255"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Generar Observacion</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?=base_url?>easytimer/dist/easytimer.min.js"></script>

<script>
    $(document).ready(function() {
        $('#partidosTurno').DataTable();
    } );
</script>

<script src="<?=base_url?>javascript/main.js"></script>
<script src="<?=base_url?>datatables/datatables.min.js"></script>

<script>
  window.onload = ()=>{
    h= 0; m= 0; s=0; mls=0; timeStarted=0;
    time = document.getElementById("time");
    btnStart = document.getElementById("btn-start");
    btnStop = document.getElementById("btn-stop");
    btnReset = document.getElementById("btn-reset");
    event();
  };

  function event(){
    btnStart.addEventListener("click",start);
    btnStop.addEventListener("click",stop)
    btnReset.addEventListener("click",reset)
  }

  function write(){
    let ht,mt,st,mlst;
    mls++;
    if(mls>99){s++;mls=0;}
    if(s>59){m++;s=0;}
    if(m>59){h++;m=0;}
    if(h>24) h=0;
    mlst = ('0' + mls).slice(-2);
    st = ('0'+s).slice(-2);
    mt = ('0'+m).slice(-2);
    ht = ('0'+h).slice(-2);
    time.innerHTML = `${ht}:${mt}:${st}:${mlst}`;
  }

  function start(){
    write();
    timeStarted = setInterval(write,10);
    btnStart.removeEventListener("click", start);
  }

  function stop(){
      clearInterval(timeStarted);
      btnStart.addEventListener("click",start);
  }

  function reset(){
    clearInterval(timeStarted);
    time.innerHTML = "00:00:00:00";
    h= 0; m=0; s=0; mls=0;
    btnStart.addEventListener("click",start);
  }

</script>

<!--script para cargar datos-->
<script>
let minuto = "";

/*Ajax Insertar Datos*/


/*=======================================*/

$('#btnModalGoles').click(function(){
  minuto = $('#time').text();
 
  $('#btn-GenerarGol').click(function(){
   
   let selectIdClub = $('#selectClub').val();
   let selectRutJugador = $('#selectJugadores').val();
   let selectIdGol = $('#selectGol').val();
   let selectTiempo = $('#selecttiempo').val();
   
    $.ajax({
        url: "../ajax/php/insertarGolesPartidos.php",
        type: "POST",
        data: {
        idpartidofk: <?=$_GET['partido']?>,
        rutGoleador: selectRutJugador,
        idtipogol: selectIdGol,
        min: minuto,
        tiempo: selectTiempo},
        dataType: "json",
        success: function(respuesta){
           console.log(respuesta);
        },
        error: function(){
            console.log("No funciona ");
        }
    }) 
   
   
  })

})
$('#btnModalAmonestaciones').click(function(){
  minuto = $('#time').text();
})
$('#btnModalObservaciones').click(function(){
  minuto = $('#time').text();
})
$('#btnModalSubstituciones').click(function(){
  minuto = $('#time').text();
})

/*CARGAR JUGADORES A MODAL GOLES*/
$("#selectClub").change(function(){
    let IdCLub = $(this).val();
    $("#selectJugadores").html("");
    let opcionDefault = document.createElement("option");
    opcionDefault.value = "0";
    opcionDefault.text = "Seleccionar Jugador";
    document.getElementById("selectJugadores").appendChild(opcionDefault);

    $.ajax({
        url: "../ajax/php/obtenerJugadoresPorClub.php",
        type: "POST",
        data: {idClubphp: IdCLub,idpartido: <?=$_GET['partido']?>},
        dataType: "json",
        success: function(respuesta){
            respuesta.forEach( jugadoresClub => {
                let opcion = document.createElement("option");
                opcion.value = jugadoresClub.RUT_PERSONA_FK;
                opcion.text = jugadoresClub.NUMERO_JUGADOR;
                document.getElementById("selectJugadores").appendChild(opcion);
            });
        },
        error: function(){
            console.log("No funciona cargar jugadores");
        }
    })
});
/*===================================================================================*/
/*CARGAR JUGADORES A MODAL Amonestaciones*/
$("#selectClubAmonestaciones").change(function(){
    let IdCLub = $(this).val();
    $("#selectJugadoresAmonestaciones").html("");
    let opcionDefault = document.createElement("option");
    opcionDefault.value = "0";
    opcionDefault.text = "Seleccionar Jugador";
    document.getElementById("selectJugadoresAmonestaciones").appendChild(opcionDefault);

    $.ajax({
        url: "../ajax/php/obtenerJugadoresPorClub.php",
        type: "POST",
        data: {idClubphp: IdCLub,idpartido: <?=$_GET['partido']?>},
        dataType: "json",
        success: function(respuesta){
            respuesta.forEach( jugadoresClub => {
                let opcion = document.createElement("option");
                opcion.value = jugadoresClub.RUT_PERSONA_FK;
                opcion.text = jugadoresClub.NUMERO_JUGADOR;
                document.getElementById("selectJugadoresAmonestaciones").appendChild(opcion);
            });
        },
        error: function(){
            console.log("No funciona cargar jugadores");
        }
    })
});
/*===================================================================================*/
/*CARGAR JUGADOR ENTRANTES Y SALIENTES*/
$("#selectclubsustituciones").change(function(){
    let IdCLub = $(this).val();

    $("#selectjugadorSale").html("");
    let opcionDefault = document.createElement("option");
    opcionDefault.value = "0";
    opcionDefault.text = "Seleccionar Jugador Saliente";
    document.getElementById("selectjugadorSale").appendChild(opcionDefault);

    $.ajax({
        url: "../ajax/php/obtenerJugadoresPorClub.php",
        type: "POST",
        data: {idClubphp: IdCLub,idpartido: <?=$_GET['partido']?>},
        dataType: "json",
        success: function(respuesta){
            respuesta.forEach( jugadoresClub => {
                let opcion = document.createElement("option");
                opcion.value = jugadoresClub.RUT_PERSONA_FK;
                opcion.text = jugadoresClub.NUMERO_JUGADOR;
                document.getElementById("selectjugadorSale").appendChild(opcion);
            });
        },
        error: function(){
            console.log("No funciona cargar jugadores");
        }
    }) 
});

$('#selectjugadorSale').change(function(){
  let IdCLub = $('#selectclubsustituciones').val();
  let RutJugadorS = $(this).val();
  
  $("#selectjugadorEntra").html("");
  let opcionDefault = document.createElement("option");
  opcionDefault.value = "0";
  opcionDefault.text = "Seleccionar Jugador Entrante";
  document.getElementById("selectjugadorEntra").appendChild(opcionDefault);
  
  $.ajax({
        url: "../ajax/php/obtenerJugadoresNoSeleccionado.php",
        type: "POST",
        data: {idClubphp: IdCLub,idpartido: <?=$_GET['partido']?>,rutpersona: RutJugadorS},
        dataType: "json",
        success: function(respuesta){
            respuesta.forEach( jugadoresClub => {
                let opcion = document.createElement("option");
                opcion.value = jugadoresClub.RUT_PERSONA_FK;
                opcion.text = jugadoresClub.NUMERO_JUGADOR;
                document.getElementById("selectjugadorEntra").appendChild(opcion);
            });
        },
        error: function(){
            console.log("No funciona cargar jugadores");
        }
    }) 
  
});
/*===================================================================================*/

</script>