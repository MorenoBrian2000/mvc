<?php

class LibrosCentralizados
{
    public function getToken()
    {
        $data = json_encode(array('usuario' => '19002561', 'contrasena' => '19002561'));
        $url = "http://192.168.1.85:3000/api/token";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'accept: */*',
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        curl_close($curl);

        return $resp;
    }

    public function searchLibro($filter)
    {
        $data = json_encode(array('filtro' => $filter));
        $url = "http://192.168.1.85:3000/api/buscar-libro";
        $token = str_replace('"', '', $this->getToken());

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'accept: *',
            "Authorization: Bearer $token"
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        curl_close($curl);

        return $resp;

    }


    public function registrarLibro($id, $name, $theme)
    {
        $data = json_encode(array(
            'libro_id' => $id,
            'libro_nombre' => $name,
            'tema' => $theme
        ));

        $url = "http://192.168.1.85:3000/api/registrar-libro";
        $token = str_replace('"', '', $this->getToken());

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'accept: *',
            "Authorization: Bearer $token"
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        curl_close($curl);

        return $resp;

    }



    public function getLibroDatos()
    {
        $data = json_encode(array('universidad_id' => $_POST['idUniversidad'], 'universidad_libro_id' => $_POST['idLibro']));

        $url = "http://192.168.1.85:3000/api/recuperar-libro";
        $token = str_replace('"', '', $this->getToken());

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'accept: *',
            "Authorization: Bearer $token"
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        curl_close($curl);

        return $resp;

    }

}


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'searchLibro') {
        $objAppService = new LibrosCentralizados();
        $response = $objAppService->searchLibro($_POST['filter']);
        echo $response;
    } else if ($_POST['action'] == 'get_book') {
        $objAppService = new LibrosCentralizados();
        $response = $objAppService->getLibroDatos();
        echo $response;
    } else if ($_POST['action'] == 'add_book') {
        $objAppService = new LibrosCentralizados();
        $response = $objAppService->registrarLibro($_POST['id'], $_POST['nombre'], $_POST['tema']);
        echo $response;
    }
}
