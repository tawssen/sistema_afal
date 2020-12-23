<div class="container-xl">
<div class="d-flex justify-content-between ">
    <a href="<?=base_url?>partidos/gestionCrear&in=crear" class="btn btn-secondary mt-5"> Crear Partido </a>
    <button type="button" class="btn btn-danger mt-5 justify-content-end" id="btnCargardatosModal" data-bs-toggle="modal" data-bs-target="#historialPersona">Historial</button>
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
                            <th>FECHA</th>
                            <th>LOCAL</th>
                            <th>VISITANTE</th>
                            <th>ARBITRO</th>
                            <th>TURNO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      while($partido=mysqli_fetch_assoc($todosLosPartidos)){
                    ?>
                       <tr>
                         <td><?php echo $partido['FECHA_STRING'];?></td>
                         <td><?php echo $partido['CLUB_LOCAL'];?></td>
                         <td><?php echo $partido['CLUB_VISITA'];?></td>
                         <td><?php echo $partido['NOMBRE_ARBITRO_1'];?></td>
                         <td><?php echo $partido['NOMBRE_TURNO'];?></td>
                       </tr>
                    <?php } mysqli_free_result($todosLosPartidos);?> 
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
        ¿Está seguro de eliminar ha esta persona?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>       
        <button id="EliminarPersona" type="button" onclick="document.location.href='<?=base_url?>persona/eliminar'" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>


<!--Modal Historial-->
<div class="modal fade" id="historialPersona" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex justify-content-center">
          <h5 class="modal-title d-flex justify-content-center" id="exampleModalLabel">Historial</h5>
        </div>
        <input type="hidden" value="" id="eliminarEscondido">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <h1>HISTORIAL ELIMINADO</h1>
      
<div class="container-xl mt-3 border-top border-bottom p-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="tableHistorial" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>RUT</th>
                            <th>NOMBRE</th>                         
                            <th>ASOCIACION</th>
                            <th class="text-center">RESTAURAR</th>
                        </tr>
                    </thead>
                    <tbody id="tablaHistorial">
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>       
      
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
        $('#tableHistorial').DataTable();
    } );
</script>
<script src="<?=base_url?>javascript/main.js"></script>
<script src="<?=base_url?>datatables/datatables.min.js"></script>

<script>
    $('.btn-eliminar').click(function(){
        let boton = document.getElementById("EliminarPersona");
        let id = $(this).val();
        boton.removeAttribute("onclick");
        boton.setAttribute("onclick","document.location.href='<?=base_url?>persona/eliminar&rutPersona="+id+"'");        
    });
</script>