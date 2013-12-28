<?php 
/**
 *
 * @author arkazero
 */
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionalidad extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Funcionalidad');
    }

    public function index(){
        $this->load->view('funcionalidad/index.php');
    }
    
    public function listAllFunctionality(){
        
        $data['funcionalidades'] = $this->Model_Funcionalidad->listAll();
        $this->load->view('funcionalidad/listAll.php',$data);       
    }
    
    public function newFunctionality(){
        $this->load->model('Model_Grupo');
        $data['grupos'] = $this->Model_Grupo->listAll();
        $data['funcionalidad'] = "";
        $this->load->view('funcionalidad/newFunctionality.php',$data);       
    }
    
    public function createFunctionality(){
        $funcionalidad = $this->input->post();                        
        $idFuncionalidad = $this->Model_Funcionalidad->addFunctionality($funcionalidad);
        $data['funcionalidad'] = $this->Model_Funcionalidad->searchFunctionality($idFuncionalidad);
        $this->load->model('Model_Grupo');
        $data['grupos'] = $this->Model_Grupo->listAll();
        $this->load->view('funcionalidad/newFunctionality.php',$data);        
    }   
    
    public function editFunctionality($funcionalidad_id){                                   
        $data['funcionalidad'] = $this->Model_Funcionalidad->searchFunctionality($funcionalidad_id);
        $this->load->model('Model_Grupo');
        $data['grupos'] = $this->Model_Grupo->listAll();        
        $this->load->view('funcionalidad/newFunctionality.php',$data);        
    }
    
}

?>
