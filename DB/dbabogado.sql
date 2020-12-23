-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2020 a las 18:10:01
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
(2, 'AA19122020235924penal.jpg', '5TR5UU', 'Penal', 'Acerca de carcel  - En todos los casos', 'activo', 23),
(12, 'AA19122020235914juridico.jpg', 'ACTIVO', 'Juridica', 'ayuda juridica - En todos los casos', 'activo', 23),
(13, 'AA20122020051615civil2.jpg', 'RETYU', 'Civil', 'sistema civil - En todos los casos', 'activo', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `id` int(25) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` varchar(255) NOT NULL,
  `plan` enum('Mensual','Anual') NOT NULL,
  `horas` varchar(80) NOT NULL DEFAULT '03:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(25) NOT NULL,
  `icono` varchar(500) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL COMMENT 'SIRVE PARA SUBIR LA IMAGEN DE DIAGRAMA',
  `idcategoria` int(25) NOT NULL,
  `idusuario` int(25) NOT NULL COMMENT 'ID DEL ABOGADO',
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` varchar(255) NOT NULL DEFAULT '00.00',
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `modificado_por` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `icono`, `foto`, `idcategoria`, `idusuario`, `nombre`, `descripcion`, `precio`, `estado`, `modificado_por`) VALUES
(6, 'Icono21122020224128descarga.png', 'Service20122020053836Imagen1.png', 2, 3, 'Carcel', 'EEFSDFS F', '58.00', 'activo', 24),
(7, 'Icono22122020025918descarga.jpg', NULL, 2, 23, 'Publico', 'gsfdfsdf ds fsd f dsf sd fds f dsf dfs', '78.00', 'activo', 1),
(8, NULL, NULL, 12, 23, 'Juridico Judicial', 'dasdasd sad asdasd asd sa dasdasd ad sa as dasd asdas dasd ads', '67.00', 'activo', 23),
(9, NULL, NULL, 13, 23, 'Civil de Casas', 'Civil de Casas', '80.00', 'activo', 1),
(10, 'Icono22122020025918descarga.jpg', NULL, 2, 3, 'Publico', 'gsfdfsdf ds fsd f dsf sd fds f dsf dfs', '', 'activo', 1);

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
(4, 'YUS086', 'Sub Penal 1.0', 'Penal 1.0 consiste en ayuda penal', 'activo', 2, 23),
(7, 'YUS0867', 'Sub Juridica 1.1', 'Juridica 1.1 consiste en ayuda juridica', 'activo', 12, 23),
(10, 'TEWEW', 'Sub Civil 1.2', 'Civil 1.2 consiste en ayuda civil', 'activo', 13, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id` int(25) NOT NULL,
  `idusuario` int(25) NOT NULL,
  `idplan` int(25) NOT NULL,
  `precio` varchar(300) NOT NULL,
  `total` varchar(300) NOT NULL,
  `restan_horas` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `dni` varchar(15) DEFAULT NULL,
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
(1, 'AA161220201640452016.1)[1].jpg', 'Lisette Gonzales', '7896431', 'lisettegonzales@gmail.com', '987654321', 'San Miguel', 'admin', '$2y$11$jJDsMGYNuFClkrmQeOkahO6NYxQxJiwjJbNhWbMsoXjBRHwcOEWBK', 1, 'activo', NULL, NULL, 1),
(3, 'Profile23122020164046abogado.jpg', 'Luigi Huaranga', '7896431', 'luigihuaranga@gmail.com', '987654321', 'San Miguel - Plaza Vea', 'admin25', '$2y$11$jJDsMGYNuFClkrmQeOkahO6NYxQxJiwjJbNhWbMsoXjBRHwcOEWBK', 2, 'activo', '-32.84964672', '-55.2205562', 1),
(23, NULL, 'Ana Maria Polo', '09956555', 'anamariapolo@gmail.com', '987654321', 'av san juan de lurigancho', 'abogado', '$2y$11$7n0/3jPhf.hGT11cNobFpu4oXcaLtOpyckKGRphRDli9WuOOBOii6', 2, 'activo', '-12.04335513', '-77.04049551', 1),
(24, NULL, 'Juan Cliente Huaman Rojas', '987655', 'juancliente@gmail.com', '987654321', 'san marcos mz b lote 100', 'cliente', '$2y$11$wUIXpJURmBy7kDBTcBCj0uvVMFEU.Q7OVgLSKuIW9fssL9A.Gpyqq', 3, 'activo', '1.836919152', '-59.79019192', 24);

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
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idbarbero` (`idusuario`),
  ADD KEY `FK_idsubcategoria` (`idcategoria`) USING BTREE;

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idcategoria` (`idcategoria`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `FK_idabogado` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`),
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
