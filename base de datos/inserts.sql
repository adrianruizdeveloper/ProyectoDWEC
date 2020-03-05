	#tipos_categorias
INSERT INTO `tipos_categoria` (`id_categoria`,`descripcion_categoria`) VALUES  (1, 'Acción');
INSERT INTO `tipos_categoria` (`id_categoria`,`descripcion_categoria`) VALUES  (2, 'Aventuras');
INSERT INTO `tipos_categoria` (`id_categoria`,`descripcion_categoria`) VALUES  (3, 'Comedia');
INSERT INTO `tipos_categoria` (`id_categoria`,`descripcion_categoria`) VALUES  (4, 'Terror');
INSERT INTO `tipos_categoria` (`id_categoria`,`descripcion_categoria`) VALUES  (5, 'Musical');
INSERT INTO `tipos_categoria` (`id_categoria`,`descripcion_categoria`) VALUES  (6, 'Thriller');
INSERT INTO `tipos_categoria` (`id_categoria`,`descripcion_categoria`) VALUES  (7, 'Drama');

	#tipos_restricciones
INSERT INTO `tipos_restricciones` (`id_restriccion`,`descripcion_restriccion`,`edad_restriccion`) VALUES  (1, 'Apta para todos los públicos','ninguna');
INSERT INTO `tipos_restricciones` (`id_restriccion`,`descripcion_restriccion`,`edad_restriccion`) VALUES  (2, 'No recomendada para menores de 7 años','7');
INSERT INTO `tipos_restricciones` (`id_restriccion`,`descripcion_restriccion`,`edad_restriccion`) VALUES  (3, 'No recomendada para menores de 12 años','12');
INSERT INTO `tipos_restricciones` (`id_restriccion`,`descripcion_restriccion`,`edad_restriccion`) VALUES  (4, 'No recomendada para menores de 16 años','16');
INSERT INTO `tipos_restricciones` (`id_restriccion`,`descripcion_restriccion`,`edad_restriccion`) VALUES  (5, 'No recomendada para menores de 18 años','18');
	
	#salas
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (1, 'Sala 1', '50');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (2, 'Sala 2', '50');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (3, 'Sala 3', '50');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (4, 'Sala 4', '50');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (5, 'Sala 5', '250');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (6, 'Sala 6', '250');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (7, 'Sala 7', '300');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (8, 'Sala 8', '300');

	#peliculas
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (1, 'Aves de presa y la fantabulosa emancipación de Harley Quinn', 'Cathy Yan', '2020-07-02', 3, 5);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (2, 'ADÚ', 'Salvador Calvo', '2020-31-1', 7, 5);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (3, 'Especiales', 'Olivier Nakache, Éric Toledano', '2020-28-02', 3, 5);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (4, 'El Señor de los Anillos: el retorno del Rey', 'Peter Jackson', '2003-17-12', 2, 3);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (5, 'Kill Bill: Volumen 1', 'Quentin Tarantino', '2003-10-10', 1, 5);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (6, 'Star Wars: Episodio IX - El ascenso de Skywalker', 'Jeffrey Jacob Abrams', '2019-12-16', 2, 3);

	#sesion
INSERT INTO `sesiones` (`id_sesion`,`peliculas_id_peli`, `fecha_sesion`, `hora_sesion`, `sala_sesion`) VALUES  (1, 3, '2020-03-30', '18:00', 2);
INSERT INTO `sesiones` (`id_sesion`,`peliculas_id_peli`, `fecha_sesion`, `hora_sesion`, `sala_sesion`) VALUES  (2, 1, '2020-03-27', '22:00', 1);
INSERT INTO `sesiones` (`id_sesion`,`peliculas_id_peli`, `fecha_sesion`, `hora_sesion`, `sala_sesion`) VALUES  (3, 4, '2020-03-28', '18:00', 4);
INSERT INTO `sesiones` (`id_sesion`,`peliculas_id_peli`, `fecha_sesion`, `hora_sesion`, `sala_sesion`) VALUES  (4, 4, '2020-03-30', '22:00', 1);

	#tipos_roles
INSERT INTO `tipos_roles` (`id_rol`, `descripcion_rol`) VALUES (1, 'admin');
INSERT INTO `tipos_roles` (`id_rol`, `descripcion_rol`) VALUES (2, 'usuario');

	#Usuarios
INSERT INTO `usuarios` (`id_usu`, `rol_usu`, `nombre_usu`, `apellido1_usu`, `apellido2_usu`, `fechanac_usu`, `telefono_usu`, `correo_usu`) VALUES (1, "usuario1",1, "nusuario1", "ap1usuario1", "ap2usuario1", '1990-07-12', "666666666", "correo1@correo.es");
INSERT INTO `usuarios` (`id_usu`, `rol_usu`, `nombre_usu`, `apellido1_usu`, `apellido2_usu`, `fechanac_usu`, `telefono_usu`, `correo_usu`) VALUES (2, "usuario2",2, "nusuario2", "ap1usuario2", "ap2usuario2", '1995-02-10', "666666666", "correo2@correo.es");
INSERT INTO `usuarios` (`id_usu`, `rol_usu`, `nombre_usu`, `apellido1_usu`, `apellido2_usu`, `fechanac_usu`, `telefono_usu`, `correo_usu`) VALUES (3, "usuario3",1, "nusuario3", "ap1usuario3", "ap2usuario3", '2005-02-14', "666666666", "correo3@correo.es");
INSERT INTO `usuarios` (`id_usu`, `rol_usu`, `nombre_usu`, `apellido1_usu`, `apellido2_usu`, `fechanac_usu`, `telefono_usu`, `correo_usu`) VALUES (4, "usuario4",1, "nusuario4", "ap1usuario4", "ap2usuario4", '1970-11-03', "666666666", "correo4@correo.es");

	#contrasenas
INSERT INTO `contrasenas` (`idusuario_contra`, `contrasena_contra`, `fecha_contra`) VALUES  (1, 'usuario', '2020-03-05');
INSERT INTO `contrasenas` (`idusuario_contra`, `contrasena_contra`, `fecha_contra`) VALUES  (2, 'usuario', '2020-03-05');
INSERT INTO `contrasenas` (`idusuario_contra`, `contrasena_contra`, `fecha_contra`) VALUES  (3, 'usuario', '2020-03-05');
INSERT INTO `contrasenas` (`idusuario_contra`, `contrasena_contra`, `fecha_contra`) VALUES  (4, 'usuario', '2020-03-05');

	
	#asientos












