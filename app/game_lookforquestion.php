<?php

    require_once (__DIR__.'/Config.php');
    require_once (__DIR__.'/UserGamesModel.php');

    $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

    $category = $_POST['category'];
    $category = trim($category); //Le quita el espacio que HTML añade porque sí

    $params = array(
        'question' => $m->getQuestion($category),
    );

    echo ''.json_encode($params['question']).'';
?>