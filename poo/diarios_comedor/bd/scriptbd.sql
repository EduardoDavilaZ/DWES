 
create table padres (
	idPadre tinyint not null auto_increment,
	nombre varchar(30) not null,
	constraint pk_idPadre primary key (idPadre)
);
 
create table hijos (
	idHijo smallint not null AUTO_INCREMENT,
	nombre varchar(30) not null,
	idPadre tinyint not null,
	constraint pk_idHijo PRIMARY KEY(idHijo),
	constraint fk_idPadre FOREIGN KEY (idPadre) REFERENCES padres(idPadre)
);

create table diarios (
	idDiario smallint not null AUTO_INCREMENT,
	idHijo smallint not null,
	fecha datetime not null,
	tupper bit not null,
	constraint pk_idDiario PRIMARY KEY (idDiario),
	CONSTRAINT fk_idHijo FOREIGN KEY (idHijo) REFERENCES hijos(idHijo)
);

INSERT INTO padres (nombre) 
VALUES
	('Laura Fernández'),
	('Miguel Torres'),
	('Ana Gómez'),
	('Javier López'),
	('María Sánchez'),
	('Raúl Castillo'),
	('Beatriz Díaz');

INSERT INTO hijos (nombre, idPadre) 
VALUES
	('Sofía Ramírez', 1),
	('Luis Ramírez', 1),
	('Paula Fernández', 2),
	('Diego Torres', 3),
	('Lucía Gómez', 4),
	('David López', 5),
	('Elena Sánchez', 6),
	('Hugo Castillo', 7),
	('Sara Díaz', 8),
	('Marcos Díaz', 8);


CREATE UNIQUE INDEX idx_nombreHijo ON hijos(nombre);
insert into hijos(nombre, idPadre) values('Hugo Castillo', 4);