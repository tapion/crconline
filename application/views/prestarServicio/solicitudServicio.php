<link href="<?php echo base_url('js/datepickerbootstrap/css/datepicker.css'); ?>" rel="stylesheet" media="screen">       
<?php $urlBase = base_url('index.php'); ?>
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
            <div class="col-lg-9">
                <table style="width: 95%" border="0" cellpadding="5">
                    <tr>
                        <td style="width: 35%">
                            Tipo Servicio
                        </td>
                        <td>
                            <?php
                            $opciones = array('' => 'Seleccione..');
                            foreach ($tipoServicios as $dtsTipServi) {
                                $opciones[$dtsTipServi->tipo_servicio_id] = $dtsTipServi->tipo_servicio_nombre;
                            }

                            $js = 'class="chzn-select" id="tipServicio" onChange="" style="width: 70%" parsley-required="tipo servicio" parsley-error-container="div#errortipServicio"';
                            echo form_dropdown('tipoServicio', $opciones, NULL, $js);
                            ?>   
                            <div id="errortipServicio"></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 35%">
                            Servicio
                        </td>
                        <td>
                            dsa                              
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 35%">
                            Expedici&oacute;n de identificaci&oacute;n
                        </td>
                        <td>
                           asd
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 35%">
                            Fecha Nacimiento
                        </td>
                        <td>
                            asd
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 35%">
                            Lugar Nacimiento
                        </td>
                        <td>
                           asd
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 35%">
                            Genero
                        </td>
                        <td>
                           asd
                        </td>
                    </tr>                    
                </table>  
            </div>            
        </div>
        <div class="form-actions" style="padding-top: 20px">   
            <?php
            if (isset($opcion) && !empty($opcion)) {
                if ($opcion == 'editPersona') {
                    ?>
                    <button id="pruebass" class="btn btn-sm btn-primary" type="button" onclick="enviarDts();"><strong>Editar</strong></button>
                    <?php
                }
            } else {
                ?>
                <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/operativo/prestarServicio/newEditPersona' ?>', 'divTabs', 'formSolicitud');"><strong>Ingresar</strong></button>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<script src="<?php echo base_url('js/prestarServicio.js') . '?' . C_VERSION; ?>"></script>
<?= form_close(); ?>