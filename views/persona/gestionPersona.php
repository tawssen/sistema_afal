<div class="container mt-3">
    <div class="container mt-5 col-6">

        <?php if(isset($usuarioSeleccionado) && isset($_GET['in'])):?>
        <form action="<?=base_url?>persona/editar&id=<?=$_GET['id']?>&in=<?=$_GET['in']?>" method="POST" class="border p-5">

        <?php elseif(isset($usuarioSeleccionado)):?>
        <form action="<?=base_url?>persona/editar&id=<?=$_GET['id']?>" method="POST" class="border p-5">

        <?php elseif(isset($_GET['in'])):?>
        <form action="<?=base_url?>persona/crear&in=<?=$_GET['in']?>" method="POST" class="border p-5">

        <?php else:?>
        <form action="<?=base_url?>persona/crear" method="POST" class="border p-5">
        <?php endif; ?>

            <?php if(isset($usuarioSeleccionado)):?>
            <h1 class="pb-3">Editar Persona</h1>
            <?php else:?>
            <h1 class="pb-3">Crear Persona</h1>
            <?php endif; ?>
            
            <?php if(isset($_SESSION['mensajeError'])):?>
                <p class="alert alert-danger">La acción no se ha podido llevar a cabo. Vuelva a intentarlo por favor.</p>
            <?php endif; ?>

            <?php if(isset($usuarioSeleccionado)):?>
            <div class="">
                <input class="form-control" id="idPersona" name="idPersona" type="hidden" value="">
            </div>
            <?php endif; ?>
            
            <div class="row mt-3">
             <div class="col-8">
                <label for="rutPersona" class="form-label">RUT</label>
                <input class="form-control" id="rutPersona" name="rutPersona" type="numeric" placeholder="12345678" required>
             </div>
             <div class="col-4">
                <label for="dvPersona" class="form-label">DV</label>
                <input class="form-control" id="dvPersona" name="dvPersona" type="text" placeholder="k o 1-9" required>
             </div>
            </div>
            
            <div class="row mt-3">
             <div class="col-6">
                <label for="nombrePersona1" class="form-label">PRIMER NOMBRE</label>
                <input class="form-control" id="nombrePersona1" name="nombrePersona1" type="text" placeholder="12345678" required>
             </div>
             <div class="col-6">
                <label for="nombrePersona2" class="form-label">SEGUNDO NOMBRE</label>
                <input class="form-control" id="nombrePersona2" name="nombrePersona2" type="text" placeholder="k o 1-9" required>
             </div>
            </div>
            
            <div class="row mt-3">
             <div class="col-6">
                <label for="apellidoPersona1" class="form-label">PRIMER APELLIDO</label>
                <input class="form-control" id="apellidoPersona1" name="apellidoPersona1" type="text" placeholder="12345678" required>
             </div>
             <div class="col-6">
                <label for="apellidoPersona2" class="form-label">SEGUNDO APELLIDO</label>
                <input class="form-control" id="apellidoPersona2" name="apellidoPersona2" type="text" placeholder="k o 1-9" required>
             </div>
            </div>

            <div class="mt-3">
                <label for="fechaNacimiento" class="form-label">FECHA NACIMIENTO</label>
                <input class="form-control" id="fechaNacimiento" name="fechaNacimiento" type="date" value="" required>
            </div>

            <div class="mt-3">
                <label for="numeroTelefono" class="form-label">NUMERO TELEFONO</label>
                <input id="numeroTelefono" type="number" name="numeroTelefono" class="form-control" required>
            </div>
            
            <div class="mt-3">
                <label for="correoElectronico" class="form-label">CORREO ELECTRONICO</label>
                <input id="correoElectronico" type="email" name="correoElectronico" class="form-control" required>
            </div>

            <div class="row">
                <div class="form-group mt-3 col-4">
                    <label for="" class="form-label">REGION</label>
                    <select id="selectRegion" class="form-select" name="region" aria-label="Default select example" required>
                        <option value="0" selected>Seleccionar Region</option>
                    </select>
                </div>

                <div class="form-group mt-3 col-4">
                    <label for="" class="form-label">PROVINCIA</label>
                    <select id="selectProvincia" class="form-select" name="provincia" aria-label="Default select example" required>
                        <option value="0" selected>Seleccionar Provincia</option>
                    </select>
                </div>

                <div class="form-group mt-3 col-4">
                    <label for="" class="form-label">COMUNA</label>
                    <select id="selectComuna" class="form-select" name="comuna" aria-label="Default select example" required>
                        <option value="0" selected>Seleccionar Comuna</option>
                    </select>
                </div>                
            </div>

            <div class="mt-3">
                <label for="callePasaje" class="form-label">CALLE O PASAJE</label>
                <input id="callePasaje" type="text" name="callePasaje" class="form-control" required>
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

            <div class="form-grop mt-3">
                <label for="" class="form-label">PERFILES</label>
                <select id="selectPerfil" class="form-select" name="perfilPersona" aria-label="Default select example" required>
                    <option value="0" selected>Seleccionar Perfil</option>
                    <?php while($perfil = mysqli_fetch_assoc($todosLosPerfiles)){?>
                    <option value="<?php echo $perfil['ID_PERFIL'];?>"><?php echo $perfil['NOMBRE_PERFIL'];?></option>
                    <?php } mysqli_free_result($todosLosPerfiles);?>
                </select> 
            </div>

            <div class="mt-5 d-flex justify-content-end">
                <a href="<?=base_url?>persona/index" class="btn btn-danger mr-2">Cancelar</a>
                <?php if(isset($usuarioSeleccionado)):?>
                <input class="btn btn-success" type="submit" value="Actualizar Persona">
                <?php else:?>
                <input class="btn btn-success" type="submit" value="Crear Persona">
                <?php endif; ?>
            </div>

        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?=base_url?>javascript/main.js"></script>
<script src="<?=base_url?>ajax/javascript/obtenerRegiones.js"></script>
