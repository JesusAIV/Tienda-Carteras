<?php
    session_start();
    require_once "./core/constantes.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if(empty($_GET['views'])){
                $NomTitle = "Confecciones Milagros";
                echo $NomTitle;
            } else {
                $text = $_GET['views'];
                $Title = explode("/", $_GET['views']);
                $NomTitle = ucfirst($Title[0]);
                echo $NomTitle;
            }
        ?>
    </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/style.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/inicio.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/quienesSomos.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/contacto.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/carteras.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/micuenta.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/productoDetalle.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/contenido.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>css/productos.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="<?php echo SERVERURL ?>img/jpg/bolso.ico" type="image/x-icon">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/a9045ee35a.js" crossorigin="anonymous"></script>
    <script defer src="<?php echo SERVERURL ?>js/jquery.js"></script>
    <script src="<?php echo SERVERURL ?>js/sweetalert2.min.js"></script>
    <script defer src="<?php echo SERVERURL ?>js/datatables.min.js"></script>
    <script defer src="<?php echo SERVERURL ?>js/main.js"></script>
    <script defer src="<?php echo SERVERURL ?>js/functions.js"></script>
    <script defer src="<?php echo SERVERURL ?>js/adfunctions.js"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">
</head>
<body>


    <?php
        $Ajax = false;
        require_once "./controller/viewcontroller.php";
        $view = new viewcontroller();
        $vistas = $view -> obtenervistacontrolador();

        if($vistas == "inicio"){
            $vistas = "./view/content/inicio.php";
        }
    ?>

    <?php
        if(isset($_SESSION["idrol"])){
            if($NomTitle == "Inventario" || $NomTitle ==  "Productos"){
                include "modulos/contenido.php";
                $clasemain = "main-inventario";
            }else{
                include "modulos/header.php";
                $clasemain = "main";
            }
        }else{
            include "modulos/header.php";
            $clasemain = "main";
        }
    ?>

    <div class="<?php echo $clasemain ?>">
        <?php require_once $vistas;?>
    </div>

    <?php
    ?>

    <?php include "modulos/footer.php"; ?>
</body>
</html>