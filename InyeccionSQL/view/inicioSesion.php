<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div>
        <button type="button" id="btnInseguro">Inicio de sesión inseguro</button>
    </div>
    <form action="./index.php?c=Usuario&m=inicioSesion" id="form" method="POST">
        <h1>Inicio de sesión</h1>
        <label for="correo">Correo: </label>
        <input type="text" name="correo" placeholder="Introduce tu correo">
        <label for="pw">Contraseña: </label>
        <input type="password" name="pw" placeholder="Introduce tu contraseña">
        <input type="submit" name="Enviar" id="btnEnviar">
    </form>

    <script>
        const btn = document.getElementById('btnInseguro');
        const form = document.getElementById('form');
        const submit = document.getElementById('btnEnviar');

        let inseguro = false;

        btn.addEventListener('click', () => {
            inseguro = !inseguro;

            if (inseguro) {
                form.action = './index.php?c=Usuario&m=inicioSesionInseguro';
                submit.value = 'Inicio de sesión inseguro';
                btn.textContent = 'Cambiar a inicio de sesión seguro';
            } else {
                form.action = './index.php?c=Usuario&m=inicioSesion';
                submit.value = 'Inicio de sesión';
                btn.textContent = 'Cambiar a inicio de sesión inseguro';
            }
        });
    </script>
</body>
</html>