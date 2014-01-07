<?php $urlBase = base_url('index.php'); ?>
<div class="panel panel-default bootstrap-admin-no-table-panel">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title"><label>.:: Prestar Servicio ::.</label></div>
    </div>
    <div class="degradeContent container">
        <div class="row">
            <div class="col-md-2" id="dtsBasicosPersonas">
                <form id="formConsulCliente">
                    <div class="form-group">
                        <label>Tipo Documento</label>
                        <div>
                            <?php
                            $opciones = array('' => 'Seleccione..');
                            foreach ($tiposDoc as $dtsTipDoc) {
                                $opciones[$dtsTipDoc->tipo_doc_id] = $dtsTipDoc->tipo_doc_nombre;
                            }

                            $js = 'class="chzn-select" style="width: 90%" id="tipoDocumento" onChange="" parsley-required="tipo documento" parsley-error-container="div#errortipDoc"';
                            echo form_dropdown('tipoDocumento', $opciones, NULL, $js);
                            ?>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label>N&uacute;mero Documento</label>
                        <div>
                            <input type="text" name="numeroDocumento" id="numeroDocumento" class="form-control" placeholder="N&uacute;mero documento" parsley-required="n&uacute;mero documento" parsley-error-container="div#errortipDoc" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="groupBotones">
                            <button class="btn btn-sm btn-primary" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/operativo/prestarServicio/consultPersona' ?>', 'dtsPersonas', 'formConsulCliente');
                                    deshabilitarcampos('dtsBasicosPersonas', 'formConsulCliente', new Array('input', 'select'));"><strong>Consultar</strong></button>
                        </div>
                    </div>                    
                    <div id="errortipDoc" align="justify"></div>
                </form>
                <div id="dtsApplet"></div>
            </div>
            <div class="tab-content container col-md-10">
                <div id="dtsPersonas" ></div>
                <div id="dtsServicio" ></div>
            </div>            
        </div>
    </div>   
</div>
<script>$('.chzn-select').chosen();</script>