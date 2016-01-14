<?php ob_start() ?>

		<?php 
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
		?>


        <div class="container-level userPage">
            <div class="row">
                <div class="column col-5">
                    <h3><?php echo $params['level']['nivel'] ?></h3>
                </div>
                <div class="column col-7 level-image">
                    <img class="img-responsive" src="web/images/levels/<?php echo $params['level']['img'] ?>">
                </div>
            </div>
        </div>

		<div class="row" id="blackDiv"></div>
		<center>
			<img id="congratulationsImgLeft" src="web/images/congratulationsLeft.gif">
			<img id="congratulationsImgRight" src="web/images/congratulationsRight.gif">
		</center>

		<?php if ($params['world']['nombreMundo'] == 'Normal'){ ?>
			<div id="categories" class="column col-3">
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
			<div id="categories" class="column col-3">
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


		<div class="column col-1">
			<div class="outer">
				<div id='progressBar' class="inner">
					<div></div>
				</div>        
			</div>
		</div>


		<div id="btnStop" class="column col-7">
			<center>
				<img class="img-responsive" src="web/images/stopButton.png" style="cursor: pointer">
			</center>
		</div>


		<div id="questionDiv" class="column col-7">
			<div class="row">
				<div class="question-container">
					<p id="question"></p>
				</div>
			</div>
			<div class="row">
				<div id="ans1" class="answer-container">
					<p id="answer1"></p>
				</div>
			</div>
			<div class="row">
				<div id="ans2" class="answer-container">
					<p id="answer2"></p>
				</div>
			</div>
			<div class="row">
				<div id="ans3" class="answer-container">
					<p id="answer3"></p>
				</div>
			</div>
			<div class="row">
				<div id="ans4" class="answer-container">
					<p id="answer4"></p>
				</div>
			</div>
		</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'user_layout.php' ?>