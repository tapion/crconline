<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

class Prestarserviciolib {

    function __construct() {
        $this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería
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
                        $resultado = '<div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <div class="form-group">  
                                                <input class="form-control input-group mayusPrimeras" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre" parsley-required="nombre(s)" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Descripción Categoría</label>      
                                            <div class="form-group">  
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
                                                <input class="form-control input-group mayusPrimeras" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre" parsley-required="nombre(s)" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Servicio</label>      
                                            <div class="form-group">  
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

        echo $resultado;
    }

}