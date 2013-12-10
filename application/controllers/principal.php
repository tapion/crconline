<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of principal
 *
 * @author juan.gomez
 */
class Principal extends CI_Controller {
    
    public function index(){

        $datos = array( 'listaMenu' => array('Administracion' => array( 'Usuarios' => 'usuario/index', 'Personas' => 'url', 'Empresas' => 'url' ),
                                             'Examenes' => array( 'Optometria' => 'url', 'Audiometria' => 'url', 'Medico' => 'url', 'dividir' => 'dividir' ,'Reportes' => array('Pagos' => 'url', 'Usuarios' => 'url'))
                                            )
                      );    

        $this->load->view('principal',$datos);
    }
    
}
