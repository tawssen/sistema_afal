<div class="container mt-3">
    <div class="container mt-5 col-6">

        <?php if(isset($asd)):?>
        <form action="<?=base_url?>campeonatos/editar" method="POST" class="border p-5">
        <?php else:?>
        <form action="<?=base_url?>campeonatos/crear" method="POST" class="border p-5">
        <?php endif; ?>
            <h1 class="pb-3">Crear Club</h1>

            <?php if(isset($campeonatoSeleccionado)):?>
            <div class="">
                <input class="form-control" id="idCampeonato" name="idCampeonato" type="hidden" value="">
            </div>
            <?php endif; ?>

            <div class="row">
             <div class="col-8">
                <label for="rutClub" class="form-label">RUT</label>
                <input class="form-control" name="rutClub" type="numeric" placeholder="12345678" required>
             </div>
             <div class="col-4">
                <label for="dvClub" class="form-label">DV</label>
                <input class="form-control" name="dvClub" type="text" placeholder="k o 1-9" required>
             </div>
            </div>

            <div class="mt-3">
                <label for="" class="form-label">NOMBRE CLUB</label>
                <input  type="text" name="fechaInicioCampeonato" class="form-control" required>
            </div>
            
            <div class="mt-3">
                <label for="" class="form-label">FUNDACION</label>
                <input id="dateFechaInicio" type="date" name="fechaInicioCampeonato" class="form-control" required>
            </div>
            
            <div class="mt-3">
                <label for="" class="form-label">NOMBRE ESTADIO</label>
                <input  type="text" name="fechaInicioCampeonato" class="form-control" required>
            </div>

            <div class="mt-3">
                <label for="" class="form-label">ASOCIACIÓN</label>
                <select id="selectSerie" class="form-select" name="nombreAsociacion" aria-label="Default select example" required>
                    <option value="0" selected>Seleccionar Asociación</option>
                    <?php while($asociacion = mysqli_fetch_assoc($todasLasAsociaciones)){?>
                    <option value="<?php echo $asociacion['ID_ASOCIACION'];?>"><?php echo $asociacion['NOMBRE_ASOCIACION'];?></option>
                    <?php } mysqli_free_result($todasLasAsociaciones);?>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="" class="form-label">SERIE</label>
                <select id="selectAsociacion" class="form-select" name="nombreSerie" aria-label="Default select example" required>
                    <option value="0" selected>Seleccionar Serie</option>
                    <?php while($serie = mysqli_fetch_assoc($todasLasSeries)){?>
                        <option value="<?php echo $serie['ID_SERIE'];?>"><?php echo $serie['NOMBRE_SERIE'];?></option>
                    <?php } mysqli_free_result($todasLasSeries);?>
                </select>
            </div>

            <?php if(isset($campeonatoSeleccionado)):?>
            <div class="mt-3">
                <label for="" class="form-label">ESTADO CAMPEONATO</label>
                <select id="selectEstado" class="form-select" name="estadoCampeonato" aria-label="Default select example" required>
                    <option value="0" selected>Seleccionar Estado</option>
                    <?php while($estado = mysqli_fetch_assoc($todosLosEstados)){?>
                        <option value="<?php echo $estado['ID_ESTADO_CAMPEONATO'];?>"><?php echo $estado['NOMBRE_ESTADO_CAMPEONATO'];?></option>
                    <?php } mysqli_free_result($todosLosEstados);?>
                </select>
            </div>
            <?php endif; ?>

            <div class="mt-5 d-flex justify-content-end">
                <button class="btn btn-danger mr-2">Cancelar</button>
                <?php if(isset($campeonatoSeleccionado)):?>
                <input class="btn btn-success" type="submit" value="Actualizar Campeonato">
                <?php else:?>
                <input class="btn btn-success" type="submit" value="Crear Campeonato">
                <?php endif; ?>
            </div>

        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?=base_url?>javascript/main.js"></script>

<script>
    function seleccionarOpcion(select,valor){
        $(select).val(valor);
    }
</script>

<?php
if(isset($campeonatoSeleccionado)){
    echo "<script>seleccionarOpcion('#idCampeonato','".$campeonatoSeleccionado['ID_CAMPEONATO']."');</script>"; 
    echo "<script>seleccionarOpcion('#nombreAsociacion','".$campeonatoSeleccionado['NOMBRE_CAMPEONATO']."');</script>"; 
    echo "<script>seleccionarOpcion('#dateFechaInicio','".$campeonatoSeleccionado['FECHA_INICIO']."');</script>"; 
    echo "<script>seleccionarOpcion('#selectAsociacion',".$campeonatoSeleccionado['ID_ASOCIACION'].");</script>";
    echo "<script>seleccionarOpcion('#selectSerie',".$campeonatoSeleccionado['ID_SERIE'].");</script>";
    echo "<script>seleccionarOpcion('#selectEstado',".$campeonatoSeleccionado['ID_ESTADO_CAMPEONATO'].");</script>";
}
?>