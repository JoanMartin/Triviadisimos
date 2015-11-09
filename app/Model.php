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

    public function registerUser($nick, $nombre, $apellidos, $email, $password)
    {
        $nick = htmlspecialchars($nick);
        $nombre = htmlspecialchars($nombre);
        $apellidos = htmlspecialchars($apellidos);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);

        //$sql = "INSERT INTO jugador (Nick, Nombre, Apellidos, Email) VALUES ('".$nick."', '".$nombre."', '".$apellidos."', '".$email."')";

        $sql = "INSERT INTO `bdtrivialisimos`.`jugador` (`Nick`, `Nombre`, `Apellidos`, `Contraseña`, `Email`, `URL_Imagen`, `Partidas_Ganadas`, `Partidas_Perdidas`, `ID_Privilegio`, `ID_Nivel`) VALUES ('".$nick."', '".$nombre."', '".$apellidos."', '".$password."', '".$email."', '', '', '', '', '')";

        $result = mysql_query($sql, $this->conexion);

        //header('Location: index.php?'.$sql.'');
        return $result;
    }
    
    public function getlogin($nickLogin, $passwordLogin){

        $nickLogin = htmlspecialchars($nickLogin);
        $passwordLogin = htmlspecialchars($passwordLogin);

        if(isset($nickLogin) && isset($passwordLogin)){

            $sql = "SELECT `Id_Jugador` FROM `bdtrivialisimos`.`jugador` WHERE `Nick`='".$nickLogin."' AND `Contraseña`='".$passwordLogin."' LIMIT 1";
                  
            $result = mysql_query($sql, $this->conexion);

            if (mysql_num_rows($result) > 0) {
                
                session_start();
                $_SESSION['username']=$nickLogin; 
                return 'login';
            }else{
                return 'invalid user';
            }
        }
    }

    //Close Session
    public function closeSession(){

        session_destroy(); 
    }

    public function statTotalesAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        WHERE `Nick`='".$nick."'";
            
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statTotalesFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        WHERE `Nick`='".$nick."'";
            
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }    

    public function statDisneyAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtrivialisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtrivialisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtrivialisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtrivialisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtrivialisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtrivialisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtrivialisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtrivialisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalGeoAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtrivialisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtrivialisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Geografia'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalGeoFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtrivialisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtrivialisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Geografia'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalCieAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtrivialisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtrivialisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Ciencias'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalCieFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtrivialisimos`.`jugador`
        INNER JOIN `bdtrivialisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtrivialisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtrivialisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Ciencias'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }


}