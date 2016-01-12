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


    public function createGame ($nick, $world) {
        $nick = htmlspecialchars($nick);
        $world = htmlspecialchars($world);

        $sql = "SELECT ID_Nivel, ID_Jugador FROM jugador
                WHERE Nick = '".$nick."'"; 
        $result = mysql_query($sql, $this->conexion);
        $row = mysql_fetch_array($result);
        $id_level = $row[0];
        $id_user = $row[1];

        $sql = "SELECT ID_Mundo FROM mundo WHERE Nombre_Mundo = '".$world."'"; 
        $result = mysql_query($sql, $this->conexion);
        $row = mysql_fetch_array($result);
        $id_world = $row[0];

        $sql = "SELECT partida.ID_Partida FROM partida 
                    INNER JOIN participacion
                    ON partida.ID_Partida = participacion.ID_Partida
                    
                    INNER JOIN jugador
                    ON participacion.ID_Jugador = jugador.ID_Jugador

                WHERE partida.Estado_Partida = 'En espera' AND 
                jugador.ID_Nivel = '".$id_level."' AND 
                partida.ID_Mundo = '".$id_world."' AND
                participacion.ID_Jugador != '".$id_user."'
                ORDER BY partida.ID_Partida";  

        $result = mysql_query($sql, $this->conexion);
        if (mysql_num_rows($result) > 0) {
            $row = mysql_fetch_array($result);
            $id_game = $row[0];

            $sql = "INSERT INTO participacion VALUES 
                    (NULL, '".$id_user."', '".$id_game."', 0)";
            $result = mysql_query($sql, $this->conexion); 

            $sql = "UPDATE partida SET Estado_Partida = 'Iniciada', Fecha_Inicio = now() WHERE ID_Partida = '".$id_game."'";
            $result = mysql_query($sql, $this->conexion);
        } else {
            $sql = "INSERT INTO partida VALUES 
                    (NULL, NULL, NULL, 'En espera', '".$id_world."')";
            $result = mysql_query($sql, $this->conexion); 
            $id_game = mysql_insert_id();

            $sql = "INSERT INTO participacion VALUES 
                    (NULL, '".$id_user."', '".$id_game."', 1)";
            $result = mysql_query($sql, $this->conexion); 
        }
    }


    public function getLevel ($nick) {
        $nick = htmlspecialchars($nick);

        $sql = "SELECT Tipo_Nivel as nivel, URL_Imagen as img FROM jugador
                    INNER JOIN nivel
                    ON jugador.ID_Nivel = nivel.ID_Nivel
                WHERE Nick = '".$nick."'";  

        $result = mysql_query($sql, $this->conexion);
        
        return mysql_fetch_assoc($result);
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
                mundo.URL_ImagenMundo as ImagenMundo,
                inter.Acertada as PregAcertada

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
                        
                WHERE jug1.Nick ='".$nick."' AND partida.Estado_Partida = 'Iniciada'
                ORDER BY Partida";  

        $result = mysql_query($sql, $this->conexion);

        $userGame = array();
        while ($row = mysql_fetch_assoc($result)) {
            $userGame[] = $row;
        }

        return $userGame;
    }


    public function finishedGames($nick) {
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
                mundo.URL_ImagenMundo as ImagenMundo,
                inter.Acertada as PregAcertada

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
                        
                WHERE jug1.Nick ='".$nick."' AND partida.Estado_Partida = 'Finalizada'
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

        $sql = "SELECT 1 FROM partida WHERE ID_Partida = '".$game."' AND Estado_Partida = 'Finalizada'";
        $result = mysql_query($sql, $this->conexion);
        if (mysql_num_rows($result) > 0) {
            return 'GameFinished';
        }

        $sql = "SELECT 1 FROM partida 
                    INNER JOIN participacion 
                    ON participacion.ID_Partida = partida.ID_Partida 
                    
                    INNER JOIN jugador
                    ON jugador.ID_Jugador = participacion.ID_Jugador
                WHERE partida.ID_Partida = '".$game."' AND jugador.Nick = '".$nick."' AND participacion.Turno = 1";
        $result = mysql_query($sql, $this->conexion);
        if (mysql_num_rows($result) == 0) {
            return 'NotYourTurn';
        }

        $sql = "SELECT 
                Nombre_Categoria as categoria,
                Acertada as PregAcertada

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


    public function getWorld ($game) {
        $game = htmlspecialchars($game);

        $sql = "SELECT Nombre_Mundo as nombreMundo FROM partida 
                    INNER JOIN mundo
                    ON partida.ID_Mundo = mundo.ID_Mundo
                WHERE partida.ID_Partida = '".$game."'";

        $result = mysql_query($sql, $this->conexion);
        
        return mysql_fetch_assoc($result);
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

        $sql = "UPDATE participacion SET Turno = 1 WHERE ID_Partida='".$game."' AND Turno=0";
        $result = mysql_query($sql, $this->conexion);

        $sql = "SELECT ID_Jugador FROM jugador WHERE Nick='".$nick."'";
        $result = mysql_query($sql, $this->conexion);
        $row = mysql_fetch_array($result);
        $id_nick = $row[0];

        $sql = "UPDATE participacion SET Turno = 0 WHERE ID_Partida='".$game."' AND ID_Jugador='".$id_nick."'";
        $result = mysql_query($sql, $this->conexion);        
    }


    public function insertIntervention ($game, $nick, $correct, $id_question) {
        $nick = htmlspecialchars($nick);
        $game = htmlspecialchars($game);
        $correct = htmlspecialchars($correct);
        $id_question = htmlspecialchars($id_question);


        $sql = "SELECT participacion.ID_Participacion as participacion
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


    public function updateStats ($nick, $category, $correct) {
        $nick = htmlspecialchars($nick);
        $category = htmlspecialchars($category);
        $correct = htmlspecialchars($correct);


        $sql = "SELECT categoria.ID_Categoria FROM categoria 
                WHERE categoria.Nombre_Categoria = '".$category."'"; 
        $result = mysql_query($sql, $this->conexion);
        $row = mysql_fetch_array($result);
        $id_category = $row[0];

        $sql = "SELECT jugador.ID_Jugador FROM jugador 
                WHERE jugador.Nick = '".$nick."'"; 
        $result = mysql_query($sql, $this->conexion);
        $row = mysql_fetch_array($result);
        $id_player = $row[0];

        if ($correct == 1) {
            $sql = "INSERT INTO estadistica VALUES 
                ('".$id_player."', '".$id_category."', 1, 0)
                ON DUPLICATE KEY UPDATE Numero_Acertadas = Numero_Acertadas + 1";
        } else {
            $sql = "INSERT INTO estadistica VALUES 
                ('".$id_player."', '".$id_category."', 0, 1)
                ON DUPLICATE KEY UPDATE Numero_Falladas = Numero_Falladas + 1";
        }
        $result = mysql_query($sql, $this->conexion); 
    }


    public function finishGame ($nick, $game) {
        $nick = htmlspecialchars($nick);
        $game = htmlspecialchars($game);

        $sql = "UPDATE jugador SET Partidas_Ganadas = Partidas_Ganadas + 1 WHERE Nick = '".$nick."'";
        $result = mysql_query($sql, $this->conexion); 

        $sql = "SELECT Nick FROM participacion 
                    INNER JOIN jugador
                    ON participacion.ID_Jugador = jugador.ID_Jugador
                WHERE participacion.ID_Partida = '".$game."' AND Nick != '".$nick."'"; 
        $result = mysql_query($sql, $this->conexion);
        $row = mysql_fetch_array($result);
        $nick_oponent = $row[0];

        $sql = "UPDATE jugador SET Partidas_Perdidas = Partidas_Perdidas + 1 WHERE Nick = '".$nick_oponent."'";
        $result = mysql_query($sql, $this->conexion);  

        $this->upd_level($nick);
        $this->upd_level($nick_oponent);

        $sql = "UPDATE partida SET Estado_Partida = 'Finalizada', Fecha_Final = now() WHERE ID_Partida = '".$game."'";
        $result = mysql_query($sql, $this->conexion);

    }


    private function upd_level ($nick) {
        $sql = "SELECT Partidas_Ganadas as gan, Partidas_Perdidas as per FROM jugador
                WHERE Nick = '".$nick."'"; 

        $result = mysql_query($sql, $this->conexion);
        $row = mysql_fetch_array($result);
        $games_won = $row[0];
        $games_lost = $row[1]; 

        if ($games_won - $games_lost > 50) {
            $sql = "SELECT nivel.ID_Nivel FROM nivel WHERE nivel.Tipo_Nivel = 'Maestro'";
        } else if ($games_won - $games_lost > 20) {
            $sql = "SELECT nivel.ID_Nivel FROM nivel WHERE nivel.Tipo_Nivel = 'Crack'";
        } else if ($games_won - $games_lost > 5) {
            $sql = "SELECT nivel.ID_Nivel FROM nivel WHERE nivel.Tipo_Nivel = 'Figura'";
        } else if ($games_won - $games_lost > -6) {
            $sql = "SELECT nivel.ID_Nivel FROM nivel WHERE nivel.Tipo_Nivel = 'Principiante'";
        } else if ($games_won - $games_lost > -21) {
            $sql = "SELECT nivel.ID_Nivel FROM nivel WHERE nivel.Tipo_Nivel = 'Fantasma'";
        } else if ($games_won - $games_lost > -51) {
            $sql = "SELECT nivel.ID_Nivel FROM nivel WHERE nivel.Tipo_Nivel = 'Débil'";
        } else {
            $sql = "SELECT nivel.ID_Nivel FROM nivel WHERE nivel.Tipo_Nivel = 'Siguiente'";
        } 
        $result = mysql_query($sql, $this->conexion); 
        $row = mysql_fetch_array($result);
        $id_world = $row[0];

        $sql = "UPDATE jugador SET ID_Nivel = '".$id_world."' WHERE Nick = '".$nick."'";
        $result = mysql_query($sql, $this->conexion); 
    }
}