<?php
    $Ajax = true;
    session_start();

    require_once "../controller/admincontroller.php";
    $opciones = new adminController();

    if ($_POST['action'] == 'listarproductos') {
        echo $opciones->listarproductos();
    }

    if ($_POST['action'] == 'filtrocategoria') {
        echo $opciones->filtradoCategoria($_POST['filtro'], $_POST['dcategoria'], $_POST['numpagina'], 2);
    }