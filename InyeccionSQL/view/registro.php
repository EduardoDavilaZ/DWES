<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form action="./index.php?c=Usuario&m=registro" method="POST">
        <h1>Registro</h1>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <label for="nombre">Correo: </label>
        <input type="email" name="correo" placeholder="correo">
        <label for="nombre">Contraseña: </label>
        <input type="password" name="pw" placeholder="contraseña">
        <input type="submit" name="Enviar">
    </form>
</body>
</html>