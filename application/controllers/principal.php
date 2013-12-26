<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of principal
 *
 * @author juan.gomez
 */
class Principal extends CI_Controller {
    
    public function index(){

        $datos = array( 'listaMenu' => array('Administracion' => array( 'Usuarios' => 'usuario/index',  'Servicio' => 'administracion/adminServicio/index' ,'Personas' => 'url', 'Empresas' => 'url' ),
                                             'Examenes' => array( 'Optometria' => 'url', 'Audiometria' => 'url', 'Medico' => 'url', 'dividir' => 'dividir' ,'Reportes' => array('Pagos' => 'url', 'Usuarios' => 'url')),
                                             'Operativo' => array('Clientes' => 'url', 'Control Turnos' => 'url', 'Facturas'=>'url','Prestar Servicio' => 'operativo/prestarServicio/index'),
                                            )
                      );    

        $this->load->view('principal',$datos);
    }
    
}
