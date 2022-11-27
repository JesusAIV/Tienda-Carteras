<?php
    $Ajax = true;
    session_start();

    require_once "../controller/admincontroller.php";
    $opciones = new adminController();

    if (isset($_POST['addpname']) || isset($_POST['addpimagencolorhex']) || isset($_POST['addpnamecategoria'])){

        if (isset($_POST['addpname'])) {
            echo $opciones->agregarProductoC();
        }

        if (isset($_POST['addpimagencolorhex'])) {
            echo $opciones->agregarColorC();
        }

        if (isset($_POST['addpnamecategoria'])) {
            echo $opciones->agregarCategoriaC();
        }

    }



    $this -> host='localhost';
    $this -> db='localhost';
    $this -> user='localhost';
    $this -> charset='localhost';

    $conexion="mysql:host='.$this->host.'; dbname='.$this->db.'; charset='.$this->charset.'";