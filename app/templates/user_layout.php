<!DOCTYPE HTML>

<html>
    <head>
        <title>Triviad&iacutesimos</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_user_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_mainlay_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_stats_css ?>" />

        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jq_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_js1_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jq1_js ?>"></script>

        <script src="<?php echo 'web/js/'.Config::$mvc_jqmin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_jqdropomin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_jqscrollymin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_skelmin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_util_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_main_js ?>"></script>
    </head>

    <body class="background-color-blue">
        <div>
            <!-- Header -->
            <header id="header">
                <h1 id="logo"><a href="#">Triviadísimos</a></h1>
                <nav id="nav">
                    <ul> 
                        <li class="submenu">
                            <a href="#">Opciones</a>
                            <ul>
                                <li><a href="#">Ayuda</a></li>
                                <li class="menu"><a href="index.php?ctl=stats">Estad&iacutesticas</a></li>
                                <li class="menu"><a href="index.php?ctl=closeSession">Cerrar sesi&oacuten</a></li>
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