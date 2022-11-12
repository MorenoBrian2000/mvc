<?php
require '../model/conexion.modelo.php';

class LibroDAO
{
    public $tabla;
    public $data;
    public $urlBrian = 'http://192.168.25.59/mvc/controller/libro.controller.php?id=null';

    public function __construct()
    {
        $this->tabla = "tbl_libros";
    }

    public function daoSelectLibro($id)
    {

        if (is_null($id)) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $this->tabla;");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $this->tabla WHERE id_libro = :id_libro;");
            $stmt->bindParam(":id_libro", $id, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[0];
        }
    }

    public function daoAddLibro()
    {
        $datos = $this->data;
        $stmt = Conexion::conectar()->prepare("INSERT INTO $this->tabla (nombre, descripcion, tema) 
            VALUES (:nombre, :descripcion, :tema);");
        $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":tema", $datos['tema'], PDO::PARAM_STR);
        $response = $stmt->execute();
        return json_encode(["response" =>  $response]);
    }

    public function daoUpdateLibroApi()
    {
        $datos = $this->data;
        /*var_dump($datos);*/
        $stmt = Conexion::conectar()->prepare("UPDATE $this->tabla SET nombre = :nombre, descripcion=:descripcion, tema = :tema WHERE  id_libro=:id_libro;");
        $stmt->bindParam(":id_libro", $datos['edit_id'], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":tema", $datos['tema'], PDO::PARAM_STR);
        $response = $stmt->execute();
        return json_encode(["response" =>  $response]);
    }

    public function  daoUpdateLibro()
    {
        $datos = $this->data;
        /*var_dump($datos);*/
        $stmt = Conexion::conectar()->prepare("UPDATE $this->tabla SET nombre = :nombre, descripcion=:descripcion, tema = :tema WHERE  id_libro=:id_libro;");
        $stmt->bindParam(":id_libro", $datos->edit_id, PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos->nombre, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos->descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":tema", $datos->tema, PDO::PARAM_STR);
        $response = $stmt->execute();
        return json_encode(["response" =>  $response]);
    }

    public static function daoDeleteLibro($id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM arquitectura.tbl_libros WHERE  id_libro=:id_libro;");
        $stmt->bindParam(":id_libro", $id, PDO::PARAM_INT);
        $results = ($stmt->execute())  ? "ok" : "error";
        return json_encode(["success" =>  $results]);
    }

    /*public static function getLibroCurl($urlBrian)
    {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $urlBrian);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);
        $response_data = json_decode($curl_data);
        return $response_data;
        // die();
    }*/
}
