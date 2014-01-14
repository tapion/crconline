<?php

/**
 * Description of usuario
 *
 * @author Jerson Gomez
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelo_Ciudades extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function startTrans() {
        $this->db->trans_start();
    }

    public function completeTrans() {
        $this->db->trans_complete();
    }

    function allCiudades() {
        $this->db->where('ciudad_estado', 'TRUE');
        $query = $this->db->get("ciudades");
        return $query->result();
    }

}
