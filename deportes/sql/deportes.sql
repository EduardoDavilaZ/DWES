
-- Sobre la tabla Deportes: 
CREATE TABLE Deportes (
    idDeporte tinyint unsigned AUTO_INCREMENT PRIMARY KEY,
    nombreDep varchar(15) NOT NULL
);

-- Se debe modificar la estructura para añadir una columna que 
-- guarde el nombre de las imágenes como '1.webp' para el deporte
-- con id: 1

ALTER TABLE Deportes
ADD COLUMN img VARCHAR(10) NULL;