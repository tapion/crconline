<?php
/**
 * Description of model_grupo_funcionalidad
 *
 * @author arkazero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Grupo_Funcionalidad extends CI_Model {
    
    protected $table;
    
    function __construct() {
        parent::__construct();
        $this->table = 'grupos_funcionalidades';        
    }
    
    public function listAll(){        
        $this->db->select('grupo_id,funcionalidad_id');
        $this->db->from('grupos_funcionalidades');        
        $query = $this->db->get();
        return $query->result();        
    }

}

?>
