<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Bienvenido a CRCONLINE</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="<?php echo base_url('css/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('css/bootstrap/bootstrap-theme.min.css'); ?>" rel="stylesheet" media="screen">

        <!-- Bootstrap Admin Theme -->
        <link href="<?php echo base_url('css/bootstrap/bootstrap-admin-theme.css'); ?>" rel="stylesheet" media="screen">

        <!-- Custom styles -->
        <style type="text/css">
            .alert{
                margin: 0 auto 20px;
            }
        </style>
        
        <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/bootbox.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/parsley.js'); ?>"></script>
        <script src="<?php echo base_url('js/parsley.extend.min.js'); ?>"></script>

        <script type="text/javascript">
            function mostrarMensaje(){
                $("#divError").show();
                setTimeout( "jQuery('#divError').slideToggle();",3000 );
            }
        </script>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-without-padding">
        <div class="container">
            <div class="row">
                
                <div class="alert alert-info">
                    
                    Bienvenido a CRCONLINE, Para continuar ingrese los datos y presione Entrar.
                </div>
                
                <form method="post" class="bootstrap-admin-login-form" data-validate="parsley">
                    <h1>Login</h1>
                    <div class="form-group">
                        <input class="form-control" type="text" id="txtUsuario" name="txtUsuario" placeholder="Usuario" parsley-trigger="change" data-required="true" value="<?php echo set_value('txtUsuario');?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="txtPassword" name="txtPassword" placeholder="Password" parsley-trigger="change" data-required="true">
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="remember_me">
                            Recordarme
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary" type="submit">Entrar</button>
                    <div class="form-group">
                        <br>
                        <div id="divError" class="alert alert-danger" style="display: none">Error en el usuario o contrase&ntilde;a.</div>
                    </div>
                </form>
            </div>
        </div>
 
        <!-- Muestra mensaje de error -->
        <?php if(@$error_login): ?>
        <script>mostrarMensaje();</script>
        <?php endif; ?>

        
    </body>
</html>