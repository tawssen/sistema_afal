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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGoles">Goles</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAmonestaciones">Amonestaciones</button>
            <button class="btn btn-danger">Terminar Partido</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSubstituciones">Substituciónes</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalObserciones">Observaciones</button>
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
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Club</option>
                </select>
            </div>
            <div class="col-7">
                <label for="">JUGADOR</label>
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Jugador</option>
                </select>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-5">
                <label for="">TIPO GOL</label>
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Tipo</option>
                </select>
            </div>
            <div class="col-7">
                <label for="">TIEMPO</label>
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Tiempo</option>
                </select>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar Gol</button>
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
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Club</option>
                </select>
            </div>
            <div class="col-7">
                <label for="">JUGADOR</label>
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Jugador</option>
                </select>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-4">
                <label for="">TIPO TARJETA</label>
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Tipo</option>
                </select>
            </div>
            <div class="col-4">
                <label for="">TIPO FALTA</label>
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Tiempo</option>
                </select>
            </div>
            <div class="col-4">
                <label for="">TIEMPO</label>
                <select name="" id="" class="form-select">
                    <option value="">Seleccionar Tiempo</option>
                </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Observaciones -->
<div class="modal fade" id="modalObserciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Observaciones del Partido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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