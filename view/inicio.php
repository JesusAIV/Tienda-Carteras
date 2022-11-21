<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confecciones Milagros</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/quienesSomos.css">
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="css/carteras.css">
    <link rel="stylesheet" href="css/micuenta.css">
    <link rel="stylesheet" href="css/productoDetalle.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/a9045ee35a.js" crossorigin="anonymous"></script>
    <script defer src="js/jquery.js"></script>
    <script defer src="js/main.js"></script>
    <script defer src="js/functions.js"></script>
</head>
<body>

    <?php include "modulos/header.php"; ?>
    <?php
        $Ajax = false;
        require_once "./controller/viewcontroller.php";
        $view = new viewcontroller();
        $vistas = $view -> obtenervistacontrolador();

        if($vistas == "inicio"){
            $vistas = "./view/content/inicio.php";
        }
    ?>

    <div class="main">
        <?php require_once $vistas;?>
    </div>

    <?php
    ?>

    <?php include "modulos/footer.php"; ?>
</body>
</html>