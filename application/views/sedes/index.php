<?php $urlBase = base_url('index.php'); ?>
<div class="panel panel-default bootstrap-admin-no-table-panel">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title"><label>.:: Administracion de Sedes ::.</label></div>
    </div>
    <div class="row">
        <div id="priservicio" class="col-md-2" style="padding-left: -15px">
            <ul class="nav nav-pills nav-stacked">
                <li id="consultar" class="active"><a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/sedes/consultarAllSedes' ?>', 'divTabs');">Consultar</a></li>
                <li id="newServicio">
                    <a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/sedes/newSede' ?>', 'divTabs');">Agregar </a></li>
                
            </ul>
        </div>
        <!-- div para mostrar los contenidos de los tabs --> 
        <div id="divTabs" class="tab-content container col-md-10">
            <script>enviarPeticionAjax('<?= $urlBase . '/administracion/sedes/consultarAllSedes' ?>', 'divTabs');</script>
        </div>
    </div>
</div>
