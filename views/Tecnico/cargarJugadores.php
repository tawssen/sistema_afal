<div class="container">
    <div class="row mt-5">
        <div class="table-responsive">
            <table id="tablaJugadores" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>NOMBRE</th>
                        <th>DORSAL</th>
                        <TH>CONVOCATORIA</TH>
                    </tr>
                </thead>
                <tbody id="jugadores">
                <?php
                    while($jugador=mysqli_fetch_assoc($jugadores)){
                ?>
                    <tr>
                        <td><?php echo $jugador['RUT_PERSONA'].'-'.$jugador['DV']?></td>
                        <td><?php echo $jugador['NOMBRE_1'].' '.$jugador['APELLIDO_1'].' '.$jugador['NOMBRE_2']?></td>
                        <td><input type="text" class="form-control" disabled></td>
                        <td><input type="radio" value="<?=$jugador['RUT_PERSONA_FK']?>" class="input-group radiobtn"></td>
                    </tr>
                    
                <?php }?>  
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>



<script src="<?=base_url?>javascript/main.js"></script>
<script src="<?=base_url?>datatables/datatables.min.js"></script>

<script>
    $('.btn-eliminar').click(function(){
        let boton = document.getElementById("btnDarTermino");
        let id = $(this).val();
        boton.removeAttribute("onclick");
        boton.setAttribute("onclick","document.location.href='<?=base_url?>campeonatos/eliminar&idcampeonato="+id+"&estadocampeonato=3&user=<?php echo $_SESSION['NombreUsuario'];?>&rutuser=<?php echo $_SESSION['RutUsuario'];?>'");
    });
</script>

<script>
    $(document).ready(function() {
        $('#tablaJugadores').DataTable();
    });
</script>

<script>
    $('.radiobtn').click(function(){
        alert($(this).val());
    })
</script>

