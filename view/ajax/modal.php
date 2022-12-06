<?php
    require_once "../core/conexion.php";

    $conexion = Conexion::conectar();

    $id = $_POST['id'];

    $sql = "SELECT * FROM producto WHERE idproducto=$id";
    $result = $conexion->query($sql);
    $result = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($result as $row) {}
    $datosP = [
        "idproducto" => $row['idproducto'],
        "idcategoria" => $row['idcategoria'],
        "idcolor" => $row['idcolor'],
        "producto" => $row['producto'],
        "descripcion" => $row['descripcion'],
        "stock" => $row['stock'],
        "precio" => $row['precio'],
        "imagen" => $row['imagen']
    ];

    echo json_encode($datosP, JSON_UNESCAPED_UNICODE);