-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2018 a las 22:18:25
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evalinteractuandocondb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `start_hour` time NOT NULL,
  `end` date NOT NULL,
  `end_hour` time NOT NULL,
  `allDay` tinyint(1) DEFAULT NULL,
  `id_usuario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `start`, `start_hour`, `end`, `end_hour`, `allDay`, `id_usuario_fk`) VALUES
(3, 'EVENTO 1', '2018-02-07', '21:23:59', '2018-02-10', '21:23:59', 0, 4),
(4, 'EVENTO 2', '2018-02-08', '21:23:59', '2018-02-10', '21:23:59', 0, 4),
(5, 'EVENTO 3', '2018-02-09', '21:23:59', '2018-02-10', '21:23:59', 0, 4),
(6, 'EVENTO 4', '2018-02-10', '21:23:59', '2018-02-10', '21:23:59', 0, 4),
(17, 'EVENTO VALLENATO', '2018-02-14', '23:30:00', '2018-02-19', '21:00:00', 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `psw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `psw`, `email`, `fecha_nacimiento`) VALUES
(4, 'Camila Bolivar', '$2y$10$F8wcERlePaPmee6OgB5VpuP2vF6LcrRUFrTiWXUmQ8Y50DG53am8.', 'lcbt@gmail.com', '2010-10-31'),
(5, 'Luis López', '$2y$10$AfQVHjjCqDeVUWrrokzw3uNkt3NmD5x6oI2BbTH8naUx00wDsY.ty', 'lall@gmail.com', '1987-08-30'),
(6, 'Laura López', '$2y$10$OTBBPeb64DE4TuHt4nYlu.X0A.YRl62ejZfbzBpCiUNhVxIQzhjUS', 'lclb@gmail.com', '2017-09-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
