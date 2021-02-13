-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2021 a las 20:09:16
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

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
  `codigo` varchar(255) NOT NULL COMMENT 'Es la convinacion del id del abogado con el id del cliente',
  `idusuario` int(25) NOT NULL,
  `idcliente` int(25) NOT NULL,
  `mensaje` text DEFAULT NULL,
  `estrellas` enum('1','2','3','4','5') DEFAULT NULL,
  `fechahora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id`, `codigo`, `idusuario`, `idcliente`, `mensaje`, `estrellas`, `fechahora`) VALUES
(32, '326', 3, 26, 'Buenos días, sus serviccios para este abogado son muy bueno, lo recomendaria a otras personas que desean saber acerca de su trato y su profesionalismo.', '3', '2021-01-16 16:37:35'),
(33, '2326', 23, 26, 'Buenos días, sus serviccios para este abogado son muy bueno, lo recomendaria a otras personas que desean saber acerca de su trato y su profesionalismo.', '3', '2021-01-16 16:38:00');

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
(2, 'Category28012021201411dinero.jpeg', '5TR5UU', 'Asesoria Tributaria', 'Acerca de Asesoria Tributaria', 'activo', 1),
(12, 'Category28012021201709asesoria.jpeg', 'ACTIVO', 'Asesoria', 'ayuda Asesoria', 'activo', 1),
(13, 'Category28012021201537foco.jpeg', 'RETYU', 'Propiedad Intelectual', 'sistema civil - Propiedad Intelectual', 'activo', 1);

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
(7, 26, 23, 'te envio el archivo', NULL, '2021-01-02 16:10:07', 'No Leido'),
(22, 26, 23, 'Hola doctor', NULL, '2021-01-02 18:10:00', 'No Leido'),
(23, 26, 23, '', 'file26PM20210102191622images (5).jpg', '2021-01-02 19:16:22', 'No Leido'),
(24, 26, 23, 'Hola doctor', NULL, '2021-01-06 04:55:05', 'No Leido'),
(25, 26, 23, 'hola doctora', NULL, '2021-01-06 05:17:20', 'No Leido'),
(26, 26, 23, 'que paso', NULL, '2021-01-06 05:21:16', 'No Leido'),
(27, 26, 23, 'f', NULL, '2021-01-06 05:39:21', 'No Leido'),
(28, 26, 23, 'hola', NULL, '2021-01-06 05:48:52', 'No Leido'),
(29, 26, 23, 'h', NULL, '2021-01-06 05:50:04', 'No Leido'),
(30, 26, 23, 'hola', NULL, '2021-01-06 06:01:37', 'No Leido'),
(31, 26, 23, 'hola', NULL, '2021-01-08 17:31:49', 'No Leido'),
(32, 26, 23, 'que tal', NULL, '2021-01-08 17:32:02', 'No Leido'),
(33, 26, 23, 'como le va', NULL, '2021-01-08 17:32:53', 'No Leido'),
(34, 26, 3, 'hola doctor', NULL, '2021-01-16 00:54:18', 'No Leido'),
(35, 3, 26, 'hola', NULL, '2021-01-16 01:22:49', 'Visto'),
(36, 23, 26, 'hola que tal', NULL, '2021-01-18 18:15:16', 'Visto'),
(37, 23, 26, 'como le va', NULL, '2021-01-18 18:15:28', 'Visto'),
(38, 23, 26, 'que tal', NULL, '2021-01-18 19:05:22', 'Visto'),
(39, 23, 26, 'que tal', NULL, '2021-01-18 19:13:46', 'Visto'),
(40, 23, 26, 'da', NULL, '2021-01-18 19:17:07', 'Visto'),
(41, 23, 26, 'hol', NULL, '2021-01-18 19:49:20', 'Visto'),
(42, 23, 26, 'tu que tal', NULL, '2021-01-18 19:49:33', 'Visto'),
(43, 23, 26, 'como esta', NULL, '2021-01-18 20:18:35', 'Visto'),
(44, 23, 26, 'abogado buenos dias', NULL, '2021-01-18 20:18:47', 'Visto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_reclamo`
--

CREATE TABLE `libro_reclamo` (
  `id` int(25) NOT NULL,
  `idusuario` int(25) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `archivo` varchar(500) DEFAULT NULL,
  `fechahora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro_reclamo`
--

INSERT INTO `libro_reclamo` (`id`, `idusuario`, `correo`, `celular`, `asunto`, `mensaje`, `archivo`, `fechahora`) VALUES
(17, 26, 'luismiguel@gmil.com', '7542342342432', 'Asunto 1', 'sadasdasdas', NULL, '2021-01-04 22:10:49'),
(19, 26, 'luismiguel@gmil.com', '7542342342432', 'Queja acerca del servicio de uno de sus abogados', 'Buenas tardes señores de onlw, quería quejarme acerca del pésimo servicio que recibí al contratar a uno de sus abogados.', NULL, '2021-01-05 00:11:25');

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
(1, 26, 'ERTYU', 'aviso de cobro', 'debe pagar su cuenta', '2021-01-02 15:19:13', 'Visto', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(2, 26, 'UIWR', 'aviso de cobro', 'debe pagar su cuenta', '2021-01-02 15:19:13', 'Visto', 'Importante', 'alert alert-danger', 'mdi-message-alert', 'danger'),
(142, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-16 01:12:08', 'Visto', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(143, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-16 01:24:51', 'Visto', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(144, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-18 20:19:34', 'Visto', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(145, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:50:03', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(146, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:51:15', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(147, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:51:27', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(148, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:52:45', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(149, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:53:10', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(150, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:53:20', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(151, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:53:47', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(152, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:55:09', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(153, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:55:37', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(154, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:56:26', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(155, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:56:46', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(156, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:57:56', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(157, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:58:24', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary'),
(158, 26, NULL, 'aviso de calificacion', 'Su tiempo de chat ha terminado. No olvide que debe calificar a los abogados, Gracias. <br><br><a href=\"http://192.168.0.105:8000/appcalificarGeneral\" class=\"btn btn-info\"><i class=\"lni lni-medall-alt\"></i>&nbsp;Calificar Ahora</a>', '2021-01-28 17:58:42', 'Sin Leer', 'Aviso', 'alert alert-primary', 'mdi-message-alert', 'primary');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id` int(25) NOT NULL,
  `carpeta` varchar(255) NOT NULL,
  `ruta` varchar(255) NOT NULL COMMENT '/blogView/Carpeta Nueva/index/\r\n\r\nAl final se enviara un valor\r\npor ejempplo :\r\n\r\n/blogView/Carpeta Nueva/index/yes\r\n\r\nEsto sirvira para los que puedan ver los archivos adjuntos ',
  `all_files` text DEFAULT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'Plan 3 Mensual', '- Chat de 3 horas\r\n- Leer Documentos\r\n- Plan mensual', '56.00', 'Mensual', '03:00:00', 'activo', '10800', 1);

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
(6, 'Icono28012021201956dinero.jpeg', 'Service20122020053836Imagen1.png', 2, 3, 'Asesoria Tributaria', 'Asesoria Tributaria', '0.00', 'activo', 1),
(7, 'Icono28012021202223maleta.jpeg', NULL, 2, 23, 'Asesoria Laboral', 'Asesoria Laboral', '0.00', 'activo', 1),
(8, 'Icono28012021202342grupo.jpeg', NULL, 2, 23, 'Asesoria Societaria', 'Asesoria Societaria', '0.00', 'activo', 1),
(9, 'Icono28012021202515cuaderno.jpeg', NULL, 2, 23, 'Licencias De Funcionamiento', 'Licencias de Funcionamiento', '0.00', 'activo', 1),
(10, 'Icono28012021202044foco.jpeg', NULL, 13, 3, 'Propiedad Intelectual', 'Propiedad Intelectual', '0.00', 'activo', 1);

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
  `segundos` varchar(500) NOT NULL DEFAULT '0',
  `fechahora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id`, `idusuario`, `idplan`, `nombreplan`, `descripcionplan`, `hora`, `precio`, `total`, `ini_fechahora`, `fin_fechahora`, `restan_horas`, `segundos`, `fechahora`) VALUES
(1, 26, 2, 'Plan Mensual', 'dasdasdasddsadsadasdas\r\nasdasdasdasdas\r\ndasd\r\nasdasdasdasda', '36:35:45', '34.00', '34.00', '2020-12-01 21:51:27', '2020-12-31 21:51:27', '00:00:00', '0', '2021-01-05 23:15:29');

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
  `tipo_documento` enum('RUC','Cedula') DEFAULT NULL,
  `ruc_cedula` varchar(15) DEFAULT NULL,
  `noveno_numero` varchar(10) DEFAULT NULL COMMENT 'Aqui se guarda el dia y el mes, el cual se le hara recordar su fecha de pago.\r\n\r\nEjm : 27/03',
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

INSERT INTO `usuario` (`id`, `foto`, `tipo_documento`, `ruc_cedula`, `noveno_numero`, `nombre`, `dni`, `correo`, `celular`, `direccion`, `usuario`, `clave`, `idtipo`, `estado`, `latitud`, `longitud`, `modificado_por`, `idonesignal`) VALUES
(1, 'Profile25122020020414background_admin.jpg', NULL, NULL, NULL, 'Lisette Gonzales', '7896431', 'lisettegonzales@gmail.com', '987654320', 'San Miguel crd 10', 'admin', '$2y$11$jJDsMGYNuFClkrmQeOkahO6NYxQxJiwjJbNhWbMsoXjBRHwcOEWBK', 1, 'activo', '-32.84964672', '-55.2205562', 1, NULL),
(3, 'Profile23122020164046abogado.jpg', NULL, NULL, NULL, 'Luigi Huaranga', '7896431', 'luigihuaranga@gmail.com', '987654321', 'San Miguel - Plaza Vea', 'admin25', '$2y$11$jJDsMGYNuFClkrmQeOkahO6NYxQxJiwjJbNhWbMsoXjBRHwcOEWBK', 2, 'activo', '-32.84964672', '-55.2205562', 1, NULL),
(23, 'Profile28012021192933ab7-m-prado1_1.jpg', 'RUC', '', '/03', 'Mario Prado', '09956555', 'anamariapolo@gmail.com', '987654321', 'av san juan de lurigancho', 'abogado', '$2y$11$7n0/3jPhf.hGT11cNobFpu4oXcaLtOpyckKGRphRDli9WuOOBOii6', 2, 'activo', '-9.73950979', '-52.95631814', 23, '1e084165-1068-4818-9d72-cd265bbec38e'),
(26, 'Profile180120212049021-intro-photo-final.jpg', 'Cedula', '1234567890123', '26/04', 'Luis Miguel Huaman Quispe', '6363453535', 'luismiguel@gmil.com', '7542342342432', 'ghdhfgfdgdfgfd', 'cliente', '$2y$11$hhaHAqP4zpxMYP7LDFWige5SQWIEmbw22PGIV9WkYcicF1fZ4610q', 3, 'activo', '-20.81523006', '-67.70102495', 26, '1e084165-1068-4818-9d72-cd265bbec38e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
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
-- Indices de la tabla `libro_reclamo`
--
ALTER TABLE `libro_reclamo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idusuario` (`idusuario`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carpeta` (`carpeta`);

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
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `libro_reclamo`
--
ALTER TABLE `libro_reclamo`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
