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
        $query = $this->db->query();
        return $query->result();
    }
}
?>
