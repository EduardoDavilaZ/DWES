<!DOCTYPE html>
<head>
	<title>Document</title>
</head>
<body>
	<?php
		$array = ["rojo", "azul", "verde", "amarillo"];

        print_r($array);
        
        echo "</br></br>";

        var_dump($array);

        echo "</br></br>";

        echo 'Primer color: ' . $array[0] . "</br>";
        echo 'Ultimo color: ' . $array[3] . "</br>";

        echo "</br>";

        foreach ($array as $i){
            echo "Color " . $i . "</br>";
        }
	?>
</body>
</html>