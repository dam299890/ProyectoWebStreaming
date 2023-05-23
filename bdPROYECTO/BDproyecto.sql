-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.11.2-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para skytv
CREATE DATABASE IF NOT EXISTS `skytv` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `skytv`;

-- Volcando estructura para tabla skytv.actores
CREATE TABLE IF NOT EXISTS `actores` (
  `id_actor` int(11) NOT NULL,
  `nombre_actor` varchar(50) DEFAULT NULL,
  `nacionalidad_actor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_actor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.actores: ~37 rows (aproximadamente)
/*!40000 ALTER TABLE `actores` DISABLE KEYS */;
INSERT INTO `actores` (`id_actor`, `nombre_actor`, `nacionalidad_actor`) VALUES
	(1, 'Max Arciniega', 'chile'),
	(2, 'Bryan Cranston', 'estados unidos'),
	(3, 'Aaron Paul', 'estados unidos'),
	(4, 'Leonardo DiCaprio', 'Estados Unidos'),
	(5, 'Penélope Cruz', 'España'),
	(6, 'Tom Hanks', 'Estados Unidos'),
	(7, 'Gong Li', 'China'),
	(8, 'Julia Roberts', 'Estados Unidos'),
	(9, 'Ricardo Darín', 'Argentina'),
	(10, 'Meryl Streep', 'Estados Unidos'),
	(11, 'Aishwarya Rai Bachchan', 'India'),
	(12, 'Robert Downey Jr.', 'Estados Unidos'),
	(13, 'Marion Cotillard', 'Francia'),
	(14, 'Johnny Depp', 'Estados Unidos'),
	(15, 'Salma Hayek', 'México'),
	(16, 'Hugh Jackman', 'Australia'),
	(17, 'Sofia Vergara', 'Colombia'),
	(18, 'Brad Pitt', 'Estados Unidos'),
	(19, 'Catherine Zeta-Jones', 'Gales'),
	(20, 'Will Smith', 'Estados Unidos'),
	(21, 'Charlize Theron', 'Sudáfrica'),
	(22, 'George Clooney', 'Estados Unidos'),
	(23, 'Priyanka Chopra', 'India'),
	(24, 'John Travolta', 'Estados Unidos'),
	(25, 'Samuel L Jackson', 'Estados Unidos'),
	(26, 'Morgan Freeman', 'Estados Unidos'),
	(27, 'Tim Robbins', 'Estados Unidos'),
	(28, 'Christian Bale', 'Estados Unidos'),
	(29, 'Emilia Clarke', 'Reino Unido'),
	(30, 'Maisie Williams', 'Reino Unido'),
	(31, 'Keanu Reeves', 'El Líbano'),
	(32, 'Laurence Fishburn', 'Estados Unidos'),
	(33, 'Emma Stone', 'Estados Unidos'),
	(34, 'Ryan Gosling', 'Estados Unidos'),
	(35, 'Al Pacino', 'Estados Unidos'),
	(36, 'John Cazale', 'Estados Unidos'),
	(37, 'Ving Rhames', 'Estados Unidos');
/*!40000 ALTER TABLE `actores` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.actor_episodio
CREATE TABLE IF NOT EXISTS `actor_episodio` (
  `id_actor` int(11) NOT NULL,
  `id_episodio` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `es_protagonista` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_actor`,`id_episodio`,`id_serie`),
  KEY `id_serie` (`id_serie`,`id_episodio`),
  CONSTRAINT `actor_episodio_ibfk_1` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id_actor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `actor_episodio_ibfk_2` FOREIGN KEY (`id_serie`, `id_episodio`) REFERENCES `episodios` (`id_serie`, `id_episodio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.actor_episodio: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `actor_episodio` DISABLE KEYS */;
INSERT INTO `actor_episodio` (`id_actor`, `id_episodio`, `id_serie`, `es_protagonista`) VALUES
	(1, 1, 7, 0),
	(2, 1, 7, 1),
	(2, 2, 7, 1),
	(3, 1, 7, 0);
/*!40000 ALTER TABLE `actor_episodio` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.actor_pelicula
CREATE TABLE IF NOT EXISTS `actor_pelicula` (
  `id_actor` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `es_protagonista` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_actor`,`id_pelicula`),
  KEY `id_pelicula` (`id_pelicula`),
  CONSTRAINT `actor_pelicula_ibfk_1` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id_actor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `actor_pelicula_ibfk_2` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id_contenido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.actor_pelicula: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `actor_pelicula` DISABLE KEYS */;
INSERT INTO `actor_pelicula` (`id_actor`, `id_pelicula`, `es_protagonista`) VALUES
	(1, 12, 1),
	(1, 34, 1),
	(10, 33, 0),
	(15, 9, 0),
	(21, 16, 1),
	(22, 16, 1),
	(23, 17, 1),
	(24, 28, 1),
	(25, 9, 1),
	(28, 18, 1),
	(29, 18, 0),
	(30, 20, 1),
	(31, 20, 1),
	(32, 16, 1),
	(33, 12, 0),
	(34, 3, 0);
/*!40000 ALTER TABLE `actor_pelicula` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(15) DEFAULT NULL,
  `num_tarjeta` bigint(20) DEFAULT NULL,
  `num_cuenta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.cliente: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `nombre`, `dni`, `edad`, `direccion`, `nacionalidad`, `email`, `telefono`, `num_tarjeta`, `num_cuenta`) VALUES
	(19, 'Daniel', '54989145D', 23, 'avinguda raval del carme 94 3a1a', 'espanol', 'daniel2@gmail.com', 633046447, NULL, NULL),
	(20, 'diego', '71295935', 23, 'carrer montoliu n28 1a2a', 'peru', 'diego1@hotmail.com', 123123123, NULL, NULL),
	(21, 'juan', '71545935D', 20, 'Carrer montoliu n28 1a 2a Cervera', 'peru', 'juan@hotmail.com', 633060606, NULL, NULL),
	(22, 'maria', '53923144F', 23, 'Juan de Loyola 20', 'peru', 'maria@hotmail.com', 321321321, NULL, NULL),
	(23, 'María Rodríguez', '23456789L', 19, 'Calle Principal 789', 'España', 'mariarodriguez@gmail.com', 987654321, 1234567812345678, 'ES0123456789012345678901'),
	(24, 'José García', '34567890M', 24, 'Avenida Central 321', 'España', 'josegarcia@gmail.com', 123456789, 9876543210987654, 'ES0987654321098765432109'),
	(25, 'Laura Martínez', '45678901N', 21, 'Calle Secundaria 654', 'España', 'lauramartinez@hotmail.com', 456789012, 4567890123456789, 'ES3456789012345678901234'),
	(26, 'Carlos López', '56789012O', 22, 'Plaza Mayor 123', 'España', 'carloslopez@hotmail.com', 789012345, 7890123456789012, 'ES5678901234567890123456'),
	(27, 'Sara Fernández', '67890123P', 35, 'Avenida del Sol 987', 'España', 'sarafernandez@gmail.com', 890123456, 8901234567890123, 'ES7890123456789012345678'),
	(28, 'Manuel Torres', '78901234Q', 22, 'Calle Nueva 456', 'España', 'manueltorres@hotmail.com', 901234567, 9012345678901234, 'ES9012345678901234567890'),
	(29, 'Ana Ramírez', '89012345R', 29, 'Avenida Principal 987', 'España', 'anaramirez@hotmail.com', 345678901, 3456789012345678, 'ES3456789012345678901234'),
	(30, 'Pedro Navarro', '90123456S', 32, 'Calle Central 654', 'España', 'pedronavarro@gmail.com', 567890123, 5678901234567890, 'ES5678901234567890123456'),
	(31, 'Isabel Morales', '01234567T', 26, 'Plaza del Sol 321', 'España', 'isabelmorales@gmail.com', 678901234, 6789012345678901, 'ES6789012345678901234567'),
	(32, 'Miguel Sánchez', '12345678U', 22, 'Avenida Nueva 654', 'España', 'miguelsanchez@gmail.com', 890123456, 8901234567890123, 'ES8901234567890123456789'),
	(33, 'Pedro Rodríguez', '34567890C', 42, 'Calle Secundaria 789', 'España', 'pedrorodriguez@gmail.com', 456789012, 4567890123456789, 'ES3456789012345678901234'),
	(34, 'Laura López', '45678901D', 34, 'Plaza Mayor 987', 'España', 'lauralopez@gmail.com', 789012345, 7890123456789012, 'ES5678901234567890123456'),
	(35, 'Carlos García', '56789012E', 31, 'Avenida del Sol 654', 'España', 'carlosgarcia@gmail.com', 890123456, 8901234567890123, 'ES7890123456789012345678'),
	(36, 'Ana Martínez', '67890123F', 31, 'Calle Nueva 321', 'España', 'anamartinez@hotmail.com', 901234567, 9012345678901234, 'ES9012345678901234567890'),
	(37, 'Sergio Morales', '78901234G', 18, 'Avenida Principal 654', 'España', 'sergiomorales@gmail.com', 345678901, 3456789012345678, 'ES3456789012345678901234'),
	(38, 'Elena Navarro', '89012345H', 21, 'Calle Central 987', 'España', 'elenanavarro@example.com', 567890123, 5678901234567890, 'ES5678901234567890123456'),
	(39, 'Miguel Torres', '90123456I', 36, 'Plaza del Sol 456', 'España', 'migueltorres@gmail.com', 678901234, 6789012345678901, 'ES6789012345678901234567'),
	(40, 'Isabel Ramírez', '01234567J', 25, 'Avenida Nueva 789', 'España', 'isabelramirez@hotmail.com', 661123321, 8901234567890542, 'ES8901234567890123454517'),
	(41, 'Javier Sánchez', '12345678U', 25, 'Avenida Nueva 654', 'España', 'miguelsanchez@hotmail.com', 890123456, 8901234567890123, 'ES8901234567890123456789'),
	(42, 'Javier Torres', '34567890W', 24, 'Avenida Central 789', 'Español', 'javiertorres@hotmail.com', 456789012, 4567890123456789, 'ES4567890123456789012345'),
	(43, 'Elena García', '45678901X', 32, 'Calle Secundaria 123', 'Español', 'elenagarcia@gmail.com', 567890123, 5678901234567890, 'ES5678901234567890123456');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.contenido
CREATE TABLE IF NOT EXISTS `contenido` (
  `id_contenido` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_contenido` varchar(255) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `anyo` int(11) DEFAULT NULL,
  `num_favorito` int(11) unsigned DEFAULT NULL,
  `portada` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_contenido`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.contenido: ~34 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
INSERT INTO `contenido` (`id_contenido`, `nombre_contenido`, `descripcion`, `nacionalidad`, `anyo`, `num_favorito`, `portada`) VALUES
	(1, 'Como entrenar a tu dragón', 'Una comedia de aventuras ambientada\r\n en un mundo mítico de fornidos vikingos y\r\n  dragones que escupen fuego, y basada en el libro \r\n  de Cressida Cowell. La historia gira en torno a un \r\n  vikingo adolescente llamado Hipo, que vive en \r\n  Isla Mema, en donde combatir a los dragones es el modo de vida habitual.', 'Estados Unidos', 2010, 0, 'http://localhost/formulario/img/dragon.jpg'),
	(2, 'Harry Potter y la piedra filosofal', '¿Qué trata Harry Potter y la piedra filosofal?\r\nHarry toma un tren, y en el colegio se hace muy \r\namigo de dos compañeros de clase, un chico (Ron) \r\ny una chica (Hermione). Descubren que hay un objeto\r\n precioso escondido en el colegio, la piedra filosofal,\r\n  que permite convertir cualquier metal en oro, y producir\r\n   el elixir de la vida eterna.', 'Reino Unido', 2001, 0, 'http://localhost/formulario/img/harry.jpg'),
	(3, 'Spiderman: No Way Home', 'Por primera vez en la historia cinematográfica de Spider-Man, \r\nnuestro héroe, vecino y amigo es desenmascarado, y por tanto, ya\r\n no es capaz de separar su vida normal de los enormes riesgos que \r\n conlleva ser un superhéroe. Cuando pide ayuda al Doctor Strange, \r\n los riesgos pasan a ser aún más peligrosos, obligándole a descubrir\r\n  lo que realmente significa ser él. Secuela de Spider-Man: Far From Home.', 'Estados Unidos', 2021, 0, 'http://localhost/formulario/img/spiderman.jpg'),
	(4, 'Regreso al futuro', 'El adolescente Marty McFly es amigo de Doc, un científico que ha construido una máquina del tiempo. Cuando los dos prueban el artefacto, un error fortuito hace que Marty llegue a 1955, año en el que sus padres iban al instituto y todavía no se habían conocido. Después de impedir su primer encuentro, Marty deberá conseguir que se conozcan y se enamoren, de lo contrario su existencia no sería posible.', 'Estados Unidos', 1985, 0, 'http://localhost/formulario/img/regreso.jpg'),
	(5, 'Stranger Things', 'Serie de TV (2016). 8 episodios. \r\nHomenaje a los clásicos misterios sobrenaturales de los años 80,\r\n "Stranger Things" es la historia de un niño que desaparece en el\r\n  pequeño pueblo de Hawkins, Indiana, sin dejar rastro en 1983. En\r\n   su búsqueda desesperada, tanto sus amigos y familiares como el \r\n	sheriff local se ven envueltos en un enigma extraordinario: experimentos \r\n	ultrasecretos, fuerzas paranormales terroríficas y una niña muy, muy rara...', 'Estados Unidos', 2016, 0, 'http://localhost/formulario/img/stranger.jpg'),
	(6, 'Pulp Fiction', 'Jules y Vincent, dos asesinos a sueldo con \r\nno demasiadas luces, trabajan para el gángster Marsellus Wallace. \r\nVincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, \r\nsu atractiva mujer. Jules le recomienda prudencia porque es muy peligroso so\r\nbrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben\r\n ponerse "manos a la obra". Su misión: recuperar un misterioso maletín.', 'Estados Unidos', 1994, 0, 'http://localhost/formulario/img/pulpfiction.jpg'),
	(7, 'Breaking Bad', 'Un profesor de química que después de ser diagnosticado\r\n de un cáncer pulmonar inoperable termina vendiendo metanfetamina, junto a su ex alumno, Jesse \r\n Pinkman. ', 'Estados Unidos', 2008, 0, 'http://localhost/formulario/img/breaking.jpg'),
	(8, 'La Casa de Papel', 'Un misterioso hombre conocido como «el Profesor»\r\n ha pasado toda su vida planeando el mayor de los atracos de la historia:\r\n  entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros.', 'España', 2017, 0, 'http://localhost/formulario/img/casapapel.jpg'),
	(9, 'Django', 'Un antiguo esclavo une sus fuerzas con un cazador de recompensas \r\nalemán que lo libera y ayuda a cazar a los criminales más buscados del Sur, todo \r\nello con la esperanza de encontrar a su esposa perdida hace mucho tiempo.', 'Estados Unidos', 2012, 1, 'http://localhost/formulario/img/django.jpg'),
	(10, 'Los Cazafantasmas', 'Al quedarse en paro, tres doctores en parapsicología crean una empresa para limpiar Nueva York de ectoplasmas. Mítica comedia a cargo de Ivan Reitman.', 'Estados Unidos', 1984, 1, 'http://localhost/formulario/img/fantasma.jpg'),
	(11, 'Seinfeld', 'Monica, Rachel, Phoebe, Chandler, Ross y Joey son seis amigos \r\ntreintañeros que viven en Nueva York. Juntos afrontan con humor las dificultades\r\n propias de su edad: líos amorosos, trabajo, familia y su propia convivencia.', 'Estados Unidos', 1994, 1, 'http://localhost/formulario/img/friends.jpg'),
	(12, 'El Irlandes', 'Frank Sheeran, veterano de la Segunda Guerra Mundial, estafador y asesino a sueldo recuerda su participación en el asesinato de Jimmy Hoffa. Uno de los grandes misterios sin resolver del país: la desaparición del legendario sindicalista Jimmy Hoffa. Un gran viaje por los turbios entresijos del crimen organizado: sus mecanismos internos, rivalidades y su conexión con la política.', 'Estados Unidos', 2019, 1, 'http://localhost/formulario/img/irlandes.jpg'),
	(13, 'Wednesday', 'Wednesday, Miércoles en español, es una serie spin-off de acción real de La familia Addams, concretamente sobre Miércoles. La historia sigue a este icónico personaje durante los años como estudiante en Nevermore Academy y su curiosa relación con sus estudiantes que debe realizar en esta especial academia.', 'Estados Unidos', 2022, 0, 'http://localhost/formulario/img/merlina.jpg'),
	(14, 'Narcos', 'La historia real de una peligrosa difusión y propagación de una red de cocaína por todo el mundo durante los años 70 y 80. Mientras tanto, las fuerzas de seguridad harán frente a este brutal y sangrante conflicto.', 'Estados Unidos', 2015, 0, 'http://localhost/formulario/img/narcos.jpg'),
	(15, 'Riverdale', 'La serie sigue la vida de un grupo de adolescentes en el pequeño pueblo Riverdale y explora la oscuridad oculta detrás de su imagen aparentemente perfecta.', 'Estados Unidos', 2017, 1, 'http://localhost/formulario/img/riverdale.jpg'),
	(16, 'Ted 2', 'La relación de John y Lori se ha roto, pero la de Ted y Vane va viento en popa, hasta tal punto que deciden casarse y tener hijos. Sin embargo, para ello Ted tendrá que demostrar ante un tribunal que es una persona con completa responsabilidad jurídica. La joven y atractiva abogada Samantha Jackson ayudará a John y a Ted en la lucha contra las convenciones y las autoridades.', 'Estados Unidos', 2015, 0, 'http://localhost/formulario/img/ted.jpg'),
	(17, 'Proyecto Adam', 'Adam Reed, un viajero del tiempo y piloto de combate, aterriza en el año 2022. Allí, se encuentra con su yo de doce años y, junto a él, tratará de salvar el futuro.', 'Estados Unidos', 2022, 0, 'http://localhost/formulario/img/adam.jpg'),
	(18, 'Un Sueño Posible', 'Basada en hechos reales. Michael Oher, un joven negro sin hogar, es acogido por una familia blanca, dispuesta a darle todo su apoyo para que pueda triunfar tanto como jugador de fútbol americano como en su vida privada. Por su parte Oher también influirá con su presencia en la vida de la familia Touhy.', 'Estados Unidos', 2009, 0, 'http://localhost/formulario/img/sandra.jpg'),
	(19, '1917', 'La película sigue a dos jóvenes soldados británicos a lo largo de un único día en lo más crudo de la Primera Guerra Mundial.', 'Estados Unidos', 2019, 0, 'http://localhost/formulario/img/1917.jpg'),
	(20, 'Mision Imposible: Fallout', 'El espía Ethan Hunt recibe en Belfast un mensaje secreto: los autodenominados "Apóstoles", seguidores del anarquista Solomon Lane, capturado por Hunt hace dos años, están intentando hacerse con tres núcleos de plutonio para crear potentes armas nucleares muy fáciles de transportar.', 'Estados Unidos', 2018, 1, 'http://localhost/formulario/img/mision.jpg'),
	(21, '1899', 'Un barco de vapor lleno de inmigrantes europeos viaja rumbo a Nueva York. Todos en el barco sueñan con un futuro en el nuevo mundo. Cuando, durante el trayecto, descubren otro barco de inmigrantes a la deriva en alta mar, su viaje da un giro inesperado. Lo que descubrirán a bordo convertirá su viaje hacia la tierra prometida en un enigma de pesadilla que conectará el pasado de cada uno de los pasajeros a través de una complicada red de secretos.', 'Alemania', 2022, 0, 'http://localhost/formulario/img/1899.jpg'),
	(22, 'Un Amor Tan Hermoso', 'Para una adolescente perdidamente enamorada de su vecino y amigo de la infancia, el amor es dulce y difícil a la vez. ¿Podrá su relación evolucionar a medida que crecen?', 'Corea del Sur', 2020, 0, 'http://localhost/formulario/img/amor.jpg'),
	(23, 'Arcane', 'Arcane es una serie de animación basada en el exitoso videojuego League of Legends o también conocido popularmente como Lol. La historia se centra principalmente en dos ciudades: en la rica y equilibrada Piltover y el sórdido corazón de Zaun.', 'Estados Unidos', 2021, 0, 'http://localhost/formulario/img/arcane.jpg'),
	(24, 'Atracos', 'Para proteger a su familia de un poderoso narcotraficante, el hábil Mehdi y su grupo de expertos ladrones se ven arrastrados a una violenta guerra territorial. Ve todo lo que quieras. Julien Leclercq se reúne con Sami Bouajila en esta serie llena de adrenalina basada en la película Atracadores.', 'Estados Unidos', 2023, 0, 'http://localhost/formulario/img/atracos.jpg'),
	(25, 'El Juego Del Calamar', 'Cientos de jugadores con problemas de dinero aceptan una invitación rarísima para competir en juegos infantiles. Dentro les esperan un tentador premio y desafíos letales.', 'Corea del Sur', 2021, 0, 'http://localhost/formulario/img/calamar.jpg'),
	(26, 'Assasination Classroom', 'El Gobierno japonés encarga una importante misión a los alumnos de la clase 3-E: deben destruir a su nuevo tutor, una poderosa criatura tentaculada que planea destruir el planeta el día de la graduación.', 'Japón', 2015, 0, 'http://localhost/formulario/img/clasroom.jpg'),
	(27, 'Dahmer', 'Sin una investigación policial concreta, la lista de víctimas de Jeffrey Dahmer, un adolescente problemático y de bajo rendimiento, comienza a crecer. ¿Su principal zona de cacería? Los barrios de afroamericanos y discotecas gay. Basado en hechos reales.', 'Estados Unidos', 2022, 0, 'http://localhost/formulario/img/damer.jpg'),
	(28, 'Un Hombre De Florida', 'Un policía caído en desgracia y sumido en deudas se ve obligado a volver a su Florida natal por una misión turbia que deviene en una cacería mortal. ', 'Estados Unidos', 2023, 0, 'http://localhost/formulario/img/florida.jpg'),
	(29, 'Gambito De Dama', 'En un orfanato de los años 50, una chica exhibe un talento extraordinario para el ajedrez. A medida que su fama sube como la espuma, intenta superar su adicción. ', 'Estados Unidos', 2020, 0, 'http://localhost/formulario/img/gambito.jpg'),
	(30, 'Kung Fusión', 'Ambientada en la China prerrevolucionaria, Sing, un ladrón de poca monta, aspira a ser uno de los crueles y sofisticados miembros de la Banda del Hacha cuyas actividades ilegales ensombrecen la ciudad.', 'Hong Kong', 2004, 0, 'http://localhost/formulario/img/kungfu.jpg'),
	(31, 'Lucifer', 'La historia de Lucifer es la que todos conocemos: un ángel caído del cielo. Sin embargo, este señor del infierno está aburrido de su propia existencia. Por ello, Lucifer decide abandonar su reino e ir a la ciudad de Los Ángeles a descubrir qué puede ofrecerle el mundo mortal.', 'Estados Unidos', 2016, 0, 'http://localhost/formulario/img/lucifer.jpg'),
	(32, 'Green Book', 'Años 60. Tony Lip, un rudo italoamericano del Bronx, es contratado como chófer del virtuoso pianista negro Don Shirley. Ambos emprenderán un viaje para una gira de conciertos por el Sur de Estados Unidos, donde Tony deberá seguir "El libro verde"', 'Estados Unidos', 2018, 0, 'http://localhost/formulario/img/greenbook.jpg'),
	(33, 'El Perfume', 'Jean-Baptiste Grenouille tiene su marca de nacimiento: no despide ningún olor. Al mismo tiempo posee un olfato prodigioso que le permite percibir todos los olores del mundo. Desde la miseria en que nace, el protagonista escala posiciones sociales convirtiéndose en un afamado perfumista.', 'Alemania', 2006, 0, 'http://localhost/formulario/img/perfume.jpg'),
	(34, 'Blade Runner 2049', 'Treinta años después de los eventos del primer film, un nuevo blade runner, \r\nK (Ryan Gosling) descubre un secreto profundamente oculto que podría acabar con el caos que impera \r\nen la sociedad. El descubrimiento de K le lleva a iniciar la búsqueda de Rick Deckard (Harrison Ford), \r\nun blade runner al que se le perdió la pista hace 30 años.', 'Estados Unidos', 2017, 0, 'http://localhost/formulario/img/bladerunner.jpg');
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.cuenta
CREATE TABLE IF NOT EXISTS `cuenta` (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `fecha_alta` timestamp NULL DEFAULT current_timestamp(),
  `id_cliente` int(11) NOT NULL,
  `id_modalidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`),
  KEY `id_cliente` (`id_cliente`),
  KEY `fk_cuenta_modalidad` (`id_modalidad`),
  CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cuenta_modalidad` FOREIGN KEY (`id_modalidad`) REFERENCES `modalidad` (`id_modalidad`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.cuenta: ~24 rows (aproximadamente)
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` (`id_cuenta`, `usuario`, `contrasena`, `fecha_alta`, `id_cliente`, `id_modalidad`) VALUES
	(11, 'dani', 'daniel123', '2023-04-21 10:40:46', 19, 1),
	(12, 'diego', 'diego123', '2023-05-03 12:52:30', 20, 2),
	(13, 'juan', 'juan123', '2023-05-10 11:10:48', 21, 2),
	(14, 'maria', 'maria12', '2023-05-10 11:26:48', 22, 1),
	(15, 'user123', '040173afc2', '2023-05-21 11:29:12', 23, 1),
	(16, 'cooluser', 'securepassword', '2023-05-21 11:29:12', 24, 1),
	(17, 'webmaster', 'p@ssw0rd', '2023-05-21 11:29:12', 25, 1),
	(18, 'newuser', 'welc0me2023', '2023-05-21 11:29:12', 26, 3),
	(19, 'techguru', '1234abcd!', '2023-05-21 11:29:12', 27, 1),
	(20, 'gamer123', 'gamingFTW', '2023-05-21 11:29:12', 28, 2),
	(21, 'moviebuff', 'cinema21!', '2023-05-21 11:29:12', 29, 3),
	(22, 'sportsfan', 'goTeam2023', '2023-05-21 11:29:12', 30, 2),
	(23, 'musiclover', 'melodies123', '2023-05-21 11:29:12', 31, 1),
	(24, 'bookworm', 'reading2023', '2023-05-21 11:29:12', 32, 1),
	(25, 'traveler', 'wanderlust!', '2023-05-21 11:29:12', 33, 1),
	(26, 'fitnessguru', 'fitlife2023', '2023-05-21 11:29:12', 34, 2),
	(27, 'foodie123', 'tastyDishes', '2023-05-21 11:29:12', 35, 1),
	(28, 'artlover', 'creativity!', '2023-05-21 11:29:12', 36, 2),
	(29, 'naturelover', 'outdoorsy23', '2023-05-21 11:29:12', 37, 2),
	(30, 'adventure', 'exploreNow!', '2023-05-21 11:29:12', 38, 2),
	(31, 'techlover', 'geekTech2023', '2023-05-21 11:29:12', 39, 1),
	(32, 'fashionista', 'style1234', '2023-05-21 11:29:12', 40, 3),
	(33, 'businesspro', 'success2023', '2023-05-21 11:29:12', 41, 3),
	(34, 'creativemind', 'imagination!', '2023-05-21 11:29:12', 42, 3);
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.director
CREATE TABLE IF NOT EXISTS `director` (
  `id_director` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  PRIMARY KEY (`id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.director: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` (`id_director`, `nombre`, `nacionalidad`) VALUES
	(1, 'Vince Gilligan', 'Estados Unidos'),
	(2, 'Christopher Nolan', 'Estados Unidos'),
	(3, 'Francis Ford Coppola', 'Estados Unidos'),
	(4, 'James Cameron', 'Canada'),
	(5, 'Frank Darabont', 'Francia'),
	(6, 'Quentin Tarantino', 'Estados Unidos'),
	(7, 'Martin Scorsese', 'Estados Unidos'),
	(8, 'Lana Wachowsky', 'Estados Unidos'),
	(9, 'Lilly Wachowsky', 'Estados Unidos'),
	(10, 'Marc Foster', 'Alemania'),
	(11, 'David Fincher', 'Estados Unidos'),
	(12, 'Damien Chazelle', 'Estados Unidos'),
	(13, 'Alex Graves', 'Estados Unidos'),
	(14, 'Mark Mylod', 'Reino Unido'),
	(15, 'Miguel Sapochnik', 'Argentina'),
	(16, 'Vince Gilligan', 'Estados Unidos'),
	(17, 'Adam Bernstein', 'Estados Unidos'),
	(18, 'Michelle MacLaren', 'Canada'),
	(19, 'James Burrows', 'Estados Unidos'),
	(20, 'José Padilha', 'Brasil'),
	(21, 'Steven Spielberg', 'Estados Unidos'),
	(22, 'Otto Bathurst', 'Reino Unido'),
	(23, 'Euros Lyn', 'Gales'),
	(24, 'John Krasinski', 'Estados Unidos'),
	(25, 'Steve Carrell', 'Estados Unidos'),
	(26, 'Greg Daniels', 'Estados Unidos');
/*!40000 ALTER TABLE `director` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.dirige_episodio
CREATE TABLE IF NOT EXISTS `dirige_episodio` (
  `id_director` int(11) NOT NULL,
  `id_episodio` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  PRIMARY KEY (`id_director`,`id_episodio`,`id_serie`),
  KEY `dirige_episodio_ibfk_2` (`id_serie`,`id_episodio`),
  CONSTRAINT `dirige_episodio_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.dirige_episodio: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `dirige_episodio` DISABLE KEYS */;
INSERT INTO `dirige_episodio` (`id_director`, `id_episodio`, `id_serie`) VALUES
	(1, 2, 11),
	(12, 1, 7),
	(12, 2, 7),
	(12, 24, 5),
	(15, 3, 7),
	(16, 1, 8),
	(16, 2, 8),
	(16, 4, 7),
	(16, 25, 26),
	(17, 3, 8),
	(18, 4, 8),
	(18, 5, 8),
	(18, 6, 8),
	(18, 28, 8),
	(20, 1, 24),
	(20, 2, 24),
	(20, 3, 24),
	(20, 4, 24),
	(20, 5, 24);
/*!40000 ALTER TABLE `dirige_episodio` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.dirige_pelicula
CREATE TABLE IF NOT EXISTS `dirige_pelicula` (
  `id_director` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  PRIMARY KEY (`id_director`,`id_pelicula`),
  KEY `id_pelicula` (`id_pelicula`),
  CONSTRAINT `dirige_pelicula_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dirige_pelicula_ibfk_2` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id_contenido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.dirige_pelicula: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `dirige_pelicula` DISABLE KEYS */;
INSERT INTO `dirige_pelicula` (`id_director`, `id_pelicula`) VALUES
	(1, 1),
	(1, 2),
	(2, 3),
	(4, 6),
	(5, 9),
	(6, 10),
	(6, 12),
	(7, 16),
	(8, 20),
	(10, 30),
	(11, 20);
/*!40000 ALTER TABLE `dirige_pelicula` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.episodios
CREATE TABLE IF NOT EXISTS `episodios` (
  `id_serie` int(11) NOT NULL,
  `id_episodio` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `duracion` int(11) NOT NULL,
  PRIMARY KEY (`id_serie`,`id_episodio`),
  CONSTRAINT `FK_episodios_serie` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id_contenido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.episodios: ~27 rows (aproximadamente)
/*!40000 ALTER TABLE `episodios` DISABLE KEYS */;
INSERT INTO `episodios` (`id_serie`, `id_episodio`, `nombre`, `duracion`) VALUES
	(5, 24, 'And now his watch is ended', 45),
	(7, 1, 'The pilot', 55),
	(7, 2, 'Gato en la bolsa', 45),
	(7, 3, '...Y la bolsa en el río', 52),
	(7, 4, 'Hombre Cáncer', 49),
	(7, 25, 'Kissed by fire', 45),
	(8, 1, 'Mind Blown', 50),
	(8, 2, 'Mad for Max', 52),
	(8, 3, 'Unlikely Allies', 55),
	(8, 4, 'Truth in Hawkins', 53),
	(8, 5, 'The AV Club', 55),
	(8, 6, 'The New Class', 56),
	(8, 28, 'Second sons', 45),
	(11, 1, 'The pilot', 50),
	(11, 2, 'El sonograma del final', 45),
	(11, 3, 'El del pulgar', 48),
	(11, 4, 'El de George Stephanopoulos', 52),
	(23, 33, 'Breaker of chains', 45),
	(24, 1, 'Pilot', 57),
	(24, 2, 'Cat\'s in the bag...', 47),
	(24, 3, '...And the Bag\'s in the River', 47),
	(24, 4, 'Cancer Man', 47),
	(24, 5, 'Gray Matter', 47),
	(26, 1, 'The Pilot', 25),
	(26, 2, 'The one with the Sonogram at the End', 22),
	(26, 3, 'The one with the Thumb', 22),
	(26, 4, 'The one with George Stephanopoulos', 23);
/*!40000 ALTER TABLE `episodios` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `FK_factura_cuenta` (`id_cuenta`),
  CONSTRAINT `FK_factura_cuenta` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.factura: ~40 rows (aproximadamente)
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` (`id_factura`, `fecha`, `precio`, `id_cuenta`) VALUES
	(1, '2021-01-01', 15, 11),
	(2, '2021-02-01', 25, 12),
	(3, '2021-03-01', 15, 13),
	(4, '2021-04-01', 25, 14),
	(5, '2021-05-01', 15, 15),
	(6, '2021-06-01', 25, 16),
	(7, '2021-07-01', 15, 17),
	(8, '2021-08-01', 25, 18),
	(9, '2021-09-01', 15, 19),
	(10, '2021-10-01', 25, 20),
	(11, '2021-11-01', 15, 21),
	(12, '2021-12-01', 25, 22),
	(13, '2022-01-01', 15, 23),
	(14, '2022-02-01', 25, 24),
	(15, '2022-03-01', 15, 25),
	(16, '2022-04-01', 25, 26),
	(17, '2022-05-01', 15, 27),
	(18, '2022-06-01', 25, 28),
	(19, '2022-07-01', 15, 29),
	(20, '2022-08-01', 25, 20),
	(21, '2023-01-01', 15, 11),
	(22, '2023-02-01', 25, 12),
	(23, '2023-03-01', 15, 13),
	(24, '2023-04-01', 25, 14),
	(25, '2023-05-01', 15, 15),
	(26, '2023-06-01', 25, 16),
	(27, '2023-07-01', 15, 17),
	(28, '2023-08-01', 25, 18),
	(29, '2023-09-01', 15, 19),
	(30, '2023-10-01', 25, 20),
	(31, '2023-11-01', 15, 21),
	(32, '2023-12-01', 25, 22),
	(33, '2022-09-01', 15, 11),
	(34, '2022-10-01', 25, 12),
	(35, '2022-11-01', 15, 13),
	(36, '2022-12-01', 25, 14),
	(37, '2023-09-01', 15, 15),
	(38, '2023-10-01', 25, 16),
	(39, '2023-11-01', 15, 17),
	(40, '2023-12-01', 25, 18);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.facturacion
CREATE TABLE IF NOT EXISTS `facturacion` (
  `id_cliente` int(11) NOT NULL,
  `num_tarjeta` varchar(16) NOT NULL,
  `num_cuenta_banco` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cliente`,`num_tarjeta`,`num_cuenta_banco`),
  CONSTRAINT `facturacion_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.facturacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `facturacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturacion` ENABLE KEYS */;

-- Volcando estructura para procedimiento skytv.generar_documento_cliente
DELIMITER //
CREATE PROCEDURE `generar_documento_cliente`(IN p_id_cliente INT)
BEGIN
    DECLARE nombre_cliente VARCHAR(50);
    DECLARE email_cliente VARCHAR(50);
    DECLARE dni_cliente VARCHAR(10);
    DECLARE edad_cliente INT;
    DECLARE direccion_cliente VARCHAR(100);
    DECLARE nacionalidad_cliente VARCHAR(50);
    DECLARE id_modalidad INT;
    DECLARE costo_anual FLOAT;
    
    -- Obtener información del cliente
    SELECT nombre, email, dni, edad, direccion, nacionalidad, cuenta.id_modalidad
    INTO nombre_cliente, email_cliente, dni_cliente, edad_cliente, direccion_cliente, nacionalidad_cliente, id_modalidad
    FROM cliente INNER JOIN cuenta ON cliente.id_cliente=cuenta.id_cliente
    WHERE cliente.id_cliente = p_id_cliente;
    
    -- Calcular costo anual
    IF id_modalidad = 1 THEN
        SET costo_anual = 0;
    ELSEIF id_modalidad = 2 THEN
        SET costo_anual = 8.99 * 12;
    ELSEIF id_modalidad = 3 THEN
        SET costo_anual = 12.99 * 12;
    END IF;
    
        -- Crear tabla temporal
    DROP TEMPORARY TABLE IF EXISTS reporte_cliente;
    CREATE TEMPORARY TABLE reporte_cliente (
        nombre VARCHAR(50),
        email VARCHAR(50),
        dni VARCHAR(10),
        direccion VARCHAR(100),
        edad INT(3),
        id_modalidad VARCHAR(20),
        total_anual DECIMAL(10,2)
    );
    
      -- Insertar datos en tabla temporal
    	INSERT INTO reporte_cliente(nombre, email, dni, direccion, edad, id_modalidad, total_anual)
    	VALUES(nombre_cliente, email_cliente, dni_cliente, direccion_cliente, edad_cliente, id_modalidad,costo_anual);
    	-- Generar documento
		SELECT *
		INTO OUTFILE 'DocumentosCliente/informe_cliente.txt'
		FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'
		FROM reporte_cliente;
		
             
END//
DELIMITER ;

-- Volcando estructura para procedimiento skytv.generar_login
DELIMITER //
CREATE PROCEDURE `generar_login`(IN nombre_cliente VARCHAR(50), OUT login_cliente VARCHAR(50))
BEGIN
  DECLARE apellido_cliente VARCHAR(50);
  DECLARE login_base VARCHAR(50);
  DECLARE login_existente INT DEFAULT 0;
  DECLARE i INT DEFAULT 1;

  -- Obtener el apellido del cliente
  SELECT apellido INTO apellido_cliente FROM cliente WHERE nombre = nombre_cliente;

  -- Generar el login base
  SET login_base = CONCAT(LEFT(nombre_cliente, 1), apellido_cliente);

  -- Verificar si el login base ya existe en la tabla cliente
  SELECT COUNT(*) INTO login_existente FROM cliente WHERE login = login_base;

  -- Si el login base ya existe, agregar un número incremental al final hasta encontrar un login disponible
  WHILE login_existente > 0 DO
    SET login_base = CONCAT(login_base, i);
    SELECT COUNT(*) INTO login_existente FROM cliente WHERE login = login_base;
    SET i = i + 1;
  END WHILE;

  -- Asignar el login generado a la variable de salida
  SET login_cliente = login_base;

END//
DELIMITER ;

-- Volcando estructura para tabla skytv.genero
CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.genero: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`id_genero`, `nombre`) VALUES
	(1, 'ficción'),
	(2, 'acción'),
	(3, 'comedia'),
	(4, 'drama'),
	(5, 'aventura'),
	(6, 'romántico'),
	(7, 'suspenso'),
	(8, 'fantasia'),
	(9, 'animación'),
	(10, 'misterio'),
	(11, 'Terror');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.ha_visto
CREATE TABLE IF NOT EXISTS `ha_visto` (
  `id_cuenta` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL,
  `num_visto` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_cuenta`,`id_contenido`),
  KEY `id_contenido` (`id_contenido`),
  CONSTRAINT `ha_visto_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ha_visto_ibfk_2` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.ha_visto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ha_visto` DISABLE KEYS */;
/*!40000 ALTER TABLE `ha_visto` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.ha_visto_episodio
CREATE TABLE IF NOT EXISTS `ha_visto_episodio` (
  `id_cuenta` int(11) NOT NULL,
  `id_episodio` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `num_vistos` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_cuenta`,`id_episodio`,`id_serie`),
  KEY `id_serie` (`id_serie`,`id_episodio`),
  CONSTRAINT `ha_visto_episodio_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ha_visto_episodio_ibfk_2` FOREIGN KEY (`id_serie`, `id_episodio`) REFERENCES `episodios` (`id_serie`, `id_episodio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.ha_visto_episodio: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `ha_visto_episodio` DISABLE KEYS */;
INSERT INTO `ha_visto_episodio` (`id_cuenta`, `id_episodio`, `id_serie`, `num_vistos`) VALUES
	(11, 1, 7, 13),
	(11, 1, 11, 1),
	(11, 2, 7, 6),
	(11, 2, 11, 4),
	(11, 3, 7, 2),
	(11, 3, 11, 1),
	(11, 4, 7, 2),
	(11, 4, 11, 1);
/*!40000 ALTER TABLE `ha_visto_episodio` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.modalidad
CREATE TABLE IF NOT EXISTS `modalidad` (
  `id_modalidad` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_modalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.modalidad: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `modalidad` DISABLE KEYS */;
INSERT INTO `modalidad` (`id_modalidad`, `tipo`) VALUES
	(1, 'gratis'),
	(2, 'regular'),
	(3, 'premiun');
/*!40000 ALTER TABLE `modalidad` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.pelicula
CREATE TABLE IF NOT EXISTS `pelicula` (
  `id_contenido` int(11) NOT NULL,
  `duracion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_contenido`),
  CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.pelicula: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `pelicula` DISABLE KEYS */;
INSERT INTO `pelicula` (`id_contenido`, `duracion`) VALUES
	(1, 123),
	(2, 90),
	(3, 120),
	(4, 110),
	(6, 87),
	(9, 79),
	(10, 90),
	(12, 121),
	(16, 132),
	(17, 98),
	(18, 78),
	(19, 88),
	(20, 78),
	(28, 98),
	(30, 79),
	(32, 130),
	(33, 150),
	(34, 99);
/*!40000 ALTER TABLE `pelicula` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.pertenece_a
CREATE TABLE IF NOT EXISTS `pertenece_a` (
  `id_contenido` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  PRIMARY KEY (`id_contenido`,`id_genero`),
  KEY `id_genero` (`id_genero`),
  CONSTRAINT `pertenece_a_ibfk_1` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pertenece_a_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.pertenece_a: ~63 rows (aproximadamente)
/*!40000 ALTER TABLE `pertenece_a` DISABLE KEYS */;
INSERT INTO `pertenece_a` (`id_contenido`, `id_genero`) VALUES
	(1, 1),
	(1, 8),
	(2, 1),
	(2, 5),
	(2, 8),
	(3, 1),
	(4, 1),
	(4, 2),
	(5, 1),
	(6, 2),
	(7, 4),
	(8, 4),
	(8, 6),
	(9, 2),
	(9, 3),
	(9, 5),
	(10, 1),
	(10, 3),
	(11, 3),
	(12, 2),
	(12, 4),
	(13, 3),
	(13, 5),
	(13, 8),
	(14, 2),
	(15, 4),
	(15, 6),
	(15, 10),
	(16, 3),
	(17, 1),
	(17, 2),
	(18, 4),
	(19, 2),
	(19, 7),
	(20, 1),
	(20, 2),
	(21, 4),
	(21, 10),
	(22, 3),
	(22, 6),
	(23, 2),
	(23, 9),
	(24, 2),
	(24, 7),
	(25, 4),
	(26, 2),
	(26, 3),
	(26, 9),
	(27, 4),
	(27, 10),
	(27, 11),
	(28, 3),
	(29, 4),
	(30, 2),
	(30, 3),
	(31, 4),
	(31, 6),
	(32, 4),
	(33, 4),
	(33, 7),
	(33, 10),
	(34, 1),
	(34, 2);
/*!40000 ALTER TABLE `pertenece_a` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.puede_ver
CREATE TABLE IF NOT EXISTS `puede_ver` (
  `id_modalidad` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL,
  PRIMARY KEY (`id_modalidad`,`id_contenido`),
  KEY `id_contenido` (`id_contenido`),
  CONSTRAINT `puede_ver_ibfk_1` FOREIGN KEY (`id_modalidad`) REFERENCES `modalidad` (`id_modalidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `puede_ver_ibfk_2` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.puede_ver: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `puede_ver` DISABLE KEYS */;
INSERT INTO `puede_ver` (`id_modalidad`, `id_contenido`) VALUES
	(2, 34);
/*!40000 ALTER TABLE `puede_ver` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.serie
CREATE TABLE IF NOT EXISTS `serie` (
  `id_contenido` int(11) NOT NULL,
  `num_temporadas` int(11) DEFAULT NULL,
  `num_episodios` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_contenido`),
  CONSTRAINT `serie_ibfk_1` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.serie: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `serie` DISABLE KEYS */;
INSERT INTO `serie` (`id_contenido`, `num_temporadas`, `num_episodios`) VALUES
	(5, NULL, NULL),
	(7, NULL, NULL),
	(8, NULL, NULL),
	(11, 10, 20),
	(13, NULL, NULL),
	(14, NULL, NULL),
	(15, NULL, NULL),
	(21, NULL, NULL),
	(22, NULL, NULL),
	(23, NULL, NULL),
	(24, NULL, NULL),
	(25, NULL, NULL),
	(26, NULL, NULL),
	(27, NULL, NULL),
	(29, NULL, NULL),
	(31, NULL, NULL);
/*!40000 ALTER TABLE `serie` ENABLE KEYS */;

-- Volcando estructura para tabla skytv.ser_favorito
CREATE TABLE IF NOT EXISTS `ser_favorito` (
  `id_cuenta` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL,
  PRIMARY KEY (`id_cuenta`,`id_contenido`),
  KEY `id_contenido` (`id_contenido`),
  CONSTRAINT `ser_favorito_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ser_favorito_ibfk_2` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla skytv.ser_favorito: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `ser_favorito` DISABLE KEYS */;
INSERT INTO `ser_favorito` (`id_cuenta`, `id_contenido`) VALUES
	(11, 9),
	(11, 10),
	(11, 11),
	(11, 12),
	(11, 15),
	(11, 20);
/*!40000 ALTER TABLE `ser_favorito` ENABLE KEYS */;

-- Volcando estructura para disparador skytv.actualizar_modalidad
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER actualizar_modalidad
AFTER INSERT ON contenido
FOR EACH ROW
BEGIN
    DECLARE modalidad_id INT;

    IF NEW.anyo <= 2015 THEN
        SET modalidad_id = 1;
    ELSEIF NEW.anyo BETWEEN 2016 AND 2020 THEN
        SET modalidad_id = 2;
    ELSE
        SET modalidad_id = 3;
    END IF;

    INSERT INTO puede_ver (id_modalidad, id_contenido) VALUES (modalidad_id, NEW.id_contenido);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador skytv.agregar_favorito
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER agregar_favorito
AFTER INSERT ON ser_favorito
FOR EACH ROW
BEGIN
  UPDATE contenido
  SET num_favorito = num_favorito + 1
  WHERE id_contenido = NEW.id_contenido;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador skytv.quitar_favorito
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER quitar_favorito
AFTER DELETE ON ser_favorito
FOR EACH ROW
BEGIN
  UPDATE contenido
  SET num_favorito = num_favorito - 1
  WHERE id_contenido = OLD.id_contenido;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
