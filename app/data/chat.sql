-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2016 a las 03:46:03
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agregados`
--

CREATE TABLE IF NOT EXISTS `agregados` (
  `id` int(11) NOT NULL,
  `idConect` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE IF NOT EXISTS `amigos` (
  `id` int(11) NOT NULL,
  `idUserLogin` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id`, `idUserLogin`, `idUser`, `status`) VALUES
(51, 89, 92, 1),
(53, 92, 89, 1),
(55, 89, 91, 1),
(56, 91, 89, 1),
(57, 101, 89, 1),
(58, 89, 101, 1),
(61, 90, 101, 1),
(62, 101, 90, 1),
(63, 89, 90, 1),
(64, 90, 89, 1),
(67, 90, 102, 1),
(68, 102, 90, 1),
(69, 103, 102, 1),
(70, 103, 101, 1),
(71, 103, 94, 1),
(72, 103, 93, 1),
(73, 103, 92, 1),
(74, 103, 91, 1),
(75, 103, 90, 1),
(76, 103, 89, 1),
(77, 89, 103, 1),
(78, 90, 103, 1),
(79, 91, 103, 1),
(80, 92, 103, 1),
(81, 93, 103, 1),
(82, 94, 103, 1),
(83, 101, 103, 1),
(84, 102, 103, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=745 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `nombre`, `idUsuario`) VALUES
(641, '13.jpg', 90),
(644, 'QUIENES NO VA A ESTRENAR.jpg', 90),
(645, 'Sabe.jpg', 90),
(647, 'si.jpg', 90),
(652, 'to4WQEg1452700307.gif', 92),
(653, '12345575_487321004773393_4781271247904712246_n.jpg', 92),
(654, '12347728_487325304772963_1072482781590448944_n.jpg', 92),
(677, 'cap1.png', 92),
(678, 'cap2.png', 92),
(679, 'cap3.png', 92),
(680, 'cap4.png', 92),
(681, 'puesto2.png', 92),
(682, 'red.PNG', 92),
(683, 'red3.png', 92),
(684, 'to4WQEg1452700307.gif', 92),
(694, '1453297579.png', 91),
(695, 'cap1.png', 91),
(696, 'cap2.png', 91),
(697, 'cap3.png', 91),
(698, 'hahah.jpg', 91),
(699, 'puesto2.png', 91),
(700, 'red.PNG', 91),
(701, 'to4WQEg1452700307.gif', 91),
(722, 'Hydrangeas.jpg', 102),
(723, 'Koala.jpg', 102),
(724, 'Jellyfish.jpg', 102),
(726, 'Tulips.jpg', 102),
(728, 'perfil.jpg', 89),
(729, 'img1.jpg', 89),
(730, 'img2.jpg', 89),
(731, 'profile.jpg', 89),
(732, 'img3.jpg', 89),
(733, 'img4.jpg', 89),
(734, 'img5.jpg', 89),
(735, 'img6.jpg', 89),
(737, '1012567_10102582589092551_1129291640220308368_n.jpg', 103),
(738, '1622765_10101993038596471_3488963240604746636_n.jpg', 103),
(739, '1910381_10102615568850851_3583242062064948983_n.jpg', 103),
(740, '11036456_10101999874192881_8686595160942918408_n.jpg', 103),
(741, '11159960_10102044574682741_3067619164834852247_n.jpg', 103),
(742, '11709236_10102217071632471_660303447386198419_n.jpg', 103),
(743, '12043198_10102407657257351_7875137350415592500_n.jpg', 103),
(744, '12115766_10102407657935991_4333582913402227385_n.jpg', 103);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgportada`
--

CREATE TABLE IF NOT EXISTS `imgportada` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imgportada`
--

INSERT INTO `imgportada` (`id`, `nombre`) VALUES
(1, 'portada1.jpg'),
(2, 'portada2.jpg\r\n'),
(3, 'portada3.jpg'),
(4, 'portada4.jpg'),
(5, 'portada5.jpg'),
(6, 'portada6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL,
  `idUserLogin` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `idUserLogin`, `idUser`, `mensaje`) VALUES
(24, 101, 90, 'caremano'),
(25, 101, 90, 'caremano'),
(26, 101, 90, 'caca2'),
(27, 101, 90, 'caca2'),
(28, 101, 90, 'caca2'),
(29, 101, 90, 'caca2'),
(30, 101, 90, 'ccaca'),
(31, 101, 90, 'ccaca'),
(32, 101, 90, 'ccaca'),
(33, 101, 90, 'ccaca'),
(34, 101, 90, 'es'),
(35, 101, 90, 'es'),
(36, 101, 90, 'es'),
(37, 101, 90, 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fechaNac` varchar(50) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `portada` varchar(100) NOT NULL,
  `online` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `fechaNac`, `genero`, `correo`, `username`, `pass`, `foto`, `portada`, `online`) VALUES
(89, 'Esleyder', 'Ordoñez', '21', 'hombre', 'mega@gmail.com', '111', '698d51a19d8a121ce581499d7b701668', 'profile.jpg', 'portada2.jpg', 0),
(90, 'natalia', 'ordoñez', '19', 'mujer', 'nati2@gmail.com', '222', 'bcbe3365e6ac95ea2c0343a2395834dd', 'Sabe.jpg', 'portada3.jpg', 0),
(91, 'estiven', 'hurtado', '13', 'hombre', 'estiven12@gmail.com', '333', '310dcbbf4cce62f762a2aaa148d556bd', 'hahah.jpg', 'portada3.jpg', 0),
(92, 'nidia', 'ordoñez', '40', 'mujer', 'nidiaemir@gmail.com ', '444', '550a141f12de6341fba65b0ad0433500', '12371185_1632504010344276_5655033694651912045_o.jpg', 'portada3.jpg', 0),
(93, 'jaime', 'calimero', '34', 'hombre', 'argimner@gmail.com', '555', '15de21c670ae7c3f6f3f1f37029303c9', 'img5.jpg', 'portada3.jpg', 0),
(94, 'yina', 'parodi', '24', 'mujer', 'yina@gmail.com', '666', 'fae0b27c451c728867a567e8c1bb4e53', 'img6.jpg', 'portada3.jpg', 0),
(101, 'francisco', 'cifuentes', '23', 'hombre', 'cifuentes@gmai.com', '999', 'b706835de79a2b4e80506f582af3676a', 'Guason.jpg', 'portada3.jpg', 0),
(102, 'Juan', 'Valdez', '57', 'hombre', 'juanValdez@gmail.com', '1212', 'b706835de79a2b4e80506f582af3676a', 'Koala.jpg', 'nota1-0.jpg', 0),
(103, 'marck', 'zuckerberg', '22', 'hombre', 'marck123@gmail.com', 'facebook', '26cae7718c32180a7a0f8e19d6d40a59', 'marck.jpg', 'fondo.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agregados`
--
ALTER TABLE `agregados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idConect` (`idConect`);

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUserLogin` (`idUserLogin`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `imgportada`
--
ALTER TABLE `imgportada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agregados`
--
ALTER TABLE `agregados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=745;
--
-- AUTO_INCREMENT de la tabla `imgportada`
--
ALTER TABLE `imgportada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agregados`
--
ALTER TABLE `agregados`
  ADD CONSTRAINT `agregados_ibfk_1` FOREIGN KEY (`idConect`) REFERENCES `amigos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`idUserLogin`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
