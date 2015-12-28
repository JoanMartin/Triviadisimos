<?php

    require_once (__DIR__.'/Config.php');
    require_once (__DIR__.'/UserGamesModel.php');

    $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

    session_start();

    $nick = $_SESSION["username"];
    $game = $_SESSION["game"];
    $correct = $_POST['correct'];
    $id_question = $_POST['id_question'];

    $m->insertIntervention ($game, $nick, $correct, $id_question);
?>