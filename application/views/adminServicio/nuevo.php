<?= form_open('', array('class' => 'form-search', 'id' => 'formServicio')); ?>
<?php
$seltipSer = $selSede = $selEdadMin = $selEdadMax = $selValSer = $selValCer = $selNomSer = $script = $seltip = NUll;
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
        $seltip = $dtsRegistros->servicio_tipo_id;
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
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group" >
                    <label class="control-label" for="classtipo">Tipo</label>
                    <div>
                        <?php
                        $opciones = array('' => 'Seleccione..');  
                        foreach ($tipo as $dtsTip) {
                            $opciones[$dtsTip->tipo_id] = $dtsTip->tipo_nombre;
                        }
                        $js = 'class="chzn-select" id="tipo" style="width: 90%" parsley-required="tipo" parsley-error-container="div#errortipo"';
                        echo form_dropdown('tipo', $opciones, $seltip, $js);
                        ?>
                    </div>                    
                    <div id="errortipo"></div>
                </div>
                <div class="form-group" >
                    <label class="control-label" for="classtipo">Tipo Servicio</label>
                    <div>
                        <?php
                        $opciones = array('' => 'Seleccione..');
                        foreach ($tipoServicios as $dtsTipServi) {
                            $opciones[$dtsTipServi->tipo_servicio_id] = $dtsTipServi->tipo_servicio_nombre;
                        }

                        $js = 'class="chzn-select" id="tipServicio" style="width: 90%" parsley-required="tipo servicio" parsley-error-container="div#errortipServicio"';
                        echo form_dropdown('tipoServicio', $opciones, $seltipSer, $js);
                        ?>
                    </div>                    
                    <div id="errortipServicio"></div>
                </div>
                <div class="form-group" >
                    <label class="control-label" for="classtipo">Sede</label>
                    <div>
                        <?php
                        # aca falta consultar en la BD pero esta lista depende de la empresa para filtrar
                        $opcSedes = array('' => 'Seleccione..');
                        foreach ($sedes as $dtsSedes) {
                            $opcSedes[$dtsSedes->sede_id] = $dtsSedes->sede_nombre;
                        }

                        $js = 'class="chzn-select" style="width: 90%" id="sede" parsley-required="sede" parsley-error-container="div#errorSede"';
                        echo form_dropdown('sede', $opcSedes, $selSede, $js);
                        ?>
                    </div>                    
                    <div id="errorSede"></div>
                </div>                  
            </div>  
            <div class="col-sm-3">
                <div class="form-group" >
                    <label class="control-label" for="classtipo">Servicio</label>
                    <div>
                        <input class="form-control input-sm" type="text" id="txtServicio" name="txtServicio" placeholder="Servicio" parsley-required="servicio" value="<?php
                        echo $selNomSer;
                        echo set_value('txtServicio');
                        ?>">
                    </div>                    
                </div>
                <div class="form-group" >
                    <label class="control-label" for="classtipo">Estado</label>
                    <div>
                        <?php
                        $estados = array('TRUE' => 'Activo', 'FALSE' => 'Inactivo');
                        $js = 'class="chzn-select" id="estado" parsley-required="estado"';
                        echo form_dropdown('estado', $estados, 'large', $js);
                        ?>
                    </div>                                       
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group" >
                    <label class="control-label" for="classtipo">Valor Servicio</label>
                    <div>
                        <input class="form-control input-sm" type="text" id="txtVlrServicio" name="txtVlrServicio" placeholder="Valor Servicio" parsley-required="valor servicio" parsley-type="number" parsley-min="0" value="<?php
                        echo $selValSer;
                        echo set_value('txtVlrServicio');
                        ?>">
                    </div>                                       
                </div>
                <div class="form-group" >
                    <label class="control-label" for="classtipo">Valor Certificado</label>
                    <div>
                        <input class="form-control input-sm" type="text" id="txtVlrCerti" name="txtVlrCerti" placeholder="Valor Certificado" parsley-required="valor certificado" parsley-type="number" parsley-min="0" value="<?php
                        echo $selValCer;
                        echo set_value('txtVlrCerti');
                        ?>">
                    </div>                                       
                </div>                
            </div>
            <div class="col-sm-3">
                <div class="form-group" >
                    <label class="control-label" for="classtipo">Edad Minima</label>
                    <div>
                        <?php
                        $edades = array('' => 'Sele...');
                        for ($i = 13; $i < 100; $i++) {
                            $edades[$i] = $i;
                        }

                        $js = 'class="chzn-select" id="edadMin" style="width: 25%" parsley-required="edad m&iacute;nima" parsley-error-container="div#errorEdadMin"';
                        echo form_dropdown('edadMin', $edades, $selEdadMin, $js);
                        ?>
                    </div>                    
                    <div id="errorEdadMin"></div>
                </div>
                <div class="form-group" >
                    <label class="control-label" for="classtipo">Edad Maxima</label>
                    <div>
                        <?php
                        $js = 'class="chzn-select" id="edadMax" style="width: 25%" parsley-required="edad m&aacute;xima" parsley-error-container="div#errorEdadMax"';
                        echo form_dropdown('edadMax', $edades, $selEdadMax, $js);
                        ?>
                    </div>                    
                    <div id="errorEdadMax"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 container">
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
            </div>            
        </div>
        <div class="row"> 
            <div class="col-sm-4">
                <button id="btnselect" type="button" class="btn btn-sm btn-default" onclick="marcaciones(true);" >
                    <span class="glyphicon glyphicon-chevron-down" id="marcar">&nbsp;Marcar Todos</span> 
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-actions" style="padding-top: 20px">   
                <?php
                if (isset($opcion) && !empty($opcion)) {
                    if ($opcion == 'editServicio') {
                        ?>
                        <button class="btn btn-sm btn-primary chzn-default" type="button" onclick="enviarPeticionAjaxJSON('<?= site_url('/administracion/adminServicio/' . $opcion) ?>', 'divTabs', 'formServicio');"><strong>Editar</strong></button>
                        <?php
                    }
                    ?>
                    <button class="btn btn-sm btn-danger" type="button" onclick="enviarPeticionAjaxJSON('<?= site_url('/administracion/adminServicio/index') ?>', 'divTabs');"><strong>Cancelar</strong></button>
                    <?php
                } else {
                    ?>
                    <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjaxJSON('<?= site_url('/administracion/adminServicio/createServicio') ?>', 'divTabs', 'formServicio');"><strong>Ingresar</strong></button>
                    <?php
                }
                ?>
            </div>
        </div>        
    </div>
</div>
<script>$('.chzn-select').chosen();</script>
<script><?= $script; ?></script>
<?= form_close(); ?>