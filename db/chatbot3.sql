-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2025 a las 15:17:28
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatbot_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(6, 'Sistemas Operativos'),
(7, 'Conectividad'),
(8, 'Hardware'),
(9, 'Software'),
(10, 'Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversaciones`
--

CREATE TABLE `conversaciones` (
  `id` int(11) NOT NULL,
  `pregunta_usuario` varchar(500) NOT NULL,
  `respuesta_bot` varchar(500) DEFAULT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conversaciones`
--

INSERT INTO `conversaciones` (`id`, `pregunta_usuario`, `respuesta_bot`, `fecha_hora`) VALUES
(5, 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', NULL, '2025-08-05 18:44:17'),
(6, 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', NULL, '2025-08-05 18:45:19'),
(7, 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', NULL, '2025-08-05 18:48:35'),
(8, 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', NULL, '2025-08-05 18:54:49'),
(9, '¿Qué es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-08-05 19:06:02'),
(10, '¿Qué es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-08-05 19:06:47'),
(11, 'hola', 'Lo siento, no tengo una respuesta para eso.????', '2025-08-12 17:49:38'),
(12, '¿Qué es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-08-12 17:50:30'),
(13, '¿Qué es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-08-12 18:13:52'),
(14, 'hola', 'Lo siento, no tengo una respuesta para eso.????', '2025-08-12 18:40:30'),
(15, '¿Qué es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-08-12 18:40:58'),
(16, 'hola buenas', 'Lo siento, no tengo una respuesta para eso.????', '2025-08-31 14:44:01'),
(17, '¿Qué es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-08-31 14:45:47'),
(18, 'te sgusta ee', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-02 17:54:12'),
(19, '¿Que es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-02 17:55:13'),
(20, '¿que es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-02 18:08:09'),
(21, 'que es un sistema operativo', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:05:45'),
(22, 'Hola', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:08:37'),
(23, 'cahu', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:08:50'),
(24, 'sfsa', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:08:53'),
(25, 'que hace el franco', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:08:58'),
(26, 'que es una pc', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:09:02'),
(27, 'que es un programa', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:09:09'),
(28, 'que haces este chatbot', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:09:17'),
(29, 'que es un sistema operativo', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:10:53'),
(30, 'hoal', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:11:56'),
(31, 'que es un sistema operativo', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:12:04'),
(32, 'hola', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:14:29'),
(33, 'que es un sistema operativo', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:18:38'),
(34, 'l', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-03 21:18:41'),
(35, 'l', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-03 21:18:58'),
(36, 'm', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:02'),
(37, 'q', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:05'),
(38, 'q', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:07'),
(39, 'añsldjasd', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:13'),
(40, 'r', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:14'),
(41, 'asdasdas', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:14'),
(42, 'da', 'Filtra y controla el tráfico de red para permitir o bloquear conexiones según reglas de seguridad.', '2025-09-03 21:19:14'),
(43, 'd', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-03 21:19:14'),
(44, 'a', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:14'),
(45, 'a', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:14'),
(46, 'a', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:15'),
(47, 'as', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-03 21:19:15'),
(48, 'e', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:15'),
(49, 'w', 'LAN (red local) cubre un área pequeña; WAN (red amplia) interconecta LANs a gran escala geográfica.', '2025-09-03 21:19:15'),
(50, 'q', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:15'),
(51, 'e', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:15'),
(52, 'qw', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:16'),
(53, 'e', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:16'),
(54, 'qw', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:16'),
(55, 'r', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:16'),
(56, 'tr', 'LAN (red local) cubre un área pequeña; WAN (red amplia) interconecta LANs a gran escala geográfica.', '2025-09-03 21:19:16'),
(57, 't', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:16'),
(58, 't', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:16'),
(59, 'y', 'LAN (red local) cubre un área pequeña; WAN (red amplia) interconecta LANs a gran escala geográfica.', '2025-09-03 21:19:16'),
(60, 'tr', 'LAN (red local) cubre un área pequeña; WAN (red amplia) interconecta LANs a gran escala geográfica.', '2025-09-03 21:19:17'),
(61, 'u', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:17'),
(62, 'tyu', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:17'),
(63, 'uy', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:17'),
(64, 'i', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:17'),
(65, 'yu', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:17'),
(66, 'mh', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:17'),
(67, 'j', 'Renderiza gráficos transformando datos en imágenes mostradas en pantalla.', '2025-09-03 21:19:18'),
(68, 'bn', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:18'),
(69, 'v', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:18'),
(70, 'b', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-03 21:19:18'),
(71, 'cv', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:18'),
(72, 'z', 'SMTP (Simple Mail Transfer Protocol).', '2025-09-03 21:19:19'),
(73, 'x', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:19'),
(74, 'z', 'SMTP (Simple Mail Transfer Protocol).', '2025-09-03 21:19:19'),
(75, 'x', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:19'),
(76, 'z', 'SMTP (Simple Mail Transfer Protocol).', '2025-09-03 21:19:19'),
(77, 'cv', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:19'),
(78, 'j', 'Renderiza gráficos transformando datos en imágenes mostradas en pantalla.', '2025-09-03 21:19:19'),
(79, 'k', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-03 21:19:19'),
(80, 'j', 'Renderiza gráficos transformando datos en imágenes mostradas en pantalla.', '2025-09-03 21:19:20'),
(81, 'k', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-03 21:19:20'),
(82, 'th', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:19:20'),
(83, 'h', 'Permite organizar, almacenar, buscar y acceder a archivos en el dispositivo de almacenamiento.', '2025-09-03 21:19:20'),
(84, 'd', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-03 21:19:20'),
(85, 's', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:20'),
(86, 'as', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-03 21:19:20'),
(87, 'd', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-03 21:19:20'),
(88, 's', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:21'),
(89, 'a', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:33'),
(90, 'd', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-03 21:19:35'),
(91, 'a', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:49'),
(92, 'o', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:19:56'),
(93, 't', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:20:00'),
(94, 'p', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:20:02'),
(95, 'c', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-03 21:20:17'),
(96, 'x', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-03 21:20:22'),
(97, 'o', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:20:24'),
(98, 't', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-03 21:20:27'),
(99, 'y', 'LAN (red local) cubre un área pequeña; WAN (red amplia) interconecta LANs a gran escala geográfica.', '2025-09-03 21:20:29'),
(100, '¿Qué es una dirección IP?', 'Es un identificador numérico único que se asigna a cada dispositivo conectado a una red IP.', '2025-09-08 12:57:16'),
(101, '¿Qué es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-08 13:01:38'),
(102, '¿Qué es una dirección IP?', 'Es un identificador numérico único que se asigna a cada dispositivo conectado a una red IP.', '2025-09-08 13:01:43'),
(103, '¿Qué es un microprocesador?', 'Es el circuito integrado que ejecuta instrucciones de programas y controla otras partes del ordenador.', '2025-09-08 13:01:49'),
(104, 'hola', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-09 18:55:58'),
(105, 'buscame un equipo de futbol', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-09 18:58:04'),
(106, 'hola', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:14'),
(107, 'ñaslñmasdñlkawdñlKaslmaSÑD', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:17'),
(108, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:18'),
(109, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:19'),
(110, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:20'),
(111, 'AA', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:20'),
(112, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:20'),
(113, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:20'),
(114, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:21'),
(115, '{A', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:21'),
(116, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:21'),
(117, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:21'),
(118, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:21'),
(119, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:21'),
(120, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:22'),
(121, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:22'),
(122, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:22'),
(123, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:22'),
(124, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:22'),
(125, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:23'),
(126, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:23'),
(127, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:23'),
(128, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:23'),
(129, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:23'),
(130, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:24'),
(131, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:24'),
(132, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:24'),
(133, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:24'),
(134, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:24'),
(135, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:24'),
(136, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:25'),
(137, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:25'),
(138, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:25'),
(139, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:25'),
(140, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:25'),
(141, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:26'),
(142, 'AS', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-16 18:09:26'),
(143, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:26'),
(144, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:26'),
(145, 'SD', 'SSD usa memoria flash para mayor velocidad y resistencia; HDD usa platos magnéticos y es más lento.', '2025-09-16 18:09:26'),
(146, 'AS', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-16 18:09:26'),
(147, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:26'),
(148, 'AS', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-16 18:09:26'),
(149, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:26'),
(150, 'AS', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-16 18:09:26'),
(151, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:26'),
(152, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:27'),
(153, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:27'),
(154, 'ASD1', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:27'),
(155, 'A', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-09-16 18:09:27'),
(156, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:27'),
(157, 'AS', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-16 18:09:27'),
(158, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:27'),
(159, 'AS', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-16 18:09:27'),
(160, 'DASD', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:27'),
(161, 'AS', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-16 18:09:28'),
(162, 'AS1', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:28'),
(163, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:28'),
(164, 'SA', 'Es el circuito integrado que ejecuta instrucciones de programas y controla otras partes del ordenador.', '2025-09-16 18:09:28'),
(165, '1D', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:28'),
(166, 'ASD', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:28'),
(167, 'As', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-16 18:09:28'),
(168, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:28'),
(169, 'AS', 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', '2025-09-16 18:09:29'),
(170, 'D', 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', '2025-09-16 18:09:29'),
(171, 'asD', 'Lo siento, no tengo una respuesta para eso.????', '2025-09-16 18:09:29'),
(172, 'SD', 'SSD usa memoria flash para mayor velocidad y resistencia; HDD usa platos magnéticos y es más lento.', '2025-09-16 18:09:29'),
(173, 'hola', 'Lo siento, no tengo una respuesta para eso.????', '2025-10-07 17:32:39'),
(174, 'hola', 'Lo siento, no tengo una respuesta para eso.????', '2025-11-13 16:35:16'),
(175, 'que es un sistema operativo', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-11-13 17:07:41'),
(176, 'que es un sistema operativo', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-11-13 17:12:54'),
(177, 'que es un sistema operativo', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-11-14 09:33:25'),
(178, 'hola hola hola hola hola hola hola hola cómo estás', 'Lo siento, no tengo una respuesta para eso.????', '2025-11-17 17:18:18'),
(179, 'Hola cómo andás Me puedes decir qué es un sistema operativo', 'Lo siento, no tengo una respuesta para eso.????', '2025-11-17 17:18:28'),
(180, 'Qué es un sistema operativo', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-11-17 17:18:35'),
(181, '¿Qué es un sistema operativo?', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-11-17 17:20:19'),
(182, 'Qué es un sistema operativo', 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', '2025-11-17 17:25:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `preguntas` varchar(500) NOT NULL,
  `id_categorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `preguntas`, `id_categorias`) VALUES
(1, '¿Qué es un sistema operativo?', 6),
(2, '¿Cuál es la función principal del kernel?', 6),
(3, 'Nombra dos tipos de sistemas operativos según su arquitectura.', 6),
(4, '¿Qué es la gestión de procesos en un SO?', 6),
(5, '¿Para qué sirve un sistema de archivos?', 6),
(6, '¿Qué es una dirección IP?', 7),
(7, '¿Cuál es la diferencia entre LAN y WAN?', 7),
(8, '¿Qué protocolo se utiliza para enviar correos electrónicos?', 7),
(9, '¿Para qué sirve un switch en una red?', 7),
(10, '¿Qué hace un firewall en una red de datos?', 7),
(11, '¿Qué es un microprocesador?', 8),
(12, '¿Para qué sirven los buses en una placa madre?', 8),
(13, '¿Qué diferencia hay entre RAM y ROM?', 8),
(14, '¿Qué es un disco SSD y en qué se diferencia de un HDD?', 8),
(15, '¿Qué función tiene la tarjeta gráfica?', 8),
(16, '¿Qué es el software de código abierto?', 9),
(17, '¿Cuál es la diferencia entre software de sistema y de aplicación?', 9),
(18, '¿Qué es una licencia GPL?', 9),
(19, 'Nombra un ejemplo de software middleware.', 9),
(20, '¿Para qué sirve un antivirus?', 9),
(21, '¿Qué es la criptografía?', 10),
(22, '¿Cuál es la diferencia entre autenticación y autorización?', 10),
(23, '¿Qué es un ataque de phishing?', 10),
(24, '¿Para qué sirve un IDS (Sistema de Detección de Intrusos)?', 10),
(25, '¿Qué es un certificado digital?', 10),
(26, '¿Qué diferencia hay entre kernel monolítico y microkernel?', 6),
(27, '¿Qué es la planificación de procesos (scheduling)?', 6),
(28, '¿Qué significa multitarea en un SO?', 6),
(29, '¿Qué es la gestión de memoria?', 6),
(30, '¿Qué es una tabla de procesos (PCB)?', 6),
(31, '¿Qué es una interrupción en un sistema operativo?', 6),
(32, '¿Qué es un sistema de archivos?', 6),
(33, '¿Qué es un driver o controlador de dispositivo?', 6),
(34, '¿Qué es una llamada al sistema (system call)?', 6),
(35, '¿Qué es contexto de ejecución (context switch)?', 6),
(36, '¿Qué diferencia hay entre hilo y proceso?', 6),
(37, '¿Qué es sincronización entre procesos?', 6),
(38, '¿Qué es un semáforo en SO?', 6),
(39, '¿Qué es deadlock (interbloqueo)?', 6),
(40, '¿Qué es paginación en memoria virtual?', 6),
(41, '¿Qué es un fallo de página (page fault)?', 6),
(42, '¿Qué es swap o intercambio de memoria?', 6),
(43, '¿Qué es un daemon o servicio del sistema?', 6),
(44, '¿Qué es el init o systemd?', 6),
(45, '¿Qué es el espacio de usuario y espacio kernel?', 6),
(46, '¿Qué es un módulo del kernel?', 6),
(47, '¿Para qué sirve el bootloader?', 6),
(48, '¿Qué es virtualización a nivel de sistema operativo?', 6),
(49, '¿Qué es un contenedor comparado con una VM?', 6),
(50, '¿Qué es la gestión de permisos en el SO?', 6),
(51, '¿Qué es SELinux o AppArmor brevemente?', 6),
(52, '¿Qué son las señales en Unix/Linux?', 6),
(53, '¿Qué es el scheduler de CPU?', 6),
(54, '¿Qué es throttling térmico del sistema operativo?', 6),
(55, '¿Qué hace un kernel panic?', 6),
(56, '¿Qué es un shell?', 6),
(57, '¿Qué diferencias hay entre GUI y CLI?', 6),
(58, '¿Qué es un sistema operativo en tiempo real (RTOS)?', 6),
(59, '¿Qué es una dirección IP?', 7),
(60, '¿Cuál es la diferencia entre IPv4 e IPv6?', 7),
(61, '¿Qué es una máscara de subred?', 7),
(62, '¿Qué hace un gateway o puerta de enlace?', 7),
(63, '¿Qué es DNS y para qué sirve?', 7),
(64, '¿Qué es DHCP y para qué se utiliza?', 7),
(65, '¿Qué diferencia hay entre TCP y UDP?', 7),
(66, '¿Qué es un puerto de red?', 7),
(67, '¿Qué es NAT?', 7),
(68, '¿Qué es una VPN?', 7),
(69, '¿Qué hace un firewall en la red?', 7),
(70, '¿Qué es un switch y qué hace?', 7),
(71, '¿Qué hace un router?', 7),
(72, '¿Qué es ARP y para qué sirve?', 7),
(73, '¿Qué es ICMP y para qué se usa (ej: ping)?', 7),
(74, '¿Qué es el modelo OSI?', 7),
(75, '¿Qué es el modelo TCP/IP?', 7),
(76, '¿Qué es QoS en redes?', 7),
(77, '¿Qué es ancho de banda y latencia?', 7),
(78, '¿Qué es MTU?', 7),
(79, '¿Qué es un socket?', 7),
(80, '¿Qué es HTTPS y en qué difiere de HTTP?', 7),
(81, '¿Qué es SSL/TLS?', 7),
(82, '¿Qué es un proxy?', 7),
(83, '¿Qué es traceroute y para qué sirve?', 7),
(84, '¿Qué es un SSID en redes inalámbricas?', 7),
(85, '¿Qué es una VLAN?', 7),
(86, '¿Qué es un punto de acceso (AP)?', 7),
(87, '¿Qué es PoE (Power over Ethernet)?', 7),
(88, '¿Qué es un módem y cómo se diferencia de un router?', 7),
(89, '¿Qué es una CPU (microprocesador)?', 8),
(90, '¿Qué significa cores y threads en un CPU?', 8),
(91, '¿Qué es la velocidad de reloj (GHz)?', 8),
(92, '¿Qué es caché L1, L2, L3?', 8),
(93, '¿Qué es la placa madre (motherboard)?', 8),
(94, '¿Qué es el chipset de la placa madre?', 8),
(95, '¿Qué hace la BIOS/UEFI?', 8),
(96, '¿Qué diferencia hay entre RAM y ROM?', 8),
(97, '¿Qué tipos de RAM existen (DDR3/DDR4/DDR5)?', 8),
(98, '¿Qué es almacenamiento SSD y cómo funciona?', 8),
(99, '¿Qué es un disco HDD?', 8),
(100, '¿Qué es NVMe y en qué se diferencia de SATA?', 8),
(101, '¿Qué es una GPU?', 8),
(102, '¿Diferencia entre GPU integrada y dedicada?', 8),
(103, '¿Qué es la fuente de alimentación (PSU)?', 8),
(104, '¿Qué es el factor de forma (ATX, microATX)?', 8),
(105, '¿Qué es PCIe y para qué sirve?', 8),
(106, '¿Qué es un conector SATA?', 8),
(107, '¿Qué es el disipador (heatsink)?', 8),
(108, '¿Qué es la pasta térmica y por qué es importante?', 8),
(109, '¿Qué es overclocking?', 8),
(110, '¿Qué es benchmarking de hardware?', 8),
(111, '¿Qué es un sensor de temperatura en PC?', 8),
(112, '¿Qué es una batería CMOS?', 8),
(113, '¿Qué es un puerto USB y versiones (2.0,3.0,3.1)?', 8),
(114, '¿Qué es HDMI y para qué se usa?', 8),
(115, '¿Qué son los conectores de audio?', 8),
(116, '¿Qué es la tarjeta de red (NIC)?', 8),
(117, '¿Qué es software de código abierto?', 9),
(118, '¿Qué diferencia hay entre software de sistema y de aplicación?', 9),
(119, '¿Qué es middleware?', 9),
(120, '¿Qué es un compilador?', 9),
(121, '¿Qué es un intérprete?', 9),
(122, '¿Qué es una librería vs un framework?', 9),
(123, '¿Qué es una API?', 9),
(124, '¿Qué es un SDK?', 9),
(125, '¿Qué es un entorno de ejecución (runtime)?', 9),
(126, '¿Qué es una dependencia en software?', 9),
(127, '¿Qué es control de versiones?', 9),
(128, '¿Qué es Git y para qué sirve?', 9),
(129, '¿Qué es una rama (branch) en Git?', 9),
(130, '¿Qué es Continuous Integration (CI)?', 9),
(131, '¿Qué es Continuous Deployment (CD)?', 9),
(132, '¿Qué es un IDE?', 9),
(133, '¿Qué es un editor de texto para programar?', 9),
(134, '¿Qué es testing unitario?', 9),
(135, '¿Qué es testing de integración?', 9),
(136, '¿Qué es un contenedor de software?', 9),
(137, '¿Qué es Docker brevemente?', 9),
(138, '¿Qué es virtualenv o entornos virtuales?', 9),
(139, '¿Qué es un paquete instalador (package manager)?', 9),
(140, '¿Qué es semantic versioning (semver)?', 9),
(141, '¿Qué es un build system (ej: Make, Gradle)?', 9),
(142, '¿Qué es debugging?', 9),
(143, '¿Qué es profiling de una aplicación?', 9),
(144, '¿Qué es la localización (i18n) en software?', 9),
(145, '¿Qué es criptografía?', 10),
(146, '¿Diferencia entre cifrado simétrico y asimétrico?', 10),
(147, '¿Qué es un hash y para qué sirve?', 10),
(148, '¿Qué es salting en contraseñas?', 10),
(149, '¿Qué es SSL/TLS y para qué sirve?', 10),
(150, '¿Qué es un certificado digital?', 10),
(151, '¿Qué es PKI?', 10),
(152, '¿Qué es autenticación y autorización?', 10),
(153, '¿Qué es un ataque de phishing?', 10),
(154, '¿Qué es malware y tipos comunes?', 10),
(155, '¿Qué es ransomware?', 10),
(156, '¿Qué es un IDS y un IPS?', 10),
(157, '¿Qué es un firewall y cómo ayuda?', 10),
(158, '¿Qué es 2FA / MFA?', 10),
(159, '¿Qué son vulnerabilidades y CVE?', 10),
(160, '¿Qué es hardening de servidores?', 10),
(161, '¿Qué es pentesting (prueba de penetración)?', 10),
(162, '¿Qué es seguridad en redes inalámbricas?', 10),
(163, '¿Qué es spoofing (suplantación)?', 10),
(164, '¿Qué es sniffing de red?', 10),
(165, '¿Qué es autenticación basada en tokens?', 10),
(166, '¿Qué es seguridad en aplicaciones web (OWASP)?', 10),
(167, '¿Qué es XSS (Cross-Site Scripting)?', 10),
(168, '¿Qué es SQL Injection?', 10),
(169, '¿Qué es CSRF (Cross-Site Request Forgery)?', 10),
(170, '¿Qué es control de acceso basado en roles (RBAC)?', 10),
(171, '¿Qué es la política de contraseñas segura?', 10),
(172, '¿Qué es la gestión de parches (patch management)?', 10),
(173, '¿Qué es copia de seguridad (backup) y su importancia?', 10),
(174, '¿Qué es el principio de menor privilegio?', 10),
(175, '¿Qué es un plan de respuesta a incidentes?', 10),
(176, '¿Qué es la forense digital (digital forensics)?', 10),
(177, '¿Qué es la ingeniería social y cómo se previene?', 10),
(178, '¿Qué tipos de análisis existen en forense digital?', 10),
(179, '¿Qué información contiene un log típico del sistema?', 10),
(180, '¿Qué es la trazabilidad en seguridad informática?', 10),
(181, '¿Cómo se realiza un análisis de malware básico?', 10),
(182, '¿Qué diferencia hay entre detección y prevención en seguridad?', 10),
(183, '¿Qué es un honeypot y para qué sirve?', 10),
(184, '¿Cómo se realiza una copia forense de un disco?', 10),
(185, '¿Qué es el análisis de memoria RAM en forense?', 10),
(186, '¿Qué rol tiene la cadena de custodia en una investigación?', 10),
(187, '¿Qué es fuzzing y cómo ayuda en seguridad?', 10),
(188, '¿Qué información puede revelar un archivo .pcap?', 10),
(189, '¿Qué es un rootkit y por qué es peligroso?', 10),
(190, '¿Cómo identificar comunicaciones sospechosas en una red?', 10),
(191, '¿Qué herramientas se usan para escaneo de vulnerabilidades?', 10),
(192, '¿Qué es la enumeración en pruebas de penetración?', 10),
(193, '¿Cómo proteger claves privadas en servidores?', 10),
(194, '¿Qué métricas son útiles en un informe de seguridad?', 10),
(195, '¿Qué es Threat Intelligence y para qué se usa?', 10),
(196, '¿Qué pasos básicos incluye un incidente de phishing?', 10),
(197, '¿Qué es la exfiltración de datos y cómo detectarla?', 10),
(198, '¿Cuándo es recomendable realizar un pentest externo?', 10),
(199, '¿Qué es la mitigación de vulnerabilidades priorizada?', 10),
(200, '¿Qué controles mínimos recomiendas para un servidor web?', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  `pregunta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `respuesta`, `pregunta_id`) VALUES
(1, 'Es el software que gestiona los recursos de hardware y proporciona servicios a las aplicaciones.', 1),
(2, 'Es el núcleo del SO encargado de controlar la CPU, la memoria y los dispositivos.', 2),
(3, 'Monolíticos (todo el kernel en un solo espacio) y microkernel (módulos mínimos en kernel y servicios en espacio de usuario).', 3),
(4, 'Es el conjunto de tareas de crear, planificar, sincronizar y finalizar procesos en ejecución.', 4),
(5, 'Permite organizar, almacenar, buscar y acceder a archivos en el dispositivo de almacenamiento.', 5),
(6, 'Es un identificador numérico único que se asigna a cada dispositivo conectado a una red IP.', 6),
(7, 'LAN (red local) cubre un área pequeña; WAN (red amplia) interconecta LANs a gran escala geográfica.', 7),
(8, 'SMTP (Simple Mail Transfer Protocol).', 8),
(9, 'Conecta varios dispositivos en una red local y reenvía paquetes al destino adecuado.', 9),
(10, 'Filtra y controla el tráfico de red para permitir o bloquear conexiones según reglas de seguridad.', 10),
(11, 'Es el circuito integrado que ejecuta instrucciones de programas y controla otras partes del ordenador.', 11),
(12, 'Son canales de comunicación interna que transportan datos y señales entre componentes de la placa.', 12),
(13, 'RAM es memoria volátil de lectura/escritura; ROM es no volátil y normalmente de solo lectura.', 13),
(14, 'SSD usa memoria flash para mayor velocidad y resistencia; HDD usa platos magnéticos y es más lento.', 14),
(15, 'Renderiza gráficos transformando datos en imágenes mostradas en pantalla.', 15),
(16, 'Es software cuyo código fuente está disponible para uso, estudio, modificación y distribución libre.', 16),
(17, 'El de sistema gestiona el hardware y el SO; el de aplicación realiza tareas concretas para el usuario.', 17),
(18, 'Es una licencia que garantiza libertad para usar, copiar, modificar y distribuir software derivado bajo los mismos términos.', 18),
(19, 'Por ejemplo, un servidor de aplicaciones como Apache Tomcat, que conecta SO y aplicaciones de negocio.', 19),
(20, 'Detecta, previene o elimina malware y protege el sistema contra virus y otras amenazas.', 20),
(21, 'Es la técnica de cifrar información para proteger su confidencialidad e integridad.', 21),
(22, 'Autenticación verifica identidad; autorización concede permisos tras autenticación.', 22),
(23, 'Es un engaño mediante correo o sitio web para robar datos sensibles haciéndose pasar por entidad legítima.', 23),
(24, 'Supervisa la red o sistemas en busca de actividad sospechosa e intenta alertar o frenar intrusiones.', 24),
(25, 'Es un archivo digital que vincula claves criptográficas a la identidad de una entidad para comunicaciones seguras.', 25),
(26, 'El monolítico incluye todo el kernel en un único espacio; el microkernel minimiza código en kernel y corre servicios en espacio usuario.', 26),
(27, 'Es el conjunto de políticas y algoritmos que el SO usa para asignar CPU a procesos.', 27),
(28, 'Capacidad del SO para ejecutar múltiples tareas aparentemente al mismo tiempo.', 28),
(29, 'Gestión de asignación, liberación y protección de memoria para procesos y el sistema.', 29),
(30, 'PCB es la estructura que contiene la información necesaria para gestionar un proceso.', 30),
(31, 'Evento que detiene el flujo normal para atender hardware o software; el SO lo gestiona.', 31),
(32, 'Estructura que organiza archivos y directorios en almacenamiento persistente.', 32),
(33, 'Programa que permite al SO comunicarse y controlar un dispositivo de hardware.', 33),
(34, 'Interfaz que permite a programas solicitar servicios al kernel del SO.', 34),
(35, 'Cambio del contexto de un proceso al siguiente para que la CPU ejecute otro proceso.', 35),
(36, 'Proceso es unidad de ejecución completa; hilo comparte espacio con otros hilos dentro del mismo proceso.', 36),
(37, 'Conjunto de técnicas para coordinar la ejecución de procesos o hilos para evitar inconsistencias.', 37),
(38, 'Mecanismo de sincronización que controla acceso concurrente a recursos compartidos.', 38),
(39, 'Situación donde procesos quedan esperando recursos entre sí sin poder avanzar.', 39),
(40, 'Técnica que permite usar disco como extensión de memoria usando páginas.', 40),
(41, 'Ocurre cuando un proceso intenta acceder a una página que no está en memoria física.', 41),
(42, 'Mover páginas entre RAM y disco para liberar memoria física.', 42),
(43, 'Proceso que corre en segundo plano ofreciendo servicios continuos al sistema.', 43),
(44, 'Programa que inicializa servicios del sistema al arrancar, systemd es un ejemplo moderno.', 44),
(45, 'Espacio kernel tiene privilegios y acceso al hardware; espacio usuario corre aplicaciones sin privilegios.', 45),
(46, 'Componente cargable que añade soporte o funcionalidades al kernel en tiempo de ejecución.', 46),
(47, 'Programa que carga el sistema operativo en memoria al arrancar el equipo.', 47),
(48, 'Permite ejecutar múltiples entornos aislados compartiendo el mismo kernel.', 48),
(49, 'Contenedor comparte kernel y es más liviano; VM emula hardware y tiene su propio kernel.', 49),
(50, 'Controla quién puede leer, escribir o ejecutar archivos y recursos del sistema.', 50),
(51, 'Mecanismos para aplicar políticas de control de acceso y confinamiento a procesos.', 51),
(52, 'Mecanismo para notificar eventos a procesos (ej: SIGINT, SIGTERM).', 52),
(53, 'Sub-sistema responsable de seleccionar qué proceso ejecuta la CPU en cada instante.', 53),
(54, 'Reducción automática de rendimiento para evitar daños por temperatura elevada.', 54),
(55, 'Fallo crítico del kernel que deja el sistema inoperable y suele requerir reinicio.', 55),
(56, 'Interprete de comandos que permite al usuario interactuar con el SO.', 56),
(57, 'GUI usa ventanas e iconos; CLI usa texto y comandos — cada una tiene ventajas.', 57),
(58, 'SO diseñado para garantizar respuestas con latencia y determinismo (embebidos, industriales).', 58),
(59, 'Identificador numérico asignado a cada dispositivo en una red IP.', 59),
(60, 'IPv4 usa direcciones de 32 bits; IPv6 usa 128 bits para mayor espacio de direcciones.', 60),
(61, 'Determina qué parte de la dirección IP identifica la red y cuál el host.', 61),
(62, 'Dispositivo que conecta redes y enruta paquetes hacia otras redes.', 62),
(63, 'Sistema que traduce nombres de dominio a direcciones IP.', 63),
(64, 'Protocolo que asigna direcciones IP y parámetros de red automáticamente.', 64),
(65, 'TCP es orientado a conexión y fiable; UDP es sin conexión y más rápido.', 65),
(66, 'Número que identifica un servicio o aplicación en un host (ej: 80 HTTP).', 66),
(67, 'Traduce direcciones privadas a públicas para acceso a Internet y viceversa.', 67),
(68, 'Red privada virtual que cifra tráfico y permite acceso seguro sobre Internet.', 68),
(69, 'Política o dispositivo que permite o bloquea tráfico según reglas de seguridad.', 69),
(70, 'Conecta dispositivos en una LAN y reenvía tramas al destino correcto.', 70),
(71, 'Dispositivo que encamina paquetes entre redes distintas usando tablas de ruta.', 71),
(72, 'Protocolo que asocia direcciones IP con direcciones MAC en una LAN.', 72),
(73, 'Protocolo usado para mensajes de control, como el comando ping.', 73),
(74, 'Modelo de 7 capas que describe funciones de red desde física hasta aplicación.', 74),
(75, 'Conjunto de protocolos de Internet (capas simplificadas, TCP/IP).', 75),
(76, 'Conjunto de técnicas para priorizar tráfico según importancia o tipo.', 76),
(77, 'Ancho de banda es capacidad; latencia es retraso en la comunicación.', 77),
(78, 'Máxima unidad de transmisión en una red; afecta fragmentación de paquetes.', 78),
(79, 'Endpoint para comunicación entre procesos sobre la red (IP + puerto).', 79),
(80, 'HTTPS es HTTP sobre TLS, cifra la comunicación entre cliente y servidor.', 80),
(81, 'Protocolo para cifrar comunicaciones y autenticar servidores (y clientes).', 81),
(82, 'Intermediario que reenvía solicitudes y puede aplicar control y caching.', 82),
(83, 'Herramienta para trazar la ruta de paquetes y localizar saltos intermedios.', 83),
(84, 'Nombre de red inalámbrica visible para dispositivos (identificador del AP).', 84),
(85, 'Segmentación lógica de una red para aislar tráfico entre grupos.', 85),
(86, 'Dispositivo que provee acceso inalámbrico a la red local.', 86),
(87, 'Tecnología que entrega energía a dispositivos a través del cable Ethernet.', 87),
(88, 'Módem convierte señales entre tu ISP y el formato usado por tu red local.', 88),
(89, 'Circuito integrado que ejecuta instrucciones y controla operaciones del equipo.', 89),
(90, 'Cores son núcleos de procesamiento; threads son hilos de ejecución por núcleo.', 90),
(91, 'Frecuencia a la que opera la CPU; mayor GHz suele implicar mayor velocidad.', 91),
(92, 'Memoria muy rápida dentro de CPU para acelerar acceso a datos e instrucciones.', 92),
(93, 'Placa principal que interconecta CPU, memoria, almacenamiento y periféricos.', 93),
(94, 'Conjunto de chips que gestionan comunicaciones y funciones de la placa madre.', 94),
(95, 'Firmware que inicializa hardware y carga el sistema operativo.', 95),
(96, 'RAM es memoria volátil; ROM es memoria no volátil y suele contener firmware.', 96),
(97, 'Generaciones de memoria con mejoras en velocidad y consumo energético.', 97),
(98, 'Almacenamiento basado en memoria flash, rápido y sin partes móviles.', 98),
(99, 'Disco magnético con platos giratorios para almacenamiento persistente.', 99),
(100, 'NVMe usa interfaz PCIe para mayor velocidad respecto a controladoras SATA.', 100),
(101, 'Unidad de procesamiento gráfico especializada en operaciones de renderizado.', 101),
(102, 'Integrada usa recursos del CPU; dedicada tiene su propia memoria y potencia.', 102),
(103, 'Suministra y regula la energía eléctrica a todos los componentes del equipo.', 103),
(104, 'Tamaño y especificaciones físicas de la placa y el chasis.', 104),
(105, 'Interconexión de alta velocidad para tarjetas de expansión (GPU, NVMe, etc.).', 105),
(106, 'Conector para unidades de almacenamiento y dispositivos SATA.', 106),
(107, 'Dispositivo que disipa calor generado por componentes (CPU, GPU).', 107),
(108, 'Compuesto que mejora la transferencia de calor entre CPU y disipador.', 108),
(109, 'Aumentar frecuencia de componentes para rendimiento; puede generar más calor.', 109),
(110, 'Pruebas que miden desempeño del hardware en distintas cargas de trabajo.', 110),
(111, 'Sensores que monitorean temperatura, voltajes y estado del sistema.', 111),
(112, 'Batería que mantiene la configuración de la BIOS cuando el equipo está apagado.', 112),
(113, 'Puerto de conexión universal para datos y energía con distintas versiones y velocidades.', 113),
(114, 'Interfaz de vídeo para conectar monitores y transmitir audio/video.', 114),
(115, 'Conectores para entrada/salida de audio (micrófono, línea, auriculares).', 115),
(116, 'Tarjeta que permite la conexión a redes (cableadas o inalámbricas).', 116),
(117, 'Software cuyo código fuente está disponible y puede modificarse y redistribuirse.', 117),
(118, 'Sistema gestiona hardware; aplicación realiza tareas concretas para el usuario.', 118),
(119, 'Software que actúa como intermediario entre aplicaciones y sistema o servicios.', 119),
(120, 'Programa que traduce código fuente a código máquina ejecutable.', 120),
(121, 'Programa que interpreta y ejecuta código fuente línea por línea.', 121),
(122, 'Librería ofrece funciones; framework impone arquitectura y flujo de la aplicación.', 122),
(123, 'Conjunto de definiciones para que aplicaciones interactúen entre sí.', 123),
(124, 'Kit de herramientas que facilita el desarrollo con librerías y documentación.', 124),
(125, 'Ambiente donde corre una aplicación (p.ej. JVM para Java).', 125),
(126, 'Paquetes o módulos necesarios para que un software funcione.', 126),
(127, 'Conjunto de prácticas y herramientas para gestionar cambios en código fuente.', 127),
(128, 'Sistema de control de versiones distribuido muy utilizado en desarrollo.', 128),
(129, 'Copia alternativa del historial de desarrollo para trabajar en funcionalidades separadas.', 129),
(130, 'Automatiza pruebas e integración de cambios en un repositorio.', 130),
(131, 'Entrega automática de software a producción tras pruebas y validaciones.', 131),
(132, 'Entorno con herramientas integradas para desarrollar software (editor, depurador).', 132),
(133, 'Editor de texto con funciones para programar como resaltado y autocompletado.', 133),
(134, 'Pruebas que verifican unidades pequeñas de código (funciones, clases).', 134),
(135, 'Pruebas que verifican interacción entre módulos o componentes del sistema.', 135),
(136, 'Agrupa una aplicación y sus dependencias en una unidad portátil e independiente.', 136),
(137, 'Plataforma para crear, desplegar y correr contenedores (simplifica packaging).', 137),
(138, 'Entorno aislado para gestionar dependencias de proyectos en lenguajes como Python.', 138),
(139, 'Herramienta que instala, actualiza y gestiona paquetes de software.', 139),
(140, 'Convención para numerar versiones (major.minor.patch) indicando cambios semánticos.', 140),
(141, 'Herramientas que automatizan compilación, pruebas y empaquetado del software.', 141),
(142, 'Proceso de encontrar y corregir errores o defectos en código.', 142),
(143, 'Medir dónde una aplicación consume tiempo o recursos para optimizarla.', 143),
(144, 'Adaptar una aplicación a distintos idiomas y regiones.', 144),
(145, 'Conjunto de técnicas y herramientas para proteger la información y sistemas.', 145),
(146, 'Simétrico usa misma clave para cifrar/descifrar; asimétrico usa par de claves.', 146),
(147, 'Función que mapea datos de tamaño variable a un valor fijo (huella digital).', 147),
(148, 'Añadir datos extra a contraseñas antes de hashearlas para aumentar seguridad.', 148),
(149, 'Protocolo que cifra comunicaciones entre cliente y servidor para confidencialidad e integridad.', 149),
(150, 'Documento digital que vincula una clave pública a una identidad verificada.', 150),
(151, 'Infraestructura que gestiona emisión, revocación y verificación de certificados digitales.', 151),
(152, 'Autenticación verifica identidad; autorización otorga permisos tras verificar identidades.', 152),
(153, 'Técnica de engaño para obtener credenciales o datos sensibles de usuarios.', 153),
(154, 'Software malicioso: virus, troyanos, spyware, adware, etc.', 154),
(155, 'Malware que cifra datos y exige rescate para recuperarlos.', 155),
(156, 'IDS detecta intrusiones; IPS además puede bloquearlas.', 156),
(157, 'Filtra y controla tráfico según políticas para proteger recursos y servicios.', 157),
(158, 'Autenticación con factores adicionales como SMS, app o token físico.', 158),
(159, 'Registro público de vulnerabilidades con identificadores para seguimiento.', 159),
(160, 'Medidas para reducir la superficie de ataque y endurecer configuraciones del sistema.', 160),
(161, 'Evaluación controlada para encontrar y explotar vulnerabilidades con permiso.', 161),
(162, 'Buenas prácticas para cifrar y autenticar redes Wi-Fi y proteger el acceso.', 162),
(163, 'Suplantación de identidad de dirección (IP/MAC) para engañar sistemas o redes.', 163),
(164, 'Captura y análisis de tráfico de red para monitorizar o extraer información.', 164),
(165, 'Método que usa tokens (JWT, OAuth) para autenticar y autorizar usuarios.', 165),
(166, 'Conjunto de riesgos comunes en apps web; OWASP publica las principales vulnerabilidades.', 166),
(167, 'Inserción de scripts maliciosos en páginas que son ejecutados por el navegador.', 167),
(168, 'Inyección de código SQL malicioso que manipula consultas a la base de datos.', 168),
(169, 'Ataque que obliga al navegador a ejecutar acciones no intencionadas por el usuario.', 169),
(170, 'Modelo para asignar permisos según roles y responsabilidades de usuarios.', 170),
(171, 'Políticas para crear y gestionar contraseñas robustas y rotación cuando corresponde.', 171),
(172, 'Proceso de aplicar actualizaciones de seguridad y software para corregir vulnerabilidades.', 172),
(173, 'Copia de datos que permite recuperar sistemas ante fallos o ataques.', 173),
(174, 'Práctica de limitar permisos al mínimo necesario para realizar tareas.', 174),
(175, 'Plan documentado para detectar, contener y recuperar tras incidentes de seguridad.', 175),
(176, 'Recolección y análisis de evidencias digitales para investigar incidentes.', 176),
(177, 'Ingeniería social es manipular personas para obtener información; se previene con formación, políticas y verificación de identidad.', 177),
(178, 'Análisis lógico, físico y de red son comunes; cada uno examina distintos artefactos (archivos, discos, tráfico).', 178),
(179, 'Logs suelen tener timestamp, usuario, acción, origen y mensajes que ayudan a reconstruir eventos.', 179),
(180, 'Trazabilidad es poder seguir el rastro de acciones y cambios mediante registros verificables.', 180),
(181, 'Análisis básico incluye aislamiento, sandboxing del binario y examen de indicadores (IOCs).', 181),
(182, 'Detección identifica incidentes; prevención busca impedirlos antes de que ocurran — ambas son complementarias.', 182),
(183, 'Honeypot es un señuelo para atraer atacantes y estudiar sus tácticas sin poner en riesgo sistemas reales.', 183),
(184, 'Se hace con herramientas forenses que crean imágenes bit a bit (por ejemplo dd o tool forense dedicada) y se verifica con hashes.', 184),
(185, 'El análisis de RAM revela procesos en ejecución, credenciales en memoria y artefactos volátiles.', 185),
(186, 'La cadena de custodia documenta quién tuvo acceso a la evidencia, cuándo y cómo, garantizando integridad legal.', 186),
(187, 'Fuzzing consiste en enviar entradas aleatorias a un programa para encontrar fallos y vulnerabilidades.', 187),
(188, 'Un .pcap contiene paquetes de red; se puede extraer conversaciones, archivos transferidos y patrones de ataque.', 188),
(189, 'Un rootkit oculta actividad maliciosa a nivel del sistema; es difícil de detectar y requiere análisis profundo.', 189),
(190, 'Monitoreo de tráfico, alertas por anomalías y revisión de logs ayudan a identificar comunicaciones sospechosas.', 190),
(191, 'Nmap, Nessus, OpenVAS y herramientas específicas según objetivo son habituales para escaneo de vulnerabilidades.', 191),
(192, 'Enumeración es recopilar información sobre sistemas/servicios activos antes de explotar una vulnerabilidad.', 192),
(193, 'Usar HSM, permisos estrictos, cifrado y rotación de claves; evitar exponer claves en archivos planos.', 193),
(194, 'Número de vulnerabilidades críticas, tiempo de exposición y riesgo residual son métricas clave.', 194),
(195, 'Threat Intelligence reúne datos sobre amenazas para anticipar ataques y mejorar defensas.', 195),
(196, 'Detectar el phishing, aislar mensajes, resetear credenciales comprometidas y educar usuarios son pasos típicos.', 196),
(197, 'Exfiltración es robo de datos; se detecta con control de salidas, DLP y análisis de tráfico inusual.', 197),
(198, 'Cuando necesitas una evaluación externa imparcial o al cambiar plataformas/infraestructura importante.', 198),
(199, 'Mitigación priorizada aborda primero vulnerabilidades críticas con mayor exposición y facilidad de explotación.', 199),
(200, 'Mantener software actualizado, usar TLS, configurar permisos mínimos, WAF y monitorización de logs.', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(2, 'Adminsitrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol_id`) VALUES
(2, 'agustin', 'epet3agus@gmail.com', '1234', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorias` (`id_categorias`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregunta_id` (`pregunta_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_categorias`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
