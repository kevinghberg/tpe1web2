-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2021 a las 17:58:03
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `botines`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botines`
--

CREATE TABLE `botines` (
  `id` int(11) NOT NULL,
  `modelo` varchar(32) NOT NULL,
  `marca` int(11) NOT NULL,
  `talle` int(11) NOT NULL,
  `stock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `botines`
--

INSERT INTO `botines` (`id`, `modelo`, `marca`, `talle`, `stock`) VALUES
(1, 'Tiempo', 1, 42, 0),
(2, 'Tiempo', 1, 44, 0),
(3, 'Predator', 2, 43, 0),
(24, 'Mercurial', 1, 40, 0),
(41, 'Borussia', 3, 39, 0),
(48, 'Buongiorno', 5, 44, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `paisOrigen` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `paisOrigen`) VALUES
(1, 'Nike', 'USA'),
(2, 'Adidas', 'Chile'),
(3, 'Puma', 'Francia'),
(5, 'Diadora', 'Italia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Anyo', '$2y$10$SeHwsxeeLMS1m0ITaXCvBehNOCCGecp3Ls3PoP.Kolk7ya8nZNfOO'),
(2, 'Kevin', '$2y$10$M0USF1vOjw4bkz7lwGrvVOt0fmIqcg1VGbH8uGwOJ7F5zjCKxZMAO'),
(3, 'Gustavo David Sierra Barenbaum', '$2y$10$1rNaOVG6Gq5.rPKisk02/uhz.f3X2MGK7bOJq0IHQEPXzPpVw46aG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `botines`
--
ALTER TABLE `botines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `botines_marca` (`marca`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `botines`
--
ALTER TABLE `botines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `botines`
--
ALTER TABLE `botines`
  ADD CONSTRAINT `botines_marca` FOREIGN KEY (`marca`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
