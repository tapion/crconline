<?php
$urlBase = base_url('index.php');
if (isset($exito) && !empty($exito)) {
    ?>
    <script>
        mensaje('Registro guardado con exito!!');
        $('#priservicio li').removeClass('active');
        $('#consultar').addClass('active');
    </script>
    <?php
}
?>    
<table class="total">
    <tr>
        <td>
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title"><label>Listado De Equipos</label></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">

                        <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($filtros as $dtsFiltros) {
                                    $dtsFiltros->equipo_estado = $dtsFiltros->equipo_estado == TRUE ? 'Activo': 'Inactivo';
                                    ?>
                                    <tr>
                                        <td><?= $dtsFiltros->equipo_nombre; ?></td>
                                        <td><?= $dtsFiltros->equipo_descripcion; ?></td>
                                        <td><?= $dtsFiltros->equipo_estado; ?></td>
                                        <td style="padding: 0px 0px 0px 0px">
                                            <table align="center" cellpadding="0" cellspacing="0" border="0" >
                                                <tr>
                                                    <td align="center" style="padding: 5px 5px 0px 0px; border-top: #ffffff"><button title="Editar" class="glyphicon glyphicon-edit btn btn-sm btn-info" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/equipos/create/' . $dtsFiltros->equipo_id . '/editMachine'; ?>', 'divTabs');"></button></td>
                                                    <td align="center" style="padding: 5px 5px 0px 0px; border-top: #ffffff"><button title="Consultar" class="glyphicon glyphicon-eye-open btn btn-sm btn-info" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/equipos/create/' . $dtsFiltros->equipo_id . '/consulFilterMachine'; ?>', 'divTabs');"></button></td>
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
        </td>
    </tr>
</table>
<script type="text/javascript">formatoTablaResultados();</script>