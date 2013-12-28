<?php
//if (isset($exito) && !empty($exito)) {
//    ?>
    <script>//
//        mensaje('Registro guardado con exito!!');
//        $('#priservicio li').removeClass('active');
//        $('#consultar').addClass('active');
    </script>
    //<?php
//}
?>    
<div class="table-responsive">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">Empresas</div>
        </div>
        <div class="bootstrap-admin-panel-content">

            <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Nit</th>
                        <th>Dirección</th>
                        <th>Telefonos</th>
                        <th>Estado</th>
                        <th>País</th>
                        <th>Ciudad</th>
                        <th>Usuario creo</th>
                        <th>Fecha creación</th>
                        <th>Usuario edito</th>
                        <th>Fecha edición</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($companies->num_rows() > 0) {
                        foreach ($companies->result() as $company) {
                            ?>
                            <tr>
                                <td><?= $company->empresa_nombre; ?></td>
                                <td><?= $company->empresa_nit; ?></td>
                                <td><?= $company->empresa_direccion; ?></td>
                                <td><?= $company->empresa_telefono1 . ' - '.$company->empresa_telefono2; ?></td>
                                <td><?= $company->estado; ?></td>
                                <td><?= $company->pais_nombre; ?></td>
                                <td><?= $company->ciudad_nombre; ?></td>
                                <td><?= $company->usuario_creacion; ?></td>
                                <td><?= $company->empresa_fecha_creacion; ?></td>
                                <td><?= $company->usuario_edito; ?></td>
                                <td><?= $company->empresa_fecha_edito; ?></td>
                                <td style="padding: 0px 0px 0px 0px">
                                    <table align="center" cellpadding="0" cellspacing="0" border="0" >
                                        <tr>
                                            <td align="center" style="padding: 5px 5px 0px 0px; border-top: #ffffff"><button title="Editar" class="glyphicon glyphicon-edit btn btn-sm btn-info" onclick="enviarPeticionAjax('<?= site_url('administracion/empresas/editar/'.$company->empresa_id);  ?>', 'divTabs');"></button></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">formatoTablaResultados();</script>
