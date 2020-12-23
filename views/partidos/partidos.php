<div class="container-xl">
    <div class="row mt-5">
        <div class="col-9">
        <div class="table-responsive">
                <table id="partidosProximos" class="table table-striped table-bordered" style="width:100%;">
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
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-3 border-left">
        <?php while($campeonatos = mysqli_fetch_assoc($todosLosCampeonatos)){?>
            <div class="p-2 contenedor-campeonato" id="<?=$campeonatos['ID_CAMPEONATO']?>" >
                <h5 style="cursor: pointer;"><?=$campeonatos['NOMBRE_CAMPEONATO']?></h5>
                <p><?=$campeonatos['NOMBRE_SERIE']?></p>
            </div>
        <?php } mysqli_free_result($todosLosCampeonatos);?> 
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?=base_url?>datatables/datatables.min.js"></script>
<script src="<?=base_url?>javascript/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="<?=base_url?>ajax/javascript/obtenerCampeonatos.js"></script>