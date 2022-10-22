<?php

class UsuarioCommand
{
    public function daoInsertUsuario($data)
    {
        $objModel = new UsuarioDAO();
        $objModel->tabla = "tbl_usuarios";
        return $objModel->daoInsertUsuario($data);
    }
}