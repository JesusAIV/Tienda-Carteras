<?php
    $Ajax = true;
    session_start();

    require_once "../controller/admincontroller.php";

    $opciones = new adminController();

    if ($_POST['action'] == 'listarproductos') {
        echo $opciones->listarproductos();
    }