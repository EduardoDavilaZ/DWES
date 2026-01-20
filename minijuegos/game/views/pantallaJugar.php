<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jugar</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <header>
            <h1>
                Minijuegos
            </h1>
        </header>
        <main id="loading-screen" style="background-image: url('<?php echo URL_IMG . $juego['img'] ?>');">
            <div>
                <h1><?php echo $juego['nombre'] ?></h1>
                <p><?php echo $juego['descripcion'] ?></p>
                
                <a href="index.php?c=Minijuego&m=iniciarJuego&id=<?php echo $juego['idMinijuego'] ?>">Jugar</a>
                <a href="index.php?c=Minijuego&m=listarMinijuegos">Volver atrás</a>
            </div>
        </main>
    </body>
</html>