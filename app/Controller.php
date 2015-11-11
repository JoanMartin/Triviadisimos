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

            //header("Location: ./".$result.""); 

            if($result == 'NickRepeated'){
                header("Location: ./NickRepeated"); 
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

 	}
 	