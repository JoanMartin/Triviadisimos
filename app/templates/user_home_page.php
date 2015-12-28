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
											'science' => '#C6C6C6',
											'history' => '#C6C6C6',
											'geography' => '#C6C6C6',
											'art' => '#C6C6C6',
											'performance' => '#C6C6C6',
											'sports' => '#C6C6C6',
										);
										foreach ($params['games'] as $inter) {
											if (($inter['InterJug'] == $inter['PartJug1']) and 
												($partida == $inter['Partida']) and 
												($inter['PregAcertada'] == 1)) {
												switch ($inter['NomCat']) {
												    case 'Ciencia':
												        $color['science'] = '#00FF00';
												        break;
												    case 'Historia':
												        $color['history'] = '#FFFF00';
												        break;
												    case 'Geografía':
												        $color['geography'] = '#00FFF7';
												        break;
												    case 'Arte y literatura':
												        $color['art'] = '#FF0000';
												        break;
												    case 'Espectáculos':
												        $color['performance'] = '#FF00F3';
												        break;
												    case 'Deportes':
												        $color['sports'] = '#FFAF00';
												        break;
												}
											}
										}
										?>

										<div class="column col-6">
											<div class="row">
												<div class="column col-12">
							                    	<ul class="icons">			
								                        <li class="icon circle" style="background:<?php echo $color['science']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['history']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['geography']?>"></li>		
								                    </ul>
						                		</div>
											</div>
											<div class="row">
												<div class="column col-12">
							                    	<ul class="icons">			
								                        <li class="icon circle" style="background:<?php echo $color['art']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['performance']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['sports']?>"></li>					
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
											'science' => '#C6C6C6',
											'history' => '#C6C6C6',
											'geography' => '#C6C6C6',
											'art' => '#C6C6C6',
											'performance' => '#C6C6C6',
											'sports' => '#C6C6C6',
										);
										foreach ($params['games'] as $inter) {
											if (($inter['InterJug'] == $inter['PartJug2']) and 
												($partida == $inter['Partida']) and 
												($inter['PregAcertada'] == 1)) {
												switch ($inter['NomCat']) {
												    case 'Ciencia':
												        $color['science'] = '#00FF00';
												        break;
												    case 'Historia':
												        $color['history'] = '#FFFF00';
												        break;
												    case 'Geografía':
												        $color['geography'] = '#00FFF7';
												        break;
												    case 'Arte y literatura':
												        $color['art'] = '#FF0000';
												        break;
												    case 'Espectáculos':
												        $color['performance'] = '#FF00F3';
												        break;
												    case 'Deportes':
												        $color['sports'] = '#FFAF00';
												        break;
												}
											}
										}
										?>

										<div class="column col-6">
											<div class="row">
												<div class="column col-12">
							                    	<ul class="icons">			
								                        <li class="icon circle" style="background:<?php echo $color['science']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['history']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['geography']?>"></li>		
								                    </ul>
						                		</div>
											</div>
											<div class="row">
												<div class="column col-12">
							                    	<ul class="icons">			
								                        <li class="icon circle" style="background:<?php echo $color['art']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['performance']?>"></li>	
								                        <li class="icon circle" style="background:<?php echo $color['sports']?>"></li>					
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
									'science' => '#C6C6C6',
									'history' => '#C6C6C6',
									'geography' => '#C6C6C6',
									'art' => '#C6C6C6',
									'performance' => '#C6C6C6',
									'sports' => '#C6C6C6',
								);
								foreach ($params['games'] as $inter) {
									if (($inter['InterJug'] == $inter['PartJug1']) and 
										($partida == $inter['Partida']) and 
										($inter['PregAcertada'] == 1)) {
										switch ($inter['NomCat']) {
										    case 'Ciencia':
										        $color['science'] = '#00FF00';
										        break;
										    case 'Historia':
										        $color['history'] = '#FFFF00';
										        break;
										    case 'Geografía':
										        $color['geography'] = '#00FFF7';
										        break;
										    case 'Arte y literatura':
										        $color['art'] = '#FF0000';
										        break;
										    case 'Espectáculos':
										        $color['performance'] = '#FF00F3';
										        break;
										    case 'Deportes':
										        $color['sports'] = '#FFAF00';
										        break;
										}
									}
								}
								?>

								<div class="column col-6">
									<div class="row">
										<div class="column col-12">
					                    	<ul class="icons">			
						                        <li class="icon circle" style="background:<?php echo $color['science']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['history']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['geography']?>"></li>		
						                    </ul>
				                		</div>
									</div>
									<div class="row">
										<div class="column col-12">
					                    	<ul class="icons">			
						                        <li class="icon circle" style="background:<?php echo $color['art']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['performance']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['sports']?>"></li>					
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
									'science' => '#C6C6C6',
									'history' => '#C6C6C6',
									'geography' => '#C6C6C6',
									'art' => '#C6C6C6',
									'performance' => '#C6C6C6',
									'sports' => '#C6C6C6',
								);
								foreach ($params['games'] as $inter) {
									if (($inter['InterJug'] == $inter['PartJug2']) and 
										($partida == $inter['Partida']) and 
										($inter['PregAcertada'] == 1)) {
										switch ($inter['NomCat']) {
										    case 'Ciencia':
										        $color['science'] = '#00FF00';
										        break;
										    case 'Historia':
										        $color['history'] = '#FFFF00';
										        break;
										    case 'Geografía':
										        $color['geography'] = '#00FFF7';
										        break;
										    case 'Arte y literatura':
										        $color['art'] = '#FF0000';
										        break;
										    case 'Espectáculos':
										        $color['performance'] = '#FF00F3';
										        break;
										    case 'Deportes':
										        $color['sports'] = '#FFAF00';
										        break;
										}
									}
								}
								?>

								<div class="column col-6">
									<div class="row">
										<div class="column col-12">
					                    	<ul class="icons">			
						                        <li class="icon circle" style="background:<?php echo $color['science']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['history']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['geography']?>"></li>		
						                    </ul>
				                		</div>
									</div>
									<div class="row">
										<div class="column col-12">
					                    	<ul class="icons">			
						                        <li class="icon circle" style="background:<?php echo $color['art']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['performance']?>"></li>	
						                        <li class="icon circle" style="background:<?php echo $color['sports']?>"></li>					
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