<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confecciones Milagros</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/principal.css">
    <script defer src="js/main.js"></script>
</head>
<body>

    <?php include "modulos/header.php"; ?>
    <?php
        require_once "./controller/viewcontroller.php";
        $view = new viewcontroller();
        $vistas = $view -> obtenervistacontrolador();

        if($vistas == "principal"):
            require_once "./view/content/principal.php";
        else:
    ?>

    <div class="main">
        <?php require_once $vistas;?>
    </div>

    <?php
        endif;
    ?>

    <?php include "modulos/footer.php"; ?>
</body>
</html>