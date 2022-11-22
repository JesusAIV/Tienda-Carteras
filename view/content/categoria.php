<?php
    $Ajax = false;
    require_once "./controller/admincontroller.php";
    $Admin = new adminController();

    $pagina = explode("/", $_GET['views']);

    echo $Admin->DatosCategoria($pagina[1]);
?>