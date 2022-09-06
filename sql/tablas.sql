-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camisas`
--

CREATE TABLE `camisas`
(
    `id`                  int(11) NOT NULL,
    `modelo`              varchar(20) NOT NULL,
    `tela`                varchar(50) NOT NULL,
    `talla`               varchar(10) NOT NULL,
    `precio`              double      NOT NULL,
    `cantidad`            int(11) NOT NULL,
    `fecha_actualizacion` datetime    NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `camisas`
--

INSERT INTO `camisas` (`id`, `modelo`, `tela`, `talla`, `precio`, `cantidad`, `fecha_actualizacion`)
VALUES (3, 'Modelo-1', 'Poliester', 'S', 10, 20, '2022-09-06 06:23:54'),
       (6, 'Modelo-2', 'Algodon', 'XS', 12000, 1, '2022-09-06 06:45:51'),
       (7, 'Modelo-1', 'Algodon', 'XS', 1, 23, '2022-09-06 06:50:47'),
       (8, 'Modelo-2', 'Franela', 'L', 1, 2, '2022-09-06 06:50:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camisas`
--
ALTER TABLE `camisas`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camisas`
--
ALTER TABLE `camisas`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
