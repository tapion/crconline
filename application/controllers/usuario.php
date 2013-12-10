<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of usuario
 *
 * @author juan.gomez
 */
class Usuario extends CI_Controller {
    
    public function index(){
        $this->load->view('usuario/index');
    }
    
    public function filtrar() {
        $this->load->view('usuario/filtrar');
    }
    
    public function crear() {
        $this->load->view('usuario/crear');
    }
    
    public function modificar() {
        $this->load->view('usuario/crear');
    }
    
}
