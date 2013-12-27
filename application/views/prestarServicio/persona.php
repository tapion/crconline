<link href="<?php echo base_url('js/datepickerbootstrap/css/datepicker.css'); ?>" rel="stylesheet" media="screen">       
<?php $urlBase = base_url('index.php'); ?>
<?= form_open('', array('class' => 'form-search', 'id' => 'formServicio')); ?>
<?php
$seltipSer = $selSede = $selEdadMin = $selEdadMax = $selValSer = $selValCer = $selNomSer = $script = NUll;
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
        <div>    
            <table style="width: 100%" border="0" cellpadding="5">
                <tr>
                    <td style="width: 20%">
                        Nombre(s)
                    </td>
                    <td>
                        <input style="width: 25%" class="form-control" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre(s)" parsley-required="nombre(s)" value="<?php
                        echo $selValSer;
                        echo set_value('txtnombre');
                        ?>">                               
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        Apellido(s)
                    </td>
                    <td>
                        <input style="width: 25%" class="form-control" type="text" id="txtapellido" name="txtapellido" placeholder="Apellido(s)" parsley-required="apellido(s)" value="<?php
                        echo $selValSer;
                        echo set_value('txtapellido');
                        ?>">                               
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        Expedici&oacute;n de identificaci&oacute;n
                    </td>
                    <td>
                        <input style="width: 25%" class="form-control" type="text" id="txtlugarexpedicion" name="txtlugarexpedicion" placeholder="Lugar Expedici&oacute;n" parsley-required="expedici&oacute;n de identificaci&oacute;n" value="<?php
                        echo $selValSer;
                        echo set_value('txtlugarexpedicion');
                        ?>">                               
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%">
                        Fecha Nacimiento
                    </td>
                    <td>
                        <div style="width: 25%" class="input-group date" id="dp3" data-date="" data-date-format="yyyy-mm-dd">
                            <input name="txtfechanacimiento" id="txtfechanacimiento" class="form-control" type="text" readonly="" value="" parsley-required="fecha nacimiento" parsley-error-container="div#errorFechaNaci">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                        <div id='errorFechaNaci'></div>
                    </td>
                </tr>
            </table>            
        </div>
        <div class="form-actions" style="padding-top: 20px">   
            <?php
            if (isset($opcion) && !empty($opcion)) {
                if ($opcion == 'editPersona') {
                    ?>
                    <button class="btn btn-sm btn-primary" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/operativo/prestarServicio/' . $opcion ?>', 'divTabs', 'formServicio');"><strong>Editar</strong></button>
                    <?php
                }
            } else {
                ?>
                <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/operativo/prestarServicio/insertPersona' ?>', 'divTabs', 'formServicio');"><strong>Ingresar</strong></button>
                <?php
            }
            ?>
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
                });
</script>
<?= form_close(); ?>