<?php
    $Ajax = true;
    session_start();

    require_once "../controller/admincontroller.php";
    $opciones = new adminController();

    if (isset($_POST['addpname']) || isset($_POST['addpimagencolorhex'])){

        if (isset($_POST['addpname'])) {
            echo $opciones->agregarProductoC();
        }

        if (isset($_POST['addpimagencolorhex'])) {
            echo $opciones->agregarColorC();
        }

    }