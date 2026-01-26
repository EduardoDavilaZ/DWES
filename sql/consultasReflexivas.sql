-- Usando la bd del proyecto ABP: 
-- Link: https://github.com/Aitor-Gocerra/proyectoLeafConection/blob/main/sql/Script%20Instalacion%20DB.sql  

-- Necesidad: Se desea visualizar los amigos del usuario con id 3. 

SELECT u1.nombre AS usuario, u2.nombre AS amigo
FROM Amigos a
INNER JOIN Usuario u1 ON u1.idUsuario = a.idUsuario1
INNER JOIN Usuario u2 ON u2.idUsuario = a.idUsuario2
WHERE   a.estado = 1  -- Que la solicitud esté aceptada
        AND (u1.idUsuario = 3 OR u2.idUsuario = 3); -- Que él haya enviado o recibido la solicitud


-- Necesidad: Para practicar funciones de agregado, visualizar cuántos amigos
-- tiene cada usuario

SELECT u.nombre, COUNT(a.idUsuario1) AS totalAmigos
FROM Usuario u
LEFT JOIN Amigos a -- LEFT JOIN Para mostrar a quienes no tienen amigos
    ON (u.idUsuario = a.idUsuario1 OR u.idUsuario = a.idUsuario2) -- Que el usuario haya enviado o recibido la solicitud
    AND a.estado = 1 -- Que la solicitud haya sido aceptada
GROUP BY u.idUsuario; 


-- Necesidad: Mostrar dos frases del día que tengan la misma palabra escondida

INSERT INTO Frases (frase, palabraFaltante, fechaProgramada) VALUES
('La ____ es la variedad de especies animales y vegetales en su medio ambiente.', 'biodiversidad', '2025-01-10 00:00:00'),
('La ____ es esencial para mantener el equilibrio ecológico', 'biodiversidad', '2025-01-11 00:00:00');

SELECT f1.frase AS frase1, f2.frase AS frase2
FROM Frases f1
INNER JOIN Frases f2
    ON f1.palabraFaltante = f2.palabraFaltante 
    AND f1.idFrase < f2.idFrase; -- Que el id de la frase no sea igual