<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h3>
        Dado dos arrays numéricos, crea un nuevo array con los 
        números que estén en ambos arrays, pero sin usar funciones 
        predefinidas como array_intersect.
    </h3>    

    <?php

        $arr1 = [3, 5, 1, 6, 9];
        $arr2 = [4, 2, 5, 3, 10, 12];

        for ($i = 0; $i < count($arr1); $i++){
            for ($j = 0; $j < count($arr2); $j++){
                if ($arr1[$i] == $arr2[$j]){
                    echo $arr1[$i] . '<br>';
                }
            }
        }

    ?>

</body>
</html>