CREATE TABLE minijuegos (
    idMinijuego tinyint unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(80) NOT NULL,
    creador varchar(80) null,
    descripcion varchar(255) NOT NULL,
    fechaCreacion datetime NOT NULL DEFAULT NOW(),
    img varchar(10) NULL,
    activo bit NOT NULL DEFAULT 1,
    constraint pk_idMinijuego PRIMARY KEY(idMinijuego)
);


INSERT INTO minijuegos (nombre, creador, descripcion, img)
VALUES 
(
    'Escape del castillo',
    'Fernando José',
    'Minijuego donde debes escapar de un castillo lleno de obstáculos.',
    '1.jpg'
), ( 
    'Búsqueda del tesoro', 
    'Eduardo Davila', 
    'Juego de azar en el que el jugador debe localizar la estrella oculta.', 
    '2.jpg' 
), ( 
    'Memoria mágica', 
    'Pablo Pardo', 
    'Minijuego de memoria visual basado en parejas de cartas.', 
    '3.jpg' 
), ( 
    'Laberinto oscuro',
    'Kiko', 
    'Explora un laberinto y encuentra la salida antes de que se agote el tiempo.', 
    '4.jpg' 
), ( 
    'Cazador de aventuras', 
    'Jimmy', 
    'Aventura interactiva donde debes encontrar tesoros escondidos.', 
    '5.jpg' 
), ( 
    'Reflejos ninja', 
    'Tilín', 
    'Pon a prueba tu velocidad de reacción evitando obstáculos.', 
    '6.jpg' 
), (
    'Carrera de globos',
    'Sofía Hernández',
    'Minijuego dinámico donde debes explotar globos en el menor tiempo posible.',
    '7.jpg'
);