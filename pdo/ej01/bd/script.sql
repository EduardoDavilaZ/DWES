CREATE TABLE hoteles (
    idHotel tinyint NOT NULL AUTO_INCREMENT,
    nombre varchar(60) NOT NULL,
    constraint pk_idHotel PRIMARY KEY (idHotel)
);

INSERT INTO hoteles (nombre)
VALUES
    ('THB Can Picafort Gran Playa'),
    ('THB Can Picafort Gran Bahía'),
    ('THB Cala Ratjada Guya Playa'),
    ('THB Cala Ratjada Cala Lliteras'),
    ('THB Cala Ratjada Dos Playas');


CREATE TABLE inspecciones (
    idRevision smallint NOT NULL AUTO_INCREMENT,
    nombreResponsable varchar(60) NOT NULL,
    fecha datetime NOT NULL,
    idHotel tinyint NOT NULL,
    constraint pk_idRevision PRIMARY KEY (idRevision),
    CONSTRAINT fk_idHotel FOREIGN KEY (idHotel) REFERENCES hoteles(idHotel)
);

CREATE TABLE estado_piscina (
    idEstado tinyint NOT NULL AUTO_INCREMENT,
    descripcion varchar(100) NOT NULL,
    CONSTRAINT pk_idEstado PRIMARY KEY (idEstado)
);

INSERT INTO estado_piscina (descripcion)
VALUES
    ('La maquinaria de filtración y bombeo funciona con normalidad.'),
    ('Se realizan limpiezas de skimmers y filtros de forma periódica.'),
    ('El nivel del agua es el adecuado.'),
    ('Los sistemas de iluminación y climatización funcionan correctamente.'),
    ('La piscina no presenta grietas ni fugas.');


CREATE TABLE valoracion_piscina (
    idHotel tinyint NOT NULL,
    idEstado tinyint NOT NULL,
    CONSTRAINT pk_idValoracion PRIMARY KEY (idHotel, idEstado),
    CONSTRAINT fk_val_idHotel FOREIGN KEY (idHotel) REFERENCES hoteles(idHotel),
    CONSTRAINT fk_val_idEstado FOREIGN KEY (idEstado) REFERENCES estado_piscina(idEstado)
)

-- Comprobar valoración de una piscina
SELECT hoteles.nombre, estado_piscina.descripcion
FROM valoracion_piscina
INNER JOIN hoteles ON hoteles.idHotel = valoracion_piscina.idHotel
INNER JOIN estado_piscina ON estado_piscina.idEstado = valoracion_piscina.idEstado;