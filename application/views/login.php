<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Bienvenido a CRCONLINE</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('css/bootstrap-theme.min.css'); ?>" rel="stylesheet" media="screen">

        <!-- Bootstrap Admin Theme -->
        <link href="<?php echo base_url('css/bootstrap-admin-theme.css'); ?>" rel="stylesheet" media="screen">

        <!-- Custom styles -->
        <style type="text/css">
            .alert{
                margin: 0 auto 20px;
            }
        </style>

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
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    Ingrese los datos y presione Ingresar...
                </div>
                <form method="post" action="<?php echo base_url()."index.php/principal"?>" class="bootstrap-admin-login-form">
                    <h1>Login</h1>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="remember_me">
                            Recordarme
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary" type="submit">Ingresar</button>
                </form>
            </div>
        </div>

        <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/bootbox.min.js'); ?>"></script>
        <script type="text/javascript">
            $(function() {
                // Setting focus
                $('input[name="email"]').focus();

                // Setting width of the alert box
                var formWidth = $('.bootstrap-admin-login-form').innerWidth();
                var alertPadding = parseInt($('.alert').css('padding'));
                $('.alert').width(formWidth - 2 * alertPadding);
            });
        </script>
    </body>
</html>