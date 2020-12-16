<div class="container-xl">
<div class="">
    <a href="<?=base_url?>persona/gestionCrear&in=1" class="btn btn-secondary mt-5"> Crear Personas </a>
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
                      while($persona=mysqli_fetch_assoc($todasLasPersonas)){
                    ?>
                       <tr>
                         <td><?php echo $persona['RUT_PERSONA'].'-'.$persona['DV'] ?></td>
                         <td><?php echo $persona['NOMBRE_1'].' '.$persona['NOMBRE_2'].' '.$persona['APELLIDO_1'].' '.$persona['APELLIDO_2'] ?></td>
                         <td><?php echo $persona['FECHA_NACIMIENTO'] ?></td>
                         <td><?php echo $persona['NUMERO_TELEFONO'] ?></td>
                         <td><?php echo $persona['CORREO_ELECTRONICO'] ?></td>
                         <td><?php echo $persona['ID_DIRECCION_FK'] ?></td>                    
                         <td><?php echo $persona['ID_ASOCIACION_FK'] ?></td>
                         <td><?php echo $persona['ID_PERFIL_FK'] ?></td>
                         <td class="text-center">
                                <button class="btn btn-success" onclick="document.location.href='<?=base_url?>persona/gestionEditar&id=<?=$persona['RUT_PERSONA'];?>&in=1'">Editar</button>
                                <button class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#terminarCampeonato" value="<?=$persona['RUT_PERSONA'];?>">Terminar</button>
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