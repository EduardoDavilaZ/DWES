CREATE TABLE minijuegos (
    idMinijuego tinyint unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(80) NOT NULL,
    creador varchar(80) null,
    descripcion varchar(255) NOT NULL,
    fechaCreacion datetime NOT NULL DEFAULT NOW(),
    rutaImg varchar(255) NULL,
    activo bit NOT NULL DEFAULT 1,
    constraint pk_idMinijuego PRIMARY KEY(idMinijuego)
);


INSERT INTO minijuegos (nombre, creador, descripcion, rutaImg)
VALUES 
(
    'Escape del castillo',
    'Fernando José',
    'Minijuego donde debes escapar de un castillo lleno de obstáculos.',
    '../uploads/minijuegos/1.jpg'
), ( 
    'Búsqueda del tesoro', 
    'Eduardo Davila', 
    'Juego de azar en el que el jugador debe localizar la estrella oculta.', 
    '../uploads/minijuegos/2.jpg' 
), ( 
    'Memoria mágica', 
    'Pablo Pardo', 
    'Minijuego de memoria visual basado en parejas de cartas.', 
    '../uploads/minijuegos/3.jpg' 
), ( 
    'Laberinto oscuro',
    'Kiko', 
    'Explora un laberinto y encuentra la salida antes de que se agote el tiempo.', 
    '../uploads/minijuegos/4.jpg' 
), ( 
    'Cazador de aventuras', 
    'Jimmy', 
    'Aventura interactiva donde debes encontrar tesoros escondidos.', 
    '../uploads/minijuegos/5.jpg' 
), ( 
    'Reflejos ninja', 
    'Tilín', 
    'Pon a prueba tu velocidad de reacción evitando obstáculos.', 
    '../uploads/minijuegos/6.jpg' 
), (
    'Carrera de globos',
    'Sofía Hernández',
    'Minijuego dinámico donde debes explotar globos en el menor tiempo posible.',
    '../uploads/minijuegos/7.jpg'
);