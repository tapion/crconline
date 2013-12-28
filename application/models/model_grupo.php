<?php
/**
 * Description of model_modulo
 *
 * @author arkazero
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Grupo extends CI_Model{
    protected $table;
    protected $id;

    /*
     * Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria.
     */
    public function __construct() {
        parent::__construct();
        $this->table = 'grupos';
        $this->id = 'grupo_id';
    }
    
    public function listAll(){        
        $this->db->select('grupo_id,grupo_nombre');
        $this->db->from('grupos');
        $this->db->order_by('grupo_nombre','desc');
        $query = $this->db->get();
        return $query->result();        
    }
}

?>
