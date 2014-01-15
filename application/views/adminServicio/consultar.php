<?php
if (isset($exito) && !empty($exito)) {
    ?>
    <script>
        mensaje('Registro guardado con exito!!');
        habilitarDeshabilitarOpc('principalOpc', 'consultar');
    </script>
    <?php
}
?>    
<div class="table-responsive">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">Listado De Servicios</div>
        </div>
        <div class="bootstrap-admin-panel-content">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sede</th>
                        <th>Servicio</th>
                        <th>Vlr Servicio</th>
                        <th>Vlr Certificado</th>
                        <th>Tipo Servicio</th>
                        <th>Estado</th>
                        <th>Opciones</th>                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">formatoTablaResultados2('<?php echo site_url('administracion/adminServicio/filtros') ?>', '4, 8, 10, 11');</script>