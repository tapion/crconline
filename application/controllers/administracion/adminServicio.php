<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of usuario
 *
 * @author Jerson Gomez
 */
class AdminServicio extends CI_Controller {
    
     // Constructor de la clase
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Admin');
    }
    
    public function index(){                
        $this->load->view('adminServicio/index');
    }
    
    public function newServicio(){
        # Tipos De servicio
        $data['tipoServicios'] = $this->Model_Admin->allTipoServicios();
        # Tipos  Examen con su respectivo subExamen asociado
        $matrizFinal = array();
        $data['tipoExamen'] = $this->Model_Admin->allTipoExamen();
        foreach ($data['tipoExamen'] as $tipoExamen){
            $matrizFinal[$tipoExamen->tipo_examen_id] = $this->Model_Admin->filterTipoSubexamen($tipoExamen->tipo_examen_id);
        }
        $data['subExamen'] = $matrizFinal;
        $this->load->view('adminServicio/new', $data);
    }
    
    public function create(){
        echo 'aca';
    }
    
}