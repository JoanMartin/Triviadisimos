<!DOCTYPE HTML>

<html>
    <head>
        <title>Triviadísimos</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_user_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_mainlay_css ?>" />

        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jq_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_js1_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_jq1_js ?>"></script>
    </head>

    <body class="background-color-blue">
        <div>
            <!-- Header -->
            <header id="header">
                <h1 id="logo"><a href="#">Triviadísimos</a></h1>
                <nav id="nav">
                    <ul>
                        <li class="menu"><a href="#">Ayuda</a></li>
                        <li class="menu"><a href="index.php?ctl=closeSession">Cerrar sesi&oacuten</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div id="contenido">
            <?php echo $contenido ?>
        </div>        
     </body>
 </html>