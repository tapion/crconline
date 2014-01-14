<?php $urlBase = base_url('index.php'); ?>
<?= form_open('', array('class' => 'form-search', 'id' => 'formEquipo')); ?>
<?php
    
    if (isset($opcion) && !empty($opcion)) {
        if ($opcion == 'editMachine') {
            $titulo = 'Modificar Equipo';
        } else {
            $titulo = 'Consultar Equipo';
        }
    }else{
        $titulo = "Agregar Equipo";
    }

    $nombreEquipo = $descripcion = $estadoEq = NULL;
    if( isset($registros) ){
        foreach ($registros as $dtsRegistros) {
            $nombreEquipo = $dtsRegistros->equipo_nombre;
            $descripcion = $dtsRegistros->equipo_descripcion;
            $estadoEq = $dtsRegistros->equipo_estado;
            echo '<input type="hidden" name="equipoId" id="equipoId" value="'.$dtsRegistros->equipo_id.'" />';
        }
    }
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title">                
            <label><?=$titulo;?></label>
        </div>
    </div> 
    <div class="degradeContent">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="form-group">
                        <input class="form-control input-group mayusPrimeras" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre del equipo" parsley-required="Nombre" value="<?php
                        echo $nombreEquipo;
                        echo set_value('txtNombre');
                        ?>">                            
                    </div>
                    <div id="errorNombre"></div>
                </div>
                <div class="form-group">
                    <label>Descripci&oacute;n</label>
                    <div class="form-group">
                        <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" id="txtDescripcion">
                            <?php
                            echo $descripcion;
                            echo set_value('txtDescripcion');
                            ?>
                        </textarea>
                           
                    </div>
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <div class="form-group">
                        <?php
                        $estados = array('TRUE' => 'Activo', 'FALSE' => 'Inactivo');
                        $js = 'class="chzn-select" id="estado" style="width: 60%; height:20px" parsley-required="Estado equipo" parsley-error-container="div#errorEstado"';
                        echo form_dropdown('estado', $estados, $estadoEq, $js);
                        ?>
                        <div id="errorEstado"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3">
                <div id="buttonsAction" class="form-actions">   
                    <?php
                    if (isset($opcion) && !empty($opcion)) {
                        if ($opcion == 'editMachine') {
                            ?>
                            <button class="btn btn-sm btn-primary" type="button" onclick="enviarPeticionAjaxJSON('<?= $urlBase . '/administracion/equipos/newEditMachine/' . $opcion ?>', 'divTabs', 'formEquipo');"><strong>Editar</strong></button>
                    <?php
                        }
                    } else {
                        ?>
                        <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjaxJSON('<?= $urlBase . '/administracion/equipos/newEditMachine' ?>', 'divTabs', 'formEquipo');"><strong>Ingresar</strong></button>
                        <?php
                    }
                    ?>
                        <button class="btn btn-sm btn-danger" type="button" onclick="enviarPeticionAjaxJSON('<?= site_url('/administracion/equipos/index') ?>', 'divTabs');"><strong>Cancelar</strong></button>
                </div>
            </div>
        </div> 
        
    </div>
</div>    
    
    

<script>$('.chzn-select').chosen();</script>
<?php echo form_close(); ?>
