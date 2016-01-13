<?php ob_start() ?>

<!-- Banner -->
	<section class="banner">
		<div class="bgCircle bgCircle-home-a"></div>
		<div class="bgCircle bgCircle-home-b"></div>
		<div class="bgCircle bgCircle-home-c"></div>
	</section>


<!-- Main -->
	<!-- One -->
		<section class="wrapper style1 special">
			<div class="row">
				<div class="column col-8">
					<div class="container blue">


		                <div class="row">
				            <div class="container-bestUsers first">
				                <div class="row">
				                    <div class="column col-7">
						                <div class="row">
						                    <div class="column col-12">
				                        		<h3><?php echo $bestUsers[0]['Nick'] ?></h3>
			                        		</div>
		                        		</div>
						                <div class="row">
						                    <div class="column col-12 user-image">
						                        <img class="img-responsive" src="web/images/users/<?php echo $bestUsers[0]['URL_ImagenJugador'] ?>.jpg">
						                    </div>
		                        		</div>
				                    </div>
				                    <div class="column col-5 level">
				                        <img class="img-responsive" src="web/images/firstPlace.png">
				                    </div>
				                </div>
				            </div>
			            </div>


		                <div class="row">
		                    <div class="column col-6">
					            <div class="container-bestUsers second">
					                <div class="row">
					                    <div class="column col-7">
							                <div class="row">
							                    <div class="column col-12">
					                        		<h3><?php echo $bestUsers[1]['Nick'] ?></h3>
				                        		</div>
			                        		</div>
							                <div class="row">
							                    <div class="column col-12 user-image">
							                        <img class="img-responsive" src="web/images/users/<?php echo $bestUsers[1]['URL_ImagenJugador'] ?>.jpg">
							                    </div>
			                        		</div>
					                    </div>
					                    <div class="column col-5 level">
					                        <img class="img-responsive" src="web/images/secondPlace.png">
					                    </div>
					                </div>
					            </div>
				            </div>
		                    <div class="column col-6">
					            <div class="container-bestUsers third">
					                <div class="row">
					                    <div class="column col-7">
							                <div class="row">
							                    <div class="column col-12">
					                        		<h3><?php echo $bestUsers[2]['Nick'] ?></h3>
				                        		</div>
			                        		</div>
							                <div class="row">
							                    <div class="column col-12 user-image">
							                        <img class="img-responsive" src="web/images/users/<?php echo $bestUsers[2]['URL_ImagenJugador'] ?>.jpg">
							                    </div>
			                        		</div>
					                    </div>
					                    <div class="column col-5 level">
					                        <img class="img-responsive" src="web/images/thirdPlace.png">
					                    </div>
					                </div>
					            </div>
				            </div>
			            </div>


					</div>
				</div>


				<div class="column col-4" style="padding: 3em 0em 0em 3em">
					<header>
						<h2>Los mejores jugadores de <strong>Triviad&iacutesimos</strong>!</h2>
					</header>
					<p>&iquestQuieres ser uno de ellos?</p>
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