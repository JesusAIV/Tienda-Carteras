<?php
    $host = "127.0.0.1";
    $username = "root";
    $pass = "";
    $database = "jhardsystex";
    $conexion = mysqli_connect($host,$username,$pass,$database);

    $id = $_POST['id'];

    $sql = "CALL ListarParticipanteDatos('$id')";
    $result = $conexion->query($sql);
    $result = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($result as $row) {}
    $datosP = [
        "id" => $row['JHARID'],
        "nombre" => $row['Nomb'],
        "apellido" => $row['Apell'],
        "nacimiento" => $row['Fec_nac'],
        "correo" => $row['Corr'],
        "telefono" => $row['Cel'],
        "dni" => $row['DNI']
    ];

    echo json_encode($datosP, JSON_UNESCAPED_UNICODE);