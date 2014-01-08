<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

class Prestarserviciolib {

    function __construct() {
        $this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería
        $this->CI->load->model('administradores/modelo_servicios', 'Model_Servicios');
    }

    function duplicados($parametros) {
        $resultado = NULL;
        if (isset($parametros['tipo']) && !empty($parametros['tipo']) && $parametros['servicio'] && $parametros['servicio'] && $parametros['tipo'] != 1) {
            $resultado = '<label>Cargar Examenes</label>';
            $resultado .= '<div>';
            $resultado .= '<button id="pruebass" class="glyphicon glyphicon-check btn btn-sm btn-primary" type="button" title="Cargar Examenes Anteriores"
                                data-toggle="modal" data-target="#examenesaCargar" 
                                onClick="enviarAjax(\'' . site_url('/operativo/prestarServicio/eventosAjax') . '\',\'formSolicitud\',\'cuerpoModal\',\'abrirModal\');"">
                           </button>';
            $resultado .= '</div>';
        }

        echo $resultado;
    }

    function abrirVentanaModal($parametros) {
        $resultado = '(En desarrollo) Aca va el formulario para los examenes a cargar';
        echo $resultado;
    }

    function dtsAdicionalesServicio($parametros) {
        echo 'resultado jajaj';
    }

}
