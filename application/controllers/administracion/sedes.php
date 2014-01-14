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
        $this->load->model('administradores/modelo_equipos','Modelo_Equipos');
        $this->load->model('administradores/modelo_empresas','Modelo_Empresas');
        
        $this->dtssession = $this->session->userdata('logged_user');
        foreach ($this->dtssession as $dtsSession) {
            $this->idUsuario = $dtsSession->usuario_id;
        }
    }
    
    public function index() {
        $this->load->view('sedes/index');
    }
    
    public function consultarAllSedes($exito = "") {
        $datas['exito'] = $exito;        
        $datas['filtros'] = $this->Modelo_Sedes->allSedes();
        $this->load->view('sedes/consultar', $datas);
    }
    
    public function newSede($id=NULl, $opcion = NULL) {
        
        $data = array();
        if( !is_null($id) && !is_null($opcion)){
            $data['opcion'] = $opcion;
            $data['registros'] = $this->Modelo_Sedes->allSedes( $id );
        }
        
        $data['maquinas'] = $this->Modelo_Equipos->allMachines();
        $data['empresas'] = $this->Modelo_Empresas->allEmpresas();
        
        $this->load->view('sedes/nuevo', $data);
    }
    
    function newEditSede($opcion = "") {
        try {
            $this->Modelo_Sedes->startTrans();
            $data['registros'] = $this->input->post();
            $data['registros']['idUsuario'] = $this->idUsuario;
            if (!$this->Modelo_Sedes->insertEditSedes($data['registros'], $opcion))
                throw new Exception("Error ingresando o modificando sede!");
            $this->Modelo_Sedes->completeTrans();
            $this->index();
        } catch (Exception $exc) {
            $respuesta = array();
            $respuesta['ok'] = $exc->getMessage();
            echo json_encode($respuesta);
        }
    }
    
}
