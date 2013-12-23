<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
        $this->dtssession = $this->session->userdata('logged_user');
        foreach ($this->dtssession as $dtsSession) {
            $this->sedeUsuario = $dtsSession->usuario_sede_id;
            $this->empresaUsuario = $dtsSession->usuario_empresa_id;
        }
    }

    public function index() {
        $this->load->view('adminServicio/index');
    }

    public function newServicio($id = "", $opcion = "") {
        if(isset($id) && !empty($id) && isset($opcion) && !empty($opcion)) {
            $data['opcion'] = $opcion;
            $data['ident'] = $id;
            # Consultar todo lo relacionado a la sede 
            $data['registros'] = $this->Model_Admin->datosServicios;
        }
        # Tipos De servicio
        $data['tipoServicios'] = $this->Model_Admin->allTipoServicios($this->empresaUsuario);
        # Consulta sedes por empresa
        $data['sedes'] = $this->Model_Admin->filterSedeEmpresa($this->empresaUsuario);
        # Tipos  Examen con su respectivo subExamen asociado
        $matrizFinal = array();
        $data['tipoExamen'] = $this->Model_Admin->allTipoExamen();
        foreach ($data['tipoExamen'] as $tipoExamen) {
            $matrizFinal[$tipoExamen->tipo_examen_id] = $this->Model_Admin->filterTipoSubexamen($tipoExamen->tipo_examen_id);
        }
        $data['subExamen'] = $matrizFinal;
        $this->load->view('adminServicio/nuevo', $data);
    }

    public function createServicio() {
        $registro = $this->input->post();
        $idServicio = $this->Model_Admin->insertServicio($registro);
        $maxSubexamen = $this->Model_Admin->maxSubExamen();
        foreach ($idServicio as $dtsServicio) {
            $idSer = $dtsServicio->idservicio;
        }
        foreach ($maxSubexamen as $dtsMaxSubexamen) {
            $maxSubExa = $dtsMaxSubexamen->idsubexamen;
        }
        $datos['exito'] = $this->Model_Admin->insertServicioSubExa($registro, $idSer, $maxSubExa);
        $this->load->view('adminServicio/consultar', $datos);
    }

    public function consultarAllServi() {
        $datas['filtros'] = $this->Model_Admin->allServicios();
        $this->load->view('adminServicio/consultar', $datas);
    }

}
