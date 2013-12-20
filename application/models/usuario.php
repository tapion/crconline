<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model {

	protected $table;
	protected $id;

	/*
         * Constructor del modelo, aqui establecemos que tabla utilizamos y cual es su llave primaria.
         */
	public function __construct() {
            parent::__construct();
            $this->table = 'usuarios';
            $this->id = 'usuario_id';
	}

	
        /*
         * Consulta si existe un usuario
         * @param string $login Login del usuario
         * @param string $password Contraseña
         */
	public function autenticar( $login='', $password='' ) {
            if( !empty($login) && !empty($password)){                
                $this->db->select('*');
                $this->db->from('usuarios');
                $this->db->where('usuario_login', $login);
                $this->db->where('usuario_password', md5($password) );
                $this->db->where('usuario_estado', 'TRUE');
                $query = $this->db->get();
                return $query->result();
            }else{
                return false;
            }

	}

}