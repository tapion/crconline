<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class Funciones {

    function __construct() {
        $this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería
    }

    # recibe formato  formato YYYY-mm-dd y devuelve la edad
    function calcularEdad($fecha) {
        list($Y, $m, $d) = explode("-", $fecha);
        return( date("md") < $m . $d ? date("Y") - $Y - 1 : date("Y") - $Y );
    }

}