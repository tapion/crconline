<?php
/**
 * Description of funcionalidad
 *
 * @author arkazero
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Funcionalidad extends CI_Model {
    
    protected $table;
    protected $id;

    /*
     * Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria.
     */
    public function __construct() {
        parent::__construct();
        $this->table = 'funcionalidades';
        $this->id = 'funcionalidad_id';
    }
    
    public function listAll(){                             
        $this->db->select("funcionalidades.*, 
                            CASE funcionalidades.funcionalidad_estado WHEN TRUE THEN 'Activo' ELSE 'Inactivo' END as nombre_estado,
                            grupos.grupo_nombre as nombre_grupo",FALSE);
        $this->db->join("grupos", "grupos.grupo_id = funcionalidades.funcionalidad_grupo_id");
        $query = $this->db->get('funcionalidades');
        return $query->result();        
    }
    
    public function addFunctionality($parametros){
        $data = array('funcionalidad_nombre' => isset($parametros['name']) ? $parametros['name']: NULL,
                      'funcionalidad_grupo_id' => isset($parametros['grupo']) ? $parametros['grupo']: NULL ,
                      'funcionalidad_estado' => isset($parametros['estado']) ? $parametros['estado']: NULL,
                      'funcionalidad_url' => isset($parametros['url']) ? $parametros['url']: NULL
                     );

        $this->db->insert('funcionalidades', $data);         
        $this->db->select("currval('funcionalidades_funcionalidad_id_seq') as idFuncionalidad");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function searchFunctionality($id){
        $this->db->select("*");
        $this->db->from("funcionalidades");
        $this->db->where("funcionalidad_id",$id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function editFunctionality($parametros){
        $data = array(
                'funcionalidad_nombre' => $parametros['name'],
                'funcionalidad_grupo_id' => $parametros['grupo'],
                'funcionalidad_estado' => $parametros['estado'],
                'funcionalidad_url' => $parametros['url']
            );

        $this->db->where('funcionalidad_id', $parametros['funcionalidad_id']);
        $this->db->update('funcionalidades', $data);
        return $parametros['funcionalidad_id'];
    }
}
?>
