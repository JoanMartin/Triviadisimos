<?php


    // carga del modelo y los controladores
    require_once (__DIR__.'/app/Config.php');
    require_once (__DIR__.'/app/Model.php');
    require_once (__DIR__.'/app/UserGamesModel.php');
    require_once (__DIR__.'/app/Controller.php');

    session_start();
        
    if(!isset($_SESSION['username'])){    
        //Sesión No iniciada
        //$sesion=0;
        session_destroy();  

        // enrutamiento
        $map = array(
            'homePage' => array('controller' =>'Controller', 'action' =>'homePage'),
            'registerUser' => array('controller' =>'Controller', 'action' =>'registerUser'),
            'loginUser' => array('controller' =>'Controller', 'action' =>'loginUser')
        );           
    } else { 
        //Sesión Iniciada
        //session_destroy();  

        // enrutamiento
        $map = array(
            'userHomePage' => array('controller' =>'Controller', 'action' =>'userHomePage'),
            'finishedGames' => array('controller' =>'Controller', 'action' =>'finishedGames'),
            'game' => array('controller' =>'Controller', 'action' =>'game'),
            'createNormalGame' => array('controller' =>'Controller', 'action' =>'createNormalGame'),
            'createDisneyGame' => array('controller' =>'Controller', 'action' =>'createDisneyGame'),
            'stats' => array('controller' =>'Controller', 'action' =>'stats'),
            'profile' => array('controller' =>'Controller', 'action' =>'profile'),
            'editProfile' => array('controller' =>'Controller', 'action' =>'editProfile'),
            'changePasswordProfile' => array('controller' =>'Controller', 'action' =>'changePasswordProfile'),
            'imgProfile' => array('controller' =>'Controller', 'action' =>'imgProfile'),
            'closeSession' => array('controller' =>'Controller', 'action' =>'closeSession')
        );

        if($_SESSION['privilegio']=='admin'){  
        
            // enrutamiento
            $map1 = array(
                'edition' => array('controller' =>'Controller', 'action' =>'edition'),
                'question' => array('controller' =>'Controller', 'action' =>'question'),
                'editQuestion' => array('controller' =>'Controller', 'action' =>'editQuestion'),
                'addQuestion' => array('controller' =>'Controller', 'action' =>'addQuestion')
            );
            $map = array_merge($map, $map1);
        }
    }

    // Parseo de la ruta
    if (isset($_GET['ctl'])) {
        if (isset($map[$_GET['ctl']])) {
            $ruta = $_GET['ctl'];
        } else {
            header('Status: 404 Not Found');  
            echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                $_GET['ctl'] .
                '</p></body></html>';
            exit;
        }
    } else {
        if(!isset($_SESSION['username'])){
            $ruta = 'homePage';
        }else{
            $ruta = 'userHomePage';
        }
    }

    $controlador = $map[$ruta];
    // Ejecución del controlador asociado a la ruta
    if (method_exists($controlador['controller'],$controlador['action'])) {
        call_user_func(array(new $controlador['controller'], $controlador['action']));
    } else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
    }
?>
