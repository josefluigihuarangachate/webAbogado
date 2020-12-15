-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2020 a las 15:02:16
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbabogado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(25) NOT NULL,
  `idusuario` int(25) NOT NULL,
  `idcliente` int(25) NOT NULL,
  `estrellas` enum('1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(25) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `modificado_por` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `foto`, `codigo`, `nombre`, `descripcion`, `estado`, `modificado_por`) VALUES
(1, 'assets/images/photos/AM20201107013432_Gianluigi_Buffon_(2014).jpg', 'AER890', 'Cortes', 'CORTES DE TODO LOS ESTILOS', 'inactivo', NULL),
(2, NULL, '5TR5UU', 'Peinados', 'PEINADOS EN TODO LOS ESTILOS', 'activo', NULL),
(4, NULL, 'MD7899', 'Peinado Frances', 'PEINADOS EN TODO LOS ESTILOS', 'activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(25) NOT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `idcategoria` int(25) NOT NULL,
  `modificado_por` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `codigo`, `nombre`, `descripcion`, `estado`, `idcategoria`, `modificado_por`) VALUES
(4, 'YUS086', 'CORTE CLASICO', 'CORTES CLASICOS COMO CORTE ESCOLAR', 'inactivo', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `modificado_por` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`, `estado`, `modificado_por`) VALUES
(1, 'Aministrador', 'activo', NULL),
(2, 'Abogado', 'activo', NULL),
(3, 'Cliente', 'activo', NULL),
(4, 'Responsable', 'inactivo', 1),
(5, 'Encargado', 'activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(25) NOT NULL,
  `foto` varchar(500) DEFAULT NULL COMMENT 'Guardar la ruta de la imagen completa con toda y carpeta\r\n\r\nEjemplo :\r\nassets/images/photos/gerente.png\r\n\r\nSi esta vacio el campo foto se pondra :\r\nassets/images/photos/empty/empty-avatar.png',
  `nombre` varchar(255) NOT NULL,
  `dni` varchar(12) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `idtipo` int(25) NOT NULL DEFAULT 3 COMMENT 'POR DEFECTO ESTA EN EL 3 YA QUE ESE TIPO DE USUARIO ES CLIENTE',
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `latitud` varchar(20) DEFAULT NULL,
  `longitud` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `foto`, `nombre`, `dni`, `correo`, `celular`, `direccion`, `usuario`, `clave`, `idtipo`, `estado`, `latitud`, `longitud`) VALUES
(1, 'assets/images/photos/AM20201107013432_Gianluigi_Buffon_(2014).jpg', 'Luigi Huaranga', '7896431', 'luigihuaranga@gmail.com', '987654321', 'San Miguel', 'admin', '$2y$11$jJDsMGYNuFClkrmQeOkahO6NYxQxJiwjJbNhWbMsoXjBRHwcOEWBK', 1, 'activo', '-11.23305121', '-77.36426133'),
(2, NULL, 'Luigi Huuaranga Chate', NULL, 'josefluigihuarangachate@gmail.com', NULL, NULL, 'luigi', '$2y$11$PHQVclhPsj6VLxFzteTniOa1774UbuHI3.WFvycRcNG/uL7YCcGdy', 3, 'activo', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idcategoria` (`idcategoria`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `FK_idtipouser` (`idtipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `FK_idcategoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_idtipouser` FOREIGN KEY (`idtipo`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
