<?php $urlBase = base_url('index.php'); ?>
<div class="panel panel-default bootstrap-admin-no-table-panel">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title"><label>.:: Administracion de Servicios ::.</label></div>
    </div>
    <div class="row">
        <div id="priservicio" class="col-md-2" style="padding-left: -15px">
            <ul class="nav nav-pills nav-stacked">
                <li id="newServicio">
                    <a href="#" data-toggle="tab" onclick="enviarPeticionAjaxJSON('<?= site_url('/administracion/adminServicio/newServicio') ?>', 'divTabs');">Agregar </a></li>
                <li id="consultar" class="active"><a href="#" data-toggle="tab" onclick="enviarPeticionAjaxJSON('<?= site_url('/administracion/adminServicio/consultarAllServi') ?>', 'divTabs');">Consultar y/o Modificar</a></li>                          
            </ul>
        </div>
        <!-- div para mostrar los contenidos de los tabs --> 
        <div id="divTabs" class="tab-content container col-md-10">
            <script>enviarPeticionAjaxJSON('<?= site_url('/administracion/adminServicio/consultarAllServi') ?>', 'divTabs');</script>
        </div>
    </div>
</div>
