
CREATE DATABASE IF NOT EXISTS `mvc_php` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `mvc_php`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idProducto` int(10) UNSIGNED NOT NULL,
  `idProveedor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nomprod` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precioU` float NOT NULL,
  `descrip` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `producto`
--

TRUNCATE TABLE `producto`;
--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `idProveedor`, `nomprod`, `precioU`, `descrip`) VALUES
(456789, '1719358614', 'Dolex', 700, 'Pastillas para el dolor y fiebre.'),
(898902, '1800734335', 'Acetaminofen', 500, 'Pastillas para el dolor y fiebre.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `idProveedor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `razonS` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dir` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `proveedor`
--

TRUNCATE TABLE `proveedor`;
--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `razonS`, `dir`, `tel`) VALUES
('1010', 'Quifatex', 'Quito', '0992869509'),
('2020', 'AcFarma', 'Cayambe', '0992659963');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `Producto_FKIndex1` (`idProveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
