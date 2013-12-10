<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenido a CRCONLINE</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('css/bootstrap-theme.min.css'); ?>" rel="stylesheet" media="screen">

        <!-- Bootstrap Admin Theme -->
        <link href="<?php echo base_url('css/bootstrap-admin-theme.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('css/chosen.min.css'); ?>" rel="stylesheet" media="screen">
        
        <link href="<?php echo base_url('css/crconline.css'); ?>" rel="stylesheet" media="screen">
    </head>
    <body class="bootstrap-admin-with-small-navbar">
        
        <!-- Pintamos el menu -->
        <?php $datosMenu = array('listaMenu'=>$listaMenu); ?>
        <?php $this->load->view('menu',$datosMenu); ?>

        <!-- div procesando -->
        <div class="cartprocess" style="display: none;" >
            <div class="inbox">
                <div class="a">Procesando ...</div>
                <div class="b"><img src="<?php echo base_url("images/loading2.jpg")?>" width="50" height="50"></div>             
            </div>
        </div>
        
        <!-- div donde contendra el contenido -->
        <div class="container" id="divContenido">
            aqui va el contenido
        </div>
        
        
        <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/bootbox.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/twitter-bootstrap-hover-dropdown.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/chosen.jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('css/datatables/js/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/funciones.js'); ?>"></script>
    </body>
</html>