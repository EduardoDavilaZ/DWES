<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        $anyo = 2025; $mes = 1; $dia = 1;

        do {
            calendario($dia, $mes, $anyo);
            $c = $_GET["c"];
            switch ($_GET["c"]){
                case "a": 
                    $mes -= 1;
                    if ($mes == 0) break;
                case "d":
                    $mes += 1;
                    if ($mes == 13) break;
                case "w":
                    $anyo += 1;
                    break;
                case "s":
                    $anyo -= 1;
                    break;
            };
        } while($c != "f");

        function calendario ($dia, $mes, $anyo){
            echo "L         M         X         J         V         S         D";
            $z = zeller($mes, $anyo);
        }

        function zeller($mes, $anyo){
            return (int)((floor((13*(($mes<3?$mes+12:$mes)+1))/5)+($y-($mes<3))+floor((($y-($mes<3))%100)/4)+floor((($y-($mes<3))/100)/4)+5*floor(($y-($mes<3))/100)+1)%7+5)%7;
        }


    ?>
    
</body>
</html>