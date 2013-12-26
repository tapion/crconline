<?php

/**
 * Description of usuario
 *
 * @author Jerson Gomez
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelo_Personas extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function tiposDocumento(){
        $this->db->select('*');
        $query = $this->db->get('tipos_documentos');
        return $query->result();
    }
    
    function datPersonalesPersona($parametros){
        $this->db->select('*');
        $this->db->where('persona_tipo_doc_id',$parametros['tipoDocumento']);
        $this->db->where('persona_numero_id',$parametros['numeroDocumento']);
        $query = $this->db->get('personas');
        return $query->result();
    }
    
}