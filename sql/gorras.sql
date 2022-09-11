-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 01:56:04
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebausuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gorras`
--

CREATE TABLE `gorras` (
  `id` int(11) NOT NULL,
  `diseño` tinytext DEFAULT NULL,
  `talla` varchar(4) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gorras`
--

INSERT INTO `gorras` (`id`, `diseño`, `talla`, `precio`, `cantidad`, `fecha_actualizacion`) VALUES
(1, 'Animado', 'S', 12.5, 1, '0000-00-00'),
(2, 'Animado', 'S', 12.5, 1, '2022-09-04'),
(3, 'Personalizado', 'M', 38.5, 3, '2022-09-04'),
(4, 'Animado', 'L', 24, 2, '2022-09-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gorras`
--
ALTER TABLE `gorras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gorras`
--
ALTER TABLE `gorras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
