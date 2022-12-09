<?php
class Conexion
{

    static public function conectar()
    {

        $link = new PDO(
            "mysql:host=localhost;dbname=arquitectura;port",
            "root",
            "",

            /*"mysql:host=localhost;dbname=db_sac", "db_sac", "Hola123*", */
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );

        $link->exec("set names utf8");

        return $link;
    }
}
