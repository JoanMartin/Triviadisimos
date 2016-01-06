<?php

    require_once (__DIR__.'/Config.php');
    require_once (__DIR__.'/UserGamesModel.php');

    function lookForQuestion () {
	    $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

	    $category = $_POST['category'];
	    $category = trim($category); //Le quita el espacio que HTML añade porque sí

	    $params = array(
	        'question' => $m->getQuestion($category),
	    );
		
	    echo ''.json_encode($params['question']).'';
    }


    function invertTurn() {
	    $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

	    session_start();
	    $nick = $_SESSION["username"];
	    $game = $_SESSION["game"];

	    $m->invertTurn($game, $nick);
    }


    function insertIntervention () {
	    $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

	    session_start();
	    $nick = $_SESSION["username"];
	    $game = $_SESSION["game"];
	    $correct = $_POST['correct'];
	    $id_question = $_POST['id_question'];
        $category = $_POST['category'];
        $category = trim($category);

        $m->insertIntervention ($game, $nick, $correct, $id_question, $category); 
        $m->updateStats ($nick, $category, $correct);    	
    }


    function checkWon () {
        $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

        session_start();
        $game = $_SESSION['game'];
        $nick = $_SESSION["username"];

        $game = $m->getGame($game, $nick);

        $color = array(
	        'green' => false,
	        'yellow' => false,
	        'blue' => false,
	        'red' => false,
	        'purple' => false,
	        'orange' => false,
	    );
	    foreach ($game as $g) {
            if ($g['PregAcertada'] == 1) {
                switch ($g['categoria']) {
                    case 'Ciencia':
                        $color['green'] = true;
                        break;
                    case 'Historia':
                        $color['yellow'] = true;
                        break;
                    case 'Geografía':
                        $color['blue'] = true;
                        break;
                    case 'Arte y literatura':
                        $color['red'] = true;
                        break;
                    case 'Espectáculos':
                        $color['purple'] = true;
                        break;
                    case 'Deportes':
                        $color['orange'] = true;
                        break;

                    case 'Maravilloso mundo de Disney':
                        $color['green'] = true;
                        break;
                    case 'Monstruos y villanos':
                        $color['yellow'] = true;
                        break;
                    case 'Había una vez':
                        $color['blue'] = true;
                        break;
                    case 'Lugares y objetos':
                        $color['red'] = true;
                        break;
                    case 'Estrellas secundarias':
                        $color['purple'] = true;
                        break;
                    case 'Héroes y heroínas':
                        $color['orange'] = true;
                        break;
                }
            }
	    }

        foreach ($color as $c) {
            if ($c == false) {
                echo false;
                return;
            }
        }

        echo true;
        return;
    }


    function finishGame () {
        $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

        session_start();
        $nick = $_SESSION["username"];
        $game = $_SESSION["game"];

        $m->finishGame ($nick, $game);
    }

    
    switch($_POST['functionname']) {
        case 'lookForQuestion':
        	lookForQuestion();
           	break;
        case 'invertTurn':
        	invertTurn();
           	break;
        case 'insertIntervention':
        	insertIntervention();
           	break;
        case 'checkWon':
            checkWon();
            break;
        case 'finishGame':
            finishGame();
            break;
    }
?>