<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Private_Controller {
    
  
    public function index() {
        // Si no esta logueado lo redirigmos al formulario de login.
        if(!@$this->user){ 
            redirect ('welcome/login'); 
        }
        
        $datos = array( 'listaMenu' => array('Administracion' => array( 'Usuarios' => 'usuario/index', 'Servicio' => 'administracion/adminServicio/index' , 'Personas' => 'url', 'Empresas' => 'administracion/empresas/', 'Funcionalidades' => 'funcionalidad/index' ),
                                             'Examenes' => array( 'Optometria' => 'url', 'Audiometria' => 'url', 'Medico' => 'url', 'dividir' => 'dividir' ,'Reportes' => array('Pagos' => 'url', 'Usuarios' => 'url'))
                                            )
                      );    

        $this->load->view('principal',$datos);
    }

    public function login() {

        $data = array();

        // A�adimos las reglas necesarias.
        $this->form_validation->set_rules('txtUsuario', 'Usuario', 'required');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required');

        // Generamos el mensaje de error personalizado para la accion 'required'
        $this->form_validation->set_message('required', 'El campo %s es requerido.');

        // Si no esta vacio $_POST
        if(!empty($_POST)) {

                // Si las reglas se cumplen, entramos a la condicion.
                if ($this->form_validation->run() == TRUE) {
                        
                    // Obtenemos la informacion del usuario desde el modelo usuario.
                    $logged_user = $this->usuario->autenticar($_POST['txtUsuario'],$_POST['txtPassword']);

                    // Si existe el usuario creamos la sesion y redirigimos al index.
                    if($logged_user) {
                            $this->session->set_userdata('logged_user', $logged_user);
                            redirect('welcome/index');
                    } else {
                            // De lo contrario se activa el error_login.
                            $data['error_login'] = TRUE;
                    }
                }
        }

        $this->load->view('login', $data);
    }

    public function logout() {
        $this->session->unset_userdata('logged_user');
        redirect('welcome/index');
    }
}
