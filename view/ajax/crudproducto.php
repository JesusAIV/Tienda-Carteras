<?php
    $Ajax = true;
    session_start();

    require_once "../../controller/admincontroller.php";
    $opciones = new adminController();

    if (isset($_POST['addpname']) || isset($_POST['addpimagencolorhex']) || isset($_POST['addpnamecategoria']) || isset($_POST['uppid'])){

        if (isset($_POST['addpname'])) {
            echo $opciones->agregarProductoC();
        }

        if (isset($_POST['addpimagencolorhex'])) {
            echo $opciones->agregarColorC();
        }

        if (isset($_POST['addpnamecategoria'])) {
            echo $opciones->agregarCategoriaC();
        }

        if (isset($_POST['uppid'])) {
            echo $opciones->actualizarProductoC();
        }

    }
