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
				<div class="column col-4">
					<header>
						<h2>Los mejores jugadores de <strong>Triviadísimos</strong>!</h2>
					</header>
					<p>¿Quieres ser uno de ellos?</p>
					<footer>
						<ul class="buttons">
							<li><a href="#" class="button">Juega ya</a></li>
						</ul>
					</footer>					
				</div>
			</div>
		</section>

	<!-- Two -->
		<section class="wrapper style2">
		</section>

<?php $contenido = ob_get_clean() ?>

<?php include 'main_layout.php' ?>