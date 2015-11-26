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


    public function games($nick) {
        $nick = htmlspecialchars($nick);

        $sql = "SELECT 
                part1.Turno as TurnoJug1,
                part1.ID_Participacion as PartJug1,
                jug1.Nick as NomJug1,
                part2.ID_Participacion as PartJug2,
                jug2.Nick as NomJug2, 
                part1.ID_Partida as Partida,
                inter.ID_Participacion as InterJug, 
                cat.Nombre_Categoria as NomCat,
                inter.Acertada as PregAcertada

                FROM jugador as jug1
                    INNER JOIN participacion as part1
                        ON part1.ID_Jugador = jug1.ID_Jugador
                        
                    INNER JOIN participacion as part2
                        ON part1.ID_Partida = part2.ID_Partida AND part1.ID_Jugador != part2.ID_Jugador
                        
                    INNER JOIN jugador as jug2
                        ON part2.ID_Jugador = jug2.ID_Jugador

                    LEFT OUTER JOIN intervencion as inter
                        ON part1.ID_Participacion = inter.ID_Participacion OR part2.ID_Participacion = inter.ID_Participacion
                        
                    LEFT OUTER JOIN pregunta as preg
                        ON inter.ID_Pregunta = preg.ID_Pregunta
                        
                    LEFT OUTER JOIN categoria as cat
                        ON preg.ID_Categoria = cat.ID_Categoria
                        
                WHERE jug1.Nick = 'joan'
                ORDER BY Partida";  

        $result = mysql_query($sql, $this->conexion);

        $userGame = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $userGame[] = $row;
         }

        return $userGame;
    }
}