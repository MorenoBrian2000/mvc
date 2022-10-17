<?php
require_once '../model/conexion.modelo.php';

class LibroDAO
{
    public $tabla;
    public function daoSelectLibro()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $this->tabla;");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function daoAddLibro($datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $this->tabla (nombre, descripcion, tema) 
            VALUES (:nombre, :descripcion, :tema);");
        $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":tema", $datos['tema'], PDO::PARAM_STR);
        $response = ($stmt->execute()) ? true : false;
        echo json_encode(["response" =>  $response]);
    }
}
