<!DOCTYPE html>
<!-- con esta linea validamos si esta logeado el usuario sino lo envia al login -->
<?php if(!@$this->user) redirect ('welcome/login'); ?>

<html>
    <head>
        <title>Bienvenido a CRCONLINE</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="<?php echo base_url('css/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('css/bootstrap/bootstrap-theme.min.css'); ?>" rel="stylesheet" media="screen">

        <!-- Bootstrap Admin Theme -->
        <link href="<?php echo base_url('css/bootstrap/bootstrap-admin-theme.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('css/chosen.min.css'); ?>" rel="stylesheet" media="screen">
        
        <!-- Datatables -->
        <link href="<?php echo base_url('css/datatables/datatables.css'); ?>" rel="stylesheet" media="screen">
        
        <!-- Estilos de crconline -->
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
        
        
        <script src="<?php echo base_url('js/jquery.min.js'). '?' . C_VERSION; ?>"></script>
        <script src="<?php echo base_url('js/bootstrap.min.js'). '?' . C_VERSION; ?>"></script>
        <script src="<?php echo base_url('js/bootbox.min.js'). '?' . C_VERSION; ?>"></script>
        <script src="<?php echo base_url('js/twitter-bootstrap-hover-dropdown.min.js'). '?' . C_VERSION; ?>"></script>
        <script src="<?php echo base_url('js/chosen.jquery.min.js'). '?' . C_VERSION; ?>"></script>
        <script src="<?php echo base_url('js/jquery.dataTables.min.js'). '?' . C_VERSION; ?>"></script>
        <script src="<?php echo base_url('js/datatables.js'). '?' . C_VERSION; ?>"></script>
        <script src="<?php echo base_url('js/parsley/parsley.js'). '?' . C_VERSION; ?>"></script>
        <script src="<?php echo base_url('js/parsley/parsley.extend.js'). '?' . C_VERSION; ?>"></script>
        <script src="<?php echo base_url('js/parsley/i18n/messages.es.js') . '?' . C_VERSION ?>"></script>
        <script src="<?php echo base_url('js/funciones.js'). '?' . C_VERSION; ?>"></script>
    </body>
</html>