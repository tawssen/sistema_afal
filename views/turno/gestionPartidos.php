<div class="container">
    <div class="max-container">
        <div class="menu-container">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGoles">Goles</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAmonestaciones">Amonestaciones</button>
            <button class="btn btn-success" >Iniciar Partido</button>
            <h2>00:00</h2>
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
                              <li class="list-group-item"><?php echo $jugadorLocal['NOMBRE_1'].' '.$jugadorLocal['APELLIDO_1'].' '.$jugadorLocal['APELLIDO_2'];?></li>
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
<script>
    $(document).ready(function() {
        $('#partidosTurno').DataTable();
    } );
</script>
<script src="<?=base_url?>javascript/main.js"></script>
<script src="<?=base_url?>datatables/datatables.min.js"></script>