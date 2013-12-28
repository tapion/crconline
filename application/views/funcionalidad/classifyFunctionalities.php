<?php $urlBase = base_url('index.php'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="<?php echo base_url('css/chosen.min.css'); ?>" rel="stylesheet" media="screen">                               
    </head>
    <body>
        <div id="container">
            <div>                
                <div>                    
                    <div>
                        Administraci&oacute;n
                        <?php
                        $opcFuncionalidad = array();
                        foreach ($funcionalidades as $func) {
                            $opcFuncionalidad[$func->funcionalidad_id] = $func->funcionalidad_nombre;
                        }
                        $js = 'data-placeholder="Seleccione las Funcionalidades" class="chzn-select input-lg" id="administracion" style="width: 60%; height:20px" multiple="true" tabindex="4"';
                        echo form_dropdown('administracion', $opcFuncionalidad, '', $js);
                        ?>                        
                    </div>
                    <div>
                        Administraci&oacute;n
                        <?php
                        $opcFuncionalidad = array();
                        foreach ($funcionalidades as $func) {
                            $opcFuncionalidad[$func->funcionalidad_id] = $func->funcionalidad_nombre;
                        }
                        $js = 'data-placeholder="Seleccione las Funcionalidades" class="chzn-select input-lg" id="administracion" style="width: 60%; height:20px" multiple="true" tabindex="4"';
                        echo form_dropdown('administracion', $opcFuncionalidad, '', $js);
                        ?>                        
                    </div>
                </div>                               
                <script type="text/javascript">
                $(function(){
                    $(".chzn-select").chosen();
                });
                </script>
            </div>
        </div>
    </body>
</html>
