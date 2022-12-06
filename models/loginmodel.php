<?php

    if ($Ajax){
        require_once "../view/core/conexion.php";
        require_once "../models/mainmodel.php";
    } else {
        require_once "./view/core/conexion.php";
        require_once "./models/mainmodel.php";
    }

    class LoginModel extends mainModel{

        protected function iniciar_sesion($datos){
            // Recibe la conexión y lo almacena en la variable '$conexion'
            $conexion = Conexion::conectar();

            // Recoge los datos del array '$datos'
            $email = $datos['email']; // El dato email lo almacena en la variale '$email'
            $password = $datos['password']; // El dato password lo almacena en la variale '$password'

            // Consulta sql para buscar al usuario con el con el correo y contraseña indicada
            $sql = "SELECT * FROM usuario WHERE email='$email' AND password='$password'";

            // Ejecuta la consulta sql
            $consulta = $conexion->query($sql);

            // Retorna la consulta
            return $consulta;
        }
    }

?>