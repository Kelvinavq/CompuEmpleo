-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2022 a las 04:04:27
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compuempleo`
--
CREATE DATABASE IF NOT EXISTS `compuempleo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `compuempleo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conocimientos`
--

CREATE TABLE `conocimientos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conocimientos`
--

INSERT INTO `conocimientos` (`id`, `id_usuario`, `descripcion`) VALUES
(6, 19, 'java'),
(8, 22, 'Java'),
(9, 2, 'Java'),
(10, 2, 'Php'),
(11, 2, 'Html'),
(12, 2, 'JavaScript');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conocimientos_empresa`
--

CREATE TABLE `conocimientos_empresa` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `conocimiento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculums`
--

CREATE TABLE `curriculums` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `curriculum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curriculums`
--

INSERT INTO `curriculums` (`id`, `id_usuario`, `curriculum`) VALUES
(17, 2, 'Kelvin_cv.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `tipo_id` varchar(100) NOT NULL,
  `rif` varchar(100) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `numero_trabajadores` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `logo` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `telefono`, `email`, `pass`, `nombre_empresa`, `estado`, `tipo_id`, `rif`, `direccion`, `numero_trabajadores`, `descripcion`, `logo`) VALUES
(4, 'prueba1', '041215947331', 'kvalera200244@gmail.com', '202cb962ac59075b964b07152d234b70', 'global edition1', 'Carabobo', 'Rif', '285514411', 'direccion1', '10', 'descripcion1', '1651594566_c.jpg'),
(5, 'Empresa2', '04121594733', 'kelvinwebdev@gmail.com', '202cb962ac59075b964b07152d234b70', 'Empresa2', 'Anzoategui', 'Rif', '28551441', 'deededede', '50', 'desss', '1651615282_project3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `idioma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `id_usuario`, `idioma`) VALUES
(1, 2, 'Español'),
(3, 2, 'Ingles'),
(5, 2, 'Portugues');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas_empresa`
--

CREATE TABLE `idiomas_empresa` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `idioma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `idiomas_empresa`
--

INSERT INTO `idiomas_empresa` (`id`, `id_empresa`, `id_oferta`, `idioma`) VALUES
(34, 4, 46, 'Español'),
(36, 5, 48, 'Portugues'),
(37, 5, 49, 'Mandarin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `titulo_oferta` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(100) NOT NULL,
  `jornada_laboral` varchar(100) NOT NULL,
  `tipo_contrato` varchar(100) NOT NULL,
  `salario` varchar(100) NOT NULL,
  `anos_experiencia` varchar(100) NOT NULL,
  `edad_minima` varchar(100) NOT NULL,
  `estudios_minimos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `id_empresa`, `cargo`, `titulo_oferta`, `area`, `descripcion`, `estado`, `jornada_laboral`, `tipo_contrato`, `salario`, `anos_experiencia`, `edad_minima`, `estudios_minimos`) VALUES
(46, 4, 'Oferta 1', 'empresa 1      ', 'Informatica', 'Descripcion. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eos pariatur eveniet praesentium. Voluptatum adipisci eligendi iure, nisi quisquam autem doloremque blanditiis nam voluptate est voluptates, eum dolorum, fugiat veniam.', 'Carabobo', 'Por Horas', 'Contrato por tiempo indefinido', '1500', '1', '20', 'Tecnico superior'),
(48, 5, 'oferta 1', 'empresa 2', '', '', '', '', '', '', 'Sin experiencia', '', ''),
(49, 5, 'oferta 2', 'empresa 2', '', '', '', '', '', '', 'Sin experiencia', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passwords`
--

CREATE TABLE `passwords` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL,
  `codigo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `passwords`
--

INSERT INTO `passwords` (`id`, `email`, `token`, `codigo`) VALUES
(1, 'kvalera200244@gmail.com', '18e5d5e6bd', '2371'),
(2, 'kvalera200244@gmail.com', '38558fd504', '5423'),
(3, 'kvalera200244@gmail.com', '78e8818683', '6049'),
(4, 'kvalera200244@gmail.com', '4658896245', '4456'),
(5, 'kvalera200244@gmail.com', '2d503c8acb', '3097'),
(6, 'kvalera200244@gmail.com', '3723cffcee', '7320'),
(7, 'kvalera200244@gmail.com', '6ba5a4c608', '8422'),
(8, 'kvalera200244@gmail.com', '632de67063', '1355'),
(9, 'kvalera200244@gmail.com', '4601816f36', '2718'),
(10, 'kvalera200244@gmail.com', '7f19fecbc3', '5173'),
(11, 'kvalera200244@gmail.com', 'ef90db68fa', '5533');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passwords_empresa`
--

CREATE TABLE `passwords_empresa` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL,
  `codigo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `passwords_empresa`
--

INSERT INTO `passwords_empresa` (`id`, `email`, `token`, `codigo`) VALUES
(1, 'kvalera200244@gmail.com', 'f6bb014063', '3282'),
(2, 'kvalera200244@gmail.com', 'd1beeff25a', '1871'),
(3, 'kvalera200244@gmail.com', '479d88c276', '8937'),
(4, 'kvalera200244@gmail.com', '3cf5d62e3b', '7420'),
(5, 'kvalera200244@gmail.com', '02fbf9a244', '5721');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulados`
--

CREATE TABLE `postulados` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `postulados`
--

INSERT INTO `postulados` (`id`, `id_empresa`, `id_oferta`, `id_usuario`, `estatus`) VALUES
(1, 4, 46, 2, 'Visto'),
(2, 4, 46, 19, 'Postulado'),
(3, 5, 48, 2, 'Postulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `puesto_deseado` varchar(100) NOT NULL,
  `dia` varchar(100) NOT NULL,
  `mes` varchar(100) NOT NULL,
  `ano` varchar(100) NOT NULL,
  `tipo_id` varchar(100) NOT NULL,
  `numero_id` varchar(100) NOT NULL,
  `estado_civil` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `titulo_curriculum` varchar(100) NOT NULL,
  `descripcion_perfil` text NOT NULL,
  `nivel_estudios` varchar(100) NOT NULL,
  `centro_educativo` varchar(100) NOT NULL,
  `estado_estudio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `pass`, `puesto_deseado`, `dia`, `mes`, `ano`, `tipo_id`, `numero_id`, `estado_civil`, `telefono`, `foto`, `estado`, `genero`, `titulo_curriculum`, `descripcion_perfil`, `nivel_estudios`, `centro_educativo`, `estado_estudio`) VALUES
(2, 'Kelvin', 'Valera', 'kvalera200244@gmail.com', '202cb962ac59075b964b07152d234b70', 'Informática', '5', 'Enero', '2002', 'Cedula', '28551441', 'Soltero', '04121594733', '1651719207_perfil.jpeg', 'Falcon', 'Hombre', 'cv', 'Conocimientos intermedios-avanzados en Microsfot Office, en el area de excel en cuanto a inventarios con la aplicación de fórmulas, macros, visual basic y más... Conocimientos en el area de equipos celulares y computadoras a nivel de software. Buena presencia y lexico adecuado a la hora de dialogar.', 'Tecnico superior', 'Instituto de Tecnología Juan Pablo Pérez Alfonzo', 'Cursando'),
(19, 'alexander', 'Valera', 'kelvin@gmail.com', '202cb962ac59075b964b07152d234b70', 'informatica', '5', 'Enero', '2002', 'Cedula', '28551441', 'Soltero', '04121594733', '1651242447_pexelsphoto3851285.jpeg', 'Carabobo', 'Hombre', 'cv', 'desc', 'Universidad', 'iutepal', 'Completado'),
(20, '', 'Quintero', 'k@mai.com', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Dia', '', 'Año', '', '', '', '', 'img.png', '', '', '', '', '', '', ''),
(21, '', 'Quintero', 'k@mai.com', '202cb962ac59075b964b07152d234b70', 'informatica', '2', 'Marzo', '1931', 'Cedula', '28551441', 'Soltero', '04121594733', 'img.png', 'Carabobo', 'Hombre', 'cv', '1sds', 'Bachiller', 'iutepal', 'Completado'),
(22, 'Kelvin', 'Valera', 'valeraquintero@outlook.es', '202cb962ac59075b964b07152d234b70', 'Informática', '5', 'Enero', '2002', 'Cedula', '28551441', 'Soltero', '04121594733', '1651243163_75f9b799bcd960e5d000ecae9a3a61a6.jpg', 'Carabobo', 'Hombre', 'Informática', 'conocimientos intermedios-avanzados en microsoft office, en el area de excel en cuanto a inventario con la aplicacion de fórmulas, macros, visual basic y más... conocimientos en el área de equipos celulares y computadoras a nivel de software. buena presencia, responsable y léxico adecuado a la hora de dialogar con clientes.', 'Tecnico superior', 'IUTEPAL', 'Completado'),
(23, 'nuevoo', 'ejemploo', 'nuevo@mail.com', '202cb962ac59075b964b07152d234b70', 'Informática', '1', 'Febrero', '1932', 'Pasaporte', '28551441', 'Soltero', '041215947333', '1651716854_pexels-photo-3584758.jpeg', 'Portuguesa', 'Hombre', 'titulo curriculum', 'descripcion perfil', 'Universidad', 'Instituto de Tecnología Juan Pablo Pérez Alfonzo', 'Cursando');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conocimientos`
--
ALTER TABLE `conocimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `conocimientos_empresa`
--
ALTER TABLE `conocimientos_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `curriculums`
--
ALTER TABLE `curriculums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `idiomas_empresa`
--
ALTER TABLE `idiomas_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_oferta` (`id_oferta`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `passwords_empresa`
--
ALTER TABLE `passwords_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `postulados`
--
ALTER TABLE `postulados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_oferta` (`id_oferta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conocimientos`
--
ALTER TABLE `conocimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `conocimientos_empresa`
--
ALTER TABLE `conocimientos_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curriculums`
--
ALTER TABLE `curriculums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `idiomas_empresa`
--
ALTER TABLE `idiomas_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `passwords_empresa`
--
ALTER TABLE `passwords_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `postulados`
--
ALTER TABLE `postulados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conocimientos`
--
ALTER TABLE `conocimientos`
  ADD CONSTRAINT `conocimientos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conocimientos_empresa`
--
ALTER TABLE `conocimientos_empresa`
  ADD CONSTRAINT `conocimientos_empresa_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `ofertas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curriculums`
--
ALTER TABLE `curriculums`
  ADD CONSTRAINT `curriculums_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD CONSTRAINT `idiomas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `idiomas_empresa`
--
ALTER TABLE `idiomas_empresa`
  ADD CONSTRAINT `idiomas_empresa_ibfk_1` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `postulados`
--
ALTER TABLE `postulados`
  ADD CONSTRAINT `postulados_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postulados_ibfk_2` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postulados_ibfk_3` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
