<?php
    $Ajax = true;
    session_start();

    require_once "../controller/admincontroller.php";

    $opciones = new adminController();

    if ('listarproductos' == 'listarproductos') {
        echo $opciones->listarproductos();
    }