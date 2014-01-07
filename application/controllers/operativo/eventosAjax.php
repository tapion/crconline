<?php

if (isset($_POST['accion']) && !empty($_POST['accion'])) {
    $action = $_POST['accion'];
    switch ($action) {
        case 'cargarDuplicado' : duplicados($_POST);
            break;
        case 'abrirModal' : abrirVentanaModal($_POST);
            break;
        case 'cargarDtsAdicionales' : dtsAdicionalesServicio($_POST);
            break;
    }
}

class PrestarServicio extends CI_Controller {

    function duplicados($parametros) {
        $resultado = NULL;
        if (isset($parametros['tipo']) && !empty($parametros['tipo']) && $parametros['servicio'] && $parametros['servicio'] && $parametros['tipo'] != 1) {
            $resultado = '<label>Cargar Examenes</label>';
            $resultado .= '<div>';
            $resultado .= '<button id="pruebass" class="glyphicon glyphicon-check btn btn-sm btn-primary" type="button" title="Cargar Examenes Anteriores"
                            data-toggle="modal" data-target="#examenesaCargar" 
                            onClick="enviarAjax(\'' . $parametros['rutAjax'] . '\',\'formSolicitud\',\'cuerpoModal\',\'abrirModal\');"">
                       </button>';
            $resultado .= '</div>';
        }

        echo $resultado;
    }

    function abrirVentanaModal($parametros) {
        $resultado .= '(En desarrollo) Aca va el formulario para los examenes a cargar';
        echo $resultado;
    }

    function dtsAdicionalesServicio($parametros) {
        $resultado .= '(En desarrollo) Aca va el formulario para los examenes a cargar';
        echo $resultado;
    }

}

?>
