<!DOCTYPE HTML>

<html>
    <head>
        <title>Triviad&iacutesimos</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_user_main_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_divBlack_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_game_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_stats_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_profile_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_errRepeated_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_validate_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_editAdmin_css ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo 'web/css/'.Config::$mvc_help_css ?>" />

        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jq_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_jqmin_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_validate_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_valadmet_js ?>"></script>
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_editAdmin_js ?>"></script>

        <script src="<?php echo 'web/js/'.Config::$mvc_jqdropomin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_jqscrollymin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_skelmin_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_util_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_main_js ?>"></script>
        
        <script type="text/javascript" src="<?php echo 'web/js/'.Config::$mvc_divBlack_js ?>"></script>
        <script src="<?php echo 'web/js/'.Config::$mvc_game_transition ?>"></script>
    </head>

    <body class="background-color-blue">
        <div id="page-wrapper">
            <header id="header">
                <h1 id="logo"><a href="index.php">Triviad&iacutesimos</a></h1>
                <nav id="nav">
                    <ul> 
                        <li class="submenu">
                            <a><?php echo $_SESSION['username'] ?></a>
                            <ul>
                                <?php if($_SESSION['privilegio']=='admin'){ ?>
                                    <li>       
                                        <li class="submenu">
                                        <a>Opciones de administrador</a>
                                            <ul>
                                                <li><a onclick="changePrivilege()">Cambiar privilegios</a></li>
                                                <li><a href="edition">Edici&oacuten Preguntas</a></li>
                                            </ul>
                                        </li> 
                                    </li>
                                <?php } ?>
                                <li><a href="finishedGames">Historial de partidas</a></li>
                                <li><a href="stats">Estad&iacutesticas</a></li>
                                <li><a href="profile">Perfil</a></li>
                                <li><a href="help">Ayuda</a></li>
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

        <!--BLACK SCREEN TO CHANGE PRIVILEGE-->
        <div class="row" id="divBlack"></div>


        <!--PRIVILEGE FORM-->
        <div class="container-login">
            <div class="row centered-form">
                <div class="col-md-4 col-sm-offset-2 col-md-offset-4">
                    <div class="panel panel-default" id="divPrivilege" name="divPrivilege">
                        <div class="panel-heading">
                            <h3 class="panel-title">Cambiar privilegios</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="changePrivilege" >
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="nick" id="nick" class="form-control input-sm" placeholder="Nick">
                                        </div>
                                    </div>                                
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="privilege" id="privilege">
                                                <option value="admin">Administrador</option>
                                                <option value="user">Usuario normal</option>
                                            </select>                                      
                                        </div>
                                    </div>                                
                                </div>
                                <input type="submit" value="Cambiar" class="btn btn-info btn-block button special">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="contenido">
            <?php echo $contenido ?>
        </div>     
     </body>
 </html>