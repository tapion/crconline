<?php $urlBase = base_url('index.php'); ?>
<!--<div class="row-fluid">-->
<!--<div class="col-sm-12">-->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title">.:: Administracion de Empresas ::.</div>
                </div>
                <!--<div class="container row" style="padding-bottom: 15px">-->
                <div class="row">
                    <div class="col-sm-2">
                        <ul class="nav nav-pills nav-stacked">
                            <li id="newServicio">
                                <a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?php echo site_url('administracion/empresas/crear'); ?>', 'divTabs');">Agregar </a>
                            </li>
                            <li id="consultar" class="active">
                                <a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/adminServicio/consultarAllServi' ?>', 'divTabs');">Consultar y/o Modificar</a>
                            </li>                          
                        </ul>
                    </div>
                    <div class="col-sm-10">
                        <div id="divTabs" class="tab-content" >
                            <script>enviarPeticionAjax('<?= $urlBase . '/administracion/adminServicio/consultarAllServi' ?>', 'divTabs');</script>
                        </div>
                    </div>
                </div>
                <!--                        <div id="priservicio" class="col-md-2" style="padding-left: -15px">
                                            
                                        </div>-->
                <!-- div para mostrar los contenidos de los tabs --> 
                <!--</div>-->
            </div>
        </div>
    </div>
<!--</div>-->
<!--</div>-->