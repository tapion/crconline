<?php $urlBase = base_url('index.php'); ?>
<div class="table-responsive">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">Listado de funcionalidades</div>
        </div>
        <div class="bootstrap-admin-panel-content">
            <?= form_open('', array('class' => 'form-search', 'id' => 'formOrdenarFuncionalidades')); ?>
                <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center">Funcionalidad</th>
                            <?php
                            foreach( $grupos as $grupo ){
                                ?>
                                <th style="text-align: center"><?php echo $grupo->grupo_nombre;?></th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $seleccionados = array();
                        foreach($grupo_funcionalidad as $temp){
                            array_push($seleccionados, $temp->funcionalidad_id."_".$temp->grupo_id);
                        }
                        foreach ($funcionalidades as $funcionalidad) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $funcionalidad->funcionalidad_nombre; ?></td>
                                <?php
                                foreach( $grupos as $grupo ){
                                    $checked = "";
                                    //$funcionalidad->funcionalidad_id."_".$grupo->grupo_id
                                    if (in_array($funcionalidad->funcionalidad_id."_".$grupo->grupo_id, $seleccionados) ){
                                        $checked = "checked='checked'";
                                    }
                                    ?>
                                    <td style="text-align: center">                                        
                                        <input type="radio" name="grupo_funcionalidad-<?php echo $funcionalidad->funcionalidad_id;?>" value="<?php echo $funcionalidad->funcionalidad_id."_".$grupo->grupo_id;?>" <?php echo $checked;?>>
                                    </td>
                                    <?php
                                }
                                ?>    
                            </tr>                            
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div>
                    <button class="btn btn-sm btn-danger" type="button" onclick="enviarPeticionAjaxJSON('<?= $urlBase . '/funcionalidad/classify' ?>', 'divTabs', 'formOrdenarFuncionalidades');"><strong>Ordenar</strong></button>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>


<script type="text/javascript">formatoTablaResultados();</script>
