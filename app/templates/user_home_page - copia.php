<?php ob_start() ?>

	<section class="wrapper style4 first">
		<header class="game-container title-blue">
			<h2>Te toca jugar</h2>
		</header>
		<div class="row">
			<div class="column col-2">
				<section class="game-container game">
				</section>
			</div>
			<div class="column col-5">
				<section class="game-container game">
					<div class="row">
						<div class="column col-6">
							<header>
								<h3>Joan Martín</h3>
							</header>
                		</div>

						<div class="column col-6">
							<div class="row">
								<div class="column col-12">
			                    	<ul class="icons">			
				                        <li class="icon circle cat1"></li>					
				                        <li class="icon circle cat2"></li>					
				                        <li class="icon circle cat3"></li>					
				                    </ul>
		                		</div>
							</div>
							<div class="row">
								<div class="column col-12">
			                    	<ul class="icons">			
				                        <li class="icon circle cat4"></li>					
				                        <li class="icon circle cat5"></li>					
				                        <li class="icon circle cat6"></li>					
				                    </ul>
		                		</div>
							</div>
						</div>
            		</div>
				</section>
			</div>
			<div class="column col-5">
				<section class="game-container game">
					<div class="row">
						<div class="column col-6">
							<header>
								<h3>Joan Martín</h3>
							</header>
                		</div>

						<div class="column col-6">
							<div class="row">
								<div class="column col-12">
			                    	<ul class="icons">			
				                        <li class="icon circle cat1"></li>					
				                        <li class="icon circle cat2"></li>					
				                        <li class="icon circle cat3"></li>					
				                    </ul>
		                		</div>
							</div>
							<div class="row">
								<div class="column col-12">
			                    	<ul class="icons">			
				                        <li class="icon circle cat4"></li>					
				                        <li class="icon circle cat5"></li>					
				                        <li class="icon circle cat6"></li>					
				                    </ul>
		                		</div>
							</div>
						</div>
            		</div>
				</section>
			</div>
		</div>
	</section>

	<section class="wrapper style4">
	</section>

	<section class="wrapper style4">
	</section>

<?php $contenido = ob_get_clean() ?>

<?php include 'user_layout.php' ?>