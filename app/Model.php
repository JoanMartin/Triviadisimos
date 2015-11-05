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

}