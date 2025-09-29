<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h3>
        Dado un texto almacenado en una variable, crea un array asociativo 
        que cuente cuántas veces aparece cada palabra (ignora mayúsculas/minúsculas).
    </h3>    

    <?php
        $texto = "En un lugar de la Mancha, de cuyo nombre no quiero acordarme, 
        no ha mucho tiempo que vivía un hidalgo de los de lanza en astillero, 
        adarga antigua, rocín flaco y galgo corredor. Una olla de algo más vaca 
        que carnero, salpicón las más noches, duelos y quebrantos los sábados, 
        lantejas los viernes, algún palomino de añadidura los domingos8, 
        consumían las tres partes de su hacienda.";

        $palabras = explode(" ", $texto);
        
        $array = array_count_values($palabras);

        print_r($array);
        echo "</br></br>";
        var_dump($array);
    ?>

</body>
</html>