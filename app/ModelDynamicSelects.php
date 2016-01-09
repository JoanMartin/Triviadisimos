<?php

	//INICIO => Carga todas los mundos de la BD
        //header("Location: ./hollaaaa"); 

        if (isset($_GET['inicio'])){

        	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "bdtriviadisimos";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 	
		
			$inicio = mysql_real_escape_string($_GET['inicio']);
		 		
    		$sql = "SELECT DISTINCT `Nombre_Mundo` FROM `bdtriviadisimos`.`mundo`";
			$result = $conn->query($sql);
	
			if ($result->num_rows > 0) {
				echo "<option>Seleccione el mundo</option>";
				while($row = $result->fetch_assoc()) {
					echo '<option value="'.$row['Nombre_Mundo'].'">'.$row['Nombre_Mundo'].'</option>';
				}
			}else{
				echo '<option value="No se encuentran resultados">No se encuentran resultados</option>';
			}
		}


 	//MUNDO

	if (isset($_GET['mundo'])){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "bdtriviadisimos";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 	
		
		
		$mundo = mysql_real_escape_string($_GET['mundo']);

		//echo "<script type='text/javascript'>alert('$mundo');</script>";

    	$sql = "SELECT DISTINCT `Nombre_Categoria` FROM `bdtriviadisimos`.`mundo`
    	INNER JOIN `bdtriviadisimos`.`categoria` ON `mundo`.`id_mundo` = `categoria`.`id_mundo`
    	WHERE `Nombre_Mundo` = '$mundo'";

		$result = $conn->query($sql);
	
		if ($result->num_rows > 0) {
			echo "<option>Seleccione una categoria</option>";
			while($row = $result->fetch_assoc()) {	

				echo '<option value="'.$row['Nombre_Categoria'].'">'.$row['Nombre_Categoria'].'</option>';
			}
		}else{
			echo '<option value="No se encuentran resultados">No se encuentran resultados</option>';
		}
	}



?>