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
                            <th>NUMERO TELEFONO</th>
                            <th>CORREO ELECTRONICO</th>
                            <th>DIRECCION</th>
                            <th>ASOCIACION</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      while($arbitro=mysqli_fetch_assoc($todosLosArbitros)){
                    ?>
                       <tr>
                         <td><?php echo $arbitro['RUT_PERSONA'].'-'.$arbitro['DV'] ?></td>
                         <td><?php echo $arbitro['NOMBRE_1'].' '.$arbitro['NOMBRE_2'].' '.$arbitro['APELLIDO_1'].' '.$arbitro['APELLIDO_2'] ?></td>
                         <td><?php echo $arbitro['NUMERO_TELEFONO'] ?></td>
                         <td><?php echo $arbitro['CORREO_ELECTRONICO'] ?></td>
                         <td><?php echo $arbitro['NOMBRE_COMUNA'].', '.$arbitro['CALLE_PASAJE'] ?></td>                    
                         <td><?php echo $arbitro['NOMBRE_ASOCIACION'] ?></td>
                         <td class="text-center">
                                <button class="btn btn-success" onclick="document.location.href='<?=base_url?>persona/gestionEditar&id=<?=$arbitro['RUT_PERSONA'];?>&in=arbitro'">Editar</button>
                                <button class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarPersona" value="<?=$arbitro['RUT_PERSONA'];?>">Deshabilitar</button>                                       
                         </td>
                       </tr>
                    <?php }?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 

<!-- Modal Deshabilitar Usuario -->
<div class="modal fade" id="eliminarPersona" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex justify-content-center">
          <h5 class="modal-title d-flex justify-content-center" id="exampleModalLabel">Eliminar Persona</h5>
        </div>
        <input type="hidden" value="" id="eliminarEscondido">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Está seguro de deshabilitar el arbitro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>       
        <button id="EliminarPersona" type="button" onclick="document.location.href='<?=base_url?>persona/eliminar'" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?=base_url?>ajax/javascript/obtenerPersonaDeshabilitada.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#tablaHistorial').DataTable();
    } );
</script>
<script src="<?=base_url?>javascript/main.js"></script>
<script src="<?=base_url?>datatables/datatables.min.js"></script>

<script>
    $('.btn-eliminar').click(function(){
        let boton = document.getElementById("EliminarPersona");
        let id = $(this).val();
        boton.removeAttribute("onclick");
        boton.setAttribute("onclick","document.location.href='<?=base_url?>persona/eliminarArbitro&rut="+id+"'");        
    });
</script>   