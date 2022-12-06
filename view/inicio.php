<?php
    session_start();
    require_once "./view/core/constantes.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Confecciones Milagros es una tienda de confeción y venta de carteras al por mayor y menor">
    <title>
        <?php
            if(empty($_GET['views'])){
                $NomTitle = "Confecciones Milagros";
                echo $NomTitle;
            } else {
                $text = $_GET['views'];
                $Title = explode("/", $_GET['views']);
                $NomTitle = ucfirst($Title[0]);

                if ($NomTitle == 'Categoria' || $NomTitle == 'ProductoDetalle'){
                    $NomTitle = ucfirst($Title[1]);
                }else{
                    $NomTitle = ucfirst($Title[0]);
                }
                echo $NomTitle;
            }
        ?>
    </title>
    <?php
        if ($NomTitle == "Productos"){
            echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">';
            echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>';
        }
    ?>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/style.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/inicio.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/quienesSomos.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/contacto.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/carteras.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/micuenta.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/productoDetalle.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/contenido.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/productos.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/scss/style.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="<?php echo SERVERURL ?>view/img/jpg/bolso.ico" type="image/x-icon">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/a9045ee35a.js" crossorigin="anonymous"></script>
    <script defer src="<?php echo SERVERURL ?>view/js/jquery.js"></script>
    <script src="<?php echo SERVERURL ?>view/js/sweetalert2.min.js"></script>
    <script defer src="<?php echo SERVERURL ?>view/js/datatables.min.js"></script>
    <script defer src="<?php echo SERVERURL ?>view/js/main.js"></script>
    <script defer src="<?php echo SERVERURL ?>view/js/functions.js"></script>
    <script defer src="<?php echo SERVERURL ?>view/js/adfunctions.js"></script>
    <script defer src="<?php echo SERVERURL ?>view/js/upproduct.js"></script>
    <script defer src="<?php echo SERVERURL ?>view/js/typeahead.bundle.js"></script>
    <script defer src="<?php echo SERVERURL ?>view/js/slider.js"></script>
    <script defer src="<?php echo SERVERURL ?>view/js/navbar.js"></script>
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