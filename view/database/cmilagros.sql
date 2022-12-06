-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 23:28:00
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
CREATE PROCEDURE `AgregarCategoria` (IN `pcategoria` VARCHAR(60), IN `pimagen` VARCHAR(200))   INSERT INTO categoria
(`categoria`, `imagen`) VALUES
(pcategoria, pimagen)$$

CREATE PROCEDURE `AgregarColor` (IN `color` VARCHAR(20), IN `codigohex` VARCHAR(8))   INSERT INTO colores
(`color`, `codigohex`) VALUES
(color, codigohex)$$

CREATE PROCEDURE `AgregarProducto` (IN `producto` VARCHAR(50), IN `precio` DOUBLE, IN `descripcion` VARCHAR(150), IN `idcolor` INT, IN `idcategoria` INT, IN `stock` INT, IN `imagen` VARCHAR(200))   BEGIN
SET FOREIGN_KEY_CHECKS=0;
INSERT INTO producto
(`idcategoria`, `idcolor`, `producto`, `descripcion`, `stock`, `precio`, `imagen`) VALUES
(idcategoria, idcolor, producto, descripcion, stock, precio, imagen);
END$$

CREATE PROCEDURE `DatosCategoria` (IN `categoria` VARCHAR(50), IN `inicio` INT, IN `registros` INT)   SELECT 
SQL_CALC_FOUND_ROWS
	tbp.idproducto,
	tbp.producto, 
    tbp.precio,
    tbp.descripcion,
    tbp.stock,
    tbc.categoria,
    tbcol.color,
    tbp.imagen
FROM producto AS tbp 
JOIN categoria AS tbc
ON (tbp.idcategoria = tbc.idcategoria) INNER JOIN colores AS tbcol
ON (tbp.idcolor = tbcol.idcolor)
WHERE tbc.categoria = categoria
ORDER BY tbp.producto ASC LIMIT inicio, registros$$

CREATE PROCEDURE `DatosProducto` (IN `nomproducto` VARCHAR(50))   SELECT 
	tbp.idproducto,
	tbp.producto, 
    tbp.precio,
    tbp.descripcion,
    tbp.stock,
    tbc.categoria,
    tbcol.color,
    tbp.imagen
FROM producto AS tbp 
JOIN categoria AS tbc
ON (tbp.idcategoria = tbc.idcategoria) INNER JOIN colores AS tbcol
ON (tbp.idcolor = tbcol.idcolor)
WHERE tbp.producto = nomproducto$$

CREATE PROCEDURE `EditarProducto` (IN `producto` VARCHAR(50), IN `precio` DOUBLE, IN `descripcion` VARCHAR(150), IN `idcolor` INT, IN `idcategoria` INT, IN `stock` INT, IN `imagen` VARCHAR(200), IN `idproducto` INT(20))   BEGIN
SET FOREIGN_KEY_CHECKS=0;
UPDATE 
	producto 
SET 
	`producto` = producto,
    `precio` = precio,
    `descripcion` = descripcion,
    `stock` = stock,
    `idcategoria` = idcategoria,
    `idcolor` = idcolor,
    `imagen` = imagen
WHERE 
	`producto`.`idproducto` = idproducto;
END$$

CREATE PROCEDURE `FiltradoPrecios` (IN `orden` VARCHAR(20), IN `categoria` VARCHAR(30), IN `inicio` INT, IN `registros` INT)   IF orden = 'preciobajo' THEN
	SELECT
    SQL_CALC_FOUND_ROWS
	tbp.idproducto,
	tbp.producto, 
    tbp.precio,
    tbp.descripcion,
    tbp.stock,
    tbc.categoria,
    tbcol.color,
    tbp.imagen
	FROM producto AS tbp 
	JOIN categoria AS tbc
	ON (tbp.idcategoria = tbc.idcategoria) INNER JOIN colores AS tbcol
	ON (tbp.idcolor = tbcol.idcolor)
	WHERE tbc.categoria = categoria ORDER BY tbp.precio ASC LIMIT inicio, registros;
ELSEIF orden = 'precioalto' THEN
	SELECT
    SQL_CALC_FOUND_ROWS
	tbp.idproducto,
	tbp.producto, 
    tbp.precio,
    tbp.descripcion,
    tbp.stock,
    tbc.categoria,
    tbcol.color,
    tbp.imagen
	FROM producto AS tbp 
	JOIN categoria AS tbc
	ON (tbp.idcategoria = tbc.idcategoria) INNER JOIN colores AS tbcol
	ON (tbp.idcolor = tbcol.idcolor)
	WHERE tbc.categoria = categoria ORDER BY tbp.precio DESC LIMIT inicio, registros;
ELSE
	SELECT
    SQL_CALC_FOUND_ROWS
	tbp.idproducto,
	tbp.producto, 
    tbp.precio,
    tbp.descripcion,
    tbp.stock,
    tbc.categoria,
    tbcol.color,
    tbp.imagen
	FROM producto AS tbp 
	JOIN categoria AS tbc
	ON (tbp.idcategoria = tbc.idcategoria) INNER JOIN colores AS tbcol
	ON (tbp.idcolor = tbcol.idcolor)
	WHERE tbc.categoria = categoria ORDER BY tbp.producto ASC LIMIT inicio, registros;
END IF$$

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

CREATE PROCEDURE `ListarCategorias` ()   SELECT * FROM categoria$$

CREATE PROCEDURE `ListarColores` ()   SELECT * FROM colores$$

CREATE PROCEDURE `ListarProductos` ()   SELECT 
	tbp.idproducto,
	tbp.producto, 
    tbp.precio,
    tbp.descripcion,
    tbp.stock,
    tbc.categoria,
    tbcol.color,
    tbp.imagen
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

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `categoria` varchar(60) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `categoria`, `imagen`) VALUES
(1, 'carteras', 'img/categorias/carteras.jpg-1669256184.jpeg'),
(2, 'morrales', 'img/categorias/morrales.jpg-1669256251.jpeg'),
(3, 'mochilas', 'img/categorias/mochilas.jpg-1669256282.jpeg'),
(4, 'bolsos', 'img/categorias/bolsos.jpg-1669256307.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `idcolor` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `codigohex` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`idcolor`, `color`, `codigohex`) VALUES
(1, 'negro', '0D0D0D'),
(2, 'rojo', 'AC2E30'),
(3, 'marron', '311901'),
(4, 'camello', 'D39000'),
(5, 'azul', '1B3375'),
(6, 'guinda', '9C353F'),
(13, 'verde', '0b6672'),
(14, 'Beig', 'd0c8c9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idcolor` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `idcategoria`, `idcolor`, `producto`, `descripcion`, `stock`, `precio`, `imagen`) VALUES
(51, 1, 2, 'Satchel', 'Villas, una colección que reúne las piezas necesarias para tener los básicos siempre a la mano. ', 50, 219.85, 'img/productos/carteras/19336908_1.jpeg-1669673859.jpeg'),
(52, 1, 1, 'Amphora', 'Es una cartera grande tipo bolso donde entra perfecto cualquier laptop, el material es suave y el color es negro brilloso super elegante.', 50, 99, 'img/productos/carteras/19330826_1 (1).jpeg-1669669640.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de roles para el usuario';

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
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `producto_ibfk_2` (`idcategoria`),
  ADD KEY `producto_ibfk_3` (`idcolor`);

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
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
