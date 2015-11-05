<!DOCTYPE HTML>

<html>
    <head>
        <title>Triviadísimos</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_main_css ?>" />
    </head>

    <body>
        <div>
            <!-- Header -->
            <header id="header">
                <h1 id="logo"><a href="#">Triviadísimos</a></h1>
                <nav id="nav">
                    <ul>
                        <li class="menu"><a href="#">Ayuda</a></li>
                        <li class="menu"><a href="#">Iniciar sesión</a></li>
                        <li><a href="#" class="button special">Registrarse</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div id="contenido">
            <?php echo $contenido ?>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="row">
                <div class="column col-2">
                    <ul class="default">
                        <li class="title">Rellenar</li>
                        <li class="item">Rellenar</li>
                        <li class="item">Rellenar</li>
                    </ul>
                </div>
                <div class="column col-2">
                    <ul class="default">
                        <li class="title">Rellenar</li>
                        <li class="item">Rellenar</li>
                        <li class="item">Rellenar</li>
                    </ul>
                </div>
                <div class="column col-4">
                    <ul class="icons">
                        <li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
                        <li><a href="#" class="icon circle fa-github"><span class="label">Github</span></a></li>
                        <li><a href="#" class="icon circle fa-dribbble"><span class="label">Dribbble</span></a></li>
                    </ul>
                </div>
                <div class="column col-2">
                    <ul class="default">
                        <li class="title">Rellenar</li>
                        <li class="item">Rellenar</li>
                        <li class="item">Rellenar</li>
                    </ul>
                </div>
                <div class="column col-2">
                    <ul class="default">
                        <li class="title">Rellenar</li>
                        <li class="item">Rellenar</li>
                        <li class="item">Rellenar</li>
                    </ul>
                </div>
            </div>
        </footer>
        
     </body>
 </html>