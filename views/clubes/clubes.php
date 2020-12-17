<div class="container-xl">
<div class="">
    <a href="<?=base_url?>clubes/gestionCrear" class="btn btn-secondary mt-5"> Crear Clubes </a>
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
                            <th>DIRECCION</th>
                            <th>CORREO</th>
                            <th>ASOCIACION</th>
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
                       <td><?php echo $club['CORREO_ELECTRONICO'] ?></td>
                       <td><?php echo $club['NOMBRE_ASOCIACION'] ?></td>
                       <td class="text-center">
                          <button class="btn btn-success" onclick="document.location.href='<?=base_url?>clubes/gestionEditar&clubSeleccionado=<?=$club['ID_CLUB'];?>'">Editar</button>
                          <button class="btn btn-danger btn-eliminar" value="<?=$club['ID_CLUB'];?>">Eliminar</button>
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


