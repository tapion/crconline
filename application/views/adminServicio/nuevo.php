<?php $urlBase = base_url('index.php'); ?>
<?= form_open('', array('class' => 'form-search', 'id' => 'formServicio')); ?>
<?php
$seltipSer = $selSede = $selEdadMin = $selEdadMax = $selValSer = $selValCer = $selNomSer = $script = NUll;
if (isset($registros) && !empty($registros)) {
    if (isset($opcion) && !empty($opcion)) {
        if ($opcion == 'editServicio') {
            $titulo = 'Modificar Servicio';
        } else {
            $titulo = 'Consultar Servicio';
        }
    }
    foreach ($registros as $dtsRegistros) {
        $seltipSer = $dtsRegistros->servicio_tipo_servicio_id;
        $selSede = $dtsRegistros->servicio_sede_id;
        $selEdadMin = $dtsRegistros->servicio_edad_minima;
        $selEdadMax = $dtsRegistros->servicio_edad_maxima;
        $selValSer = $dtsRegistros->servicio_valor;
        $selValCer = $dtsRegistros->servicio_valor_certificado;
        $selNomSer = $dtsRegistros->servicio_nombre;
    }
    if (isset($regSubexamen) && !empty($regSubexamen)) {
        foreach ($regSubexamen as $dtsregSubexamen) {
            $script .= "$('#" . $dtsregSubexamen->servicio_subexamen_subexamen_id . "').attr('checked',true);";
        }
    }
    ?>
    <input type="hidden" name="idServicio" id="idServicio" value="<?= $dtsRegistros->servicio_id ?>" />
    <?php
}
?>   
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title">                
            <label><?= $titulo; ?></label>
        </div>
    </div> 
    <div class="degradeContent">
        <div>    

            <table style="width: 100%" border="0" cellpadding="5">
                <tr>
                    <td style="width: 20%">
                        Tipo Servicio
                    </td>
                    <td style="width: 80%">
                        <?php
                        $opciones = array('' => 'Seleccione..');
                        foreach ($tipoServicios as $dtsTipServi) {
                            $opciones[$dtsTipServi->tipo_servicio_id] = $dtsTipServi->tipo_servicio_nombre;
                        }

                        $js = 'class="chzn-select" id="tipServicio" onChange="" style="width: 40%" parsley-required="tipo servicio" parsley-error-container="div#errortipServicio"';
                        echo form_dropdown('tipoServicio', $opciones, $seltipSer, $js);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><div id="errortipServicio"></div></td>        
                </tr>
                <tr>
                    <td style="width: 20%">
                        Sede
                    </td>
                    <td style="width: 80%">
                        <?php
                        # aca falta consultar en la BD pero esta lista depende de la empresa para filtrar
                        $opcSedes = array('' => 'Seleccione..');
                        foreach ($sedes as $dtsSedes) {
                            $opcSedes[$dtsSedes->sede_id] = $dtsSedes->sede_nombre;
                        }

                        $js = 'class="chzn-select" id="sede" style="width: 25%" parsley-required="sede" parsley-error-container="div#errorSede"';
                        echo form_dropdown('sede', $opcSedes, $selSede, $js);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><div id="errorSede"></div></td>        
                </tr>
                <tr>
                    <td style="width: 20%">
                        Servicio
                    </td>
                    <td style="width: 80%">
                        <input style="width: 25%" class="form-control" type="text" id="txtServicio" name="txtServicio" placeholder="Servicio" parsley-required="servicio" value="<?php
                        echo $selNomSer;
                        echo set_value('txtServicio');
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        Edad Minima
                    </td>
                    <td style="width: 80%">
                        <?php
                        $edades = array('' => 'Sele...');
                        for ($i = 13; $i < 100; $i++) {
                            $edades[$i] = $i;
                        }

                        $js = 'class="chzn-select" id="edadMin" style="width: 15%" parsley-required="edad m&iacute;nima" parsley-error-container="div#errorEdadMin"';
                        echo form_dropdown('edadMin', $edades, $selEdadMin, $js);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><div id="errorEdadMin"></div></td>        
                </tr>
                <tr>
                    <td style="width: 20%">
                        Edad Maxima
                    </td>
                    <td style="width: 80%">
                        <?php
                        $js = 'class="chzn-select" id="edadMax" style="width: 15%" parsley-required="edad m&aacute;xima" parsley-error-container="div#errorEdadMax"';
                        echo form_dropdown('edadMax', $edades, $selEdadMax, $js);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><div id="errorEdadMax"></div></td>        
                </tr>
                <tr>
                    <td style="width: 20%">
                        Valor Servicio
                    </td>
                    <td style="width: 80%">
                        <input style="width: 25%" class="form-control" type="number" id="txtVlrServicio" name="txtVlrServicio" placeholder="Valor Servicio" parsley-required="valor servicio" parsley-min="0" value="<?php
                        echo $selValSer;
                        echo set_value('txtVlrServicio');
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        Valor Certificado
                    </td>
                    <td style="width: 80%">
                        <input style="width: 25%" class="form-control" type="number" id="txtVlrCerti" name="txtVlrCerti" placeholder="Valor Certificado" parsley-required="valor certificado" parsley-min="0" value="<?php
                        echo $selValCer;
                        echo set_value('txtVlrCerti');
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        Estado
                    </td>
                    <td style="width: 80%">
                        <?php
                        $estados = array('TRUE' => 'Activo', 'FALSE' => 'Inactivo');
                        $js = 'class="chzn-select" id="estado" style="width: 15%" parsley-required="estado"';
                        echo form_dropdown('estado', $estados, 'large', $js);
                        ?>
                    </td>
                </tr>        
            </table> 
            <br>
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">EXAMENES</legend>        
                <div class="bs-example bs-example-tabs">
                    <ul id="myTab" class="nav nav-tabs">
                        <?php
                        foreach ($tipoExamen as $key => $dtsTipoExamen) {
                            if ($key == 0)
                                $comp = 'class="active"';
                            else
                                $comp = NULL;
                            ?>
                            <li <?= $comp; ?> ><a href="#<?= str_replace(' ', '', $dtsTipoExamen->tipo_examen_nombre); ?>" data-toggle="tab"><?= $dtsTipoExamen->tipo_examen_nombre; ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>   
                    <div id="myTabContent" class="tab-content">
                        <?php
                        foreach ($tipoExamen as $key => $dtsTipoExamen) {
                            if ($key == 0)
                                $comp = 'in active';
                            else
                                $comp = NULL;
                            ?>
                            <div class="tab-pane fade <?= $comp; ?>" style="padding-top: 10px" id="<?= str_replace(' ', '', $dtsTipoExamen->tipo_examen_nombre); ?>">
                                <?php
                                $i = 1;
                                foreach ($subExamen as $dtsSubExamen) {
                                    ?>
                                    <div class="row">
                                        <?php
                                        foreach ($dtsSubExamen as $finSubExamen) {
                                            if ($finSubExamen->subexamen_tipo_examen_id == $dtsTipoExamen->tipo_examen_id) {
                                                if (($i % 2) != 0) {
                                                    ?>                                    
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <label>
                                                                <input type="checkbox" id="<?= $finSubExamen->subexamen_id; ?>" name="<?= $finSubExamen->subexamen_id; ?>">
                                                            </label>
                                                            <?= ucwords(strtolower($finSubExamen->subexamen_nombre)); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <label>
                                                                <input type="checkbox" id="<?= $finSubExamen->subexamen_id; ?>" name="<?= $finSubExamen->subexamen_id; ?>">
                                                            </label>
                                                            <?= ucwords(strtolower($finSubExamen->subexamen_nombre)); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>        
            </fieldset>    
            <div>
                <button id="btnselect" type="button" class="btn btn-sm btn-default" onclick="marcaciones(true);" >
                    <span class="glyphicon glyphicon-chevron-down" id="marcar">&nbsp;Marcar Todos</span> 
                </button>
            </div>
        </div>
        <div class="form-actions" style="padding-top: 20px">   
            <?php
            if (isset($opcion) && !empty($opcion)) {
                if ($opcion == 'editServicio') {
                    ?>
                    <button class="btn btn-sm btn-primary" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/adminServicio/' . $opcion ?>', 'divTabs', 'formServicio');"><strong>Editar</strong></button>
                    <?php
                }
                ?>
                <button class="btn btn-sm btn-danger" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/adminServicio/index' ?>', 'divTabs');"><strong>Cancelar</strong></button>
                <?php
            } else {
                ?>
                <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/adminServicio/createServicio' ?>', 'divTabs', 'formServicio');"><strong>Ingresar</strong></button>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<script>$('.chzn-select').chosen();</script>
<script><?= $script; ?></script>
<?= form_close(); ?>