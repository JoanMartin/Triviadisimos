<?php

class Model
{
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

    public function bd_conexion()
    {

    }

    public function registerUser($nick, $nombre, $apellidos, $email, $password){

        $nick = htmlspecialchars($nick);
        $nombre = htmlspecialchars($nombre);
        $apellidos = htmlspecialchars($apellidos);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);

        //Comprobar que el nick está diponible
        $sql = "SELECT `Id_Jugador` FROM `bdtriviadisimos`.`jugador` WHERE `Nick`='".$nick."'";

        $result = mysql_query($sql, $this->conexion);

        if (mysql_num_rows($result) > 0) {
            return 'NickRepeated';
        } else {
            $sql = "SELECT `Id_Jugador` FROM `bdtriviadisimos`.`jugador` WHERE `Email`='".$email."'";

            $result = mysql_query($sql, $this->conexion);

            if (mysql_num_rows($result) > 0) {
                return 'EmailRepeated';
            } else {
                $sql = "INSERT INTO `bdtriviadisimos`.`jugador` (`Nick`, `Nombre`, `Apellidos`, `Contraseña`, `Email`, `URL_ImagenJugador`, `Partidas_Ganadas`, `Partidas_Perdidas`, `ID_Privilegio`, `ID_Nivel`)
                 VALUES ('".$nick."', '".$nombre."', '".$apellidos."', '".$password."', '".$email."', '".$nick."', '', '', '2', '4')";

                $result = mysql_query($sql, $this->conexion);

                return 'NoRepeated';    
            }         
        }
    }
    
    public function getlogin($nickLogin, $passwordLogin){
        $nickLogin = htmlspecialchars($nickLogin);
        $passwordLogin = htmlspecialchars($passwordLogin);

        if(isset($nickLogin) && isset($passwordLogin)){
            $sql = "SELECT `Id_Jugador`, `Tipo_Privilegio` FROM `bdtriviadisimos`.`jugador`
            INNER JOIN `bdtriviadisimos`.`privilegio` ON `jugador`.`ID_Privilegio` = `privilegio`.`ID_Privilegio`
            WHERE `Nick`='".$nickLogin."' AND `Contraseña`='".$passwordLogin."' LIMIT 1";
                  
            $result = mysql_query($sql, $this->conexion);

            if (mysql_num_rows($result) > 0) {

                $row = mysql_fetch_array($result);
                $privilegio = $row[1];

                session_start();
                $_SESSION['username'] = $nickLogin; 
                $_SESSION['privilegio'] = $privilegio; 

                return 'login';
            }else{
                return 'invalid user';
            }
        }
    }


    public function bestUsers(){
        $sql = "SELECT (Partidas_Ganadas - Partidas_Perdidas) AS puntuacion, Nick, URL_ImagenJugador 
                FROM jugador 
                ORDER BY puntuacion desc";  

        $result = mysql_query($sql, $this->conexion);

        $bestUsers = array();
        for ($i = 0; $i < 3; $i++) {
            $row = mysql_fetch_assoc($result);
            $bestUsers[] = $row;
        }

        return $bestUsers;
    }

    //Close Session
    public function closeSession() {
        session_destroy(); 
    }


    public function statTotalesAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        WHERE `Nick`='".$nick."'";
            
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statTotalesFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        WHERE `Nick`='".$nick."'";
            
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }    

    public function statDisneyAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }


    public function statFalladas($nick, $mundo, $categoria){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= '".$mundo."' AND `nombre_categoria`= '".$categoria."'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statAcertadas($nick, $mundo, $categoria){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= '".$mundo."' AND `nombre_categoria`= '".$categoria."'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }
    
    //PROFILE
     public function infoProfile($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT * FROM `bdtriviadisimos`.`jugador`WHERE `Nick`='".$nick."'";
           
        $result = mysql_query($sql, $this->conexion);

        $profile = array();
        while ($row = mysql_fetch_assoc($result))
        {
            $profile[] = $row;
        }

        return $profile;
    }
    
    public function editProfile($nick, $nombre, $apellidos, $email){
        $nick = htmlspecialchars($nick);  

        $sql = "UPDATE  `bdtriviadisimos`.`jugador` SET `Nombre`='".$nombre."', `Apellidos`='".$apellidos."', `Email`='".$email."' WHERE `Nick`='".$nick."'";
           
        $result = mysql_query($sql, $this->conexion);

        return 'editChange';    
    } 

    public function confPasswordCurrent($nick, $passActual){
        $nick = htmlspecialchars($nick);  

        $sql = "SELECT * FROM `bdtriviadisimos`.`jugador` WHERE `Contraseña`='".$passActual."' AND `Nick`='".$nick."' ";
                   
        $result = mysql_query($sql, $this->conexion);

        if (mysql_num_rows($result) > 0) {
            return 'passConf';    
        }else{
            return 'passDen';  
        }  
    }

    public function changePasswordProfile($nick, $passNuevo){
        $nick = htmlspecialchars($nick);  

        $sql = "UPDATE  `bdtriviadisimos`.`jugador` SET `Contraseña`='".$passNuevo."' WHERE `Nick`='".$nick."' ";
                   
        $result = mysql_query($sql, $this->conexion);

        return 'passChange';    
    }

    public function imgProfile($nick, $fileImgProfile){
        $nick = htmlspecialchars($nick);  

        $sql = "UPDATE  `bdtriviadisimos`.`jugador` SET `URL_ImagenJugador`='".$nick."' WHERE `Nick`='".$nick."' ";
                   
        $result = mysql_query($sql, $this->conexion);

        return 'passChange';    
    }

    public function editionAdminListarPreguntas($categoria){
        $sql = "SELECT * FROM `bdtriviadisimos`.`pregunta` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `pregunta`.`id_categoria` = `categoria`.`id_categoria`
        WHERE `nombre_categoria`= '".$categoria."'";
                   
        $result = mysql_query($sql, $this->conexion);

        if (mysql_num_rows($result) > 0) {
            $params = array();
            while ($row = mysql_fetch_assoc($result))
            {
                $params[] = $row;
            }
            return $params;
        }else{
            return 'den';  
        }
    }
    
    public function question($id){
        $sql = "SELECT * FROM `bdtriviadisimos`.`pregunta` WHERE `ID_Pregunta`= '".$id."'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function answers($id){
        $sql = "SELECT * FROM `bdtriviadisimos`.`respuesta` WHERE `ID_Pregunta`= '".$id."'";
           
        $result = mysql_query($sql, $this->conexion);

        if (mysql_num_rows($result) > 0) {
            $params = array();
            while ($row = mysql_fetch_assoc($result))
            {
                $params[] = $row;
            }
            return $params;
        }else{
            return 'den';  
        }
    }
    
    public function editQuestion1($idPregunta, $textPregunta){

        $sql = "UPDATE `bdtriviadisimos`.`pregunta` SET `Text_Pregunta`='".$textPregunta."' WHERE `ID_Pregunta`='".$idPregunta."'";
           
        $result = mysql_query($sql, $this->conexion);

        return 'editChange';    
    } 

    public function editQuestion2($idPregunta, $idRespuesta, $textRespuesta){
        
        $sql = "UPDATE `bdtriviadisimos`.`respuesta` SET `Texto_Respuesta`='".$textRespuesta."' WHERE `ID_Respuesta`='".$idRespuesta."' AND `ID_Pregunta`='".$idPregunta."' ";
    
        $result = mysql_query($sql, $this->conexion);

        return 'editChange';    
    } 

    public function searchCategory($categoria){

        $sql = "SELECT `ID_Categoria` FROM `bdtriviadisimos`.`categoria` WHERE `Nombre_Categoria`= '".$categoria."'";

        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }        
    }

    public function addQuestion($idcategoria, $titulo){
       
        $sql = "INSERT INTO `bdtriviadisimos`.`pregunta` (`Text_Pregunta`, `ID_Categoria`) VALUES ('".$titulo."', '".$idcategoria."')";

        $result = mysql_query($sql, $this->conexion);

        return 'insertCorrect';        
    }

    public function searchQuestion($titulo){

        $sql = "SELECT `ID_Pregunta` FROM `bdtriviadisimos`.`pregunta` WHERE `Text_Pregunta`= '".$titulo."'";

        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }        
    }

    public function addAnswers($idPregunta, $respCorrecta, $resp1, $resp2, $resp3){
       
        $sql = "INSERT INTO `bdtriviadisimos`.`respuesta` (`ID_Pregunta`, `Texto_Respuesta`, `Correcta`) VALUES ('".$idPregunta."', '".$respCorrecta."', '1')";
        $sql1 = "INSERT INTO `bdtriviadisimos`.`respuesta` (`ID_Pregunta`, `Texto_Respuesta`, `Correcta`) VALUES ('".$idPregunta."', '".$resp1."', '0')";
        $sql2 = "INSERT INTO `bdtriviadisimos`.`respuesta` (`ID_Pregunta`, `Texto_Respuesta`, `Correcta`) VALUES ('".$idPregunta."', '".$resp2."', '0')";
        $sql3 = "INSERT INTO `bdtriviadisimos`.`respuesta` (`ID_Pregunta`, `Texto_Respuesta`, `Correcta`) VALUES ('".$idPregunta."', '".$resp3."', '0')";
        
        $result = mysql_query($sql, $this->conexion);
        $result1 = mysql_query($sql1, $this->conexion);
        $result2 = mysql_query($sql2, $this->conexion);
        $result3 = mysql_query($sql3, $this->conexion);

        return 'insertCorrect';        
    }

}
