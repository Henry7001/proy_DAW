-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2022 a las 18:56:16
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
-- Estructura de tabla para la tabla `tazas`
--

CREATE TABLE `tazas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tamaño` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaactualizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tazas`
--

INSERT INTO `tazas` (`id`, `nombre`, `tamaño`, `descripcion`, `valor`, `cantidad`, `fechaactualizacion`) VALUES
(1, 'Taza Avengers', '240 -300 ml', 'Taza con estampado de Avengers (2012)', '10.00', 50, '2022-09-06'),
(2, 'Taza Avengers EndGame', '240 -300 ml', 'Taza grande de estampado de Avengers (2018)', '20.00', 5, '2022-09-06'),
(3, 'Taza Doraemon', '100 &ndash; 220 ml', 'Taza decorado con acabados del anime Doraemon (2020)', '10.00', 10, '2022-09-07'),
(4, 'Taza Justice League', '300 - 500 ml', 'Taza decorada con tema de Justice League (2017)', '5.00', 10, '2022-09-06'),
(5, 'Taza Justice League Zack Snyde', '300 - 500 ml', 'Taza con decoración del corte de Snyder (2021)', '20.00', 5, '2022-09-06'),
(6, 'Taza de Shakira', '100 &ndash; 220 ml', 'Taza oficial de Shakira', '12.00', 123, '2022-09-07'),
(7, 'Taza para caf&eacute;', '60 - 80ml', 'Taza peque&ntilde;a para caf&eacute;', '5.00', 1000, '2022-09-07'),
(8, 'Taza de ScarFace', '300 - 500 ml', 'Taza de ScarFace mediana', '12.00', 100, '2022-09-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tazas`
--
ALTER TABLE `tazas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tazas`
--
ALTER TABLE `tazas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
