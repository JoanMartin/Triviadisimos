<!DOCTYPE HTML>

<html>
    <head>
        <title>Triviad&iacutesimos</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_vis_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_mainlay_css ?>" />

        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jq_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_js1_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_jq1_js ?>"></script>

    </head>

    <body>
        <div>
            <!-- Header -->
            <header id="header">
                <h4 id="logo"><strong><a href="#">Triviad&iacutesimos</a></strong></h4>
                <nav id="nav">
                    <ul>
                        <li class="menu"><a href="#">Ayuda</a></li>
                    </ul>
                </nav>
            </header>
        </div>


    <!--BLACK SCREEN TO LOGIN-->
    <div class="row" id="divBlack" >
    </div>
    <?php 

        session_start();
        
        if(!isset($_SESSION['username'])){
            $sesion=0;
            session_destroy();            
            echo "<div style=' position:absolute; top:100px; background-color:blue'><p>NOOOO INICIADO</p></div>";
            //Sesión No iniciada

        }else{ 
            
            echo "<div style='position:absolute; top:100px; background-color:green'><p>INICIADO</p></div>";
            //Sesión Iniciada
        }
    ?>

    <!--REGISTER FORM-->
    <div class="container">
        <div class="row centered-form">
            <div class="col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default" id="divRegister" name="divRegister">
                    <div class="panel-heading">
                        <h3 class="panel-title">Resgitro<small>&#161Es gratuito!</small></h3>
                    </div>
                        <div class="panel-body">
                        <form role="form" method="post" action="index.php?ctl=registerUser" >
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nick" id="nick" class="form-control input-sm" placeholder="Nick">
                                    </div>
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre">
                                    </div>
                                </div>
                                 <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="apellidos" id="apellidos" class="form-control input-sm" placeholder="Apellidos">
                                    </div>
                                </div>                               
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email">
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Contrase&#241a">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirmar Contrase&#241a">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Registrarse" class="btn btn-info btn-block">
                        
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <!--LOGIN FORM-->
    <div class="container">
        <div class="row centered-form">
            <div class="col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default" id="divLogin" name="divLogin">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login<small>&#161A jugar!</small></h3>
                    </div>
                        <div class="panel-body">
                        <form role="form" method="post" action="index.php?ctl=loginUser" >
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nickLogin" id="nickLogin" class="form-control input-sm" placeholder="Nick">
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="passwordLogin" id="passwordLogin" class="form-control input-sm" placeholder="Contrase&#241a">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Entrar" class="btn btn-info btn-block">
                        
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