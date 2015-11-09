<?php

class UserGamesModel {
    protected $conexion;

    public function __construct($dbname,$dbuser,$dbpass,$dbhost) {
        $mvc_bd_conexion = mysql_connect($dbhost, $dbuser, $dbpass);

        if (!$mvc_bd_conexion) {
            die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
        }
        mysql_select_db($dbname, $mvc_bd_conexion);

        mysql_set_charset('utf8');

        $this->conexion = $mvc_bd_conexion;
    }



    public function myGames($nick) {
        $nick = htmlspecialchars($nick);

        $sql = "SELECT `ID_Partida`, `Nick` FROM `bdtrivialisimos`.`jugador` 
                    INNER JOIN `bdtrivialisimos`.`participacion` 
                    ON `jugador`.`Id_Jugador` = `participacion`.`Id_Jugador`
                WHERE `Nick`='".$nick."' AND `Turno`=1";  
        $result = mysql_query($sql, $this->conexion);

        $userGame = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $userGame[] = $row;
         }

        return $userGame;
    }




    public function opponentGames($nick) {
        $nick = htmlspecialchars($nick);

        $sql = "SELECT `ID_Partida`, `Nick` FROM `bdtrivialisimos`.`jugador` 
                    INNER JOIN `bdtrivialisimos`.`participacion` 
                    ON `jugador`.`Id_Jugador` = `participacion`.`Id_Jugador`
                WHERE `Nick`='".$nick."' AND `Turno`=0";  
        $result = mysql_query($sql, $this->conexion);

        $userGame = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $userGame[] = $row;
         }

        return $userGame;
    }
}