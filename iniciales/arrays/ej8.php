<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

    <style>
        td{
            border: 1px solid;
            text-align: center;
        }
    </style>


    <form action="ej8.php" method="get">
        <label>Num: </label>
        <input style="width: 40%;" type="number" value="num" name="num"/>
        <input type="submit"/>
    </form>


    <?php
        $array = [];

        if (!isset($_GET["num"])){
            echo "no existe";
            die();
        } else{
            $n = $_GET["num"];
        };

        function introducir($n, &$array){
            for ($i = 1; $i <= 10; $i++){
                $array[$i] = $n * $i;
            }
        }

        function visualizar($n, $array){
            echo "</br>";
            print_r($array);
            echo "</br></br>";
            var_dump($array);
            echo "</br></br>";

            echo '<table style="border-collapse: collapse; border: 2px solid black; width: 40%; margin: auto; font-size: 2em;" >';
            foreach ($array as $index => $value){
                echo '<tr>'.
                        '<td> ' . $n . '</td>' .
                        '<td> x </td>' .
                        '<td>' . $index . '</td>' .
                        '<td> = </td>' .
                        '<td> ' . $value . '</td>' .
                    '</tr>';
            }
            echo '</table>';
        }
        
        introducir(n: $n, array: $array);
        visualizar(n: $n, array: $array);
        
    ?>

</body>
</html>