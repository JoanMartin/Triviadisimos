<?php

 	class Controller
 	{

     	public function homePage()
     	{
         	require __DIR__ . '/templates/home_page.php';
     	}

     	public function registerUser()
	    {			
	        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

	        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	                $m->registerUser($_POST['nick'], $_POST['nombre'],
	                        $_POST['apellidos'], $_POST['email'], $_POST['password']);
	        }
         	require __DIR__ . '/templates/home_page.php';
	    }
	    
	    public function loginUser(){

    	    $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

			$reslt = $m->getlogin($_POST['nickLogin'], $_POST['passwordLogin']);
            
            if($reslt == 'login'){
 	
         		header("Location: ./"); 
         		//require __DIR__ . '/templates/home_page.php';
			}
			else{
				//require __DIR__ . '/templates/home_page.php';				
         		header("Location: ./NOOO"); 
			}  
 		}

 	}
 	