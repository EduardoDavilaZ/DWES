<?php 
    include 'Operaciones.php';

    function calcular ($num1, $num2, $op){
        $operacion = new Operaciones();
        $operacion->setNum1($num1);
        $operacion->setNum2($num2);

        $resultado = 0;

        switch ($op){
            case '+': $resultado = $operacion->sumar(); break;
            case '-': $resultado = $operacion->restar(); break;
            case '*': $resultado = $operacion->multiplicar(); break;
            case '/': $resultado = $operacion->dividir(); break;
        }

        return $resultado;
    }

    var_dump($_GET);

    if (isset($_GET["Enviar"])){
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];
        $op = $_GET["operacion"];
        $resultado = calcular($num1, $num2, $op);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="GET">
        <input type="number" name="num1" required>
        <input type="number" name="num2" required>
        <select name="operacion">
            <option value="+">Sumar</option>
            <option value="-">Restar</option>
            <option value="*">Multiplicar</option>
            <option value="/">Dividir</option>
        </select>
        <input type="submit" value="Enviar" name="Enviar">
    </form>

    <?php
        if (isset($_GET["Enviar"])){
            echo '<h1>Resultado = ' . $resultado . '</h1>';
        }
    ?>
</body>
</html>
