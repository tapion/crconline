<?php $urlBase = base_url('index.php'); ?>
<div class="table-responsive">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">Listado de funcionalidades</div>
        </div>
        <div class="bootstrap-admin-panel-content">

            <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center">Funcionalidad</th>
                        <th style="text-align: center">Grupo</th>
                        <th style="text-align: center">Estado</th>
                        <th style="text-align: center">Url</th>
                        <th style="text-align: center">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($funcionalidades as $funcionalidad) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $funcionalidad->funcionalidad_nombre; ?></td>
                            <td><?php echo $funcionalidad->funcionalidad_grupo_id; ?></td>
                            <td><?php echo $funcionalidad->nombre_estado; ?></td>
                            <td><?php echo $funcionalidad->funcionalidad_url; ?></td>
                            <td>
                                <table align="center" cellpadding="0" cellspacing="0" border="0" >
                                    <tr>
                                        <td align="center" style="padding: 5px 5px 0px 0px; border-top: #ffffff"><button title="Editar" class="glyphicon glyphicon-edit btn btn-sm btn-info" onclick="enviarPeticionAjax('<?= $urlBase . '/funcionalidad/editFunctionality/'.$funcionalidad->funcionalidad_id; ?>', 'divTabs');"></button></td>
                                        <td align="center" style="padding: 5px 5px 0px 0px; border-top: #ffffff"><button title="Consultar" class="glyphicon glyphicon-eye-open btn btn-sm btn-info"></button></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>                            
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script type="text/javascript">formatoTablaResultados();</script>