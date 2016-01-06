<?php ob_start() ?>

	<section class="wrapper style4 first">
		<header class="game-container title-blue">
			<h2>Te toca jugar</h2>
		</header>

		<?php 
		$partida = 0;
		foreach ($params['games'] as $games):
			if (($games['TurnoJug1'] == 1) and ($partida != $games['Partida'])):
				$partida = $games['Partida'];?>

				<div class="row">
					<form action="index.php?ctl=game" method="POST">
						<input type="hidden" name="game" value="<?php echo $games['Partida']?>" />
						<a href="#" class="fill-div" onclick="this.parentNode.submit()">

							<div class="column col-2">
								<section class="game-container imageProfile" style="height:10.2em">
									<img class="img-responsive" src="web/images/<?php echo $games['ImagenMundo']?>">
								</section>
							</div>
							<div class="column col-5">
								<section class="game-container game">
									<div class="row">
										<div class="column col-6">
											<div class="row">
												<div class="column col-12">
													<header>
														<h3><?php echo $games['NomJug1']?></h3>
													</header>
						                		</div>
											</div>
											<div class="row">
												<div class="column col-12 user-image">
									 				<img class="img-responsive" src="web/images/users/<?php echo $games['ImagenJug1']?>.jpg">
						                		</div>
											</div>
				                		</div>

				                		<?php 
								        $color = array(
								            'green' => '#C6C6C6',
								            'yellow' => '#C6C6C6',
								            'blue' => '#C6C6C6',
								            'red' => '#C6C6C6',
								            'purple' => '#C6C6C6',
								            'orange' => '#C6C6C6',
								        );
										foreach ($params['games'] as $inter) {
											if (($inter['InterJug'] == $inter['PartJug1']) and 
												($partida == $inter['Partida']) and 
												($inter['PregAcertada'] == 1)) {
												switch ($inter['NomCat']) {
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

										<div class="column col-6">
											<div class="row">
												<div class="column col-12">
							                    	<ul class="icons">			
								                        <li class="icon circle" style="background:<?php echo $color['green']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['yellow']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['blue']?>"></li>		
								                    </ul>
						                		</div>
											</div>
											<div class="row">
												<div class="column col-12">
							                    	<ul class="icons">			
								                        <li class="icon circle" style="background:<?php echo $color['red']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['purple']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['orange']?>"></li>					
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
											<div class="row">
												<div class="column col-12">
													<header>
														<h3><?php echo $games['NomJug2']?></h3>
													</header>
						                		</div>
											</div>
											<div class="row">
												<div class="column col-12 user-image">
									 				<img class="img-responsive" src="web/images/users/<?php echo $games['ImagenJug2']?>.jpg">
						                		</div>
											</div>
				                		</div>

				                		<?php 
								        $color = array(
								            'green' => '#C6C6C6',
								            'yellow' => '#C6C6C6',
								            'blue' => '#C6C6C6',
								            'red' => '#C6C6C6',
								            'purple' => '#C6C6C6',
								            'orange' => '#C6C6C6',
								        );
										foreach ($params['games'] as $inter) {
											if (($inter['InterJug'] == $inter['PartJug2']) and 
												($partida == $inter['Partida']) and 
												($inter['PregAcertada'] == 1)) {
												switch ($inter['NomCat']) {
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

										<div class="column col-6">
											<div class="row">
												<div class="column col-12">
							                    	<ul class="icons">			
								                        <li class="icon circle" style="background:<?php echo $color['green']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['yellow']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['blue']?>"></li>		
								                    </ul>
						                		</div>
											</div>
											<div class="row">
												<div class="column col-12">
							                    	<ul class="icons">			
								                        <li class="icon circle" style="background:<?php echo $color['red']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['purple']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['orange']?>"></li>					
								                    </ul>
						                		</div>
											</div>
										</div>
				            		</div>
								</section>
							</div>
						</a>
					</form>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</section>





	<section class="wrapper style4">
		<header class="game-container title-blue">
			<h2>Le toca jugar</h2>
		</header>

		<?php 
		$partida = 0;
		foreach ($params['games'] as $games):
			if (($games['TurnoJug1'] == 0) and ($partida != $games['Partida'])):
				$partida = $games['Partida'];?>

				<div class="row">
					<div class="column col-2">
						<section class="game-container imageProfile" style="height:10.2em">
							 <img class="img-responsive" src="web/images/<?php echo $games['ImagenMundo']?>">
						</section>
					</div>
					<div class="column col-5">
						<section class="game-container game">
							<div class="row">
								<div class="column col-6">
									<div class="row">
										<div class="column col-12">
											<header>
												<h3><?php echo $games['NomJug1']?></h3>
											</header>
				                		</div>
									</div>
									<div class="row">
										<div class="column col-12 user-image">
							 				<img class="img-responsive" src="web/images/users/<?php echo $games['ImagenJug1']?>.jpg">
				                		</div>
									</div>
		                		</div>

		                		<?php 
						        $color = array(
						            'green' => '#C6C6C6',
						            'yellow' => '#C6C6C6',
						            'blue' => '#C6C6C6',
						            'red' => '#C6C6C6',
						            'purple' => '#C6C6C6',
						            'orange' => '#C6C6C6',
						        );
								foreach ($params['games'] as $inter) {
									if (($inter['InterJug'] == $inter['PartJug1']) and 
										($partida == $inter['Partida']) and 
										($inter['PregAcertada'] == 1)) {
										switch ($inter['NomCat']) {
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

								<div class="column col-6">
									<div class="row">
										<div class="column col-12">
					                    	<ul class="icons">			
						                        <li class="icon circle" style="background:<?php echo $color['green']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['yellow']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['blue']?>"></li>		
						                    </ul>
				                		</div>
									</div>
									<div class="row">
										<div class="column col-12">
					                    	<ul class="icons">			
						                        <li class="icon circle" style="background:<?php echo $color['red']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['purple']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['orange']?>"></li>					
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
									<div class="row">
										<div class="column col-12">
											<header>
												<h3><?php echo $games['NomJug2']?></h3>
											</header>
				                		</div>
									</div>
									<div class="row">
										<div class="column col-12 user-image">
							 				<img class="img-responsive" src="web/images/users/<?php echo $games['ImagenJug2']?>.jpg">
				                		</div>
									</div>
		                		</div>

		                		<?php 
						        $color = array(
						            'green' => '#C6C6C6',
						            'yellow' => '#C6C6C6',
						            'blue' => '#C6C6C6',
						            'red' => '#C6C6C6',
						            'purple' => '#C6C6C6',
						            'orange' => '#C6C6C6',
						        );
								foreach ($params['games'] as $inter) {
									if (($inter['InterJug'] == $inter['PartJug2']) and 
										($partida == $inter['Partida']) and 
										($inter['PregAcertada'] == 1)) {
										switch ($inter['NomCat']) {
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

								<div class="column col-6">
									<div class="row">
										<div class="column col-12">
					                    	<ul class="icons">			
						                        <li class="icon circle" style="background:<?php echo $color['green']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['yellow']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['blue']?>"></li>		
						                    </ul>
				                		</div>
									</div>
									<div class="row">
										<div class="column col-12">
					                    	<ul class="icons">			
						                        <li class="icon circle" style="background:<?php echo $color['red']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['purple']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['orange']?>"></li>					
						                    </ul>
				                		</div>
									</div>
								</div>
		            		</div>
						</section>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</section>

	<section class="wrapper style4">
	</section>

<?php $contenido = ob_get_clean() ?>

<?php include 'user_layout.php' ?>