<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h3>
        Crea una función llamada promedioNotas que reciba un
        array multidimensional con alumnos y sus notas, y
        devuelva el promedio de cada alumno.
    </h3>    

    <?php

        $clase = [
            "Juan" => [4.4, 9.3, 3.25, 8],
            "Ana" => [10, 3.75, 7],
            "Pedro" => [3, 6.15],
        ];

        $promedio = [];

        function promedioNotas($clase, &$promedio){
            $cont = 0;
            foreach ($clase as $notas){
                $n = 0.0;
                $i = 0;
                foreach ($notas as $valor){
                    $n += $valor;
                    $i++;
                }

                $promedio[$cont] = $n / $i;
                $cont++;
            }
        }

        function visualizar($clase, $promedio){
            $i = 0;
            foreach ($clase as $nombre => $notas){
                echo 'El promedio de ' . $nombre . ' es ' . $promedio[$i] . '<br>';
                $i++;
            }
        }

        promedioNotas($clase, $promedio);
        visualizar($clase, $promedio);
    ?>

</body>
</html>