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
        $this->load->model('administradores/modelo_servicios', 'Model_Admin');
        $this->dtssession = $this->session->userdata('logged_user');
        foreach ($this->dtssession as $dtsSession) {
            $this->idUsuario = $dtsSession->usuario_id;
            $this->sedeUsuario = $dtsSession->usuario_sede_id;
            $this->empresaUsuario = $dtsSession->usuario_empresa_id;
        }
    }

    public function index() {
        $this->load->view('adminServicio/index');
    }

    public function newServicio($id = "", $opcion = "") {
        $data['titulo'] = 'Nuevo Servicio';
        if (isset($id) && !empty($id) && isset($opcion) && !empty($opcion)) {
            $data['opcion'] = $opcion;
            # Consultar todo lo relacionado a la sede 
            $data['registros'] = $this->Model_Admin->allServicios($this->sedeUsuario, $this->empresaUsuario, $id);
            $data['regSubexamen'] = $this->Model_Admin->allSubExamenServicio($id);
        }
        # Tipos
        $data['tipo'] = $this->Model_Admin->allTipos();
        # Tipos De servicio
        $data['tipoServicios'] = $this->Model_Admin->allTipoServicios($this->empresaUsuario);
        # Consulta sedes por empresa
        $data['sedes'] = $this->Model_Admin->filterSedeEmpresa($this->sedeUsuario, $this->empresaUsuario);
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
        try {
            $registro = $this->input->post();
            $idServicio = $this->Model_Admin->insertServicio($registro);
            if (!$idServicio)
                throw new Exception("Error al guardar servicio (" . $this->Model_Admin->mensajeError . ')');

            $maxSubExa = $this->Model_Admin->maxSubExamen();
            foreach ($idServicio as $dtsServicio) {
                $idSer = $dtsServicio->idservicio;
            }
            $datos['exito'] = $this->Model_Admin->insertServicioSubExa($registro, $idSer, $maxSubExa);
            if ($datos['exito']) {
                $this->consultarAllServi($datos);
            } else {
                throw new Exception("Error al guardar examenes");
            }
        } catch (Exception $exc) {
            $respuesta = array();
            $respuesta['ok'] = $exc->getMessage();
            echo json_encode($respuesta);
        }
    }

    public function consultarAllServi($exito = "") {
        $datas['exito'] = $exito;
        $datas['filtros'] = $this->Model_Admin->allServicios($this->sedeUsuario, $this->empresaUsuario);
        $this->load->view('adminServicio/consultar', $datas);
    }

    public function filtros() {        
        $comSqlSede = !empty($this->sedeUsuario) ? "AND sd.sede_id = $this->sedeUsuario" : '';
        $comSqlEmpresa = !empty($this->empresaUsuario) ? " join empresas em on em.empresa_id = sd.sede_empresa_id " : '';
        $params['table'] = 'servicios sv
                            join tipos_servicios tsv on tsv.tipo_servicio_id = sv.servicio_tipo_servicio_id 
                            join sedes sd on sd.sede_id = sv.servicio_sede_id '.$comSqlSede.$comSqlEmpresa;
        $params['fields'] = array('sede_nombre',
                                'servicio_nombre',
                                'servicio_valor',
                                'servicio_valor_certificado',
                                'tipo_servicio_nombre',
                                'CASE sv.servicio_estado WHEN TRUE THEN \'Activo\' ELSE \'Inactivo\' END as servicio_estado',
                                'servicio_id'
            );
        $params['connection'] = $this->db->conn_id;
        $this->load->library('dynamicdatatable', $params);
        return $this->dynamicdatatable->filtro();
    }

    public function editServicio() {
        try {
            $this->Model_Admin->startTrans();
            $registro = $this->input->post();
            $registro['idUsuario'] = $this->idUsuario;
            $datos['exito'] = $this->Model_Admin->deleteSubExamenServicio($registro['idServicio']);
            if ($datos['exito']) {
                $maxSubExa = $this->Model_Admin->maxSubExamen();
                if (!$this->Model_Admin->editServicio($registro))
                    throw new Exception("Error al guardar servicio");

                if (!$this->Model_Admin->insertServicioSubExa($registro, $registro['idServicio'], $maxSubExa))
                    throw new Exception("Error al guardar examenes");

                $this->consultarAllServi($datos);
                $this->Model_Admin->completeTrans();
            } else {
                throw new Exception("Error al modificar los examenes");
            }
        } catch (Exception $exc) {
            $respuesta = array();
            $respuesta['ok'] = $exc->getMessage();
            echo json_encode($respuesta);
        }
    }

}
