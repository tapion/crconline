<?php $urlBase = base_url('index.php'); ?>
<div class="panel panel-default bootstrap-admin-no-table-panel">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title">.:: Administracion de Servicios ::.</div>
    </div>
    <br>
    <div class="container row">
        <div class="col-md-2" style="padding-left: -15px">
            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/adminServicio/newServicio' ?>', 'divTabs')">Agregar Servicio</a></li>
                <li><a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= $urlBase . '/usuario/crear' ?>', 'divTabs')">Consultar y Modificar Servicio</a></li>                          
            </ul>
        </div>
        <!-- div para mostrar los contenidos de los tabs --> 
        <div id="divTabs" class="tab-content container col-md-10" >
            <!--<script>enviarPeticionAjax('<?= $urlBase . '/admin/filtrar' ?>', 'divTabs');</script>-->
        </div>
    </div>
</div>