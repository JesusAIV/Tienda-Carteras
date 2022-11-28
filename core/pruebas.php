<?php

    // $directorio = "../asdas/asdasdsa/asdasd.kljl";

    // $imagen = substr($directorio, 3);

    // echo $imagen;

    $ruta = "../asdas/asdasdsa/asdasd.kljl";

    $directorio = SERVERURL.$ruta;

    echo $directorio;

?>


<!-- DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DatosCategoria`(IN `categoria` VARCHAR(50))
SELECT 
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
ORDER BY tbp.producto ASC$$
DELIMITER ; -->


<!--
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
WHERE tbc.categoria = categoria
ORDER BY tbp.producto ASC LIMIT inicio, registros
-->