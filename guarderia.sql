-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2025 a las 02:07:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guarderia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `razon` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `usuario_creacion` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `razon`, `descripcion`, `fecha`, `hora`, `lugar`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 'Deporte', 'Juegos infantiles al aire libre', '2025-07-14', '06:36:00', 'Patio guarderia 1', 'Karla Abad', '2025-07-14 04:36:56'),
(4, 'Deporte', 'Juegos infantiles al aire libre', '2025-07-17', '04:24:00', 'Patio guarderia', 'Karla Abad', '2025-07-15 02:24:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` enum('Disponible','No Disponible') DEFAULT 'Disponible',
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `nombre`, `descripcion`, `cantidad`, `estado`, `fecha_registro`) VALUES
(6, 'Pizarrones blancos', 'en uso dentro de los cursos de niños', 15, 'No Disponible', '2025-07-14 08:14:54'),
(7, 'Pizarrones Verdes', 'En uso de los cursos de los niños', 15, 'No Disponible', '2025-07-14 08:15:41'),
(8, 'Pizarrones blancos', 'pizarrones blancos usados muy gastados ', 4, 'No Disponible', '2025-07-14 20:06:28'),
(9, 'Pizarrones blancos', 'Pizarrones blancos nuevos listo para su uso', 10, 'Disponible', '2025-07-14 20:07:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos`
--

CREATE TABLE `ninos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` enum('Masculino','Femenino') NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `tutor` varchar(100) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_creacion` varchar(50) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `usuario_actualizacion` varchar(50) DEFAULT NULL,
  `alergias` tinyint(1) DEFAULT 0,
  `detalle_alergias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ninos`
--

INSERT INTO `ninos` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `genero`, `nivel`, `tutor`, `fecha_registro`, `usuario_creacion`, `fecha_actualizacion`, `usuario_actualizacion`, `alergias`, `detalle_alergias`) VALUES
(2, 'Mariana', 'Garces', '2021-05-03', 'Femenino', 'inicial 1', 'Marcos Castro', '2025-07-14 04:44:34', 'Karla Abad', '2025-07-14 04:45:19', 'Karla Abad', 1, 'Gluten'),
(3, 'kevin', 'Gonzales', '2021-11-11', 'Masculino', 'inicial 1', 'Enma Farias', '2025-07-14 04:45:02', 'Karla Abad', '2025-07-14 04:45:23', 'Karla Abad', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_creacion` varchar(100) NOT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `usuario_actualizacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `apellido`, `cargo`, `fecha_nacimiento`, `direccion`, `telefono`, `email`, `fecha_registro`, `usuario_creacion`, `fecha_actualizacion`, `usuario_actualizacion`) VALUES
(1, 'Javier', 'Garces', 'Limpieza', '2025-07-25', 'los alamos', '099765533', 'martingonza@gmail.com', '2025-07-14 04:24:52', 'Karla Abad', '2025-07-14 04:24:59', 'Karla Abad'),
(2, 'Juan ', 'Caiche', 'Auxiliar ', '1997-06-18', 'los alamos', '0954678976', 'jua@gmail.com', '2025-07-15 02:03:54', 'Karla Abad', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `rol` enum('Administrador','Docente','Inventario') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `clave`, `rol`, `fecha_creacion`) VALUES
(2, 'Karla Abad', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrador', '2025-07-14 11:23:34'),
(3, 'Milton Lomas', 'MiltonL', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Docente', '2025-07-15 09:05:24'),
(4, 'Axel Cusme', 'AxelC', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Inventario', '2025-07-15 09:07:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ninos`
--
ALTER TABLE `ninos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
