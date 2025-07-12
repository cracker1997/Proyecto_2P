-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2025 a las 01:01:08
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
(2, 'Mariana', 'Garces', '2022-06-15', 'Femenino', 'inicial 1', 'Katty Perez', '2025-07-07 03:23:38', 'Ronny Ordoñez', '2025-07-07 03:44:43', 'Ronny Ordoñez', 1, 'Polvo'),
(3, 'Saul', 'Castro', '2022-01-11', 'Masculino', 'inicial 2', 'Marcos Castro', '2025-07-07 04:17:53', 'Ronny Ordoñez', NULL, NULL, 0, NULL),
(4, 'Elena', 'Parrales', '2022-11-02', 'Femenino', 'Maternal', 'Mayra Anchundia', '2025-07-07 14:23:41', 'Ronny Ordoñez', NULL, NULL, 0, NULL),
(5, 'Martin', 'Nuñes', '2022-06-09', 'Masculino', 'inicial 2', 'Josue Nuñez', '2025-07-07 14:26:57', 'Ronny Ordoñez', NULL, NULL, 1, 'Gluten'),
(6, 'Kevin', 'Moreno', '2022-11-11', 'Masculino', 'inicial 2', 'Enma Farias', '2025-07-07 14:28:55', 'Ronny Ordoñez', NULL, NULL, 1, 'Lactosa'),
(7, 'Allison', 'Chalen', '2022-07-27', 'Femenino', 'inicial 1', 'Juan Chalen', '2025-07-07 14:30:11', 'Ronny Ordoñez', NULL, NULL, 0, NULL),
(8, 'Tamara ', 'Carpio', '2023-07-04', 'Femenino', 'Maternal', 'Andrea Morales', '2025-07-07 14:31:24', 'Ronny Ordoñez', NULL, NULL, 0, NULL),
(9, 'Raull', 'Castro', '2023-05-08', 'Masculino', 'inicial 1', 'Marcos Castro', '2025-07-07 16:22:35', 'Ronny Ordoñez', '2025-07-07 17:00:27', 'Ronny Ordoñez', 0, NULL),
(10, 'Stalin', 'Mendez', '2023-06-27', 'Masculino', 'Maternal', 'Katty Perez', '2025-07-07 16:30:25', 'Ronny Ordoñez', NULL, NULL, 1, 'Gluten'),
(11, 'Pedro', 'Calle', '2022-10-11', 'Masculino', 'inicial 2', 'Johanna Peralta', '2025-07-07 17:01:40', 'Ronny Ordoñez', NULL, NULL, 1, 'Polen'),
(12, 'Javier', 'Chalen', '2023-08-22', 'Masculino', 'Maternal', 'Juan Chalen', '2025-07-07 17:02:20', 'Ronny Ordoñez', '2025-07-07 17:02:56', 'Ronny Ordoñez', 0, NULL),
(13, 'Etrella', 'Torres', '2023-05-16', 'Femenino', 'Maternal', 'Priscila Torres', '2025-07-07 19:22:42', 'Ronny Ordoñez', NULL, NULL, 1, 'Polvo'),
(14, 'Anthony', 'Gonzales', '2023-06-23', 'Masculino', 'inicial 1', 'Katty Perez', '2025-07-08 19:35:01', 'Ronny Ordoñez', '2025-07-08 19:35:13', 'Ronny Ordoñez', 0, NULL);

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
(1, 'Ronny Ordoñez', 'ronny', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Administrador', '2025-07-06 22:25:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `ninos`
--
ALTER TABLE `ninos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
