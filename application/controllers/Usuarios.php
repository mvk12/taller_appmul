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
        $this->viewdata['usuarios'] = $this->UsuariosModel->select();

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

        $id = $this->UsuariosModel->insert($data);

        if( $id > 0 ) {
            echo 'Creado Exitosamente';
            redirect('Usuarios','refresh');
        }
        else {
            echo 'Error al crear usuario';
            redirect('Usuarios','refresh');
        }
    }

    public function editar($id = 0)
    {
        $id = (int) $id;
        if( $id <= 0 ) {
            echo 'Id inválido';
            return;
        }

        $users = $this->UsuariosModel->select_where($id);

        $this->viewdata['usuario'] = $users[0];

        $this->twig->display('Usuarios/editar', $this->viewdata);
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

        $rows = $this->UsuariosModel->update((int)$id, $data);

        if( $rows > 0 ) {
            redirect('Usuarios','refresh');
        }
        else {
            redirect('Usuarios','refresh');
        }
    }

    public function eliminar($id = 0)
    {
        redirect("Usuarios/delete/$id",'refresh');   
    }

    public function delete($id = 0)
    {
        if( $id <= 0 ) {
            echo 'Id inválido';
            return;
        }

        $rows = $this->UsuariosModel->delete($id);

        if( $rows > 0 ) {
            redirect('Usuarios','refresh');
        }
        else {
            redirect('Usuarios','refresh');
        }
    }
}

/* End of file Usuarios.php */
