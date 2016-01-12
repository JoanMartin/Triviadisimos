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

            //Normal
            $paramsNormalGeoAcertadas = $m->statAcertadas($nick, 'Normal', 'Geografía');
            $paramsNormalGeoFalladas = $m->statFalladas($nick, 'Normal', 'Geografía');
            $paramsNormalCieAcertadas = $m->statAcertadas($nick, 'Normal', 'Ciencia');
            $paramsNormalCieFalladas = $m->statFalladas($nick, 'Normal', 'Ciencia');
            $paramsNormalHisAcertadas = $m->statAcertadas($nick, 'Normal', 'Historia');
            $paramsNormalHisFalladas = $m->statFalladas($nick, 'Normal', 'Historia');
            $paramsNormalDepAcertadas = $m->statAcertadas($nick, 'Normal', 'Deportes');
            $paramsNormalDepFalladas = $m->statFalladas($nick, 'Normal', 'Deportes');
            $paramsNormalEspAcertadas = $m->statAcertadas($nick, 'Normal', 'Espectáculos');
            $paramsNormalEspFalladas = $m->statFalladas($nick, 'Normal', 'Espectáculos');
            $paramsNormalAyLAcertadas = $m->statAcertadas($nick, 'Normal', 'Arte y literatura');
            $paramsNormalAyLFalladas = $m->statFalladas($nick, 'Normal', 'Arte y literatura');    
            //Disney
            $paramsDisneyHabLAcertadas = $m->statAcertadas($nick, 'Disney', 'Había una vez');
            $paramsDisneyHabFalladas = $m->statFalladas($nick, 'Disney', 'Había una vez');
            $paramsDisneyMarAcertadas = $m->statAcertadas($nick, 'Disney', 'Maravilloso mundo de Disney');
            $paramsDisneyMarFalladas = $m->statFalladas($nick, 'Disney', 'Maravilloso mundo de Disney');
            $paramsDisneyMonAcertadas = $m->statAcertadas($nick, 'Disney', 'Monstruos y villanos');
            $paramsDisneyMonFalladas = $m->statFalladas($nick, 'Disney', 'Monstruos y villanos');
            $paramsDisneyHerAcertadas = $m->statAcertadas($nick, 'Disney', 'Héroes y heroínas');
            $paramsDisneyHerFalladas = $m->statFalladas($nick, 'Disney', 'Héroes y heroínas');
            $paramsDisneyEstAcertadas = $m->statAcertadas($nick, 'Disney', 'Estrellas secundarias');
            $paramsDisneyEstFalladas = $m->statFalladas($nick, 'Disney', 'Estrellas secundarias');
            $paramsDisneyLugAcertadas = $m->statAcertadas($nick, 'Disney', 'Lugares y objetos');
            $paramsDisneyLugFalladas = $m->statFalladas($nick, 'Disney', 'Lugares y objetos');

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

        public function edition(){
            
            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            $params = array(
             'listadoPreguntasGeografia' => $m->editionAdminListarPreguntas('Geografía'),
             'listadoPreguntasCiencias' => $m->editionAdminListarPreguntas('Ciencia'),
             'listadoPreguntasHistoria' => $m->editionAdminListarPreguntas('Historia'),
             'listadoPreguntasArteyLiteratura' => $m->editionAdminListarPreguntas('Arte y literatura'),
             'listadoPreguntasEspectaculos' => $m->editionAdminListarPreguntas('Espectáculos'),
             'listadoPreguntasDeportes' => $m->editionAdminListarPreguntas('Deportes'),
             'listadoPreguntasHabiaUnaVez' => $m->editionAdminListarPreguntas('Había una vez'),
             'listadoPreguntasMarMundoDisney' => $m->editionAdminListarPreguntas('Maravilloso mundo de Disney'),
             'listadoPreguntasMonstruosYVillanos' => $m->editionAdminListarPreguntas('Monstruos y villanos'),
             'listadoPreguntasLugaresYObjetos' => $m->editionAdminListarPreguntas('Lugares y objetos'),
             'listadoPreguntasEstSecundarias' => $m->editionAdminListarPreguntas('Estrellas secundarias'),
             'listadoPreguntasHerYHer' => $m->editionAdminListarPreguntas('Héroes y heroínas'),
            );
                 
            require __DIR__ . '/templates/editionAdmin.php';
                       
        }

        public function question(){
            
            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {  

                $result = $m->question($_POST['ID_Pregunta']);
                $params = array(
                    'listadoRespuestas' => $m->answers($_POST['ID_Pregunta']),
                );
            }
                 
            require __DIR__ . '/templates/editionQuestion.php';
                       
        }

        public function editQuestion(){

            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {  

                $result1 = $m->editQuestion1($_POST['ID_Pregunta'], $_POST['Text_Pregunta']);
                $result2 = $m->editQuestion2($_POST['ID_Pregunta'], $_POST['ID_Respuesta1'], $_POST['Text_Respuesta1']);
                $result2 = $m->editQuestion2($_POST['ID_Pregunta'], $_POST['ID_Respuesta2'], $_POST['Text_Respuesta2']);
                $result2 = $m->editQuestion2($_POST['ID_Pregunta'], $_POST['ID_Respuesta3'], $_POST['Text_Respuesta3']);
                $result2 = $m->editQuestion2($_POST['ID_Pregunta'], $_POST['ID_Respuesta4'], $_POST['Text_Respuesta4']);
            }
            
            if($result1 == 'editChange' && $result2 == 'editChange'){  
                header("Location: ./edition"); 
            }
            else{
                header("Location: ./error"); 
            } 
            
        }

        public function addQuestion(){

            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);            

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {  

                //$result = $m->searchCategory($_POST['categoria']);
                $msg = $_POST['categoria'];
                //echo "<script type='text/javascript'>alert('$msg');</script>";
                $result1 = $m->addQuestion($_POST['categoria'], $_POST['titulo']);
                $result2 = $m->searchQuestion($_POST['titulo']);
                $result3 = $m->addAnswers($result2['ID_Pregunta'], $_POST['respCorrecta'], $_POST['resp1'], $_POST['resp2'], $_POST['resp3']);
            }

            if($result1 == 'insertCorrect'){  
                header("Location: ./edition"); 
            }
            else{
                header("Location: ./error"); 
            } 
            
        }

 	}
?>
