<?php
    $Ajax = true;
    session_start();

    require_once "../controller/admincontroller.php";
    $opciones = new adminController();

    if (isset($_POST['addpname'])){

        if (isset($_POST['addpname'])) {
            echo $opciones->agregarProductoC();
        }

    }