<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('administradores/modelo_empresas');
    }

    public function index() {
        $this->load->view('adminEmpresas/index');
    }

    public function create() {
        $this->load->view('adminEmpresas/nuevo');
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
        $this->consultarAllServi($datos);
    }

    public function getAllCompany() {
        $this->load->view('adminEmpresas/consultar');
    }

    public function editar($empresa_id) {
        
    }

    public function filtros() {
        $params['table'] = 'empresas emp
                inner join usuarios usr on usr.usuario_id = emp.empresa_usuario_id
                left join usuarios usr2 on usr2.usuario_id = emp.empresa_usuario_id_edito
                inner join ciudades ciu on ciu.ciudad_id = emp.empresa_ciudad_id
                inner join paises pai on pai.pais_id = ciu.ciudad_pais_id';
        $params['fields'] = array('emp.empresa_nombre'
                    ,'emp.empresa_nit'
                    ,'emp.empresa_direccion'
                    ,'emp.empresa_telefono1 || \' \' || emp.empresa_telefono2'
                    ,'case when emp.empresa_estado then \'Activo\' else \'Inactivo\' end as estado'
                    ,'pai.pais_nombre'
                    ,'ciu.ciudad_nombre'
                    ,'usr.usuario_login'
                    ,'emp.empresa_fecha_creacion'
                    ,'usr2.usuario_login'
                    ,'emp.empresa_fecha_edito'
                    ,'\'<button title="Editar" class="glyphicon glyphicon-edit btn btn-sm btn-info" onclick="enviarPeticionAjax(\'\''.site_url('administracion/empresas/editar/').'/\' || emp.empresa_id || \'\'\', \'\'divTabs\'\');"></button>\''
            );
        $params['connection'] = $this->db->conn_id;
        $this->load->library('dynamicdatatable', $params);
        return $this->dynamicdatatable->filtro();
    }
}
