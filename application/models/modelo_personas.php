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
        $this->load->library('funciones');
    }

    function tiposDocumento() {
        $this->db->select('*');
        $query = $this->db->get('tipos_documentos');
        return $query->result();
    }

    function datPersonalesPersona($parametros) {
        $this->db->select('*');
        $this->db->where('persona_tipo_doc_id', $parametros['tipoDocumento']);
        $this->db->where('persona_numero_id', $parametros['numeroDocumento']);
        $query = $this->db->get('personas');
        return $query->result();
    }

    function insertEditPersona($parametros, $opcion = "") {
        $data = array('persona_tipo_doc_id' => isset($parametros['tipoDocumento']) ? $parametros['tipoDocumento'] : NULL,
            'persona_numero_id' => isset($parametros['numeroDocumento']) ? $parametros['numeroDocumento'] : NULL,
            'persona_nombres' => isset($parametros['txtnombre']) ? ucwords(strtolower($parametros['txtnombre'])) : NULL,
            'persona_apellidos' => isset($parametros['txtapellido']) ? ucwords(strtolower($parametros['txtapellido'])) : NULL,
            'persona_lugar_expedicion_numero_id' => isset($parametros['lugarexpedicion']) ? $parametros['lugarexpedicion'] : NULL,
            'persona_estado_civil' => isset($parametros['estadocivil']) ? $parametros['estadocivil'] : NULL,
            'persona_genero' => isset($parametros['genero']) ? $parametros['genero'] : FALSE,
            'persona_fecha_nacimiento' => isset($parametros['txtfechanacimiento']) ? $parametros['txtfechanacimiento'] : NULL,
            'persona_lugar_nacimiento' => isset($parametros['lugarnacimiento']) ? $parametros['lugarnacimiento'] : NULL,
            'persona_edad' => isset($parametros['txtfechanacimiento']) ? $this->funciones->calcularEdad($parametros['txtfechanacimiento']) : NULL,
            'persona_telefono' => isset($parametros['txttelefono']) ? $parametros['txttelefono'] : NULL,
            'persona_direccion' => isset($parametros['txtdireccion']) ? ucwords(strtolower($parametros['txtdireccion'])) : NULL,
            'persona_regimen' => isset($parametros['regimen']) ? $parametros['regimen'] : NULL,
            'persona_email' => isset($parametros['txtemail']) ? ucwords(strtolower($parametros['txtemail'])) : NULL
        );

        if (isset($opcion) && !empty($opcion)) {
            $this->db->where('persona_tipo_doc_id', $parametros['tipoDocumento']);
            $this->db->where('persona_numero_id', $parametros['numeroDocumento']);
            $this->db->update('personas', $data);
        } else {
            $this->db->insert('personas', $data);
        }

        return TRUE;
    }

}