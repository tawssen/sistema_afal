<div class="container mt-3">
    <div class="container mt-5 col-6">

        <?php if(isset($campeonatoSeleccionado) && isset($_GET['in'])):?>
        <form action="<?=base_url?>campeonatos/editar&id=<?=$_GET['id']?>&in=<?=$_GET['in']?>" method="POST" class="border p-5">

        <?php elseif(isset($campeonatoSeleccionado)):?>
        <form action="<?=base_url?>campeonatos/editar&id=<?=$_GET['id']?>" method="POST" class="border p-5">

        <?php elseif(isset($_GET['in'])):?>
        <form action="<?=base_url?>partidos/crear&in=<?=$_GET['in']?>" method="POST" class="border p-5">

        <?php else:?>
        <form action="<?=base_url?>partidos/crear" method="POST" class="border p-5">
        <?php endif; ?>

            <?php if(isset($campeonatoSeleccionado)):?>
            <h1 class="pb-3">Editar campeonato</h1>
            <?php else:?>
            <h1 class="pb-3">Crear Partido</h1>
            <?php endif; ?>
            
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label ">FECHA</label>
                    <input type="date" class="form-control" name="fechapartido" required>
                </div>
                <div class="col-6">
                    <label for="a" class="form-label">FECHA CAMPEONATO</label>
                    <select name="fechacampeonato" class="form-select" id="" >
                        <option value="0" selected>Seleccionar Fecha</option>
                        <option value="Primera">Primera</option>
                        <option value="Segunda">Segunda</option>
                        <option value="Tercera">Tercera</option>
                        <option value="Cuarta">Cuarta</option>
                        <option value="Quinta">Quinta</option>
                        <option value="Sexta">Sexta</option>
                        <option value="Septima">Septima</option>
                        <option value="Octava">Octava</option>
                        <option value="Novena">Novena</option>
                        <option value="Decima">Decima</option>
                        <option value="Decima">Decima</option>
                        <option value="Decimaprimera">Decimoprimera</option>
                        <option value="Decimatercera">Decimotercera</option>
                        <option value="Decimacuarta">Decimocuarta</option>
                        <option value="Decimaquinta">Decimoquinta</option>
                        <option value="Decimasexta">Decimosexta</option>
                        <option value="Decimaseptima">Decimoseptima</option>
                        <option value="Decimactava">Decimoctava</option>
                        <option value="Decimanovena">Decimonovena</option>
                        <option value="Vigesima">Vigesima</option>
                        <option value="Vigesimaprimera">Vigesimaprimera</option>
                        <option value="Vigesimasegunda">Vigesimasegunda</option>
                        <option value="Vigesimatercera">Vigesimatercera</option>
                        <option value="Vigesimacuarta">Vigesimacuarta</option>
                        <option value="Vigesimaquinta">Vigesimaquinta</option>
                        <option value="Vigesimasexta">Vigesimasexta</option>
                        <option value="Vigesimaseptima">Vigesimaseptima</option>
                        <option value="Vigesimaoctava">Vigesimaoctava</option>
                        <option value="Vigesimanovena">Vigesimanovena</option>
                        <option value="Trigesima">Trigesima</option>
                        <option value="Trigesimaprimera">Trigesimaprimera</option>
                        <option value="Trigesimasegunda">Trigesimasegunda</option>
                        <option value="Trigesimatercera">Trigesimatercera</option>
                        <option value="Trigesimacuarta">Trigesimacuarta</option>
                        <option value="Trigesimaquinta">Trigesimaquinta</option>
                        <option value="Trigesimasexta">Trigesimasexta</option>
                        <option value="Trigesimaseptima">Trigesimaseptima</option>
                        <option value="Trigesimaoctava">Trigesimaoctava</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                <label for="a" class="form-label">CLUB LOCAL</label>
                    <select name="clublocal" class="form-select" id="selectClubLocal">
                        <option value="0">Seleccionar Local</option>
                    </select>                    
                </div>
                <div class="col-6">
                    <label for="a" class="form-label">CLUB VISITA</label>
                    <select name="clubvisita" class="form-select" id="selectClubVisita">
                    <option value="0">Seleccionar Visita</option>
                    </select>
                </div>
            </div>
             
            <div>
                <label for="" class="form-label">TURNO</label>
                <select name="turnopartido" class="form-select" id="">
                <option value="0" selected>Seleccionar un Turno</option>
                <?php while($turnos = mysqli_fetch_assoc($todosLosTurnos)){?>
                    <option value="<?php echo $turnos['RUT_PERSONA'] ?>" ><?php echo $turnos['NOMBRE_1'].' '.$turnos['NOMBRE_2'].' '.$turnos['APELLIDO_1'].' '.$turnos['APELLIDO_2'] ?></option>
                <?php } mysqli_free_result($todosLosTurnos)?>
                </select>
            </div>
         
            <div>
                <label for="" class="form-label">ÁRBITRO PRINCIPAL</label>
                <select name="arbitroprincipal" class="form-select" id="arbitroprincipal">
                <option value="0" selected>Seleccionar arbitros</option>
                <?php while($arbitros = mysqli_fetch_assoc($todosLosArbitros)){?>
                    <option value="<?php echo $arbitros['RUT_PERSONA'] ?>" ><?php echo $arbitros['NOMBRE_1'].' '.$arbitros['NOMBRE_2'].' '.$arbitros['APELLIDO_1'].' '.$arbitros['APELLIDO_2'] ?></option>
                <?php } mysqli_free_result($todosLosArbitros)?>
                </select>
            </div>
                    
            <div>
                <label for="" class="form-label">PRIMER ÁRBITRO LINEA</label>
                <select name="segundoarbitro" class="form-select" id="segundoarbitro">
                <option value="0" selected>Seleccionar arbitros</option>
                </select>
            </div>

            <div>
                <label for="" class="form-label">SEGUNDO ÁRBITRO LINEA</label>
                <select name="tercerarbitro" class="form-select" id="tercerarbitro">
                <option value="0" selected>Seleccionar arbitros</option>
                </select>
            </div>

            <div class="row">
                <div class="form-group mt-3 col-4">
                    <label for="" class="form-label">REGION</label>
                    <select id="selectRegion" class="form-select" name="region" aria-label="Default select example" required>
                        <option value="0" selected>Seleccionar Region</option>
                    </select>
                </div>

                <div class="mt-3 col-4">
                <?php if(isset($todasLasProvincias)):?>
                    <label for="" class="form-label">PROVINCIA</label>
                    <select id="selectProvincia" class="form-select" name="provincia" aria-label="Default select example" required>
                        <option value="0" selected>Seleccionar Provincia</option>
                        <?php while($provincia = mysqli_fetch_assoc($todasLasProvincias)){?>
                            <option value="<?php echo $provincia['ID_PROVINCIA'];?>"><?php echo $provincia['NOMBRE_PROVINCIA'];?></option>
                        <?php } mysqli_free_result($todasLasProvincias);?>
                    </select>
                <?php else:?>
                    <label for="" class="form-label">PROVINCIA</label>
                    <select id="selectProvincia" class="form-select" name="provincia" aria-label="Default select example" required>
                        <option value="0" selected>Seleccionar Provincia</option>
                    </select>
                <?php endif; ?>                                
                </div>

                <div class="mt-3 col-4">
                <?php if(isset($todasLasProvincias)):?>
                    <label for="" class="form-label">COMUNA</label>
                    <select id="selectComuna" class="form-select" name="comuna" aria-label="Default select example" required>
                        <option value="0" selected>Seleccionar Comuna</option>
                        <?php while($comuna = mysqli_fetch_assoc($todasLasComunas)){?>
                            <option value="<?php echo $comuna['ID_COMUNA'];?>"><?php echo $comuna['NOMBRE_COMUNA'];?></option>
                        <?php } mysqli_free_result($todasLasComunas);?>
                    </select>
                <?php else:?>
                    <label for="" class="form-label">COMUNA</label>
                    <select id="selectComuna" class="form-select" name="comuna" aria-label="Default select example" required>
                        <option value="0" selected>Seleccionar Comuna</option>
                    </select>
                <?php endif; ?>   
                </div>
            </div>

            <div class="mt-3">
                <label for="callePasaje" class="form-label">CALLE O PASAJE</label>
                <input id="callePasaje" type="text" name="callePasaje" class="form-control" required>
            </div>


            <div class="mt-5 d-flex justify-content-end">
                <a href="<?=base_url?>campeonatos/index" class="btn btn-danger mr-2">Cancelar</a>
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
<script src="<?=base_url?>ajax/javascript/obtenerRegiones.js"></script>
<script src="<?=base_url?>ajax/javascript/obtenerClubes.js"></script>
<script src="<?=base_url?>ajax/javascript/partidosArbitros.js"></script>