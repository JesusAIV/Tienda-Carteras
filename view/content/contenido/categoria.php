<?php
    $Ajax = false;
    require_once "./controller/admincontroller.php";
    $Admin = new adminController();

    $pagina = explode("/", $_GET['views']);
?>

<div>
    <?php
        echo $Admin->DatosCategoria($pagina[0]); 
        echo $pagina[1];
        
        echo '<br>';
        echo '<br>';
        var_dump($_GET);
    ?>
</div>