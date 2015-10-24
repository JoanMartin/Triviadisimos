<?php

class Model
{
    protected $conexion;

    public function __construct($dbname,$dbuser,$dbpass,$dbhost)
    {
        $mvc_bd_conexion = mysql_connect($dbhost, $dbuser, $dbpass);

        if (!$mvc_bd_conexion) {
            die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
        }
        mysql_select_db($dbname, $mvc_bd_conexion);

        mysql_set_charset('utf8');

        $this->conexion = $mvc_bd_conexion;
    }



    public function bd_conexion()
    {

    }
}