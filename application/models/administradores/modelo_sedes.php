<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of modelo_sedes
 *
 * @author juan.gomez
 */
class Modelo_Sedes extends CI_Model{
    
    
    function allSedes() {
        $this->db->select('*');
        $this->db->from('sedes');
        $query = $this->db->get();
        return $query->result();
    }
    
}
