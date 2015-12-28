<?php ob_start() ?>

<!-- Banner -->
	<section id="banner"></section>


<!-- Main -->
	<!-- One -->
		<section class="wrapper style1 special">
			<div class="row">
				<div class="column col-8">
					<div class="container">
					</div>
				</div>
				<div class="column col-4" style="padding: 3em 0em 0em 3em">
					<header>
						<h2>Los mejores jugadores de <strong>Triviadísimos</strong>!</h2>
					</header>
					<p>¿Quieres ser uno de ellos?</p>
					<footer>
						<ul class="buttons">
							<li><a onclick="RegisterFunction()" class="button">Juega ya</a></li>
						</ul>
					</footer>					
				</div>
			</div>
		</section>

<?php $contenido = ob_get_clean() ?>

<?php include 'main_layout.php' ?>