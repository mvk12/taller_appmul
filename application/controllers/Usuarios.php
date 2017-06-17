<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    private $viewdata = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsuariosModel');
    }

    public function index()
    {
        $this->viewdata['usuarios'] = $this->usuariosmodel->select();

        $this->twig->display('Usuarios/index', $this->viewdata);
    }

    public function nuevo()
    {
        $this->twig->display('Usuarios/nuevo', $this->viewdata);
    }

    public function create()
    {
        $nombres = $this->input->post('nombres');
        $apellidos = $this->input->post('apellidos');
        $correo = $this->input->post('correo');
        $usr = $this->input->post('usr');
        $pass = $this->input->post('pass');

        $data = array(
            'Nombres' => $nombres,
            'Apellidos' => $apellidos,
            'Correo' => $correo,
            'UserName' => $usr,
            'Contrasenia' => $pass,
        );

        $id = $this->usuariosmodel->insert($data);

        if( $id > 0 ) {
            echo 'Creado Exitosamente';
        }
        else {
            echo 'Error al crear usuario';
        }
    }

    public function editar($id = 0)
    {
        if( $id <= 0 ) {
            echo 'Id inválido';
            return;
        }

        $users = $this->usuariosmodel->select_where($id);

        $this->viewdata['user'] = $users[0];

        $this->twig->display('Users/editar', $this->viewdata);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nombres = $this->input->post('nombres');
        $apellidos = $this->input->post('apellidos');
        $correo = $this->input->post('correo');
        $usr = $this->input->post('usr');
        $pass = $this->input->post('pass');

        $data = array(
            'Nombres' => $nombres,
            'Apellidos' => $apellidos,
            'Correo' => $correo,
            'UserName' => $usr,
        );

        if( $pass != '' ) {
            $data['Contrasenia'] = $pass;
        }

        $rows = $this->usuariosmodel->update($data);

        if( $rows > 0 ) {
            echo 'Actualizado Exitosamente';
        }
        else {
            echo 'Error al actualizar usuario';
        }
    }

    public function delete($id = 0)
    {
        if( $id <= 0 ) {
            echo 'Id inválido';
            return;
        }

        $rows = $this->usuariosmodel->delete($id);

        if( $rows > 0 ) {
            echo 'Eliminado Exitosamente';
        }
        else {
            echo 'Error al eliminar usuario';
        }
    }
}

/* End of file Usuarios.php */
