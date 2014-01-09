<link href="<?php echo base_url('js/datepickerbootstrap/css/datepicker.css'); ?>" rel="stylesheet" media="screen">       
<?php $urlBase = base_url('index.php'); ?>
<?= form_open('', array('class' => 'form-search', 'id' => 'formPersonas')); ?>
<?php
$nombreP = $apellidoP = $lugarExpId = $estadoCivilP = $generoP = $fechaNaci = $lugarNaci = $edadP = $telP = $direccionP = $regimenP = $emailP = NULL;
if (isset($dtsPersonales) && !empty($dtsPersonales)) {
    foreach ($dtsPersonales as $dtsPer) {
        $nombreP = $dtsPer->persona_nombres;
        $apellidoP = $dtsPer->persona_apellidos;
        $lugarExpId = $dtsPer->persona_lugar_expedicion_numero_id;
        $estadoCivilP = $dtsPer->persona_estado_civil;
        $generoP = ($dtsPer->persona_genero == 't') ? 'TRUE' : 'FALSE';
        $fechaNaci = $dtsPer->persona_fecha_nacimiento;
        $lugarNaci = $dtsPer->persona_lugar_nacimiento;
        $edadP = $dtsPer->persona_edad;
        $telP = $dtsPer->persona_telefono;
        $direccionP = $dtsPer->persona_direccion;
        $regimenP = $dtsPer->persona_regimen;
        $emailP = $dtsPer->persona_email;
    }
}
?>   
<input type="hidden" name="numeroDocumento" id="numeroDocumento" value="<?= $registros['numeroDocumento']; ?>" />
<input type="hidden" name="tipoDocumento" id="tipoDocumento" value="<?= $registros['tipoDocumento']; ?>" />
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title">                
            <label>Datos Personales</label>
        </div>
    </div> 
    <div class="degradeContent">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Nombre(s)</label>                    
                    <div class="form-group">
                        <input class="form-control input-group mayusPrimeras" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre" parsley-required="nombre(s)" value="<?php
                        echo $nombreP;
                        echo set_value('txtnombre');
                        ?>"> 
                    </div>
                </div>
                <div class="form-group">
                    <label>Apellido(s)</label>
                    <div class="form-group">
                        <input class="form-control input-group mayusPrimeras" type="text" id="txtapellido" name="txtapellido" placeholder="Apellido" parsley-required="apellido(s)" value="<?php
                        echo $apellidoP;
                        echo set_value('txtapellido');
                        ?>">      
                    </div>
                </div>
                <div class="form-group">
                    <label>Expedici&oacute;n de identificaci&oacute;n</label>
                    <div class="form-group">
                        <?php
                        $expid = array('' => 'Seleccione', '1' => 'bogota', '2' => 'funza');
                        $js = 'class="chzn-select" id="lugarexpedicion" style="width: 80%" parsley-required="expedici&oacute;n de identificaci&oacute;n" parsley-error-container="div#errorExpid"';
                        echo form_dropdown('lugarexpedicion', $expid, $lugarExpId, $js);
                        ?>     
                        <div id="errorExpid"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Fecha Nacimiento</label>
                    <div class="form-group">
                        <div style="width: 80%" class="input-group date" id="dp3" data-date="" data-date-format="yyyy-mm-dd">
                            <input name="txtfechanacimiento" id="txtfechanacimiento" class="form-control input-group" type="text" readonly="" value="<?= $fechaNaci; ?>" parsley-required="fecha nacimiento" parsley-error-container="div#errorFechaNaci">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                        <div id='errorFechaNaci'></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Lugar Nacimiento</label>
                    <div class="form-group">
                        <?php
                        $lugNacimiento = array('' => 'Seleccione', '1' => 'bogota', '2' => 'funza');
                        $js = 'class="chzn-select" id="lugarnacimiento" style="width: 80%" parsley-required="lugar nacimiento" parsley-error-container="div#errorLugNac"';
                        echo form_dropdown('lugarnacimiento', $lugNacimiento, $lugarNaci, $js);
                        ?>     
                        <div id="errorLugNac"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Genero</label>
                    <div class="form-group">
                        <?php
                        $genero = array('' => 'Seleccione', 'FALSE' => 'Femenino', 'TRUE' => 'Masculino');
                        $js = 'class="chzn-select" id="genero" style="width: 60%" parsley-required="genero" parsley-error-container="div#errorGenero"';
                        echo form_dropdown('genero', $genero, $generoP, $js);
                        ?>
                        <div id="errorGenero"></div>
                    </div>    
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Direcci&oacute;n</label>
                    <div class="form-group">
                        <input class="form-control input-group mayusPrimeras" type="text" id="txtdireccion" name="txtdireccion" placeholder="direcci&oacute;n" parsley-required="Direcci&oacute;n" value="<?php
                        echo $direccionP;
                        echo set_value('txtdireccion');
                        ?>">                            
                    </div>
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <div class="form-group">
                        <input class="form-control input-group mayusPrimeras" type="text" id="txttelefono" name="txttelefono" placeholder="Telefono" parsley-required="telefono" parsley-type="number" value="<?php
                        echo $telP;
                        echo set_value('txttelefono');
                        ?>">         
                    </div>
                </div>
                <div class="form-group">
                    <label>Correo Electronico</label>
                    <div class="form-group">
                        <input class="form-control input-group mayusPrimeras" type="text" id="txtemail" name="txtemail" placeholder="email: xxxx@xx.xx" parsley-required="correo electronico"  parsley-type="email" value="<?php
                        echo $emailP;
                        echo set_value('txtemail');
                        ?>">       
                    </div>
                </div>
                <div class="form-group">
                    <label>Regimen de Afilicaci&oacute;n</label>
                    <div class="form-group">
                        <?php
                        $regimen = array('' => 'Seleccione', 'Ninguno' => 'Ninguno', 'Contributivo' => 'Contributivo', 'Pensionado' => 'Pensionado', 'Subsidiado' => 'Subsidiado');
                        $js = 'class="chzn-select" id="regimen" style="width: 60%" parsley-required="regimen de afiliaci&oacute;n" parsley-error-container="div#errorRegimen"';
                        echo form_dropdown('regimen', $regimen, $regimenP, $js);
                        ?>
                        <div id="errorRegimen"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Estado Civil</label>
                    <div class="form-group">
                        <?php
                        $estadocivil = array('' => 'Seleccione', 'Casado(a)' => 'Casado(a)', 'Soltero(a)' => 'Soltero(a)', 'Viudo(a)' => 'Viudo(a)');
                        $js = 'class="chzn-select" id="estadocivil" style="width: 60%; height:20px" parsley-required="estado civil" parsley-error-container="div#errorEstCivil"';
                        echo form_dropdown('estadocivil', $estadocivil, $estadoCivilP, $js);
                        ?>
                        <div id="errorEstCivil"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div id="buttonsAction" class="form-actions">   
                    <?php
                    if (isset($opcion) && !empty($opcion)) {
                        if ($opcion == 'editPersona') {
                            ?>
                            <button class="btn btn-sm btn-primary" type="button" onclick="enviarPeticionAjaxJSON('<?= $urlBase . '/operativo/prestarServicio/newEditPersona/' . $opcion ?>', 'divTabs', 'formPersonas', new Array('<?= $urlBase . '/operativo/prestarServicio/indexServicio' ?>', 'dtsServicio', 'formPersonas'));"><strong>Editar</strong></button>
                            <?php
                        }
                    } else {
                        ?>
                        <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjaxJSON('<?= $urlBase . '/operativo/prestarServicio/newEditPersona' ?>', 'divTabs', 'formPersonas');"><strong>Ingresar</strong></button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>        
    </div>
</div>
<script src="<?php echo base_url('js/datepickerbootstrap/js/bootstrap-datepicker.js') . '?' . C_VERSION; ?>"></script>        
<script>
                        $(function() {
                            $('.chzn-select').chosen();
                            $(".input-group.date").datepicker({
                                format: "yyyy-mm-dd",
                                endDate: "days",
                                startView: 2,
                                todayBtn: "linked",
                                language: "es",
                                orientation: "bottom auto",
                                autoclose: true
                            });
                            enviarPeticionAjaxJSON('<?= $urlBase . '/operativo/prestarServicio/applet/' . $registros['tipoDocumento'] . '/' . $registros['numeroDocumento'] ?>', 'dtsApplet');

                        });

</script>
<?= form_close(); ?>