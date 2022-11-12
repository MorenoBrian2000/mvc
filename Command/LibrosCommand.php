<?php

class LibrosCommand
{

    public function commandInsertLibro($data)
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $objModel->data = $data;
        return $objModel->daoAddLibro();
    }

    public function commandUpdateLibro($data)
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $objModel->data = $data;
        return $objModel->daoUpdateLibro();
    }

    public function commandUpdateLibroApi($data)
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $objModel->data = $data;
        return $objModel->daoUpdateLibroApi();
    }

    public function commandDeleteLibro($id)
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $objModel->id = $id;
        return $objModel->daoDeleteLibro($id);
    }
}