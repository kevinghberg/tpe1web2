-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2021 a las 06:13:35
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
  `stock` tinyint(1) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `botines`
--

INSERT INTO `botines` (`id`, `modelo`, `marca`, `talle`, `stock`, `imagen`) VALUES
(64, 'NIKE MERCURIAL', 1, 42, 0, 'imagenes/49edf44a01b08406a251d2c526b45a97.jpg'),
(65, 'NIKE SUPERFLY', 1, 41, 0, 'imagenes/6e32a141f07b78ca281421d7a8bf1207.jpg'),
(67, 'ADIDAS PREDATOR', 2, 44, 0, 'imagenes/d4f850511eeb317a2b27684bce123591.jpg'),
(68, 'ADIDAS COPA', 2, 42, 0, 'imagenes/3b083fa2da4fe2ee2ea3b1dc88a52292.jpg'),
(69, 'DIADORA CLASICO', 5, 40, 0, 'imagenes/210380ba6fcf106726972f32e6a8239d.jpg'),
(70, 'PUMA FUTURE', 3, 35, 0, 'imagenes/01f19057619dcbb9801dd855ecfb5041.jpg'),
(71, 'UA SPEED', 7, 41, 0, 'imagenes/fd6ae765eb0f37b8fb22b022e06d6475.jpg'),
(72, 'UA ORANGE', 7, 42, 0, 'imagenes/4abd175abce38d6329016163c0fda610.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `valoracion` int(6) NOT NULL,
  `id_botin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `comentario`, `valoracion`, `id_botin`) VALUES
(67, 'Muy buenos!', 4, 67),
(68, 'Muy buenos, excelente calidad.', 5, 64);

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
(5, 'Diadora', 'Italia'),
(7, 'Under Armor', 'china'),
(8, 'Gaelle', 'Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `admin`) VALUES
(1, 'Anyo', '$2y$10$SeHwsxeeLMS1m0ITaXCvBehNOCCGecp3Ls3PoP.Kolk7ya8nZNfOO', 1),
(2, 'Kevin', '$2y$10$M0USF1vOjw4bkz7lwGrvVOt0fmIqcg1VGbH8uGwOJ7F5zjCKxZMAO', 1),
(3, 'Gustavo David Sierra Barenbaum', '$2y$10$1rNaOVG6Gq5.rPKisk02/uhz.f3X2MGK7bOJq0IHQEPXzPpVw46aG', 1),
(5, 'Prueba1', '$2y$10$geEghNpX6uIzLrPtq6kZZu9BKGEgn/aXakrDKqsCA48RVz27v/oye', 0),
(14, 'Nico', '$2y$10$TlNfik8uxFDDwNjcSttGduY96JTCHZxhzlVf.e3Ohcxy2WdUocXLm', 0),
(15, 'user', '$2y$10$L.HhnTfeP5pktWr541JcuuWY7yNo39s2HPcb58ZRTLxmAhWvjFMPu', 0),
(16, 'user2', '$2y$10$sX2Xf/MouU/nt6.93E/1X.qzZLQtJh85d4zXmKbFoZlnB0sKqIifq', 0);

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
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_botin` (`id_botin`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `botines`
--
ALTER TABLE `botines`
  ADD CONSTRAINT `botines_marca` FOREIGN KEY (`marca`) REFERENCES `marcas` (`id_marca`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `id_botin` FOREIGN KEY (`id_botin`) REFERENCES `botines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
