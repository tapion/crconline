<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">.:: Administracion de Servicios ::.</div>
            </div>
            <div class="row">
                <div id="principalOpc" class="col-sm-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li id="newServicio">
                            <a href="#" data-toggle="tab" onclick="enviarPeticionAjaxJSON('<?= site_url('administracion/adminServicio/newServicio'); ?>', 'divTabs');">Agregar </a>
                        </li>
                        <li id="consultar" class="active">
                            <a href="#" data-toggle="tab" onclick="enviarPeticionAjaxJSON('<?= site_url('administracion/adminServicio/consultarAllServi'); ?>', 'divTabs');">Consultar y/o Modificar</a>
                        </li>                          
                    </ul>
                </div>
                <div class="col-sm-10">
                    <div id="divTabs" class="tab-content" >
                        <script>enviarPeticionAjaxJSON('<?= site_url('administracion/adminServicio/consultarAllServi'); ?>', 'divTabs');</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>