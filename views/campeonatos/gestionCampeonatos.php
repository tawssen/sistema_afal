<div class="container mt-3">
    <div class="container mt-5 col-6">

        <form action="<?=base_url?>campeonatos/crear" method="POST" class="border p-5">
            <h1 class="pb-3">Crear campeonato</h1>
            <div class="">
                <label for="nombreAsociacion" class="form-label">NOMBRE CAMPEONATO</label>
                <input class="form-control" id="nombreAsociacion" name="nombre" type="text" value="Campeonato AFAL 202X">
            </div>

            <div class="mt-3">
                <label for="" class="form-label">FECHA DE INICIO</label>
                <input id="dateFechaInicio" type="date" class="form-control">
            </div>

            <div class="mt-3">
                <label for="" class="form-label">ASOCIACIÓN</label>
                <select id="selectAsociacion" class="form-select" aria-label="Default select example">
                    <option value="0" selected>Seleccionar Asociación</option>
                    <?php while($serie = mysqli_fetch_assoc($todasLasSeries)){?>
                        <option value="<?php echo $serie['ID_SERIE'];?>"><?php echo $serie['NOMBRE_SERIE'];?></option>
                    <?php } mysqli_free_result($todasLasSeries);?>
                </select>
            </div>

            <div class="mt-3">
                <label for="" class="form-label">SERIE</label>
                <select id="selectSerie" class="form-select" aria-label="Default select example" required>
                    <option value="0" selected>Seleccionar Serie</option>
                    <?php while($asociacion = mysqli_fetch_assoc($todasLasAsociaciones)){?>
                        <option value="<?php echo $asociacion['ID_ASOCIACION'];?>"><?php echo $asociacion['NOMBRE_ASOCIACION'];?></option>
                    <?php } mysqli_free_result($todasLasAsociaciones);?>
                </select>
            </div>
            <div class="mt-5 d-flex justify-content-end">
                <button class="btn btn-danger mr-2">Cancelar</button>
                <input class="btn btn-success" type="submit" value="Crear Campeonato">
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
echo "<script>seleccionarOpcion('#nombreAsociacion','".$campeonatoSeleccionado['NOMBRE_CAMPEONATO']."');</script>"; 
echo "<script>seleccionarOpcion('#dateFechaInicio','".$campeonatoSeleccionado['FECHA_INICIO']."');</script>"; 
echo "<script>seleccionarOpcion('#selectAsociacion',".$campeonatoSeleccionado['ID_ASOCIACION'].");</script>";
echo "<script>seleccionarOpcion('#selectSerie',".$campeonatoSeleccionado['ID_SERIE'].");</script>";
?>