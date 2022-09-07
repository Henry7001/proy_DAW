
-- autor: Solórzano Zambrano Ricardo
-- Estructura de tabla para la tabla `tazas`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `documento` varchar(25) NOT NULL,
  `registro` int(4) NOT NULL,
  `fechaactualizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `documento`, `registro`, `fechaactualizacion`) VALUES
(1, 'Ricardo', 'Solórzano', 'cedula', '2022', '2022-09-06'),
(2, 'Luis ', 'Vargas', 'ruc', '2021', '2022-09-06'),
(3, 'Dave', 'Delgado', 'cedula', '2022', '2022-09-06'),
(4, 'Henry', 'Ruiz', 'cedula', '2021', '2022-09-06'),


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
