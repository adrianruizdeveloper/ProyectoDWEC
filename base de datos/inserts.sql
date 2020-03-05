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
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (5, 'Sala 5', '230');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (6, 'Sala 6', '230');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (7, 'Sala 7', '300');
INSERT INTO `salas` (`id_sala`,`nombre_sala`, `capacidad_sala`) VALUES  (8, 'Sala 8', '300');

	#peliculas
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (1, 'Aves de presa y la fantabulosa emancipación de Harley Quinn', 'Cathy Yan', '2020-07-02', 3, 5);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (2, 'ADÚ', 'Salvador Calvo', '2020-31-1', 7, 5);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (3, 'Especiales', 'Olivier Nakache, Éric Toledano', '2020-28-02', 3, 5);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (4, 'El Señor de los Anillos: el retorno del Rey', 'Peter Jackson', '2003-17-12', 2, 3);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (5, 'Kill Bill: Volumen 1', 'Quentin Tarantino', '2003-10-10', 1, 5);
INSERT INTO `peliculas` (`id_peli`,`nombre_peli`, `nombre_director_peli`, `fecha_peli`, `categoria1_peli`, `restriccion_peli`) VALUES  (6, 'Star Wars: Episodio IX - El ascenso de Skywalker', 'Jeffrey Jacob Abrams', '2019-12-16', 2, 3);


