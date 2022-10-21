<?php

require '../model/libro.model.php';
require '../dao/libro.dao.php';

class ControladorLibro
{


    static public function ctrMostrarLibro()
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $id = ($_GET['id'] == 'null') ? null : $_GET['id'];
        $respuesta = $objModel->daoSelectLibro($id);
        echo json_encode($respuesta);
    }

    static public function ctrAgregarLibro()
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $respuesta = $objModel->daoAddLibro($_POST);
        echo $respuesta;
    }

    static public function ctrActulizarLibro($data)
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $respuesta = $objModel->daoActulizarLibro($data);
        echo $respuesta;
    }

    static public function ctrEliminarLibro()
    {
        $objModel = new LibroDAO();
        $objModel->tabla = "tbl_libros";
        $respuesta = $objModel->daoEliminarLibro($_GET["id"]);
        echo $respuesta;
    }

    static public function getLibroCurl()
    {
        $objModel = new LibroDAO();
        $arr_libros = [];
        $objModel->tabla = "tbl_libros";
        $respuesta = $objModel->getLibroCurl($objModel->urlBrian);
        foreach ($respuesta as $key => $libro) {
            array_push($arr_libros,['id_libro' => $libro->id_libro, 'nombre' => $libro -> nombre, 'descripcion' => $libro -> descripcion, 'tema' => $libro ->tema]);
        }
        echo json_encode($arr_libros);
    }
}


switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        // ControladorLibro::ctrMostrarLibro();
        ControladorLibro::getLibroCurl();
        break;
    case 'POST':
        ControladorLibro::ctrAgregarLibro();
        break;
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        ControladorLibro::ctrActulizarLibro($datos);
        break;
    case 'DELETE':
        ControladorLibro::ctrEliminarLibro();
        break;
    default:
        echo json_encode(["Error" => "Accion no requerida"]);
        break;
}
