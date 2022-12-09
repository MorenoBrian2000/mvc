<?php

require '../appservice/librosappservice.php';

class LibroController
{

    public static function getLibroApi()
    {
        $objAppService = new LibrosAppService();
        $id = ($_GET['universidad_libro_id'] == 'null') ? null : $_GET['universidad_libro_id'];
        $respuesta = $objAppService->getLibros($id);
        echo $respuesta['libro'];
    }
}

if (isset($_GET['universidad_libro_id'])) {
    LibroController::getLibroApi();
}