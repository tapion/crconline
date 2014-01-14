<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelo_equipos
 *
 * @author juan.gomez
 */
class Modelo_Equipos extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

    public function startTrans() {
        $this->db->trans_start();
    }

    public function completeTrans() {
        $this->db->trans_complete();
    }
    
    public function insertEditMachine($parametros, $opcion = "") {
        
        try {
            
            $data = array('equipo_nombre'      => isset($parametros['txtNombre']) ? $parametros['txtNombre'] : NULL,
                          'equipo_descripcion' => isset($parametros['txtDescripcion']) ? $parametros['txtDescripcion'] : NULL,
                          'equipo_estado'      => isset($parametros['estado']) ? ucwords(strtolower($parametros['estado'])) : NULL
                          );
            if (isset($opcion) && !empty($opcion)) {
                //
                $this->db->where('equipo_id', $parametros['equipoId']);
                if(!$this->db->update('equipos', $data)){
                    throw new Exception('Error modificando Equipo!'); 
                }
                
            }else{
                if (!$this->db->insert('equipos', $data)){
                    throw new Exception('Error agregando nuevo Equipo!');
                }
            }
            
        } catch (Exception $exc) {
            return false;
        }
        
        return true;    
    }
    
    function allMachines($codEquipo=NULL) {
        $this->db->select('*');
        $this->db->from('equipos');
        if( !is_null($codEquipo) ){
            $this->db->where('equipos.equipo_id', $codEquipo);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
}
