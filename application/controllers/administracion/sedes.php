<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of sedes
 *
 * @author juan.gomez
 */
class Sedes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administradores/modelo_sedes','Modelo_Sedes');
    }
    
    public function index() {
        $this->load->view('sedes/index');
    }
    
    public function consultarAllSedes($exito = "") {
        $datas['exito'] = $exito;        
        $datas['filtros'] = $this->Modelo_Sedes->allSedes();
        $this->load->view('sedes/consultar', $datas);
    }
    
}
