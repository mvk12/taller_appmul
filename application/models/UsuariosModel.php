<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model 
{
    private $tabla = 'Usuarios';
    private $primaryKey = 'idUsuarios';

    public function select()
    {
        return $this->db
            ->select('*')
            ->from($this->tabla)
            ->get()->result();
    }

    public function select_where($id)
    {
        $id = (int) $id;
        
        return $this->db
            ->select('*')
            ->from($this->tabla)
            ->where($this->primaryKey, $id)
            ->get()->result();
    }

    public function insert($data)
    {
        # Encriptando. Uso de MD5 para propósito educativo.
        # No usar esta función de hash en proyectos de producción
        if( isset($data['Contrasenia']) ) {
            $data['Contrasenia'] = md5($data['Contrasenia']);
        }

        $b = $this->db->insert($this->tabla, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        # Encriptando. Uso de MD5 para propósito educativo.
        # No usar esta función de hash en proyectos de producción
        if( isset($data['Contrasenia']) ) {
            $data['Contrasenia'] = md5($data['Contrasenia']);
        }

        $b = $this->db
            ->where($this->primaryKey, $id)
            ->update($this->tabla, $data);

        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $b = $this->db
            ->where($this->primaryKey, $id)
            ->delete($this->tabla);
        
        return $this->db->affected_rows();
    }
}

/* End of file UsuariosModel.php */
