<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function index()
    {
        $obj = new stdClass();
        $obj->prop1 = 1;
        $obj->prop2 = 'Lectura';

        $array = array(
            'numero' => 1,
            'cadena' => 'Aliquam nam perspiciatis quibusdam adipisci eaque ipsum placeat.',
            'flotante' => 122.55,
            'arr' => array(
                'dato1' => 'Esto',
                'dato2' => 'es',
                'dato3' => 'una',
                'dato4' => 'prueba',
            ),
            'objeto' => $obj,
        );
        $this->load->view('inicio', $array);
    }

    public function uso_twig()
    {
        $obj = new stdClass();
        $obj->prop1 = 1;
        $obj->prop2 = 'Lectura';

        $array = array(
            'numero' => 1,
            'cadena' => 'Aliquam nam perspiciatis quibusdam adipisci eaque ipsum.',
            'flotante' => 122.55,
            'arr' => array(
                'dato1' => 'Esto',
                'dato2' => 'es',
                'dato3' => 'una',
                'dato4' => 'prueba',
            ),
            'objeto' => $obj,
        );
        $this->twig->display('uso_twig', $array);
    }
}
/* End of file Inicio.php */
