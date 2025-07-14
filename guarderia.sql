-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2025 a las 04:37:40
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
(1, 'Bienvenida a Nuevos Estudiantes', 'Evento de orientación y bienvenida para estudiantes de primer ingreso.', '2025-07-08', '09:00:00', 'Auditorio Principal', 'Coordinación Académica', '2025-07-07 19:00:00'),
(2, 'Taller de Manualidades', 'Los niños realizarán figuras con plastilina y papel reciclado para estimular su creatividad.', '2025-07-09', '10:30:00', 'Aula Creativas', 'Ronny Ordoñez', '2025-07-12 01:36:00'),
(3, 'Reunión de Coordinadores', 'Planificación de actividades del segundo semestre.', '2025-07-10', '11:00:00', 'Sala de Juntas', 'Dirección General', '2025-07-08 21:20:00'),
(4, 'Comida', 'Comer', '2025-07-11', '00:15:00', 'Patio Principals', 'Ronny Ordoñez', '2025-07-12 01:15:24'),
(5, 'Charla Motivacional', 'Conferencia impartida por un coach invitado sobre superación personal.', '2025-07-15', '09:00:00', 'Auditorio Principal', 'María Velásquez', '2025-07-13 13:15:00'),
(6, 'Cine al Aire Libre', 'Proyección de una película familiar en el patio central.', '2025-07-16', '18:30:00', 'Patio Central', 'Jorge Pérez', '2025-07-13 14:45:00'),
(7, 'Torneo de Ajedrez', 'Competencia entre estudiantes para fomentar el pensamiento estratégico.', '2025-07-17', '14:00:00', 'Sala de Juegos', 'Andrea Ruiz', '2025-07-13 15:00:00'),
(8, 'Clases de Baile', 'Sesión de salsa y bachata para todos los niveles.', '2025-07-18', '16:00:00', 'Salón de Usos Múltiples', 'Carlos Mendoza', '2025-07-13 15:30:00'),
(9, 'Campaña de Donación de Sangre', 'Actividad en colaboración con la Cruz Roja.', '2025-07-20', '08:00:00', 'Enfermería', 'Laura Martínez', '2025-07-13 16:00:00'),
(10, 'Jornada de Limpieza', 'Limpieza y mantenimiento de jardines y áreas comunes.', '2025-07-21', '07:00:00', 'Áreas Verdes', 'Esteban Salinas', '2025-07-13 16:30:00'),
(11, 'Taller de Pintura', 'Técnicas básicas de acuarela para principiantes.', '2025-07-22', '10:00:00', 'Aula de Arte', 'Melissa García', '2025-07-14 14:00:00'),
(12, 'Club de Lectura', 'Discusión sobre el libro \"Cien años de soledad\".', '2025-07-23', '15:00:00', 'Biblioteca', 'Diana Torres', '2025-07-14 14:05:00'),
(13, 'Práctica de Teatro', 'Ensayo general para la obra del semestre.', '2025-07-24', '17:00:00', 'Teatro Universitario', 'Andrés López', '2025-07-14 14:10:00'),
(14, 'Clínica de Fútbol', 'Entrenamiento intensivo para el equipo.', '2025-07-24', '07:30:00', 'Cancha Deportiva', 'Marco Rivas', '2025-07-14 14:15:00'),
(15, 'Caminata Ecológica', 'Recorrido guiado por senderos del parque natural.', '2025-07-25', '08:00:00', 'Parque Natural', 'Valeria Estévez', '2025-07-14 14:20:00'),
(16, 'Curso de Primeros Auxilios', 'Capacitación teórica y práctica en atención básica.', '2025-07-25', '13:00:00', 'Sala 3', 'Cristina Romero', '2025-07-14 14:25:00'),
(17, 'Exposición de Ciencia', 'Presentación de proyectos por parte de estudiantes.', '2025-07-26', '09:30:00', 'Hall Central', 'Raúl Medina', '2025-07-14 14:30:00'),
(18, 'Yoga al Amanecer', 'Sesión de meditación y estiramiento.', '2025-07-26', '06:00:00', 'Jardín Interior', 'Ana Muñoz', '2025-07-14 14:35:00'),
(19, 'Festival Gastronómico', 'Feria de platos típicos internacionales.', '2025-07-27', '12:00:00', 'Patio Central', 'Ricardo Cedeño', '2025-07-14 14:40:00'),
(20, 'Concurso de Talentos', 'Show de canto, baile y actuaciones estudiantiles.', '2025-07-27', '19:00:00', 'Auditorio', 'Yolanda Herrera', '2025-07-14 14:45:00'),
(21, 'Proyección Documental', '“Nuestro Planeta” - conciencia ambiental.', '2025-07-28', '11:00:00', 'Sala Audiovisual', 'Camila Ortega', '2025-07-14 14:50:00'),
(22, 'Reunión de Voluntarios', 'Organización para la campaña solidaria.', '2025-07-28', '16:00:00', 'Sala de Reuniones', 'Pablo Aguirre', '2025-07-14 14:55:00'),
(23, 'Muestra Fotográfica', 'Obras de estudiantes del taller de fotografía.', '2025-07-29', '10:00:00', 'Galería Interior', 'Rocío Andrade', '2025-07-14 15:00:00'),
(24, 'Simulacro de Evacuación', 'Ejercicio de prevención y seguridad.', '2025-07-29', '14:30:00', 'Toda la institución', 'Javier Molina', '2025-07-14 15:05:00'),
(25, 'Campeonato de Videojuegos', 'Competencia de eSports: FIFA y LoL.', '2025-07-30', '13:00:00', 'Sala de Computación', 'Felipe Lara', '2025-07-14 15:10:00'),
(26, 'Jornada de Vacunación', 'Vacunas contra la influenza para estudiantes.', '2025-07-30', '09:00:00', 'Enfermería', 'Luisa Bonilla', '2025-07-14 15:15:00'),
(27, 'Paseo Cultural', 'Visita al museo de historia natural.', '2025-07-31', '08:00:00', 'Museo Nacional', 'Gabriel Vera', '2025-07-14 15:20:00'),
(28, 'Taller de Robótica', 'Introducción al uso de sensores y microcontroladores.', '2025-07-31', '14:00:00', 'Laboratorio de Tecnología', 'Verónica Peña', '2025-07-14 15:25:00'),
(29, 'Conferencia de Tecnología', 'Tendencias actuales en inteligencia artificial.', '2025-08-01', '10:00:00', 'Salón A-1', 'David Morales', '2025-07-14 15:30:00'),
(30, 'Feria de Emprendimiento', 'Estudiantes presentan ideas de negocio innovadoras.', '2025-08-01', '15:00:00', 'Plazoleta', 'Silvia León', '2025-07-14 15:35:00');

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
  `usuario_creacion` varchar(100) NOT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `usuario_actualizacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ninos`
--
ALTER TABLE `ninos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
