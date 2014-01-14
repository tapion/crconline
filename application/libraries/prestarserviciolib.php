<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

class Prestarserviciolib {

    function __construct() {
        $this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librer�a
        $this->CI->load->model('administradores/modelo_servicios', 'Model_Servicios');
        $this->dtssession = $this->CI->session->userdata('logged_user');
        foreach ($this->dtssession as $dtsSession) {
            $this->sedeUsuario = $dtsSession->usuario_sede_id;
            $this->empresaUsuario = $dtsSession->usuario_empresa_id;
        }
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
        $resultado = NULL;
        if (!empty($parametros['servicio']) && !empty($parametros['tipo'])) {
            $servi = $this->CI->Model_Servicios->allServicios($this->sedeUsuario, $this->empresaUsuario, $parametros['servicio']);
            if (!empty($servi)) {
                foreach ($servi as $dtsServi) {
                    if ($dtsServi->servicio_tipo_servicio_id == 1) { # Para valoracion conduccion
                        # Consulta categorias
                        $categorias = $this->CI->Model_Servicios->allCategorias();
                        $opciones = array('' => 'Seleccione..');
                        foreach ($categorias as $dtsCategorias) {
                            $opciones[$dtsCategorias->categoria_id] = strtoupper($dtsCategorias->categoria_nombre);
                        }
                        $js = 'class="chzn-select" id="categoria" onChange="enviarAjax(\'' . site_url('/operativo/prestarServicio/eventosAjax') . '\',\'formSolicitud\',\'masDtsDuplicados\',\'cargarDuplicado\');
                                enviarAjax(\'' . site_url('/operativo/prestarServicio/eventosAjax') . '\',\'formSolicitud\',\'dtsAdiServicio\',\'cargarDtsAdicionales\');" style="width: 90%" parsley-required="tipo servicio" parsley-error-container="div#errorServicio"';
                        # Consulta tramites
                        $tramites = $this->CI->Model_Servicios->allTramites();
                        $opcionesTramites = array('' => 'Seleccione..');
                        foreach ($tramites as $dtsTramites) {
                            $opcionesTramites[$dtsTramites->tramite_id] = strtr(strtoupper($dtsTramites->tramite_nombre),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
                        }
                        $jsTramites = 'class="chzn-select" id="tramite" onChange="enviarAjax(\'' . site_url('/operativo/prestarServicio/eventosAjax') . '\',\'formSolicitud\',\'masDtsDuplicados\',\'cargarDuplicado\');
                                enviarAjax(\'' . site_url('/operativo/prestarServicio/eventosAjax') . '\',\'formSolicitud\',\'dtsAdiServicio\',\'cargarDtsAdicionales\');" style="width: 90%" parsley-required="tipo servicio" parsley-error-container="div#errorServicio"';
                        
                        $resultado = '<div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <div class="form-group">  
                                                '.form_dropdown('categoria', $opciones, NULL, $js).'
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Descripci&oacute;n Categor&iacute;a</label>      
                                            <div id="descripCategoria" class="form-group">  
                                                descr categoria       
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Imprimir Factura&nbsp;
                                            <input type="checkbox" style="margin:0; vertical-align: middle;"></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Tramite</label>
                                            <div class="form-group">  
                                                '.form_dropdown('tramite', $opcionesTramites, NULL, $jsTramites).'
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Servicio</label>      
                                            <div id="descripTramite" class="form-group">  
                                                descr Tramite             
                                            </div>
                                        </div>
                                    </div>
                                      ';
                    } elseif ($dtsServi->servicio_tipo_servicio_id == 2) { # Para valoracion armas
                        $resultado = '<div class="col-lg-3">
                                        <label>Armas falta terminar:</label>                                    
                                      </div>';
                    } elseif ($dtsServi->servicio_tipo_servicio_id == 3) { # Para Examenes Parciales   
                        $resultado = '<div class="col-lg-3">
                                        <label>Examenes a Realizar:</label>
                                        <div class="row">
                                            <div class="form-group col-lg-12" style="padding-left: 50px">
                                                <div>
                                                    Visiometria&nbsp;
                                                    <input type="checkbox" style="margin:0; vertical-align: middle;">
                                                </div>
                                                <div>
                                                    Psicomotriz&nbsp;
                                                    <input type="checkbox" style="margin:0; vertical-align: middle;">
                                                </div>
                                                <div>
                                                    Audiometria&nbsp;
                                                    <input type="checkbox" style="margin:0; vertical-align: middle;">
                                                </div>                                            
                                                <div>
                                                    Medicina General&nbsp;
                                                    <input type="checkbox" style="margin:0; vertical-align: middle;">
                                                </div>                                            
                                            </div>                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Imprimir Factura&nbsp;
                                            <input type="checkbox" style="margin:0; vertical-align: middle;"></label>
                                        </div>
                                      </div>';
                    }
                }
            }
        }

        echo $resultado.'<script>$(".chzn-select").chosen();</script>';
    }

}
