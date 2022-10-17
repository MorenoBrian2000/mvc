<?php
require_once '../model/conexion.modelo.php';

class UsuarioDAO
{
    static public function getUserByName($username)
    {
        $stmt = Conexion::conectar()->prepare('SELECT * FROM tbl_users WHERE username_user = :username_user');
        $stmt->bindParam(":username_user", $username, PDO::PARAM_STR);
        $stmt->execute();
        $response =  $stmt->fetch();
        return $response;
    }
}
