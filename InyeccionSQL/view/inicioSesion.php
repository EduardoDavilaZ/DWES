<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form action="./index.php?c=Usuario&m=inicioSesion" method="POST">
        <h1>Inicio de sesión</h1>
        <label for="correo">Correo: </label>
        <input type="text" name="correo" placeholder="Introduce tu correo">
        <label for="pw">Contraseña: </label>
        <input type="password" name="pw" placeholder="Introduce tu contraseña">
        <input type="submit" name="Enviar">
    </form>
</body>
</html>