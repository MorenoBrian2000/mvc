<?php

require '../dao/libro.dao.php';
require '../Command/LibrosCommand.php';

class LibrosAppService
{
    public function getLibros($id)
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        return $objModel->daoSelectLibro($id);
    }

    public function insertLibro($data)
    {
        $objModel = new LibrosCommand();
        return $objModel->commandInsertLibro($data);
    }

    public function updateLibro($data)
    {
        $objModel = new LibrosCommand();
        return $objModel->commandUpdateLibro($data);
    }

    public function updateLibroApi($data)
    {
        $objModel = new LibrosCommand();
        return $objModel->commandUpdateLibroApi($data);
    }

    public function deleteLibro($id)
    {
        $objModel = new LibrosCommand();
        return $objModel->commandDeleteLibro($id);
    }

}