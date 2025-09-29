<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <style>
        td{
            border: 0px solid;
            text-align: center;
        }
    </style>

    <form action="ej9.php" method="get">
        <label>Año: </label>
        <input style="width: 40%;" type="number" value="anyo" name="anyo"/>
        <input type="submit"/>
    </form>
    
    <?php 
        if (!isset($_GET["anyo"])){
            echo "No existe";
            die();
        } else {
            $anyo = $_GET["anyo"];
        }



        $dias = [];
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];



        for ($i = 1; $i <= 12; $i++){
            switch ($i){
                case 1 : case 3: case 5: case 7: case 8: case 10: case 12:
                    $dias[$i] = 31; 
                    break;
                case 4: case 6: case 9: case 11:
                    $dias[$i] = 30; 
                    break;
                case 2:
                    if (esBisiesto($anyo)){
                        $dias[$i] = 29;
                    } else {
                        $dias[$i] = 28;
                    }
            }
        }



        function esBisiesto ($anyo){
            return $anyo % 4 == 0 ? true : false;
        }



        function visualizar($meses, $dias){
            echo "</br>";
            print_r($dias);
            echo "</br></br>";
            var_dump($dias);
            echo "</br></br>";

            echo '<table style="border-collapse: collapse; border: 2px solid black; width: 40%; margin: auto; font-size: 30px;" >';

            foreach ($dias as $index => $value){
                echo '<tr>'.
                        '<td>' . $meses[$index-1] . '</td>' .
                        '<td> => </td>' .
                        '<td> ' . $value . '</td>' .
                    '</tr>';
            }
            echo '</table>';
        }

        

        visualizar($meses, $dias);
    ?>

</body>
</html>