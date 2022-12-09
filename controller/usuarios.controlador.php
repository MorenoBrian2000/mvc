<?php

require '../model/usuarios.modelo.php';
require '../dao/usuario.dao.php';

class ControladorUsuarios
{
    static public function ctrIngresoUsuario()
    {
        $tabla = "tbl_users";
        $username = $_POST["username_user"];
        $respuesta = ModeloUsuarios::mdlBuscarUsuario($tabla, $username);
        if (isset($respuesta["username_user"])) {
            $profile = ($respuesta['rol_user'] == 2) ? 'alumno' : 'administrador';
            if ($respuesta["username_user"] == $_POST["username_user"] && $respuesta["password_user"] == md5($_POST["password_user"])) {
                $_SESSION["iniciarSesion"] = "ok";
                $_SESSION["profile"] = $profile;
                $_SESSION["id"] = $respuesta["id_user"];
                $_SESSION["nombre"] = $respuesta["nombre_user"] . ' ' . $respuesta["apaterno_user"];
                $_SESSION["usuario"] = $respuesta["username_user"];
                $_SESSION["rol_user"] = $respuesta["rol_user"];
                echo json_encode(["response" => true]);
            } else {
                echo json_encode(["response" => false, "menssage" => "Datos Incorrectos"]);
            }
        } else {
            echo json_encode(["response" => false, "menssage" => "El usuario no existe"]);
        }
    }

    static public function ctrMostrarUsuarios()
    {
        $tabla = "tbl_usuario";
        $respuesta = ModeloUsuarios::mdlSelectUsuarios($tabla);
        echo $respuesta;
    }

    static public function ctrUpdateCredenciales()
    {
        $data = [
            "username_user" => $_POST["username_user"],
            "password_user" => $_POST["password_user"],
            "id_user" => $_POST["id_user"]
        ];
        $tabla = "tbl_usuario";
        $respuesta = ModeloUsuarios::mdlUpdateUsuario($tabla, $data);
        echo json_encode(["response" => $respuesta]);
    }

    static public function ValidateUser()
    {
        $res = [];
        $username = $_POST['username'];
        $dao = UsuarioDAO::getUserByName($username);
        if ($dao) {
            $res = ['result' => true];
        } else {
            $res = ['result' => false];
        }
        echo json_encode($res);
    }
}


switch ($_POST["action"]) {
    case 'loginUser':
        ControladorUsuarios::ctrIngresoUsuario();
        break;
    case 'updateCredenciales':
        ControladorUsuarios::ctrUpdateCredenciales();
        break;
    case 'ValidateUser':
        ControladorUsuarios::ValidateUser();
        break;
}
