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

    public function registerUser($nick, $nombre, $apellidos, $email, $password){

        $nick = htmlspecialchars($nick);
        $nombre = htmlspecialchars($nombre);
        $apellidos = htmlspecialchars($apellidos);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);

        //Comprobar que el nick está diponible

        $sql = "SELECT `Id_Jugador` FROM `bdtriviadisimos`.`jugador` WHERE `Nick`='".$nick."'";

        $result = mysql_query($sql, $this->conexion);

        if(mysql_num_rows($result) > 0) {
            return 'NickRepeated';
        }else{

            $sql = "SELECT `Id_Jugador` FROM `bdtriviadisimos`.`jugador` WHERE `Email`='".$email."'";

            $result = mysql_query($sql, $this->conexion);

            if(mysql_num_rows($result) > 0) {
                return 'EmailRepeated';
            }else{

                $sql = "INSERT INTO `bdtriviadisimos`.`jugador` (`Nick`, `Nombre`, `Apellidos`, `Contraseña`, `Email`, `URL_Imagen`, `Partidas_Ganadas`, `Partidas_Perdidas`, `ID_Privilegio`, `ID_Nivel`)
                 VALUES ('".$nick."', '".$nombre."', '".$apellidos."', '".$password."', '".$email."', 'user', '', '', '2', '1')";

                $result = mysql_query($sql, $this->conexion);

                return 'NoRepeated';    
            }         
        }
    }
    
    public function getlogin($nickLogin, $passwordLogin){

        $nickLogin = htmlspecialchars($nickLogin);
        $passwordLogin = htmlspecialchars($passwordLogin);

        if(isset($nickLogin) && isset($passwordLogin)){

            $sql = "SELECT `Id_Jugador` FROM `bdtriviadisimos`.`jugador` WHERE `Nick`='".$nickLogin."' AND `Contraseña`='".$passwordLogin."' LIMIT 1";
                  
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

    public function statNormalGeoAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Geografía'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalGeoFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Geografía'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalCieAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Ciencia'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalCieFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Ciencia'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalHisAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Historia'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalHisFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Historia'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalDepAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Deportes'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalDepFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Deportes'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalEspAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Espectáculos'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalEspFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Espectáculos'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalAyLAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Arte y literatura'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statNormalAyLFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Normal' AND `nombre_categoria`= 'Arte y literatura'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    //DISNEY   

    public function statDisneyHabAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Había una vez'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyHabFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Había una vez'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyMarAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Maravilloso mundo de Disney'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyMarFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Maravilloso mundo de Disney'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyMonAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Monstruos y villanos'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyMonFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Monstruos y villanos'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyHerAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Héroes y heroínas'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyHerFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Héroes y heroínas'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyEstAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Estrellas secundarias'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyEstFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Estrellas secundarias'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyLugAcertadas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_acertadas) AS numero_acertadas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Lugares y objetos'";
           
        $result = mysql_query($sql, $this->conexion);

        if ($result) {
            $row = mysql_fetch_assoc($result);
            return $row;
        }
    }

    public function statDisneyLugFalladas($nick){
        $nick = htmlspecialchars($nick);  
        
        $sql = "SELECT SUM(numero_falladas) AS numero_falladas FROM `bdtriviadisimos`.`jugador`
        INNER JOIN `bdtriviadisimos`.`estadistica` ON `jugador`.`id_jugador` = `estadistica`.`id_jugador` 
        INNER JOIN `bdtriviadisimos`.`categoria` ON `estadistica`.`id_categoria` = `categoria`.`id_categoria`
        INNER JOIN `bdtriviadisimos`.`mundo` ON `categoria`.`id_mundo` = `mundo`.`id_mundo`
        WHERE `Nick`='".$nick."' AND `nombre_mundo`= 'Disney' AND `nombre_categoria`= 'Lugares y objetos'";
           
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

        $sql = "UPDATE  `bdtriviadisimos`.`jugador` SET `URL_Imagen`='".$nick."' WHERE `Nick`='".$nick."' ";
                   
        $result = mysql_query($sql, $this->conexion);

        return 'passChange';    
    }


}