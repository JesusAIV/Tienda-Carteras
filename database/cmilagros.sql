-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2022 a las 07:05:45
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cmilagros`
--
CREATE DATABASE IF NOT EXISTS `cmilagros` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cmilagros`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `AgregarProducto`$$
CREATE PROCEDURE `AgregarProducto` (IN `producto` VARCHAR(50), IN `precio` DOUBLE, IN `descripcion` VARCHAR(150), IN `idcolor` INT, IN `idcategoria` INT, IN `stock` INT)   BEGIN
SET FOREIGN_KEY_CHECKS=0;
INSERT INTO producto
(`idcategoria`, `idcolor`, `producto`, `descripcion`, `stock`, `precio`) VALUES
(idcategoria, idcolor, producto, descripcion, stock, precio);
END$$

DROP PROCEDURE IF EXISTS `InformacionProducto`$$
CREATE PROCEDURE `InformacionProducto` (IN `idproducto` INT)   SELECT 
	tbp.idproducto,
	tbp.producto, 
    tbp.precio,
    tbp.descripcion,
    tbp.stock,
    tbc.categoria,
    tbcol.color
FROM producto AS tbp 
JOIN categoria AS tbc
ON (tbp.idcategoria = tbc.idcategoria) INNER JOIN colores AS tbcol
ON (tbp.idcolor = tbcol.idcolor) 
WHERE tbp.idproducto = idproducto$$

DROP PROCEDURE IF EXISTS `ListarCategorias`$$
CREATE PROCEDURE `ListarCategorias` ()   SELECT * FROM categoria$$

DROP PROCEDURE IF EXISTS `ListarColores`$$
CREATE PROCEDURE `ListarColores` ()   SELECT * FROM colores$$

DROP PROCEDURE IF EXISTS `ListarProductos`$$
CREATE PROCEDURE `ListarProductos` ()   SELECT 
	tbp.idproducto,
	tbp.producto, 
    tbp.precio,
    tbp.descripcion,
    tbp.stock,
    tbc.categoria,
    tbcol.color
FROM producto AS tbp 
JOIN categoria AS tbc
ON (tbp.idcategoria = tbc.idcategoria) INNER JOIN colores AS tbcol
ON (tbp.idcolor = tbcol.idcolor)
ORDER BY tbp.stock$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `categoria` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `categoria`:
--

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES
(1, 'carteras'),
(2, 'morrales'),
(3, 'mochilas'),
(4, 'bolsos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

DROP TABLE IF EXISTS `colores`;
CREATE TABLE `colores` (
  `idcolor` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `codigohex` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `colores`:
--

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`idcolor`, `color`, `codigohex`) VALUES
(1, 'negro', '0D0D0D'),
(2, 'rojo', 'AC2E30'),
(3, 'marron', '311901'),
(4, 'camello', 'D39000'),
(5, 'azul', '1B3375'),
(6, 'guinda', '9C353F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idcolor` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `producto`:
--   `idcategoria`
--       `categoria` -> `idcategoria`
--   `idcolor`
--       `colores` -> `idcolor`
--

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `idcategoria`, `idcolor`, `producto`, `descripcion`, `stock`, `precio`) VALUES
(1, 1, 5, 'campana', 'Cartera exclusiva para usarlo en toda ocasión ', 50, 12.5),
(2, 2, 4, 'tambor', 'Buen espacio para guardar y mantener seguro tus objetos', 50, 19.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de roles para el usuario';

--
-- RELACIONES PARA LA TABLA `rol`:
--

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `usuario`:
--   `idrol`
--       `rol` -> `idrol`
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idrol`, `nombre`, `apellidos`, `usuario`, `email`, `password`) VALUES
(1, 1, 'Milagros', 'Reque Vasquez', '', 'milagros@gmail.com', 'milagros123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`),
  ADD UNIQUE KEY `rol` (`rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`idcolor`) REFERENCES `colores` (`idcolor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
