
<!--<div class="row-fluid">-->
<!--<div class="col-sm-12">-->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title">.:: Administracion de Equipos ::.</div>
                </div>
                <!--<div class="container row" style="padding-bottom: 15px">-->
                <div class="row">
                    <div class="col-sm-2">
                        <ul class="nav nav-pills nav-stacked">
                            <li id="consultar" class="active">
                                <a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= site_url('administracion/equipos/filtros'); ?>', 'divTabs');">Consultar</a>
                            </li>
                            <li id="newServicio">
                                <a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= site_url('administracion/equipos/create'); ?>', 'divTabs');">Agregar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-10">
                        <div id="divTabs" class="tab-content" >
                            <?php //$this->load->view('equipos/consultar'); ?>
                            <script>enviarPeticionAjax('<?= site_url('administracion/equipos/filtros'); ?>', 'divTabs');</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--</div>-->
<!--</div>-->
