<?php

/**
 * Description of usuario
 *
 * @author Jerson Gomez
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelo_Servicios extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function startTrans() {
        $this->db->trans_start();
    }

    public function completeTrans() {
        $this->db->trans_complete();
    }

    function allTipoExamen() {
        $this->db->select('tipo_examen_id, tipo_examen_nombre');
        $this->db->from('tipos_examenes');
        $query = $this->db->get();
        return $query->result();
    }

    function filterTipoSubexamen($tipoExamen) {
        $this->db->select('*');
        $this->db->from('subexamenes');
        $this->db->where('subexamen_tipo_examen_id', $tipoExamen);
        $query = $this->db->get();
        return $query->result();
    }

    function allTipoServicios($empresa) {
        $this->db->select('tipos_servicios.*');
        $this->db->from('tipos_servicios');
        if (isset($empresa) && !empty($empresa)) {
            $this->db->join('empresas_tipos_servicios', 'empresas_tipos_servicios.empresa_tipo_servicio_tipo_servicio_id = tipos_servicios.tipo_servicio_id and empresas_tipos_servicios.empresa_tipo_servicio_estado = TRUE');
            $this->db->join('empresas', 'empresas.empresa_id = empresas_tipos_servicios.empresa_tipo_servicio_empresa_id AND empresas.empresa_id =' . $empresa);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function filterSedeEmpresa($idSede, $idEmpresa) {
        $this->db->select('*');
        $this->db->from('sedes');
        $this->db->join('empresas', 'sedes.sede_empresa_id = empresas.empresa_id and empresas.empresa_estado = TRUE');
        $this->db->where('sede_estado', 'TRUE');
        if (isset($idEmpresa) && !empty($idEmpresa)) {
            $this->db->where('sede_empresa_id', $idEmpresa);
        }
        if (isset($idSede) && !empty($idSede)) {
            $this->db->where('sede_id', $idSede);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function maxSubExamen() {
        $this->db->select_max('subexamen_id', 'idsubexamen');
        $query = $this->db->get('subexamenes');
        foreach ($query->result() as $dtsMaxSubexamen) {
            $maxSubExa = $dtsMaxSubexamen->idsubexamen;
        }
        return $maxSubExa;
    }

    function insertServicio($parametros) {
        try {
            $data = array('servicio_nombre' => isset($parametros['txtServicio']) ? $parametros['txtServicio'] : NULL,
                'servicio_valor' => isset($parametros['txtVlrServicio']) ? $parametros['txtVlrServicio'] : NULL,
                'servicio_edad_minima' => isset($parametros['edadMin']) ? $parametros['edadMin'] : NULL,
                'servicio_edad_maxima' => isset($parametros['edadMax']) ? $parametros['edadMax'] : NULL,
                'servicio_estado' => isset($parametros['estado']) ? $parametros['estado'] : NULL,
                'servicio_valor_certificado' => isset($parametros['txtVlrCerti']) ? $parametros['txtVlrCerti'] : NULL,
                'servicio_sede_id' => isset($parametros['sede']) ? $parametros['sede'] : NULL,
                'servicio_tipo_servicio_id' => isset($parametros['tipoServicio']) ? $parametros['tipoServicio'] : NULL
            );

            if (!$this->db->insert('servicios', $data))
                throw new Exception();

            $this->db->select("currval('servicios_servicio_id_seq') as idservicio");
            $query = $this->db->get();
            return $query->result();
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    function insertServicioSubExa($parametros, $idserv, $maxSub) {
        try {
            for ($i = 1; $i <= $maxSub; $i++) {
                if (isset($parametros[$i]) && !empty($parametros[$i])) {
                    $dts = array('servicio_subexamen_servicio_id' => $idserv,
                        'servicio_subexamen_subexamen_id' => $i
                    );
                    if (!$this->db->insert('servicios_subexamenes1', $dts))
                        throw new Exception();
                }
            }
            return TRUE;
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    function allServicios($sede = "", $empresa = "", $idServi = "", $idTipServ = "") {
        $comSql = !empty($sede) ? "AND sedes.sede_id = $sede" : '';
        $comSqltipSer = !empty($idTipServ) ? "AND tipos_servicios.tipo_servicio_id = $idTipServ" : '';
        $this->db->select("servicios.*, tipos_servicios.tipo_servicio_nombre, sedes.sede_nombre, CASE servicios.servicio_estado WHEN TRUE THEN 'Activo' ELSE 'Inactivo' END as estado", FALSE);
        $this->db->from('servicios');
        $this->db->join('tipos_servicios', 'tipos_servicios.tipo_servicio_id = servicios.servicio_tipo_servicio_id ' . $comSqltipSer);
        $this->db->join('sedes', 'sedes.sede_id = servicios.servicio_sede_id ' . $comSql);
        if (isset($idServi) && !empty($idServi)) {
            $this->db->where('servicios.servicio_id', $idServi);
        } elseif (isset($empresa) && !empty($empresa)) {
            $this->db->join('empresas', 'empresas.empresa_id = sedes.sede_empresa_id');
        }
        $query = $this->db->get();
        return $query->result();
    }
    function allServicios2($sede = "", $empresa = "", $idServi = "", $idTipServ = "") {
        $this->multi = $this->load->database('multi', TRUE);
        $sql = 'select mpais_id as sede_nombre 
                ,mpais_id as servicio_id 
                ,mpais_nombre as servicio_nombre
                ,mpais_capital as servicio_valor
                ,mpais_province as servicio_valor_certificado
                ,mpais_area as tipo_servicio_nombre
                ,mpais_poblacion as estado
                from tbmpais';
        
        
//        $comSql = !empty($sede) ? "AND sedes.sede_id = $sede" : '';
//        $comSqltipSer = !empty($idTipServ) ? "AND tipos_servicios.tipo_servicio_id = $idTipServ" : '';
//        $this->db->select("servicios.*, tipos_servicios.tipo_servicio_nombre, sedes.sede_nombre, CASE servicios.servicio_estado WHEN TRUE THEN 'Activo' ELSE 'Inactivo' END as estado", FALSE);
//        $this->db->from('servicios');
//        $this->db->join('tipos_servicios', 'tipos_servicios.tipo_servicio_id = servicios.servicio_tipo_servicio_id ' . $comSqltipSer);
//        $this->db->join('sedes', 'sedes.sede_id = servicios.servicio_sede_id ' . $comSql);
//        if (isset($idServi) && !empty($idServi)) {
//            $this->db->where('servicios.servicio_id', $idServi);
//        } elseif (isset($empresa) && !empty($empresa)) {
//            $this->db->join('empresas', 'empresas.empresa_id = sedes.sede_empresa_id');
//        }
        $query = $this->multi->query($sql);
        return $query->result();
    }

    function deleteSubExamenServicio($idServicio) {
        $this->db->where('servicio_subexamen_servicio_id', $idServicio);
        $this->db->delete('servicios_subexamenes');
        return TRUE;
    }

    function allSubExamenServicio($idServicio) {
        if (isset($idServicio) && !empty($idServicio)) {
            $this->db->where("servicio_subexamen_servicio_id", $idServicio);
        }
        $query = $this->db->get("servicios_subexamenes");
        return $query->result();
    }

    function editServicio($parametros) {
        try {
            $data = array('servicio_nombre' => isset($parametros['txtServicio']) ? $parametros['txtServicio'] : NULL,
                'servicio_valor' => isset($parametros['txtVlrServicio']) ? $parametros['txtVlrServicio'] : NULL,
                'servicio_edad_minima' => isset($parametros['edadMin']) ? $parametros['edadMin'] : NULL,
                'servicio_edad_maxima' => isset($parametros['edadMax']) ? $parametros['edadMax'] : NULL,
                'servicio_estado' => isset($parametros['estado']) ? $parametros['estado'] : NULL,
                'servicio_valor_certificado' => isset($parametros['txtVlrCerti']) ? $parametros['txtVlrCerti'] : NULL,
                'servicio_sede_id' => isset($parametros['sede']) ? $parametros['sede'] : NULL,
                'servicio_tipo_servicio_id' => isset($parametros['tipoServicio']) ? $parametros['tipoServicio'] : NULL
            );

            $this->db->where('servicio_id', $parametros['idServicio']);
            if (!$this->db->update('servicios', $data))
                throw new Exception();

            return TRUE;
        } catch (Exception $exc) {
            return FALSE;
        }
    }
}
