<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of modelo_sedes
 *
 * @author juan.gomez
 */
class Modelo_Sedes extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

    public function startTrans() {
        $this->db->trans_start();
    }

    public function completeTrans() {
        $this->db->trans_complete();
    }
    
    function allSedes($codSede = NULL) {
        $this->db->select('*');
        $this->db->from('sedes');
        if( !is_null($codSede) ){
            $this->db->where('sedes.sede_id', $codSede);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insertEditSedes($parametros, $opcion = "") {
        
        try {
            
            $data = array(  'sede_nombre'                       => isset($parametros['txtNombre']) ? ucwords(strtolower($parametros['txtNombre'])) : NULL,
                            'sede_direccion'                    => isset($parametros['txtDireccion']) ? ucwords(strtolower($parametros['txtDireccion'])) : NULL,
                            'sede_telefono1'                    => isset($parametros['txtTelefono1']) ? ucwords(strtolower($parametros['txtTelefono1'])) : NULL,
                            'sede_telefono2'                    => isset($parametros['txtTelefono2']) ? ucwords(strtolower($parametros['txtTelefono2'])) : NULL,
                            'sede_cupos_onac'                   => isset($parametros['txtCupo']) ? ucwords(strtolower($parametros['txtCupo'])) : NULL,
                            'sede_resolucion_mintrasp'          => isset($parametros['txtResMinTrans']) ? ucwords(strtolower($parametros['txtResMinTrans'])) : NULL,
                            'sede_resolucion_ips'               => isset($parametros['txtResIps']) ? ucwords(strtolower($parametros['txtResIps'])) : NULL,
                            'sede_resolucion_facturacion'       => isset($parametros['txtResFact']) ? ucwords(strtolower($parametros['txtResFact'])) : NULL,
                            'sede_numeracion_autorizada_inicial'=> isset($parametros['txtNumIni']) ? ucwords(strtolower($parametros['txtNumIni'])) : NULL,
                            'sede_numeracion_autorizada_final'  => isset($parametros['txtNumFin']) ? ucwords(strtolower($parametros['txtNumFin'])) : NULL,
                            'sede_numero_inicial_armas'         => isset($parametros['txtNumIniArm']) ? ucwords(strtolower($parametros['txtNumIniArm'])) : NULL,
                            'sede_numero_final_armas'           => isset($parametros['txtNumFinArm']) ? ucwords(strtolower($parametros['txtNumFinArm'])) : NULL,
                            'sede_numero_actual_armas'          => isset($parametros['txtNumActArm']) ? ucwords(strtolower($parametros['txtNumActArm'])) : NULL,
                            'sede_prefijo'                      => isset($parametros['txtPrefijo']) ? strtolower($parametros['txtPrefijo']) : NULL,
                            'sede_tipo_audiometrico'            => isset($parametros['equipoAud']) ? $parametros['equipoAud'] : NULL,
                            'sede_tipo_sicomotriz'              => isset($parametros['equipoSico']) ? $parametros['equipoSico'] : NULL,
                            'sede_optometria'                   => isset($parametros['equipoOpt']) ? $parametros['equipoOpt'] : NULL,
                            'sede_estado'                       => isset($parametros['estado']) ? $parametros['estado'] : NULL,
                            'sede_empresa_id'                   => isset($parametros['empresaSede']) ? $parametros['empresaSede'] : NULL,
                            'sede_usuario_id_edito'             => isset($parametros['idUsuario']) ? $parametros['idUsuario'] : NULL
                          );
            if (isset($opcion) && !empty($opcion)) {
                //
                $this->db->where('sede_id', $parametros['sedeId']);
                if(!$this->db->update('sedes', $data)){
                    throw new Exception('Error modificando Sede!'); 
                }
                
            }else{
                if (!$this->db->insert('sedes', $data)){
                    throw new Exception('Error agregando nueva Sede!');
                }
            }
            
        } catch (Exception $exc) {
            return false;
        }
        
        return true;    
    }
    
}
