<?php
	require_once '../model/Hijo.php';
	require_once '../model/Diario.php';
	require_once '../model/Padre.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/recogerDatosPadres.php" method="POST">
		<label>Selecciona los padres a eliminar</label><br>
		
		<?php
			$padres = new Padre();
			$resultado = $padres->listarPadres();
			
			if ($resultado->num_rows > 0){
				while($fila = $resultado->fetch_assoc()){
					echo '<input type="checkbox" name="padres[]" value="' . $fila["idPadre"] . '">' . $fila["nombre"] . '<br>';
				}
			}	
		?>
		
		<input type="submit" value="Eliminar">
	</form>
</body>
</html>