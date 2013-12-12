<link href="<?php echo base_url('css/menu.css'); ?>" rel="stylesheet" >
<!-- main / large navbar -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url('index.php/principal');?>">CRCONLINE</a>
                    </div>
                    <div class="collapse navbar-collapse main-navbar-collapse">
                        <ul class="nav navbar-nav">
                        <?php
                            $this->load->helper('menu');
                            //Recorremos la lista de las opciones y las pintamos 
                            foreach ($listaMenu as $nombre => $urlMenu) {
                                echo pintarMenu($nombre, $urlMenu);
                            }

                        ?>
                        </ul>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Usuario <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Perfil</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li><a href="<?php echo site_url('welcome/logout'); ?>">Salir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container -->
        </nav>
