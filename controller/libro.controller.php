<?php

require '../appservice/librosappservice.php';

class ControladorLibro
{


    static public function ctrMostrarLibro()
    {
        $objAppService = new LibrosAppService();
        $id = ($_GET['id'] == 'null') ? null : $_GET['id'];
        $respuesta = $objAppService->getLibros($id);
        echo json_encode($respuesta);
    }

    static public function ctrAgregarLibro()
    {
        $objAppService = new LibrosAppService();
        $respuesta = $objAppService->insertLibro($_POST);
        return $respuesta;
    }

    static public function ctrActualizarLibro($data)
    {
        $objAppService = new LibrosAppService();
        $respuesta = $objAppService->updateLibro($data);
        return $respuesta;
    }

    static public function ctrActualizarLibroApi($data)
    {
        /*var_dump($data);*/
        $objAppService = new LibrosAppService();
        $respuesta = $objAppService->updateLibroApi($data);
        return $respuesta;
    }

    static public function ctrEliminarLibro()
    {
        $objAppService = new LibrosAppService();
        $respuesta = $objAppService->deleteLibro($_GET['id']);
        return $respuesta;
    }

    static public function getLibroCurl()
    {
        $objModel = new LibroDAO();
        $arr_libros = [];
        $objModel->tabla = "tbl_libros";
        $respuesta = $objModel->getLibroCurl($objModel->urlBrian);
        foreach ($respuesta as $key => $libro) {
            array_push($arr_libros, ['id_libro' => $libro->id_libro, 'nombre' => $libro->nombre, 'descripcion' => $libro->descripcion, 'tema' => $libro->tema]);
        }
        echo json_encode($arr_libros);
    }
}


switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        ControladorLibro::ctrMostrarLibro();
        /*ControladorLibro::getLibroCurl();*/
        break;
    case 'POST':
        //var_dump($_POST);
        if ($_POST['action'] == 'updateLibro') {
            $datos = [
                'edit_id' => $_POST['edit_id'],
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'tema' => $_POST['tema'],
            ];
//            var_dump($datos);
            echo ControladorLibro::ctrActualizarLibroApi($datos);
        } else {
            echo ControladorLibro::ctrAgregarLibro();

        }
        break;
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        echo ControladorLibro::ctrActualizarLibro($datos);
        var_dump($datos);
        break;
    case 'DELETE':
        echo ControladorLibro::ctrEliminarLibro();
        break;
    default:
        echo json_encode(["Error" => "Accion no requerida"]);
        break;
}
