<?php $urlBase = base_url('index.php'); ?>
<?= form_open('', array('class' => 'form-search', 'id' => 'formServicio', 'data-validate' => "parsley")); ?>
<div class="container well well-sm">        
    <table style="width: 100%" border="0" cellpadding="5">
        <tr>
            <td style="width: 20%">
                Tipo Servicio
            </td>
            <td style="width: 80%">
                <?php
                $opciones = array('' => 'Seleccione..');
                foreach ($tipoServicios as $dtsTipServi){
                    $opciones[$dtsTipServi->tipo_servicio_id] = $dtsTipServi->tipo_servicio_nombre;
                }
                
                $js = 'class="chzn-select" id="tipServicio" onChange="" style="width: 40%"';
                echo form_dropdown('shirts', $opciones, 'large', $js);
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%">
                Sede
            </td>
            <td style="width: 80%">
                <?php
                # aca falta consultar en la BD pero esta lista depende de la empresa para filtrar
                $options = array(
                    1 => 'can',
                    2 => 'bogota',
                    3 => 'cucuta',
                    4 => 'mas',
                );

                $js = 'class="chzn-select" id="sede" style="width: 25%"';
                echo form_dropdown('shirts', $options, 'large', $js);
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%">
                Servicio
            </td>
            <td style="width: 80%">
                <input style="width: 25%" class="form-control" type="text" id="txtServicio" name="txtServicio" placeholder="Servicio" parsley-trigger="change" required value="<?php echo set_value('txtServicio'); ?>">
            </td>
        </tr>
        <tr>
            <td style="width: 20%">
                Edad Minima
            </td>
            <td style="width: 80%">
                <?php
                $edades = array();
                for ($i = 13; $i < 100; $i++) {
                    $edades[$i] = $i;
                }

                $js = 'class="chzn-select" id="edadMin" style="width: 8%"';
                echo form_dropdown('shirts', $edades, 'large', $js);
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%">
                Edad Maxima
            </td>
            <td style="width: 80%">
                <?php
                $js = 'class="chzn-select" id="edadMax" style="width: 8%"';
                echo form_dropdown('shirts', $edades, 'large', $js);
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%">
                Valor Servicio
            </td>
            <td style="width: 80%">
                <input style="width: 25%" class="form-control" type="number" id="txtVlrServicio" name="txtVlrServicio" placeholder="Valor Servicio" parsley-trigger="change" required value="<?php echo set_value('txtVlrServicio'); ?>">
            </td>
        </tr>
        <tr>
            <td style="width: 20%">
                Valor certificado
            </td>
            <td style="width: 80%">
                <input style="width: 25%" class="form-control" type="number" id="txtVlrCerti" name="txtVlrCerti" placeholder="Valor Certificado" parsley-trigger="change" required value="<?php echo set_value('txtVlrCerti'); ?>">
            </td>
        </tr>
        <tr>
            <td style="width: 20%">
                Estado
            </td>
            <td style="width: 80%">
                <?php
                $estados = array('TRUE' => 'Activo', 'FALSE' => 'Inactivo');
                $js = 'class="chzn-select" id="estado" style="width: 15%"';
                echo form_dropdown('shirts', $estados, 'large', $js);
                ?>
            </td>
        </tr>        
    </table> 
    <br>
    <?php
    foreach ($tipoExamen as $dtsTipoExamen) {
        ?>
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">EXAMEN <?= $dtsTipoExamen->tipo_examen_nombre; ?></legend>
            <div class="control-group">
                <?php
                $i = 1;
                foreach ($subExamen as $dtsSubExamen) {
                    foreach ($dtsSubExamen as $finSubExamen) {
                        if ($finSubExamen->subexamen_tipo_examen_id == $dtsTipoExamen->tipo_examen_id) {
                            if (($i % 2) != 0) {
                                ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox">                                            
                                            </label>
                                            <?= $finSubExamen->subexamen_nombre; ?>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox">                                            
                                            </label>
                                            <?= $finSubExamen->subexamen_nombre; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            $i++;
                        }
                    }
                }
                ?>
            </div>
        </fieldset>
        <?php
    }
    ?>
</div>
<div class="form-actions">   
    <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/adminServicio/create' ?>', 'divTabs', 'formServicio');"><strong>Ingresar</strong></button>
</div>
<br>
<script>$('.chzn-select').chosen();</script>
<?= form_close(); ?>
