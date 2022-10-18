<?php
require_once '../model/conexion.modelo.php';

class LibroDAO
{
    public $tabla;
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


    public static function daoEliminarLibro($id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM arquitectura.tbl_libros WHERE  id_libro=:id_libro;");
        $stmt->bindParam(":id_libro", $id, PDO::PARAM_INT);
        $results = ($stmt->execute())  ? "ok" : "error";
        echo json_encode(["success" =>  $results]);
    }


    public static function daoActulizarLibro($datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE arquitectura.tbl_libros SET nombre=:nombre, descripcion=:descripcion, tema=:tema WHERE  id_libro=:id_libro");
        $stmt->bindParam(":id_libro", $datos->edit_id, PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos->nombre, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos->descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":tema", $datos->tema, PDO::PARAM_STR);
        $response = ($stmt->execute()) ? 'ok' : 'error';
        echo json_encode(["success" =>  $response]);
    }
}
