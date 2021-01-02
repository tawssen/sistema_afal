<div class="container">
    <div class="row mt-5">
        <div class="table-responsive">
            <table id="partidosTurno" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>FECHA CAMPEONATO</th>
                        <th>FECHA PARTIDO</th>
                        <th>LOCAL</th>
                        <th>VISITANTE</th>
                        <th>ARBITRO PRINCIPAL</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($partido=mysqli_fetch_assoc($partidosTurno)){?>
                       <tr>
                       <td><?php echo $partido['FECHA_STRING']?></td>
                       <td><?php echo $partido['FECHA_DATE'] ?></td>
                       <td><?php echo $partido['CLUB_LOCAL'] ?></td>
                       <td><?php echo $partido['CLUB_VISITA'] ?></td>
                       <td><?php echo $partido['NOMBRE_ARBITRO'] ?></td>
                       </tr>
                    <?php }?>    
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#partidosTurno').DataTable();
    } );
</script>
<script src="<?=base_url?>javascript/main.js"></script>
<script src="<?=base_url?>datatables/datatables.min.js"></script>