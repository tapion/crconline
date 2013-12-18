<?php
/**
 * Description of usuario
 *
 * @author Jerson Gomez
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Admin extends CI_Model {

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
    
    function allTipoServicios(){
        $this->db->select('*');
        $this->db->from('tipos_servicios');
        $query = $this->db->get();
        return $query->result();
    }
    
    function filterSedeEmpresa($idEmpresa){
        $this->db->select('*');
        $this->db->from('sedes');
        $this->db->join('empresas', 'sedes.sede_empresa_id = empresas.empresa_id and empresas.empresa_estado = TRUE');
        $this->db->where('sede_empresa_id',$idEmpresa);
        $this->db->where('sede_estado', 'TRUE');        
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

    

}
