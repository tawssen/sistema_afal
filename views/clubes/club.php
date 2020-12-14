<div class="container-xl">
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
<div class="container-xl mt-3 border-top border-bottom p-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>RUT</th>
                            <th>NOMBRE</th>
                            <th>FUNDACIÓN</th>
                            <th>ESTADIO</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Asociacion</th>
                            <th class="text-center">ACCIONES</th>
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
                       <td><?php echo $club['NOMBRE_ESTADIO'] ?></td>
                       <td><?php echo $club['CALLE_PASAJE'] ?></td>
                       <td><?php echo $club['CORREO_1'] ?></td>
                       <td><?php echo $club['NOMBRE_ASOCIACION'] ?></td>
                       <td class="text-center">
                          <button class="btn btn-success" onclick="document.location.href='<?=base_url?>campeonatos/gestionEditar&id=<?=$campeonatos['ID_CAMPEONATO'];?>'">Editar</button>
                          <button class="btn btn-danger btn-eliminar" value="<?=$campeonatos['ID_CAMPEONATO'];?>">Terminar Club</button>
                       </td>
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


