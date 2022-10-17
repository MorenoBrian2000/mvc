<?php

require '../model/libro.model.php';
require '../dao/libro.dao.php';

class ControladorLibro
{


    static public function ctrMostrarLibro()
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $respuesta = $objModel->daoSelectLibro();
        echo json_encode($respuesta);
    }

    static public function ctrAgregarLibro()
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $respuesta = $objModel->daoAddLibro($_POST);
        echo $respuesta;
    }
}


switch ($_POST["action"]) {
    case 'getLibros':
        ControladorLibro::ctrMostrarLibro();
        break;
    case 'addLibro':
        ControladorLibro::ctrAgregarLibro();
        break;
}
