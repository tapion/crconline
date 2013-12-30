<?php $urlBase = base_url('index.php'); ?>
<div class="table-responsive">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">Listado de funcionalidades</div>
        </div>
        <div class="bootstrap-admin-panel-content">

            <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center">Funcionalidad</th>
                        <?php
                        foreach( $grupos as $grupo ){
                            ?>
                            <th style="text-align: center"><?php echo $grupo->grupo_nombre;?></th>
                            <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($funcionalidades as $funcionalidad) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $funcionalidad->funcionalidad_nombre; ?></td>
                            <?php
                            foreach( $grupos as $grupo ){
                                ?>
                                <td style="text-align: center">
                                    <input type="checkbox" name="<?php echo $grupo->grupo_id;?>">
                                </td>
                                <?php
                            }
                            ?>    
                        </tr>                            
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script type="text/javascript">formatoTablaResultados();</script>
