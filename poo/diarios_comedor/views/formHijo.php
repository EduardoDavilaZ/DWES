<?php
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
    <form action="../controller/recogerDatosHijo.php" method="POST">
		<label for="hijo">Hijo: </label>
		<input type="text" name="nombre" id="nombre"/>
		
		<label for="padre">Padre: </label>
		<select name="padre" id="padre">
			
			<?php
				$padre = new Padre();
				$resultado = $padre->listarPadres();
				
				while($fila = $resultado->fetch_assoc()){
					echo '<option value="' . $fila["idPadre"] . '">' . $fila["nombre"] . '</option>';
				}
			?>
			
		</select>
		
		<input type="submit" value="Enviar"/>
	</form>
</body>
</html>