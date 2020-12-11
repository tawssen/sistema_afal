<div class="container">
<div class="">
    <button class="btn btn-secondary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear Campeonato</button>
</div>
</div>
<!--Modal Ingreso de Clubes-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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


<?php $todoslosClubes?>
<div class="container mt-3 border p-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre Club</th>
                            <th>Fecha Fundacion</th>
                            <th>Giro</th>
                            <th>Nombre Estadio</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Asociacion</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      while($club=mysqli_fetch_assoc($todoslosClubes)){
                    ?>
                       <tr>
                       <td><?php echo $club['RUT_CLUB'].'-'.$club['DV_CLUB'] ?></td>
                       <td><?php echo $club['NOMBRE_CLUB'] ?></td>
                       <td><?php echo $club['FECHA_FUNDACION_CLUB'] ?></td>
                       <td><?php echo $club['GIRO_CLUB'] ?></td>
                       <td><?php echo $club['NOMBRE_ESTADIO'] ?></td>
                       <td><?php echo $club['CALLE_PASAJE'] ?></td>
                       <td><?php echo $club['CORREO_1'] ?></td>
                       <td><?php echo $club['NOMBRE_ASOCIACION'] ?></td>
                       <td><?php echo $club['NOMBRE_TIPO_ESTADO'] ?></td>
                       </tr>
                    <?php }?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script src="<?=base_url?>javascript/main.js"></script>
<script src="<?=base_url?>datatables/datatables.min.js"></script>


