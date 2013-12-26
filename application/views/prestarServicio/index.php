<?php $urlBase = base_url('index.php'); ?>
<div class="panel panel-default bootstrap-admin-no-table-panel">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title"><label>.:: Prestar Servicio ::.</label></div>
    </div>
    <div class="degradeContent container">
        <div class="row">
            <div class="col-md-3" id="dtsBasicosPersonas">
                <form id="formConsulCliente">
                    <table cellpadding="7">
                        <tr>
                            <td align="right" >
                                Tipo Documento
                            </td>
                            <td align="left">
                                <?php
                                $opciones = array('' => 'Seleccione..');
                                foreach ($tiposDoc as $dtsTipDoc) {
                                    $opciones[$dtsTipDoc->tipo_doc_id] = $dtsTipDoc->tipo_doc_nombre;
                                }

                                $js = 'class="chzn-select" id="tipoDocumento" onChange="" parsley-required="tipo documento" parsley-error-container="div#errortipDoc"';
                                echo form_dropdown('tipoDocumento', $opciones, NULL, $js);
                                ?>                              
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >
                                N&uacute;mero Documento
                            </td>
                            <td align="left">
                                <input type="text" name="numeroDocumento" id="numeroDocumento" class="form-control" placeholder="N&uacute;mero documento" parsley-required="n&uacute;mero documento" parsley-error-container="div#errortipDoc" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <button class="btn btn-sm btn-primary" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/operativo/prestarServicio/consultPersona' ?>', 'masDts', 'formConsulCliente');deshabilitarcampos('dtsBasicosPersonas','formConsulCliente', new Array('input','select'));"><strong>Consultar</strong></button>
                            </td>
                        </tr>
                    </table>
                    <div id="errortipDoc" align="justify"></div>
                </form>
            </div>
            <div class="tab-content container col-md-9">
                <div id="masDts" ></div>
            </div>
        </div>
    </div>   
</div>
<script>$('.chzn-select').chosen();</script>