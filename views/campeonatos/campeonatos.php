<div class="container">
<div class="">
    <button class="btn btn-secondary mt-5" onclick="document.location.href='<?=base_url?>campeonatos/gestionCrear'">Crear Campeonato</button>
</div>
</div>

<div class="container mt-3 border-top border-bottom p-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>INICIO</th>
                            <th>ASOCIACIÓN</th>
                            <th>SERIE</th>
                            <th>ESTADO</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($campeonatos = mysqli_fetch_assoc($todosLosCampeonatos)){?>
                        <tr>
                            <td><?php echo $campeonatos['NOMBRE_CAMPEONATO']; ?></td>
                            <td><?php echo $campeonatos['FECHA_INICIO']; ?></td>
                            <td><?php echo $campeonatos['NOMBRE_ASOCIACION']; ?></td>
                            <td><?php echo $campeonatos['NOMBRE_SERIE']; ?></td>
                            <td><?php echo $campeonatos['NOMBRE_ESTADO_CAMPEONATO']; ?></td>
                            <td class="text-center">
                                <button class="btn btn-success" onclick="document.location.href='<?=base_url?>campeonatos/gestionEditar&id=<?=$campeonatos['ID_CAMPEONATO'];?>'">Editar</button>
                                <button class="btn btn-danger btn-eliminar" value="<?=$campeonatos['ID_CAMPEONATO'];?>">Borrar</button>
                            </td>
                        </tr>
                    <?php } mysqli_free_result($todosLosCampeonatos);?>
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
    });
</script>

<script src="<?=base_url?>javascript/main.js"></script>
<script src="<?=base_url?>datatables/datatables.min.js"></script>

<script>
    $('.btn-eliminar').click(function(){
        let id = $(this).val();
    });
</script>




