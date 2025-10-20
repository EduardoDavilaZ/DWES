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
    idHotel tinyint not null,
    constraint pk_idRevision PRIMARY KEY (idRevision),
    CONSTRAINT fk_idHotel FOREIGN KEY (idHotel) REFERENCES hoteles(idHotel)
);