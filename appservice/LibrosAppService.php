<?php

require '../dao/libro.dao.php';
require '../Command/LibrosCommand.php';
require '../ApiService/LibrosCentralizados.php';


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
        #Llamar clase libros centradlizados con los mismos valores
        $objAppService = new LibrosCentralizados();
        $objAppService->registrarLibro($data->edit_id, $data->nombre, $data->tema);
        $response = $objModel->commandUpdateLibro($data);
        return $response;
    }

    public function updateLibroApi($data)
    {
        $objModel = new LibrosCommand();
        $respuesta = $objModel->commandUpdateLibroApi($data);
        return $respuesta;
    }

    public function deleteLibro($id)
    {
        $objModel = new LibrosCommand();
        return $objModel->commandDeleteLibro($id);
    }

}