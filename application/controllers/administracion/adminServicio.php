<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of usuario
 *
 * @author 
 */
class AdminServicio extends CI_Controller {
    
    public function index(){
        $this->load->view('adminServicio/index');
    }
    
    public function newServicio(){
        $this->load->view('adminServicio/new');
    }
    
    public function create(){
        echo 'aca';
    }
    
    
}