<?php $urlBase = base_url('index.php'); ?>

<div class="panel panel-default bootstrap-admin-no-table-panel">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title">.:: Administracion de Funcionalidades ::.</div>
    </div><br>
    <div class="container row" style="padding-bottom: 15px">
        <div id="priservicio" class="col-md-2" style="padding-left: -15px">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= $urlBase . '/funcionalidad/listAllFunctionality' ?>', 'divTabs')">Listar</a></li>
                <li><a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= $urlBase . '/funcionalidad/newFunctionality' ?>', 'divTabs')">Nuevo</a></li>
                <li><a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= $urlBase . '/funcionalidad/ordenar' ?>', 'divTabs')">Ordenar Modulos</a></li>                          
            </ul>
        </div>
        <!-- div para mostrar los contenidos de los tabs --> 
        <div id="divTabs" class="tab-content container col-md-10" >
            <script>enviarPeticionAjax('<?= $urlBase . '/funcionalidad/listAllFunctionality' ?>', 'divTabs');</script>
        </div>
    </div>        
    <br>
</div>
<br><br><br>
