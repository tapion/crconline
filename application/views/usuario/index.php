<?php $urlBase = base_url('index.php');?>

<div class="panel panel-default bootstrap-admin-no-table-panel">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title">.:: Administracion de Usuarios ::.</div>
    </div><br>
    
<ul class="nav nav-tabs">
  <li class="active">
      <a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?=$urlBase.'/usuario/filtrar'?>','divTabs')">Filtar</a></li>
  <li><a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?=$urlBase.'/usuario/crear'?>','divTabs')">Crear</a></li>
  <li><a href="#" data-toggle="tab" onclick="enviarPeticionAjax('<?=$urlBase.'/usuario/modificar'?>','divTabs')">Modificar</a></li>
  <li class="dropdown">
          <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Administracion<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#" onclick="enviarPeticionAjax('<?=$urlBase.'/usuario/filtrar'?>','divTabs')">Perfiles</a></li>
            <li><a href="#" onclick="enviarPeticionAjax('<?=$urlBase.'/usuario/modificar'?>','divTabs')">Sedes</a></li>
          </ul>
    </li>
</ul>
<!-- div para mostrar los contenidos de los tabs --> 
<div id="divTabs" class="tab-content container">
    <script>enviarPeticionAjax('<?=$urlBase.'/usuario/filtrar'?>','divTabs');</script>
</div>

<br><br>
<a href="#" onclick="mensaje('Se esta utilizando bootbox para estos mensajes');">Mensaje de Alerta</a> **** 
<a href="#" onclick="confirmar('Miguel es gay?');">Mensaje de Confirmacion</a><br>
</div>
<br><br><br>
<?php
sleep(2);
echo ("He tardado 2 segundos en ejecutar esta pagina...");
?>  