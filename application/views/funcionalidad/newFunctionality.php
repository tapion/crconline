<?php $urlBase = base_url('index.php'); ?>
<?= form_open('', array('class' => 'form-search', 'id' => 'formFunctionality')); ?>
<?php
print_r ($funcionalidad);
?>
<div class="container">
    <div class="row">        
        <div class="col-md-6">
            <h1>Nueva Funcionalidad</h1>
            <div class="form-group">
                <label for="nameFunctionality">Nombre Funcionalidad</label>
                <input type="text" name="name" class="form-control" id="nameFunctionality" placeholder="Nombre Funcionalidad" parsley-required="Nombre Funcionalidad" value="">
            </div>
            <div class="form-group">
                <label for="groupFunctionality">Grupo</label>
                <?php
                $opcGrupo = array('' => 'Seleccione..');
                foreach ($grupos as $grupo) {
                    $opcGrupo[$grupo->grupo_id] = $grupo->grupo_nombre;
                }
                $js = 'class="chzn-select" id="grupo" style="width: 25%" parsley-required="Grupo" parsley-error-container="div#errorGrupo"';
                echo form_dropdown('grupo', $opcGrupo, 'large', $js);
                ?>
                <div id="errorGrupo"></div>
            </div>                 
            <label>Estado Funcionalidad</label>                                      
            <label class="radio">
                <input type="radio" id="estado" name="estado" value="true" checked=""> Activo
            </label>            
            <label class="radio">
                <input type="radio" id="estado" name="estado" value="false"> Inactivo
            </label>
            <div class="form-group">
                <label for="urlFunctionality">URL Funcionalidad</label>
                <input type="text" name="url" class="form-control" id="urlFunctionality" placeholder="URL Funcionalidad" parsley-required="URL Funcionalidad">
            </div>            
            <button class="btn btn-sm btn-success" type="button" onclick="enviarPeticionAjax('<?= $urlBase . '/funcionalidad/createFunctionality' ?>', 'divTabs', 'formFunctionality');"><strong>Agregar</strong></button>
        </div>
    </div>
</div>
<script>$('.chzn-select').chosen();</script>
<?= form_close(); ?>