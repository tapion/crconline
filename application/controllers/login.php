<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of login
 *
 * @author juan.gomez
 */
class Login extends CI_Controller {
    
    public function index(){
        $this->load->view('login');
    }

}
