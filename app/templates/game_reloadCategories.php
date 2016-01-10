<?php
    
    require_once ('../Config.php');
    require_once ('../UserGamesModel.php');

    $m = new UserGamesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

    session_start();
    $game = $_SESSION['game'];
    $nick = $_SESSION["username"];

    $params = array(
        'game' => $m->getGame($game, $nick),
        'world' => $m->getWorld($game),
    );

    if ($params['game'] != 'GameFinished'){
        $color = array(
            'green' => '#C6C6C6',
            'yellow' => '#C6C6C6',
            'blue' => '#C6C6C6',
            'red' => '#C6C6C6',
            'purple' => '#C6C6C6',
            'orange' => '#C6C6C6',
        );
        foreach ($params['game'] as $game) {
            if ($game['PregAcertada'] == 1) {
                switch ($game['categoria']) {
                    case 'Ciencia':
                        $color['green'] = '#00FF00';
                        break;
                    case 'Historia':
                        $color['yellow'] = '#FFFF00';
                        break;
                    case 'Geografía':
                        $color['blue'] = '#00FFF7';
                        break;
                    case 'Arte y literatura':
                        $color['red'] = '#FF0000';
                        break;
                    case 'Espectáculos':
                        $color['purple'] = '#FF00F3';
                        break;
                    case 'Deportes':
                        $color['orange'] = '#FFAF00';
                        break;

                    case 'Maravilloso mundo de Disney':
                        $color['green'] = '#00FF00';
                        break;
                    case 'Monstruos y villanos':
                        $color['yellow'] = '#FFFF00';
                        break;
                    case 'Había una vez':
                        $color['blue'] = '#00FFF7';
                        break;
                    case 'Lugares y objetos':
                        $color['red'] = '#FF0000';
                        break;
                    case 'Estrellas secundarias':
                        $color['purple'] = '#FF00F3';
                        break;
                    case 'Héroes y heroínas':
                        $color['orange'] = '#FFAF00';
                        break;
                }
            }
        }
    }
    ?>



    <?php if ($params['world']['nombreMundo'] == 'Normal'){ ?>
        <div id="categories">
            <div class="row">
                <div id="cat1" class="category-container first" style="background-color:<?php echo $color['green']?>">
                    <p>Ciencia</p>
                </div>
            </div>
            <div class="row">
                <div id="cat2" class="category-container" style="background:<?php echo $color['yellow']?>">
                    <p>Historia</p>
                </div>
            </div>
            <div class="row">
                <div id="cat3" class="category-container" style="background:<?php echo $color['blue']?>">
                    <p>Geografía</p>
                </div>
            </div>
            <div class="row">
                <div id="cat4" class="category-container" style="background:<?php echo $color['red']?>">
                    <p>Arte y literatura</p>
                </div>
            </div>
            <div class="row">
                <div id="cat5" class="category-container" style="background:<?php echo $color['purple']?>">
                    <p>Espectáculos</p>
                </div>
            </div>
            <div class="row">
                <div id="cat6" class="category-container" style="background:<?php echo $color['orange']?>">
                    <p>Deportes</p>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div id="categories">
            <div class="row">
                <div id="cat1" class="category-container first" style="background-color:<?php echo $color['green']?>">
                    <p>Maravilloso mundo de Disney</p>
                </div>
            </div>
            <div class="row">
                <div id="cat2" class="category-container" style="background:<?php echo $color['yellow']?>">
                    <p>Monstruos y villanos</p>
                </div>
            </div>
            <div class="row">
                <div id="cat3" class="category-container" style="background:<?php echo $color['blue']?>">
                    <p>Había una vez</p>
                </div>
            </div>
            <div class="row">
                <div id="cat4" class="category-container" style="background:<?php echo $color['red']?>">
                    <p>Lugares y objetos</p>
                </div>
            </div>
            <div class="row">
                <div id="cat5" class="category-container" style="background:<?php echo $color['purple']?>">
                    <p>Estrellas secundarias</p>
                </div>
            </div>
            <div class="row">
                <div id="cat6" class="category-container" style="background:<?php echo $color['orange']?>">
                    <p>Héroes y heroínas</p>
                </div>
            </div>
        </div>
    <?php }; ?>