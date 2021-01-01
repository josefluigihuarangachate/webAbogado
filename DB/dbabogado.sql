-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-01-2021 a las 02:24:54
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
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(25) NOT NULL,
  `idemisor` int(25) NOT NULL,
  `idreceptor` int(25) NOT NULL,
  `mensaje` text DEFAULT NULL,
  `archivo` varchar(500) DEFAULT NULL,
  `fechahora` datetime NOT NULL DEFAULT current_timestamp(),
  `leido` enum('Visto','No Leido') NOT NULL DEFAULT 'No Leido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `idemisor`, `idreceptor`, `mensaje`, `archivo`, `fechahora`, `leido`) VALUES
(1, 26, 23, 'doctor buenas tardes', NULL, '2020-12-26 20:06:59', 'No Leido'),
(2, 23, 26, 'buenos dias, en que le podemos ayudar. gracias', NULL, '2020-12-26 20:06:59', 'Visto'),
(3, 26, 23, 'hola', NULL, '2020-12-26 21:09:59', 'No Leido'),
(4, 26, 23, 'doctor buenas tardes', NULL, '2020-12-26 20:06:59', 'No Leido'),
(5, 23, 26, 'buenos dias, en que le podemos ayudar. gracias', NULL, '2020-12-26 20:06:59', 'Visto'),
(6, 26, 23, 'hola', NULL, '2020-12-26 21:09:59', 'No Leido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `id` int(25) NOT NULL,
  `idusuario` int(25) NOT NULL,
  `codigo` varchar(500) DEFAULT NULL,
  `asunto` varchar(500) NOT NULL,
  `mensaje` text NOT NULL,
  `fechahora` datetime NOT NULL DEFAULT current_timestamp(),
  `leido` enum('Visto','Sin Leer') DEFAULT 'Sin Leer',
  `tipo` enum('Alerta','Aviso','Importante','Urgente') NOT NULL DEFAULT 'Aviso',
  `class` varchar(20) NOT NULL DEFAULT 'alert alert-primary',
  `icon` varchar(300) DEFAULT 'mdi-message-alert',
  `color` varchar(200) NOT NULL DEFAULT 'primary'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id`, `idusuario`, `codigo`, `asunto`, `mensaje`, `fechahora`, `leido`, `tipo`, `class`, `icon`, `color`) VALUES
(125, 1, 'TY', 'Prueba', 'dsaddsadasdasdsadas', '2020-12-31 19:49:42', 'Sin Leer', 'Importante', 'alert alert-warning', 'mdi-alert-circle', 'warning'),
(126, 26, 'TY', 'Prueba', 'dsaddsadasdasdsadas', '2020-12-31 19:49:42', 'Sin Leer', 'Importante', 'alert alert-warning', 'mdi-alert-circle', 'warning');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `id` int(25) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` varchar(255) NOT NULL,
  `plan` enum('Gratis','Mensual','Anual') NOT NULL DEFAULT 'Gratis',
  `horas` varchar(80) NOT NULL DEFAULT '03:00:00',
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `segundos` varchar(500) DEFAULT '10800' COMMENT '10800 = 3 horas\r\nesta por defecto 3 horas',
  `modificado_por` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id`, `nombre`, `descripcion`, `precio`, `plan`, `horas`, `estado`, `segundos`, `modificado_por`) VALUES
(1, 'Plan Gratis', 'Plan Gratis', '00.00', 'Gratis', '03:00:00', 'activo', '10800', NULL),
(2, 'Plan Mensual', '- Chat de 3 horas\r\n- Leer Documentos\r\n- Plan mensual', '56.00', 'Mensual', '03:00:00', 'activo', '10800', 1),
(3, 'Plan Anual', '- Chat de 3 horas\r\n- Leer Documentos\r\n- Plan anual', '230.00', 'Anual', '03:00:00', 'activo', '10800', 1);

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
  `nombreplan` varchar(255) NOT NULL,
  `descripcionplan` text NOT NULL,
  `hora` varchar(25) NOT NULL,
  `precio` varchar(300) NOT NULL,
  `total` varchar(300) NOT NULL,
  `ini_fechahora` datetime NOT NULL,
  `fin_fechahora` datetime NOT NULL,
  `restan_horas` varchar(80) NOT NULL COMMENT 'AQUI IRAN LAS HORAS QUE HA CONSUMIDO SEGUN SU PLAN',
  `segundos` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id`, `idusuario`, `idplan`, `nombreplan`, `descripcionplan`, `hora`, `precio`, `total`, `ini_fechahora`, `fin_fechahora`, `restan_horas`, `segundos`) VALUES
(1, 26, 2, 'Plan Mensual', 'dasdasdasddsadsadasdas\r\nasdasdasdasdas\r\ndasd\r\nasdasdasdasda', '00:00:00', '34.00', '34.00', '2020-12-01 21:51:27', '2020-12-31 21:51:27', '00:01:00', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion_historial`
--

CREATE TABLE `suscripcion_historial` (
  `id` int(25) NOT NULL,
  `idusuario` int(25) NOT NULL,
  `idplan` int(25) NOT NULL,
  `nombreplan` varchar(255) NOT NULL,
  `descripcionplan` text NOT NULL,
  `hora` varchar(25) NOT NULL,
  `precio` varchar(300) NOT NULL,
  `total` varchar(300) NOT NULL,
  `ini_fechahora` datetime NOT NULL,
  `fin_fechahora` datetime NOT NULL,
  `restan_horas` varchar(80) NOT NULL COMMENT 'AQUI IRAN LAS HORAS QUE HA CONSUMIDO SEGUN SU PLAN'
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
(4, 'Sub Administrador', 'inactivo', NULL),
(5, 'Encargado', 'activo', NULL);

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
  `modificado_por` int(25) DEFAULT NULL,
  `idonesignal` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `foto`, `nombre`, `dni`, `correo`, `celular`, `direccion`, `usuario`, `clave`, `idtipo`, `estado`, `latitud`, `longitud`, `modificado_por`, `idonesignal`) VALUES
(1, 'Profile25122020020414background_admin.jpg', 'Lisette Gonzales', '7896431', 'lisettegonzales@gmail.com', '987654320', 'San Miguel crd 10', 'admin', '$2y$11$jJDsMGYNuFClkrmQeOkahO6NYxQxJiwjJbNhWbMsoXjBRHwcOEWBK', 1, 'activo', '-32.84964672', '-55.2205562', 1, NULL),
(3, 'Profile23122020164046abogado.jpg', 'Luigi Huaranga', '7896431', 'luigihuaranga@gmail.com', '987654321', 'San Miguel - Plaza Vea', 'admin25', '$2y$11$jJDsMGYNuFClkrmQeOkahO6NYxQxJiwjJbNhWbMsoXjBRHwcOEWBK', 2, 'activo', '-32.84964672', '-55.2205562', 1, NULL),
(23, NULL, 'Ana Maria Polo', '09956555', 'anamariapolo@gmail.com', '987654321', 'av san juan de lurigancho', 'abogado', '$2y$11$7n0/3jPhf.hGT11cNobFpu4oXcaLtOpyckKGRphRDli9WuOOBOii6', 2, 'activo', '-12.04335513', '-77.04049551', 1, NULL),
(26, NULL, 'Luis Miguel Huaman Quispe', NULL, 'luismiguel@gmil.com', NULL, NULL, 'cliente', '$2y$11$hhaHAqP4zpxMYP7LDFWige5SQWIEmbw22PGIV9WkYcicF1fZ4610q', 3, 'activo', NULL, NULL, NULL, '1e084165-1068-4818-9d72-cd265bbec38e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idusuariocalificacion` (`idusuario`),
  ADD KEY `FK_idclientecalificacion` (`idcliente`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idemisor` (`idemisor`),
  ADD KEY `FK_idreceptor` (`idreceptor`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idusuario` (`idusuario`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idusuario` (`idusuario`),
  ADD KEY `FK_idplan` (`idplan`);

--
-- Indices de la tabla `suscripcion_historial`
--
ALTER TABLE `suscripcion_historial`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idusuario` (`idusuario`),
  ADD KEY `FK_idusuariosuscripcionhistorial` (`idusuario`),
  ADD KEY `FK_idplanhistorial` (`idplan`);

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
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `suscripcion_historial`
--
ALTER TABLE `suscripcion_historial`
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
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `FK_idclientecalificacion` FOREIGN KEY (`idcliente`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_idusuariocalificacion` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `FK_idemisor` FOREIGN KEY (`idemisor`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_idreceptor` FOREIGN KEY (`idreceptor`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `FK_idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `FK_idabogado` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_idcategoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD CONSTRAINT `FK_idplan` FOREIGN KEY (`idplan`) REFERENCES `plan` (`id`),
  ADD CONSTRAINT `FK_idusuariosuscripcion` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `suscripcion_historial`
--
ALTER TABLE `suscripcion_historial`
  ADD CONSTRAINT `FK_idplanhistorial` FOREIGN KEY (`idplan`) REFERENCES `plan` (`id`),
  ADD CONSTRAINT `FK_idusuariosuscripcionhistorial` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_idtipouser` FOREIGN KEY (`idtipo`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
