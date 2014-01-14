<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Equipos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('administradores/modelo_equipos', 'Model_Equipos');
        $this->dtssession = $this->session->userdata('logged_user');
        foreach ($this->dtssession as $dtsSession) {
            $this->idUsuario = $dtsSession->usuario_id;
        }
    }
    
    public function index() {
        $this->load->view('equipos/index');
    }
    
    public function create( $id=NULl, $opcion = NULL) {
        $data = array();
        if( !is_null($id) && !is_null($opcion)){
            $data['opcion'] = $opcion;
            $data['registros'] = $this->Model_Equipos->allMachines( $id );
        }
        $this->load->view('equipos/nuevo',$data);
    }
    
    public function filtros($exito = "") {
        $datas['exito'] = $exito;        
        $datas['filtros'] = $this->Model_Equipos->allMachines();
        $this->load->view('equipos/consultar', $datas);
    }
    

    function newEditMachine($opcion = "") {
        try {
            $this->Model_Equipos->startTrans();
            $data['registros'] = $this->input->post();
            $data['registros']['idUsuario'] = $this->idUsuario;
            if (!$this->Model_Equipos->insertEditMachine($data['registros'], $opcion))
                throw new Exception("Error ingresando o modificando equipo!");
            $this->Model_Equipos->completeTrans();
            $this->index();
        } catch (Exception $exc) {
            $respuesta = array();
            $respuesta['ok'] = $exc->getMessage();
            echo json_encode($respuesta);
        }
    }
    
    /*public function filtros() {
        $params['table'] = 'equipos';
        $params['fields'] = array(  'equipo_nombre'
                                    ,'equipo_descripcion'
                                    ,'case when equipo_estado then \'Activo\' else \'Inactivo\' end as estado'
                                    ,'\'<button title="Editar" class="glyphicon glyphicon-edit btn btn-sm btn-info" onclick="enviarPeticionAjax(\'\''.site_url('administracion/equipos/editar/').'/\' || equipo_id || \'\'\', \'\'divTabs\'\');"></button>\''
                            );
        $params['connection'] = $this->db->conn_id;
        $this->load->library('dynamicdatatable', $params);
        return $this->dynamicdatatable->filtro();
    }*/
    
}
