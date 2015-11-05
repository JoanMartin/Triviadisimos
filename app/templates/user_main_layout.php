<!DOCTYPE HTML>

<html>
    <head>
        <title>Triviadísimos</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_user_main_css ?>" />
    </head>

    <body class="background-color-blue">
        <div>
            <!-- Header -->
            <header id="header">
                <h1 id="logo"><a href="#">Triviadísimos</a></h1>
                <nav id="nav">
                    <ul>
                        <li class="menu"><a href="#">Iniciar nueva partida</a></li>
                        <li><a href="#" class="button special">Registrarse</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div id="contenido">
            <?php echo $contenido ?>
        </div>        
     </body>
 </html>