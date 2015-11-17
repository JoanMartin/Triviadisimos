<?php

 	class Controller
 	{

     	public function homePage()
     	{
         	require __DIR__ . '/templates/home_page.php';
     	}



     	public function userHomePage()
     	{
         	require __DIR__ . '/templates/user_home_page.php';
     	}

     	public function registerUser()
	    {			
	        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

	        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $result = $m->registerUser($_POST['nick'], $_POST['nombre'],
	                        $_POST['apellidos'], $_POST['email'], $_POST['password']);
	        }

            if($result == 'NickRepeated'){
                require __DIR__ . '/templates/errorNickRepeated.php';
            }else{
                if($result == 'EmailRepeated'){
                require __DIR__ . '/templates/errorEmailRepeated.php';
                }else{
                    $reslt = $m->getlogin($_POST['nick'], $_POST['password']);
                    
                    if($reslt == 'login'){  
                        require __DIR__ . '/templates/user_home_page.php';
                    }
                    else{
                        header("Location: ./usuario y password no coinciden"); 
                    }
                }
            }	         
	    }
	    
	    public function loginUser(){

    	    $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

			$reslt = $m->getlogin($_POST['nickLogin'], $_POST['passwordLogin']);
            
            if($reslt == 'login'){ 	
         		require __DIR__ . '/templates/user_home_page.php';
			}
			else{
                require __DIR__ . '/templates/errorUserNotFound.php'; 
			}  
 		} 

 		public function closeSession(){

 			$m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

			$reslt = $m->closeSession();
            
        	require __DIR__ . '/templates/home_page.php';
 		}

        public function stats(){

            $nick = $_SESSION['username'];

            $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                      Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

            /*$params=array(
                'TotalesAcertadas' => $m->statTotalesAcertadas($nick),
            );
            */

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

 	}
 	