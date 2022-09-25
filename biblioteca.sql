-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2022 a las 00:07:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table1`
--

CREATE TABLE `table1` (
  `id_table1` int(10) NOT NULL,
  `libro` varchar(20) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellido` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `table1`
--

INSERT INTO `table1` (`id_table1`, `libro`, `nombre`, `apellido`) VALUES
(1, ':lib', ':nom', ':ape'),
(2, ':lib', ':nom', ':ape');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table2`
--

CREATE TABLE `table2` (
  `id_table2` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `tipo_libro` varchar(20) NOT NULL,
  `fecha_p` datetime(6) NOT NULL,
  `vencimiento_p` date NOT NULL,
  `cantidad_libros` int(5) NOT NULL,
  `valor_pago` float NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `table2`
--

INSERT INTO `table2` (`id_table2`, `id_usuario`, `usuario`, `tipo_libro`, `fecha_p`, `vencimiento_p`, `cantidad_libros`, `valor_pago`, `email`) VALUES
(4, 2, 'jeus', 'suspenso', '2023-10-10 04:00:00.000000', '2002-05-07', 8, 3456, 'vgjsjfsd@gmail'),
(6, 2, 'carlos', 'suspenso', '2023-10-10 04:00:00.000000', '2002-05-07', 5, 3456, 'vgjsjfsd@gmail');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id_table1`);

--
-- Indices de la tabla `table2`
--
ALTER TABLE `table2`
  ADD PRIMARY KEY (`id_table2`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `table1`
--
ALTER TABLE `table1`
  MODIFY `id_table1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `table2`
--
ALTER TABLE `table2`
  MODIFY `id_table2` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `table2`
--
ALTER TABLE `table2`
  ADD CONSTRAINT `table2_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `table1` (`id_table1`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
