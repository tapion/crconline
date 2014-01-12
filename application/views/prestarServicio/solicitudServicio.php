<link href="<?php echo base_url('js/datepickerbootstrap/css/datepicker.css'); ?>" rel="stylesheet" media="screen">       
<?= form_open('', array('class' => 'form-search', 'id' => 'formSolicitud')); ?>
<input type="hidden" name="numeroDocumento" id="numeroDocumento" value="<?= $numeroDocumento; ?>" />
<input type="hidden" name="tipoDocumento" id="tipoDocumento" value="<?= $tipoDocumento; ?>" />
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title">                
            <label>Solicitud</label>
        </div>
    </div> 
    <div class="degradeContent">        
        <div class="row">                        
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Tipo</label>
                    <div>
                        <?php
                        $opciones = array('' => 'Seleccione..');
                        foreach ($tipo as $dtsTip) {
                            $opciones[$dtsTip->tipo_id] = $dtsTip->tipo_nombre;
                        }
                        $js = 'class="chzn-select" onChange="enviarAjax(\'' . site_url('/operativo/prestarServicio/eventosAjax') . '\',\'formSolicitud\',\'masDtsDuplicados\',\'cargarDuplicado\');" id="tipo" style="width: 90%" parsley-required="tipo" parsley-error-container="div#errortipo"';
                        echo form_dropdown('tipo', $opciones, NULL, $js);
                        ?>                
                        <div id="errortipo"></div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Servicio</label>
                    <div>
                        <?php
                        $opciones = array('' => 'Seleccione..');
                        foreach ($servicios as $dtsServi) {
                            $opciones[$dtsServi->servicio_id] = strtoupper($dtsServi->servicio_nombre);
                        }

                        $js = 'class="chzn-select" id="servicio" onChange="enviarAjax(\'' . site_url('/operativo/prestarServicio/eventosAjax') . '\',\'formSolicitud\',\'masDtsDuplicados\',\'cargarDuplicado\');
                                enviarAjax(\'' . site_url('/operativo/prestarServicio/eventosAjax') . '\',\'formSolicitud\',\'dtsAdiServicio\',\'cargarDtsAdicionales\');" style="width: 90%" parsley-required="tipo servicio" parsley-error-container="div#errorServicio"';
                        echo form_dropdown('servicio', $opciones, NULL, $js);
                        ?>   
                        <div id="errorServicio"></div>   
                    </div>
                </div>
            </div>
            <div id="masDtsDuplicados" class="col-lg-5 form-group">
            </div>                                   
        </div>
        <div class="row">
            <div id="dtsAdiServicio">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-actions" >   
                    <?php
                    if (isset($opcion) && !empty($opcion)) {
                        if ($opcion == 'editPersona') {
                            ?>
                            <button id="pruebass" class="btn btn-sm btn-primary" type="button" onclick="enviarDts();"><strong>Editar</strong></button>
                            <?php
                        }
                    } else {
                        ?>
                        <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjax('<?= site_url('/operativo/prestarServicio/newEditPersona'); ?>', 'divTabs', 'formSolicitud');"><strong>Ingresar</strong></button>
                        <?php
                    }
                    ?>
                </div>
            </div>            
        </div>        
    </div>
</div>
<?= form_close(); ?>
<!-- Modal -->
<div class="modal fade" id="examenesaCargar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Examenes A Cargar</h4>
            </div>
            <div id="cuerpoModal" class="modal-body">
                <?= $numeroDocumento; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div> 
<script src="<?php echo base_url('js/prestarServicio.js') . '?' . C_VERSION; ?>"></script>
