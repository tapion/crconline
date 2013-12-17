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
            
    function filterTipoSubexamen($value) {
        $this->db->select('*');
        $this->db->from('subexamenes');
        $this->db->where('subexamen_tipo_examen_id', $value);
        $query = $this->db->get();
        return $query->result();
    }
    
    function allTipoServicios(){
        $this->db->select('*');
        $this->db->from('tipos_servicios');
        $query = $this->db->get();
        return $query->result();
    }

    

}
