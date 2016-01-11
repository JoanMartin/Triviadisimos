<!DOCTYPE HTML>

<html>
    <head>
        <title>Triviad&iacutesimos</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_user_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_mainlay_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_game_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_stats_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_profile_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_errRepeated_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_validate_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_editAdmin_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_editQuestion_css ?>" />

        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jq_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_js1_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jq1_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_validate_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_editAdmin_js ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script src="<?php echo 'web/js/'.Config::$mvc_jqmin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_jqdropomin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_jqscrollymin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_skelmin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_util_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_main_js ?>"></script>
        
        <script src="<?php echo 'web/js/'.Config::$mvc_jq_transition ?>"></script>
    </head>

    <body class="background-color-blue">
        <div id="page-wrapper">
            <header id="header">
                <h1 id="logo"><a href="index.php">Triviadísimos</a></h1>
                <nav id="nav">
                    <ul> 
                        <li class="submenu">
                            <a>Opciones</a>
                            <ul>
                            <?php                           
                            if($_SESSION['privilegio']=='admin'){  
                            ?>
                                <li><a href="edition">Edici&oacuten Preguntas</a></li>
                            <?php
                            }
                            ?>
                                <li><a href="finishedGames">Partidas finalizadas</a></li>
                                <li><a href="stats">Estad&iacutesticas</a></li>
                                <li><a href="profile">Perfil</a></li>
                                <li><a href="#">Ayuda</a></li>
                                <li><a href="closeSession">Cerrar sesi&oacuten</a></li>
                            </ul>
                        </li>  
                        <li class="submenu">
                            <a>Iniciar nueva partida</a>
                            <ul>
                                <li><a href="createNormalGame">Partida Normal</a></li>
                                <li><a href="createDisneyGame">Partida Disney</a></li>
                            </ul>
                        </li>    
                        <li><a href="index.php">Principal</a></li>                  
                    </ul>
                </nav>
            </header>
        </div>

        <div id="contenido">
            <?php echo $contenido ?>
        </div>     
     </body>
 </html>