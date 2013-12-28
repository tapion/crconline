<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelo_empresas extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function allTipoExamen(){
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
    
    function allTipoServicios($empresa){
        $this->db->select('tipos_servicios.*');
        $this->db->from('tipos_servicios');
        if(isset($empresa) && !empty($empresa)){
            $this->db->join('empresas_tipos_servicios', 'empresas_tipos_servicios.empresa_tipo_servicio_tipo_servicio_id = tipos_servicios.tipo_servicio_id and empresas_tipos_servicios.empresa_tipo_servicio_estado = TRUE');
            $this->db->join('empresas', 'empresas.empresa_id = empresas_tipos_servicios.empresa_tipo_servicio_empresa_id AND empresas.empresa_id ='.$empresa);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    function filterSedeEmpresa($idSede,$idEmpresa){        
        $this->db->select('*');
        $this->db->from('sedes');
        $this->db->join('empresas', 'sedes.sede_empresa_id = empresas.empresa_id and empresas.empresa_estado = TRUE');        
        $this->db->where('sede_estado', 'TRUE');
        if(isset($idEmpresa) && !empty($idEmpresa)){
            $this->db->where('sede_empresa_id',$idEmpresa);
        }
        if(isset($idSede) && !empty($idSede)){
            $this->db->where('sede_id', $idSede);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    function maxSubExamen(){
        $this->db->select_max('subexamen_id', 'idsubexamen');
        $query = $this->db->get('subexamenes');
        return $query->result();
    }
    
    function insertServicio($parametros){
        $data = array('servicio_nombre' => isset($parametros['txtServicio']) ? $parametros['txtServicio']: NULL,
                      'servicio_valor' => isset($parametros['txtVlrServicio']) ? $parametros['txtVlrServicio']: NULL ,
                      'servicio_edad_minima' => isset($parametros['edadMin']) ? $parametros['edadMin']: NULL,
                      'servicio_edad_maxima' => isset($parametros['edadMax']) ? $parametros['edadMax']: NULL,
                      'servicio_estado' => isset($parametros['estado']) ? $parametros['estado']: NULL,
                      'servicio_valor_certificado' => isset($parametros['txtVlrCerti']) ? $parametros['txtVlrCerti']: NULL,
                      'servicio_sede_id' => isset($parametros['sede']) ? $parametros['sede']: NULL,
                      'servicio_tipo_servicio_id' => isset($parametros['tipoServicio']) ? $parametros['tipoServicio']: NULL
                     );

        $this->db->insert('servicios', $data);         
        $this->db->select("currval('servicios_servicio_id_seq') as idservicio");
        $query = $this->db->get();
        return $query->result();
        
    }
    
    function insertServicioSubExa($parametros, $idserv, $maxSub){
        for($i=1;$i <= $maxSub;$i++){
            if(isset($parametros[$i]) && !empty($parametros[$i])){
                $dts = array('servicio_subexamen_servicio_id' => $idserv,
                             'servicio_subexamen_subexamen_id'=> $i                
                            );
                $this->db->insert('servicios_subexamenes', $dts);    
            }
        }        
        return true;
    }
    
    public function getCompany(){
        return $this->db->query("select emp.empresa_id
                    ,emp.empresa_nombre
                    ,emp.empresa_nit
                    ,emp.empresa_direccion 
                    ,emp.empresa_telefono1
                    ,emp.empresa_telefono2
                    ,case when emp.empresa_estado then 'Activo' else 'Inactivo' end as estado
                    ,usr.usuario_login as usuario_creacion
                    ,emp.empresa_fecha_creacion
                    ,ciu.ciudad_nombre
                    ,pai.pais_nombre
                    ,usr2.usuario_login as usuario_edito
                    ,emp.empresa_fecha_edito
                from empresas emp
                inner join usuarios usr on usr.usuario_id = emp.usuario_id
                left join usuarios usr2 on usr2.usuario_id = emp.usuario_id_edito
                inner join ciudades ciu on ciu.ciudad_id = emp.ciudad_id
                inner join paises pai on pai.pais_id = ciu.pais_id
                order by emp.empresa_nombre");
//        $comSql = !empty($sede) ? "AND sedes.sede_id = $sede" : '';
//        $this->db->select("servicios.*, tipos_servicios.tipo_servicio_nombre, sedes.sede_nombre, CASE servicios.servicio_estado WHEN TRUE THEN 'Activo' ELSE 'Inactivo' END as estado", FALSE);
//        $this->db->from('servicios');
//        $this->db->join('tipos_servicios', 'tipos_servicios.tipo_servicio_id = servicios.servicio_tipo_servicio_id');
//        $this->db->join('sedes', 'sedes.sede_id = servicios.servicio_sede_id '.$comSql);
//        if(isset($idServi) && !empty($idServi)){
//            $this->db->where('servicios.servicio_id',$idServi);
//        }elseif(isset($empresa) && !empty($empresa)){
//            $this->db->join('empresas', 'empresas.empresa_id = sedes.sede_empresa_id');
//        }
//        $query = $this->db->get();
//        return $query->result();
    }
    
    function datosServicios(){
        
    }
        
}