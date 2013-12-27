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
                        <div class="text-muted bootstrap-admin-box-title"><label>Listado De Sedes</label></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">

                        <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono 1</th>
                                    <th>Telefono 2</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($filtros as $dtsFiltros) {
                                    $dtsFiltros->sede_estado = $dtsFiltros->sede_estado == true ? 'Activo': 'Inactivo';
                                    ?>
                                    <tr>
                                        <td><?= $dtsFiltros->sede_nombre; ?></td>
                                        <td><?= $dtsFiltros->sede_direccion; ?></td>
                                        <td><?= $dtsFiltros->sede_telefono1; ?></td>
                                        <td><?= $dtsFiltros->sede_telefono2; ?></td>
                                        <td><?= $dtsFiltros->sede_estado; ?></td>
                                        <td style="padding: 0px 0px 0px 0px">
                                            <table align="center" cellpadding="0" cellspacing="0" border="0" >
                                                <tr>
                                                    <td align="center" style="padding: 5px 5px 0px 0px; border-top: #ffffff"><button title="Editar" class="glyphicon glyphicon-edit btn btn-sm btn-info" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/sede/newSede/' . $dtsFiltros->sede_id . '/editSede'; ?>', 'divTabs');"></button></td>
                                                    <td align="center" style="padding: 5px 5px 0px 0px; border-top: #ffffff"><button title="Consultar" class="glyphicon glyphicon-eye-open btn btn-sm btn-info" onclick="enviarPeticionAjax('<?= $urlBase . '/administracion/sede/newSede/' . $dtsFiltros->sede_id . '/consulFilterSede'; ?>', 'divTabs');"></button></td>
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