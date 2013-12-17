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

	
	public function autenticar( $login='', $password='' ) {
            if( $login == 'admin' && $password == 'admin'){
                return true;
            }else{
                return false;
            }
            
            /*return $this->db->get_where(
			$this->table, array(
				'username' => $usuarioDto->getLogin(),
				'password' => $usuarioDto->getPassword()
			)
		)->row();*/
	}

}