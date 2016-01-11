<!DOCTYPE HTML>

<html>
    <head>
        <title>Triviad&iacutesimos</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_mainlay_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_validate_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_errRepeated_css ?>" />


        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jq_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_js1_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jq1_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_validate_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_valadmet_js ?>"></script>

    </head>

    <body>
        <div>
            <!-- Header -->
            <header id="header">
                <h1 id="logo"><a href="index.php">Triviadísimos</a></h1>
                <nav id="nav">
                    <ul>
                        <li class="menu"><a href="#">Ayuda</a></li>
                        <li class="buttonPointer"><a onclick="LoginFunction()">Iniciar sesi&oacuten</a></li>
                        <li><a onclick="RegisterFunction()" class="button special">Registrarse</a></li>
                    </ul>
                </nav>
            </header>
        </div>


        <!--BLACK SCREEN TO LOGIN-->
        <div class="row" id="divBlack"></div>

        <!--REGISTER FORM-->
        <div class="container-login">
            <div class="row centered-form">
                <div class="col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="panel panel-default" id="divRegister" name="divRegister">
                        <div class="panel-heading">
                            <h3 class="panel-title">Registro</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" id="formRegister" name="formRegister" method="post" action="registerUser" >
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="nick" id="nick" class="form-control input-sm" placeholder="Nick" required>
                                        </div>
                                    </div>                                
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="apellidos" id="apellidos" class="form-control input-sm" placeholder="Apellidos" required>
                                        </div>
                                    </div>                               
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email" required>
                                        </div>
                                    </div>                               
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Contrase&#241a" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirmar Contrase&#241a" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Registrarse" class="btn btn-info btn-block button special">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--LOGIN FORM-->
        <div class="container-login">
            <div class="row centered-form">
                <div class="col-md-4 col-sm-offset-2 col-md-offset-4">
                    <div class="panel panel-default" id="divLogin" name="divLogin">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="loginUser" >
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="nickLogin" id="nickLogin" class="form-control input-sm" placeholder="Nick">
                                        </div>
                                    </div>                                
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input type="password" name="passwordLogin" id="passwordLogin" class="form-control input-sm" placeholder="Contrase&#241a">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Entrar" class="btn btn-info btn-block button special">
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="contenido">
            <?php echo $contenido ?>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="row">
                <div class="column col-2">
                    <ul class="default">
                        <li class="title">Triviadísimos</li>
                        <li><a class="item" onclick="RegisterFunction()">Registrarse</a></li>
                        <li><a class="item" onclick="LoginFunction()">Iniciar sesión</a></li>
                    </ul>
                </div>
                <div class="column col-2">
                    <ul class="default">
                        <li class="title">Participa</li>
                        <li class="item">Contacto</li>
                        <li class="item">Foro</li>
                    </ul>
                </div>
                <div class="column col-4">
                    <ul class="icons">
                        <li><a class="icon circle one"></a></li>
                        <li><a class="icon circle two"></a></li>
                        <li><a class="icon circle three"></a></li>
                        <li><a class="icon circle four"></a></li>
                        <li><a class="icon circle five"></a></li>
                    </ul>
                </div>
                <div class="column col-2">
                    <ul class="default">
                        <li class="title">Quiénes somos</li>
                        <li class="item">Preguntas frecuentes</li>
                        <li class="item">Ayuda</li>
                    </ul>
                </div>
                <div class="column col-2">
                    <ul class="default">
                        <li class="title">Apps & Social</li>
                        <li class="item">Facebook</li>
                        <li class="item">Twitter</li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
 </html>