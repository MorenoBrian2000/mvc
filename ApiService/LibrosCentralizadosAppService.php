<?php

class LibrosCentralizadosAppService
{
    public $arrayLibros = [];
    public $uri = 'http://192.168.64.7/mvc/controller/libro.controller.php';

    public function getLibroCurl()
    {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'http://192.168.64.7/mvc/controller/libro.controller.php?id=null');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);
        $respuesta = json_decode($curl_data);
        foreach ($respuesta as $key => $libro) {
            array_push($this->arrayLibros, ['id_libro' => $libro->id_libro, 'nombre' => $libro->nombre, 'descripcion' => $libro->descripcion, 'tema' => $libro->tema]);
        }
        echo json_encode($this->arrayLibros);
    }

    public function addLibroCurl()
    {
        $fields = array(
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'tema' => $_POST['tema'],
            'action' => $_POST['addLibro']
        );
        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://192.168.64.7/mvc/controller/libro.controller.php?id=null');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        $data = curl_exec($ch);
        curl_close($ch);
    }

    public static function updateLibroCurl($data)
    {
        $fields = array(
            'action' => 'updateLibro',
            'edit_id' => $data->edit_id,
            'descripcion' => $data->descripcion,
            'nombre' => $data->nombre,
            'tema' => $data->tema
        );
        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://192.168.64.7/mvc/controller/libro.controller.php?id=null');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        $data = curl_exec($ch);
        curl_close($ch);
    }
}


switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $objAppService = new LibrosCentralizadosAppService();
        $objAppService->getLibroCurl();
        break;
    case 'POST':
        $objAppService = new LibrosCentralizadosAppService();
        echo $objAppService->addLibroCurl();
        break;
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        echo LibrosCentralizadosAppService::updateLibroCurl($datos);
        break;
    case 'DELETE':
        echo ControladorLibro::ctrEliminarLibro();
        break;
    default:
        echo json_encode(["Error" => "Accion no requerida"]);
        break;
}
