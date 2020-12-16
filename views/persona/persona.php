<div class="container-xl">
<div class="">
    <a href="<?=base_url?>persona/gestionCrear" class="btn btn-secondary mt-5"> Crear Personas </a>
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
                            <th>FECHA NACIMIENTO</th>
                            <th>NUMERO TELEFONO</th>
                            <th>CORREO ELECTRONICO</th>
                            <th>DIRECCION</th>
                            <th>ASOCIACION</th>
                            <th>PERFIL</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      while($club=mysqli_fetch_assoc($todasLasPersonas)){
                    ?>
                       <tr>
                         <td><?php echo $club['RUT_PERSONA'].'-'.$club['DV'] ?></td>
                         <td><?php echo $club['NOMBRE_1'].' '.$club['NOMBRE_2'].' '.$club['APELLIDO_1'].' '.$club['APELLIDO_2'] ?></td>
                         <td><?php echo $club['FECHA_NACIMIENTO'] ?></td>
                         <td><?php echo $club['NUMERO_TELEFONO'] ?></td>
                         <td><?php echo $club['CORREO_ELECTRONICO'] ?></td>
                         <td><?php echo $club['ID_DIRECCION_FK'] ?></td>                    
                         <td><?php echo $club['ID_ASOCIACION_FK'] ?></td>
                         <td><?php echo $club['ID_PERFIL_FK'] ?></td>
                         <td class="text-center">
                          <button class="btn btn-success">Editar</button>
                          <button class="btn btn-danger btn-eliminar">Eliminar</button>
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