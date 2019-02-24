-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2019 a las 01:44:21
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `xportgoldbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuerpo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuente_noticia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_publicacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuente_imagen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `cuerpo`, `fuente_noticia`, `fecha_publicacion`, `name_img`, `fuente_imagen`, `user_id`, `borrado`, `updated_at`, `created_at`) VALUES
(1, 'Uruguay anuncia su convocatoria ', 'El seleccionador de Uruguay, Óscar Tabárez, reveló este martes 15 de mayo una lista de 26 futbolistas convocados para la Copa Mundial de la FIFA Rusia Rusia 2018™.\r\n\r\nEn la nómina destaca la presencia de varios jóvenes que participaron en la última etapa de las eliminatorias sudamericanas, confirmando el recambio generacional que está llevando a cabo el seleccionador en la Celeste.\r\n\r\nEntre los ausentes que formaron parte del proceso clasificatorio se encuentran Egidio Arévalo Ríos, Mathías Corujo, Álvaro González, Álvaro Pereira (lesionado) y Gastón Pereiro\r\n\r\nEn el Mundial Uruguay jugará en el Grupo F junto a Egipto (15 de junio en Ekaterimburgo), Arabia Saudí (20 de junio en Rostov del Don) y Rusia (25 de junio en Samara).\r\n', 'Copa Mundial de la FIFA 2018™ ', '2018-05-14 04:30:00', 'img_15_may_1.jpg', '© AFP', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Alemania hace pública una nómina de 24 jugadores', 'El seleccionador de Alemania, Joachim Loew, reveló este martes 15 de mayo una lista de 27 futbolistas convocados para la Copa Mundial de la FIFA Rusia Rusia 2018™.\r\n\r\nEn la nómina destacan las ausencias de Mario Goetze y Andreas Schuerrle, autor y asistidor del gol que le dio a los alemanes el título mundial en Brasil 2014 ante Argentina, y la presencia de Manuel Neuer, de baja buena parte de la temporada.\r\n\r\n\"Ir al Mundial sin haber jugado antes es difícil y Manuel lo sabe\", dijo Loew luego de anunciar la convocatoria.\r\n\r\nAlemania jugará dos amistosos previos a la Copa del Mundo: frente a Austria y Arabia Saudí, ambos a comienzos de junio.\r\n\r\nPara Rusia 2018 quedó encuadrada en el Grupo F junto a México (17 de junio en Moscú), Suecia (23 de junio en Sochi) y República de Corea (27 de junio en Kazán).', 'Copa Mundial de la FIFA 2018™ / FIFA.COM', '2018-05-16 07:56:52', 'img_15_may_2.jpg', '© Getty Images', 0, 0, '2019-02-24 04:21:06', '0000-00-00 00:00:00'),
(3, 'Perú anuncia su nómina provisional de 24 jugadores', 'Perú hizo pública el 16 de mayo la lista provisional de 24 jugadores con la que afrontará su regreso a la Copa Mundial de la FIFA tras 36 años de ausencia. \r\n\r\nEl técnico argentino Ricardo Gareca resolvió confiar en el grupo con el que vino peleando en la fase de clasificación y dejó fuera de la convocatoria al delantero Claudio Pizarro, del Colonia de Alemania, y a Cristian Benavente, de Royal Charleroi Sporting de Bélgica. \r\n\r\nPerú competirá en el Grupo C con Francia, Australia y Dinamarca.', 'Copa Mundial de la FIFA 2018™ / FIFA.COM', '2018-05-17 01:06:44', 'img_16_may_1.jpg', '© Getty Images', 0, 0, '2019-02-24 03:44:23', '0000-00-00 00:00:00'),
(4, 'Héctor Moreno, y los cuatro caminos al éxito', 'Con 30 años cumplidos, Rusia 2018 no puede llegar en mejor momento para Héctor Moreno. Portaestandarte de una generación de jugadores que se conoce desde hace muchos años, el central de la Real Sociedad española llegará al torneo en su fase máxima de madurez y sueña con bañarse de gloria con sus compañeros de toda la vida.\r\n\r\nSabe, sin embargo, que será difícil. Enmarcado en un duro grupo con Alemania, Suecia y República de Corea, El Tri no podrá realmente bajar la guardia si quiere llegar lejos. Moreno lo sabe, y no solo eso. \r\n\r\nEn entrevista exclusiva con FIFA.com, enumera cómo, a su juicio, México deberá manejar los cuatro factores más importantes en el futbol para que la aventura rusa tenga inicio, continuación y final feliz.\r\nAmbición\r\n\r\n“Siendo totalmente sinceros, mi gran ambición es ser campeón el mundo. A cualquier jugador que le preguntes responderá lo mismo, y sé que mis compañeros también lo tienen fijo en su mente. Queremos ir a Rusia a ganar.\r\n\r\nPor supuesto, estamos conscientes que, después, hay muchos factores que también influyen en conseguir ese objetivo: la suerte, el árbitro, el rival… Para mí, éxito sería llegar a mi casa y estar tranquilo y que mi gente cercana esté orgullosa de mí. El resultado final no sé cuál será, pero yo estaré contento sabiendo que lo he dejado todo por mi país.”\r\nPreparación\r\n\r\n“En esta etapa con Juan Carlos Osorio nos hemos preparado como nunca. He aprendido y mejorado muchísimo. No solo nos dice qué hacer, sino que nos ha dado las herramientas para poder tomar las mejores decisiones. Está poniendo todo de su parte para mejorar.\r\n\r\nAsí sales al partido con un plan muy claro. A veces sale como queremos, pero otras el rival cuenta y ya nos ha pasado de perder en esta fase de preparación. Pero incluso eso es aprendizaje, tanto para él como para nosotros. Hay que darle una vuelta y seguir adelante.\r\n\r\nY en ese sentido, también en este ciclo hemos tenido las mejores facilidades. Un nuevo fisioterapeuta, un coach mental… Son detalles, cosas diferentes que no nos prometen que nos van a hacer campeones del mundo, pero sin duda nos ponen un poco más cerca”.\r\n\r\n\r\nAfición\r\n\r\n“El aficionado mexicano es muy apasionado, y la selección es muy importante para el país. Nosotros lo sabemos y lo entendemos. En general, el entorno que se me acerca siempre es positivo y desea lo mejor. En la calle y en redes sociales, casi siempre me manifiestan su apoyo y las ganas de que nos vaya muy bien en el Mundial.\r\n\r\nObviamente siempre habrá gente que no esté de acuerdo con cosas, pero lo tomas como viene y nada más. Aceptas las críticas cuando las hay pero en general están deseosos como nosotros de que todo vaya muy bien.\r\n\r\nNosotros queremos darles alegrías también por situaciones que van muy lejos del futbol, por todo lo que vivimos en México. Es una pequeña parte en la que podemos ayudar a nuestra afición y a nuestras familias, pero muy importante”.\r\n\r\n\r\nComunión\r\n\r\n“Con la mayor parte de mis compañeros nos conocemos desde muy jóvenes y es importantísimo. La base de 2014 se mantiene pero con cuatro años más de experiencia, donde hemos crecido todos a nivel personal y profesional. Todos estamos en una madurez maravillosa y eso se refleja\".\r\n\r\nYo ahora tengo una familia, con una tranquilidad en mi vida cotidiana que me permite concentrarme en el trabajo y tomarlo con mejor ánimo, y así pasa con la mayoría. Afortunadamente tenemos una vida personal equilibrada.\r\n\r\nEn estos años hemos pasado todas las experiencias posibles, que nos han hecho crecer, madurar, aprender, y acercarnos mucho los unos con los otros. Estamos más unidos que nunca, el grupo es buenísimo y eso, sin duda, jugará un papel fundamental en Rusia”.\r\n\r\n', 'Copa Mundial de la FIFA 2018™ / FIFA.COM', '2018-05-17 01:16:37', 'img_16_may_2.JPG', '© Getty Images', 0, 0, '2019-02-24 03:16:52', '0000-00-00 00:00:00'),
(5, 'Sampaoli elige a sus 35 hombres en la lista', 'La Asociación de Fútbol Argentina dio a conocer el lunes 14 de mayo la lista provisional de 35 futbolistas para la Copa Mundial de la FIFA Rusia Rusia 2018™.\r\n\r\nEn el listado aparecen 10 jugadores que fueron subcampeones en Brasil 2014. Ellos son Sergio Romero, Nicolás Otamendi, Marco Rojo, Javier Mascherano, Lucas Biglia, Ángel Di María, Enzo Pérez, Sergio Agüero, Gonzalo Higuaín y Lionel Messi.\r\n\r\nAdemás, Jorge Sampaoli inscribió a tres jugadores que hasta ahora jamás habían sido convocados a la selección: el arquero Franco Armani, de River Plate; el mediocampista Rodrigo Battaglia, del Sporting de Lisboa; y el extremo Ricardo Centurión, de Racing Club.\r\n\r\nLa Albiceste se despedirá de su gente el 29 de mayo, con un amistoso ante Haití en Buenos Aires.\r\n\r\nArgentina quedó encuadrada en el Grupo D junto a Islandia (16 de junio en Moscú), Croacia (21 de junio en Nizhni Nóvgorod) y Nigeria (26 de junio en San Petersburgo).', 'Copa Mundial de la FIFA 2018™ / FIFA.COM', '2018-05-17 01:21:52', 'img_16_may_3.jpg', '© AFP', 0, 0, '2019-02-24 03:16:33', '0000-00-00 00:00:00'),
(6, 'Colombia anuncia a los 35 preseleccionados', 'La Federación Colombiana de Fútbol dio a conocer el lunes 14 de mayo a través de un comunicado la lista provisional de 35 futbolistas para la Copa Mundial de la FIFA Rusia 2018TM.\r\n\r\nEn la misma hay 11 futbolistas que participaron de Brasil 2014, destacándose entre ellos James Rodríguez, David Ospina, Carlos Sánchez, Abel Aguilar y Cristian Zapata.\r\n\r\nTambién sobresale, por supuesto, el nombre de Radamel Falcao García, quien se perdió el último Mundial por lesión.\r\n\r\nLa sorpresa en lista de José Pekerman es el joven arquero Iván Arboleda, quien milita en el club Banfield de Argentina, el único de los 35 sin experiencia anterior en la selección.\r\n\r\nEl equipo se despedirá de su gente el viernes 25 de mayo, con un evento en el estadio Estadio Nemesio Camacho El Campín de Bogotá.\r\n\r\nColombia quedó encuadrada en el Grupo H junto a Japón (19 de junio en Saransk), Polonia (24 de junio en Kazán) y Senegal (28 de junio en Samara).\r\n\r\nLa lista preliminar de 35 está integrada por:\r\n\r\nArqueros: David Ospina (Arsenal, Inglaterra), Camilo Vargas (Deportivo Cali), Iván Arboleda (Banfield, Argentina), José Fernando Cuadrado (Once Caldas).\r\n\r\nDefensores: Santiago Arias, (PSV, Holanda), Frank Fabra (Boca Juniors, Argentina), Dávinson Sánchez (Tottenham, Inglaterra), Cristian Zapata (AC Milán, Italia), Yerry Mina (Barcelona, España), Johan Mojica (Girona, España), Bernardo Espinosa (Girona, España), Óscar Murillo (Pachuca, México), Farid Díaz (Olimpia, Paraguay), Stefan Medina (Monterrey, México), William Tesillo (León, México).\r\n\r\nMediocampistas: Abel Aguilar (Cali), Wilmar Barrios (Boca Juniors, Argentina), James Rodríguez (Bayern de Múnich, Alemania), Carlos Sánchez (Espanyol, España), Jefferson Lerma (Levante, España), Giovanni Moreno (Shanghai Shenhua, China), Juan Fernando Quintero (River Plate, Argentina), Edwin Cardona (Boca Juniors, Argentina), Juan Guillermo Cuadrado (Juventus, Italia), Gustavo Cuéllar (Flamengo, Brasil), Sebastián Pérez (Boca Juniors, Argentina), Mateus Uribe (América, México)\r\n\r\nDelanteros: Radamel Falcao García (Mónaco, Francia), Carlos Bacca (Villarreal, España), Duván Zapata (Sampdoria, Italia), Miguel Borja (Palmeiras, Brasil), José Izquierdo (Brighton, Inglaterra), Luis Muriel (Sevilla, España), Teófilo Gutiérrez (Junior), Yimmi Chará (Junior).\r\n\r\nNOTA: Todas las listas son provisionales hasta que la FIFA haga el anuncio oficial de los 23 jugadores elegidos por cada una de las 32 selecciones participantes en Rusia 2018 el 4 de junio.', 'Copa Mundial de la FIFA 2018™ / FIFA.COM', '2018-05-17 01:33:24', 'img_16_may_4.jpg', '© Getty Images', 0, 1, '2019-02-24 03:17:58', '0000-00-00 00:00:00'),
(7, 'Titulo de prueba modificado 4', 'La Asociación de Fútbol Argentina dio a conocer el lunes 14 de mayo la lista provisional de 35 futbolistas para la Copa Mundial de la FIFA Rusia Rusia 2018™.\r\n\r\nEn el listado aparecen 10 jugadores que fueron subcampeones en Brasil 2014. Ellos son Sergio Romero, Nicolás Otamendi, Marco Rojo, Javier Mascherano, Lucas Biglia, Ángel Di María, Enzo Pérez, Sergio Agüero, Gonzalo Higuaín y Lionel Messi.\r\n\r\nAdemás, Jorge Sampaoli inscribió a tres jugadores que hasta ahora jamás habían sido convocados a la selección: el arquero Franco Armani, de River Plate; el mediocampista Rodrigo Battaglia, del Sporting de Lisboa; y el extremo Ricardo Centurión, de Racing Club.\r\n\r\nLa Albiceste se despedirá de su gente el 29 de mayo, con un amistoso ante Haití en Buenos Aires.\r\n\r\nArgentina quedó encuadrada en el Grupo D junto a Islandia (16 de junio en Moscú), Croacia (21 de junio en Nizhni Nóvgorod) y Nigeria (26 de junio en San Petersburgo).', 'fuente de prueba', '2019-02-20 04:00:00', 'img_10_jun_3.jpg', 'fuente de la imagen', 64, 1, '2019-02-24 03:25:48', '2019-02-21 03:43:51'),
(8, 'Titulo de prueba modificado desdepues de borrado', 'asdasd.\r\n\r\nasdasd.\r\n\r\nasdsadasdasdasdsd.', 'fuente de prueba', '2019-02-22 04:00:00', '2019-02-23_2056_img_29_may_2.jpg', 'fuente de la imagen', 64, 1, '2019-02-24 02:27:34', '2019-02-24 00:56:03'),
(9, 'Titulo de prueba falcao 2', 'lorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsu\r\n\r\n\r\n\r\nlorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsulorem ipsu', 'fuente de prueba', '2019-02-23 04:00:00', '2019-02-23_2326_img_12_jun_4.jpg', 'fuente de la imagen', 64, 0, '2019-02-24 04:20:44', '2019-02-24 03:26:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
