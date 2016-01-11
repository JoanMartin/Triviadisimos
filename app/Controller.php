<?php

    class Controller {

		public function homePage() {
            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $bestUsers = $m->bestUsers();

			require __DIR__ . '/templates/home_page.php';
		}


     	public function userHomePage() {
	        $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

	        $nick = $_SESSION["username"];

	        $params = array(
				'games' => $m->games($nick),
                'level' => $m->getLevel($nick),
			);

         	require __DIR__ . '/templates/user_home_page.php';
     	}


        public function finishedGames() {
            $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $nick = $_SESSION["username"];

            $params = array(
                'games' => $m->finishedGames($nick),
                'level' => $m->getLevel($nick),
            );

            require __DIR__ . '/templates/finished_games.php';
        }


        public function game() {
            $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $_SESSION['game'] = $_POST['game'];
            $game = $_POST['game'];
            $nick = $_SESSION["username"];

            $params = array(
                'game' => $m->getGame($game, $nick),
                'world' => $m->getWorld($game),
                'level' => $m->getLevel($nick),
            );

            if ($params['game'] == 'GameFinished'){
                $text = "UPS! Esta partida ya no est&aacute en juego!";
                require __DIR__ . '/templates/errorGame.php'; 
            } else if ($params['game'] == 'NotYourTurn') {
                $text = "UPS! No es tu turno en esta partida!";
                require __DIR__ . '/templates/errorGame.php'; 
            } else {
                require __DIR__ . '/templates/game.php';                
            }
        }


        public function createNormalGame() {
            $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $nick = $_SESSION["username"];

            $game = $m->createGame($nick, 'Normal');

            header("Refresh:0; url=./index.php");
        }


        public function createDisneyGame() {
            $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $nick = $_SESSION["username"];

            $game = $m->createGame($nick, 'Disney');

            header("Refresh:0; url=./index.php");
        }


     	public function registerUser() {			
	        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $result = $m->registerUser($_POST['nick'], $_POST['nombre'],
                            $_POST['apellidos'], $_POST['email'], $_POST['password']);
            }

            if($result == 'NickRepeated'){
                $text= "UPS! Este Nick ya est&aacute utilizado. Prueba otro!";
                require __DIR__ . '/templates/errorAlertNoUser.php'; 
            } else {
                if($result == 'EmailRepeated'){
                    $text= "UPS! Este Email ya est&aacute utilizado. Prueba otro!";
                    require __DIR__ . '/templates/errorAlertNoUser.php'; 
                } else {
                    copy('web/images/user.png', 'web/images/users/user.jpg');
                    rename("web/images/users/user.jpg", "web/images/users/".$_POST['nick'].".jpg");

                    $reslt = $m->getlogin($_POST['nick'], $_POST['password']);
                    
                    if ($reslt == 'login') {  
                        $this->userHomePage();
                    } else {
                        header("Location: ./usuario y password no coinciden"); 
                    }
                }
            }            
        }

        
        public function loginUser() {
            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $reslt = $m->getlogin($_POST['nickLogin'], $_POST['passwordLogin']);

            if ($reslt == 'login') { 	
                header("Refresh:0; url=./index.php");
			} else {
                $text= "UPS! El usuario o la contrase&ntildea no coinciden. Prueba otra vez!";
                require __DIR__ . '/templates/errorAlertNoUser.php'; 
            }  
        } 


        public function closeSession() {
            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $reslt = $m->closeSession();
            header("Refresh:0; url=./index.php");
 		}


        public function stats() {
            $nick = $_SESSION['username'];

            $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $params = array(
                'level' => $m->getLevel($nick),
            );

            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            //Normales

            $stats = $m->statTotalesAcertadas($nick);
            $paramsTotalesAcertadas = $stats;

            $stats = $m->statTotalesFalladas($nick);
            $paramsTotalesFalladas = $stats;

            $stats = $m->statDisneyAcertadas($nick);
            $paramsDisneyAcertadas = $stats;

            $stats = $m->statDisneyFalladas($nick);
            $paramsDisneyFalladas = $stats;

            $stats = $m->statNormalAcertadas($nick);
            $paramsNormalAcertadas = $stats;

            $stats = $m->statNormalFalladas($nick);
            $paramsNormalFalladas = $stats;

            $stats = $m->statNormalGeoAcertadas($nick);
            $paramsNormalGeoAcertadas = $stats;

            $stats = $m->statNormalGeoFalladas($nick);
            $paramsNormalGeoFalladas = $stats;

            $stats = $m->statNormalCieAcertadas($nick);
            $paramsNormalCieAcertadas = $stats;

            $stats = $m->statNormalCieFalladas($nick);
            $paramsNormalCieFalladas = $stats;

            $stats = $m->statNormalHisAcertadas($nick);
            $paramsNormalHisAcertadas = $stats;

            $stats = $m->statNormalHisFalladas($nick);
            $paramsNormalHisFalladas = $stats;

            $stats = $m->statNormalDepAcertadas($nick);
            $paramsNormalDepAcertadas = $stats;

            $stats = $m->statNormalDepFalladas($nick);
            $paramsNormalDepFalladas = $stats;

            $stats = $m->statNormalEspAcertadas($nick);
            $paramsNormalEspAcertadas = $stats;

            $stats = $m->statNormalEspFalladas($nick);
            $paramsNormalEspFalladas = $stats;

            $stats = $m->statNormalAyLAcertadas($nick);
            $paramsNormalAyLAcertadas = $stats;

            $stats = $m->statNormalAyLFalladas($nick);
            $paramsNormalAyLFalladas = $stats;

            //Diney

            //Había una vez
            $stats = $m->statDisneyHabAcertadas($nick);
            $paramsDisneyHabLAcertadas = $stats;

            $stats = $m->statDisneyHabFalladas($nick);
            $paramsDisneyHabFalladas = $stats;

            //Maravilloso mundo de Disney
            $stats = $m->statDisneyMarAcertadas($nick);
            $paramsDisneyMarAcertadas = $stats;

            $stats = $m->statDisneyMarFalladas($nick);
            $paramsDisneyMarFalladas = $stats;

            //Monstruos y villanos
            $stats = $m->statDisneyMonAcertadas($nick);
            $paramsDisneyMonAcertadas = $stats;

            $stats = $m->statDisneyMonFalladas($nick);
            $paramsDisneyMonFalladas = $stats;

            //Héroes y heroínas
            $stats = $m->statDisneyHerAcertadas($nick);
            $paramsDisneyHerAcertadas = $stats;

            $stats = $m->statDisneyHerFalladas($nick);
            $paramsDisneyHerFalladas = $stats;

            //Estrellas secundarias
            $stats = $m->statDisneyEstAcertadas($nick);
            $paramsDisneyEstAcertadas = $stats;

            $stats = $m->statDisneyEstFalladas($nick);
            $paramsDisneyEstFalladas = $stats;

            //Lugares y objetos
            $stats = $m->statDisneyLugAcertadas($nick);
            $paramsDisneyLugAcertadas = $stats;

            $stats = $m->statDisneyLugFalladas($nick);
            $paramsDisneyLugFalladas = $stats;

            require __DIR__ . '/templates/stats.php';
        }

        public function profile(){
            $nick = $_SESSION['username'];

            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $um = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $params = array(
                'profile' => $m->infoProfile($nick),
                'level' => $um->getLevel($nick),
            );

           // $profile = $m->infoProfile($nick);
           // $paramsProfile = $profile;
     
            require __DIR__ . '/templates/profile.php';

        }

        public function editProfile(){
            
            $nick = $_SESSION['username'];

            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {  

                $result = $m->editProfile($_POST['nick'], $_POST['nombre'], $_POST['apellidos'], $_POST['email']);
            }
            
            if($result == 'editChange'){  
                header("Location: ./profile"); 
            }
            else{
                header("Location: ./error"); 
            } 
            
        }

        public function changePasswordProfile(){
            
            $nick = $_SESSION['username'];

            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $result = $m->confPasswordCurrent($nick, $_POST['passActual']);
                if($result == 'passConf'){  
                    $result = $m->changePasswordProfile($nick, $_POST['passNuevo']);
                    
                    if($result == 'passChange'){  
                        header("Location: ./profile"); 
                    } else {
                        header("Location: ./error"); 
                    } 
                } else {       
                    $text= "UPS! La contrase&ntildea actual no es correcta";
                    require __DIR__ . '/templates/errorAlertUser.php';
                }
            }

        }

        public function imgProfile(){
            
            $nick = $_SESSION['username'];

            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
           
           
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $result = $m->imgProfile($nick, $_FILES['fileImgProfile']);
            }

            $target_path = "web/images/users/";
            $target_path = $target_path . basename($_FILES['fileImgProfile']['name']); 
            //$ext = pathinfo($target_path, PATHINFO_EXTENSION);

            if(move_uploaded_file($_FILES["fileImgProfile"]["tmp_name"],'web/images/users/'.$_FILES['fileImgProfile']['name'])){
                rename("$target_path", "web/images/users/".$nick.".jpg");                  
            }

            header("Refresh:0; url=./profile");
        }
    }
?>
