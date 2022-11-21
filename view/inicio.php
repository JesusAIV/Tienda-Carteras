<?php
    session_start();
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
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/quienesSomos.css">
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="css/carteras.css">
    <link rel="stylesheet" href="css/micuenta.css">
    <link rel="stylesheet" href="css/productoDetalle.css">
    <link rel="stylesheet" href="css/contenido.css">
    <link rel="stylesheet" href="css/productos.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/a9045ee35a.js" crossorigin="anonymous"></script>
    <script defer src="js/jquery.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script defer src="js/datatables.min.js"></script>
    <script defer src="js/main.js"></script>
    <script defer src="js/functions.js"></script>
    <script defer src="js/adfunctions.js"></script>
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