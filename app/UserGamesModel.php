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
                jug1.URL_ImagenJugador as ImagenJug1,
                part2.ID_Participacion as PartJug2,
                jug2.Nick as NomJug2, 
                jug2.URL_ImagenJugador as ImagenJug2,
                part1.ID_Partida as Partida,
                inter.ID_Participacion as InterJug, 
                cat.Nombre_Categoria as NomCat,
                inter.Acertada as PregAcertada,
                mundo.URL_ImagenMundo as ImagenMundo

                FROM jugador as jug1
                    INNER JOIN participacion as part1
                        ON part1.ID_Jugador = jug1.ID_Jugador
    
                    INNER JOIN partida
                        ON part1.ID_Partida = partida.ID_Partida
                    
                    INNER JOIN mundo
                        ON partida.ID_Mundo = mundo.ID_Mundo
                        
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
                        
                WHERE jug1.Nick ='".$nick."'
                ORDER BY Partida";  

        $result = mysql_query($sql, $this->conexion);

        $userGame = array();
        while ($row = mysql_fetch_assoc($result)) {
            $userGame[] = $row;
        }

        return $userGame;
    }


    public function getGame ($game, $nick) {
        $nick = htmlspecialchars($nick);
        $game = htmlspecialchars($game);

        $sql = "SELECT 
                Nombre_Categoria as categoria,
                Acertada as PregAcertada,
                Nick as nick

                FROM partida
                    INNER JOIN participacion
                    ON partida.ID_Partida = participacion.ID_Partida
                    
                    INNER JOIN jugador
                    ON participacion.ID_Jugador = jugador.ID_Jugador
                    
                    INNER JOIN intervencion
                    ON participacion.ID_Participacion = intervencion.ID_Participacion
                    
                    INNER JOIN pregunta
                    ON intervencion.ID_Pregunta = pregunta.ID_Pregunta
                    
                    INNER JOIN categoria
                    ON pregunta.ID_Categoria = categoria.ID_Categoria

                WHERE partida.ID_Partida = '".$game."' AND Nick = '".$nick."'";  

        $result = mysql_query($sql, $this->conexion);

        $userGame = array();
        while ($row = mysql_fetch_assoc($result)) {
            $userGame[] = $row;
        }

        return $userGame;
    }


    public function getQuestion ($category) {
        $category = htmlspecialchars($category);

        $sql = "SELECT pregunta.ID_Pregunta as id FROM categoria
                INNER JOIN pregunta
                ON categoria.ID_Categoria = pregunta.ID_Categoria
            WHERE categoria.Nombre_Categoria='".$category."'";

        $r = mysql_query($sql, $this->conexion);
        $question_id = array();
        while ($obj = mysql_fetch_object($r)) {
            $question_id[] = array('id' => $obj->id);
        }

        $rand = rand(0, (mysql_num_rows($r) - 1));
        $rand_id = $question_id[$rand]['id'];

        $sql = "SELECT 
                pregunta.Text_Pregunta as preg,
                respuesta.Texto_Respuesta as resp,
                respuesta.Correcta as correct

                FROM categoria
                    INNER JOIN pregunta
                    ON categoria.ID_Categoria = pregunta.ID_Categoria
                    
                    INNER JOIN respuesta
                    ON pregunta.ID_Pregunta = respuesta.ID_Pregunta
                WHERE categoria.Nombre_Categoria='".$category."' AND pregunta.ID_Pregunta ='".$rand_id."'
                ORDER BY rand()";

        $result = mysql_query($sql, $this->conexion); 

        $question = array();
        while ($obj = mysql_fetch_object($result)) {
            $question[] = array('id_question' => $rand_id,
                                'preg' => $obj->preg,
                                'resp' => $obj->resp,
                                'correcta' => $obj->correct,);
        }

        return $question;
    }


    public function invertTurn ($game, $nick) {
        $nick = htmlspecialchars($nick);
        $game = htmlspecialchars($game);

        $sql = "UPDATE participacion SET Turno=1 WHERE ID_Partida='".$game."' AND Turno=0";
        $result = mysql_query($sql, $this->conexion);

        $sql = "SELECT ID_Jugador FROM jugador WHERE Nick='".$nick."'";
        $result = mysql_query($sql, $this->conexion);
        $row = mysql_fetch_array($result);
        $id_nick = $row[0];

        $sql = "UPDATE participacion SET Turno=0 WHERE ID_Partida='".$game."' AND ID_Jugador='".$id_nick."'";
        $result = mysql_query($sql, $this->conexion);        
    }


    public function insertIntervention ($game, $nick, $correct, $id_question) {
        $nick = htmlspecialchars($nick);
        $game = htmlspecialchars($game);
        $correct = htmlspecialchars($correct);
        $id_question = htmlspecialchars($id_question);

        $sql = "SELECT 
                    participacion.ID_Participacion as participacion

                    FROM partida
                        INNER JOIN participacion
                        ON partida.ID_Partida = participacion.ID_Partida
                        
                        INNER JOIN jugador
                        ON participacion.ID_Jugador = jugador.ID_Jugador

                    WHERE partida.ID_Partida = '".$game."' AND Nick = '".$nick."'"; 


        $result = mysql_query($sql, $this->conexion);
        $row = mysql_fetch_array($result);
        $id_participacion = $row[0];

        $sql = "INSERT INTO intervencion (Acertada, ID_Participacion, ID_Pregunta) VALUES 
                ('".$correct."', '".$id_participacion."', '".$id_question."')";
        $result = mysql_query($sql, $this->conexion);        
    }
}