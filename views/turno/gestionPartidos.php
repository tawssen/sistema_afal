<div class="container">
    <div class="max-container">
        <div class="menu-container">
            <button class="btn btn-primary">Goles</button>
            <button class="btn btn-primary">Amonestaciones</button>
            <button class="btn btn-success">Iniciar Partido</button>
            <button class="btn btn-danger">Terminar Partido</button>
            <button class="btn btn-primary">Substituciónes</button>
            <button class="btn btn-primary">Observaciones</button>
        </div>

        <div class="body-container">

            <div class="izq">
                <div class="arriba">
                    <div class="datos">
                        <h4>Unión San Luis</h4>
                        <p>Director Técnico: César Muñoz</p>
                    </div>
                    <div class="jugadores">
                        <ul class="list-group">
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item ">A simple primary list group item</li>
                            <li class="list-group-item">A simple secondary list group item</li>
                            <li class="list-group-item">A simple success list group item</li>
                            <li class="list-group-item">A simple danger list group item</li>
                            <li class="list-group-item">A simple warning list group item</li>
                            <li class="list-group-item list-group-item-info">A simple info list group item</li>
                            <li class="list-group-item list-group-item-light">A simple light list group item</li>
                            <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
                            <li class="list-group-item list-group-item-light">A simple light list group item</li>
                            <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
                            <li class="list-group-item list-group-item-light">A simple light list group item</li>
                            <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
                        </ul>
                    </div>
                </div>
                <div class="abajo">
                    <div class="sucesos">
                    <li class="list-group-item list-group-item-secondary">A simple secondary list group item</li>
                            <li class="list-group-item list-group-item-success">A simple success list group item</li>
                            <li class="list-group-item list-group-item-danger">A simple danger list group item</li>
                            <li class="list-group-item list-group-item-warning">A simple warning list group item</li>
                            <li class="list-group-item list-group-item-info">A simple info list group item</li>
                            <li class="list-group-item list-group-item-light">A simple light list group item</li>
                    </div>
                </div>
            </div>

            <div class="der">
                <div class="arriba">
                    <div class="datos">
                        <h4>Unión Yungay</h4>
                        <p>Director Técnico: Diego Faúndez</p>
                    </div>
                    <div class="jugadores">
                        <ul class="list-group">
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item list-group-item-primary">A simple primary list group item</li>
                            <li class="list-group-item list-group-item-secondary">A simple secondary list group item</li>
                            <li class="list-group-item list-group-item-success">A simple success list group item</li>
                            <li class="list-group-item list-group-item-danger">A simple danger list group item</li>
                            <li class="list-group-item list-group-item-warning">A simple warning list group item</li>
                            <li class="list-group-item list-group-item-info">A simple info list group item</li>
                            <li class="list-group-item list-group-item-light">A simple light list group item</li>
                            <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
                            <li class="list-group-item list-group-item-light">A simple light list group item</li>
                            <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
                            <li class="list-group-item list-group-item-light">A simple light list group item</li>
                            <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
                        </ul>
                    </div>
                </div>
                <div class="abajo">
                    <div class="sucesos">
                            <li class="list-group-item list-group-item-secondary">A simple secondary list group item</li>
                            <li class="list-group-item list-group-item-success">A simple success list group item</li>
                            <li class="list-group-item list-group-item-danger">A simple danger list group item</li>
                            <li class="list-group-item list-group-item-warning">A simple warning list group item</li>
                            <li class="list-group-item list-group-item-info">A simple info list group item</li>
                            <li class="list-group-item list-group-item-light">A simple light list group item</li>
                    </div>
                </div>
            </div>

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