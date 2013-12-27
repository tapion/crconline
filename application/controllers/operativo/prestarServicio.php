<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of usuario
 *
 * @author Jerson Gomez
 */
class PrestarServicio extends CI_Controller {

    // Constructor de la clase
    function __construct() {
        parent::__construct();
        $this->load->model('operativos/modelo_prestar_servicios', 'Model_PresServi');
        $this->load->model('modelo_personas', 'Model_Persona');
        $this->dtssession = $this->session->userdata('logged_user');
        foreach ($this->dtssession as $dtsSession) {
            $this->sedeUsuario = $dtsSession->usuario_sede_id;
            $this->empresaUsuario = $dtsSession->usuario_empresa_id;
        }
    }

    public function applet($tipoDoc, $numDoc) {
        $datas['tipDoc'] = $tipoDoc;
        $datas['numDoc'] = $numDoc;        
        $this->load->view('prestarServicio/applet',$datas);
    }
    
    public function index() {
        $data['tiposDoc'] = $this->Model_Persona->tiposDocumento();
        $this->load->view('prestarServicio/index', $data);
    }

    function consultPersona() {
        $data['registros'] = $this->input->post();
        $data['dtsPersonales'] = $this->Model_Persona->datPersonalesPersona($data['registros']);
        if(!empty($data['dtsPersonales'])){
            $data['opcion'] = 'editPersona';
        }
        echo '<script>$("#groupBotones").html("<button class=\"btn btn-sm btn-danger\" type=\"button\" onclick=\"enviarPeticionAjax(\'' . base_url('index.php') . '/operativo/prestarServicio/index\');\"><strong>Cancelar</strong></button>");</script>';
        $this->load->view('prestarServicio/persona', $data);
        
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
    }
    
    function insertPersona(){
        $data['registros'] = $this->input->post();
        print_r($data);
    }
    
    function editPersona(){
        
    }

}