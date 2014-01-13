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
    
    public function newFunctionality($funcionalidad_id = ""){
        if( $funcionalidad_id > 0 ){
            $data['funcionalidad'] = $this->Model_Funcionalidad->searchFunctionality($funcionalidad_id);
        }else{
            $data['funcionalidad'] = "";
        }
        $this->load->model('Model_Grupo');
        $data['grupos'] = $this->Model_Grupo->listAll();        
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
    
    public function editFunctionality(){                                   
        $funcionalidad = $this->input->post();
        $funciona_id = $this->Model_Funcionalidad->editFunctionality($funcionalidad);
        
        if( $funciona_id > 0 ){
            $data['funcionalidad'] = $this->Model_Funcionalidad->searchFunctionality($funciona_id);
        }else{
            $data['funcionalidad'] = "";
        }
        $this->load->model('Model_Grupo');
        $data['grupos'] = $this->Model_Grupo->listAll();        
        $this->load->view('funcionalidad/newFunctionality.php',$data);          
    }
    
    public function classifyFunctionalities(){
        $this->load->model('Model_Grupo');
        $data['funcionalidades'] = $this->Model_Funcionalidad->listAll();
        $data['grupos'] = $this->Model_Grupo->listAll();        
        $this->load->view('funcionalidad/classifyFunctionalities.php',$data);       
    }
    
    public function classify(){
        $funcionalidad = $this->input->post();        
        echo "<pre>";
            print_r ($funcionalidad);
        echo "</pre>";
        log_message("error", var_export($funcionalidad,true));
        log_message("debug", var_export($funcionalidad,true));
        log_message("info", var_export($funcionalidad,true));
        //$funciona_id = $this->Model_Funcionalidad->classifyFunctionalities($funcionalidad);
        
        $this->load->model('Model_Grupo');
        $data['funcionalidades'] = $this->Model_Funcionalidad->listAll();
        $data['grupos'] = $this->Model_Grupo->listAll();        
        $this->load->view('funcionalidad/classifyFunctionalities.php',$data); 
    }
    
}

?>
