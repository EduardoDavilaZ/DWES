<?php

	require_once '../model/Padre.php';

	function validarCheckBoxPadres(){
		if (isset($_POST["padres"])){
			return $_POST["padres"];
		} else {
			echo "No has seleccionado ningún padre";
			echo '<br><a href="../eliminarPadres.php">Volver</a>';
			die();
		}
	}
		
	$arrayPadres = validarCheckBoxPadres();
	$padres = implode(", ", $arrayPadres); // Probar implode
	
	$padre = new Padre();
	$padre->eliminarPadres($padres);
?>