<?php $urlBase = base_url('index.php'); ?>
<?= form_open('', array('class' => 'form-search', 'id' => 'formFunctionality')); ?>
<?php
$funcionalidad_id = $funcionalidad_nombre = $funcionalidad_grupo_id = $funcionalidad_estado = $funcionalidad_url = $script = NULL; 
if (isset($funcionalidad) && !empty($funcionalidad)) {
    foreach($funcionalidad as $fun){
        $funcionalidad_id = $fun->funcionalidad_id;
        $funcionalidad_nombre = $fun->funcionalidad_nombre;
        $funcionalidad_grupo_id = $fun->funcionalidad_grupo_id;        
        $funcionalidad_estado = $fun->funcionalidad_estado;
        $funcionalidad_url = $fun->funcionalidad_url;
    }
}
?>
<div class="table-responsive container  well well-sm">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">                
                <?php 
                if ( !empty($funcionalidad_id) ){
                    ?>
                    <h4>Modificar Funcionalidad</h4>
                    <?php
                }else{
                    ?>
                    <h4>Nueva Funcionalidad</h4>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-6">            
            <div class="form-group">
                <label for="nameFunctionality">Nombre Funcionalidad</label>
                <input type="text" name="name" class="form-control" id="nameFunctionality" placeholder="Nombre Funcionalidad" parsley-required="Nombre Funcionalidad" value="<?php echo $funcionalidad_nombre;?>">
            </div>
            <div class="form-group">
                <label for="groupFunctionality">Grupo</label>
                <?php
                $opcGrupo = array('' => 'Seleccione..');
                foreach ($grupos as $grupo) {
                    $opcGrupo[$grupo->grupo_id] = $grupo->grupo_nombre;
                }
                $js = 'class="chzn-select" id="grupo" style="width: 25%" parsley-required="Grupo" parsley-error-container="div#errorGrupo"';
                echo form_dropdown('grupo', $opcGrupo, $funcionalidad_grupo_id, $js);                 
                ?>
                <div id="errorGrupo"></div>
            </div>                 
            <div class="form-group">
                <label for="groupFunctionality">Estado Funcionalidad</label>
                <?php
                $opcEstado = array('1'=>'Activo','0'=>'Inactivo');                
                $js = 'class="chzn-select" id="estado" style="width: 25%" parsley-required="Estado" parsley-error-container="div#errorEstado"';
                echo form_dropdown('estado', $opcEstado,  $funcionalidad_estado, $js);                 
                ?>
                <div id="errorEstado"></div>
            </div>              
            <div class="form-group">
                <label for="urlFunctionality">URL Funcionalidad</label>
                <input type="text" name="url" class="form-control" id="urlFunctionality" placeholder="URL Funcionalidad" parsley-required="URL Funcionalidad" value="<?php echo $funcionalidad_url;?>">
            </div>   
            <?php 
            if ( !empty($funcionalidad_id) ){
                ?>
                <input type="hidden" name="funcionalidad_id" value="<?php echo $funcionalidad_id;?>"/>
                <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/funcionalidad/editFunctionality' ?>', 'divTabs', 'formFunctionality');"><strong>Editar</strong></button>
                <?php
            }else{
                ?>
                <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/funcionalidad/createFunctionality' ?>', 'divTabs', 'formFunctionality');"><strong>Agregar</strong></button>
                <?php
            }
            ?>
            <button class="btn btn-sm btn-danger" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/funcionalidad/listAllFunctionality' ?>', 'divTabs');"><strong>Ver Todas</strong></button>
        </div>
    </div>
</div>
<script>$('.chzn-select').chosen();</script>
<?= form_close(); ?>