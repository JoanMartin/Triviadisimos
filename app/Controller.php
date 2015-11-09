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
	                $m->registerUser($_POST['nick'], $_POST['nombre'],
	                        $_POST['apellidos'], $_POST['email'], $_POST['password']);
	        }

	        $reslt = $m->getlogin($_POST['nick'], $_POST['password']);
            
            if($reslt == 'login'){ 	
         		require __DIR__ . '/templates/user_home_page.php';
			}
			else{
         		header("Location: ./"); 
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
         		header("Location: ./"); 
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

            require __DIR__ . '/templates/stats.php';
        }

 	}
 	