-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2020 a las 04:23:36
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
(2, NULL, '5TR5UU', 'Penal', 'Acerca de carcel', 'activo', 1),
(12, NULL, 'activo', 'Juridica', 'ayuda juridica', 'activo', 1);

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
  `idcategoria` int(25) DEFAULT NULL,
  `modificado_por` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `codigo`, `nombre`, `descripcion`, `estado`, `idcategoria`, `modificado_por`) VALUES
(4, 'YUS086', 'Sub Penal', 'Sub penal consiste en ayuda en penales', 'activo', 12, 1),
(7, 'YUS0867', 'Sub Penal7', 'Sub penal7', 'activo', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(25) NOT NULL,
  `nombre` varchar(500) NOT NULL,
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
  `longitud` varchar(20) DEFAULT NULL,
  `modificado_por` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `foto`, `nombre`, `dni`, `correo`, `celular`, `direccion`, `usuario`, `clave`, `idtipo`, `estado`, `latitud`, `longitud`, `modificado_por`) VALUES
(1, 'AA161220201640452016.1)[1].jpg', 'Luigi Huaranga', '7896431', 'luigihuaranga@gmail.com', '987654321', 'San Miguel', 'admin', '$2y$11$jJDsMGYNuFClkrmQeOkahO6NYxQxJiwjJbNhWbMsoXjBRHwcOEWBK', 1, 'activo', NULL, NULL, 1),
(2, NULL, 'Luigi Huuaranga Chate', '98777777', 'luigi@gmail.com', '7567543455345', 'San Miguel - Plaza Vea', 'luigi', '$2y$11$PHQVclhPsj6VLxFzteTniOa1774UbuHI3.WFvycRcNG/uL7YCcGdy', 2, 'activo', '-30.72591643', '28.406114515', 1),
(3, NULL, 'Luigi Huaranga', '7896431', 'luigihuaranga@gmail.com', '987654321', 'San Miguel - Plaza Vea', 'admin25', '$2y$11$jJDsMGYNuFClkrmQeOkahO6NYxQxJiwjJbNhWbMsoXjBRHwcOEWBK', 2, 'activo', '-32.84964672', '-55.2205562', 1),
(20, NULL, 'Armando', '75465433', 'armando@gmail.com', '987654321', 'av lima', 'armando', '$2y$11$isEVa2B/peB4SYlJ.6ZgO.c/N/HqfFUjmEruhG1tO82ndKw61lZwm', 5, 'activo', '-2.117193031', '-65.0643062', 1);

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
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
