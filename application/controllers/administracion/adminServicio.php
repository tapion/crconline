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
        # Consulta sedes por empresa
        $data['sedes'] = $this->Model_Admin->filterSedeEmpresa(1);
        # Tipos  Examen con su respectivo subExamen asociado
        $matrizFinal = array();
        $data['tipoExamen'] = $this->Model_Admin->allTipoExamen();
        foreach ($data['tipoExamen'] as $tipoExamen){
            $matrizFinal[$tipoExamen->tipo_examen_id] = $this->Model_Admin->filterTipoSubexamen($tipoExamen->tipo_examen_id);
        }
        $data['subExamen'] = $matrizFinal;
        $this->load->view('adminServicio/nuevo', $data);
    }
    
    public function createServicio(){
        $registro = $this->input->post();
        $idServicio = $this->Model_Admin->insertServicio($registro);
        $maxSubexamen = $this->Model_Admin->maxSubExamen();
        foreach ($idServicio as $dtsServicio){
            $idSer = $dtsServicio->idservicio;
        }
        foreach ($maxSubexamen as $dtsMaxSubexamen){
            $maxSubExa = $dtsMaxSubexamen->idsubexamen;
        }        
        $datos['exito'] = $this->Model_Admin->insertServicioSubExa($registro,$idSer,$maxSubExa);
        $this->load->view('adminServicio/consultar', $datos);
    }
    
    public function consultar(){
//        $datos['filtros'] = $this->Model_Admin->allServicios();
        $this->load->view('adminServicio/consultar');
    }
    
}
