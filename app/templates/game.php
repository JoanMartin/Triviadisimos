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
		foreach ($game as $g) {
			switch ($g['categoria']) {
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
		?>

		<div id="categories" class="column col-4">


			<div class="row">
				<div id="btnStop" class="category-container first" style="background-color:<?php echo $color['green']?>">
					<p>parame</p>
				</div>
			</div>


			<div class="row">
				<div id="cat1" class="category-container" style="background-color:<?php echo $color['green']?>">
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


		<div class="column col-7">
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