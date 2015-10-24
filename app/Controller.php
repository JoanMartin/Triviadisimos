<?php

 	class Controller
 	{

     	public function inicio()
     	{
         	$params = array(
	             'mensaje' => 'Bienvenido al curso de symfony 1.4',
	             'fecha' => date('d-m-yyy'),
         	);
         	require __DIR__ . '/templates/inicio.php';
     	}
 	}