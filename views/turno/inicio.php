<div class="container">
    <div class="row mt-5">
        <div class="table-responsive">
            <table id="partidosTurno" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>FECHA CAMPEONATO</th>
                        <th>FECHA PARTIDO</th>
                        <th>LOCAL</th>
                        <th>VISITANTE</th>
                        <th>ARBITRO PRINCIPAL</th>
                        <th>GESTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($partido=mysqli_fetch_assoc($partidosTurno)){?>
                       <tr>
                       <td><?php echo $partido['FECHA_STRING']?></td>
                       <td><?php echo $partido['FECHA_DATE'] ?></td>
                       <td><?php echo $partido['CLUB_LOCAL'] ?></td>
                       <td><?php echo $partido['CLUB_VISITA'] ?></td>
                       <td><?php echo $partido['NOMBRE_ARBITRO'] ?></td>
                       <td>
                       <button class="btn btn-primary btn-comenzar" value="<?php echo $partido['ID_PARTIDO']?>" data-bs-toggle="modal" data-bs-target="#comenzarPartido">Comenzar</button>                
                       </td>
                       </tr>
                    <?php }?>    
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Gestion Turno -->
<div class="modal fade" id="comenzarPartido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex justify-content-center">
          <h5 class="modal-title d-flex justify-content-center" id="exampleModalLabel">INICIAR PARTIDO</h5>
        </div>
        <input type="hidden" value="" id="eliminarEscondido">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Está seguro de comenzar el partido?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>       
        <button id="comenzarPartido" type="button" onclick="document.location.href='<?=base_url?>persona/eliminar'" class="btn btn-danger">Comenzar</button>
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

<script>
    $('.btn-comenzar').click(function(){
        let boton = document.getElementById("comenzarPartido");
        let id = $(this).val();
        boton.removeAttribute("onclick");
        boton.setAttribute("onclick","document.location.href='<?=base_url?>turno/gestionPartidos&campeonato="+id  +"'");        
    });
</script>