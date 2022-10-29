<?php

class LibrosCentralizadosAppService{
    public $arrayLibros;
    public $uri = 'http://192.168.119.59/mvc/controller/libro.controller.php?id=null';

    public function getLibroCurl()
    {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $this->uri);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);
        /*var_dump($curl_data);*/
        $respuesta = json_decode($curl_data);
        /*echo $response_data;*/
        foreach ($respuesta as $key => $libro) {
            array_push($this->arrayLibros,['id_libro' => $libro->id_libro, 'nombre' => $libro -> nombre, 'descripcion' => $libro -> descripcion, 'tema' => $libro ->tema]);
        }
        echo json_encode($this->arrayLibros);
    }

}

$objAppService = new LibrosCentralizadosAppService();
$objAppService->getLibroCurl();
