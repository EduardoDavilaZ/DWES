-- Usando la bd del proyecto ABP: 
-- Link: https://github.com/Aitor-Gocerra/proyectoLeafConection/blob/main/sql/Script%20Instalacion%20DB.sql  

-- Necesidad: Visualizar que usuarios han jugado por lo menos 1 partida

SELECT nombre, correo -- Listar todos los usuarios 
FROM Usuario 
WHERE idUsuario IN (
    SELECT DISTINCT idUsuario  -- Filtrarlos por los que su id aparezca en la tabla Partida
    FROM Partida
);


-- Necesidad: Visualizar las noticias que no aparecen en ninguna partida

SELECT titulo -- Listar los títulos de las noticias
FROM Noticias 
WHERE idNoticia NOT IN ( -- Quitar las que aparecen en la tabla intermedia NoticiaDia
    SELECT idNoticia
    FROM NoticiaDia
);


-- Necesidad: Mostrar la palabra junto con la cantidad de pistas que tiene

SELECT 
    palabra,
    (
        SELECT COUNT(*)
        FROM PistasPalabras pp
        WHERE pp.idPalabra = p.idPalabra
    ) AS totalPistas -- En el segundo campo se pondrá el resultado de contar cuantas pistas tiene la palabra usando una consulta
FROM Palabras p;
