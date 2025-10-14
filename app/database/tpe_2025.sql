-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2025 a las 22:39:49
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
-- Base de datos: `tpe_2025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `escudo` varchar(500) NOT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `liga` varchar(50) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `escudo`, `ciudad`, `pais`, `liga`, `anio`) VALUES
(1, 'Boca Juniors', '', 'Buenos Aires', 'Argentina', 'Liga Profesional Argentina', 1905),
(3, 'River Plate', '', 'Buenos Aires', 'Argentina', 'Liga Profesional Argentina', 1901),
(7, 'Real Madrid', '', 'Madrid', 'España', 'La Liga', 1902),
(9, 'Barcelona', '', 'Barcelona', 'España', 'La Liga', 1899),
(10, 'Manchester United', '', 'Manchester', 'Inglaterra', 'Premier League', 1878),
(11, 'Manchester United', '', 'Manchester', 'Inglaterra', 'Premier League', 1878);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `posicion` varchar(50) DEFAULT NULL,
  `puntaje` int(2) NOT NULL,
  `altura` double DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_jugador`, `nombre`, `imagen`, `apellido`, `pais`, `posicion`, `puntaje`, `altura`, `numero`, `fecha_nacimiento`, `id_equipo`) VALUES
(2, 'Edinson', '', 'Cavani', 'Uruguay', 'CENTRO DELANTERO', 88, 1.89, 10, '1987-02-14', 1),
(3, 'Sergio', '', 'Romero', 'Argentina', 'ARQUERO', 78, 1.92, 1, '1987-02-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'webadmin', '$2y$10$8jHhAVxEpuw/3kVfdD1gUe2Fz6d8A9CqzTqtF7mGgFv0exN6ygu0K');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
