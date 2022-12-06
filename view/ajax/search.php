<?php
    require_once "../view/core/conexion.php";
    require_once "../view/core/constantes.php";

    $conexion = Conexion::conectar();

    $key = $_POST['key'];

    $sql = "SELECT * FROM producto WHERE producto LIKE '%$key%'";
    $result = $conexion->query($sql);
    $result = $result->fetch_all(MYSQLI_ASSOC);

    $salida = "";
    foreach ($result as $row) {
        $salida .= "<a class='search-li' href='".SERVERURL."/productoDetalle/".$row['producto']."'><li>".$row['producto']."</li></a>";
    }
    echo $salida;