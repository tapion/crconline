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
        $this->load->model('Model_Grupo_Funcionalidad');
        
        $data['funcionalidades'] = $this->Model_Funcionalidad->listAll();
        $data['grupos'] = $this->Model_Grupo->listAll();  
        $data['grupo_funcionalidad'] = $this->Model_Grupo_Funcionalidad->listAll();
        
        $this->load->view('funcionalidad/classifyFunctionalities.php',$data); 
    }
    
    public function classify(){
        $funcionalidad = $this->input->post();        
        
        $grupoFun = array();
        foreach($funcionalidad as $fun) {
            if ( strpos($fun, "_") > 0 ){
                $temp = explode("_", $fun);
                $grupoFun['grupo'] = $temp[1];
                $grupoFun['funcionalidad'] = $temp[0];
            }
        }
        
        $this->Model_Funcionalidad->classifyFunctionalities($grupoFun);
        
        $this->load->model('Model_Grupo');        
        $this->load->model('Model_Grupo_Funcionalidad');
        
        $data['funcionalidades'] = $this->Model_Funcionalidad->listAll();
        $data['grupos'] = $this->Model_Grupo->listAll();  
        $data['grupo_funcionalidad'] = $this->Model_Grupo_Funcionalidad->listAll();
        
        
        $this->load->view('funcionalidad/classifyFunctionalities.php',$data); 
    }
    
}

?>
