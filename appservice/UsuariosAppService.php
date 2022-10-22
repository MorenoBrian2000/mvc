<?php

class UsuariosAppService extends AppService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios()
    {
        $this->db->select('id, nome, email');
        $this->db->from('usuarios');
        $this->db->order_by('nome', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
}


