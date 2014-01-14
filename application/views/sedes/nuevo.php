<?php $urlBase = base_url('index.php'); ?>
<?= form_open('', array('class' => 'form-search', 'id' => 'formSede')); ?>

<?php

    $selNombre = $selDireccion = $selTelefono1 = $selTelefono2 = $selCupo = $selRelMinTrans = $selRelIps = NULL;
    $selRelFact = $selNumIni = $selNumFin = $selNumIniArm = $selNumFinArm = $selNumActArm = $selEqAud = NULL;
    $selEqSico = $selEqOpt = $selEstado = $selEmpresa = NULL;
    
    $lisEquipos = array('' => 'Seleccione..');
    foreach ($maquinas as $dtsMaq) {
        $lisEquipos[$dtsMaq->equipo_id] = strtoupper($dtsMaq->equipo_nombre);
    }
    
    $lisEmpresas = array('' => 'Seleccione..');
    foreach ($empresas as $dtsEmp) {
        $lisEmpresas[$dtsEmp->empresa_id] = strtoupper($dtsEmp->empresa_nombre);
    }
    
    if (isset($opcion) && !empty($opcion)) {
        if ($opcion == 'editMachine') {
            $titulo = 'Modificar Sede';
        } else {
            $titulo = 'Consultar Sede';
        }
    }else{
        $titulo = "Agregar Sede";
    }
    
    if( isset($registros) ){
        foreach ($registros as $dtsRegistros) {
            
            $selNombre = $dtsRegistros->sede_nombre; 
            $selDireccion = $dtsRegistros->sede_direccion; 
            $selTelefono1 = $dtsRegistros->sede_telefono1; 
            $selTelefono2 = $dtsRegistros->sede_telefono2; 
            $selCupo = $dtsRegistros->sede_cupos_onac; 
            $selRelMinTrans = $dtsRegistros->sede_resolucion_mintrasp; 
            $selRelIps = $dtsRegistros->sede_resolucion_ips; 
            $selRelFact = $dtsRegistros->sede_resolucion_facturacion; 
            $selNumIni = $dtsRegistros->sede_numeracion_autorizada_inicial; 
            $selNumFin = $dtsRegistros->sede_numeracion_autorizada_final; 
            $selNumIniArm = $dtsRegistros->sede_numero_inicial_armas; 
            $selNumFinArm = $dtsRegistros->sede_numero_final_armas; 
            $selNumActArm = $dtsRegistros->sede_numero_actual_armas;
            $selEqAud = $dtsRegistros->sede_tipo_audiometrico;
            $selEqSico = $dtsRegistros->sede_tipo_sicomotriz;
            $selEqOpt = $dtsRegistros->sede_optometria;
            $selEstado = $dtsRegistros->sede_estado;
            $selEmpresa = $dtsRegistros->sede_empresa_id;
            
            echo '<input type="hidden" name="sedeId" id="sedeId" value="'.$dtsRegistros->sede_id.'" />';
        }
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
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre" parsley-required="Nombre sede" maxlength="45" value="<?php
                        echo $selNombre;
                        echo set_value('txtNombre');
                        ?>">                
                    </div>
                    <div id="errorNombre"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Direccion</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtDireccion" name="txtDireccion" placeholder="Direccion" parsley-required="Direccion sede" maxlength="45" value="<?php
                        echo $selDireccion;
                        echo set_value('txtDireccion');
                        ?>">                
                    </div>
                    <div id="errorDireccion"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Telefono 1</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtTelefono1" name="txtTelefono1" placeholder="Telefono 1" parsley-required="Telefono sede" maxlength="15" value="<?php
                        echo $selTelefono1;
                        echo set_value('txtTelefono1');
                        ?>">              
                    </div>
                    <div id="errorTelefono1"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Telefono 2</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtTelefono2" name="txtTelefono2" placeholder="Telefono 2" parsley-required="Telefono sede" maxlength="15" value="<?php
                        echo $selTelefono2;
                        echo set_value('txtTelefono2');
                        ?>">            
                    </div>
                    <div id="errorTelefono2"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Cupo</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtCupo" name="txtCupo" placeholder="Cupo" parsley-required="Cupo sede" parsley-type="number" value="<?php
                        echo $selCupo;
                        echo set_value('txtCupo');
                        ?>">          
                    </div>
                    <div id="errorCupo"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Resolucion MinTrans</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtResMinTrans" name="txtResMinTrans" placeholder="Resolucion MinTrans" parsley-required="Resolucion MinTrans" maxlength="45" value="<?php
                        echo $selRelMinTrans;
                        echo set_value('txtResMinTrans');
                        ?>">
                    </div>
                    <div id="errorResMinTrans"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Resolucion IPS</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtResIps" name="txtResIps" placeholder="Resolucion IPS" parsley-required="Resolucion IPS" maxlength="45" value="<?php
                        echo $selRelIps;
                        echo set_value('txtResIps');
                        ?>">
                    </div>
                    <div id="errorResIps"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Resolucion Facturacion</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtResFact" name="txtResFact" placeholder="Resolucion Facturacion" parsley-required="Resolucion Facturacion" maxlength="45" value="<?php
                        echo $selRelFact;
                        echo set_value('txtResFact');
                        ?>">
                    </div>
                    <div id="errorResFact"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Numeracion Inicial</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtNumIni" name="txtNumIni" placeholder="Numeracion Inicial" parsley-required="Numeracion Inicial" parsley-type="number" value="<?php
                        echo $selNumIni;
                        echo set_value('txtNumIni');
                        ?>">
                    </div>
                    <div id="errorNumIni"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Numeracion Final</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtNumFin" name="txtNumFin" placeholder="Numeracion Final" parsley-required="Numeracion Final" parsley-type="number" value="<?php
                        echo $selNumFin;
                        echo set_value('txtNumFin');
                        ?>">
                    </div>
                    <div id="errorNumFin"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Numero Inicial Armas</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtNumIniArm" name="txtNumIniArm" placeholder="Numero Inicial Armas" parsley-required="Numero Inicial Armas" parsley-type="number" value="<?php
                        echo $selNumIniArm;
                        echo set_value('txtNumIniArm');
                        ?>">
                    </div>
                    <div id="errorNumIniArm"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Numero Inicial Armas</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtNumFinArm" name="txtNumFinArm" placeholder="Numero Final Armas" parsley-required="Numero Final Armas" parsley-type="number" value="<?php
                        echo $selNumFinArm;
                        echo set_value('txtNumFinArm');
                        ?>">
                    </div>
                    <div id="errorNumFinArm"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Numero Actual Armas</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtNumActArm" name="txtNumActArm" placeholder="Numero Actual Armas" parsley-required="Numero Actuala Armas" parsley-type="number" value="<?php
                        echo $selNumActArm;
                        echo set_value('txtNumActArm');
                        ?>">
                    </div>
                    <div id="errorNumActArm"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Estado</label>
                    <div class="form-group">
                        <?php
                            $estados = array('TRUE' => 'Activo', 'FALSE' => 'Inactivo');
                            $js = 'class="form-control chzn-select" id="estado" parsley-required="estado" parsley-error-container="div#errorEstado"';
                            echo form_dropdown('estado', $estados, $selEstado, $js);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Equipo Audiometrico</label>
                    <div class="form-group">
                        <?php
                            $js = 'class="form-control chzn-select" id="equipoAud" ';
                            echo form_dropdown('equipoAud', $lisEquipos, $selEqAud, $js);

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Equipo Sicomotriz</label>
                    <div class="form-group">
                        <?php
                            $js = 'class="form-control chzn-select" id="equipoSico" ';
                            echo form_dropdown('equipoSico', $lisEquipos, $selEqSico, $js);

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Equipo Optometria</label>
                    <div class="form-group">
                        <?php
                            $js = 'class="form-control chzn-select" id="equipoOpt" ';
                            echo form_dropdown('equipoOpt', $lisEquipos, $selEqOpt, $js);

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Empresa</label>
                    <div class="form-group">
                        <?php
                            $js = 'class="form-control chzn-select" id="empresaSede" parsley-required="Empresa" parsley-error-container="div#errorEmpresaSede"';
                            echo form_dropdown('empresaSede', $lisEmpresas, $selEmpresa, $js);

                        ?>
                    </div>
                    <div id="errorEmpresaSede"></div>
                </div>
            </div>
        </div>                        
        
        <div class="row">
            <div class="col-lg-3">
                <div id="buttonsAction" class="form-actions">   
            <?php
            if (isset($opcion) && !empty($opcion)) {
                if ($opcion == 'editSede') {
                    ?>
                    <button class="btn btn-sm btn-primary" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/sedes/newEditSede/' . $opcion ?>', 'divTabs', 'formSede');"><strong>Editar</strong></button>
                    <?php
                }
                ?>
                
                <?php
            } else {
                ?>
                <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjaxJSON('<?= $urlBase . '/administracion/sedes/newEditSede' ?>', 'divTabs', 'formSede');"><strong>Ingresar</strong></button>
                <?php
            }
            ?>
                <button class="btn btn-sm btn-danger" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/sedes/index' ?>', 'divTabs');"><strong>Cancelar</strong></button>
                </div>
            </div>
        </div>
        
        
    </div>
    
    
</div>

<script>$('.chzn-select').chosen();</script>
<?= form_close(); ?>